
function submitComment(id){
    var data = new FormData();
    data.append('application_no', id);
    var comment = $('#hod-comment-'+ id +'#form-new-comment textarea').val();
    data.append('comment', comment);

        $.ajax({
            url: BASE_URL + 'aper/hodComment/' + id,
            type: "POST",
            timeout: 5000,
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': CSRF},
            error: function () {
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Something went wrong!');
            }
        });
}


function hodApprove(id){

    var data = new FormData();
    data.append('id', id);

    $.ajax({
        url: BASE_URL + '/hod/approve/'+ id,
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function(response){
            if (response.code == 200){
                if (response.type == 'approve'){
                    $('#aper-'+id+' .aper-text span').html('Cancel');
                    $('#aper-'+id+' .aper-text i').removeClass('fa-thumbs-o-up').addClass('fa-thumbs-o-down');
                }else{
                    $('#aper-'+id+' .aper-text span').html('Approve');
                    $('#aper-'+id+' .attend-text i').removeClass('fa-thumbs-o-down').addClass('fa-thumbs-o-up');
                }
            }else{
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Something went wrong!');
            }
        },
        error: function(){
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Something went wrong!');
        }
    });
}

function facApprove(id){

    var data = new FormData();
    data.append('id', id);

    $.ajax({
        url: BASE_URL + '/faculty/approve/'+ id,
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function(response){
            if (response.code == 200){
                if (response.type == 'approve'){
                    $('#aper-'+id+' .aper-text span').html('Cancel');
                    $('#aper-'+id+' .aper-text i').removeClass('fa-thumbs-o-up').addClass('fa-thumbs-o-down');
                }else{
                    $('#aper-'+id+' .aper-text span').html('Approve');
                    $('#aper-'+id+' .attend-text i').removeClass('fa-thumbs-o-down').addClass('fa-thumbs-o-up');
                }
            }else{
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Something went wrong!');
            }
        },
        error: function(){
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Something went wrong!');
        }
    });
}

function complexApprove(id){

    var data = new FormData();
    data.append('id', id);

    $.ajax({
        url: BASE_URL + '/complex/approve/'+ id,
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function(response){
            if (response.code == 200){
                if (response.type == 'approve'){
                    $('#aper-'+id+' .aper-text span').html('Cancel');
                    $('#aper-'+id+' .aper-text i').removeClass('fa-thumbs-o-up').addClass('fa-thumbs-o-down');
                }else{
                    $('#aper-'+id+' .aper-text span').html('Approve');
                    $('#aper-'+id+' .attend-text i').removeClass('fa-thumbs-o-down').addClass('fa-thumbs-o-up');
                }
            }else{
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Something went wrong!');
            }
        },
        error: function(){
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Something went wrong!');
        }
    });
}

function evaluate(id){

    var data = new FormData();
    data.append('id', id);

    $.ajax({
        url: BASE_URL + '/complex/evaluate/' + id,
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function(response){
           alert('Evaluation Successful');
        },
        error: function(){
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Something went wrong!');
        }
    });
}

function evaluateStaff(id){

    var data = new FormData();
    data.append('id', id);

    $.ajax({
        url: BASE_URL + '/complex/evaluate/'+ id,
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function(response){
            if (response.code == 200){
                if (response.type == 'Evaluate'){
                    $('#eva-'+id+' .aper-text span').html('Cancel');
                    $('#eva-'+id+' .aper-text i').removeClass('fa-thumbs-o-up').addClass('fa-thumbs-o-down');
                }else{
                    $('#eva-'+id+' .aper-text span').html('Evaluate');
                    $('#eva-'+id+' .attend-text i').removeClass('fa-thumbs-o-down').addClass('fa-thumbs-o-up');
                }
            }else{
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Something went wrong!');
            }
        },
        error: function(){
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Something went wrong!');
        }
    });
}