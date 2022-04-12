<?php
// include 'DB.php';
// include 'Model.php';

// class User extends Model {
class User {

    public function getAll() {
        $data = [];
        $result = $GLOBALS['conn']->query("SELECT * FROM users ORDER BY users.order ASC");
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    
    public function getQuarter($userID, $quarter) {
        $query = "select
            freeReads,
            promptBooks,
            freeReads + 2*promptBooks as bookCount
            from
            (select
            if(z.freeReads is null, 0, z.freeReads) as freeReads,
            if(z.promptBooks is null, 0, z.promptBooks) as promptBooks
            from
            (select y.freeReads as freeReads, x.promptBooks as promptBooks
            from
            (
                select user_id as userID, count(books.id) AS promptBooks
                from books partition($quarter)
                where books.prompt_id > 0 AND books.status = 'Read' and user_id = $userID
            ) as x
            right outer join (
            select user_id as userID, count(books.id) as freeReads
            from books partition($quarter)
            where books.prompt_id is null AND books.status = 'Read' and user_id = $userID) as y on x.userID = y.userID) as z) as az;";
        $result = $GLOBALS['conn']->query($query);
        $data = [];
        while($row = $result->fetch_assoc()) {
            $data = [
                'freeReads' => $row['freeReads'],
                'promptBooks' => $row['promptBooks'],
                'bookCount' => $row['bookCount'],
            ];
        }
        return $data;
    }

    public function getUserBooksForPrompts() {
        $query = "select users.id as userID, books.id as bookID, books.title, books.author, books.status, books.date_read, prompts.id, prompts.prompt
        FROM
        users inner join books on users.id = books.user_id right outer join prompts on books.prompt_id = prompts.id
        where users.id is not null;";
        $result = $GLOBALS['conn']->query($query);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
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

    public function __construct() {
        // idk something goes here maybe??
    }

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
}