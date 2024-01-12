<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
            ]);

            if ($validateUser->fails()) {
                return redirect()->route('user.register')->withErrors($validateUser)->withInput();
            }
            $user = User::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'gender' => $request->input('gender'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]);
            // Use the 'mymetali-chat' database connection for the 'users' table
            DB::connection('mymetali-chat')->table('users')->insert([
                'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
            // Authenticate the user
            Auth::login($user);
            return redirect()->route('profile.update')->with('success', 'Registration successful! Please log in.');
        } catch (\Exception $e) {
            return redirect()->route('user.register')->with('error', 'Registration failed. Please try again.');
        }
    }


    public function showLoginForm()
    {
        return view('pages.login');
    }

    public function loginSuccess(Request $request)
    {
        try {
            $request->validate([
                'login_identifier' => 'required',
                'password' => 'required',
            ]);

            $credentials = $request->only('login_identifier', 'password');

            // Check if the login identifier is an email or phone number
            $field = filter_var($credentials['login_identifier'], FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

            // Add the determined field to the credentials array
            $credentials[$field] = $credentials['login_identifier'];
            unset($credentials['login_identifier']);

            if (Auth::attempt($credentials)) {
                // Authentication passed...
                return redirect()->route('timeline')->with('success', 'Login successful!');
            } else {
                throw ValidationException::withMessages([
                    'login_identifier' => ['Invalid credentials. Please try again.'],
                ]);
            }
        } catch (ValidationException $e) {
            return redirect()->route('user.login')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->route('user.login')->with('error', 'Login failed. Please try again.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login')->with('success', 'Logged out successfully.');
    }

}
