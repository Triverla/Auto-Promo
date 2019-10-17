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
        <div class="panel-body">
            <div class="table table-responsive">
                <table class="table table-bordered table-hover table-striped table-condesed" id="student_search_table" width="100%" style="font-size: 12px">
                    <thead>
                    <th>S/N</th>
                    <th>Application No</th>
                    <th>Staff ID</th>
                    <th>Full Name</th>
                    <th>Birth Date</th>
                    <th>Rank</th>
                    <th>Department</th>
                    <th>Last Promotion Rank</th>
                    <th>Appointment Date</th>
                    <th>Confirmation Date</th>
                    <th>Last Promotion Date</th>
                    <th>Application Date</th>
                    <th class="text-center">Recommendation</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($staff as $key => $stf)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $stf->appno }}</td>
                            <td>{{ $stf->sid }}</td>
                            <td>{{ $stf->full_name }}</td>
                            <td>{{ $stf->dob }}</td>
                            <td>{{App\Rank::find($stf->rank)->name}}</td>
                            <td>{{ $stf->department }}</td>
                            <td>{{App\Rank::find($stf->last_promotion_rank)->name}}</td>
                            <td>{{ $stf->date_of_first_appointment }}</td>
                            <td>{{ $stf->date_of_confirmation_of_appointment }}</td>
                            <td>{{ $stf->date_of_last_promotion }}</td>
                            <td>{{ $stf->created_at }}</td>

                            @if($stf->percent >= $stf->totalmin_qualifying_score )
                                <td><p>Recommended for Promotion to the Rank of
                                        @if($stf->rank == 'GA')
                                            ASSISTANT LECTURER
                                        @elseif($stf->rank == 'AL')
                                            LECTURER II
                                        @elseif($stf->rank == 'L2')
                                            LECTURER I
                                        @elseif($stf->rank == 'L1')
                                            SENIOR LECTURER
                                        @elseif($stf->rank == 'SL')
                                            ASSOCIATE PROFESSOR
                                        @elseif($stf->rank == 'AP')
                                            PROFESSOR
                                        @endif

                                        <br>
                                        <br>
                                @if(\App\ScoringSystem::getldp($stf->appno) >= 3 && $stf->percent >= $stf->totalmin_qualifying_score  )
                                    <a class="text-green"><i>Due for Promotion</i></a>
                                @elseif(\App\ScoringSystem::getldp($stf->appno) < 3 && $stf->percent >= $stf->totalmin_qualifying_score  )
                                    <a class="text-green"><i class="text-danger">Not Due for Promotion</i></a>
                                    @endif
                                    </p></td>
                            @endif
                            <td><a href="{{ action('AperFormController@evaluation', $stf->sid) }}">View Details</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="footer">

        </div>
    </div>
    </div>
@endsection