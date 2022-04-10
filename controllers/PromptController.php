<?php
include '../models/Prompt.php';
include '../models/User.php';
include '../models/Model.php';
include '../models/DB.php';

class PromptController {
    private $model;
    private $DB;

    public function __construct($model) {
        $this->model = $model;
        $this->DB = new DB();
    }

    public function list() {
        echo "Get data needed\n";
        $Prompt = $this->model;
        echo "Is ";
        $User = new User();
        echo " this ";
        $conn = $this->model->DB->conn;
        echo " thing ";
        // $prompts = $Prompt->all();
        echo " still ";
        $users = [];

        $query = $this->DB->conn->query("SELECT * FROM users ORDER BY users.order DESC");
        var_dump($query);

        while ($row = $query->fetch_assoc()) {
            echo "idk,,,";
            $users[] = $User->find($row['id']);
        }
        echo " on?\n";
    }

}