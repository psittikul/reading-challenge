<?php 
    // $result = $conn->query('SELECT users.id as userID, name, image_path, color, count(books.id) AS bookCount FROM users LEFT OUTER JOIN books ON users.id = books.user_id where books.status = "Read" GROUP BY users.id ORDER BY bookCount DESC');
    $standings = [];
    $q1 = $conn->query('select * from users inner join books partition(q1) on (books.user_id = users.id)');
    $q2 = $conn->query('select * from users inner join books partition(q2) on (books.user_id = users.id)');
    $q3 = $conn->query('select * from users inner join books partition(q3) on (books.user_id = users.id)');
    $q4 = $conn->query('select * from users inner join books partition(q4) on (books.user_id = users.id)');

    $standings[] = $q1->fetch_all();
    $standings[] = $q2->fetch_all();
    $standings[] = $q3->fetch_all();
    $standings[] = $q4->fetch_all();
    var_dump($standings);
    return;
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
                <div class='row'>
                    <div class='col'>
                        <h1>📚 <?php echo $row['bookCount'];?></h1>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <h4>Last Read: </h4>  
                    </div>
                    <div class='col'>
                        <h4>Currently Reading: </h4>
                    </div>
                </div>
                <?php include "form.php";?>
            </div>
        </div>
<?php
    }
?>