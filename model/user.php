<?php

// Database connect 
// include_once("../database/Db-connect.php");

class user
{
    var $_db;
    public function __construct($db)
    {
        // $db = new DB_Con();
        $this->_db = $db->con;
    }

    public function insert($name, $email, $phone, $username, $password, $role)
    {
        $pass_hash = password_hash($password, PASSWORD_BCRYPT);
        $sql = $this->_db->prepare("INSERT INTO `login` (`username`,`password`,`role`) VALUES (?,?,?)");
        $sql->bind_param("sss", $username, $pass_hash, $role);
        $res = $sql->execute();

        if ($res) {
            $sql1 = "SELECT max(id) from `login` ";
            $max_id_row = $this->_db->query($sql1)->fetch_assoc();
            $max_id = $max_id_row['max(id)'];
            $sql2 = $this->_db->prepare("INSERT INTO `customer` (`name`,`email`,`phone`,`username`,`password`,`loginid`) VALUES (?,?,?,?,?,?)");
            $sql2->bind_param("sssssi", $name, $email, $phone, $username, $pass_hash, $max_id);
            return $sql2->execute();
        }
    }

    public function fetch_seller()
    {
        $sql = "SELECT customer.name,customer.email,customer.phone,customer.username FROM `customer` LEFT JOIN login on customer.loginid=login.id WHERE login.role='seller' ";
        return $this->_db->query($sql);
    }

    public function fetch_customer()
    {
        $sql="SELECT customer.id,customer.name,customer.email,customer.phone,customer.username FROM `customer` LEFT JOIN login on customer.loginid=login.id WHERE login.role='user' ";   
        return $this->_db->query($sql); 
    }
    public function update_customer($id,$name,$email,$phone,$username)
    {
        $sql="UPDATE `customer` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `username` = '$username' WHERE `id` = $id";
        return $this->_db->query($sql); 
    }

    public function delete_customer($id){
        $sql="DELETE FROM `customer` WHERE `id`=$id";
        return $this->_db->query($sql);
    }    

}
