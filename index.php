<?php
    include 'includes/connection.php';
    include 'includes/header.php';
    include 'includes/footer.php';
?>
<?php
    $result = $conn->query('SELECT * FROM users');
    while($row = $result->fetch_assoc()) {
        var_dump($row);
    }

?>