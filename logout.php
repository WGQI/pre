<?php
    session_set_cookie_params(10800);
    session_start();
    unset($_SESSION['session_id']);
    session_destroy();
    header("location:login.php");
?>
