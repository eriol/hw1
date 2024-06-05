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
        $query = "SELECT id FROM sports id = '$sport'";

        $rows = mysqli_query($conn, $query);
        if (mysqli_num_rows($rows) > 0) {
            return true;
        }

        return false;
    }


?>
