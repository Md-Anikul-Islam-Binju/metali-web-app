<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PagePost;
use App\Models\PagePostComment;
use App\Models\PagePostReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function pageList()
    {

        $authUser = Auth::user();
        $myPages = Page::where('user_id', auth()->user()->id)
            ->withCount('likes')
            ->with('likes.user')
            ->get();
        $suggestPages = Page::where('user_id', '!=', auth()->user()->id)
            ->withCount('likes')
            ->with('likes.user')
            ->get();
        return view('pages.pageList', compact('myPages', 'suggestPages', 'authUser'));
    }

    public function pageCreate()
    {
        $authUser = Auth::user();
        return view('pages.pageCreate', compact('authUser'));
    }

    public function pageStore(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'profile_image' => 'required',
                'cover_image' => 'required',
            ]);
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
            return redirect()->route('page.list')->with('success', 'Page Created Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }

    }

    public function pageProfile($id)
    {
        $pageProfile = Page::where('id', $id)
            ->with(['posts' => function ($query) {
                $query->withCount('likes','comments')->orderBy('created_at', 'desc');
            }, 'posts.user','posts.comments.user', 'posts.comments.replies.user', 'posts.likes'])
            ->withCount('likes')
            ->first();
        $authUser = Auth::user();
        return view('pages.pageProfile', compact('pageProfile', 'authUser'));
    }

    public function pagePostStore(Request $request)
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
            return redirect()->back()->with('success', 'Post created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error creating the post. Please try again.');
        }
    }


    public function storePageComment(Request $request)
    {
        $request->validate([
            'page_post_id' => 'required|numeric',
            'comment' => 'required|string',
        ]);
        $comment = new PagePostComment();
        $comment->user_id = auth()->user()->id;
        $comment->page_post_id = $request->input('page_post_id');
        $comment->comment = $request->input('comment');
        $comment->save();
        return redirect()->back()->with('success', 'Comment added successfully');
    }

    public function storeReplyPageComment(Request $request)
    {
        $request->validate([
            'page_post_comment_id' => 'required|numeric',
            'reply' => 'required|string',
        ]);
        $comment = new PagePostReply();
        $comment->user_id = auth()->user()->id;
        $comment->page_post_comment_id  = $request->input('page_post_comment_id');
        $comment->reply = $request->input('reply');
        $comment->save();
        return redirect()->back()->with('success', 'Reply added successfully');
    }


    public function togglePageLike($pageId)
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
}
