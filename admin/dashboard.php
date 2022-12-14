<?php
session_start();
if (isset($_SESSION['email'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>dashboard</title>
        <link rel="icon" type="image/x-icon" href="../favicon.ico">
        <!-- bootstrap 5 css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="./css/global.css" rel="stylesheet">
        <link href="./css/dashboard.css" rel="stylesheet">
    </head>

    <body>
        <div class="header bg-gradient">
            <div class="container">
                <div class="row justify-content-between p-3">
                    <div class="col-6">
                        <h2 class="text-info">Welcome to dashboard</h2>
                    </div>
                    <div class="col-6 text-right">
                        <a href="backend/logout.php"><img class="text-right" id="logout" src="../assets/logout.svg" alt="logout" title="Logout"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard_wrapper mt-4">
            <div id="status_toast" class="toast align-items-center text-white bg-success border-0 position-absolute" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        Data insert successfully
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            <div class="container">
                <form method="post">
                    <textarea class="form-control" name="ckeditor" id="ckeditor" cols="100" rows="30"></textarea>
                    <div class="error" id="ckeditor_err"></div>
                    <div class="mt-4 text-right updating_btn">
                        <button class="btn btn-info" id="submit">Submit <span class="d-none spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>
                        
                    </div>
                </form>
            </div>
        </div>
    </body>
    <!-- bootstrap 5 js -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="ckeditor/ckeditor/ckeditor.js"></script>
    <script src="ckeditor/ckfinder/ckfinder.js"></script>
    <script src="js/dashboard.js"></script>

    <!-- <script>
        var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function(toastEl) {
            return new bootstrap.Toast(toastEl, option)
        })
    </script> -->

    </html>
<?php
} else {
    header('location: index.php');
}

?>