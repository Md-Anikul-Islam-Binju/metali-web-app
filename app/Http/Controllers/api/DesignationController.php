<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DesignationController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validateDesignation = Validator::make($request->all(), [
                'job_title' => 'required',
            ]);
            if ($validateDesignation->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validateDesignation->errors(),
                ], 401);
            }
            $user = auth()->user();
            $designation = Designation::create([
                'user_id' => $user->id,
                'job_title' => $request->job_title,
                'company_name' => $request->company_name,
                'short_description' => $request->short_description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => 1,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Designation created successfully',
                'designation' => [$designation],
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }


    public function getAuthUserDesignation()
    {
        $user = Auth::user();
        if ($user) {
            $designation = Designation::where('user_id', $user->id)->get();
            return response()->json([
                'status' => true,
                'designation' => $designation,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Designation not found',
            ], 401);
        }
    }
}
