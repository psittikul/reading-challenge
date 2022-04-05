<?php
    // $query = "INSERT INTO books(title, author, user_id) VALUES('" . $_POST['title'] . "', '" . $_POST['author'] . "', " . $_POST['user_id'] . ")";
    echo json_encode($_POST);
    // $query = "INSERT INTO books(title, author, status, user_id) VALUES('" . $_POST['title'] .
        // "', '" . $_POST['author'] . "', '" . $_POST['status'] . "'," . $_POST['user_id'] . ")";
    // $query = "INSERT INTO books(title, user_id) VALUES('test', 24)";
    // $conn->query($query);
    // echo json_encode(['query'=>$query]);
    // $result = $conn->query($query);

    if(mysqli_error($conn)) {
        echo json_encode(['data'=>"Error: $query " . mysqli_error($conn)]);
    }

    else {
        echo json_encode(['query'=>$query]);
    }