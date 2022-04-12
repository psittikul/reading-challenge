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
            ?>
            <td class='<?php echo $Prompt->format('status', $userBooksForPrompts[$user['id']][$prompt['id']]['status']);?>' style="background: <?php echo $userBooksForPrompts[$user['id']][$prompt['id']]['fill'];?>">
            <?php 
                echo $userBooksForPrompts[$user['id']][$prompt['id']]['title'];?>
                <button type='button' data-book='<?php echo $userBooksForPrompts[$user['id']][$prompt['id']]['bookID'];?>' data-title='<?php echo $userBooksForPrompts[$user['id']][$prompt['id']]['title'];?>' data-prompt='<?php echo $prompt['id'];?>' data-user='<?php echo $user['id'];?>' data-toggle="modal" class='btn' data-target="#editBookModal" class='edit-book-btn'><i class="fa-solid fa-pen" data-toggle='tooltip' title='Edit entry'></i></button>
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
            <td class='<?php echo $Prompt->format('status', $read['status']);?>'><?php echo $read['title'];?>
                <button type='button' data-book='<?php echo $read['id'];?>' data-user='<?php echo $user['id'];?>' data-toggle="modal" class='btn' data-target="#editBookModal" class='edit-book-btn'><i class="fa-solid fa-pen" data-toggle='tooltip' title='Edit entry'></i></button>       
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