<?php

//logout
if(isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    echo "ok";
    echo "<script>location.replace('../index.php');</script>";
}

//login
if (isset($_POST['username']) && isset($_POST['password'])) {
    if (login($_POST['username'], $_POST['password'])) {
        $_SESSION['username'] = $_POST['username'];
        echo "<script>location.replace('../');</script>";
    } else
        echo "<script>alert('Login Failed');</script>";
}
