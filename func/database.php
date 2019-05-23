<?php

class Database
{
    private $db;

    function __construct()
    {
        $this->db = mysqli_connect('localhost', 'pucom', 'puadmin', 'pucom');
    }

    function query($sql)
    {
        return mysqli_fetch_all(mysqli_query($this->db, $sql), MYSQLI_BOTH);
    }

    function close()
    {
        mysqli_close($this->db);
    }

    function login($username, $password) {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "SELECT username, password FROM member WHERE username='$username' AND password='$password';";
        $member = $this->query($sql);
        return count($member)==1;
    }
}