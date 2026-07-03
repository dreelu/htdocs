<?php
    session_start();

    if (!isset($_SESSION['id'])) {
        header("Location: php/login.php");
        exit;
    } else {
        header("Location: php/main.php");
        exit;
    }
?>
