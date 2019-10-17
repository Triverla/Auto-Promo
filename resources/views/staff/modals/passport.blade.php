<div class="modal fade" id="passport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Passport Upload</h4>
            </div>

            <img src="/pictures/{{ auth()->user()->passport }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{ auth()->user()->sid }}'s Passport</h2>
            <form enctype="multipart/form-data" action="/passport" method="POST">
                <label>Update Passport</label>
                <input type="file" name="passport">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button class="btn btn-success btn-upload-passport" type="submit">Save</button>
                </div>
            </form>
        </div>
            <div class="errors alert alert-danger hidden"></div>
        </div>
</div>