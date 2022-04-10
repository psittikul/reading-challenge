<?php
include '../models/Prompt.php';
class PromptController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function list() {
        echo "Get data needed";
        $Prompt = $this->model;
        $User = new User();
        $conn = $this->model->DB->conn;
        $prompts = $Prompt->all();
        $users = [];
        while ($row = $conn->query("SELECT * FROM users ORDER BY users.order DESC")->fetch_assoc()) {
            $users[] = $User->find($row['id']);
        }
    }

}