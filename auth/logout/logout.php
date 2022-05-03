<?php
include('../login/login.php');
    session_destroy();
    header('Location: ../login/login.html');
?>