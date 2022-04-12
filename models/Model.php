<?php

class Model {
//     public $DB;

    public function getAll($model) {
        $data = [];
        $result = $GLOBALS['conn']->query("SELECT * FROM $model");
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
}