<?php
    session_start();
    session_destroy();  //destroy the current session
    header('Location: login.php');
?>

