<?php

    require_once("../../../auth.php");
    require_once("../../../database_utils.php");
    require_once("../../../config.php");
    require_once("../database.php");

    if(!check_session()) {
        header("Location: /login/");
        exit;
    }

    header('Content-Type: application/json; charset=utf-8');

    if(!empty($_POST["title"]) && !empty($_POST["sport"]) && !empty($_POST["performance"]) && !empty($_POST["description"]))
    {
        $errors = [];
        $conn = database_open($config);

        $title = trim($_POST["title"]);
        if(strlen($title) === 0) {
            $errors[] = "Il titolo non può essere vuoto!";
        }
        $sport = trim($_POST["sport"]);
        if(strlen($sport) === 0) {
            $errors[] = "Lo sport non può essere vuoto!";
        } else {
            if(!do_sport_exist($conn, $sport)) {

                $errors[] = "Sport inesistente!";
            }
        }
        $performance = floatval($_POST["performance"]);
        if($performance > 10 || $performance < 1) {
            $errors[] = "Il campo performance deve essere compreso tra 1 e 10!";
        }
        $description = trim($_POST["description"]);
        if(strlen($description) === 0) {
            $errors[] = "La descrizione non può essere vuota!";
        }

        if (count($errors) == 0) {
            $user_id = $_SESSION["logged_user_id"];
            $created = create_activity($conn, $title, $sport, $performance, $description, $user_id);
            if ($created) {
                echo json_encode(["errors"=>[]]);
            } else {

                $errors[] = "Si è verificato un errore durante il salvataggio nel database!";
                echo json_encode(["errors"=>[]]);
            }
            database_close($conn);
        }
        else {
            echo json_encode(["errors"=>$errors]);
        }
    } else {
        if(isset($_POST["save_activity"]))
        {
            $errors[] = "Riempire tutti i campi!";
            echo json_encode(["errors"=>$errors]);
        }
    }
?>
