<?php  
    include_once("../../model/user.php");
    include_once("../../database/Db-connect.php");
    $user_model=new user(new DB_CON());
    $users=$user_model->fetch_customer();
    foreach ($users as $row) { 
    $id=$row['id'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Customer </title>
    <link rel="stylesheet" href="./layout/css/header.css">
    <link rel="stylesheet" href="./css/editCustomer.css">
    <link rel="stylesheet" href="../../fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.css">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
</head>

<body>
    <header>
        <?php include_once("../seller/layout/header.php"); ?>
    </header>

    <div class="workspace">
                <div class="box">
                    <label for="" class="heading">Edit Details</label>
                    <form action="" method="post">
                        <label for="" class="text" >Full Name</label><br>
                        <input type="text" class="textbox" name="name"><br>
                        <label for="" class="text">E-mail</label><br>
                        <input type="text" class="textbox" name="email"><br>
                        <label for="" class="text">Phone</label><br>
                        <input type="text" class="textbox" name="phone"><br>
                        <label for="" class="text">Username</label><br>
                        <input type="text" class="textbox" name="username"><br>
                        <button type="submit" class="btn">Update Profile</button>
                    </form>
            </div>
            </div>

        </div>

</body>
</html>
<?php 
if ($_SERVER['REQUEST_METHOD']=="POST") {
       $name=$_REQUEST['name'];
       $email=$_REQUEST['email'];
       $phone=$_REQUEST['phone'];
       $username=$_REQUEST['username'];
        // update
        $res=$user_model->update_customer($id,$name,$email,$phone,$username);
        if ($res) {
            echo "<script>
                location.href='./manageCustomer.php';
                </script>";
        } else {
            echo "<script>
                alert('failed');
            </script>";
        }
   } 
   ?>