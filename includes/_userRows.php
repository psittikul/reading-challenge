<?php 
    $result = $conn->query('SELECT * FROM users');
    while($row = $result->fetch_assoc()) {
?>
        <div class='row user-row'>
            <div class='col-sm-2 user-pic'>
                <img src='<?php echo $row['image_path'];?>'>
            </div>
            <div class='col-sm stats'>
                <h4><i class="fa-solid fa-books"></i>Books Read: </h4>
            </div>
        </div>
<?php
    }
?>