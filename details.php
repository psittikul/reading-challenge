<?php
    include 'includes/connection.php';
    include 'includes/header.php';
    include 'models/User.php';
    // Page to list all books, like the original spreadsheet
?>
<table class="table table-bordered" id="detailsTable">
  <thead>
    <tr>
      <th scope="col">Prompt</th>
      <th scope="col">Pam</th>
      <th scope="col">Pat</th>
      <th scope="col">Peric</th>
      <th scope="col">Patrick</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $prompts = $conn->query('select * from prompts');
    while($prompt = $prompts->fetch_assoc()) {
    ?>
    <tr class='prompt-row' data-id="<?php echo $prompt['id'];?>">
        <td>
            <?php echo $prompt['prompt'];?>
        </td>
        <td>
            <?php
                $User = new User();
                var_dump($User);
                var_dump($User->find(14));
                return;
            ?>
        </td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>

<?php
    include 'includes/footer.php';
?>
