@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-9 col-md-offset-2">
            <fieldset>
                <legend>Annual Staff Performance and Evaluation Form</legend>
                <form id="aper" method="post" action="{{action('AperFormController@apply')}}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <label>Staff ID</label>
                            <input type="text" class="form-control" name="sid" value="{{$aperForm->sid}}">
                            <label>Full Name</label>
                            <input type="text" class="form-control" name="full_name" value="{{$aperForm->full_name}}">
                            <label>Designation</label>
                            <input type="text" class="form-control" name="rank" value="{{$aperForm->rank}}">
                            <label>Department</label>
                            <input type="text" class="form-control" name="department" value="{{$aperForm->department}}">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" name="dob">
                            <label>Last Promotion Rank</label>
                            <input type="text" class="form-control" name="last_promotion_rank" value="{{$aperForm->last_position_rank}}">
                            <label>Session</label>
                            <input type="text" class="form-control" name="session" value="{{$aperForm->session}}">
                        </div>
                        <div class="col-md-6">
                            <label>Date of First Appointment</label>
                            <input type="date" class="form-control" name="date_of_first_appointment">
                            <label>Date of Confirmation of Appointment</label>
                            <input type="date" class="form-control" name="date_of_confirmation_of_appointment">
                            <label>Date of Last Promotion</label>
                            <input type="date" class="form-control" name="date_of_last_promotion">
                            <label>Present Salary</label>
                            <input type="text" class="form-control" name="present_salary" placeholder="Present Salary">
                            <label>Present Responsibilities</label>
                            <textarea name="present_responsibilities" class="form-control" cols="25" rows="4"></textarea>
                            <label>Comment</label>
                            <textarea name="staff_comments" class="form-control" cols="25" rows="4"></textarea>
                        </div>
                    </div>
                    <br>
                    <table class="table table-responsive table-bordered" id="mytable">
                        <thead>
                        <td>Qualification</td>
                        <td>Awarding Institution</td>
                        <td> Date</td>
                        <td> <span class="btn btn-default btn-sm" id="add-acad">+</span></td>
                        </thead>
                        <tr id="cell">
                            <td><input type="text" class="form-control" name="qualification[]" placeholder="Qualification"></td>
                            <td><input type="text" class="form-control" name="awarding_institution[]" placeholder="Awarding Institution"></td>
                            <td><input type="date" class="form-control" name="date[]"></td>
                            <td> <span class="btn btn-danger btn-sm" id="td-rm">x</span></td>
                        </tr><br>

                    </table>
                    <input type="submit" class="btn btn-primary btn-flat btn-lg" value="Submit"/>
                </form>
            </fieldset>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $( document ).ready(function() {
            let click=0;
            $('#add-acad').click(function(){
                click++;
                $('#mytable').append(`
            <tr id="cell">
                <td><input type="text" class="form-control" name="qualification" placeholder="Qualification"></td>
                <td><input type="text" class="form-control" name="awarding_institution" placeholder="Awarding Institution"></td>
                <td><input type="date" class="form-control" name="date"></td>
                <td> <span class="btn btn-danger btn-sm" id="td-rm">x</span></td>
            </tr><br>
                `);
                $('#td-rm').click(function () {
                    click++;
                    $('#cell').remove();
                });
            });

        });
    </script>
@endsection
