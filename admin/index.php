<?php
session_start();
if (isset($_SESSION['email'])) {
    header('location: dashboard.php');
} else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>hestabit login</title>
        <!-- bootstrap 5 css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <link href="../css/home.css" rel="stylesheet">
        <link href="./css/global.css" rel="stylesheet">
        <link href="./css/login.css" rel="stylesheet">
    </head>

    <body>

        <div class="admin_login">
            <div class="container">
                <div class="row content_center">
                    <div class="col-sm-6 d-grid align-items-center">
                        <div class="login_section">
                            <h2 class="text-info">Login to your account.</h2>
                            <h4 id="login_status"></h4>
                            <div class="login_content mt-2">
                                <input type="text" name="email" id="email_id" placeholder="Enter Email">
                                <div class="error" id="emial_err"></div>
                                <div>
                                    <input type="password" name="password" class="password" id="password" placeholder="Enter Password">
                                    <i class="far fa-eye" id="togglePassword"></i>
                                </div>
                                <div class="error" id="password_err"></div>
                                <div class="mt-2 text-right">
                                    <button type="button" id="log_in" class="btn btn-lg btn-info">Login</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 text-center">
                        <figure>
                            <img src="../assets/lock.png" id="lock_img" class="img-fluid" alt="poster">
                        </figure>
                    </div>
                </div>
            </div>
        </div>


    </body>
    <!-- bootstrap 5 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/login.js"></script>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function(e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    </script>

    </html>
<?php
}
?>