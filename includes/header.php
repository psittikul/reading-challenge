<?php include 'connection.php';?>
<!doctype html>
<html>
    <head>
        <title>2022 walmart PP gang reading challenge</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel='stylesheet' href='assets/styles/styles.css'>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class='container-sm'>
            <h1 id='pageTitle'>2022 WALMART PP GANG READING CHALLENGE</h1>
            <?php
                var_dump($conn->query('SELECT * FROM users'));
            ?>