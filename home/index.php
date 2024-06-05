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

  <div id="home_container">

    <div class="activity">
      <div class="header">
       <div>who</div>
       <div>when</div>
      </div>
      <div class='title'>Corsa</div>
      <div class='description'>bla bla</div>
      <div class='footer'>
        <div class="performance">performance</div>
        <div class="deity">eris</div>
      </div>

    </div>

  </div>

</section>

<?php require_once("../footer.php") ?>
