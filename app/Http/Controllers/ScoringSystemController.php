<?php

namespace App\Http\Controllers;

use App\AcademicQualification;
use App\AperForm;
use App\Publications;
use App\ScoringSystem;
use App\Staff;
use Illuminate\Support\Facades\Redirect;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScoringSystemController extends Controller
{
    public function index()
    {
        $ss=ScoringSystem::all();
        $a =AperForm::all();

        return view('aper.forms',compact('ss','a'));
    }

    public function score($id)
    {
        $response = array();
        $response['code'] = 400;
        // $user = Auth::user();
        $aper = AperForm::where('application_no', '=', e($id))->first();

        if ($aper) {
            $sid = AperForm::select('sid')->where('application_no', $id)->get()->first();
            $ssid = $sid->sid;
            $appno = AperForm::select('application_no')->where('application_no', $id)->get()->first();
            $rank = AperForm::select('rank')->where('application_no', $id)->get()->first();
            $degreef = AcademicQualification::where('level', '=', 'FD')->where('sid', $ssid)->value('level');
            $degreem = AcademicQualification::where('level', '=', 'MD')->where('sid', $ssid)->value('level');
            $degreed = AcademicQualification::select('level')->where('level', '=', 'DD')->where('sid', $ssid)->value('level');
            $aca_lead = Staff::select('post')->where('sid', $ssid)->get()->first();
            $publication = Publications::select('type')->where('sid', $ssid)->get();
            $duplicate = ScoringSystem::where('appno', '=', $id)->where('sid', '=', $ssid)->get();

            if ($duplicate->count() > 0) {
                //print_r($duplicate);
                Session::flash('error', 'Sorry, you have already evaluated this staff on this evaluation period.');
                return Redirect::route('supervisors.user.list');

            }
            if ($rank->rank == 'GA') {
                $ss = new ScoringSystem();
                $ss->appno = $id;
                $ss->sid = $sid->sid;
                $ss->rank = $rank->rank;
                if ($degreem == 'MD') {
                    $ss->qualification = $ss->qualification + 4;//DB::raw('UPDATE scoring_system SET qualification = qualification + 4 WHERE sid = $id');
                } elseif ($degreef == 'FD') {
                    $ss->qualification = $ss->qualification + 2;//DB::raw('UPDATE scoring_system SET qualification = qualification + 2 WHERE sid = $id');
                }
                $ss->referee_report = 3;//DB::raw('UPDATE scoring_system SET referee_report = scoring_system.referee_report + 3 WHERE sid = $id');
                $ss->interview = 17;//DB::raw('UPDATE scoring_system SET interview = scoring_system.interview + 17 WHERE sid = $sid');
                $ss->total_score = $ss->qualification + $ss->referee_report + $ss->interview;
                $ss->totalmin_qualifying_score = 65;
                $ss->percent = ($ss->total_score / $ss->totalmin_qualifying_score) * 100;
                $ss->save(); //DB::raw('UPDATE scoring_system SET total_score = (qualification + referee_report + interview) WHERE sid = $id');
                if ($ss->save()) {
                    $response['code'] = 200;
                    $response['type'] = 'cancel';

                }
            } elseif ($rank->rank == 'AL') {
                $ss = new ScoringSystem();
                $ss->appno = $id;
                $ss->sid = $sid->sid;
                $ss->rank = $rank->rank;
                if ($degreem == 'MD') {
                    $ss->qualification = $ss->qualification + 4;//DB::raw('UPDATE scoring_system SET qualification = qualification + 4 WHERE sid = $id');
                } elseif ($degreef == 'FD') {
                    $ss->qualification = $ss->qualification + 2;//DB::raw('UPDATE scoring_system SET qualification = qualification + 2 WHERE sid = $id');
                }
                $ss->publication = $ss->publication + 2;//DB::raw('UPDATE scoring_system SET publication = scoring_system.publication + 2 WHERE sid = $id');
                $ss->teaching_experience = $ss->teaching_experience + 3;//DB::raw('UPDATE scoring_system SET teaching_experience = scoring_system.teaching_experience + 3 WHERE sid = $id');
                $ss->referee_report = 3;//DB::raw('UPDATE scoring_system SET referee_report = scoring_system.referee_report + 3 WHERE sid = $id');
                $ss->interview = 17;//DB::raw('UPDATE scoring_system SET interview = scoring_system.interview + 17 WHERE sid = $id');
                $ss->total_score = $ss->qualification + $ss->publication + $ss->teaching_experience + $ss->referee_report + $ss->interview;
                $ss->totalmin_qualifying_score = 65;
                $ss->percent = ($ss->total_score / $ss->totalmin_qualifying_score) * 100;
                $ss->save();//total_score = DB::raw('UPDATE scoring_system SET total_score = (qualification + publication + teaching_experience + referee_report + interview) WHERE sid = $id');
                if ($ss->save()) {
                    $response['code'] = 200;
                    $response['type'] = 'cancel';
                }
            } elseif ($rank->rank == 'L2') {
                $ss = new ScoringSystem();
                $ss->appno = $id;
                $ss->sid = $sid->sid;
                $ss->rank = $rank->rank;
                if ($degreem == 'MD') {
                    $ss->qualification = $ss->qualification + 5;//DB::raw('UPDATE scoring_system SET qualification = qualification + 4 WHERE sid = $sid');
                } elseif ($degreef == 'FD') {
                    $ss->qualification = $ss->qualification + 2;//DB::raw('UPDATE scoring_system SET qualification = qualification + 2 WHERE sid = $sid');
                }

                $pub = [];
                foreach ($publication as $event){
                    $pub[] = $event->type;
                }

                $score = 0;

                foreach ($pub as $pb){
                    switch ($pb){
                        case 'ebook':
                            $score += 4;
                            break;
                        case 'journal':
                            $score += 2;
                            break;
                        case 'monograph':
                            $score += 2;
                            break;
                        case 'researchreport':
                            $score += 1;
                            break;
                        case 'creativework':
                            $score += 1;
                            break;
                        case 'bookreview':
                            $score += 1;
                            break;
                    }
                }
                $ss->publication = $score;

                switch ($aca_lead) {
                    case 'HOD' || 'EO' || 'LC' || 'RO' :
                        $ss->academic_leadership = $ss->academic_leadership + 1;//DB::raw('UPDATE scoring_system SET academic_leadership = scoring_system.academic_leadership + 1 WHERE sid = $id');
                        break;
                    case 'DVC' || 'DEAN' || 'DIRECTOR' :
                        $ss->academic_leadership = $ss->academic_leadership + 2;//DB::raw('UPDATE scoring_system SET academic_leadership = scoring_system.academic_leadership + 2 WHERE sid = $id');
                        break;
                    case $aca_lead == 'vc' :
                        $ss->academic_leadership = $ss->academic_leadership + 3;//DB::raw('UPDATE scoring_system SET academic_leadership = scoring_system.academic_leadership + 3 WHERE sid = $id');
                        break;
                    default :
                        $ss->academic_leadership = 2;//DB::raw('UPDATE scoring_system SET academic_leadership = scoring_system.academic_leadership + 0 WHERE sid = $id');
                        break;
                }

                $ss->community_service = 2;//DB::raw('UPDATE scoring_system SET community_service = scoring_system.community_service + 2 WHERE sid = $id');
                $ss->teaching_experience = $ss->teaching_experience + 6;// DB::raw('UPDATE scoring_system SET teaching_experience = scoring_system.teaching_experience + 6 WHERE sid = $id');
                $ss->referee_report = 3;// DB::raw('UPDATE scoring_system SET referee_report = scoring_system.referee_report + 3 WHERE sid = $id');
                $ss->interview = 17;//DB::raw('UPDATE scoring_system SET interview = scoring_system.interview + 17 WHERE sid = $id');
                $ss->student_assessment = 6;//DB::raw('UPDATE scoring_system SET interview = scoring_system.interview + 17 WHERE sid = $id');
                $ss->total_score = $ss->qualification + $ss->publication + $ss->academic_leadership + $ss->community_service + $ss->teaching_experience + $ss->interview + $ss->referee_report + $ss->student_assessment;
                $ss->totalmin_qualifying_score = 65;
                $ss->percent = ($ss->total_score / $ss->totalmin_qualifying_score) * 100;
                $ss->save();  //DB::raw('UPDATE scoring_system SET total_score = sum(qualification + publication + academic_leadership + community_service + teaching_experience + referee_report + interview) WHERE sid = $id');
                if ($ss->save()) {
                    $response['code'] = 200;
                    $response['type'] = 'cancel';
                }
            } elseif ($rank->rank == 'L1') {
                $ss = new ScoringSystem();
                $ss->appno = $id;
                $ss->sid = $sid->sid;
                $ss->rank = $rank->rank;
                if ($degreed == 'DD') {
                    $ss->qualification = $ss->qualification + 8;
                } elseif ($degreem == 'MD') {
                    $ss->qualification = $ss->qualification + 5;//DB::raw('UPDATE scoring_system SET qualification = qualification + 4 WHERE sid = $sid');
                } elseif ($degreef == 'FD') {
                    $ss->qualification = $ss->qualification + 2;//DB::raw('UPDATE scoring_system SET qualification = qualification + 2 WHERE sid = $sid');
                }

                $pub = [];
                foreach ($publication as $event){
                    $pub[] = $event->type;
                }

                $score = 0;

                foreach ($pub as $pb){
                    switch ($pb){
                        case 'ebook':
                            $score += 4;
                            break;
                        case 'journal':
                            $score += 2;
                            break;
                        case 'monograph':
                            $score += 2;
                            break;
                        case 'researchreport':
                            $score += 1;
                            break;
                        case 'creativework':
                            $score += 1;
                            break;
                        case 'bookreview':
                            $score += 1;
                            break;
                    }
                }
                $ss->publication = $score;

                $ss->professional_activities = 6;

                switch ($aca_lead) {
                    case 'HOD' :
                        $ss->academic_leadership = $ss->academic_leadership + 1;//DB::raw('UPDATE scoring_system SET academic_leadership = scoring_system.academic_leadership + 1 WHERE sid = $id');
                        break;
                    case 'DVC' || 'DEAN' || 'DIRECTOR' :
                        $ss->academic_leadership = $ss->academic_leadership + 2;//DB::raw('UPDATE scoring_system SET academic_leadership = scoring_system.academic_leadership + 2 WHERE sid = $id');
                        break;
                    case $aca_lead == 'vc' :
                        $ss->academic_leadership = $ss->academic_leadership + 3;//DB::raw('UPDATE scoring_system SET academic_leadership = scoring_system.academic_leadership + 3 WHERE sid = $id');
                        break;
                    default :
                        $ss->academic_leadership = 3;//DB::raw('UPDATE scoring_system SET academic_leadership = scoring_system.academic_leadership + 0 WHERE sid = $id');
                        break;
                }

                $ss->community_service = 2;
                $ss->teaching_experience = $ss->teaching_experience + 9;
                $ss->referee_report = 3;
                $ss->interview = 17;
                $ss->student_assessment = 6;
                $ss->total_score = $ss->qualification + $ss->publication + $ss->professional_activities + $ss->academic_leadership + $ss->community_service + $ss->teaching_experience + $ss->interview + $ss->referee_report + $ss->student_assessment;
                $ss->totalmin_qualifying_score = 65;
                $ss->percent = ($ss->total_score / $ss->totalmin_qualifying_score) * 100;
                $ss->save();
                if ($ss->save()) {
                    $response['code'] = 200;
                    $response['type'] = 'cancel';
                }
            } elseif ($rank->rank == 'SL') {
                $ss = new ScoringSystem();
                $ss->appno = $id;
                $ss->sid = $sid->sid;
                $ss->rank = $rank->rank;
                if ($degreed == 'DD') {
                    $ss->qualification = $ss->qualification + 8;
                } elseif ($degreem == 'MD') {
                    $ss->qualification = $ss->qualification + 5;
                } elseif ($degreef == 'FD') {
                    $ss->qualification = $ss->qualification + 2;
                }

                $pub = [];
                foreach ($publication as $event){
                    $pub[] = $event->type;
                }

                $score = 0;

                foreach ($pub as $pb){
                    switch ($pb){
                        case 'ebook':
                            $score += 4;
                            break;
                        case 'journal':
                            $score += 2;
                            break;
                        case 'monograph':
                            $score += 2;
                            break;
                        case 'researchreport':
                            $score += 1;
                            break;
                        case 'creativework':
                            $score += 1;
                            break;
                        case 'bookreview':
                            $score += 1;
                            break;
                    }
                }
                $ss->publication = $score;
                $ss->professional_activities = 6;

                switch ($aca_lead) {
                    case 'HOD' :
                        $ss->academic_leadership = $ss->academic_leadership + 1;//DB::raw('UPDATE scoring_system SET academic_leadership = scoring_system.academic_leadership + 1 WHERE sid = $id');
                        break;
                    case 'DVC' || 'DEAN' || 'DIRECTOR' :
                        $ss->academic_leadership = $ss->academic_leadership + 2;//DB::raw('UPDATE scoring_system SET academic_leadership = scoring_system.academic_leadership + 2 WHERE sid = $id');
                        break;
                    case $aca_lead == 'vc' :
                        $ss->academic_leadership = $ss->academic_leadership + 3;//DB::raw('UPDATE scoring_system SET academic_leadership = scoring_system.academic_leadership + 3 WHERE sid = $id');
                        break;
                    default :
                        $ss->academic_leadership = 7;//DB::raw('UPDATE scoring_system SET academic_leadership = scoring_system.academic_leadership + 0 WHERE sid = $id');
                        break;
                }

                $ss->community_service = 2;//DB::raw('UPDATE scoring_sys
                $ss->teaching_experience = $ss->teaching_experience + 9;
                $ss->referee_report = 3;
                $ss->interview = 17;
                $ss->student_assessment = 6;
                $ss->total_score = $ss->qualification + $ss->publication + $ss->professional_activities + $ss->academic_leadership + $ss->community_service + $ss->teaching_experience + $ss->interview + $ss->referee_report + $ss->student_assessment;
                $ss->totalmin_qualifying_score = 65;
                $ss->percent = ($ss->total_score / $ss->totalmin_qualifying_score) * 100;
                $ss->save();
                if ($ss->save()) {
                    $response['code'] = 200;
                    $response['type'] = 'cancel';
                }
            } elseif ($rank->rank == 'AP') {
                $ss = new ScoringSystem();
                $ss->appno = $id;
                $ss->sid = $sid->sid;
                $ss->rank = $rank->rank;
                if ($degreed == 'DD') {
                    $ss->qualification = $ss->qualification + 8;
                } elseif ($degreem == 'MD') {
                    $ss->qualification = $ss->qualification + 5;
                } elseif ($degreef == 'FD') {
                    $ss->qualification = $ss->qualification + 2;
                }
                $pub = [];
                foreach ($publication as $event){
                    $pub[] = $event->type;
                }

                $score = 0;

                foreach ($pub as $pb){
                    switch ($pb){
                        case 'ebook':
                            $score += 4;
                            break;
                        case 'journal':
                            $score += 2;
                            break;
                        case 'monograph':
                            $score += 2;
                            break;
                        case 'researchreport':
                            $score += 1;
                            break;
                        case 'creativework':
                            $score += 1;
                            break;
                        case 'bookreview':
                            $score += 1;
                            break;
                    }
                }
                $ss->publication = $score;

                $ss->professional_activities = 6;

                switch ($aca_lead) {
                    case 'HOD' :
                        $ss->academic_leadership = $ss->academic_leadership + 1;
                        break;
                    case 'DVC' || 'DEAN' || 'DIRECTOR' :
                        $ss->academic_leadership = $ss->academic_leadership + 2;
                        break;
                    case $aca_lead == 'vc' :
                        $ss->academic_leadership = $ss->academic_leadership + 3;
                        break;
                    default :
                        $ss->academic_leadership = 7;
                }

                $ss->community_service = 2;
                $ss->teaching_experience = $ss->teaching_experience + 15;
                $ss->referee_report = 3;
                $ss->interview = 17;
                $ss->student_assessment = 6;
                $ss->total_score = $ss->qualification + $ss->publication + $ss->professional_activities + $ss->academic_leadership + $ss->community_service + $ss->teaching_experience + $ss->interview + $ss->referee_report + $ss->student_assessment;
                $ss->totalmin_qualifying_score = 70;
                $ss->percent = ($ss->total_score / $ss->totalmin_qualifying_score) * 100;
                $ss->save();
                if ($ss->save()) {
                    $response['code'] = 200;
                    $response['type'] = 'cancel';
                }
            }
            return Response::json($response);
        }
    }
}
