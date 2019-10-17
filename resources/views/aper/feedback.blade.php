@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            APER-FORM STATUS/REVIEW
        </div>
        <div class="panel-body">
            <div class="table table-responsive">
                <table class="table table-bordered table-hover table-striped table-condesed" id="student_search_table" width="100%">
                    <thead>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Comment/Feedback</th>
                    </thead>
                    <tr>
                        <td>HOD STATUS</td>
                        <td>@if($aper->checkHodApproved($aper->application_no))
                                <p class="text-success"><i class="fa fa-check"></i> Approved</p>
                            @else
                                <p class="text-red"><i class="fa fa-close"></i> Not Approved</p>
                            @endif
                        </td>
                        <td>@if(!$aper->checkhodComment($aper->application_no))
                        <p class="text-red">No Comments</p>
                        @else
                        {{$hod->comment}}</td>
                        @endif</td>
                    </tr>
                    <tr>
                        <td>FACULTY STATUS</td>
                        <td>@if($aper->checkFacApproved($aper->application_no))
                                <p class="text-success"><i class="fa fa-check"></i> Approved</p>
                            @else
                                <p class="text-red"><i class="fa fa-close"></i> Not Approved</p>
                            @endif
                        </td>
                        <td>@if(!$aper->checkfacultyComment($aper->application_no))
                        <p class="text-red">No Comment/feedback</p>
                        @else
                        {{$fac->comment}}</td>
                        @endif
                    </tr>
                    <tr>
                        <td>COMPLEX SECTION</td>
                        <td>@if($aper->checkComplexApproved($aper->application_no))
                                <p class="text-success"><i class="fa fa-check"></i> Approved</p>
                            @else
                                <p class="text-red"><i class="fa fa-close"></i> Not Approved</p>
                            @endif
                        </td>
                        <td>@if(!$aper->checkComplexComment($aper->application_no))
                        <p class="text-red">No Comments</p>
                        @else
                        {{$com->comment}}</td>
                        @endif</td>
                    </tr>
                </table>
                <h2>Scoring System</h2>
                <code>{{auth()->user()->first_name}}'s Scores </code>
                <div class="table table-responsive">
                <table class="table table-bordered table-hover table-condesed" id="student_search_table" width="100%">
                    <thead>
                    <th>Category</th>
                    <th>Score</th>
                    </thead>
                    <tr>
                    <td>Qualification</td>
                    <td>{{$score->qualification}}</td>
                    </tr>
                    <tr>
                    <td>Publication</td>
                    <td>{{$score->publication}}</td>
                    </tr>
                    <tr>
                    <td>Teaching Experience</td>
                    <td>{{$score->teaching_experience}}</td>
                    </tr>
                    <tr>
                    <td>Professional Activities</td>
                    <td>{{$score->professional_activities}}</td>
                    </tr>
                    <tr>
                    <td>Academic Leadership</td>
                    <td>{{$score->academic_leadership}}</td>
                    </tr>
                    <tr>
                    <td>Community Service</td>
                    <td>{{$score->community_service}}</td>
                    </tr>
                    <tr>
                    <td>Interview</td>
                    <td>{{$score->interview}}</td>
                    </tr>
                    <tr>
                    <td>Referee Report</td>
                    <td>{{$score->referee_report}}</td>
                    </tr>
                    <tr>
                    <td>Student Assessment</td>
                    <td>{{$score->student_assessment}}</td>
                    </tr>
                    <tr>
                    <td></td>
                    <td>
                    <table class="table table-bordered table-hover table-striped table-condesed">
                    <tr>
                    <td>Total </td>
                    <td> {{$score->total_score}} </td>
                    </tr>
                    <tr>
                    <td>Total Min Score </td>
                    <td> {{$score->totalmin_qualifying_score}} </td>
                    </tr>
                    <tr>
                        <td>Percentage </td>
                        <td> {{$score->percent}} </td>
                    </tr>
                    </table>
                    </td>
                    </tr>
                    </table>
                   @if($score->percent >= 65)
                       <div class="alert alert-success alert-dismissible text-center">
                           <b>Congratulations, You met with the minimum requirements for promotion!</b>
                       </div>
                       @else
                        <div class="alert alert-danger alert-dismissible text-center">
                            <b>Sorry, You did not meet the minimum requirements for promotion!</b>
                        </div>
                       @endif
                    </div>
            </div>
        </div>
    </div>
@endsection