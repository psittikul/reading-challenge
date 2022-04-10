<?php

class DB {
    public $conn;
    
    public function __construct() {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        date_default_timezone_set('America/New_York');

        $server = $url["host"];
        $username = $url["user"];
        $password = $url["pass"];
        $db = substr($url["path"], 1);

        $this->conn = new mysqli($server, $username, $password, $db);
        echo "Connection successful?!";

        if($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}