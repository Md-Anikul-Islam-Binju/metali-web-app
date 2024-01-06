<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chat($userId = null)
    {
        $authUser = auth()->user();
        $friends = $authUser->friends;
        $selectedUser = null;
        if ($userId) {
            $selectedUser = User::find($userId);
        }
        $messages = Chat::where(function ($query) use ($authUser, $selectedUser) {
            if ($authUser && $selectedUser) {
                $query->where('message_sender_id', $authUser->id)
                    ->where('message_receiver_id', $selectedUser->id);

                $query->orWhere('message_sender_id', $selectedUser->id)
                    ->where('message_receiver_id', $authUser->id);
            }
        })->get();

        return view('pages.chat',compact('authUser','friends','selectedUser','messages'));
    }

    public function sendMessage(Request $request)
    {

        $message = new Chat([
            'message_sender_id' => auth()->user()->id,
            'message_receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        $message->save();

        broadcast(new NewMessage($message));

        return response()->json([
            'status' => 'Message Sent!',
            'message' => $message,
        ]);
    }
}
