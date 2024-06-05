<?php
    require_once("../config.php");
    require_once("../deity_utils.php");

    $deity = urlencode($_GET["deity"]);
    $influence = get_deity_influence($deity);

    header('Content-Type: application/json');

    echo json_encode($influence);
?>
