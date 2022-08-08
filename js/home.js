$.ajax({
    type: "get",
    url: "../backend/modals/get_content.php",
    dataType: "json",
    beforeSend: function () {
        var html = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please Wait...';
        $('#setContent').html(html);

    },
    success: function (response) {
        $('#setContent').html(response[0].article)
    }
});
