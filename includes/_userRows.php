<?php 
    $query = "select name,
    freeReads,
    promptBooks,
    freeReads + 2*promptBooks as bookCount,
    image_path,
    color
    from
        (select
        if(z.freeReads is null, 0, z.freeReads) as freeReads,
        if(z.promptBooks is null, 0, z.promptBooks) as promptBooks,
        z.name as name,
        z.image_path as image_path,
        z.color as color
        from
        (select y.freeReads as freeReads, x.promptBooks as promptBooks, y.name as name, y.image_path as image_path, y.color as color
        from
        (
            select users.id as userID, count(books.id) AS promptBooks
            from users left outer join books on users.id = books.user_id
            where books.prompt_id > 0 AND books.status = 'Read' group by users.id
        ) as x
        right outer join (
        select users.name, users.id as userID, image_path, color, count(books.id) as freeReads
        from users left outer join books on users.id = books.user_id
        where books.prompt_id is null AND books.status = 'Read' group by users.id
        ) as y on x.userID = y.userID) as z) as az
    order by bookCount desc, name asc;";
    $result = $conn->query($query);
    while($row = $result->fetch_assoc()) {
        var_dump($row);
?>
        <div class='row user-row'>
            <h1 class='user-name' style='background: <?php echo $row['color'];?>'>
                <?php
                    echo $row['name'] . ": "; 
                    echo "<p data-toggle='tooltip' data-placement='top' title='Challenge books: " . $row['promptBooks'] . " Free reads: " .
                        $row['freeReads'] . "'>📚 " . $row['bookCount'] . "</p>";
                ?>
                <!-- <a href="/details.php" target="_blank"><i class="fa-solid fa-circle-info"></i></a> -->
            </h1>
            <div class='col-sm-3 user-pic'>
                <img src='<?php echo $row['image_path'];?>'>
            </div>
            <div class='col-sm stats'>
                <div class='row stat-row'>
                    <div class='col-sm-3 quarter'>
                        <?php
                            // $query = "select
                            //     freeReads,
                            //     promptBooks,
                            //     freeReads + 2*promptBooks as bookCount
                            //     from
                            //     (select
                            //     if(z.freeReads is null, 0, z.freeReads) as freeReads,
                            //     if(z.promptBooks is null, 0, z.promptBooks) as promptBooks
                            //     from
                            //     (select y.freeReads as freeReads, x.promptBooks as promptBooks
                            //     from
                            //     (
                            //         select user_id as userID, count(books.id) AS promptBooks
                            //         from books 
                            //         where books.prompt_id > 0 AND books.status = 'Read' and user_id = " . $row['userID'] .
                            //     ") as x
                            //     right outer join (
                            //     select user_id as userID, count(books.id) as freeReads
                            //     from books partition(q1)
                            //     where books.prompt_id is null AND books.status = 'Read' and user_id = " . $row['userID'] . 
                            //     ") as y on x.userID = y.userID) as z) as az;";
                            // $q1 = $conn->query($query);
                        ?>
                        <h3>Q1 📚: 
                            <?php 
                                // echo $q1->fetch_column(1) . " + " . $q1->fetch_column(0) . "= " . $q1->fetch_column(2);
                            ?></h3>
                    </div>
                    <div class='col-sm-3 quarter'>
                        <?php //$q2 = $conn->query('select count(books.id) as booksRead from books partition(q2) where books.user_id = ' . $row['userID'] . ' AND status = "Read"');?>
                        <h3>Q2 📚: 
                            <?php 
                                // echo $row['bookCount'];
                              //  echo $q2->fetch_column(0);
                            ?></h3>
                    </div>
                    <div class='col-sm-3 quarter'>
                        <?php // $q3 = $conn->query('select count(books.id) as booksRead from books partition(q3) where books.user_id = ' . $row['userID'] . ' AND status = "Read"');?>
                        <h3>Q3 📚: 
                            <?php 
                                // echo $row['bookCount'];
                                // echo $q3->fetch_column(0);
                            ?></h3>
                    </div>
                    <div class='col-sm-3 quarter'>
                        <?php // $q4 = $conn->query('select count(books.id) as booksRead from books partition(q4) where books.user_id = ' . $row['userID'] . ' AND status = "Read"');?>
                        <h3>Q4 📚: 
                            <?php 
                                // echo $row['bookCount'];
                               // echo $q4->fetch_column(0);
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