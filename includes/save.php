<?php
    include 'connection.php';

    $title = $_POST['title'];
    $author = $_POST['author'];
    $status = $_POST['status'];
    $date_read = $_POST['date_read'] != '' ? $_POST['date_read'] : '0000-00-00';
    $user_id = $_POST['user_id'];
    $prompt_id = $_POST['prompt_id'] ?? null;
    $book_id = $_POST['book_id'];
    $old_book_id = $_POST['old_book_id'] ?? null;

    if($old_book_id) {
        $query = "UPDATE books SET prompt_id = NULL where id = $old_book_id";   
        $result = $conn->query($query);
        if(!$result) {
            echo "Error: " . $GLOBALS['conn']->error;
        }
    }
    if ($book_id) {
        $sql = "UPDATE BOOKS SET prompt_id = ?, title = ?, author = ?, status = ?, date_read = ? WHERE id = $book_id";
        $stmt= $conn->prepare($sql);
        $stmt->bind_param("sssss", $prompt_id, $title, $author, $status, $date_read);
        $stmt->execute();
        // if ($date_read != '') {
        //     $query = "UPDATE books SET prompt_id = $prompt_id, title = '$title', author = '$author', 
        //         status = '$status', date_read = '$date_read' WHERE id = $book_id;";
        // }
        // else {
        //     $query = "UPDATE books SET prompt_id = $prompt_id, title = '$title', author = '$author', 
        //         status = '$status', date_read = '0000-00-00' WHERE id = $book_id;";
        // }
    }
    else {
        // $query = "INSERT INTO books(id, title, author, status, date_read, user_id, prompt_id) VALUES(NULL, '$title', '$author', '$status', '$date_read', $user_id, $prompt_id);";
        $sql = "INSERT INTO books(id, title, author, status, date_read, user_id, prompt_id) VALUES(NULL, ?, ?, ?, ?, ?, ?);";
        $stmt= $conn->prepare($sql);
        $stmt->bind_param("ssssss", $title, $author, $status, $date_read, $user_id, $prompt_id);
        $stmt->execute();
    }

    echo "$query \n";
    return;
    
    if($conn->query($query)) {
        echo "SUCCESS?????????";
    }
    else {
        echo "Error: " . $conn->error;
    }
