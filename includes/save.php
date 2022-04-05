<?php
    $query = "INSERT INTO books(title, author, status, date_read, user_id) VALUES(" . $_POST['title'] .
        "," . $_POST['author'] . "," . $_POST['status'] . "," . $_POST['date_read'] . "," . $_POST['user_id'] . ")";
    
    $result = $conn->query($query);

    if(mysqli_error($conn)) {
        echo mysqli_error($conn);
    }

    else {
        echo "Success!!";
    }