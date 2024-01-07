<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Page;
use App\Models\TimelinePostLike;
use App\Models\User;
use App\Models\UserPost;
use App\Models\UserPostComment;
use App\Models\UserPostReplie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TimelineController extends Controller
{
    public function updateProfilePageShow(Request $request)
    {
        $authUser = Auth::user();
        return view('pages.updateProfile',compact('authUser'));
    }
    public function updateProfile(Request $request)
    {
      // dd($request->all());
        try {
            $userId = Auth::id();

            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'gender' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->route('profile.edit')->withErrors($validator)->withInput();
            }
            $user = Auth::user();
            $user->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'gender' => $request->input('gender'),
                'short_bio' => $request->input('short_bio'),
                'address' => $request->input('address'),
                'relation_status' => $request->input('relation_status'),
            ]);
            if ($request->hasFile('profile_photo')) {
                $profilePhotoPath = $request->file('profile_photo')->store('public/profile_photos');
                $user->update(['profile_photo' => basename($profilePhotoPath)]);
            }
            if ($request->hasFile('cover_photo')) {
                $coverPhotoPath = $request->file('cover_photo')->store('public/cover_photos');
                $user->update(['cover_photo' => basename($coverPhotoPath)]);
            }
            return redirect()->route('timeline')->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('profile.update')->with('error', 'Failed to update profile. Please try again.');
        }
    }



    public function timeline()
    {
        $authUser = Auth::user();
        $userPost = UserPost::with('user','comments.user','comments.replies','comments.replies.user')
            ->withCount('timelinePostLikes', 'comments')
            ->latest()->get();
        //dd($userPost);
        if($authUser->role==2){
            return view('pages.timeline',compact('authUser','userPost'));
        }elseif ($authUser->role==1){
            $totalUser = User::where('role',2)->count();
            $totalPage = Page::count();
            $totalGroup = Group::count();
            $totalPost = UserPost::count();
            return view('admin.dashboard',compact('totalGroup','totalPage','totalPost','totalUser'));
        }

    }


    public function storeComment(Request $request)
    {
        $request->validate([
            'user_post_id' => 'required|numeric',
            'comment' => 'required|string',
        ]);
        $comment = new UserPostComment();
        $comment->user_id = auth()->user()->id;
        $comment->user_post_id = $request->input('user_post_id');
        $comment->comment = $request->input('comment');
        $comment->save();
        return redirect()->back()->with('success', 'Comment added successfully');
    }

    public function storeReplyComment(Request $request)
    {
        $request->validate([
            'user_post_comment_id' => 'required|numeric',
            'reply' => 'required|string',
        ]);
        $comment = new UserPostReplie();
        $comment->user_id = auth()->user()->id;
        $comment->user_post_comment_id = $request->input('user_post_comment_id');
        $comment->reply = $request->input('reply');
        $comment->save();
        return redirect()->back()->with('success', 'Reply Comment added successfully');
    }


    public function toggleLike(Request $request, $postId)
    {
        $userPostId = $postId;
        $userId = auth()->user()->id;
        $existingLike = TimelinePostLike::where('user_id', $userId)
            ->where('user_post_id', $userPostId)
            ->first();
        if ($existingLike) {
            $existingLike->delete();
            $liked = false;
        } else {
            TimelinePostLike::create([
                'user_id' => $userId,
                'user_post_id' => $userPostId,
            ]);
            $liked = true;
        }
        return response()->json(['liked' => $liked]);
    }
}
