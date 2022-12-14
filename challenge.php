<?php
    include 'models/User.php';
    include 'models/Prompt.php';
    include 'includes/header.php';
    include 'includes/_challengeRows.php';
    include 'includes/footer.php';

    $User = new User();
    $Prompt = new Prompt();
    $users = $User->getAll();
    $userBooksForPrompts = $User->getUserBooksForPrompts();
    // $jsonBooks = $User->getUserBooksForPromptsJSON();
    $freeReads = $User->getFreeReads();
    $prompts = $Prompt->getAll();
    // $jsonPrompts = $Prompt->getAllForJSON();
?>
<script>
    // var promptArray = '<?php echo $jsonPrompts;?>';
    // var bookArray = JSON.stringify('<?php echo ($jsonBooks);?>');
    // console.log(promptArray);
    // console.log(bookArray);
</script>
<table class="table table-bordered" id="challengeTable">
  <thead>
    <tr>
        <th>Prompt</th>
        <?php foreach ($users as $user) {
            ?>
        <th>
        <?php
            echo $user['name'];
        ?>
            <button type='button' class='add-book-btn btn' data-user='<?php echo $user['id'];?>' data-toggle='modal' data-target='#editBookModal'><i class="fa-solid fa-plus" data-toggle='tooltip' title='Add new book'></i></button>
        </th>
            <?php
        }
        ?>
    </tr>
  </thead>
  <tbody>
      <?php
        foreach($prompts as $prompt) {
            ?>
        <tr>
            <td class='prompt-cell'>
                <?php echo $prompt['prompt'];?>
            </td>
            <?php
                foreach($users as $user) {
                    // $user_id = $user['id'];
                    
                    // $prompt_id = $prompt['id'];
                    // $prompt_text = addslashes($prompt['prompt']);

                    // if ($userBooksForPrompts[$user['id']][$prompt['id']]['id'] > 0) {
                    //     $book_id = $userBooksForPrompts[$user['id']][$prompt['id']]['id'];
                    //     $title = addslashes($userBooksForPrompts[$user['id']][$prompt['id']]['title']);
                    //     $author = addslashes($userBooksForPrompts[$user['id']][$prompt['id']]['author']);
                    //     $status = $userBooksForPrompts[$user['id']][$prompt['id']]['status'];
                    //     $date_read = $userBooksForPrompts[$user['id']][$prompt['id']]['date_read'];
                    // }
                    // else {
                    //     $book = null;
                    // }
            ?>
            <script>
            <?php
                // echo "var user_id ='$user_id';";
                // echo "var book_id ='$book_id';";
                // echo "var title = '$title';";
                // echo "var prompt_id ='$prompt_id';";
                // echo "var prompt_text ='$prompt_text';";
            ?>
                // var selector = ".edit-book-btn[data-user='" + user_id + "'][data-prompt='" + prompt_id + "']";
                // console.log(selector);
                // $(".edit-book-btn[data-user='" + user_id + "'][data-prompt='" + prompt_id + "']").on('click', function() {
                //     console.log('Set up modal for user: ' + user_id + ' prompt: ' + prompt_id + ' book: ' + title);
                //     $("#editBookModal").find(".modal-title").text(prompt_text);
                //     $("#editBookModal").find("[data-column='title']").val(title);
                //     $("#editBookModal").modal('show');
                // });
            </script>
            <td data-author='<?php echo $userBooksForPrompts[$user['id']][$prompt['id']]['author'];?>' data-status='<?php echo $userBooksForPrompts[$user['id']][$prompt['id']]['status'];?>'
                data-date='<?php echo $userBooksForPrompts[$user['id']][$prompt['id']]['date_read'];?>' class='<?php echo $Prompt->format('status', $userBooksForPrompts[$user['id']][$prompt['id']]['status']);?>'>
            <?php 
                echo trim($userBooksForPrompts[$user['id']][$prompt['id']]['title']);?>
                <button type='button' data-toggle='modal' data-target="#editBookModal"
                    data-book='<?php echo $userBooksForPrompts[$user['id']][$prompt['id']]['id'];?>' data-prompt='<?php echo $prompt['id'];?>' data-user='<?php echo $user['id'];?>' class='edit-book-btn btn'><i class="fa-solid fa-pen" data-toggle='tooltip' title='Edit entry'></i></button>
            </td>
            <?
                }
            ?>
        </tr>
            <?
        }
        for ($i = 0; $i < $freeReads['numRows']; $i++) {
            ?>
        <tr class='free-row'>
            <td>FREE SPACE</td>
            <td data-author='<?php echo $freeReads[$users[0]['id']][$i]['author']?>' data-status='<?php echo $freeReads[$users[0]['id']][$i]['status'];?>'
                data-date='<?php echo $freeReads[$users[0]['id']][$i]['date_read'];?>' class='<?php echo $Prompt->format('status', $freeReads[$users[0]['id']][$i]['status']);?>'>
            <?php 
                echo trim($freeReads[$users[0]['id']][$i]['title']);?>
                <button type='button' data-toggle='modal' data-target="#editBookModal"
                    data-book='<?php echo $freeReads[$users[0]['id']][$i]['id'];?>' data-user='<?php echo $users[0]['id'];?>' class='edit-book-btn btn'><i class="fa-solid fa-pen" data-toggle='tooltip' title='Edit entry'></i></button>
            </td>
            <td data-author='<?php echo $freeReads[$users[1]['id']][$i]['author']?>' data-status='<?php echo $freeReads[$users[1]['id']][$i]['status'];?>'
                data-date='<?php echo $freeReads[$users[1]['id']][$i]['date_read'];?>' class='<?php echo $Prompt->format('status', $freeReads[$users[1]['id']][$i]['status']);?>'>
            <?php 
                echo trim($freeReads[$users[1]['id']][$i]['title']);?>
                <button type='button' data-toggle='modal' data-target="#editBookModal"
                    data-book='<?php echo $freeReads[$users[1]['id']][$i]['id'];?>' data-user='<?php echo $users[1]['id'];?>' class='edit-book-btn btn'><i class="fa-solid fa-pen" data-toggle='tooltip' title='Edit entry'></i></button>
            </td>
            <td data-author='<?php echo $freeReads[$users[2]['id']][$i]['author']?>' data-status='<?php echo $freeReads[$users[2]['id']][$i]['status'];?>'
                data-date='<?php echo $freeReads[$users[2]['id']][$i]['date_read'];?>' class='<?php echo $Prompt->format('status', $freeReads[$users[2]['id']][$i]['status']);?>'>
            <?php 
                echo trim($freeReads[$users[2]['id']][$i]['title']);?>
                <button type='button' data-toggle='modal' data-target="#editBookModal"
                    data-book='<?php echo $freeReads[$users[2]['id']][$i]['id'];?>' data-user='<?php echo $users[2]['id'];?>' class='edit-book-btn btn'><i class="fa-solid fa-pen" data-toggle='tooltip' title='Edit entry'></i></button>
            </td>
            <td data-author='<?php echo $freeReads[$users[3]['id']][$i]['author']?>' data-status='<?php echo $freeReads[$users[3]['id']][$i]['status'];?>'
                data-date='<?php echo $freeReads[$users[3]['id']][$i]['date_read'];?>' class='<?php echo $Prompt->format('status', $freeReads[$users[3]['id']][$i]['status']);?>'>
            <?php 
                echo trim($freeReads[$users[3]['id']][$i]['title']);?>
                <button type='button' data-toggle='modal' data-target="#editBookModal"
                    data-book='<?php echo $freeReads[$users[3]['id']][$i]['id'];?>' data-user='<?php echo $users[3]['id'];?>' class='edit-book-btn btn'><i class="fa-solid fa-pen" data-toggle='tooltip' title='Edit entry'></i></button>
            </td>
        </tr>
            <?php
        }
            ?>
        <tr style='display:none'>
            <!-- <td>FREE READ</td> -->
            <?php 
            // foreach($users as $user) {
            //     if($read['user_id'] == $user['id']) {
                    ?>
            <td class='<?php //echo $Prompt->format('status', $read['status']);?>' data-author='<?php // echo $read['author'];?>'
                data-date='<?php // echo $read['date_read'];?>' data-title='<?php // echo $read['title'];?>' data-status='<?php //echo $read['status'];?>'>
                <?php //echo $read['title'];?>
                <button type='button' data-book='<?php //echo $read['id'];?>' data-status='<?php //echo $read['status'];?>' data-user='<?php echo $user['id'];?>' data-toggle="modal" class='btn' data-target="#editBookModal" class='edit-book-btn'><i class="fa-solid fa-pen" data-toggle='tooltip' title='Edit entry'></i></button>       
            </td>
                    <?php
                // }
                // else {
                    ?>
                    <td></td>
                    <?php
            //     }
            // }
            ?>
        </tr>
            <?php
        // }
      ?>
  </tbody>
</table>
<div id="dialogConfirm" title="">
  <p id="confirmText"><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span></p>
</div>
<?php
    include "includes/modals/editBookModal.php";
?>