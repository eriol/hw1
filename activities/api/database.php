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

?>
