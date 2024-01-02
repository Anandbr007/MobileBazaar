<?php 
session_start();
$uri= basename($_SERVER['REQUEST_URI']);
if ($uri=="login.php"||$uri=="register.php") {
  
} else if(!isset($_SESSION['logined'])){
  header("Location:/ekart/template/login.php");
  exit();
}

?>
<div class="container">
    <div class="row">
        <nav>
            <label class="logo"><a href="home.html">Mobile Bazaar</a></label>


            <ul>
                <li><a href="/demo proj-ecommerce website/template/seller/sellerDashboard.php">Home</a></li>
                <li><a href="/demo proj-ecommerce website/template/seller/addProduct.php">Add Products</a></li>
                <li><a href="/demo proj-ecommerce website/template/seller/manageCustomer.php">Manage Customer</a></li>
                <li><a href="">Inventory</a></li>

            </ul>

            <i class="fa-solid fa-user fa-lg dropbtn" style="color: #ffffff;position: relative;left: 1768px;top: -182px;"></i>
            <div class="dropdown">
                <button class="dropbtn">Profile</button>
                <div class="dropdown-content">
                    <a href="/demo proj-ecommerce website/template/logout.php">LogOut</a>

                </div>
            </div>
        </nav>
    </div>
</div>