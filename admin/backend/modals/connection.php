<?php
if ($_SERVER['HTTP_HOST'] == 'hbsports.com') {
    $base_url = 'http://'.$_SERVER['HTTP_HOST'].'/hbct/';
    class dbConnection
    {
        private $host = 'localhost';
        private $user = 'root';
        private $pass = 'hestabit';
        private $dbname = 'hbct';
        public $conn;

        public function __construct()
        {
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

            if ($this->conn->connect_error) {
                die("<h1>Database Connection Failed</h1>");
            } else {
                // echo "Database Connected Successfully";
            }
        }
    }
} else {
    $base_url = 'http://'.$_SERVER['HTTP_HOST'].'/tse/hbct/';
    class dbConnection
    {
        private $host = 'localhost';
        private $user = 'tse';
        private $pass = 'bPmtHasjyTJ2SgZJ';
        private $dbname = 'vijay_pal';
        public $conn;
        
        public function __construct()
        {
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
            
            if ($this->conn->connect_error) {
                die("<h1>Database Connection Failed</h1>");
            } else {
                // echo "Database Connected Successfully";
            }
        }
    }
}