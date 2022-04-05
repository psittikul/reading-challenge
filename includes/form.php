<form data-user='<?php echo $row['userID'];?>' method='post'>
    <div class="mb-3">
        <p>Add Book</p>
        <input type="text" class="form-control" data-column="title" placeholder="Title">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" data-column="author" placeholder="Author">
    </div>
    <div class="mb-3 row">
        <div class='col-sm-5'>
            <label>Status</label>
            <select class="form-select" data-column="status">
                <option selected value="Read">Read</option>
                <option value="Currently Reading">Currently Reading</option>
                <option value="To Be Read">To Be Read</option>
            </select>
        </div>
        <div class='col-sm-5'>
            <label>Date Read</label>
            <input type="date" class="form-control" data-column='date_read'>
        </div>
    </div>
    <button type="button" class="update-btn btn btn-primary" id="addBook<?php echo $row['userID'];?>">Save</button>
</form>