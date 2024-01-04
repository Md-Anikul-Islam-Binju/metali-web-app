<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PagePost;
use App\Models\PagePostComment;
use App\Models\PagePostReply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class PageController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'profile_image' => 'required',
                'cover_image' => 'required',
            ]);

            // Check if profile_image is in the request and save it
            $imageNamePageProfile = time().'.'.$request->profile_image->extension();
            $request->profile_image->move(public_path('images/page_profile_image'), $imageNamePageProfile);
            $imageNamePageCover = time().'.'.$request->cover_image->extension();
            $request->cover_image->move(public_path('images/page_cover_image'), $imageNamePageCover);
            $author = auth()->user();
            $page = new Page();
            $page->user_id = $author->id;
            $page->name = $request->name;
            $page->category_id = $request->category_id;
            $page->short_description = $request->short_description;
            $page->email = $request->email;
            $page->phone = $request->phone;
            $page->address = $request->address;
            $page->website_link = $request->website_link;
            $page->city = $request->city;
            $page->profile_image = $imageNamePageProfile;
            $page->cover_image = $imageNamePageCover;
            $page->save();
            return response()->json([
                'status' => true,
                'message' => 'Page created successfully',
                'page' => $page,

            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function getAuthUserPage()
    {
        $user = Auth::user();
        if ($user) {
            $page = Page::where('user_id', $user->id)->get();
            return response()->json([
                'status' => true,
                'page' => $page,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'SocialLink not found',
            ], 401);
        }
    }

    public function storePost(Request $request)
    {
        $request->validate([
            'page_id' => 'required',
            'post_image.*' => 'required|image',
            'post_videos' => 'file|mimes:mp4,mov,avi|max:20480',
        ]);
        try {
            $userId = Auth::id();
            $imagePaths = [];
            if ($request->hasFile('post_image')) {
                foreach ($request->file('post_image') as $imageFile) {
                    $imageName = time() . '_' . uniqid() . '.' . $imageFile->extension();
                    $imageFile->move(public_path('images/page_post_images'), $imageName);
                    $imagePaths[] = $imageName;
                }
            }
            $videoName = null;
            if ($request->hasFile('post_videos')) {
                $videoName = time().'.'.$request->file('post_videos')->extension();
                $request->file('post_videos')->move(public_path('video/page_post_videos'), $videoName);
            }
            $post = PagePost::create([
                'user_id' => $userId,
                'page_id' => $request->input('page_id'),
                'post_content' => $request->input('post_content'),
                'status' => $request->input('status'),
                'post_videos' => $videoName ?? null,
                'post_image' => json_encode($imagePaths),
            ]);
            $response = [
                'status' => true,
                'message' => 'Page post created successfully',
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

//    public function getPageAllPost()
//    {
//        $pages = Page::with('posts.user')->paginate(15);
//        $response = [
//            'status' => true,
//            'posts' => $pages,
//        ];
//        return response()->json($response, 200);
//    }

    public function getPageAllPost()
    {
        $pages = Page::with('posts.user', 'posts.comments.user', 'posts.comments.replies.user', 'posts.likes')
            ->withCount('likes')
            ->latest()
            ->paginate(15);

        $response = [
            'status' => true,
            'posts' => $pages,
        ];

        return response()->json($response, 200);
    }

    public function toggleLike($pageId)
    {

        $user = Auth::user();
        $page = Page::findOrFail($pageId);

        if ($page->isLikedByUser($user->id)) {
            $page->likes()->where('user_id', $user->id)->delete();
            $message = 'Page unliked successfully';
        } else {
            $like = $page->likes()->create(['user_id' => $user->id]);
            $message = 'Page liked successfully';
        }

        return response()->json([
            'status' => true,
            'message' => $message,
            'isLiked' => !$page->isLikedByUser($user->id),
        ], 200);
    }



    public function togglePostLike($postId)
    {
        $user = Auth::user();
        $post = PagePost::findOrFail($postId);

        if ($post->isLikedByUser($user->id)) {
            $post->likes()->where('user_id', $user->id)->delete();
            $message = 'Page post unliked successfully';
        } else {
            $like = $post->likes()->create(['user_id' => $user->id]);
            $message = 'Page post liked successfully';
        }

        return response()->json([
            'status' => true,
            'message' => $message,
            'isLiked' => !$post->isLikedByUser($user->id),
        ], 200);
    }

    public function addPostComment(Request $request, $postId)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string',
        ]);

        $user = Auth::user();
        $post = PagePost::findOrFail($postId);

        $comment = new PagePostComment([
            'user_id' => $user->id,
            'comment' => $validatedData['comment'],
        ]);

        $post->comments()->save($comment);

        return response()->json([
            'status' => true,
            'message' => 'Comment added successfully',
            'comment' => $comment,
        ], 200);
    }

    public function addCommentReply(Request $request, $commentId)
    {
        $validatedData = $request->validate([
            'reply' => 'required|string',
        ]);

        $user = Auth::user();
        $comment = PagePostComment::findOrFail($commentId);

        $reply = new PagePostReply([
            'user_id' => $user->id,
            'reply' => $validatedData['reply'],
        ]);

        $comment->replies()->save($reply);

        return response()->json([
            'status' => true,
            'message' => 'Reply added successfully',
            'reply' => $reply,
        ], 200);
    }

}
