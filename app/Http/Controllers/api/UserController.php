<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;


class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'birthday' => 'required',
                'password' => 'required',
                'confirmation_password' => 'required|same:password',
            ]);

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $userData = [
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'gender' => $request->input('gender'),
                'birthday' => $request->input('birthday'),
                'role' => 1,
                'status' => 1,
                'password' => Hash::make($request->input('password'))
            ];

            if ($request->has('email')) {
                $validateEmail = Validator::make($request->all(), [
                    'email' => 'email|unique:users,email',
                ]);

                if ($validateEmail->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Email validation error',
                        'errors' => $validateEmail->errors()
                    ], 401);
                }

                $userData['email'] = $request->input('email');
            }

            if ($request->has('phone')) {
                $userData['phone'] = $request->input('phone');
            }
            $user = User::create($userData);
            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'user' => $user,
                'token' =>  $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] === 1062) {
                return response()->json([
                    'status' => false,
                    'message' => 'The phone number is already in use. Please try a different number.'
                ], 409);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => $e->getMessage()
                ], 500);
            }
        }
    }


    public function login(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), [
                'user' => 'required',
                'password' => 'required',
            ]);

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validateUser->errors(),
                ], 401);
            }

            $user = User::where(function ($query) use ($request) {
                $query->where('email', $request->user)
                    ->orWhere('phone', $request->user);
            })->first();

            if (!$user || !Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email/Phone and Password do not match with our records.',
                ], 401);
            }

            // Get user info
            $userInfo = [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'gender' => $user->gender,
                'birthday' => $user->birthday,
                'role' => $user->role,
                'status' => $user->status,
                'email' => $user->email,
                'phone' => $user->phone,
                'updated_at' => $user->updated_at,
                'created_at' => $user->created_at,
                'id' => $user->id,
            ];

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'user' => $userInfo,
                'token' => $user->createToken("API TOKEN")->plainTextToken,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function profile()
    {
        $user = Auth::user();

        if ($user) {
            $educations = $user->educations;
            $designations = $user->designations;
            $links = $user->links;
            return response()->json([
                'profile' => $user,
            ], 200);
        } else {
            return response()->json([
                'message' => 'User not authenticated',
            ], 401);
        }
    }

    public function updateProfile(Request $request)
    {
        try {
            $user = User::findOrFail(Auth::user()->id);
            $user->update([
                'address' => $request->address,
                'relation_status' => $request->relation_status,
                'short_bio' => $request->short_bio,
                'political_status' => $request->political_status,
                'religion' => $request->religion,
            ]);

            if ($request->hasFile('cover_photo')) {
                $coverPhotoPath = $request->file('cover_photo')->store('cover_photos', 'public');
                $coverPhotoFileName = pathinfo($coverPhotoPath, PATHINFO_BASENAME);
                $user->update(['cover_photo' => $coverPhotoFileName]);
            }

            if ($request->hasFile('profile_photo')) {
                $profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');
                $profilePhotoFileName = pathinfo($profilePhotoPath, PATHINFO_BASENAME);
                $user->update(['profile_photo' => $profilePhotoFileName]);
            }

            return response()->json([
                'status' => true,
                'message' => 'Profile updated successfully',
                'profile' => $user,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }


    public function logout(): JsonResponse
    {
        $user = auth()->user();
        $user->tokens->each(function (PersonalAccessToken $token) {
            $token->delete();
        });
        return response()->json([
            'status' => true,
            'message' => 'User logged out successfully.',
        ], 200);
    }


}
