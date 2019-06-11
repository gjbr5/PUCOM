<?php

function connDB()
{
    $HOST = 'localhost';
    $USER = 'pucom';
    $PASSWORD = 'puadmin';
    $DATABASE = 'pucom';
    return mysqli_connect($HOST, $USER, $PASSWORD, $DATABASE);
}

function getMemberInfo()
{
    $db = connDB();
    if (!isset($_SESSION['username']))
        return null;
    $info = mysqli_query($db, "SELECT * FROM member WHERE username='{$_SESSION['username']}'");
    $info = mysqli_fetch_array($info);
    mysqli_close($db);
    return $info;
}

function getProduct($sql)
{
    $db = connDB();
    $products = mysqli_query($db, $sql);
    $products = mysqli_fetch_all($products, MYSQLI_BOTH);
    mysqli_close($db);
    return $products;
}

function getColor($pid)
{
    switch (substr($pid, strlen($pid) - 2, 2)) {
        case '00':
            return 'Black';
        case '11':
            return 'White';
        case '22':
            return 'Red';
        case '33':
            return 'Blue';
        case '44':
            return 'Green';
        case '55':
            return 'Gray';
    }
}

function getColorNum($color)
{
    switch ($color) {
        case 'Black':
            return '00';
        case 'White':
            return '11';
        case 'Red':
            return '22';
        case 'Blue':
            return '33';
        case 'Green':
            return '44';
        case 'Gray':
            return '55';
    }
}

function getCategory($category)
{
    switch ($category) {
        case '100':
            return 'Desktops';
        case '200':
            return 'Laptops';
        case '300':
            return 'Mice';
        case '400':
            return 'Keyboards';
        case '500':
            return 'Accessories';
    }
}

function getBoardList()
{
    $db = connDB();
    $list = mysqli_query($db, "SELECT post_num as num, title, member, wrt_date as date, hits FROM post ORDER BY date DESC");
    if ($list)
        $list = mysqli_fetch_all($list, MYSQLI_ASSOC);
    mysqli_close($db);
    return $list;
}

function getPost($num)
{
    $db = connDB();
    mysqli_real_escape_string($db, $num);
    $post = mysqli_query($db, "SELECT * FROM post WHERE post_num=$num;");
    if ($post)
        $post = mysqli_fetch_array($post);
    mysqli_close($db);
    return $post;
}

function increaseHits($num)
{
    $db = connDB();
    mysqli_real_escape_string($db, $num);
    mysqli_query($db, "UPDATE post SET hits=hits+1 WHERE post_num=$num;");
    mysqli_close($db);
}

function login($username, $password)
{
    $db = connDB();
    $username = mysqli_real_escape_string($db, $username);
    $password = mysqli_real_escape_string($db, $password);
    $member = mysqli_query($db, "SELECT password FROM member WHERE username='$username'");
    if (!$member)
        return false;
    $member = mysqli_fetch_assoc($member);
    mysqli_close($db);
    return password_verify($password, $member['password']);
}

function register($info)
{
    $db = connDB();
    $attr = "";
    $values = "";
    if (isset($info['username']) && trim($info['username']) != '') {
        $attr .= "username";
        $values .= "'" . mysqli_real_escape_string($db, $info['username']) . "'";
    } else
        return false;

    if (isset($info['password']) && trim($info['password']) != '') {
        $attr .= ", password";
        $password = password_hash($info['password'], PASSWORD_BCRYPT);
        $password = mysqli_real_escape_string($db, $password);
        $values .= ", '" . $password . "'";
    } else
        return false;

    if (isset($info['name']) && trim($info['name']) != '') {
        $attr .= ", name";
        $values .= ", '" . mysqli_real_escape_string($db, $info['name']) . "'";
    } else
        return false;

    if (isset($info['email']) && trim($info['email']) != '') {
        $attr .= ", email";
        $values .= ", '" . mysqli_real_escape_string($db, $info['email']) . "'";
    } else
        return false;

    if (isset($info['phone']) && trim($info['phone']) != '') {
        $attr .= ", phone";
        $values .= ", '" . mysqli_real_escape_string($db, $info['phone']) . "'";
    }
    if (isset($info['postcode']) && trim($info['postcode']) != '') {
        $attr .= ", postcode";
        $values .= ", " . mysqli_real_escape_string($db, $info['postcode']);
    }
    if (isset($info['address']) && trim($info['address']) != '') {
        $attr .= ", address";
        $values .= ", '" . mysqli_real_escape_string($db, $info['address']) . "'";
    }

    $sql = "INSERT INTO member($attr) VALUES ($values);";
    return mysqli_query($db, $sql);
}

function modify($info)
{
    $db = connDB();
    $values = "";

    if (isset($info['password']) && trim($info['password']) != '') {
        $values .= " password='";
        $password = password_hash($info['password'], PASSWORD_BCRYPT);
        $password = mysqli_real_escape_string($db, $password);
        $values .= $password . "'";
    } else
        return false;

    if (isset($info['email']) && trim($info['email']) != '') {
        $values .= ", email='";
        $values .= mysqli_real_escape_string($db, $info['email']) . "'";
    } else
        return false;

    if (isset($info['phone']) && trim($info['phone']) != '') {
        $values .= ", phone='";
        $values .= mysqli_real_escape_string($db, $info['phone']) . "'";
    }
    if (isset($info['postcode']) && trim($info['postcode']) != '') {
        $values .= ", postcode=";
        $values .= mysqli_real_escape_string($db, $info['postcode']);
    }
    if (isset($info['address']) && trim($info['address']) != '') {
        $values .= ", address='";
        $values .= mysqli_real_escape_string($db, $info['address']) . "'";
    }

    $sql = "UPDATE member SET".$values." WHERE username='".mysqli_real_escape_string($db, $info['username'])."'";
    echo "<script>alert({$sql});</script>";
    return mysqli_query($db, $sql);
}