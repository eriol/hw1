<?php

    require_once("../auth.php");
    require_once("../config.php");
    require_once("../database_utils.php");

    require_once("./database.php");

    if(check_session()) {
        header("Location: /home/");
        exit;
    }

    if(!empty($_POST["email"]) && !empty($_POST["password"]))
    {
        $errors = [];
        $conn = database_open($config);

        $user_id = check_user($conn, $_POST["email"], $_POST["password"]);
        if ($user_id) {
           $_SESSION["logged_user_id"] = $user_id;
           database_close($conn);
           header("Location: /home/");
           exit;
        } else {
            database_close($conn);
            $errors[] = "Email o password errati.";
        }
    }
    else {
        if(isset($_POST["submit_button"]))
        {
            $errors[] = "Tutti i campi sono obbligatori!";
        }
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
        <p class="error text-small"></p>
      </div>
      <div class="password">
        <label for="password">Password: </label>
        <input type="password" name="password" placeholder="Inserisci password"/>
        <p class="error text-small"></p>
      </div>
      <input type="submit" value="Accedi">
    </form>
    <?php
        if(isset($errors)) {
            foreach($errors as $error) {
                echo "<p class='error text-normal'>$error</p>";
            }
        }
    ?>
  </div>
</div>
</section>

<?php require_once("../footer.php") ?>
