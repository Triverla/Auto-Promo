@extends('layouts.app')

@section('content')
    @include('staff.modals.passport')
    @include('staff.modals.staffchildren')
    @include('staff.modals.academic-qualifications')

    <form action="{{URL::route('update',['sid' => auth()->user()]) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <table border="0" width=100% height="100%" class="table table-responsive" >
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Something went wrong</strong> Check and try again<br><br>
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

                {{--                {!! Button::success(trans('auth.btn.not_registered'))->block()->asLinkTo(url('/register')) !!}<p>&nbsp;</p>--}}
            @endif
            <tr>
                <td colspan="1" bgcolor="#DCDAFF"> <strong>ADD PASSPORT</strong></td>
                <td colspan="4" bgcolor="#DCDAFF"> <strong>PERSONAL DETAILS</strong></td>
            </tr>
            <tr>
                <td rowspan="4" align="center">
                    <img src="/passports/{{ auth()->user()->passport }}" width="250" height="210" >
                    <span data-toggle="modal" data-target="#passport" class="btn btn-flat btn-primary fa fa-upload">Upload Passport</span>
                </td>
                <td colspan="1">Staff ID</td>
                <td colspan="1"><input type="text" class="form-control" id="staff_id" name="sid" size="33" value="{{ auth()->user()->sid }}" disabled /></td>
                <td colspan="1">Nationality</td>
                <td colspan="1"><input type="text" class="form-control" id="nationality" name="nationality" size="33" value="{{ auth()->user()->nationality }}" /></td>
            </tr>
            <tr>
                <td colspan="1">First Name</td>
                <td colspan="1"><input type="text" name="first_name" class="form-control" id="fname" size="33" value="{{ auth()->user()->first_name }}" placeholder="First Name"/></td>
                <td colspan="1">State of Origin</td>
                <td colspan="1">
                    @if(auth()->user()->state == '')
                    <select class="form-control" name="state" id="states">

                    </select>
                        @else
                    <input type="text" value="{{auth()->user()->state}}" disabled>
                        @endif
                </td>
            </tr>
            <tr>
                <td colspan="1">Last Name</td>
                <td colspan="1"><input type="text" name="last_name" class="form-control" id="lname" size="33" value="{{ auth()->user()->last_name }}"/></td>
                <td colspan="1">Current Postal Position</td>
                <td colspan="1"><input type="text" name="current_postal_position" class="form-control" id="cpp" size="33" value="{{ auth()->user()->current_postal_position }}"/></td>
            </tr>
            <tr>
                <td colspan="1">Middle Name</td>
                <td colspan="1"><input type="text" name="middle_name" class="form-control" id="mname" size="33" value="{{ auth()->user()->middle_name }}"/></td>
                <td colspan="1">Permanent Home Address</td>
                <td colspan="1"><textarea class="form-control" name="perm_home_address" id="pha" cols="25" rows="3">{{ auth()->user()->perm_home_address }}</textarea></td>
            </tr>
            <tr>
                <td rowspan="1" bgcolor="#DCDAFF"><strong>CHANGE PASSWORD</strong><br></td>
                <td colspan="1">Date of Birth</td>
                <td colspan="1">
                    @if(auth()->user()->dob == '')
                        <input type="date" name="dob" class="form-control" id="dob" size="33"  placeholder="Date of Birth"/>
                    @elseif(auth()->user()->dob == auth()->user()->dob)
                        <input type="text" name="dob" class="form-control" id="dob" size="33"  value="{{ strftime('%Y-%m-%d', strtotime(auth()->user()->dob)) }}"/>
                    @endif
                </td>
                <td colspan="1">Email Address</td>
                <td colspan="1">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <input type="text" name="email" class="form-control" id="email" size="33" value="{{ auth()->user()->email }}" disabled/>
                    </div>
                </td>
            </tr>
            <tr>
                <td rowspan="9" align="center">
                    <table class="table" border="0">
                        <form action="" method="POST">
                            <tr>
                                <td>Old Password</td>
                                <td><input type="password" class="form-control" name="" placeholder="Enter your password"/></td>
                            </tr>
                            <tr>
                                <td>New Password</td>
                                <td><input type="password" class="form-control" name="" placeholder="Enter your password"/></td>
                            </tr>
                            <tr>
                                <td>Confirm Password</td>
                                <td><input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="Re-type your password"/></td>
                            </tr>
                            <tr>
                                <td><input type="button" class="btn btn-flat btn-default" name="submit" value="Submit"/></td>
                            </tr>
                        </form>
                    </table>
                <td rowspan="2">Marital Status</td>
                <td rowspan="2"><select class="form-control" name="marital_status">
                        <option>--Select--</option>
                        <option @if (auth()->user()->marital_status == 'Single') selected="selected" @endif>Single</option>
                        <option @if (auth()->user()->marital_status == 'Married') selected="selected" @endif>Married</option>
                        <option @if (auth()->user()->marital_status == 'Divorced') selected="selected" @endif>Divorced</option>
                    </select>
                </td>
                <td colspan="1">Place of Birth</td>
                <td rowspan="2"><input type="text" name="pob" class="form-control" id="pob" size="33"  value="{{ auth()->user()->pob}}"/></td>
            </tr>
            <tr>

            </tr>
            <tr>
                <td colspan="1">Sex</td>
                <td colspan="1"><select class="form-control" name="sex">
                        <option>--Select--</option>
                        <option @if (auth()->user()->sex == 'Male') selected="selected" @endif>Male</option>
                        <option @if (auth()->user()->sex == 'Female') selected="selected" @endif>Female</option>
                    </select>
                </td>
                <td colspan="1">Telephone No:</td>
                <td colspan="1">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <input type="tel" name="phone_number" class="form-control" id="phone" size="33" data-inputmask='"mask": "(234) 999-999-9999"' data-mask  value="{{ auth()->user()->phone_number }}"/>
                    </div>
                </td>
            </tr>

            <tr>
                <td colspan="1">LGA</td>
                <td colspan="1"><input type="text" name="lga" class="form-control" id="lga" size="33"  value="{{ auth()->user()->lga }}"/></td>
                <td colspan="1">Religion</td>
                <td colspan="1"><select class="form-control" name="religion">
                        <option>--Select--</option>
                        <option @if (auth()->user()->religion == 'Christianity') selected="selected" @endif>Christianity</option>
                        <option @if (auth()->user()->religion == 'Islamic') selected="selected" @endif>Islamic</option>
                        <option @if (auth()->user()->religion == 'Others') selected="selected" @endif>Others</option>
                    </select></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="4" bgcolor="#DCDAFF"><strong>ACADEMIC INFORMATION</strong></td>
            </tr>
            <tr>
                <td colspan="1">Position</td>
                <td colspan="1"><input type="text" name="post" class="form-control" id="post" size="33"  value="{{ auth()->user()->post }}"/></td>
                <td colspan="1">Academic Rank</td>
                <td colspan="1"><select class="form-control" name="rank" id="rank">
                        <option disabled>--Select--</option>
                        <option value="GA" @if (auth()->user()->rank =='GA' ) selected="selected" @endif>Graduate Assistant</option>
                        <option value="AL" @if (auth()->user()->rank =='AL' ) selected="selected" @endif>Assistant Lecturer</option>
                        <option value="L2" @if (auth()->user()->rank =='L2' ) selected="selected" @endif>Lecturer II</option>
                        <option value="L1" @if (auth()->user()->rank =='L1' ) selected="selected" @endif>Lecturer I</option>
                        <option value="SL" @if (auth()->user()->rank =='SL' ) selected="selected" @endif>Senior Lecturer</option>
                        <option value="AP" @if (auth()->user()->rank =='AP' ) selected="selected" @endif>Associate Professor</option>
                        <option value="P"  @if (auth()->user()->rank =='P' ) selected="selected" @endif>Professor</option>
                    </select></td>
            </tr>
            <tr>
                <td colspan="1">Department</td>
                <td colspan="1"><select class="form-control" name="department_id" id="department">
                        <option>--Select--</option>
                        <option value="1" @if (auth()->user()->department_id == 1) selected="selected"   @endif>Computer Science</option>
                        <option  value="2" @if (auth()->user()->department_id == 2) selected="selected"  @endif>Physics</option>
                        <option  value="3" @if (auth()->user()->department_id == 3) selected="selected" value="3" @endif >Mathematics</option>
                        <option  value="4" @if (auth()->user()->department_id == 4) selected="selected" value="4" @endif >Chemistry</option>
                        <option  value="5" @if (auth()->user()->department_id == 5) selected="selected" value="5" @endif >Biology</option>
                        <option  value="6" @if (auth()->user()->department_id == 6) selected="selected" value="6" @endif >MBBS</option>
                        <option  value="7" @if (auth()->user()->department_id == 7) selected="selected" value="7" @endif >Sociology</option>
                        <option  value="8" @if (auth()->user()->department_id == 8) selected="selected" value="8" @endif >Economics</option>
                        <option  value="9" @if (auth()->user()->department_id == 9) selected="selected" value="9" @endif >Accounting</option>
                        <option  value="10" @if (auth()->user()->department_id == 10) selected="selected" value="10" @endif >History</option>
                    </select></td>
                <td colspan="1">Faculty</td>
                <td colspan="1"><select class="form-control" name="faculty_id" id="facultyid">
                        <option>--Select--</option>
                        <option value="1" @if (auth()->user()->faculty_id == 1) selected="selected" value="1" @endif>Science</option>
                        <option value="2"  @if (auth()->user()->faculty_id == 2) selected="selected" value="2" @endif>Social Science</option>
                        <option value="3"  @if (auth()->user()->faculty_id == 3) selected="selected" value="3" @endif>Management Science</option>
                        <option value="4"  @if (auth()->user()->faculty_id == 4) selected="selected" value="4" @endif>Art</option>
                        <option value="5"  @if (auth()->user()->faculty_id == 5) selected="selected" value="5" @endif>Health Science</option>
                    </select></td>
            </tr>
            <tr>
            </tr>
            <tr>
                <td rowspan="8"></td>
                <td colspan="1">Appointment Date</td>
                <td colspan="1">@if(auth()->user()->appointment_date == '')
                        <input type="date" name="appointment_date" class="form-control" id="appointmentdate" size="33" placeholder="Appointment Date"/>
                    @elseif(auth()->user()->appointment_date != '')
                        <input type="text" name="appointment_date" class="form-control" id="appointmentdate" size="33"  value="{{ strftime('%Y-%m-%d', strtotime(auth()->user()->appointment_date)) }}"/>
                    @endif
                </td>
                <td colspan="1">Appointment Confirmation Date</td>
                <td colspan="1">@if(auth()->user()->appointment_confirmation == '')
                        <input type="date" name="appointment_confirmation" class="form-control" id="appointmentcon" size="33"/>
                    @elseif(auth()->user()->appointment_date != '')
                        <input type="text" name="appointment_confirmation" class="form-control" id="appointment" size="33"  value="{{ strftime('%Y-%m-%d', strtotime(auth()->user()->appointment_confirmation_date)) }}"/>
                    @endif
                </td>
                <!--<td colspan="1">Semesters Left</td>
                <td colspan="1"><input type="number" name="semestersleft" size="33" placeholder=""/></td>-->
            </tr>

            <tr>
                <td colspan="4" bgcolor="#DCDAFF"><strong>CHILDREN INFORMATION</strong></td>
            </tr>
            <td><span data-toggle="modal" data-target="#staff-children" class="btn btn-flat btn-default fa fa-child">Add Children</span></td>
            <!--<tr id="mytable">
                <td colspan="1"><input type="text" class="form-control" name="child_name" size="33" placeholder="Child's Name"/></td>
                <td colspan="1"><input type="number" class="form-control" name="age" size="33" placeholder="Age"/></td>
                <td colspan="1"><input type="number" class="form-control" name="position" size="33" placeholder="Position in Family"/></td>
                <td colspan="4"><span class="fa fa-plus-circle" id="add-new-child"></span> </td>
            </tr>-->

            <tr>
                <td colspan="4" bgcolor="#DCDAFF"><strong>ACADEMIC QUALIFICATIONS</strong></td>
            </tr>
            <td><span data-toggle="modal" data-target="#acad" class="btn btn-flat btn-default fa fa-graduation-cap">Add Academic Qualification</span></td>
            <!-- <tr>
                 <td colspan="1"><textarea class="form-control" name="qualification" id="pha" cols="25" rows="3" placeholder="Qualification [Degree,...]"></textarea></td>
                 <td colspan="1"><textarea class="form-control" name="awarding_institution" id="pha" cols="25" rows="3" placeholder="Awarding Institution"></textarea></td>
                 <td colspan="1"><input type="date" name="date"/></td>
                 <td colspan="1"><button class="btn btn-primary btn-flat">Add More</button></td>

                 <td><input type="text" class="form-control" id="details'+click+'" name="details'+click+'"</td>
                         <td><input type="text" class="form-control" id="rating'+click+'" name="rating'+click+'"</td>
             </tr>-->

            <tr>
                <td colspan="1"></td>
                <td colspan="1"><input type="Submit" class="btn btn-flat btn-success btn-lg" name="submit" value="SUBMIT"/></td>

            </tr>

        </table>
    </form>

@endsection
