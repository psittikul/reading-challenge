<?php
    include "connection.php";
    $title = $_POST['title'];
    $author = $_POST['author'];
    $status = $_POST['status'];
    $date_read = $_POST['date_read'];
    $user_id = $_POST['user_id'];
    $prompt_id = $_POST['prompt_id'] > 0 ? $_POST['prompt_id'] : NULL;
    $book_id = $_POST['book_id'];

    if ($book_id > 0) {
        $query = "UPDATE books SET prompt_id = $prompt_id, title = '$title', author = '$author', 
            status = '$status', date_read = '$date_read' WHERE id = $book_id;";
    }
    else {
        $query = "INSERT INTO books(id, title, author, status, date_read, user_id, prompt_id) VALUES(NULL, '$title', '$author', '$status', '$date_read', $user_id, $prompt_id);";
    }

    
    if($conn->query($query)) {
        echo "SUCCESS?????????";
    }
    else {
        echo "Error: " . $conn->error;
    }
