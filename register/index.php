<?php

    require_once("../auth.php");
    require_once("../config.php");
    require_once("../database_utils.php");

    require_once("./database.php");

    if(check_session()) {
        header("Location: /home/");
        exit;
    }

    if(!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["password_confirm"]))
    {
        $errors = [];
        $conn = database_open($config);

        $email = $_POST['email'];
        $password = $_POST["password"];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'email inserita non è valida!";
        } else {
            if (do_email_exist($conn, $email)) {
                $errors[] = "L'email inserita è già presente nel sistema!";
            }
        }

        if (strlen($password < 8)) {
            $errors[] = "La password deve contenere almeno 8 caratteri!";
        }

        if (strcmp($password, $_POST["password_confirm"]) != 0) {
            $errors[] = "La conferma della password deve essere uguale alla password!";
        }

        if (count($errors) == 0) {
            $user_id = create_user($conn, $email, $password);

            if ($user_id) {
                $_SESSION["logged_user_id"] = $user_id;
                database_close($conn);
                header("Location: /home/");
                exit;
            }
            else
            {
                $errors[] = "Si è verificato un errore accedendo al database!";
            }
        }

        database_close($conn);
    } else {
        if(isset($_POST["submit_button"]))
        {
            $errors[] = "Riempire tutti i campi!";
        }
    }


    $title = "ἀθλητική (athletikḗ) - Registrati";
    $extra_js = [
        ["file" => "auth.js", "type" => ""],
        ["file" => "register.js", "type" => "module" ]
    ];
    require_once("../header.php");
?>

<section id="core">
<div id="form_container">
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
      <input type="submit" name="submit_button" value="Registrati">
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
