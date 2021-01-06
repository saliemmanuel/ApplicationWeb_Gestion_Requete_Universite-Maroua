<?php
    if(!isset($_SESSION["userName"])) {
        header('location:../pages/login.php');
        exit();
    }
?>