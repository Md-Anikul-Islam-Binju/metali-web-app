<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\FriendRequests;
use App\Models\User;
use Illuminate\Http\Request;

class FriendRequestController extends Controller
{

    public function index()
    {
        try {
            $user = auth()->user();
            $friends = $user->friends;
            return response()->json(['friends' => $friends]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error fetching friends.'], 500);
        }
    }

    public function unfriendUser(User $friend)
    {
        try {
            $user = auth()->user();
            $user->friends()->detach($friend);

            return response()->json(['message' => 'User unfriended.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error unfriending user.'], 500);
        }
    }


    public function getSuggestedFriends()
    {
        try {
            $user = auth()->user();
            $suggestedFriends = User::whereNotIn('users.id', $user->friends()->pluck('users.id')->toArray())
                ->where('users.id', '!=', $user->id)
                ->where('role',2)
                ->inRandomOrder()
                ->limit(10)
                ->get();
            return response()->json(['suggestedFriends' => $suggestedFriends]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error fetching suggested friends: ' . $e->getMessage()], 500);
        }
    }

    public function getPendingFriendRequests()
    {
        $user = auth()->user();
        $pendingRequests = $user->receivedFriendRequests()->with('sender')->get();

        return response()->json(['pendingRequests' => $pendingRequests]);
    }


    public function sendRequest(User $receiver)
    {
        try {
            $sender = auth()->user();
            // Check if a friend request has already been sent
            if ($sender->sentFriendRequests()->where('receiver_id', $receiver->id)->exists()) {
                return response()->json(['message' => 'Friend request already sent.'], 400);
            }
            $friendRequest = $sender->sentFriendRequests()->create([
                'receiver_id' => $receiver->id,
            ]);
            return response()->json(['message' => 'Friend request sent.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error sending friend request.'], 500);
        }
    }

    public function acceptRequest(FriendRequests $request)
    {
        try {
            $receiver = auth()->user();

            if ($request->receiver_id !== $receiver->id) {
                return response()->json(['message' => 'Unauthorized.'], 403);
            }

            $request->sender->friends()->attach($request->receiver_id);
            $receiver->friends()->attach($request->sender_id);
            $request->delete();

            return response()->json(['message' => 'Friend request accepted.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error accepting friend request.'], 500);
        }
    }
}
