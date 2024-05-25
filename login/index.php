<?php

    require_once("../auth.php");
    require_once("../config.php");
    require_once("../database_utils.php");

    require_once("./database.php");

    if(check_session()) {
        header("Location: /home/");
        exit;
    }

    $title = "ἀθλητική (athletikḗ) - Accedi";
    $extra_js = [
        ["file" => "auth.js", "type" => "module"],
        ["file" => "login.js", "type" => "module" ]
    ];
    require_once("../header.php");
?>

<section id="core">
<div id="form_container">
  <div class="title">Accedi</div>
  <div class="data">
    <form action="" method="post">
      <div class="email">
        <label for="name">Email: </label>
        <input type="text" name="email" placeholder="Inserisci email" />
        <p class="error"></p>
      </div>
      <div class="password">
        <label for="password">Password: </label>
        <input type="password" name="password" placeholder="Inserisci password"/>
        <p class="error"></p>
      </div>
      <input type="submit" value="Accedi">
    </form>
    <?php
        if(isset($errors)) {
            foreach($errors as $error) {
                echo "<div class='error'>$error</div>";
            }
        }
    ?>
  </div>
</div>
</section>

<?php require_once("../footer.php") ?>
