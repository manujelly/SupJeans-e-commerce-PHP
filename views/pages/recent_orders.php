<?php
session_start();
if (!isset($_SESSION['user_data']) || empty($_SESSION['user_data']))
{
    header('location:/views/pages/auth/login.php');
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your recent orders</title>
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../public/css/main.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <?php
    require $_SERVER['DOCUMENT_ROOT'].'/views/partials/nav.php';
    ?>

</nav>
<?php
if (isset($_GET['message']) && !empty($_GET['message']))
{
    echo "<p id='message' class='alert alert-success' style='margin-top: 62px'>Your transaction is completed</p>";
}
?>
<h1 class="display-1 text-center mt-5">List of your recents orders</h1>
<table class="table table-bordered table-info m">
    <thead>
    <tr class="text-white bg-dark">
        <th scope="col" class="lead">#</th>
        <th scope="col" class="lead">Receipt reference</th>
        <th scope="col" class="lead">Product name</th>
        <th scope="col" class="lead">Price</th>
        <th scope="col" class="lead">User</th>
        <th scope="col" class="lead">Billing address</th>
        <th scope="col" class="lead">Delivery address</th>
        <th scope="col" class="lead">Transaction date</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $a=new Database();
    $email=$_SESSION['user_data'];
    $sql="select * from products where products.user='$email'";
    $req=$a->connexion()->prepare($sql);
    $req->execute();
    while ($item=$req->fetch())
    {?>
        <tr >
            <th scope="row" class="lead"><?php  echo $item['id'] ?></th>
            <th scope="row" class="lead"><?php  echo $item['receipt_ref'] ?></th>
            <td><?php  echo $item['product_name'] ?></td>
            <td class="lead"><?php  echo $item['price'].'$' ?></td>
            <td><?php  echo $item['user'] ?></td>
            <td><?php  echo $item['billing_address'] ?></td>
            <td><?php  echo $item['delivery_address'] ?></td>
            <td><?php  echo $item['transaction_date'] ?></td>


        </tr>
        <?php
    }

    ?>
    </tbody>
</table>
<script src="../../public/js/jquery.js"></script>
<script src="../../public/js/bootstrap.js"></script>
<script src="../../public/js/main.js"></script>
</body>
</html>
