<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SocialLinkController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validateLink = Validator::make($request->all(), [
                'link' => 'required',
            ]);
            if ($validateLink->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validateLink->errors(),
                ], 401);
            }
            $user = auth()->user();
            $socialLink = SocialLink::create([
                'user_id' => $user->id,
                'link' => $request->link,
                'type' => $request->type,
                'status' => 1,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Social Link created successfully',
                'social_link' => [$socialLink],
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }


    public function getAuthUserSocialLink()
    {
        $user = Auth::user();
        if ($user) {
            $socialLink = SocialLink::where('user_id', $user->id)->get();
            return response()->json([
                'status' => true,
                'designation' => $socialLink,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'SocialLink not found',
            ], 401);
        }
    }
}
