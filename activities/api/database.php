<?php

    function get_sports($conn) {

        $query = "SELECT id, name FROM sports ORDER BY id";


        $sports = [];
        $res = mysqli_query($conn, $query);
        if ($res) {
            while($row = mysqli_fetch_assoc($res)){
                $sports[$row["id"]] = $row["name"];
            }

        }
        return $sports;
    }

    function do_sport_exist($conn, $sport) {

        $sport = mysqli_real_escape_string($conn, $sport);
        $query = "SELECT id FROM sports WHERE id = '$sport'";

        $rows = mysqli_query($conn, $query);
        if (mysqli_num_rows($rows) > 0) {
            return true;
        }

        return false;
    }

    function create_activity($conn, $title, $sport, $performance, $description, $user_id) {

        $title = mysqli_real_escape_string($conn, $title);
        $sport = mysqli_real_escape_string($conn, $sport);
        $performance = mysqli_real_escape_string($conn, $performance);
        $description = mysqli_real_escape_string($conn, $description);

        $query = "INSERT INTO activities(title, description, performance, sport_id, user_id) VALUES ('$title', '$description', $performance, '$sport', $user_id)";

        $res = mysqli_query($conn, $query);

        return $res;
    }

?>
