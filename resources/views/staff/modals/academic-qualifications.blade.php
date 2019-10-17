<div class="modal fade" id="acad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Academic Qualifications</h4>
            </div>
            <form action="{{ route('addAcademicQualification',['sid' => auth()->user()]) }}" method="POST" id="add-staff-children">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="items">
                            <thead>
                            <tr style="background-color: #f9f9f9;">
                                <th width="5%"  class="text-center">Actions</th>
                                <th width="19%"  class="text-center">Level</th>
                                <th width="30%" class="text-left">Qualification</th>
                                <th width="19%" class="text-left">Class</th>
                                <th width="30%" class="text-center">Awarding Institution</th>
                                <th width="1%" class="text-right">Start Date</th>
                                <th width="1%" class="text-right">Finish Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $item_row = 0; ?>
                            <tr id="item-aca-{{ $item_row }}">
                                <td class="text-center" style="vertical-align: middle;">
                                    <button type="button" onclick="$(this).tooltip('destroy'); $('#item-aca-{{ $item_row }}').remove();" data-toggle="tooltip" title="Remove" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                </td>
                                <td>
                                    <select class="form-control text-right" style="width: 100px" required="required" name="item[{{ $item_row }}][level]" id="item-price-{{ $item_row }}">
                                        <option value="FD">First Degree</option>
                                        <option value="MD">Masters Degree</option>
                                        <option value="DD">Doctorate Degree</option>
                                    </select>
                                </td>
                                <td>
                                    <textarea class="form-control typeahead" style="width: 100px" required="required" placeholder="Name of Qualification" name="item[{{ $item_row }}][qualification]" type="text" id="item-name-{{ $item_row }}" autocomplete="off"></textarea>
                                    <input name="item[{{ $item_row }}][sid]" type="hidden" id="item-id-{{ $item_row }}">
                                </td>
                                <td>
                                    <select class="form-control text-right" style="width: 100px" required="required" name="item[{{ $item_row }}][class]" id="item-price-{{ $item_row }}">
                                        <option value="FC">First Class</option>
                                        <option value="SCU">Second Class Upper</option>
                                        <option value="SCL">Second Class Lower</option>
                                    </select>
                                </td>
                                <td>
                                    <textarea class="form-control text-center" style="width: 100px" required="required" name="item[{{ $item_row }}][awarding_institution]" type="text" id="item-quantity-{{ $item_row }}"></textarea>
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
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button class="btn btn-success btn-save-program" type="submit">Save</button>
                    </div>
            </form>
            <div class="errors alert alert-danger hidden"></div>
        </div>
    </div>
</div>
<script>

    var item_row = {{ $item_row }};

    function addQualification() {
        html  = '<tr id="item-aca-' + item_row + '">';
        html += '  <td class="text-center" style="vertical-align: middle;">';
        html += '      <button type="button" onclick="$(this).tooltip(\'destroy\'); $(\'#item-aca-' + item_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>';
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