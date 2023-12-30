<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <nav>
                <label class="logo"><a href="home.html">Mobile Bazaar</a></label>

                <ul>
                    <li><a href="/demo proj-ecommerce website/template/reg.php">Register</a></li>
                </ul>
            </nav>
        </div>
        <div class="bg">
            <img src="../img/windows-C6T6vr1sQI0-unsplash.jpg" alt="">
        </div>
        <div class="form1">
            <h1>Login</h1>
            <form action="" method="post">
                <label for="" class="text">Username</label><br>
                <input class="field" type="text" name="username" id=""><br>
                <div class="bar"></div>
                <label for="" class="text">Password</label><br>
                <input class="field" type="password" name="password"><br>
                <div class="bar"></div>
                <input class="field2" type="submit" value="Login" id=""><br><br>
                <input class="field1" type="checkbox" name="" id="">
                <label style="font-size: 17px; margin-left: 8px;">Remember me</label>
            </form>
        </div>
    </div>
</body>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include("../model/user.php");
    $user = new user();

    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    $res = $user->login($username, $password);

    
}

?>