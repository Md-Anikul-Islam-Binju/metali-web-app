<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\GroupPost;
use App\Models\GroupPostComment;
use App\Models\GroupPostReply;
use App\Models\Page;
use App\Models\PagePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'cover_image' => 'required',
            ]);
            $imageName = time().'.'.$request->cover_image->extension();
            $request->cover_image->move(public_path('images/cover_image'), $imageName);
            $author = auth()->user();
            $group = new Group();
            $group->user_id = $author->id;
            $group->name = $request->name;
            $group->type = $request->type;
            $group->privacy_type = $request->privacy_type;
            $group->short_description = $request->short_description;
            $group->email = $request->email;
            $group->phone = $request->phone;
            $group->address = $request->address;
            $group->website_link = $request->website_link;
            $group->cover_image = $imageName;
            $group->save();
            return response()->json([
                'status' => true,
                'message' => 'Group created successfully',
                'group' => $group,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function getAuthUserGroup()
    {
        $user = Auth::user();
        if ($user) {
            $group = Group::where('user_id', $user->id)->get();
            return response()->json([
                'status' => true,
                'page' => $group,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Group not found',
            ], 401);
        }
    }

    public function storePost(Request $request)
    {

        $request->validate([
            'group_id' => 'required',
            'post_image.*' => 'required|image',
            'post_videos' => 'file|mimes:mp4,mov,avi|max:20480',
        ]);
        try {
            $userId = Auth::id();
            $imagePaths = [];
            if ($request->hasFile('post_image')) {
                foreach ($request->file('post_image') as $imageFile) {
                    $imageName = time() . '_' . uniqid() . '.' . $imageFile->extension();
                    $imageFile->move(public_path('images/group_post_images'), $imageName);
                    $imagePaths[] = $imageName;
                }
            }
            $videoName = null;
            if ($request->hasFile('post_videos')) {
                $videoName = time().'.'.$request->file('post_videos')->extension();
                $request->file('post_videos')->move(public_path('video/group_post_videos'), $videoName);
            }
            $post = GroupPost::create([
                'user_id' => $userId,
                'group_id' => $request->input('group_id'),
                'post_content' => $request->input('post_content'),
                'status' => $request->input('status'),
                'post_videos' => $videoName ?? null,
                'post_image' => json_encode($imagePaths),
            ]);
            // Load the user relationship for the created post
            $post->load('user');
            // Create the response array with user information
            $response = [
                'status' => true,
                'message' => 'Group post created successfully',
                'posts' => [
                    'current_page' => 1, // You may need to adjust this based on your pagination implementation
                    'data' => [$post],
                ],
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

//    public function getGroupAllPost()
//    {
//        $groups = Group::with('posts.user')->paginate(15);
//        $response = [
//            'status' => true,
//            'posts' => $groups,
//        ];
//        return response()->json($response, 200);
//    }
    public function getGroupAllPost()
    {
        $groups = Group::with(['posts.user', 'posts.likes', 'posts.comments.user', 'posts.comments.replies.user'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        // Calculate total like count for each post
        $groups->each(function ($group) {
            $group->posts->each(function ($post) {
                $post->total_likes = $post->likes->count();
            });
        });

        $response = [
            'status' => true,
            'posts' => $groups,
        ];

        return response()->json($response, 200);
    }
    public function toggleLike($groupId)
    {
        $user = Auth::user();
        $group = Group::findOrFail($groupId);

        if ($group->isLikedByUser($user->id)) {
            $group->likes()->where('user_id', $user->id)->delete();
            $message = 'Group unliked successfully';
        } else {
            $like = $group->likes()->create(['user_id' => $user->id]);
            $message = 'Group liked successfully';
        }

        return response()->json([
            'status' => true,
            'message' => $message,
            'isLiked' => !$group->isLikedByUser($user->id),
        ], 200);
    }

    public function togglePostLike($postId)
    {
        $user = Auth::user();
        $post = GroupPost::findOrFail($postId);

        if ($post->isLikedByUser($user->id)) {
            $post->likes()->where('user_id', $user->id)->delete();
            $message = 'Group post unliked successfully';
        } else {
            $like = $post->likes()->create(['user_id' => $user->id]);
            $message = 'Group post liked successfully';
        }

        return response()->json([
            'status' => true,
            'message' => $message,
            'isLiked' => !$post->isLikedByUser($user->id),
        ], 200);
    }


    public function addPostComment(Request $request, $postId)
    {
        $rules = [
            'comment' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $user = Auth::user();
        $commentData = [
            'group_post_id' => $postId,
            'user_id' => $user->id,
            'comment' => $request->comment,
        ];
        $comment = GroupPostComment::create($commentData);
        return response()->json([
            'status' => true,
            'message' => 'Comment added successfully',
            'comment' => $comment,
        ], 200);
    }

    public function addCommentReply(Request $request, $commentId)
    {
        $rules = [
            'reply' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $user = Auth::user();
        $replyData = [
            'group_post_comment_id' => $commentId,
            'user_id' => $user->id,
            'reply' => $request->reply,
        ];
        $reply = GroupPostReply::create($replyData);
        return response()->json([
            'status' => true,
            'message' => 'Reply added successfully',
            'reply' => $reply,
        ], 200);
    }



}
