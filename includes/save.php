<?php
    $title = $_POST['title'];
    $author = $_POST['author'];
    $status = $_POST['status'];
    $date_read = $_POST['date_read'];
    $user_id = $_POST['user_id'];
    $prompt_id = $_POST['prompt_id'] > 0 ? $_POST['prompt_id'] : NULL;
    $book_id = $_POST['book_id'];
    $old_book_id = $_POST['old_book_id'] > 0 ? $_POST['old_book_id'] : NULL;

    if($old_book_id > 0) {
        $query = "UPDATE books SET prompt_id = NULL where id = $old_book_id";   
        $result = $GLOBALS['conn']->query($query);
        if(!$result) {
            echo "Error: " . $GLOBALS['conn']->error;
        }
    }
    if ($book_id > 0) {
        if ($date_read != '') {
            $query = "UPDATE books SET prompt_id = $prompt_id, title = '$title', author = '$author', 
                status = '$status', date_read = '$date_read' WHERE id = $book_id;";
        }
        else {
            $query = "UPDATE books SET prompt_id = $prompt_id, title = '$title', author = '$author', 
                status = '$status', date_read = '0000-00-00' WHERE id = $book_id;";
        }
    }
    else {
        $query = "INSERT INTO books(id, title, author, status, date_read, user_id, prompt_id) VALUES(NULL, '$title', '$author', '$status', '$date_read', $user_id, $prompt_id);";
    }
    
    echo "$query \n";
    
    // if($GLOBALS['conn']->query($query)) {
    //     echo "SUCCESS?????????";
    // }
    // else {
    //     echo "Error: " . $GLOBALS['conn']->error;
    // }
