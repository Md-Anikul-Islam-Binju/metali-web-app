<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Education;
use App\Models\SocialLink;
use App\Models\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyProfileController extends Controller
{
    public function myProfile()
    {
        $authUser = Auth::user();
        $education = Education::where('user_id',$authUser->id)->first();
        $designation = Designation::where('user_id',$authUser->id)->first();
        $link = SocialLink::where('user_id',$authUser->id)->first();
        $userPost = UserPost::where('user_id',$authUser->id)
            ->with('user','comments.user','comments.replies','comments.replies.user')
            ->withCount('timelinePostLikes', 'comments')
            ->latest()->get();

        return view('pages.myProfile',compact('authUser','userPost','education','designation','link'));
    }


    public function userPost(Request $request)
    {
        $request->validate([
            'post_details' => 'required',
            'status' => 'required|in:1,2,3',
            'image.*' => 'required|image',
            'video' => 'file|mimes:mp4,mov,avi|max:20480',
        ]);

        try {
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
            $post = UserPost::create([
                'user_id' => $userId,
                'post_details' => $request->input('post_details'),
                'status' => $request->input('status'),
                'videos' => $videoName ?? null,
                'image' => json_encode($imagePaths),
            ]);
            return redirect()->route('profile')->with('success', 'Post created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('profile')->with('error', 'Error creating the post. Please try again.');
        }
    }



}
