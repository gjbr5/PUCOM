<?php
session_start();
//logout
if(isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    echo "<script>location.replace('../');</script>";
}

//login
include "Database.php";
if (isset($_POST['username']) && isset($_POST['password'])) {
    if (login($_POST['username'], $_POST['password'])) {
        $_SESSION['username'] = $_POST['username'];
        echo "<script>location.replace('../');</script>";
    } else {
        echo "<script>alert('Login Failed');</script>";
        echo "<script>location.replace('../auth/login.php');</script>";
    }
}
