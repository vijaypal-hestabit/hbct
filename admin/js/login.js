let passwordValidator = () => {
    $('#password_err').html('');
    $("#login_status").html('')
}
let emailValidator = () => {
    $('#emial_err').html('');
    $("#login_status").html('')
}

$('#email_id').blur(function () {
    var email = $('#email_id').val();
    console.log('inside email' ,email)
    if (email == '') {
        $('#emial_err').html('Please enter email');
        $("#login_status").html('')
    } else if (!/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        $('#emial_err').html('Please enter valid email');
    } else {
        var email_status = true
        $('#emial_err').html('');
    }
});

$('#password').blur(function () {
    var password = $('#password').val();
    console.log('inside pass' ,password)
    if (password == '') {
        $('#password_err').html('Please enter password');
    } else {
        var password_status = true
        $('#password_err').html('');
    }
});

$('#log_in').click(function () {
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
        var password_status = true
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
            success: function (response) {
                if (response.login == true) {
                    $("#login_status").html('Login successfully')
                    $("#login_status").css({
                        color: 'green'
                    })
                    $('#lock_img').prop('src', '../assets/unlock.png')
                    setTimeout(() => {
                        window.location.replace('dashboard.php');
                    }, 1500);
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