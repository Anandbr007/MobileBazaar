<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product </title>
    <link rel="stylesheet" href="./layout/css/header.css">
    <link rel="stylesheet" href="./css/addProduct.css">
    <link rel="stylesheet" href="../../fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.css">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
</head>

<body>
    <header>
        <?php include_once("../seller/layout/header.php"); ?>
    </header>

    <div class="mainbox" style=" margin-top: 80px;" >

        <h1 class="heading">ADD PRODUCT</h1>

        <div class="inner-box">
            <div class="form-box">
                <form  method="post" enctype="multipart/form-data" >
                    <label for="" class="name">Product Name</label>
                    <input type="text" name="name" class="form-textbox"><br>

                    <label for="" class="name" style="margin-left: 145px;" >Company Name</label>
                    <input type="text" name="company" class="form-textbox"><br>

                    <label for="" class="name-desc">Description</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-textarea" placeholder="Maximum 1000 Characters"></textarea><br>

                    <label for="" class="name" style="    margin-left: 281px;">Price</label>
                    <input type="text" name="price" class="form-textbox"><br>

                    <label for="" class="name" style="    margin-left: 241px;">Quantity</label>
                    <input type="text" name="quantity" class="form-textbox"><br>

                    <label for="" class="name" style="    margin-left: 263px;">Rating</label>
                    <input type="text" name="rating" class="form-textbox"><br>

                    <label for="" class="name" style="    margin-left: 263px;">review</label>
                    <input type="text" name="review" class="form-textbox"><br>

                    <label for="" class="name" style="    margin-left: 177px;">Product MRP</label>
                    <input type="text" name="mrp" class="form-textbox"><br>

                    <label for="" class="name" style="    margin-left: 235px;">Discount</label>
                    <input type="text" name="discount" class="form-textbox"><br>

                    <label class="name" style=" margin-left: 198px;">Add Image</label>
                        <input type="file" name="image" class="form-img" accept="Image/*"><br>

                    <input type="submit" name="" id="" value="submit" class="form-submit">
                </form>

            </div>
        </div>

    </div>


</body>

</html>
<?php

// Request
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   
    include('../../model/product.php');
    include('../../database/Db-connect.php');
    $product = new product(new DB_CON());
    $name = $_REQUEST['name'];
    $company = $_REQUEST['company'];
    $description = $_REQUEST['description'];
    $price = $_REQUEST['price'];
    $quantity = $_REQUEST['quantity'];
    $image = $_REQUEST['image'];
    $rating = $_REQUEST['rating'];
    $review = $_REQUEST['review'];
    $mrp = $_REQUEST['mrp'];
    $discount = $_REQUEST['discount'];

    $imgFilename=basename($_FILES['image']['name']);
    $targetDir="./uploads/".$imgFilename;
    
    $image=move_uploaded_file($_FILES['image']['tmp_name'],$targetDir);;

    // insert
    $res = $product->insert($name, $company, $description,$price,$quantity,$image,$rating,$review,$mrp,$discount);
    if ($res) {
        echo "<script>
                window.location.href='./addProduct.php'
            </script>";
    } else {
        echo "<script>
                alert('Product Registration failed');
            </script>";
    }
}
?>