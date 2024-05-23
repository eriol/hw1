<?php
    session_start();

    function check_session() {
        if(isset($_SESSION['logged_user_id'])) {
            return $_SESSION['logged_user_id'];
        } else {
            return false;
        }
    }
?>
