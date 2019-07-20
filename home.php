<?php
session_start();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="public/css/main.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <?php
    require $_SERVER['DOCUMENT_ROOT'].'/views/partials/nav.php'
    ?>
</nav>

<?php
if (isset($_GET['message']) && !empty($_GET['message'])) {
    switch ($_GET['message'])
    {
        case 'resetcart':
            echo "<p id='message' class='alert alert-success ml-3 mr-3' style='margin-top: 80px'>Your cart is now empty ;)</p>";
            break;
        case 'warning':
            echo "<p id='message' class='alert alert-danger ml-3 mr-3' style='margin-top: 80px'>Access denied :(</p>";
            break;
        default:
            echo "";
    }
}
?>

<div class="border ml-3 mr-3 bg-info" style="margin-top: 20px">

    <h1 class="display-1 text-center mt-5 text-white " id="bTitle">
        Welcome to SupJeans
    </h1>
    <p class="text-center text-white lead">Supinfo International University Project</p>
</div>

<div class="container">
    <div>
        <h3 class="display-3">For Men</h3>
    </div>
    <div class="row">
        <div class="card-group">

            <?php
            foreach ($obj[0]['data'] as $item)
            {
                ?>
                <div class="card">
                    <img src="public/images/<?php echo $item['products'][0]['img'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <button class="btn btn-info" onclick="AddToCart('<?php echo $item['products'][0]['product_name'];?>','<?php echo $item['products'][0]['price'] ?>','<?php echo $item['products'][0]['id'];?>','<?php echo $item['products'][0]['img'];?>')"><i class="fa fa-cart-plus"></i>Add to cart</button>
                        <h5 class="card-title "><a class="text-primary text-decoration-none lead" href="/views/pages/single_page.php?q=<?php echo $item['products'][0]['id']?>"><?php echo $item['products'][0]['product_name'];?></a></h5>
                        <p class="card-text lead">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <p class="display-4"><?php echo $item['products'][0]['price'].$item['products'][0]['devise'];?></p>

                    </div>
                </div>
                <?php
            }
            ?>


        </div>
    </div>
    <div>
        <h3 class="display-3">For Women</h3>
    </div>
    <div class="row">

        <div class="card-group">
            <?php
            foreach ($obj[1]['data'] as $item)
            {
                ?>
                <div class="card">
                    <img src="public/images/<?php echo $item['products'][0]['img'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <button class="btn btn-info" onclick="AddToCart('<?php echo $item['products'][0]['product_name'];?>','<?php echo $item['products'][0]['price'] ?>','<?php echo $item['products'][0]['id'];?>','<?php echo $item['products'][0]['img'];?>')"><i class="fa fa-cart-plus"></i>Add to cart</button>
                        <h5 class="card-title "><a class="text-primary text-decoration-none lead" href="/views/pages/single_page.php?q=<?php echo $item['products'][0]['id']?>"><?php echo $item['products'][0]['product_name'];?></a></h5>
                        <p class="card-text lead">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <p class="display-4"><?php echo $item['products'][0]['price'].$item['products'][0]['devise'];?></p>

                    </div>
                </div>
                <?php
            }
            ?>


        </div>
    </div>
    <div>
        <h3 class="display-3">For Kids</h3>
    </div>
    <div class="row">

        <div class="card-group">

            <?php
            foreach ($obj[2]['data'] as $item)
            {
                ?>
                <div class="card">
                    <img src="public/images/<?php echo $item['products'][0]['img']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <button class="btn btn-info" onclick="AddToCart('<?php echo $item['products'][0]['product_name'];?>','<?php echo $item['products'][0]['price'] ?>','<?php echo $item['products'][0]['id'];?>','<?php echo $item['products'][0]['img'];?>')"><i class="fa fa-cart-plus"></i>Add to cart</button>
                        <h5 class="card-title "><a class="text-primary text-decoration-none lead" href="/views/pages/single_page.php?q=<?php echo $item['products'][0]['id']?>"><?php echo $item['products'][0]['product_name'];?></a></h5>
                        <p class="card-text lead">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <p class="display-4"><?php echo $item['products'][0]['price'].$item['products'][0]['devise'];?></p>

                    </div>
                </div>
                <?php
            }
            ?>

        </div>
    </div>

</div>





<script src="public/js/jquery.js"></script>
<script src="public/js/bootstrap.js"></script>
<script src="public/js/main.js"></script>
</body>
</html>
