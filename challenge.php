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
            <td>
                <?php echo $prompt['prompt'];?>
            </td>
            <?php
                foreach($users as $user) {
            ?>
            <td style="background: <?php echo $userBooksForPrompts[$user['id']][$prompt['id']]['fill'];?>">
            <?php 
                echo $userBooksForPrompts[$user['id']][$prompt['id']]['title'];?>
                <button type='button' data-user='<?php echo $user['id'];?>' data-toggle="modal" class='btn' data-target="#editBookModal" class='edit-book-btn'><i class="fa-solid fa-pen" data-toggle='tooltip' title='Edit entry'></i></button>
            </td>
            <?
                }
            ?>
        </tr>
            <?
        }
      ?>
  </tbody>
</table>
<?php
    include "includes/modals/editBookModal.php";
?>