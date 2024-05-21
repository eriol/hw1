<?php
    $title = "ἀθλητική (athletikḗ) - Registrati";
    $extra_js = "register.js";
    require_once("../header.php");
?>

<section id="core">
<div id="register-form">
  <div class="title">Registrati</div>
  <div class="data">
    <form action="" method="post">
      <div class="email">
        <label for="name">Email: </label>
        <input type="text" name="email" placeholder="Inserisci email" />
        <p class="error"></p>
      </div>
      <div class="password">
        <label for="password">Password: </label>
        <input type="password" name="password" placeholder="Crea una password"/>
        <p class="error"></p>
      </div>
      <div class="password_confirm">
        <label for="password_confirm">Ripeti password: </label>
        <input type="password" name="password_confirm" placeholder="Ripeti password"/>
        <p class="error"></p>
      </div>
      <input type="submit" value="Registrati">
    </form>
  </div>
</div>
</section>

<?php require_once("../footer.php") ?>
