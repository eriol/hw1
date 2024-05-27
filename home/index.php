<?php

    require_once("../auth.php");

    if(!check_session()) {
        header("Location: /login/");
        exit;
    }

    $title = "ἀθλητική (athletikḗ) - Home";
    require_once("../header.php");
?>

<section id="core">
</section>

<?php require_once("../footer.php") ?>
