var editor = CKEDITOR.replace('ckeditor');
CKFinder.setupCKEditor(editor)

$(document).ready(function () {
    $.ajax({
        type: "get",
        url: "../backend/modals/get_content.php",
        dataType: "json",
        success: function (response) {
            CKEDITOR.instances['ckeditor'].setData(response[0].article)
        }
    });

});
$("#submit").click(function (e) {
    e.preventDefault();
    let editor_data = CKEDITOR.instances.ckeditor.getData();
    if (editor_data == '' && jQuery.trim(editor_data).length == 0) {
        $('#ckeditor_err').html('Please Enter something')
        $('#ckeditor_err').removeClass('text-success');
        $('#ckeditor_err').addClass('error')
        setTimeout(() => {
            $('#ckeditor_err').html('')
        }, 2000);
    } else {
        $.ajax({
            type: "post",
            url: "backend/dashboard.php",
            // beforeSend: function () {
            //     var html = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please Wait...';
            //     $('#ckeditor_err').html(html);
            //     $('#ckeditor_err').css({color:'yellow'});
            // },
            data: {
                'editor_data': editor_data
            },
            dataType: "json",
            success: function (response) {
                if (response.data_insert) {
                    $('#ckeditor_err').removeClass('error');
                    $('#ckeditor_err').addClass('text-success');
                    $('#ckeditor_err').html(response.data_insert);
                    setTimeout(() => {
                        $('#ckeditor_err').html('');
                    }, 2000);
                } else {
                    $('#ckeditor_err').html('Data not inserted')
                    $('#ckeditor_err').removeClass('text-success');
                    $('#ckeditor_err').addClass('error')
                    setTimeout(() => {
                        $('#ckeditor_err').html('Insert successfully');
                    }, 3000);
                }
            }
        });
    }

});