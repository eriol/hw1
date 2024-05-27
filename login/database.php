<?php

function check_user($conn, $email, $password) {
    $email = mysqli_real_escape_string($conn, $email);
    $query = "SELECT * FROM users WHERE email = '$email'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);

        if (password_verify($password, $row["password"])) {
            mysqli_free_result($res);
            return $row["id"];
        }
    }

    mysqli_free_result($res);
    return NULL;
}

?>
