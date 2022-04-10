<?php
// include 'DB.php';
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

    // public function __construct($id) {
    //     echo "New user??????";
    //     $this->id = $id;
    //     // var_dump($this);
    //     // $this->getQueryAggregates();
    // }

    // Methods
    // public function all() {
    //     $conn = $this->DB->conn;
    //     $result = $conn->query('SELECT * FROM users');
    // }

    public function find($id) {
        echo "Find user with ID: $id";
        // $conn = $this->DB->conn;
        $query = $this->DB->conn->query('select * from users');
        var_dump($query);
        // while ($user = $query->fetch_assoc()) {
        //     $this->id = $user['id'];
        //     $this->name = $user['name'];
        //     $this->color = $user['color'];
        // }
        // $this->getQueryAggregates();
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