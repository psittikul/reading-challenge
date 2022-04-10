<?php

class User extends Model {
    
    // Properties
    public $id;
    public $name;
    public $image_path;
    public $color;

    public int $score;

    // Relations
    public $books;

    public function __construct($id) {
        $this->id = $id;
        $this->getQueryAggregates();
    }

    // Methods
    public function getQueryAggregates() {
        $conn = $this->DB->conn;
        $query = "SELECT books.* FROM books where user_id = $this->id";
        $result = $conn->query($query);

        while($book = $result->fetch_assoc()) {
            $this->books[] = $book;
        }
    }

    public function addBook(Book $book) {
        
    }

    public function getScore() {

    }
}