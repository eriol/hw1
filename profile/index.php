<?php
    require_once("../auth.php");

    if(!check_session()) {
        header("Location: /");
        exit;
    }

    $title = "ἀθλητική (athletikḗ) - Profilo";
    require_once("../header.php");
?>
<section id="core">

  <div id="profile_container">
    <div class="title">Profilo</div>

  </div>

</section>

<?php require_once("../footer.php") ?>
