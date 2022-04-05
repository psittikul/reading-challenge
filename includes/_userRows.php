<?php 
    $result = $conn->query('SELECT users.id as userID, name, image_path, color, count(books.id) AS bookCount FROM users LEFT OUTER JOIN books ON users.id = books.user_id GROUP BY users.id ORDER BY bookCount DESC');
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
                <h1>📚 <?php echo $row['bookCount'];?></h1>
                <h2>Last Read: </h2>
                <form data-user='<?php echo $row['userID'];?>' method='post'>
                    <div class="mb-3">
                        <label class="form-label">Add Book</label>
                        <input type="text" class="form-control" data-column="title" placeholder="Title">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" data-column="author" placeholder="Author">
                    </div>
                    <button type="button" class="update-btn" id="addBook<?php echo $row['userID'];?>">Save</button>
                </form>
            </div>
        </div>
<?php
    }
?>