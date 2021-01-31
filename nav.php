<?php
session_start();
if (isset($_POST['logout'])) {
    // session_unset();
    unset($_SESSION);
    header("Location: login.php");
}



$admin = $_SESSION['admin'];
if (isset($_POST['addmovie'])) {

    header("Location: addmovie.php");
}
if (isset($_POST['modifycat'])) {

    header("Location: modifycat.php");
}

