<?php

    class Connection {
        private $host;
        private $user;
        private $pass;
        private $db;
        private $conn;
        
        public function __construct($host = "localhost", $user = "root", $pass = "", $db = "luigi") {
        	$this->host = $host;
        	$this->user = $user;
        	$this->pass = $pass;
        	$this->db = $db;
        }

        private function dbconnect() {
            try {
            	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            	$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
            }
            catch (\Exception $e) {
                return $e;
            }
        }

        public function getConnection() {
            $this->dbconnect();
            return $this->conn;
        }
    }
    
?>
