@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="login-logo">
            <img src="/logo.png" height="100" width="100"/>
            </div>
            <h1 class="text-center"><b>Benue State University, Makurdi </b></h1>
           <h3 class="text-center"><i>(Office of the Registrar)</i></h3>

            <h3 class="text-center"><u>Establishment Union</u></h3>
            <hr>
            <div class="table table-responsive">
                <table class="table table-bordered table-hover table-striped table-condensed"  style="font-size: 12px">
                    <thead>
                    <th>Name</th>
                    <th>P.No</th>
                    <th> date of Birth</th>
                    <th>Qualifications with dates</th>
                    <th>designation On 1<sup>st</sup> Appt/Salary/Date</th>
                    <th>Date of Confirmation</th>
                    <th>Date of last promotion/Rank</th>
                    <th>Present Designation/Salary/Rank</th>
                    <th>Requirements for Promotion</th>
                    <th>Candidates Standing</th>
                    <th>Recommendation</th>
                    </thead>
                    <tbody>
                        <tr id="aper-{{$staff->sid}}">
                            <td>{{ $aper ->full_name}}</td>
                            <td>{{ $staff->sid }}</td>
                            <td>{{ $staff->dob->format('j F, Y') }}</td>
                            <td>
                            @foreach($acad as $value)
                                        <i>{{$value->qualification}}</i><b>{{'('.$value->finish_date.')'}}</b>
                                <br>
                                @endforeach
                            </td>
                            <td>{{App\Rank::find($staff->rank)->name}}<br>{{$staff->appointment_date->format('j F, Y')}}<br></td>
                            <td>{{$staff->appointment_confirmation->format('j F, Y')}}</td>
                            <td>{{$aper->date_of_last_promotion->format('j F, Y')}}</td>
                            <td>{{App\Rank::find($staff->rank)->name}}<br>{{'CONUASS 4/7'}}<br>{{'N'.$aper->present_salary}}<br>{{$aper->created_at->format('F, Y')}}</td>
                            <td>Publications: ()<br>Teach Exp: ()<br>PG Supervision ()<br>Leadership/Admin ()<br>Community Service: (2)<br>
                            Interview: (17)<br>Referee's Report: (3)<br>Student's Assessment: (6)<br>Total score=70<br>Total Minimum Qualifying score=65%</td>
                            <td>Qualification: ({{$score->qualification}})<br>Publications: ({{$score->publication}})<br>Teach Exp: ({{$score->teaching_experience}})<br>PG Supervision ({{$score->professional_activities}})
                                <br>Leadership/Admin ({{$score->academic_leadership}})<br>Community Service: ({{$score->community_service}})<br>
                                Interview: ({{$score->interview}})<br>Referee's Report: ({{$score->referee_report}})<br>Student's Assessment: ({{$score->student_assessment}})<br>Total score={{$score->total_score}}<br>Total number of Points/Percentage={{number_format((float)$score->percent, 2, '.', '').'%'}}</td>
                            @if($score->percent >= $score->totalmin_qualifying_score )
                                <td><p>Recommended for Promotion to the Rank of
                                    @if($aper->rank == 'GA')
                                        ASSISTANT LECTURER
                                        @elseif($aper->rank == 'AL')
                                        LECTURER II
                                        @elseif($aper->rank == 'L2')
                                        LECTURER I
                                        @elseif($aper->rank == 'L1')
                                        SENIOR LECTURER
                                        @elseif($aper->rank == 'SL')
                                        ASSOCIATE PROFESSOR
                                        @elseif($aper->rank == 'AP')
                                        PROFESSOR
                                        @endif
                                    </p><br>
                                    @if(\App\ScoringSystem::getldp($score->appno) >= 3 && $score->percent >= $score->totalmin_qualifying_score  )
                                        (<a class="text-success"><i>Due for Promotion</i></a>)
                                    @elseif(\App\ScoringSystem::getldp($score->appno) < 3 && $score->percent >= $score->totalmin_qualifying_score  )
                                        (<a class="text-red"><i>Not Due for Promotion</i></a>)
                                    @endif
                                </td>
                            @else
                                <td><p>Not Recommended for Promotion</p><br>
                                    @if(\App\ScoringSystem::getldp($score->appno) >= 3 && $score->percent < $score->totalmin_qualifying_score  )
                                        (<a class="text-success"><i>Due for Promotion</i></a>)
                                    @elseif(\App\ScoringSystem::getldp($score->appno) < 3 && $score->percent < $score->totalmin_qualifying_score  )
                                        (<a class="text-red"><i>Not Due for Promotion</i></a>)
                                @endif
                                </td>
                            @endif
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="footer">

        </div>
    </div>
@endsection