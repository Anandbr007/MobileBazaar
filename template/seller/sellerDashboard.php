<?php  
    include_once("../../model/user.php");
    include_once("../../database/Db-connect.php");
    $user_model=new user(new DB_CON());
    $users=$user_model->fetch_seller();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard </title>
    <link rel="stylesheet" href="./layout/css/header.css">
    <link rel="stylesheet" href="./css/sellerDashboard.css">
    <link rel="stylesheet" href="../../fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.css">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
</head>

<body>
    <header>
        <?php include_once("../seller/layout/header.php"); ?>
    </header>

    <main>
        <div class="mainbox">
           
        <div class="workspace">
                <div class="box">
                    <label for="" class="heading">Seller Details</label>
                    <form action="" method="get">
                        <?php foreach ($users as $row) { ?>
                        <label for="" class="text" >Full Name</label><br>
                        <input type="text" class="textbox" value="<?= $row['name']?>"><br>
                        <label for="" class="text">E-mail</label><br>
                        <input type="text" class="textbox" value="<?= $row['email']?>"><br>
                        <label for="" class="text">Phone</label><br>
                        <input type="text" class="textbox" value="<?= $row['phone']?>"><br>
                        <label for="" class="text">Username</label><br>
                        <input type="text" class="textbox" value="<?= $row['username']?>"><br>
                        <?php } ?>
                    </form>
            </div>
            </div>

        </div>
    </main>
</body>

</html>