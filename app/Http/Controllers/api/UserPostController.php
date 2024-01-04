<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\PagePost;
use App\Models\UserPostComment;
use App\Models\UserPostReplie;
use Illuminate\Http\Request;
use App\Models\UserPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class UserPostController extends Controller
{
    public function storeUserPost(Request $request)
    {
        //dd($request->all());
        try {
            $request->validate([
                'post_details' => 'required',
                'status' => 'required|in:1,2,3',
                'image.*' => 'required|image',
                'video' => 'file|mimes:mp4,mov,avi|max:20480',
            ]);

            $userId = Auth::id();
            $imagePaths = [];
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $imageFile) {
                    $imageName = time() . '_' . uniqid() . '.' . $imageFile->extension();
                    $imageFile->move(public_path('images/post_images'), $imageName);
                    $imagePaths[] = $imageName;
                }
            }
            $videoName = null;
            if ($request->hasFile('video')) { // Fix: change from 'videos' to 'video'
                $videoName = time().'.'.$request->file('video')->extension();
                $request->file('video')->move(public_path('video/post_videos'), $videoName);
            }


            $userPost = UserPost::create([
                'user_id' => $userId,
                'post_details' => $request->input('post_details'),
                'status' => $request->input('status'),
                'videos' => $videoName ?? null,
                'image' => json_encode($imagePaths),
            ]);

            return response()->json([
                'message' => 'Post created successfully',
                'post' => $userPost,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

//    public function getAuthUserPosts()
//    {
//        $user = Auth::user();
//        if ($user) {
//            $posts = UserPost::where('user_id', $user->id)->with('user')->paginate(15);
//            return response()->json([
//                'status' => true,
//                'posts' => $posts,
//            ], 200);
//        } else {
//            return response()->json([
//                'status' => false,
//                'message' => 'User not authenticated',
//            ], 401);
//        }
//    }

    public function getAuthUserPosts()
    {
        $user = Auth::user();

        if ($user) {
            $posts = UserPost::with(['user', 'comments.user', 'comments.replies.user'])
                ->withCount(['comments', 'timelinePostLikes'])
                ->where('user_id', $user->id)
                ->latest()
                ->paginate(15);

            return response()->json([
                'status' => true,
                'posts' => $posts,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'User not authenticated',
            ], 401);
        }
    }

    //all-post-no-auth
//    public function getAllUserPost()
//    {
//        $posts = UserPost::with('user')->paginate(15);
//        return response()->json([
//            'status' => true,
//            'posts' => $posts,
//        ]);
//    }

    public function getAllUserPost()
    {
        $posts = UserPost::with(['user', 'comments.user', 'comments.replies.user'])
            ->withCount(['comments', 'timelinePostLikes'])
            ->latest()
            ->paginate(15);

        return response()->json([
            'status' => true,
            'posts' => $posts,
        ]);
    }

    public function toggleLike($postId)
    {
        $user = Auth::user();
        $userPost = UserPost::findOrFail($postId);

        if ($userPost->isLikedByUser($user->id)) {
            $userPost->timelinePostLikes()->where('user_id', $user->id)->delete();
            $message = 'User post unliked successfully';
        } else {
            $like = $userPost->timelinePostLikes()->create(['user_id' => $user->id]);
            $message = 'User post liked successfully';
        }

        return response()->json([
            'status' => true,
            'message' => $message,
            'isLiked' => !$userPost->isLikedByUser($user->id),
        ], 200);
    }

    public function addComment(Request $request, $postId)
    {
        try {
            $validatedData = $request->validate([
                'comment' => 'required|string',
            ]);

            $user = Auth::user();
            $userPost = UserPost::findOrFail($postId);

            $comment = new UserPostComment([
                'user_id' => $user->id,
                'comment' => $validatedData['comment'],
            ]);

            $userPost->comments()->save($comment);

            return response()->json([
                'status' => true,
                'message' => 'Comment added successfully',
                'comment' => $comment,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function addReply(Request $request, $commentId)
    {
        try {
            $validatedData = $request->validate([
                'reply' => 'required|string',
            ]);

            $user = Auth::user();
            $comment = UserPostComment::findOrFail($commentId);

            $reply = new UserPostReplie([
                'user_id' => $user->id,
                'reply' => $validatedData['reply'],
            ]);

            $comment->replies()->save($reply);

            return response()->json([
                'status' => true,
                'message' => 'Reply added successfully',
                'reply' => $reply,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

}
