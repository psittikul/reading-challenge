<?php 
    $result = $conn->query('SELECT users.id as userID, name, image_path, color, count(books.id) AS bookCount FROM users LEFT OUTER JOIN books ON users.id = books.user_id where books.status = "Read" GROUP BY users.id ORDER BY bookCount DESC, name ASC');
    // $standings = [];
    // $q1 = $conn->query('select users.*, count(books.id) as bookCount from users left outer join books partition(q1) on (books.user_id = users.id) group by users.id');
    // $q2 = $conn->query('select users.*, count(books.id) as bookCount from users left outer join books partition(q2) on (books.user_id = users.id) group by users.id');
    // $q3 = $conn->query('select users.*, count(books.id) as bookCount from users left outer join books partition(q3) on (books.user_id = users.id) group by users.id');
    // $q4 = $conn->query('select users.*, count(books.id) as bookCount from users left outer join books partition(q4) on (books.user_id = users.id) group by users.id');
   
    while($row = $result->fetch_assoc()) {
?>
        <div class='row user-row'>
            <h1 class='user-name' style='background: <?php echo $row['color'];?>'>
                <?php echo $row['name'] . ": "; 
                    echo "<p>📚 " . $row['bookCount'] . "</p>";
                ?>
            </h1>
            <div class='col-sm-3 user-pic'>
                <img src='<?php echo $row['image_path'];?>'>
            </div>
            <div class='col-sm stats'>
                <div class='row stat-row'>
                    <div class='col-sm-3 quarter'>
                        <?php
                            $q1 = $conn->query('select count(books.id) as booksRead from books partition(q1) where books.user_id = ' . $row['userID']);
                        ?>
                        <h3>Q1 📚: 
                            <?php 
                                echo $q1->fetch_column(0);
                            ?></h3>
                    </div>
                    <div class='col-sm-3 quarter'>
                        <?php $q2 = $conn->query('select count(books.id) as booksRead from books partition(q2) where books.user_id = ' . $row['userID']);?>
                        <h3>Q2 📚: 
                            <?php 
                                // echo $row['bookCount'];
                                echo $q2->fetch_column(0);
                            ?></h3>
                    </div>
                    <div class='col-sm-3 quarter'>
                        <?php $q3 = $conn->query('select count(books.id) as booksRead from books partition(q3) where books.user_id = ' . $row['userID']);?>
                        <h3>Q3 📚: 
                            <?php 
                                // echo $row['bookCount'];
                                echo $q3->fetch_column(0);
                            ?></h3>
                    </div>
                    <div class='col-sm-3 quarter'>
                        <?php $q4 = $conn->query('select count(books.id) as booksRead from books partition(q4) where books.user_id = ' . $row['userID']);?>
                        <h3>Q4 📚: 
                            <?php 
                                // echo $row['bookCount'];
                                echo $q4->fetch_column(0);
                            ?></h3>
                    </div>
                </div>
                <div class='row stat-row'>
                    <div class='col'>
                        <h4>Last Read: 
                            <?php 
                                $last = $conn->query('select title from users left outer join books on users.id = books.user_id where status = "Read" and user_id =' . $row['userID'] . ' order by date_read desc limit 1');
                                echo $last->fetch_column(0);
                            ?>
                        </h4>  
                    </div>
                    <div class='col'>
                        <h4>Currently Reading: 
                            <?php
                                $current = $conn->query('select title from users left outer join books on users.id = books.user_id where status = "Currently Reading" and user_id = ' . $row['userID']);
                                echo implode(',', array_column($current->fetch_assoc(), 'title'));
                            ?>
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <button type="button" class="show-add-book-btn btn btn-primary" data-user="<?php echo $row['userID'];?>"><i class="fa-solid fa-plus"></i> Add Book</button>
                    <?php include "form.php";?>
                </div>
            </div>
        </div>
<?php
    }
?>