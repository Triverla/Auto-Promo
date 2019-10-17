<div class="modal fade" id="faculty-comment-{{$stf->application_no}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Dean of Faculty Comment</h4>
            </div>

            <form id="form-new-comment" method="post" action="{{action('AperFormController@facultyComment', $stf->application_no)}}">
                {{csrf_field()}}
                <div class="modal-body">
                <div class="form-group">
                    <input name="application_no" type="hidden" value="{{$stf->application_no}}">
                    <label>Comment</label>
                    <textarea name="comment" class="form-control"></textarea>
                </div>

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button class="btn btn-success"  type="submit">Save</button>
                </div>

            </form>
        </div>
        <div class="errors alert alert-danger hidden"></div>
    </div>
</div>