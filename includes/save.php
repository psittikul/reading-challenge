<?php
    include "connection.php";
    $title = $_POST['title'];
    $author = $_POST['author'];
    $status = $_POST['status'];
    $date_read = $_POST['date_read'];
    $user_id = $_POST['user_id'];

    $query = "INSERT INTO books(id, title, author, status, date_read, user_id) VALUES(NULL, '$title', '$author', '$status', $date_read, $user_id);";
    
    if($conn->query($query)) {
        echo "SUCCESS?????????";
    }
    else {
        echo $query . ": " . $conn->error;
    }
