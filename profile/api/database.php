<?php

    function get_profile($conn) {

        $user_id = $_SESSION["logged_user_id"];

        $query = "SELECT name, age, bio FROM profiles WHERE user_id = $user_id";

        $res = mysqli_query($conn, $query);
        $profile = mysqli_fetch_assoc($res);
        return $profile;
    }

?>
