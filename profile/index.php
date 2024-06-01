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
    <div class="title">Profilo <span id="edit-profile"><img class="edit" src="/images/pen-to-square-solid.svg"></span></div>
    <div class="data">
      <div id="name" class="row">
        <div class="label cell">Nome:</div>
        <div class="content cell"></div>
      </div>
      <div id="age" class="row">
        <div class="label cell">Età:</div>
        <div class="content cell"></div>
      </div>
      <div id="bio" class="row">
        <div class="label cell">Bio:</div>
        <div class="content cell"></div>
      </div>
    </div>
    <div id="form-profile" class="hidden">
      <form action="" method="post">
        <div class="name row">
          <label class="cell" for="name">Nome: </label>
          <input class="cell" type="text" name="name" />
          <p class="error text-small"></p>
        </div>
        <div class="age row">
          <label class="cell" for="age">Età: </label>
          <input class="cell" type="text" name="age" />
          <p class="error text-small"></p>
        </div>
        <div class="bio row">
          <label class="cell" for="bio">Bio: </label>
          <input class="cell" type="input" name="bio" />
          <p class="error text-small"></p>
        </div>
        <input type="submit" name="submit_button" value="Salva">
      </form>
    </div>
  </div>


  <div id="overlay" class="hidden"></div>
</section>

<?php require_once("../footer.php") ?>
