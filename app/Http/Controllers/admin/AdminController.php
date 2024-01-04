<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function adminLoginForm()
    {
        return view('admin.adminLogin');
    }

    public function adminLoginSuccess(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('timeline'));
        }
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['email' => 'Invalid email or password']);

    }

    public function adminLogout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }
}
