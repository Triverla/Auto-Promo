@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">

            <div class="login-logo">
                <img src="/logo.png" height="100" width="100"/>
            </div>
            <h1 class="text-center"><b>Benue State University, Makurdi </b></h1>
            <h3 class="text-center"><i>(Office of the Registrar)</i></h3>

            <h3 class="text-center"><u>Evaluated APER Forms</u></h3>
            <hr>
            <a class="btn btn-success btn-flat" href="{{url('/aper/promoted')}}">Recommended For Promotion</a>
            <a class="btn btn-danger btn-flat" href="{{url('/aper/not-promoted')}}">Not Recommended for Promotion</a>
        </div>
        <div class="panel-body">
            <div class="table table-responsive">
                <table class="table table-bordered table-hover table-striped table-condensed"  style="font-size: 12px">
                    <thead>
                    <th>N<sup>o</sup></th>
                    <th>Application No</th>
                    <th>Staff ID</th>
                    <th>Rank</th>
                    <th>Quafication</th>
                    <th>Publication</th>
                    <th>Teaching Experience</th>
                    <th>Professional Activities</th>
                    <th>Academic Leadership</th>
                    <th>Community Service</th>
                    <th>Interview</th>
                    <th>Referee Report</th>
                    <th>Student Assessment</th>
                    <th>Total</th>
                    <th>Qualifying Score</th>
                    <th>Score</th>
                    <th>Status</th>
                    <th>Eligibility</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($ss as $key => $s)
                        <tr id="aper-{{$s->appno}}">
                            <td>{{ ++$key }}</td>
                            <td>{{ $s->appno }}</td>
                            <td>{{ $s->sid }}</td>
                            <td>{{ App\Rank::find($s->rank)->name }}</td>
                            <td>{{ $s->qualification }}</td>
                            <td>{{ $s->publication }}</td>
                            <td>{{ $s->teaching_experience }}</td>
                            <td>{{ $s->professional_activities }}</td>
                            <td>{{ $s->academic_leadership }}</td>
                            <td>{{ $s->community_service }}</td>
                            <td>{{ $s->interview }}</td>
                            <td>{{ $s->referee_report }}</td>
                            <td>{{ $s->student_assessment }}</td>
                            <td>{{ $s->total_score }}</td>
                            <td>{{ $s->totalmin_qualifying_score }}</td>
                            <td>{{ number_format((float)$s->percent, 2, '.', '').'%' }}</td>
                            @if($s->percent >= $s->totalmin_qualifying_score )
                                <td><p class="text-success">Recommended for Promotion</p></td>
                            @else
                                <td><p class="text-danger">Not Recommended for Promotion</p></td>
                            @endif
                            @if(\App\ScoringSystem::getldp($s->appno) >= 3)
                                <td><a class="text-green">Eligible</a></td>
                                @else
                                <td><a class="text-red">Not Eligible</a></td>
                                @endif
                            <td><a href="{{ action('AperFormController@evaluation', $s->sid) }}">View Details</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="footer">

        </div>
    </div>
@endsection