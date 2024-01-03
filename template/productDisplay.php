<?php
include('../model/product.php');
include('../database/Db-connect.php');
$product = new product(new DB_CON());
$products = $product->fetchProduct();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../template/productDisplay.css">
    <link rel="stylesheet" href="../layout/css/footer.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.css">
    <title>home</title>
</head>

<body>
    <!-- header -->
    <header>

        <?php
        session_start();
        $uri = basename($_SERVER['REQUEST_URI']);
        if ($uri == "login.php" || $uri == "reg.php") {
        } else if (!isset($_SESSION['logined'])) {
            header("Location:/demo proj-ecommerce website/template/login.php");
            exit();
        }
        // print_r($_SESSION['logined']);

        ?>
        <div class="container1">
            <div class="row1">
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
                
                <i class="fa-solid fa-user fa-lg dropbtn" style="color: #ffffff;position: relative;left: 1768px;top: -277px;"></i>
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
    </header>

    <div class="mainbox">
        <h1 class="heading">Our Products</h1>
        <div class="row">

            <?php foreach ($products as $row) { ?>
                <div class="col-3">
                    <div class="card1">
                        <div class="img-card">
                            <a href=""><img src="./seller/uploads/<?= $row['image'] ?>" /></a>
                        </div>
                        <div class="title-card">
                            <a href="" style="text-decoration: none; color: black; ">
                                <?= $row['company_name'] ?>-
                                <?= $row['prod_name'] ?>
                            </a>
                        </div>
                        <div class="rating-card">
                            <button>
                                <?= $row['rating'] ?><i class="fa-sharp fa-solid fa-star fa-xs" style="padding-left: 4px;"></i>
                            </button>
                            <h6>(
                                <?= $row['review'] ?>)
                            </h6>
                        </div>
                        <div class="price-card">
                            <h4>₹
                                <?= $row['price'] ?>&nbsp; <s>₹
                                    <?= $row['first_price'] ?>
                                </s>
                            </h4>
                            <h5>
                                <?= $row['discount'] ?>% off
                            </h5>
                        </div>

                        <div class="cart-container">
                            <button id="addToCartButton"><a href=''>Add to Cart</a></button>

                        </div>


                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
    <div class="second-box">

    </div>
    <footer>
        <div class="footer-area">
            <div class="containers">
                <div class="rows">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-box about-widget">
                            <h2 class="widget-title">About us</h2>
                            <p>Welcome to our mobile phones emporium, where cutting-edge technology meets unbeatable convenience. At MobileBaazar, we are passionate about bringing you the latest and greatest in mobile innovation. Our curated collection showcases top-tier brands, ensuring you have access to the most reliable, stylish, and feature-packed smartphones. </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-box get-in-touch">
                            <h2 class="widget-title">Get in Touch</h2>
                            <ul>
                                <li>HTGRA-16A,HilltopGarden,vazhayila</li>
                                <li>Contact@mobilebaazar.com</li>
                                <li>+91 7356081201</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-box pages">
                            <h2 class="widget-title">Pages</h2>
                            <ul>
                                <li><a href="dashboard.html">Home</a></li>
                                <li><a href="">About</a></li>
                                <li><a href="">Shop</a></li>
                                <li><a href="">News</a></li>
                                <li><a href="">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-box subscribe">
                            <h2 class="widget-title">Subscribe</h2>
                            <p>Subscribe to our mailing list to get the latest updates.</p>
                            <form action="">
                                <input type="email" placeholder="Email">
                                <button type="submit"><i class="fas fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="containers">
                <div class="rows">
                    <div class="col-lg-6 col-md-12">
                        <p>Copyrights &copy; 2023 - <a href="">MobileBaazar</a>, All Rights Reserved.</p>
                    </div>
                    <div class="col-lg-6 text-right col-md-12" style="position: relative; left: 1069px;">
                        <div class="social-icons">
                            <ul>
                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>