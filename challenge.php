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
    var_dump($userBooksForPrompts);
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
                foreach($users as $key => $value) {
            ?>
                <td>
                <?php echo $userBooksForPrompts[$key][$prompt['id']];?>
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