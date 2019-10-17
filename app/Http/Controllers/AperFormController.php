<?php
/**
 * Created by PhpStorm.
 * User: Cranium
 * Date: 11/26/2018
 * Time: 7:56 AM
 */

namespace App\Http\Controllers;


use App\AcademicQualification;
use App\AperForm;
use App\ComplexApprovedApplications;
use App\ComplexComment;
use App\Degree;
use App\FacultyApprovedApplications;
use App\FacultyComment;
use App\HodApprovedApplications;
use App\HodComment;
use App\Publications;
use App\ScoringSystem;
use App\Staff;
use App\StaffChildren;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Response;
use Illuminate\Support\Facades\DB;

/**
 * Class AperFormController
 * @package App\Http\Controllers
 */
class AperFormController
{

    public function index(Request $request){
        if($request->has('search'))
        {
            $staff = AperForm::where('sid', $request->search)
                ->orWhere('application_no', 'LIKE', '%'. $request->search .'%')
                ->orWhere('sid', 'LIKE', '%'. $request->search .'%')
                ->select(DB::raw('*'))
                ->paginate(10)
                ->appends('search', $request->search);
        } else {

            /*$staff = AperForm::select(DB::raw('sid','full_name','rank','dob','department','date_of_first_appointment','date_of_confirmation_of_appointment','date_of_last_promotion','last_promotion_rank',
                'present_salary','present_responsiblities','session','staff_comments','application_no'))
                ->paginate(10);*/
            $staff = DB::table('aper_form')->get();
        }

        return view('admin.aper.index', compact('staff'));
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $user = auth()->user()->sid;
        $check = AperForm::where('sid',$user)->get()->first();
        if($check){
            return view('aper.already_applied');
        }else {
            return view('aper.apply');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function apply(Request $request)
    {
        $form = new AperForm();
        $form->application_no = 'AP' . mt_rand(1000, 9999);
        $form->sid = auth()->user()->sid;
        $form->full_name = auth()->user()->getFullName();
        $form->rank =  auth()->user()->rank;
        $form->department =  auth()->user()->getDepartment();
        $form->dob = auth()->user()->dob;
        $form->session = $request->session;
        $form->date_of_first_appointment = auth()->user()->appointment_date;
        $form->date_of_confirmation_of_appointment = auth()->user()->appointment_confirmation;
        $form->date_of_last_promotion = $request->date_of_last_promotion;
        $form->last_promotion_rank = $request->last_promotion_rank;
        $form->present_salary = $request->present_salary;
        $form->present_responsibilities = $request->present_responsibilities;
        $form->staff_comments = $request->staff_comments;
        if ($form->save()) {
            // $form->application_no = AperForm::appNumber();
            $sid = $form->sid;
            $ac_qua = [];
            //$bill_item['company_id'] = $request['company_id'];
            //$bill_item['bill_id'] = $bill->id;

            if ($request['item']) {
                foreach ($request['item'] as $item) {
                    // unset($tax_object);
                    // $item_sku = '';
                    $ac_qua['qualification'] = $item['qualification'];
                    $ac_qua['awarding_institution'] = $item['awarding_institution'];
                    $ac_qua['sid'] = auth()->user()->sid;
                    $ac_qua['start_date'] = $item['start_date'];
                    $ac_qua['finish_date'] = $item['finish_date'];
                    $ac_qua['level'] = $item['level'];
                    $ac_qua['class'] = $item['class'];

                    AcademicQualification::create($ac_qua);

                    //session()->flash('message', 'Aper Form has been submitted successfully');

                   // return view('aper.success');
                }
            }
            session()->flash('message', 'Aper Form has been submitted successfully');

            return view('aper.success');
        }

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function applicationDetails()
    {
        $id = auth()->user()->sid;
        $ad = Degree::find(1);
        $acad1 = DB::table('academic_qualifications')
            ->where('sid', $id) // who is loggedin
            ->get();
        $pub1 = DB::table('staff_publications')
            ->where('sid', $id) // who is loggedin
            ->get();
        $staff = AperForm::findorFail(auth()->user()->sid);
        $acad = $acad1->toArray();
        //$degree = Degree::select('name')->where('id', $acad->level)->value('name');
        $pub = $pub1->toArray();
        return view('aper.details', compact('acad','staff','pub'));
    }

    /**
     * @param $sid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminAperDetails($sid){
        $acad1 = DB::table('academic_qualifications')
            ->where('sid', $sid) // who is loggedin
            ->get();
        $pub1 = DB::table('staff_publications')
            ->where('sid', $sid) // who is loggedin
            ->get();
        $staff = AperForm::findorFail($sid);
        $acad = $acad1->toArray();
        $pub = $pub1->toArray();
        return view('aper.details', compact('acad','staff','pub'));

    }
    public function edit(AperForm $aperForm)
    {
        return view('aper.edit', compact('aperForm'));
    }

    public function addAcademicQualification(Request $request)
    {
        $ac_qua = [];
        if ($request['item']) {
            foreach ($request['item'] as $item) {

                $ac_qua['qualification'] = $item['qualification'];
                $ac_qua['awarding_institution'] = $item['awarding_institution'];
                $ac_qua['sid'] = auth()->user()->sid;
                $ac_qua['start_date'] = $item['start_date'];
                $ac_qua['finish_date'] = $item['finish_date'];
                $ac_qua['level'] = $item['level'];
                $ac_qua['class'] = $item['class'];

                AcademicQualification::create($ac_qua);
            }
        }
        return redirect()->back();
    }

    public function addStaffChildren(Request $request)
    {
        $staff_children = [];
        if ($request['item']) {
            foreach ($request['item'] as $item) {

                $staff_children['name'] = $item['name'];
                $staff_children['position'] = $item['position'];
                $staff_children['sid'] = auth()->user()->sid;
                $staff_children['age'] = $item['age'];

                StaffChildren::create($staff_children);
            }
        }
        return redirect()->back();
    }

    public function addPublications(Request $request)
    {
        $ac_pub = [];
        if ($request['item']) {
            foreach ($request['item'] as $item) {

                $ac_pub['details'] = $item['details'];
                $ac_pub['url'] = $item['url'];
                $ac_pub['type'] =  $item['type'];
                $ac_pub['sid'] = auth()->user()->sid;
                $ac_pub['date'] = $item['date'];

                Publications::create($ac_pub);
            }
        }
        return redirect()->back();
    }


    public function hodComment(Request $request, $id){

        $response = array();
        $response['code'] = 400;
        $user = Auth::user();
        $aper = AperForm::where('application_no', '=', e($id))->first();
        $text = $request->input('comment');

        if ($aper && !empty($text)){

            $comment = new HodComment();
            $comment->aper_id = $aper->application_no;
            $comment->sid = $aper->sid;
            $comment->hid = auth()->user()->sid;
            $comment->comment = $text;
           $comment->save();
           if ($comment->save){
               $response['code'] = 200;
           }
        }
      return Redirect::back();
    }

    public function hodForms(){
        $staff = AperForm::select('*')->get();
        return view('hod.aper_forms', compact('staff'));
    }

    public function staffAperDetails($sid)
    {
        //$id = auth()->user()->sid;
        $acad1 = DB::table('academic_qualifications')
            ->where('sid', $sid) // who is loggedin
            ->get();
        $pub1 = DB::table('staff_publications')
            ->where('sid', $sid) // who is loggedin
            ->get();
        $staff = AperForm::findorFail($sid);
        $acad = $acad1->toArray();
        //$degree = Degree::select('name')->where('id', $acad->level)->value('name');
        $pub = $pub1->toArray();
        return view('hod.staff_details', compact('acad','staff','pub'));
    }

    //HOD Approval

    /**
     * @param $id
     * @return mixed
     */
    public function hodApproval($id){
        $response = array();
        $response['code'] = 400;

        //$aper = AperForm::findorFail($request->input('id'));
        $aper = AperForm::where('application_no', '=', e($id))->first();
        if ($aper){
            $evaluate = HodApprovedApplications::where('aper_id', $aper->application_no)->get()->first();

            if ($evaluate) {
                if ($evaluate->aper_id == $aper->application_no) {
                    $deleted = HodApprovedApplications::where('aper_id',$id)->delete();
                    if ($deleted){
                        $response['code'] = 200;
                        $response['type'] = 'cancel';
                    }
                }
            }else{
                // Approve
                $evaluate = new HodApprovedApplications();
                $evaluate->aper_id = $aper->application_no;
                $evaluate->sid = $aper->sid;
                $evaluate->approved_by = auth()->user()->sid;
                if ($evaluate->save()){
                    $response['code'] = 200;
                    $response['type'] = 'approve';
                }
            }
        }

        return Response::json($response);
    }

    public function fIndex(){
        $staff = AperForm::select('*')->rightJoin('hodapproved', 'hodapproved.aper_id', '=', 'aper_form.application_no')
            ->select('aper_form.*')->get();
        /*$staff = HodApprovedApplications::whereHas('aper',function ($query) use ($aper){
            $query->where('aper_id', $aper);
        })->get();*/
        return view('faculty.aper_forms', compact('staff'));
    }

    public function facApproval($id){
        $response = array();
        $response['code'] = 400;
        $user = Auth::user();

        //$aper = AperForm::findorFail($request->input('id'));
        $aper = AperForm::where('application_no', '=', e($id))->first();
        if ($aper){
            $evaluate = FacultyApprovedApplications::where('aper_id', $aper->application_no)->get()->first();

            if ($evaluate) {
                if ($evaluate->aper_id == $aper->application_no) {
                    $deleted = FacultyApprovedApplications::where('aper_id',$id)->delete();
                    if ($deleted){
                        $response['code'] = 200;
                        $response['type'] = 'cancel';
                    }
                }
            }else{
                // Approve
                $evaluate = new FacultyApprovedApplications();
                $evaluate->aper_id = $aper->application_no;
                $evaluate->sid = $aper->sid;
                $evaluate->approved_by = auth()->user()->sid;
                if ($evaluate->save()){
                    $response['code'] = 200;
                    $response['type'] = 'approve';
                }
            }
        }

        return Response::json($response);
    }

    public function complexIndex(){
        $staff = AperForm::select('*')->rightJoin('facultyapproved', 'facultyapproved.aper_id', '=', 'aper_form.application_no')
            ->select('aper_form.*')->get();
        return view('complex.aper_forms', compact('staff'));
    }

    public function complexApproval($id){
        $response = array();
        $response['code'] = 400;
        $user = Auth::user();

        //$aper = AperForm::findorFail($request->input('id'));
        $aper = AperForm::where('application_no', '=', e($id))->first();
        if ($aper){
            $evaluate = ComplexApprovedApplications::where('aper_id', $aper->application_no)->get()->first();

            if ($evaluate) {
                if ($evaluate->aper_id == $aper->application_no) {
                    $deleted = ComplexApprovedApplications::where('aper_id',$id)->delete();
                    if ($deleted){
                        $response['code'] = 200;
                        $response['type'] = 'cancel';
                    }
                }
            }else{
                // Approve
                $evaluate = new ComplexApprovedApplications();
                $evaluate->aper_id = $aper->application_no;
                $evaluate->sid = $aper->sid;
                $evaluate->approved_by = $user->sid;
                if ($evaluate->save()){
                    $response['code'] = 200;
                    $response['type'] = 'approve';
                }
            }
        }

        return Response::json($response);
    }

    public function facultyComment(Request $request, $id){

        $response = array();
        $response['code'] = 400;
        $aper = AperForm::where('application_no', '=', e($id))->first();
        $text = $request->input('comment');

        if ($aper && !empty($text)){

            $comment = new FacultyComment();
            $comment->aper_id = $aper->application_no;
            $comment->sid = $aper->sid;
            $comment->dean_id = auth()->user()->sid;
            $comment->comment = $text;
            $comment->save();
            if ($comment->save){
                $response['code'] = 200;
            }
        }
        return Redirect::back();
    }

    public function complexComment(Request $request, $id){

        $response = array();
        $response['code'] = 400;
        $aper = AperForm::where('application_no', '=', e($id))->first();
        $text = $request->input('comment');

        if ($aper && !empty($text)){

            $comment = new ComplexComment();
            $comment->aper_id = $aper->application_no;
            $comment->sid = $aper->sid;
            $comment->chairman_id = auth()->user()->sid;
            $comment->comment = $text;
            $comment->save();
            if ($comment->save){
                $response['code'] = 200;
            }
        }
        return Redirect::back();
    }

    public function feedBack(){
        $id = auth()->user()->sid;
        $aper = AperForm::findorFail(auth()->user()->sid);
        $hod = HodComment::select('*')->where('sid',$id)->get()->first();
        $fac = FacultyComment::select('*')->where('sid',$id)->get()->first();
        $com = ComplexComment::select('*')->where('sid',$id)->get()->first();
        $score= ScoringSystem::select('*')->where('sid',$id)->get()->first();
        return view('aper.feedback', compact('aper','hod','fac','com','score'));
    }

    public function evaluation($sid){

        $acad1 = DB::table('academic_qualifications')
            ->where('sid', $sid) // who is loggedin
            ->get();
        $staff = Staff::find($sid);
        $aper = AperForm::findorFail($sid);
        $acad = $acad1->toArray();
        $score= ScoringSystem::select('*')->where('sid',$sid)->get()->first();
        return view('aper.evaluation', compact('staff','acad','aper','score'));
    }

    public function promotedStaff(){
       $staff=DB::table('scoring_system')->where('scoring_system.percent','>=','65')->join('aper_form','aper_form.application_no', '=','scoring_system.appno')->get();
        return view('aper.promoted', compact('staff'));
    }

    public function notpromotedStaff(){
        $staff=DB::table('scoring_system')->where('scoring_system.percent','<','65')->join('aper_form','aper_form.application_no', '=','scoring_system.appno')->get();
        return view('aper.not-promoted', compact('staff'));
    }
}
