<?php

// Database connect 
include_once("../database/Db-connect.php");

class user
{
    var $_db;
    public function __construct($db = new DB_Con())
    {
        $this->_db = $db->con;
    }


    public function insert($name, $email, $phone, $username, $password, $role)
    {

        $sql = $this->_db->prepare("INSERT INTO `login` (`username`,`password`,`role`) VALUES (?,?,?)");
        $sql->bind_param("sss", $username, $password, $role);
        $res = $sql->execute();

        if ($res) {
            $sql1 = "select max(id) from `login` ";
            $max_id = $this->_db->query($sql1)->fetch_object();

            $sql2 = $this->_db->prepare("INSERT INTO `customer` (`name`,`email`,`phone`,`username`,`password`,`loginid`) VALUES (?,?,?,?,?,?)");
            $sql2->bind_param("sssssi", $name, $email, $phone, $username, $password, $max_id);
            return $sql2->execute();
        }
    }

    public function login($username, $password)
    {
        $sql = "SELECT * FROM `login` WHERE `username`='$username' AND `password`='$password'";
        $res = $this->_db->query($sql)->fetch_object();
        if (!$res) {
            echo "<script>
                        alert('Login Failed');
                        window.location.href='./login.php'
                    </script>";
        } else {
            //set session
            $_SESSION['user_id']=$res->id;
            echo "<script>
                        window.location.href='../index.php'
                    </script>";
        }
    }
}
