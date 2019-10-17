<div class="modal fade" id="publication" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Publication</h4>
            </div>
            <form action="{{ route('addPublications',['sid' => auth()->user()]) }}" method="POST" id="publication">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="items">
                            <thead>
                            <tr style="background-color: #f9f9f9;">
                                <th width="5%"  class="text-center">Actions</th>
                                <th width="50%" class="text-left">Details</th>
                                <th width="30%" class="text-center">URL</th>
                                <th width="15%" class="text-right">Type</th>
                                <th width="15%" class="text-right">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $item_row = 0; ?>
                            <tr id="item-row-{{ $item_row }}">
                                <td class="text-center" style="vertical-align: middle;">
                                    <button type="button" onclick="$(this).tooltip('destroy'); $('#item-row-{{ $item_row }}').remove();" data-toggle="tooltip" title="Remove" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                </td>
                                <td>
                                    <input class="form-control typeahead" required="required" placeholder="Publication Details" name="item[{{ $item_row }}][details]" type="text" id="item-name-{{ $item_row }}" autocomplete="off">
                                    <input name="item[{{ $item_row }}][sid]" type="hidden" id="item-id-{{ $item_row }}">
                                </td>
                                <td>
                                    <input class="form-control text-center" required="required" name="item[{{ $item_row }}][url]" type="text" id="item-quantity-{{ $item_row }}">
                                </td>
                                <td>
                                    <select class="form-control text-right" required="required" name="item[{{ $item_row }}][type]" id="item-price-{{ $item_row }}">
                                        <option value="journal">journal</option>
                                        <option value="ebook">ebook</option>
                                        <option value="monograph">Monograph</option>
                                        <option value="researchreport">Research Report</option>
                                        <option value="bookreview">Book Review</option>
                                        <option value="creativework">Creative Work</option>
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control text-right" required="required" name="item[{{ $item_row }}][date]" type="date" id="item-date-{{ $item_row }}">
                                </td>
                            </tr>

                            <?php $item_row++; ?>
                            <tr id="addItem">
                                <td class="text-center"><button type="button" onclick="addPublication();" data-toggle="tooltip" title="Add Publication" class="btn btn-xs btn-primary" data-original-title="{{ trans('general.add') }}"><i class="fa fa-plus"></i></button></td>
                                <td class="text-right" colspan="5"></td>
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
    function addPub(program){
        $.ajax({
            type: "POST",
            url: "{{ route('addStaffChildren',['sid' => auth()->user()]) }}",
            data: {'sid' : $('#sid').val(), 'child_name': $('#cname').val(),'age': $('#age').val(),'position': $('#position').val()}
        });
    }
    var item_row = {{ $item_row }};

    function addPublication() {
        html  = '<tr id="item-row-' + item_row + '">';
        html += '  <td class="text-center" style="vertical-align: middle;">';
        html += '      <button type="button" onclick="$(this).tooltip(\'destroy\'); $(\'#item-row-' + item_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>';
        html += '  </td>';
        html += '  <td>';
        html += '      <input class="form-control typeahead" required="required" placeholder="Publication Details" name="item[' + item_row + '][details]" type="text" id="item-name-' + item_row + '" autocomplete="off">';
        html += '      <input name="item[' + item_row + '][sid]" type="hidden" id="item-id-' + item_row + '">';
        html += '  </td>';
        html += '  <td>';
        html += '      <input class="form-control text-center" required="required" name="item[' + item_row + '][url]" type="text" id="item-quantity-' + item_row + '">';
        html += '  </td>';
        html += '  <td>';
        html += '       <select class="form-control text-right" required="required" name="item[' + item_row + '][type]" id="item-price-' + item_row +'">';
        html += '    <option value="journal">journal</option>';
        html += '    <option value="ebook">ebook</option>';
        html += '    <option value="monograph">Monograph</option>';
        html += '   <option value="researchreport">Research Report</option>';
        html += '<option value="bookreview">Book Review</option>';
        html += ' <option value="creativework">Creative Work</option>';
        html += '</select>';
        html += '  </td>';
        html += '  <td>';
        html += '      <input class="form-control text-right" required="required" name="item[' + item_row + '][date]" type="date" id="item-date-' + item_row + '">';
        html += '  </td>';

        $('#items tbody #addItem').before(html);
        //$('[rel=tooltip]').tooltip();

        $('[data-toggle="tooltip"]').tooltip('hide');
        item_row++;
    }
</script>