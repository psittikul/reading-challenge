<?php
include '../models/Prompt.php';
include '../models/User.php';
class PromptController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function list() {
        echo "Get data needed\n";
        $Prompt = $this->model;
        echo "Is ";
        $User = new User();
        echo " this ";
        $conn = $this->model->DB->conn;
        echo " thing ";
        $prompts = $Prompt->all();
        echo " still ";
        $users = [];
        echo " on?\n";
        while ($row = $conn->query("SELECT * FROM users ORDER BY users.order DESC")->fetch_assoc()) {
            $users[] = $User->find($row['id']);
        }
    }

}