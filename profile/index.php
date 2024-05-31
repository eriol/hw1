<?php
    require_once("../auth.php");

    if(!check_session()) {
        header("Location: /");
        exit;
    }

    $title = "ἀθλητική (athletikḗ) - Profilo";
    $extra_js = [
        ["file" => "profile.js", "type" => ""]
    ];
    require_once("../header.php");
?>
<section id="core">

  <div id="profile_container">
    <div class="title">Profilo</div>
    <div class="data">
      <div id="name" class="row">
        <div class="label cell">Nome:</div>
        <div class="content cell"></div>
      </div>
      <div id="birthday" class="row">
        <div class="label cell">Compleanno:</div>
        <div class="content cell"></div>
      </div>
      <div id="bio" class="row">
        <div class="label cell">Bio:</div>
        <div class="content cell"></div>
      </div>
    </div>
  </div>

</section>

<?php require_once("../footer.php") ?>
