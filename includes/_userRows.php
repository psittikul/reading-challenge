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
                <?php echo $row['name'];?>
            </h1>
            <div class='col-sm-3 user-pic'>
                <img src='<?php echo $row['image_path'];?>'>
            </div>
            <div class='col-sm stats'>
                <div class='row'>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    📚: 
                                    <h2>
                                    <?php 
                                        echo $row['bookCount'];
                                    ?>
                                    </h2>
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                <div class='col-sm-3 quarter'>
                        <?php
                            $q1 = $conn->query('select count(books.id) as booksRead from books partition(q1) where books.user_id = ' . $row['userID']);
                        ?>
                        <p>Q1 📚: 
                            <?php 
                                echo $q1->fetch_column(0);
                            ?></p>
                    </div>
                    <div class='col-sm-3 quarter'>
                        <?php $q2 = $conn->query('select count(books.id) as booksRead from books partition(q2) where books.user_id = ' . $row['userID']);?>
                        <h2>Q2 📚: 
                            <?php 
                                // echo $row['bookCount'];
                                echo $q2->fetch_column(0);
                            ?></h2>
                    </div>
                    <div class='col-sm-3 quarter'>
                        <?php $q3 = $conn->query('select count(books.id) as booksRead from books partition(q3) where books.user_id = ' . $row['userID']);?>
                        <h2>Q3 📚: 
                            <?php 
                                // echo $row['bookCount'];
                                echo $q3->fetch_column(0);
                            ?></h2>
                    </div>
                    <div class='col-sm-3 quarter'>
                        <?php $q4 = $conn->query('select count(books.id) as booksRead from books partition(q4) where books.user_id = ' . $row['userID']);?>
                        <h2>Q4 📚: 
                            <?php 
                                // echo $row['bookCount'];
                                echo $q4->fetch_column(0);
                            ?></h2>
                    </div>
                                </div>
                            </div>
                        </div>
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