<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/Model/User.php';
$a=new User();
if ((string)$a->getRole()!='admin')
{
    header('location:/home.php?message=warning');
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin interface</title>
    <link rel="stylesheet" href="../../../public/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../../public/css/main.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand lead" href="#">SUPJEANS</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link lead" href="/home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active lead">
                <a class="nav-link" href="/Controller/Functions.php?req=user_list">Users list <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active lead">
                <a class="nav-link" href="/Controller/Functions.php?req=receipts">Receipts<span class="sr-only">(current)</span></a>

            <li class="nav-item dropdown lead">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Account</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/views/pages/auth/logout.php">Logout</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="" method="get">
            <input style="transition: width 500ms" required id="field"  onmouseenter="$(this).css('width',600)" onmouseout="$(this).css('width',200)"   class="form-control mr-sm-2"  type="search" name="req" placeholder="Search By reference.." aria-label="Search">
            <button  id="sub" class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search </button>
        </form>
    </div>

</nav>
<h1 class="display-1 text-center mt-5">List of All receipts</h1>
<table class="table table-bordered table-info m">
    <thead>
    <tr class="bg-dark text-white">
        <th scope="col" class="lead">#</th>
        <th scope="col" class="lead">Receipt ref</th>
        <th scope="col" class="lead">Product name</th>
        <th scope="col" class="lead">Price</th>
        <th scope="col" class="lead">User</th>
        <th scope="col" class="lead">Billing address</th>
        <th scope="col" class="lead">Delivery address</th>
        <th scope="col" class="lead">Generate receipts</th>
    </tr>
    </thead>
    <tbody>
    <?php

    if (!isset($_GET['req']))
    {
        $sql="select * from products";
        $a=new Database();
        $req=$a->connexion()->prepare($sql);
        $req->execute();
        while ($item=$req->fetch())
        {?>
            <tr >
                <th scope="row" class="lead"><?php  echo $item['id'] ?></th>
                <th class="lead"><?php  echo $item['receipt_ref'] ?></th>
                <td><?php  echo $item['product_name'] ?></td>
                <td class="lead"><?php  echo $item['price'].'$' ?></td>
                <td><?php  echo $item['user'] ?></td>
                <td><?php  echo $item['billing_address'] ?></td>
                <td><?php  echo $item['delivery_address'] ?></td>
                <td>
                    <a  href="/Controller/Functions.php?req=view_receipt&ref=<?php  echo $item['id'] ?>" class="text-dark" style="margin-left: 50%" title="view receipt"><i class="fa fa-print"></i></a>
                </td>
            </tr>
            <?php
        }
    }
    else
    {
        $req=$_GET['req'];
        $sql="select * from products where products.receipt_ref='$req'";
        $a=new Database();
        $req=$a->connexion()->prepare($sql);
        $req->execute();
        while ($item=$req->fetch())
        {?>
            <tr >
                <th scope="row" class="lead"><?php  echo $item['id'] ?></th>
                <th class="lead"><?php  echo $item['receipt_ref'] ?></th>
                <td><?php  echo $item['product_name'] ?></td>
                <td class="lead"><?php  echo $item['price'].'$' ?></td>
                <td><?php  echo $item['user'] ?></td>
                <td><?php  echo $item['billing_address'] ?></td>
                <td><?php  echo $item['delivery_address'] ?></td>
                <td>
                    <a  href="/Controller/Functions.php?req=view_receipt&ref=<?php  echo $item['id'] ?>" class="text-info" style="margin-left: 50%" title="view receipt"><i class="fa fa-eye"></i></a>
                </td>
            </tr>
            <?php
        }

    }


    ?>

    </tbody>
</table>
<script src="../../../public/js/jquery.js"></script>
<script src="../../../public/js/bootstrap.js"></script>
<script src="../../../public/js/main.js"></script>
</body>
</html>