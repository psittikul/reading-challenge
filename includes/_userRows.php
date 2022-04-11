<?php 
    // include "calculateResults.php";
    echo "Show users now please";
    var_dump($conn);
    $result = $conn->query("SELECT * FROM users");
    // $result = $conn->query('SELECT users.id as userID, name, image_path, color FROM users LEFT OUTER JOIN books ON users.id = books.user_id where books.status = "Read" GROUP BY users.id ORDER BY bookCount DESC, name ASC');
    // $bookPromp
    // $standings = [];
    // $q1 = $conn->query('select users.*, count(books.id) as bookCount from users left outer join books partition(q1) on (books.user_id = users.id) group by users.id');
    // $q2 = $conn->query('select users.*, count(books.id) as bookCount from users left outer join books partition(q2) on (books.user_id = users.id) group by users.id');
    // $q3 = $conn->query('select users.*, count(books.id) as bookCount from users left outer join books partition(q3) on (books.user_id = users.id) group by users.id');
    // $q4 = $conn->query('select users.*, count(books.id) as bookCount from users left outer join books partition(q4) on (books.user_id = users.id) group by users.id');
    var_dump($result);
    while($row = $result->fetch_assoc()) {
?>
        <div class='row user-row'>
            <h1 class='user-name' style='background: <?php echo $row['color'];?>'>
                <?php echo $row['name'] . ": "; 
                    echo "<p>📚 " . $row['bookCount'] . "</p>";
                ?>
                <a href="/details.php" target="_blank"><i class="fa-solid fa-circle-info"></i></a>
            </h1>
            <div class='col-sm-3 user-pic'>
                <img src='<?php echo $row['image_path'];?>'>
            </div>
            <div class='col-sm stats'>
                <div class='row stat-row'>
                    <div class='col-sm-3 quarter'>
                        <?php
                            $q1 = $conn->query('select count(books.id) as booksRead from books partition(q1) where books.user_id = ' . $row['userID'] . ' AND status = "Read"');
                        ?>
                        <h3>Q1 📚: 
                            <?php 
                                echo $q1->fetch_column(0);
                            ?></h3>
                    </div>
                    <div class='col-sm-3 quarter'>
                        <?php $q2 = $conn->query('select count(books.id) as booksRead from books partition(q2) where books.user_id = ' . $row['userID'] . ' AND status = "Read"');?>
                        <h3>Q2 📚: 
                            <?php 
                                // echo $row['bookCount'];
                                echo $q2->fetch_column(0);
                            ?></h3>
                    </div>
                    <div class='col-sm-3 quarter'>
                        <?php $q3 = $conn->query('select count(books.id) as booksRead from books partition(q3) where books.user_id = ' . $row['userID'] . ' AND status = "Read"');?>
                        <h3>Q3 📚: 
                            <?php 
                                // echo $row['bookCount'];
                                echo $q3->fetch_column(0);
                            ?></h3>
                    </div>
                    <div class='col-sm-3 quarter'>
                        <?php $q4 = $conn->query('select count(books.id) as booksRead from books partition(q4) where books.user_id = ' . $row['userID'] . ' AND status = "Read"');?>
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
                                $curr = $conn->query('select title from users left outer join books on users.id = books.user_id where status = "Currently Reading" and user_id = ' . $row['userID']);
                                if(mysqli_num_rows($curr) > 1) {
                                    // var_dump($curr->fetch_all(MYSQLI_ASSOC));
                                    $current = array_column($curr->fetch_all(MYSQLI_ASSOC), 'title');
                                    echo implode(', ', $current);
                                    
                                    // echo $current['title'];
                                }
                                else if(mysqli_num_rows($curr) == 1) {
                                    $current = $curr->fetch_column(0);
                                    echo $current;
                                }
                                else {
                                    echo '';
                                }
                                // if(count($current) > 1) {
                                //     echo implode(', ', array_column($current, 'title'));
                                // }
                                // else if(count($current) == 1) {
                                //     echo $current['title'];
                                // }
                                // else {
                                //     echo '';
                                // }
                                // echo count($current->fetch_assoc()) > 1 ? implode(',', array_column($current->fetch_assoc(), 'title')) : $current->fetch_assoc()['title'];
                            ?>
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <button type="button" class="show-add-book-btn btn btn-primary" data-user="<?php echo $row['userID'];?>"><i class="fa-solid fa-plus"></i> Add Book</button>
                    <?php // include "form.php";?>
                </div>
            </div>
        </div>
<?php
    }
?>