@extends('layouts.app')

@section('content')
    <div class="container-fluid">
<div class="col-md-12 panel">
    <fieldset>
        <legend>Annual Staff Performance and Evaluation Form</legend>
    <form id="aper" method="post" action="{{action('AperFormController@apply')}}">
        {{ csrf_field() }}
    <div class="row">
        <div class="col-md-6">
            <label>Staff ID</label>
            <input type="text" class="form-control" value="{{auth()->user()->sid}}" disabled>
            <label>Full Name</label>
            <input type="text" class="form-control" name="full_name" value="{{auth()->user()->getFullName()}}" disabled>
            <label>Designation</label>
            <select class="form-control" name="rank" id="rank" disabled>
                    <option disabled>--Select--</option>
                    <option value="GA" @if (auth()->user()->rank == 'GA') selected="selected" @endif>Graduate Assistant</option>
                    <option value="AL" @if (auth()->user()->rank == 'AL') selected="selected" @endif>Assistant Lecturer</option>
                    <option value="L2" @if (auth()->user()->rank == 'L2') selected="selected" @endif>Lecturer II</option>
                    <option value="L1" @if (auth()->user()->rank == 'L1') selected="selected" @endif>Lecturer I</option>
                    <option value="SL" @if (auth()->user()->rank == 'SL') selected="selected" @endif>Senior Lecturer</option>
                    <option value="AP" @if (auth()->user()->rank == 'AP') selected="selected" @endif>Associate Professor</option>
                    <option value="P" @if (auth()->user()->rank ==  'P') selected="selected" @endif>Professor</option>
                </select>
            <label>Department</label>
            <input type="text" class="form-control" name="department" value="{{auth()->user()->getDepartment()}}" placeholder="Department" disabled>
            <label>Date of Birth</label>
            <input type="text" name="dob" class="form-control" id="dob" size="33"  value="{{ strftime('%Y-%m-%d', strtotime(auth()->user()->dob)) }}" disabled/>
            <label>Last Promotion Rank</label>
            <td colspan="1"><select class="form-control" value="" name="last_promotion_rank" id="rank">
                    <option disabled>--Select--</option>
                    <option value="GA" @if (auth()->user()->rank =='GA' ) selected="selected" @endif>Graduate Assistant</option>
                    <option value="AL" @if (auth()->user()->rank =='AL' ) selected="selected" @endif>Assistant Lecturer</option>
                    <option value="L2" @if (auth()->user()->rank =='L2' ) selected="selected" @endif>Lecturer II</option>
                    <option value="L1" @if (auth()->user()->rank =='L1' ) selected="selected" @endif>Lecturer I</option>
                    <option value="SL" @if (auth()->user()->rank =='SL' ) selected="selected" @endif>Senior Lecturer</option>
                    <option value="AP" @if (auth()->user()->rank =='AP' ) selected="selected" @endif>Associate Professor</option>
                    <option value="P"  @if (auth()->user()->rank =='P' ) selected="selected" @endif>Professor</option>
                </select></td>
            <label>Session</label>
            <input type="text" class="form-control" name="session" placeholder="Session">
        </div>
            <div class="col-md-6">
                <label>Date of First Appointment</label>
                <input type="text" class="form-control" name="date_of_first_appointment"  value="{{ strftime('%Y-%m-%d', strtotime(auth()->user()->appointment_date)) }}" disabled/>
                <label>Date of Confirmation of Appointment</label>
                <input type="text" class="form-control" name="date_of_confirmation_of_appointment"  value="{{ strftime('%Y-%m-%d', strtotime(auth()->user()->appointment_confirmation)) }}" disabled>
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
        <div class="table-responsive">
            <table class="table table-bordered" id="items">
                <thead>
                <tr style="background-color: #f9f9f9;">
                    <th width="5%"  class="text-center">Actions</th>
                    <th width="15%"  class="text-center">Degree</th>
                    <th width="25%" class="text-left">Qualification</th>
                    <th width="15%" class="text-left">Class</th>
                    <th width="30%" class="text-center">Awarding Institution</th>
                    <th width="5%" class="text-right">Start Date</th>
                    <th width="5%" class="text-right">Finish Date</th>
                </tr>
                </thead>
                <tbody>
                <?php $item_row = 0; ?>
                <tr id="item-row-{{ $item_row }}">
                    <td class="text-center" style="vertical-align: middle;">
                        <button type="button" onclick="$(this).tooltip('destroy'); $('#item-row-{{ $item_row }}').remove();" data-toggle="tooltip" title="Remove" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                    <td>
                        <select class="form-control text-right" required="required" name="item[{{ $item_row }}][level]" id="item-price-{{ $item_row }}">
                            <option value="FD">First Degree</option>
                            <option value="MD">Masters Degree</option>
                            <option value="DD">Doctorate Degree</option>
                        </select>
                    </td>
                    <td>
                        <textarea class="form-control typeahead" required="required" placeholder="Name of Qualification" name="item[{{ $item_row }}][qualification]" type="text" id="item-name-{{ $item_row }}" autocomplete="off"></textarea>
                        <input name="item[{{ $item_row }}][sid]" type="hidden" id="item-id-{{ $item_row }}">
                    </td>
                    <td>
                        <select class="form-control text-right" required="required" name="item[{{ $item_row }}][class]" id="item-price-{{ $item_row }}">
                            <option value="FC">First Class</option>
                            <option value="SCU">Second Class Upper</option>
                            <option value="SCL">Second Class Lower</option>
                        </select>
                    </td>
                    <td>
                        <textarea class="form-control text-center" required="required" name="item[{{ $item_row }}][awarding_institution]" type="text" id="item-quantity-{{ $item_row }}"></textarea>
                    </td>
                    <td>
                        <input class="form-control text-right" required="required" name="item[{{ $item_row }}][start_date]" type="date" id="item-price-{{ $item_row }}">
                    </td>
                    <td>
                        <input class="form-control text-right" required="required" name="item[{{ $item_row }}][finish_date]" type="date" id="item-price-{{ $item_row }}">
                    </td>
                </tr>

                <?php $item_row++; ?>
                <tr id="addItem">
                    <td class="text-center"><button type="button" onclick="addQualification();" data-toggle="tooltip" title="Add Qualification" class="btn btn-xs btn-primary" data-original-title="Add"><i class="fa fa-plus"></i></button></td>
                    <td class="text-right" colspan="7"></td>
                </tr>
                </tbody>
            </table>
        </div>
        <input type="submit" class="btn btn-primary btn-flat btn-lg" value="Submit"/>
        </form>
        </fieldset>
