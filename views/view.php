<?php
class View {
    private $model;
    private $controller;

    public function __construct($controller,$model) {
        $this->controller = $controller;
        $this->model = $model;
    }

    public function output() {
        return "<p>" . $this->model->string . "</p>";
    }

    public function details() {
        
    }
}