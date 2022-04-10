<?php
include 'Model.php';

class User extends Model {
    
    // Properties
    // public $conn;
    public $id;
    public $name;
    public $image_path;
    public $color;

    public int $score;

    // Relations
    public $books;

    public function __construct($id) {
        echo "New user??????";
        $this->id = $id;
        var_dump($this->DB);
        // $this->getQueryAggregates();
    }

    // Methods
    // public function all() {
    //     $conn = $this->DB->conn;
    //     $result = $conn->query('SELECT * FROM users');
    // }

    public function get($id) {
        $conn = $this->DB->conn;
        $query = $conn->query("SELECT * FROM users where user_id = $id");
        while ($user = $query->fetch_assoc()) {
            $this->id = $user['id'];
            $this->name = $user['name'];
            $this->color = $user['color'];
        }
    }
    
    public function getQueryAggregates() {
        $conn = $this->DB->conn;
        $query = "SELECT books.* FROM books where user_id = $this->id";
        $result = $conn->query($query);
        var_dump($result->fetch_assoc());
        // while($book = $result->fetch_assoc()) {
        //     $this->books[] = $book;
        // }
    }

    // public function addBook(Book $book) {
        
    // }

    // public function getScore() {

    // }
}