</div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">

        var item_row = {{ $item_row }};

        function addQualification() {
            html  = '<tr id="item-row-' + item_row + '">';
            html += '  <td class="text-center" style="vertical-align: middle;">';
            html += '      <button type="button" onclick="$(this).tooltip(\'destroy\'); $(\'#item-row-' + item_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>';
            html += '  </td>';
            html += '  <td>';
            html += '       <select class="form-control text-right" required="required" name="item[' + item_row + '][level]" id="item-price-' + item_row +'">';
            html += '    <option value="FD">First Degree</option>';
            html += '    <option value="MD">Masters Degree</option>';
            html += '    <option value="DD">Doctorate Degree</option>';
            html += '</select>';
            html += '  </td>';
            html += '  <td>';
            html += '      <textarea class="form-control typeahead" required="required" placeholder="Name of Qualification" name="item[' + item_row + '][qualification]" type="text" id="item-name-' + item_row + '" autocomplete="off"></textarea>';
            html += '      <input name="item[' + item_row + '][sid]" type="hidden" id="item-id-' + item_row + '">';
            html += '  </td>';
            html += '  <td>';
            html += '       <select class="form-control text-right" required="required" name="item[' + item_row + '][class]" id="item-price-' + item_row +'">';
            html += '    <option value="FC">First Class</option>';
            html += '    <option value="SCU">Second Class Upper</option>';
            html += '    <option value="SCL">Second Class Lower</option>';
            html += '</select>';
            html += '  </td>';
            html += '  <td>';
            html += '      <textarea class="form-control text-center" required="required" name="item[' + item_row + '][awarding_institution]" type="text" id="item-quantity-' + item_row + '"></textarea>';
            html += '  </td>';
            html += '  <td>';
            html += '      <input class="form-control text-right" required="required" name="item[' + item_row + '][start_date]" type="date" id="item-price-' + item_row + '">';
            html += '  </td>';
            html += '  <td>';
            html += '      <input class="form-control text-right" required="required" name="item[' + item_row + '][finish_date]" type="date" id="item-price-' + item_row + '">';
            html += '  </td>';

            $('#items tbody #addItem').before(html);
            //$('[rel=tooltip]').tooltip();

            $('[data-toggle="tooltip"]').tooltip('hide');
            item_row++;
        }
    </script>
    @endsection
