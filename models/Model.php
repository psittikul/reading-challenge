<?php
include 'DB.php';

class Model {
    public $DB;

    public function __construct() {
        echo "Should make DB connection????????";
        $this->DB = new DB();
    }
}