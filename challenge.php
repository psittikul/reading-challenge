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
    $freeReads = $User->getFreeReads();
    $prompts = $Prompt->getAll();
?>
<table class="table table-bordered" id="challengeTable">
  <thead>
    <tr>
        <th>Prompt</th>
        <?php foreach ($users as $user) {
            ?>
        <th><?php echo $user['name'];?></th>
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
                    $user_id = $user['id'];
                    
                    $prompt_array = [
                        'id' => $prompt['id'],
                        'prompt' => $prompt['prompt'],
                    ];

                    if ($userBooksForPrompts[$user['id']][$prompt['id']]['id'] > 0) {
                        $book = json_encode([
                            'id' => $userBooksForPrompts[$user['id']][$prompt['id']]['id'],
                            'title' => $userBooksForPrompts[$user['id']][$prompt['id']]['title'],
                            'author' => $userBooksForPrompts[$user['id']][$prompt['id']]['author'],
                            'status' => $userBooksForPrompts[$user['id']][$prompt['id']]['status'],
                            'date_read' => $userBooksForPrompts[$user['id']][$prompt['id']]['date_read'],
                        ]);
                    }
                    else {
                        $book = null;
                    }
            ?>
            <script>
            <?php
                echo "var user_id ='$user_id';";
                echo "var book ='$book';";
                echo "var prompt ='$prompt_array';";
            ?>
                console.log('user_id set to: ' + user_id);
                console.log('book is: ' + book);
                console.log(prompt);
                console.log('prompt id: ' + prompt['id'] + ' prompt: ' + prompt['prompt']);
                var selector = ".edit-book-btn[data-user='" + user_id + "'][data-prompt='" + prompt['id'] + "']";
                console.log(selector);
                $(selector).on('click', function() {
                    console.log(user_id);
                    console.log(book);
                    console.log(prompt);

                    $("#editBookModal").find(".modal-title").text(prompt['prompt']);
                    $("#editBookModal").modal('show');
                });
            </script>
            <td data-author='<?php echo $userBooksForPrompts[$user['id']][$prompt['id']]['author'];?>' data-status='<?php echo $userBooksForPrompts[$user['id']][$prompt['id']]['status'];?>'
                class='<?php echo $Prompt->format('status', $userBooksForPrompts[$user['id']][$prompt['id']]['status']);?>'>
            <?php 
                echo $userBooksForPrompts[$user['id']][$prompt['id']]['title'];?>
                <button type='button' data-prompt='<?php echo $prompt['id'];?>' data-user='<?php echo $user['id'];?>' class='edit-book-btn btn'><i class="fa-solid fa-pen" data-toggle='tooltip' title='Edit entry'></i></button>
            </td>
            <?
                }
            ?>
        </tr>
            <?
        }
        foreach($freeReads as $read) {
            ?>
        <tr>
            <td>FREE READ</td>
            <?php 
            foreach($users as $user) {
                if($read['user_id'] == $user['id']) {
                    ?>
            <td class='<?php echo $Prompt->format('status', $read['status']);?>' data-author='<?php echo $read['author'];?>'><?php echo $read['title'];?>
                <button type='button' data-book='<?php echo $read['id'];?>' data-status='<?php echo $read['status'];?>' data-user='<?php echo $user['id'];?>' data-toggle="modal" class='btn' data-target="#editBookModal" class='edit-book-btn'><i class="fa-solid fa-pen" data-toggle='tooltip' title='Edit entry'></i></button>       
            </td>
                    <?php
                }
                else {
                    ?>
                    <td></td>
                    <?php
                }
            }
            ?>
        </tr>
            <?php
        }
      ?>
  </tbody>
</table>
<?php
    include "includes/modals/editBookModal.php";
?>