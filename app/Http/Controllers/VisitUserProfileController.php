<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VisitUserProfileController extends Controller
{
    public function visitUserProfile($id)
    {
        $user = User::where('id',$id)

            ->with('userPost','userPost.comments.user','userPost.comments.replies.user')->first();

        return view('pages.visitUserProfile',compact('user'));
    }
}
