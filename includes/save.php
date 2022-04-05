<?php
    // $query = "INSERT INTO books(title, user_id) VALUES('Alif the Unseen', " . $_POST['user_id'] . ");";
    $query = "INSERT INTO books(id, title, user_id) VALUES(124, 'Alif the Unseen', 24);";
    if($conn->query($query)) {
        echo json_encode(['data'=>$query, 'message'=>'maybe ID issue']);
    }
    else {
        echo json_encode("Error: " . $query . "<br>" . $conn->error);
    }
    // if($conn->query($query)) {
    //     echo json_encode(['data'=>$query, 'msg'=>'HOORAY']);
    // }

    // else {
    //     echo json_encode('idfk');
    // }
    // $query = "INSERT INTO books(title, author, user_id) VALUES('" . $_POST['title'] . "', '" . $_POST['author'] . "', " . $_POST['user_id'] . ")";
    // echo json_encode(['data'=>'help']);
    // $query = "INSERT INTO books(title, author, status, user_id) VALUES('" . $_POST['title'] .
        // "', '" . $_POST['author'] . "', '" . $_POST['status'] . "'," . $_POST['user_id'] . ")";
    // $query = "INSERT INTO books(title, user_id) VALUES('test', 24)";
    // $conn->query($query);
    // echo json_encode(['query'=>$query]);
    // $result = $conn->query($query);
