<form data-user='<?php echo $row['userID'];?>' method='post'>
    <div class="mb-3">
        <p>Add Book</p>
        <input type="text" class="form-control" data-column="title" data-user='<?php echo $row['userID'];?>' placeholder="Title">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" data-column="author" data-user='<?php echo $row['userID'];?>' placeholder="Author">
    </div>
    <div class="mb-3 row">
        <div class='col-sm-6'>
            <label>Status</label>
            <select class="form-select" data-column="status" data-user='<?php echo $row['userID'];?>'>
                <option selected value="Read">Read</option>
                <option value="Currently Reading">Currently Reading</option>
                <option value="To Be Read">To Be Read</option>
            </select>
        </div>
        <div class='col-sm-6'>
            <label>Date Read</label>
            <input type="date" class="form-control" data-column='date_read' data-user='<?php echo $row['userID'];?>' value='<?php echo date("Y-m-d");?>'>
        </div>
    </div>
    <button type="submit" class="update-btn btn btn-primary" data-user="<?php echo $row['userID'];?>" id="addBook<?php echo $row['userID'];?>">Save</button>
</form>