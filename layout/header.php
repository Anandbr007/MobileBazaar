
<?php 
session_start();
$uri= basename($_SERVER['REQUEST_URI']);
if ($uri=="login.php"||$uri=="reg.php") {
  
} else if(!isset($_SESSION['logined'])){
  header("Location:/demo proj-ecommerce website/template/login.php");
  exit();
}
// print_r($_SESSION['logined']);

?>
<div class="container">
    <div class="row">
        <nav>
            <label class="logo"><a href="home.html">MobileBazaar</a></label>

            <ul>
                <li><a href="/demo proj-ecommerce website/index.php">Home</a></li>
                <li><a href="/demo proj-ecommerce website/template/productDisplay.php">Product</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact</a></li>

            </ul>

            <?php
            
            if (!isset($_SESSION['logined'])) {
                echo "<a href='/demo proj-ecommerce website/template/reg.php' class='navlogin' style='top: -163px;''>SignUp</a>
                      <a href='/demo proj-ecommerce website/template/login.php' class='navlogin' style='margin-left: 20px; top: -163px;''>Login</a>";
            } else {
                echo '<i class="fa-solid fa-cart-shopping fa-lg " style="color: white; position: relative;left: 1699px;top: -159px;"></i>
                <p style="color: white;
                    position: relative;
                    left: 1696px;
                    top: -186px;
                    font-size: 16px;
                    font-family: sans-serif;
                    width: 34px;
                    padding-top: 30px;">Cart</p>
                
                <i class="fa-solid fa-user fa-lg dropbtn" style="color: #ffffff;position: relative;left: 1768px;top: -250px;"></i>
                <div class="dropdown">
                    <button class="dropbtn">Profile</button>
                    <div class="dropdown-content">
                      <a href="reg.html">Orders</a>
                      <a href="reg.html">Wishlist</a>
                      <a href="/demo proj-ecommerce website/template/Logout.php">LogOut</a>
                    </div>
                </div>';            
            }
            ?>


        </nav>
    </div>

</div>