<?php
$__DB_HOST = 'localhost';
$__DB_USER = 'pucom';
$__DB_PASSWORD = 'puadmin';
$__DB_DATABASE = 'pucom';

function getMemberInfo()
{
    global $__DB_HOST, $__DB_USER, $__DB_PASSWORD, $__DB_DATABASE;
    $db = mysqli_connect($__DB_HOST, $__DB_USER, $__DB_PASSWORD, $__DB_DATABASE);
    if (!isset($_SESSION['id']))
        return null;
    $info = mysqli_query($db, "SELECT * FROM member WHERE username='{$_SESSION['id']}'");
    $info = mysqli_fetch_array($info);
    mysqli_close($db);
    return $info;
}

function login($username, $password)
{
    global $__DB_HOST, $__DB_USER, $__DB_PASSWORD, $__DB_DATABASE;
    $db = mysqli_connect($__DB_HOST, $__DB_USER, $__DB_PASSWORD, $__DB_DATABASE);
    $username = mysqli_real_escape_string($db, $username);
    $password = mysqli_real_escape_string($db, $password);
    $member = mysqli_query($db, "SELECT username, password FROM member WHERE username='$username'");
    if (count($member) != 1)
        return false;
    $member = mysqli_fetch_assoc($member);
    mysqli_close($db);
    return password_verify($password, $member['password']);
}

function register($info)
{
    global $__DB_HOST, $__DB_USER, $__DB_PASSWORD, $__DB_DATABASE;
    $db = mysqli_connect($__DB_HOST, $__DB_USER, $__DB_PASSWORD, $__DB_DATABASE);
    $attr = "";
    $values = "";
    if (isset($info['username'])) {
        $attr .= "username";
        $values .= "'" . mysqli_real_escape_string($db, $info['username']) . "'";
    } else
        return false;

    if (isset($info['password'])) {
        $attr .= ", password";
        $password = mysqli_real_escape_string($db, $info['password']);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $values .= ", '" . $password . "'";
    } else
        return false;

    if (isset($info['name'])) {
        $attr .= ", name";
        $values .= ", '" . mysqli_real_escape_string($db, $info['name']) . "'";
    } else
        return false;

    if (isset($info['email'])) {
        $attr .= ", email";
        $values .= ", '" . mysqli_real_escape_string($db, $info['email']) . "'";
    } else
        return false;

    if (isset($info['phone'])) {
        $attr .= ", phone";
        $values .= ", '" . mysqli_real_escape_string($db, $info['phone']) . "'";
    }
    if (isset($info['postcode'])) {
        $attr .= ", postcode";
        $values .= ", " . mysqli_real_escape_string($db, $info['postcode']);
    }
    if (isset($info['address'])) {
        $attr .= ", address";
        $values .= ", '" . mysqli_real_escape_string($db, $info['address']);
        if(isset($info['detailAddress'])) {
            $values.=" ".mysqli_real_escape_string($db, $info['detailAddress']);
        }
        $values.="'";
    }

    $sql = "INSERT INTO member($attr) VALUES ($values);";
    echo $sql;
    return mysqli_query($db, $sql);
}
