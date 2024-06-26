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

    function create_activity($conn, $title, $sport, $performance, $description, $deity, $deity_influence, $user_id) {

        $title = mysqli_real_escape_string($conn, $title);
        $sport = mysqli_real_escape_string($conn, $sport);
        $performance = mysqli_real_escape_string($conn, $performance);
        $description = mysqli_real_escape_string($conn, $description);
        $deity = mysqli_real_escape_string($conn, $deity);
        $deity_influence = mysqli_real_escape_string($conn, $deity_influence);
        $deity_influence = floatval($deity_influence);

        $query = "INSERT INTO activities(title, description, performance, sport_id, deity, deity_influence, user_id) VALUES ('$title', '$description', $performance, '$sport', '$deity', $deity_influence, $user_id)";

        $res = mysqli_query($conn, $query);

        return $res;
    }

    function get_activities($conn) {

        $query = "SELECT * FROM activities INNER JOIN users ON users.id = activities.user_id ORDER BY created_at DESC";
        $activities = [];
        $res = mysqli_query($conn, $query);
        if ($res) {
            while($row = mysqli_fetch_assoc($res)){
                $activities[] = [
                    'id' => $row["id"],
                    'title' => $row["title"],
                    'description' => $row['description'],
                    'performance' => $row['performance'],
                    'deity' => $row['deity'],
                    'deity_influence' => $row['deity_influence'],
                    'email' => $row["email"],
                    'created_at' => $row["created_at"]
                ];
            }

        }
        return $activities;
    }

?>
