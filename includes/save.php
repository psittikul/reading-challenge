<?php
    include "connection.php";
    $query = "INSERT INTO books(id, title, author, status, date_read, user_id) VALUES(NULL, '" . $_POST['title'] . "', '" . $_POST['author'] . "', '" .
        $_POST['status'] . "', " . $_POST['date_read'] . "," . $_POST['user_id'] . ")";
    if($conn->query($query)) {
        echo json_encode(['data'=>$query, 'message'=>'SUCCESS????????']);
    }
    else {
        echo json_encode("Error: " . $query . "<br>" . $conn->error);
    }
    // echo json_encode(['data'=>'help']);
    // $query = "INSERT INTO books(title, author, status, user_id) VALUES('" . $_POST['title'] .
        // "', '" . $_POST['author'] . "', '" . $_POST['status'] . "'," . $_POST['user_id'] . ")";
    // $query = "INSERT INTO books(title, user_id) VALUES('test', 24)";
    // $conn->query($query);
    // echo json_encode(['query'=>$query]);
    // $result = $conn->query($query);
