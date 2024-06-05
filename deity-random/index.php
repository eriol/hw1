<?php
    require_once("../deity_utils.php");

    $deity = get_random_deity();

    header('Content-Type: application/json');

    echo json_encode($deity);
?>
