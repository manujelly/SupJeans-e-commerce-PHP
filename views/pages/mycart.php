<?php
session_start();

//session destroy after 24h
if (isset($_SESSION['timeout']))
{
    if (time()>$_SESSION['timeout']+86400)
    {
        $_SESSION['mycart']=null;
        $_SESSION['timeout']=null;
    }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../public/css/main.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <?php
    require $_SERVER['DOCUMENT_ROOT'].'/views/partials/nav.php'
    ?>
</nav>
<?php
if (isset($_GET['message']))
{
    if ($_GET['message']=='success')
    {
        echo "<p id='message' class='alert alert-success'>Alright !! now you can submit to payment</p>";
    }
}
?>
<?php

if (isset($_SESSION['mycart']) && !empty($_SESSION['mycart']))


{
    $total=0;
    foreach ($_SESSION['mycart'] as $d)
    {
        $total=$total+$d['price'];
    }
?>
    <div class="card mx-auto mt-5" style="width: 18rem;">
        <div class="card-body">
            <p class="card-text lead">Total: <?php echo $total.'$'?></p>
        </div>
    </div>
    <?php
    if (!isset($_SESSION['user_data'])) {
        ?>

        <p class="alert alert-info">
            Connect to complete your order</p>
        <?php
    }?>
    <?php
    foreach ($_SESSION['mycart'] as $item) {

        ?>

        <div class="card mt-5 ml-5 mx-auto" style="max-width: 900px;">


        <div class="row no-gutters">

            <div class="col-md-6">
                <img src="../../public/images/<?php echo $item['img'] ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <a title="remove this item" href="/Controller/Functions.php?action=removeitem&ref=<?php echo $item['product_name']?>"><i class="fa fa-window-close text-danger"></i></a>

                    <h5 class="card-title text-primary lead"><?php echo $item['product_name'] ?></h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    <p class="card-text mt-5">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </p>
                    <p class="display-3"><?php echo $item['price'] . '$' ?></p>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <?php


    if (isset($_SESSION['user_data']))
    {
        $a=new Database();
        $sql="select * from user where email='".$_SESSION['user_data']."'";
        $c=$a->connexion()->prepare($sql);
        $c->execute();
        $d=$c->fetch();
        if (!empty($d['billing_address']) && !empty($d['delivery_address'])) {
            ?>
            <a class="btn btn-primary" href="/Controller/Functions.php?action=payement">Proceed to payement</a>
            <?php
        }
        else {
            ?>

            <a class="btn btn-primary" href="/Controller/Functions.php?action=addinfo">Proceed to payement</a>
            <?php
        }
        ?>
        &nbsp;
    <?php
    }?>

    <a href="../../Controller/Functions.php?action=cartempty" class="btn btn-danger">Reset All items in my cart</a></button>


</div>
<?php
}
else
{?>
    <h1 class="display-1 text-center mt-5">Your cart is empty</h1>
    <p class="text-center lead">
        <a href="../../home.php"  class="text-decoration-none text-info">GO TO HOME</a>
    </p>
    <?php
}
?>
<script src="../../public/js/jquery.js"></script>
<script src="../../public/js/bootstrap.js"></script>
<script src="../../public/js/main.js"></script>
</body>
</html>
