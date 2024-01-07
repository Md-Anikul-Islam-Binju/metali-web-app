<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupPost;
use App\Models\GroupPostComment;
use App\Models\GroupPostReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function groupList()
    {
        $authUser = Auth::user();
        $myGroups = Group::where('user_id', auth()->user()->id)->withCount('likes')->with('likes.user')->get();
        $suggestGroups = Group::where('user_id', '!=', auth()->user()->id)->withCount('likes')->with('likes.user')->get();
        return view('pages.groupList', compact('myGroups', 'suggestGroups', 'authUser'));
    }

    public function groupCreate()
    {
        $authUser = Auth::user();
        return view('pages.groupCreate', compact('authUser'));
    }

    public function groupStore(Request $request)
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
            return redirect()->route('group.list')->with('success', 'Group Created Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }

    }

    public function groupProfile($id)
    {
        $groupProfile = Group::where('id', $id)
            ->with(['posts' => function ($query) {
                $query->withCount('likes','comments')->orderBy('created_at', 'desc');
            }, 'posts.user', 'posts.likes', 'posts.comments.user', 'posts.comments.replies.user'])
            ->withCount('likes')
            ->first();
        $authUser = Auth::user();
        return view('pages.groupProfile', compact('groupProfile', 'authUser'));
    }

    public function groupPostStore(Request $request)
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
            return redirect()->back()->with('success', 'Post created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('profile')->with('error', 'Error creating the post. Please try again.');
        }
    }


    public function storeGroupComment(Request $request)
    {
        $request->validate([
            'group_post_id' => 'required|numeric',
            'comment' => 'required|string',
        ]);
        $comment = new GroupPostComment();
        $comment->user_id = auth()->user()->id;
        $comment->group_post_id = $request->input('group_post_id');
        $comment->comment = $request->input('comment');
        $comment->save();
        return redirect()->back()->with('success', 'Comment added successfully');
    }

    public function storeReplyGroupComment(Request $request)
    {
        $request->validate([
            'group_post_comment_id' => 'required|numeric',
            'reply' => 'required|string',
        ]);
        $comment = new GroupPostReply();
        $comment->user_id = auth()->user()->id;
        $comment->group_post_comment_id = $request->input('group_post_comment_id');
        $comment->reply = $request->input('reply');
        $comment->save();
        return redirect()->back()->with('success', 'Reply added successfully');
    }

    public function toggleGroupFlow($groupId)
    {
        $user = Auth::user();
        $group = Group::findOrFail($groupId);

        if ($group->isLikedByUser($user->id)) {
            $group->likes()->where('user_id', $user->id)->delete();
            $message = 'Group Unfollow successfully';
        } else {
            $like = $group->likes()->create(['user_id' => $user->id]);
            $message = 'Group Follow successfully';
        }
        return response()->json([
            'status' => true,
            'message' => $message,
            'isLiked' => !$group->isLikedByUser($user->id),
        ], 200);
    }


    public function togglePostLike($postId)
    {
        //dd($postId);
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
}
