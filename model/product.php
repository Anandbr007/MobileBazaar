<?php


// include_once("../database/Db-connect.php");

class product
{
    var $_db;
    public function __construct($db)
    {
       
        $this->_db = $db->con;
    }

    public function insert($name, $company, $description,$price,$quantity,$image,$rating,$review,$mrp,$discount)
    {
        $sql = $this->_db->prepare("INSERT INTO `product` (`prod_name`,`company_name`,`description`,`price`,`quantity`,`image`,`rating`,`review`,`first_price`,`discount`) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $sql->bind_param("ssssssssss", $name, $company, $description,$price,$quantity,$image,$rating,$review,$mrp,$discount);
        return $sql->execute();
    }

    public function fetchProduct()  {
        $sql="SELECT * FROM `product`";
        return $this->_db->query($sql);
    }
    
    // public function ProductById($id)  {
    //     $sql="SELECT * FROM `Product` WHERE `id`=$id";
    //     return $this->_db->query($sql)->fetch_object();
    // }

    // public function updateProduct($id,$Product_name,$Product_Description)  {
    //     // $sql="UPDATE `Product` SET `Product_name`='$Product_name' , `Product_description`='$Product_Description' WHERE `Product`.`id`=$id";
    //     $sql="UPDATE `Product` SET `Product_name` = '$Product_name', `Product_description` = '$Product_Description' WHERE `id` = $id";
    //     return $this->_db->query($sql);
    // }

    // public function deleteById($id)  {
    //     $sql="DELETE FROM `Product` WHERE `id`=$id";
    //     return $this->_db->query($sql);
    // }  

}
