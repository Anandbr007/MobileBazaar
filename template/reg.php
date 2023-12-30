<!DOCTYPE html>
<html>

<head>
    <meta charset="ISO-8859-1">
    <title>Register</title>
    <link rel="stylesheet" href="../css/reg.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.css">
</head>

<body>
    <div class="container">
        <div class="box">
            <div class="form1">
                <form action="#" method="post">

                    <label class="text">Create Account</label><br>


                    <input class="input1" type="text" name="name" id="" placeholder="Full Name"><br>

                    <input class="input1" type="email" name="email" placeholder="E-Mail"><br>

                    <input class="input1" type="text" name="phone" placeholder="Phone Number"><br>

                    <input class="input1" type="text" name="username" placeholder=" Username"><br>

                    <input class="input1" type="password" name="password" placeholder="Password"><br>

                    <select name="role" class="input2">
                        <option value="user" >User</option>
                        <option value="admin">Seller</option>
                    </select>

                    <input class="submit" type="submit" value="submit">
                </form>
            </div>
        </div>
    </div>

</body>

</html>


<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include_once("../model/user.php");
    $user = new User();

    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $role = $_REQUEST['role'];

    $res = $user->insert($name, $email, $phone, $username, $password, $role);

    if ($res) {
        echo "<script> 
                    window.location.href='./login.php'
                </script>";
    } else {
        echo "<script> 
                    alert('registration failed');
                    window.location.href='./reg.php'
                </script>";
    }
}
?>


