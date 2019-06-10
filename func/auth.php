<?php
session_start();

//logout
if (isset($_SESSION['username'])) {
    session_destroy();
    unset($_SESSION['username']);
    echo "<script>location.replace('../');</script>";
    exit;
}

if (!isset($_POST['action'])) {
    echo "<script>alert('Wrong Access');location.replace('../');</script>";
}

//login
include "Database.php";
if ($_POST['action'] == "login") {
    if (login($_POST['username'], $_POST['password'])) {
        $_SESSION['username'] = $_POST['username'];
        echo "<script>location.replace('../');</script>";
    } else {
        echo "<script>alert('Login Failed');</script>";
        echo "<script>location.replace('../auth/login.php');</script>";
    }
}

//register
if ($_POST['action'] == "register") {
    if (register($_POST)) {
        echo "<script>alert('Welcome!');location.replace('../');</script>";
    } else {
        echo "<script>alert('Register Failed');history.go(-1);</script>";
    }
}
