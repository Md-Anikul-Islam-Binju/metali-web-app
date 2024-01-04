<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chat()
    {
        $authUser = auth()->user();
        return view('pages.chat',compact('authUser'));
    }
}
