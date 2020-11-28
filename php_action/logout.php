<?php
    session_start();
    unset($_SESSION['id']);
    session_unset();
    if(session_destroy()) {
        header("Location: ../admin-login.html");
     }
    exit();
?>