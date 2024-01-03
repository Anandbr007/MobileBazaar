<?php 
include('../model/product.php');
include('../database/Db-connect.php');
$product=new product(new DB_CON());
$products=$product->fetchProduct();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../layout/css/footer.css">
    <link rel="stylesheet" href="../layout/css/header.css">
    <link rel="stylesheet" href="/demo proj-ecommerce website/template/css/productDisplay.css">
    <link rel="stylesheet" href="../fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.css">
    <title>home</title>
</head>

<body>
    <!-- header -->
    <header>
        <?php include_once("../layout/header.php"); ?>
    </header>

    <div class="mainbox">
        <h1 class="heading">Our Products</h1>
        <div class="row">
    
            <?php foreach($products as $row) { ?>
                <div class="col-3">
                    <div class="card1">
                        <div class="img-card">
                            <a href=""><img src="./seller/uploads/ <?=$row['image']?>" /></a>
                        </div>
                        <div class="title-card">
                            <a href="" style="text-decoration: none; color: black; ">
                                <span><?= $row['company_name']?></span>-
                                <span><?= $row['prod_name']?></span>
                            </a>
                        </div>
                        <div class="rating-card">
                            <button>
                                <span><?= $row['rating']?></span><i class="fa-sharp fa-solid fa-star fa-xs" style="padding-left: 4px;"></i>
                            </button>
                            <h6>(
                                <span><?= $row['review']?></span>)
                            </h6>
                        </div>
                        <div class="price-card">
                            <h4>₹
                                <span><?= $row['price']?></span> &nbsp; <s>₹
                                    <span><?= $row['first_price']?></span>
                                </s>
                            </h4>
                            <h5>
                                <span><?= $row['discount']?></span>% off
                            </h5>
                        </div>

                        <div class="cart-container">
                            <button id="addToCartButton"><a href=''>Add to Cart</a></button>

                        </div>


                    </div>
                </div>
            <?php } ?>
            
        </div>



</body>

</html>