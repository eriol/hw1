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

    if (isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["bio"]))
    {
        $name = $_POST["name"];
        $age = $_POST["age"];
        $bio = $_POST["bio"];

        $age = intval($age);
        if ($age < 1) {
            echo json_encode(["error" => "L'età deve essere maggiore di 1."]);
            exit;
        }

        $conn = database_open($config);
        $res = update_profile($conn, $name, $age, $bio);
        database_close($conn);

        echo json_encode($res);
    }
?>
