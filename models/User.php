<?php
// include 'DB.php';
// include 'Model.php';

// class User extends Model {
    
//     // Properties
//     // public $conn;
//     public $id;
//     public $name;
//     public $image_path;
//     public $color;
//     public $order;

//     public int $score;

//     // Relations
//     public $books;

//     // public function __construct($id) {
//     //     echo "New user??????";
//     //     $this->id = $id;
//     //     // var_dump($this);
//     //     // $this->getQueryAggregates();
//     // }

//     // Methods
//     // public function all() {
//     //     $conn = $this->DB->conn;
//     //     $result = $conn->query('SELECT * FROM users');
//     // }

//     public function find($id) {
//         $query = $this->DB->conn->query('select * from users where id = ' . $id);
//         while ($user = $query->fetch_assoc()) {
//             $this->id = $user['id'];
//             $this->name = $user['name'];
//             $this->color = $user['color'];
//             $this->image_path = $user['image_path'];
//             $this->order = $user['order'];
//         }
//         // $this->getQueryAggregates();
//         return $this;
//     }
    
//     public function getQueryAggregates() {
//         $query = "SELECT books.* FROM books where user_id = $this->id";
//         $result = $this->DB->conn->query($query);
//         while($book = $result->fetch_assoc()) {
//             $this->books[] = $book;
//         }
//     }

//     // public function addBook(Book $book) {
        
//     // }

//     // public function getScore() {

//     // }

//     public function getBookForPrompt($prompt) {
//         $query = "SELECT * from books where user_id = $this->id AND prompt_id = $prompt";
//         $result = $this->DB->conn->query($query);
//         // var_dump($result->fetch_assoc());
//         return $result->fetch_assoc();
//     }
// }