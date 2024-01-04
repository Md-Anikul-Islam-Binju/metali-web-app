<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class EducationController extends Controller
{
    public function createEducation(Request $request)
    {
        try {
            $validateEducation = Validator::make($request->all(), [
                'institute_name' => 'required',
            ]);

            if ($validateEducation->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validateEducation->errors(),
                ], 401);
            }

            $user = auth()->user();
            $education = Education::create([
                'user_id' => $user->id,
                'institute_name' => $request->institute_name,
                'degree_name' => $request->degree_name,
                'passing_year' => $request->passing_year,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Education created successfully',
                'education' => [$education]
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function getAuthUserEducation()
    {
        $user = Auth::user();
        if ($user) {
            $education = Education::where('user_id', $user->id)->get();
            return response()->json([
                'status' => true,
                'education' => $education,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Education not found',
            ], 401);
        }
    }
}
