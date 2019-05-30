<?php

class Database
{
    private static $instance = null;
    private $db = null;

    public static function getInstance()
    {
        if (!self::$instance)
            self::$instance = new self();
        return self::$instance;
    }

    private function __construct()
    {
        $this->db = mysqli_connect('localhost', 'pucom', 'puadmin', 'pucom');
    }

    function select($sql)
    {
        return mysqli_fetch_all(mysqli_query($this->db, $sql), MYSQLI_BOTH);
    }

    function insert($sql)
    {
        return mysqli_query($this->db, $sql);
    }

    function close()
    {
        mysqli_close($this->db);
    }

    function login($username, $password)
    {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "SELECT username, password FROM member WHERE username='$username'";
        $member = $this->select($sql);
        echo $password;
        return count($member) == 1 && password_verify($password, $member[0]['password']);
    }

    function register($info)
    {
        $password = password_hash($info['password'], PASSWORD_BCRYPT);
        $sql = "INSERT INTO member(username, password, name, email, phone, postcode, address) VALUES ('{$info['username']}', '{$password}', '{$info['name']}', '{$info['email']}'";
        if (isset($info['phone']))
            $sql .= ", '{$info['phone']}'";
        else
            $sql .= ", NULL";
        if (isset($info['postcode']) && trim($info['postcode']) != '') {
            $sql .= ", {$info['postcode']}";
        } else
            $sql .= ", NULL";
        if (isset($info['address']) && trim($info['address']) != '') {
            $sql .= ", '{$info['address']}";
            if (isset($info['detailAddress']) && trim($info['detailAddress'] != ''))
                $sql .= " {$info['detailAddress']}'";
            else
                $sql .= "'";
        } else
            $sql .= ", NULL";
        $sql .= ");";
        echo $sql;
        return $this->insert($sql);
    }
}
