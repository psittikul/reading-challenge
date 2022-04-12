<?php
// include 'DB.php';
// include 'Model.php';

// class User extends Model {
class User {

    public $STATUS_FILLS = [
        'Read' => 'palegreen',
        'Currently Reading' => 'lightsalmon',
    ];

    public function getAll() {
        $data = [];
        $result = $GLOBALS['conn']->query("SELECT * FROM users ORDER BY users.order ASC");
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    
    public function getQuarter($userID, $quarter) {
        $data = [];
        // $query = "select
        //     freeReads,
        //     promptBooks,
        //     freeReads + 2*promptBooks as bookCount
        //     from
        //     (select
        //     if(z.freeReads is null, 0, z.freeReads) as freeReads,
        //     if(z.promptBooks is null, 0, z.promptBooks) as promptBooks
        //     from
        //     (select y.freeReads as freeReads, x.promptBooks as promptBooks
        //     from
        //     (
        //         select user_id as userID, count(books.id) AS promptBooks
        //         from books partition($quarter)
        //         where books.prompt_id > 0 AND books.status = 'Read' and user_id = $userID
        //     ) as x
        //     right outer join (
        //     select user_id as userID, count(books.id) as freeReads
        //     from books partition($quarter)
        //     where books.prompt_id is null AND books.status = 'Read' and user_id = $userID) as y on x.userID = y.userID) as z) as az;";
        $query_prompt = "SELECT count(books.id) as promptBooks from books partition($quarter) where user_id = $userID and status = 'Read' and prompt_id > 0";
        $query_free = "SELECT count(books.id) as freeReads from books partition($quarter) where user_id = $userID and status = 'Read' and prompt_id is null";
        $result = $GLOBALS['conn']->query($query_prompt);
        $data['promptBooks'] = $result->fetch_column(0) ?? 0;
        
        $result = $GLOBALS['conn']->query($query_free);
        $data['freeReads'] = $result->fetch_column(0) ?? 0;
        $data['bookCount'] = (2*$data['promptBooks']) + $data['freeReads'];
        // while($row = $result->fetch_assoc()) {
        //     $data = [
        //         'freeReads' => $row['freeReads'],
        //         'promptBooks' => $row['promptBooks'],
        //         'bookCount' => $row['bookCount'],
        //     ];
        // }
        return $data;
    }

    public function getUserBooksForPrompts() {
        $query = "select users.id as userID, books.id as bookID, title, author, status, date_read, prompts.id as promptID
        FROM
        users inner join books on users.id = books.user_id right outer join prompts on books.prompt_id = prompts.id
        where users.id is not null;";
        $result = $GLOBALS['conn']->query($query);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            // $fill = $this->STATUS_FILLS[$row['status']];
            
            $data[$row['userID']][$row['promptID']] = [
                'id' => $row['bookID'],
                'status' => $row['status'],
                'date_read' => $row['date_read'],
                'author' => $row['author'],
                'title' => $row['title'],
                // 'fill' => $fill,
            ];
        }
        return $data;
    }

    public function getUserBooksForPromptsJSON() {
        $query = "select users.id as userID, books.id as bookID, title, author, status, date_read, prompts.id as promptID
        FROM
        users inner join books on users.id = books.user_id right outer join prompts on books.prompt_id = prompts.id
        where users.id is not null;";
        $result = $GLOBALS['conn']->query($query);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            // $fill = $this->STATUS_FILLS[$row['status']];
            
            $data[$row['userID']][$row['promptID']] = [
                'id' => $row['bookID'],
                'status' => $row['status'],
                'date_read' => $row['date_read'],
                'author' => $row['author'],
                'title' => addslashes($row['title']), 
                // 'fill' => $fill,
            ];
        }
        return json_encode($data);
    }

    public function getFreeReads() {
        $query = "SELECT users.id as userID, books.id as bookID, title, author, status, date_read
        FROM users INNER JOIN books on users.id = books.user_id WHERE prompt_id is null";
        $result = $GLOBALS['conn']->query($query);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = [
                'user_id' => $row['userID'],
                'id' => $row['bookID'],
                'status' => $row['status'],
                'title' => $row['title'],
                'author' => $row['author'],
                'date_read' => $row['date_read'],
            ];
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