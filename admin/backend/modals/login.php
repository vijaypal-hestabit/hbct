<?php
include 'connection.php';

class LoginModal
{

    public function __construct()
    {
        $this->db = new dbConnection();

    }

    public function login($user_name, $password)
    {
        $password = md5($password);
        $login_query = "SELECT email FROM admin_details WHERE email = '$user_name'  and password ='$password'";
        $query = $this->db->conn->query($login_query);
        $result = mysqli_num_rows($query);
        $data = $query->fetch_assoc();
        if ($result > 0) {
            $response = true;
            session_start();
            $_SESSION['email'] = $data['email'];
        } else {
            $response = false;
        }
        return $response;
    }
}