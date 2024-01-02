<?php
session_start();

include_once("../database/Db-connect.php");
class auth
{
    var $_db;
    public function __construct()
    {
        $db = new DB_Con();
        $this->_db = $db->con;
    }



    public function login($username, $password)
    {
        $sql = "SELECT * FROM `login` WHERE `username`='$username' ";
        $res = $this->_db->query($sql)->fetch_object();
        if ($res && password_verify($password, $res->password)) {

            //set session
            $_SESSION['logined'] = true;
            $_SESSION['username'] = $res->username;
            $_SESSION['user_id'] = $res->id;
            $_SESSION['role'] = $res->role;
            if ($res->role == "seller") {
               
                header("Location: /demo proj-ecommerce website/template/seller/sellerDashboard.php");
                exit();
            }

            
            header("Location: ../index.php");
        } else {
            echo "<script>

            window.location.href='./login.php'
        </script>";
        }
    }
}
