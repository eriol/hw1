<?php

    function get_profile($conn) {

        $user_id = $_SESSION["logged_user_id"];

        $query = "SELECT name, age, bio FROM profiles WHERE user_id = $user_id";

        $res = mysqli_query($conn, $query);
        $profile = mysqli_fetch_assoc($res);
        return $profile;
    }

    function update_profile($conn, $name, $age, $bio) {

        $user_id = $_SESSION["logged_user_id"];

        $name = mysqli_real_escape_string($conn, $name);
        $age = mysqli_real_escape_string($conn, $age);
        $bio = mysqli_real_escape_string($conn, $bio);


        $query = "UPDATE profiles SET name='$name', age=$age, bio='$bio' WHERE user_id = $user_id";

        $res = mysqli_query($conn, $query);

        if ($res) {
            return $res;
        } else {
            return "Si è verificato un errore " . mysqli_error($conn);
        }
    }

?>
