<?php

namespace App\Http\Controllers\api;

use App\Events\NewMessage;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\FriendRequests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function storeMessage(Request $request)
    {
        $request->validate([
            'message_receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);
        $chat = Chat::create([
            'message_sender_id' => auth()->id(),
            'message_receiver_id' => $request->input('message_receiver_id'),
            'message' => $request->input('message'),
        ]);
        broadcast(new NewMessage($chat));
        return response()->json(['data' => ['chat' => $chat]], 201);
    }

    public function getMessages($receiverId)
    {
        $chats = Chat::where(function ($query) use ($receiverId) {
            $query->where('message_sender_id', Auth::id())
                ->where('message_receiver_id', $receiverId);
        })->orWhere(function ($query) use ($receiverId) {
            $query->where('message_sender_id', $receiverId)
                ->where('message_receiver_id', Auth::id());
        })->orderBy('created_at')->paginate(10);

        return response()->json(['data' => ['chats' => $chats]], 200);
    }
}
