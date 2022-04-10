<?php

class Prompt extends Model {

    //Properties
    public $id;
    public $prompt;

    public function all() {
        $all = $this->DB->conn->query('SELECT * FROM prompts');
        return $all->fetch_assoc();
    }
}