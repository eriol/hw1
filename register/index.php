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
      <label for="name">Email: </label>
      <input type="text" name="email" placeholder="Inserisci email" />
      <label for="password1">Password: </label>
      <input type="password1" name="password1" placeholder="Crea una password"/>
      <label for="password1">Ripeti password: </label>
      <input type="password2" name="password2" placeholder="Ripeti password"/>
      <input type="submit" value="Registrati">
    </form>
  </div>
</div>
</section>

<?php require_once("../footer.php") ?>
