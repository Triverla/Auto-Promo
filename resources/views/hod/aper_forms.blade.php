@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center">APER FORMS OF STAFF FROM DEPARTMENT OF COMPUTER SCIENCE</h2>
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
                <table class="table table-bordered table-hover table-striped table-condensed" id="student_search_table" width="100%">
                    <thead>
                    <th>N<sup>o</sup></th>
                    <th>Application No</th>
                    <th>Staff ID</th>
                    <th>Full Name</th>
                    <th>Rank</th>
                    <th>Department</th>
                    <th>Application Date</th>
                    <th colspan="3" class="text-center">Action</th>
                    </thead>
                    <tbody>
                    @foreach($staff as $key => $stf)
                        <tr id="aper-{{$stf->application_no}}">
                            <td>{{ ++$key }}</td>
                            <td>{{ $stf->application_no }}</td>
                            <td>{{ $stf->sid }}</td>
                            <td>{{ $stf->full_name }}</td>
                            <td>{{ App\Rank::find($stf->rank)->name }}</td>
                            <td>{{ $stf->department }}</td>
                            <td>{{ $stf->created_at }}</td>
                            @include('hod.modals.hod_comment')
                            <td><a href="{{ action('AperFormController@staffAperDetails', $stf->sid) }}" class="btn btn-flat btn-success"><i class="fa fa-eye"></i> View</a></td>
                            @if($stf->checkhodComment($stf->application_no))
                            <td><button class="btn btn-default btn-flat">Already Commented</button></td>
                            @else
                                <td><span data-toggle="modal" data-target="#hod-comment-{{$stf->application_no}}" class="btn btn-flat btn-primary fa fa-comment-o"> Comment</span></td>
                            @endif
                                <td id="aper-{{$stf->application_no}}">
                                <a href="javascript:;" onclick="hodApprove('{{$stf->application_no}}')" class="aper-text btn btn-flat btn-primary">
                                    @if($stf->checkHodApproved($stf->application_no))
                                        <i class="fa fa-thumbs-o-down"></i> <span>Cancel</span>
                                    @else
                                        <i class="fa fa-thumbs-o-up"></i> <span >Approve</span>
                                    @endif
                                </a>
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