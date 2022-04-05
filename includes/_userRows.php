<?php 
    $result = $conn->query('SELECT name, image_path, count(books.id) AS bookCount FROM users LEFT OUTER JOIN books ON users.id = books.user_id GROUP BY users.id ORDER BY bookCount DESC');
    while($row = $result->fetch_assoc()) {
?>
        <div class='row user-row'>
            <h2 class='user-name' style='background: <?php echo $row['color'];?>'>
                <?php echo $row['name'];?>
            </h2>
            <div class='col-sm-4 user-pic'>
                <img src='<?php echo $row['image_path'];?>'>
            </div>
            <div class='col-sm stats'>
                <h1>📚 <?php echo $row['bookCount'];?></h1>
                <?php var_dump($row);?>
            </div>
        </div>
<?php
    }
?>