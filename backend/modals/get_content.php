<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require '../../admin/backend/modals/connection.php';

class GetContent
{
    public function __construct()
    {
        $this->db = new dbConnection();
    }
    public function getContent()
    {
        $login_query = "SELECT article FROM articles";
        $query = $this->db->conn->query($login_query);
        $result = mysqli_num_rows($query);
        $data = $query->fetch_all(MYSQLI_ASSOC);
        if ($result > 0) {
            $response = $data;
        } else {
            $response = false;
        }
        echo json_encode($response);
    }
}
$get_content = new GetContent();
$get_content->getContent();