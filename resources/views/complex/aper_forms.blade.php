@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">

            <h1>APER FORMS OF STAFFS FROM VARIOUS FACULTIES </h1>
            <small>Note: This are list of staffs approved by their Various FACULTIES</small>
            <hr>
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
                    <th>Rank</th>
                    <th>Department</th>
                    <th>Faculty</th>
                    <th>Application Date</th>
                    <th colspan="4" class="text-center">Action</th>
                    </thead>
                    <tbody>
                    @foreach($staff as $key => $stf)
                        <?php $fac = App\Staff::find($stf->sid)->faculty_id ?>
                        <tr id="aper-{{$stf->application_no}}">
                            <td>{{ ++$key }}</td>
                            <td>{{ $stf->application_no }}</td>
                            <td>{{ $stf->sid }}</td>
                            <td>{{ $stf->full_name }}</td>
                            <td>{{ App\Rank::find($stf->rank)->name }}</td>
                            <td>{{ $stf->department }}</td>
                            <td>{{ App\Faculty::find($fac)->name}}</td>
                            <td>{{ $stf->created_at }}</td>
                            @include('complex.modals.complex_comment')
                            <td><a href="{{ action('AperFormController@staffAperDetails', $stf->sid) }}" class="btn btn-flat btn-success"><i class="fa fa-eye"></i> View</a></td>
                            @if($stf->checkcomplexComment($stf->application_no))
                                <td><button class="btn btn-default btn-flat">Already Commented</button></td>
                            @else
                                <td><span data-toggle="modal" data-target="#faculty-comment-{{$stf->application_no}}" class="btn btn-flat btn-primary fa fa-comment-o"> Comment</span></td>
                            @endif
                            <td id="aper-{{$stf->application_no}}">
                                <a href="javascript:;" onclick="complexApprove('{{$stf->application_no}}')" class="aper-text btn btn-flat btn-primary">
                                    @if($stf->checkComplexApproved($stf->application_no))
                                        <i class="fa fa-thumbs-o-down"></i> <span>Cancel</span>
                                    @else
                                        <i class="fa fa-thumbs-o-up"></i> <span >Approve</span>
                                    @endif
                                </a>
                            </td>
                            <td id="eva-{{$stf->application_no}}">
                                <a href="javascript:;" onclick="evaluateStaff('{{$stf->application_no}}')" class="aper-text btn btn-flat btn-default">
                                    @if($stf->checkEvac($stf->application_no))
                                        <i class="fa fa-thumbs-o-down"></i> <span>Cancel</span>
                                    @else
                                        <i class="fa fa-thumbs-o-up"></i> <span >Evaluate</span>
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