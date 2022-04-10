<?php
    include 'includes/header.php';
    include 'models/User.php';
    include 'models/Prompt.php';
    include 'models/PromptController.php';
    $Prompt = new Prompt();
    $PromptController = new PromptController($Prompt);
    // $User = new User();
    // Page to list all books, like the original spreadsheet
    $PromptController->list();
?>
<table class="table table-bordered" id="detailsTable">
  <thead>
    <tr>
        <?php
            var_dump($users);
            // while ($user = $users) {
                ?>
                    <th><?php // echo $user['name'];?></th>
                <?
            // }
        ?>
    </tr>
  </thead>
  <tbody>
    <?php
    // while($prompt = $prompts) {
    ?>
    <tr class='prompt-row' data-id="<?php // echo $prompt['id'];?>">
        <td>
            <?php // echo $prompt['prompt'];?>
        </td>
        <?php
            // while ($user = $users) {
            //     $User->find($user['id']);

            // }
        ?>
        <!-- <td>
            <?php
                // $User->find(14);
                // echo $User->getBookForPrompt($prompt['id'])['title'];
            ?>
        </td> -->
    </tr>
    <?php
    // }
    ?>
  </tbody>
</table>

<?php
    include 'includes/footer.php';
?>
