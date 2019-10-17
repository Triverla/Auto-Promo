@extends('layouts.app')

@section('content')
    <div class="card panel">
        <div class="card-body">
            <table class="table table-bordered table-responsive">
                <tr>
                    <td colspan="4" bgcolor="#DCDAFF"> <strong>PERSONAL INFORMATION</strong></td>
                </tr>
                <tr>
                    <td colspan="1" bgcolor="#DCDAFF">Staff ID</td>
                    <td colspan="1">{{Auth::user()->sid}}</td>
                    <td rowspan="3" colspan="2" align="center"><img src="/passports/{{$staff->passport}}" width="150" height="150"></td>
                </tr>
                <tr>
                    <td bgcolor="#DCDAFF">First Name</td>
                    <td>{{$staff->first_name}}</td>
                </tr>
                <tr>
                    <td bgcolor="#DCDAFF">Last Name</td>
                    <td>{{$staff->last_name}}</td>
                </tr>
                <tr>
                    <td  bgcolor="#DCDAFF">Middle Name</td>
                    <td>{{$staff->middle_name}}</td>
                    <td bgcolor="#DCDAFF"><b>Marital Status</b></td>
                    <td>{{$staff->marital_status}}</td>
                </tr>
                <tr>
                    <td bgcolor="#DCDAFF">Email</td>
                    <td>{{$staff->email}}</td>
                    <td bgcolor="#DCDAFF"><b>Religion</b></td>
                    <td>{{$staff->religion}}</td>
                </tr>
                <tr>
                    <td bgcolor="#DCDAFF">Date of Birth</td>
                    <td>{{(auth()->user()->dob)->format('F j, Y').' - '.$staff->getAge().' Years'}}</td>
                    <td bgcolor="#DCDAFF"><b>Place of Birth</b></td>
                    <td>{{$staff->pob}}</td>
                </tr>
                <tr>
                    <td bgcolor="#DCDAFF">Nationality</td>
                    <td>{{$staff->nationality}}</td>
                    <td bgcolor="#DCDAFF"><b>State</b></td>
                    <td>{{$staff->state}}</td>
                </tr>
                <tr>
                    <td bgcolor="#DCDAFF">LGA</td>
                    <td>{{$staff->lga}}</td>
                    <td bgcolor="#DCDAFF"><b>Sex</b></td>
                    <td>{{$staff->sex}}</td>
                </tr>
                <tr>
                    <td bgcolor="#DCDAFF">Phone Number</td>
                    <td>{{$staff->phone_number}}</td>
                    <td bgcolor="#DCDAFF"><b>Permanent Home Address</b></td>
                    <td>{{$staff->perm_home_address}}</td>
                </tr>
                <tr>
                    <td bgcolor="#DCDAFF">Current Postal Position</td>
                    <td>{{$staff->current_postal_position}}</td>

                </tr>
            </table>
            <table class="table table-bordered table-responsive" width="100%">
                <tr>
                    <td colspan="4" bgcolor="#DCDAFF"> <strong>ACADEMIC INFORMATION</strong></td>
                </tr>
                <tr>
                    <td  bgcolor="#DCDAFF">Rank</td>
                    <td>{{$rank}}</td>
                    <td bgcolor="#DCDAFF">Post</td>
                    <td>{{$staff->post}}</td>
                </tr>
                <tr>
                    <td bgcolor="#DCDAFF">Faculty</td>
                    <td>{{$fac}}</td>
                    <td bgcolor="#DCDAFF">Department</td>
                    <td>{{$dept}}</td>
                </tr>
                <tr>
                    <td bgcolor="#DCDAFF">Appointment Date</td>
                    <td>{{(auth()->user()->appointment_date)->format('F j, Y')}}</td>
                    <td bgcolor="#DCDAFF">Appointment Confirmation Date</td>
                    <td>{{(auth()->user()->appointment_confirmation)->format('F j, Y')}}</td>
                </tr>
            </table>
            <table class="table table-bordered table-responsive" width="100%">
                <tr>
                    <td colspan="7" bgcolor="#DCDAFF"> <strong>ACADEMIC QUALIFICATIONS</strong></td>
                </tr>
                <tr>
                    <td width="2%"  bgcolor="#DCDAFF">S/N</td>
                    <td width="10%" class="text-center">Level</td>
                    <td width="25%" class="text-center">Qualification</td>
                    <td width="10%" class="text-center">Class</td>
                    <td width="34%" bgcolor="#DCDAFF" class="text-center">Awarding Institution</td>
                    <td width="9%">Start Date</td>
                    <td width="10%" bgcolor="#DCDAFF">Finish Date</td>
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
                    <td colspan="4" bgcolor="#DCDAFF"> <strong>STAFF CHILDREN</strong></td>
                </tr>
                <tr>
                    <td width="2%"  bgcolor="#DCDAFF">S/N</td>
                    <td width="35%" class="text-center">Child Name</td>
                    <td width="43%" bgcolor="#DCDAFF" class="text-center">Position</td>
                    <td width="10%">Age</td>
                </tr>
                @if(count($stfchd) > 0 )
                @foreach($stfchd as $chd)
                    <tr>
                        <td bgcolor="#fff">{{$loop->iteration}}</td>
                        <td bgcolor="#fff">{{$chd->name}}</td>
                        <td bgcolor="#fff">{{$chd->position}}</td>
                        <td bgcolor="#fff">{{$chd->age}}</td>
                    </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center"><p class="text-danger">No Data Found</p></td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
    @endsection