<?php

function do_email_exist($conn, $email)
{
    $email = mysqli_real_escape_string($conn, strtolower($email));
    $query = "SELECT email FROM users WHERE email = '$email'";
    $rows = mysqli_query($conn, $query);
    if (mysqli_num_rows($rows) > 0) {
        return true;
    }

    return false;
}

function create_user($conn, $email, $password)
{
    $email = mysqli_real_escape_string($conn, strtolower($email));
    $password = mysqli_real_escape_string($conn, $password);
    $password = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO users(email, password) VALUES('$email', '$password')";

    if (mysqli_query($conn, $query)) {
        return mysqli_insert_id($conn);
    }
    else
    {
        return NULL;
    }
}

?>
