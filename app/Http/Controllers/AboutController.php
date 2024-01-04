<?php

namespace App\Http\Controllers;
use App\Models\Designation;
use App\Models\Education;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function designationStore(Request $request)
    {
        try {
            $request->validate([
                'job_title' => 'required',
                'company_name' => 'required',
            ]);
            $authUser = Auth::user();
            $designation = new Designation();
            $designation->user_id = $authUser->id;
            $designation->job_title = $request->job_title;
            $designation->company_name = $request->company_name;
            $designation->short_description = $request->short_description;
            $designation->start_date = $request->start_date;
            $designation->end_date = $request->end_date;
            $designation->save();
            return redirect()->back()->with('success', 'Designation added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function linkStore(Request $request)
    {
        try {
            $request->validate([
                'type' => 'required',
                'link' => 'required',
            ]);
            $authUser = Auth::user();
            $link = new SocialLink();
            $link->user_id = $authUser->id;
            $link->type = $request->type;
            $link->link = $request->link;
            $link->save();
            return redirect()->back()->with('success', 'SocialLink added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function educationStore(Request $request)
    {
        try {
            $request->validate([
                'institute_name' => 'required',
                'degree_name' => 'required',
            ]);
            $authUser = Auth::user();
            $education = new Education();
            $education->user_id = $authUser->id;
            $education->institute_name = $request->institute_name;
            $education->degree_name = $request->degree_name;
            $education->passing_year = $request->passing_year;
            $education->save();
            return redirect()->back()->with('success', 'Education added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
