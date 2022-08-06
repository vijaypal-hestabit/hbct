<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use validator\validator;

include "validator.php";
include "modals/login.php";
class login
{
    function __construct()
    {

        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $this->login_validate($email, $password);
    }

    public function login_validate($email, $password)
    {

        $check_user = new LoginModal();

        if (!validator::is_require($email)['value']) {
            $emailr = ['email_error' => "Please enter email"];
        } else {
            $emailr = 1;
        }

        if (!validator::is_require($password)['value']) {
            $passwordr = ['password_error' => "Please enter password"];
        } else {
            $passwordr = 1;
        }



        // login on database
        if ($emailr == 1 && $passwordr == 1) {
            $res = $check_user->login($email, $password);
            echo json_encode(['login' => $res]);
        } else {
            $response = ['email' => $emailr, 'password' => $passwordr];
            echo json_encode($response);
        }
    }
}
$ob = new login();
