<?php
include 'Model.php';
class Prompt extends Model {

    //Properties
    public $id;
    public $prompt;

    public function all() {
        $arr = [];
        $all = $this->DB->conn->query('SELECT * FROM prompts');
        while ($row = $all->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }
}