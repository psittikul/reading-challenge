<?php 
    $result = $conn->query('SELECT name, image_path, color, count(books.id) AS bookCount FROM users LEFT OUTER JOIN books ON users.id = books.user_id GROUP BY users.id ORDER BY bookCount DESC');
    while($row = $result->fetch_assoc()) {
?>
        <div class='row user-row'>
            <h1 class='user-name' style='background: <?php echo $row['color'];?>'>
                <?php echo $row['name'];?>
            </h1>
            <div class='col-sm-3 user-pic'>
                <img src='<?php echo $row['image_path'];?>'>
            </div>
            <div class='col-sm stats'>
                <canvas class="stat-chart" width="400" height="400"></canvas>
                <h1>📚 <?php echo $row['bookCount'];?></h1>
                <h2>Last Read: </h2>
            </div>
        </div>
<?php
    }
?>