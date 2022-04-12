<form data-user='<?php // echo $row['userID'];?>' method='post'>
    <div class="mb-3">
        <?php $allBooks = $User->getUserBooks($users);?>
        <label class='form-label'>Title</label>
        <input class="form-control" data-user='<?php // echo $row['userID'];?>' list="" id="titleDatalist" placeholder="Search your titles or add a new one">
        <datalist id="titleOptions4">
            <?php
            foreach($allBooks[4] as $book) {
            ?>
            <option data-id='<?php echo $book['id'];?>' value="<?php echo $book['title'];?>"></option>
            <?php
            }
            ?>
        </datalist>
        <datalist id="titleOptions14">
            <?php
            foreach($allBooks[14] as $book) {
            ?>
            <option data-id='<?php echo $book['id'];?>' value="<?php echo $book['title'];?>"></option>
            <?php
            }
            ?>
        </datalist>
        <datalist id="titleOptions24">
            <?php
            foreach($allBooks[24] as $book) {
            ?>
            <option data-id='<?php echo $book['id'];?>' value="<?php echo $book['title'];?>"></option>
            <?php
            }
            ?>
        </datalist>
        <datalist id="titleOptions34">
            <?php
            foreach($allBooks[34] as $book) {
            ?>
            <option data-id='<?php echo $book['id'];?>' value="<?php echo $book['title'];?>"></option>
            <?php
            }
            ?>
        </datalist>
        <!-- <label>Title</label>
        <input type="text" class="form-control" data-column="title" data-user='<?php // echo $row['userID'];?>' placeholder="Title"> -->
    </div>
    <div class="mb-3">
        <label>Author</label>
        <input type="text" class="form-control" data-column="author" data-user='<?php // echo $row['userID'];?>' placeholder="Author">
    </div>
    <div class="mb-3 row">
        <div class='col-sm-6'>
            <label>Status</label>
            <select class="form-select" data-column="status" data-user='<?php // echo $row['userID'];?>'>
                <option selected value="Read">Read</option>
                <option value="Currently Reading">Currently Reading</option>
                <option value="To Be Read">To Be Read</option>
            </select>
        </div>
        <div class='col-sm-6'>
            <label>Date Read</label>
            <input type="date" class="form-control" data-column='date_read' data-user='<?php //echo $row['userID'];?>' value='<?php echo date("Y-m-d");?>'>
        </div>
        <!-- <div class='col-sm-4'> -->
            <!-- <label>Prompt</label>
            <select class="form-select" data-column="prompt_id" data-user='<?php //echo $row['userID'];?>'>
                <option value=null>Free Space</option>
                <?php 
                    // $prompts = $conn->query('select * from prompts');
                    // while($prompt = $prompts->fetch_assoc()) {
                ?>
                    <option value="<?php // echo $prompt['id'];?>"><?php // echo $prompt['prompt'];?></option>
                <?php
                    // }
                ?>
            </select> -->
            <!-- <label class="form-label">Prompt</label> -->
            <!-- <input class="form-control" data-user='<?php // echo $row['userID'];?>' list="datalistOptions<?php // echo $row['userID'];?>" id="promptDatalist<?php // echo $row['$userID'];?>" placeholder="Type to search prompts"> -->
            <!-- <datalist id="datalistOptions<?php // echo $row['userID'];?>">
                <option value=''>Select prompt</option> -->
            <?php
                // foreach($prompts as $prompt) {
                //     echo $prompt['id'] . ": " . $prompt['prompt'] . "\n";
            ?>
                <!-- <option data-id='<?php // echo $prompt['id'];?>' value='<?php // echo $prompt['prompt'];?>'></option> -->
            <?php
                // }
            ?>
            <!-- </datalist> -->
        <!-- </div> -->
    </div>
    <div class='mb-3 row'>
        <div class='col'>
            <label class='form-label'>Prompt</label>
            <input class="form-control" data-user='<?php // echo $row['userID'];?>' list="datalistOptions<?php // echo $row['userID'];?>" id="promptDatalist<?php // echo $row['$userID'];?>" placeholder="Type to search prompts">
            <datalist id="datalistOptions<?php // echo $row['userID'];?>">
                <option value=''>Select prompt</option>
                <?php
                foreach($prompts as $prompt) {
                    // echo $prompt['id'] . ": " . $prompt['prompt'] . "\n";
            ?>
                <option data-id='<?php echo $prompt['id'];?>' value='<?php echo $prompt['prompt'];?>'></option>
            <?php
                }
            ?>
            </datalist>
            <button type='button' id='clearPromptBtn'>CLEAR</button>
        </div>
    </div>
    <button type="button" class="update-btn btn btn-primary" data-user="" id="saveBookChangesBtn">Save</button>
</form>