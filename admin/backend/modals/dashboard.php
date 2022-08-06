<?php
require 'connection.php';

class DashboardModal
{

    public function __construct()
    {
        $this->db = new dbConnection();
    }

    public function setdashboard($editor_data)
    {

        $login_query = "SELECT article FROM articles";
        $query = $this->db->conn->query($login_query);
        $editor_data = addslashes($editor_data);
        $result = mysqli_num_rows($query);
        if ($result > 0) {
            $datetime = date('Y-m-d h:i:s');
            $login_query = "UPDATE `articles` SET `article`='$editor_data',`edited_on`='$datetime '";
            $query = $this->db->conn->query($login_query);
            if ($query) {
                $response = 'Update successfully';
            } else {
                $response = false;
            }
        }else{
            $login_query = "INSERT INTO `articles` (`article`) VALUES ('{$editor_data}')";
            $query = $this->db->conn->query($login_query);
            if ($query) {
                $response = 'Insert successfully';
            } else {
                $response = false;
            }
        }
        return $response;
    }
}
