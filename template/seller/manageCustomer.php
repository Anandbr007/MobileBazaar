<?php
include_once("../../model/user.php");
include_once("../../database/Db-connect.php");
$user_model = new user(new DB_CON());
$users = $user_model->fetch_customer();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Customer </title>
    <link rel="stylesheet" href="./layout/css/header.css">
    <link rel="stylesheet" href="./css/manageCustomer.css">
    <link rel="stylesheet" href="../../fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.css">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
</head>

<body>
    <header>
        <?php include_once("../seller/layout/header.php"); ?>
    </header>

    <div class="mainbox">
        <h1 class="heading">Customer Details</h1>
        <table class="table table-striped">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Phone Number</th>
                <th>Username</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php foreach ($users as $row) { ?>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['phone'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td>
                        <a href="./editCustomer.php?id=<?= $row['id'] ?>" class="btn">Edit</a>
                        <form method="post">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="submit" class="btn" value="Delete">
                        </form>
                    </td>
            </tbody>
        <?php } ?>
        </table>

    </div>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_REQUEST['id'];
    $res = $user_model->delete_customer($id);
    if ($res) {
        echo "<script>
                window.location.href='./manageCustomer.php';
                </script>";
    } else {
        echo "<script>
            alert('failed');
        </script>";
    }
}
?>