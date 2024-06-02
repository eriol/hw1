<?php

    require_once("../auth.php");

    if(!check_session()) {
        header("Location: /login/");
        exit;
    }

    $query = urlencode($_GET["q"]);
    $url = 'https://wp24-athletes.colca.mornie.org/search?name='.$query;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $res = curl_exec($ch);
    curl_close($ch);

    header('Content-Type: application/json');

    echo $res;
?>
