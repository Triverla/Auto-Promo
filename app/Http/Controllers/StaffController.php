<?php

namespace App\Http\Controllers;

use App\Department;
use App\Faculty;
use App\FileUpload;
use App\Http\Controllers\Controller;
use App\Rank;
use App\Staff;
use App\StaffChildren;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Image;

class StaffController extends Controller
{
    public function Profile()
    {
        return view('staff.register');
    }

    public function addStaffChildrens(Request $request)
    {
        $this->validate($request, [
            'sid' => 'required|unique:staff_children',
            'child_name' => 'required|min:3|max:255',
            'position' => 'required',
            'age' => 'required'
        ]);
        $input = Input::all();
        $insert = array();
        foreach ($input['child_name'] as $key => $child) {
            $insert[$key]['child_name'] = $child;
        }
        foreach ($input['age'] as $key => $age) {
            $insert[$key]['age'] = $age;
        }
        foreach ($input['position'] as $key => $position) {
            $insert[$key]['position'] = $position;
        }
        StaffChildren::insert($insert);
    }


    public function addStaffChildren(Request $request)
    {
        $this->validate($request, [
            //'sid' => 'required|unique:staff_children',
            'child_name' => 'required|min:3|max:255',
            'position' => 'required',
            'age' => 'required'
        ]);
        $staff = $request->all();
        if ($staff->save()) {
            // Submitted record
            $children = $request->child_name;

            // Book records to be saved
            $staff_children = [];

            // Add needed information to book records
            foreach ($children as $child => $v) {
                if (!empty($v)) {
                    // Get the current time
                    $now = Carbon::now();

                    // Formulate record that will be saved
                    $staff_children = [
                        'sid' => Auth::user(),
                        'child_name' => $v,
                        'position' => $request->position [$child],
                        'age' => $request->age [$child],
                        'updated_at' => $now [$child],  // remove if not using timestamps
                        'created_at' => $now [$child]   // remove if not using timestamps
                    ];
                }
            }

            StaffChildren::insert($staff_children);
            // Insert book records
            // StaffChildren::insert($staff_children);
            DB::table('staff_children')->insert($staff_children);
            return response(StaffChildren::create($request->all()));
            //return response()->json($staff);
        }
    }

    public function update(Request $request)
    {
        //dd($request);
        $staff = Staff::find(Auth::user()->sid);
        $this->validate($request, [
            //'sid' => 'required|unique:staff',
            'first_name' => 'required|min:3|max:255',
            'last_name' => 'required|min:3|max:255',
            'middle_name' => 'required|min:3|max:255',
            //'password' => 'required|min:6|confirmed',
            'post' => 'required|min:3|max:255',
            'faculty_id' => 'required',
            'religion' => 'required|min:3|max:255',
            'department_id' => 'required',
            //'role_id' => 'required',
            'lga' => 'required|min:3|max:255',
            'pob' => 'required|min:3|max:255',
            'sex' => 'required|min:3|max:255',
            'dob' => 'required|date|before_or_equal:' . \Carbon\Carbon::now()->subYears(18)->format('Y-m-d'),
            'state' => 'required|min:3|max:255',
            'nationality' => 'required|min:3|max:255',
            'perm_home_address' => 'required|min:3|max:255',
            'current_postal_position' => 'required|min:3|max:255',
            'phone_number' => 'required|min:3|max:255',
            //'email' => 'required|email',
            'marital_status' => 'required|min:3|max:255',
            'number_of_children' => 'min:3|max:255',
            'institutions_attended' => 'min:3|max:255',
            'academic_qualifications' => 'min:3|max:255',
            'appointment_date' => 'required',
            'rank' => 'required',
            'appointment_confirmation' => 'required',
            'passport' => 'mimes:jpeg,bmp,png,jpg,x-png'
        ]);

        $input = $request->all();
        $staff->fill($input)->save();

        session()->flash('message', 'Profile has been successfully updated!');

        return redirect()->route('staff.profile');
    }

    public function show(){
        $id = auth()->user()->sid;
        $acad1 = DB::table('academic_qualifications')
            ->where('sid', $id) // who is loggedin
            ->get();
        $staffChdrn = DB::table('staff_children')
            ->where('sid', $id) // who is loggedin
            ->get();
        $staff = Staff::find(Auth::user()->sid);
        $acad = $acad1->toArray();
        $stfchd = $staffChdrn->toArray();
        $rank = Rank::select('name')->where('id', $staff->rank)->value('name');
        $dept = Department::select('name')->where('id', $staff->department_id)->value('name');
        $fac = Faculty::select('name')->where('id', $staff->faculty_id)->value('name');
        return view('staff.profile', compact('staff','stfchd','acad','dept','fac','rank'));
    }

    public function update_passport(Request $request){

        // Handle the user upload of avatar
        if($request->hasFile('passport')){
            $passport = $request->file('passport');
            $filename = time() . '.' . $passport->getClientOriginalExtension();
            Image::make($passport)->resize(300, 300)->save( public_path('/passports/' . $filename ) );

            $staff = Auth::user();
            $staff->passport = $filename;
            $staff->save();
        }

        return redirect()->back();

    }
}
