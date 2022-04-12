<?php

class Prompt {

    // Properties
    public int $id;
    public $prompt;

    public function __construct() {
        // Is this necessary?
    }

    public function getAll() {
        $result = $GLOBALS['conn']->query('SELECT * FROM prompts');
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = [
                'id' => $row['id'],
                'prompt' => $row['prompt'],
            ];
        }
        return $data;
    }

    public function getAllForJSON() {
        $result = $GLOBALS['conn']->query('SELECT * FROM prompts');
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = [
                'id' => $row['id'],
                'prompt' => addslashes($row['prompt']),
            ];
        }
        return json_encode($data);
    }

    public function format($field, $value) {
        switch($field) {
            case 'status':
                return implode('-',explode(' ', strtolower($value)));
        }
    }
}