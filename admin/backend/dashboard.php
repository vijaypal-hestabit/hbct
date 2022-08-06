<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "modals/dashboard.php";
class Dashboard
{
    function __construct()
    {
        $editor_data = $_POST['editor_data'];
        $this->dashboard_insert($editor_data);
    }

    public function dashboard_insert($editor_data)
    {
        $setdata = new DashboardModal();
        $res = $setdata->setdashboard($editor_data);
        echo json_encode(['data_insert' => $res]);
    }
}
$ob = new Dashboard();
