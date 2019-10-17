@extends('layouts.app')

@section('content')
    @include('staff.modals.publications')
    @include('staff.modals.academic-qualifications')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-responsive">
                <tr>
                    <td colspan="1" bgcolor="#DCDAFF"> <strong>PERSONAL INFORMATION</strong></td>
                    <td colspan="3" bgcolor="#DCDAFF" class="text-center">
                        @if($staff->sid == Auth::user()->sid)
                            <span data-toggle="modal" data-target="#publication" class="btn btn-flat btn-default fa fa-book">Add Publications</span>
                            <span data-toggle="modal" data-target="#acad" class="btn btn-flat btn-default fa fa-graduation-cap">Add Academic Qualification</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="1" bgcolor="#DCDAFF">Application Number</td>
                    <td colspan="3">{{$staff->application_no }}</td>
                </tr>
                <tr>
                    <td bgcolor="#DCDAFF">Staff ID</td>
                    <td>{{$staff->sid}}</td>
                </tr>
                <tr>
                    <td bgcolor="#DCDAFF">Full Name</td>
                    <td>{{$staff->full_name}}</td>
                </tr>
                <tr>
                    <td bgcolor="#DCDAFF">Rank</td>
                    <td>{{App\Rank::find($staff->rank)->name}}</td>
                </tr>
                <tr>
                    <td  bgcolor="#DCDAFF">Department</td>
                    <td>{{$staff->department}}</td>
                    <td bgcolor="#DCDAFF">Date of Birth</td>
                    <td>{{$staff->dob->format('F j, Y')}}</td>
                </tr>
                <tr>
                    <td bgcolor="#DCDAFF">Date of Appointment</td>
                    <td>{{$staff->date_of_first_appointment->format('F j, Y')}}</td>
                    <td bgcolor="#DCDAFF">Appointment Confirmation Date</td>
                    <td>{{$staff->date_of_confirmation_of_appointment->format('F j, Y')}}</td>
                </tr>
                <tr>
                    <td bgcolor="#DCDAFF">Last Promotion Rank</td>
                    <td>{{App\Rank::find($staff->last_promotion_rank)->name}}</td>
                    <td bgcolor="#DCDAFF">Date of last Promotion</td>
                    <td>{{$staff->date_of_last_promotion->format('F j, Y')}}</td>
                </tr>
                <tr>
                    <td bgcolor="#DCDAFF">Present Salary</td>
                    <td>{{'N'.$staff->present_salary}}</td>
                    <td bgcolor="#DCDAFF">Present Responsibilities</td>
                    <td>{{$staff->present_responsibilities}}</td>
                </tr>
                <tr>
                    <td bgcolor="#DCDAFF">Staff Comment</td>
                    <td colspan ="3">{{$staff->staff_comments}}</td>
                </tr>
                <tr>
                    <td bgcolor="#DCDAFF">Application Date</td>
                    <td>{{$staff->created_at->format('F j, Y m:ia')}}</td>
                </tr>
            </table>
            <table class="table table-bordered table-responsive" width="100%">
                <tr>
                    <td colspan="7" bgcolor="#DCDAFF"> <strong>ACADEMIC QUALIFICATIONS</strong></td>
                </tr>
                <tr>
                    <td width="2%"  bgcolor="#DCDAFF">S/N</td>
                    <td width="10%" class="text-center">Level</td>
                    <td width="25%" class="text-center"  bgcolor="#DCDAFF">Qualification</td>
                    <td width="10%" class="text-center">Class</td>
                    <td width="34%" bgcolor="#DCDAFF" class="text-center">Awarding Institution</td>
                    <td width="9%">Start Date</td>
                    <td width="10" bgcolor="#DCDAFF">Finish Date</td>
                </tr>
                @if(count($acad) > 0 )
                    @foreach($acad as $aca)
                        <tr>
                            <td bgcolor="#fff">{{$loop->iteration}}</td>
                            <td bgcolor="#fff">{{App\Degree::find($aca->level)->name}}</td>
                            <td bgcolor="#fff">{{$aca->qualification}}</td>
                            <td bgcolor="#fff">{{App\DegreeClass::find($aca->class)->name}}</td>
                            <td bgcolor="#fff">{{$aca->awarding_institution}}</td>
                            <td bgcolor="#fff">{{$aca->start_date}}</td>
                            <td bgcolor="#fff">{{$aca->finish_date}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center"><p class="text-danger">No Data Found</p></td>
                    </tr>
                @endif
            </table>
            <table class="table table-bordered table-responsive" width="100%">
                <tr>
                    <td colspan="5" bgcolor="#DCDAFF"> <strong>PUBLICATIONS</strong></td>
                </tr>
                <tr>
                    <td width="2%"  bgcolor="#DCDAFF">S/N</td>
                    <td width="43%" class="text-center">Details</td>
                    <td width="35%" bgcolor="#DCDAFF" class="text-center">url</td>
                    <td width="10%">type</td>
                    <td width="10%" bgcolor="#DCDAFF">Date</td>
                </tr>
                @if(count($pub) == 0)
                    <tr><td colspan="5" class="text-center"><i>No inputted Publication...</i></td></tr>
                @else
                    @foreach($pub as $pb)
                        <tr>
                            <td bgcolor="#fff">{{$loop->iteration}}</td>
                            <td bgcolor="#fff">{{$pb->details}}</td>
                            <td bgcolor="#fff">{{$pb->url}}</td>
                            <td bgcolor="#fff">{{$pb->type}}</td>
                            <td bgcolor="#fff">{{$pb->date}}</td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
@endsection