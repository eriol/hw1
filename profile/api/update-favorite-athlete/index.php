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

    if (isset($_POST["athlete"]))
    {
        $athlete = $_POST["athlete"];

        if (trim($athlete) === "") {
            echo json_encode(["error" => "Il campo athlete non può essere vuoto"]);
            exit;
        }

        $conn = database_open($config);
        $res = update_athlete_profile($conn, $athlete);
        database_close($conn);

        echo json_encode($res);
    }
?>
