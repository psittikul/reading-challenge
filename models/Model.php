<?php

class Model {
    public $DB;

    public function __construct() {
        $this->DB = new DB();
    }
}