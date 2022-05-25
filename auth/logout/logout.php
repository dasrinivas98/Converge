<?php
include('../login/login.php');
    session_destroy();
    $_SESSION = array();
    header('Location: ../login/login.html');
?>