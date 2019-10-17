@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form method="GET" id="form_search">
                <table>
                    <tr>
                        <td>
                            <input type="search" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by ID or Name"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="panel-body">
            <div class="table table-responsive">
            <table class="table table-bordered table-hover table-striped table-condesed" id="student_search_table" width="100%">
                <thead>
                <th>N<sup>o</sup></th>
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
                <th colspan="3" c class="text-center">Action</th>
                </thead>
                <tbody>
                @foreach($staff as $key => $stf)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $stf->application_no }}</td>
                        <td>{{ $stf->sid }}</td>
                        <td>{{ $stf->full_name }}</td>
                        <td>{{ $stf->dob }}</td>
                        <td>{{ $stf->rank }}</td>
                        <td>{{ $stf->department }}</td>
                        <td>{{ $stf->last_promotion_rank }}</td>
                        <td>{{ $stf->date_of_first_appointment }}</td>
                        <td>{{ $stf->date_of_confirmation_of_appointment }}</td>
                        <td>{{ $stf->date_of_last_promotion }}</td>
                        <td>{{ $stf->created_at }}</td>

                        <td><a href="#" class="btn btn-flat btn-danger">Delete</a></td>

                            <td><a href="{{ action('AperFormController@adminAperDetails', $stf->sid) }}" class="btn btn-flat btn-success"><i class="fa fa-eye"></i> View</a>
                        </td>
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