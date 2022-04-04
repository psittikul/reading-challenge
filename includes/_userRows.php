<?php 
    $result = $conn->query('SELECT * FROM users');
    while($row = $result->fetch_assoc()) {
?>
        <div class='row user-row'>
            <?php var_dump($row); echo "\n";?>
            <div class='col-sm-2 user-pic'>
                <img src='<?php echo $row->image_path;?>'>
            </div>
            <div class='col-sm stats'>
                <h4>Books Read: </h4>
            </div>
        </div>
<?php
    }
?>