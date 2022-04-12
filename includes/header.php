<?php include 'connection.php';?>
<!doctype html>
<html>
    <head>
        <title>2022 walmart PP gang reading challenge</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
        <link rel='stylesheet' href='assets/styles/styles.css'>
        <link rel="shortcut icon" href="favicon.ico"/>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class='container-fluid'>
            <h1 id='pageTitle'>2022 WALMART PP GANG READING CHALLENGE</h1>
            <ul class="list-group list-group-horizontal" id='topNav'>
                <a href='<?php echo $_SERVER['REQUEST_URI'] == '/challenge.php' ? 'index.php' : '#';?>'><li class="list-group-item">LEADERBOARD</li></a>
                <a href='<?php echo $_SERVER['REQUEST_URI'] == '/challenge.php' ? '#' : 'challenge.php';?>'><li class="list-group-item">SPREADSHEET</li></a>
            </ul>