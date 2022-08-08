$('#log_in').click(function() {
    var email = $('#email_id').val();
    var password = $('#password').val();
    if (email == '') {
        $('#emial_err').html('Please enter email');
        $("#login_status").html('')
    } else if (!/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        $('#emial_err').html('Please enter valid email');
    } else {
        var email_status = true
        $('#emial_err').html('');
    }
    if (password == '') {
        setTimeout(() => {
            $("#login_status").html('')
        }, 50);
        $('#password_err').html('Please enter password');
    } else {
        password_status = true
        $('#password_err').html('');
    }

    if (email_status == true && password_status == true) {
        var formData = {
            'email': email,
            'password': password
        }

        $.ajax({
            type: "POST",
            url: "backend/login.php",
            data: formData,
            dataType: "json",
            success: function(response) {
                if (response.login == true) {
                    $("#login_status").html('Login successfully')
                    $("#login_status").css({
                        color: 'green'
                    })
                    $('#lock_img').prop('src','../assets/unlock.png')
                    setTimeout(() => {
                        window.location.replace('dashboard.php');
                    }, 3000);
                } else {
                    $("#login_status").html('Invalid Credentials')
                    $("#login_status").css({
                        color: 'red'
                    })
                }
            }
        });
    }
});