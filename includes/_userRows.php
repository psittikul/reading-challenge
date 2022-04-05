<?php 
    $result = $conn->query('SELECT name, image_path, count(books.id) AS bookCount FROM users LEFT OUTER JOIN books ON users.id = books.user_id GROUP BY users.id ORDER BY bookCount DESC');
    while($row = $result->fetch_assoc()) {
?>
        <div class='row user-row'>
            <h2 class='user-name' style='background: <?php echo $row['color'];?>'>
                <?php echo $row['name']; echo $row['color'];?>
            </h2>
            <div class='col-sm-2 user-pic'>
                <img src='<?php echo $row['image_path'];?>'>
            </div>
            <div class='col-sm stats'>
                <h4>📚 <?php echo $row['bookCount'];?></h4>
            </div>
        </div>
<?php
    }
?>