var editor = CKEDITOR.replace('ckeditor');
CKFinder.setupCKEditor(editor)

$(document).ready(function () {
    $.ajax({
        type: "get",
        url: "../backend/modals/get_content.php",
        dataType: "json",
        success: function (response) {
            if (response) {
                CKEDITOR.instances['ckeditor'].setData(response[0].article)
            }
        }
    });

});
$("#submit").click(function (e) {
    e.preventDefault();
    let editor_data = CKEDITOR.instances.ckeditor.getData();

    var text = $(editor_data).text().trim();

    if (text.length == 0) {
        $('#ckeditor_err').html('Please Enter something')
        $('#ckeditor_err').removeClass('text-success');
        $('#ckeditor_err').addClass('text-danger')
        setTimeout(() => {
            $('#ckeditor_err').html('')
        }, 2000);
    } else {
        $.ajax({
            type: "post",
            url: "backend/dashboard.php",
            data: {
                'editor_data': editor_data
            },
            beforeSend: function () {
                $('#submit').prop('disabled')
                $('#submit').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
            },
            dataType: "json",
            success: function (response) {
                if (response.data_insert) {
                    $('.toast-body').html(response.data_insert);
                    $('#status_toast').addClass('show')
                    setTimeout(() => {
                        $('#status_toast').removeClass('show')
                    }, 3000);
                } else {
                    $('#ckeditor_err').html('Data not inserted')
                    $('#ckeditor_err').removeClass('text-success');
                    $('#ckeditor_err').addClass('error')
                    setTimeout(() => {
                        $('#ckeditor_err').html('');
                    }, 3000);
                }
            },
            complete: function() {
                $('.spinner-border').css({display:'none'})
            }
        });
    }

});