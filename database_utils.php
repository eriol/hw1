<?php

function database_open($config)
{
    $conn = mysqli_connect(
        $config["database"]["host"],
        $config["database"]["user"],
        $config["database"]["password"],
        $config["database"]["name"])
    or die(mysqli_error($conn));

    return $conn;
}

function database_close($conn)
{
    mysqli_close($conn);
}


?>
