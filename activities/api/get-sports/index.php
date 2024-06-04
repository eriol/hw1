<?php

    require_once("../../../auth.php");
    require_once("../../../database_utils.php");
    require_once("../../../config.php");
    require_once("../database.php");

    if(!check_session()) {
        header("Location: /login/");
        exit;
    }

    $conn = database_open($config);
    $sports = get_sports($conn);
    database_close($conn);

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($sports);
?>
