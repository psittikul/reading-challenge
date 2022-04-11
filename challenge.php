<?php
    include 'models/User.php';
    include 'models/Prompt.php';
    include 'includes/header.php';
    include 'includes/_challengeRows.php';
    include 'includes/footer.php';

    $Prompt = new Prompt();
    $prompts = $Prompt->getAll();
    var_dump($prompts);
?>