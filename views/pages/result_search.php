<?php
session_start();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Single Page</title>
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

if (isset($_GET['req'])) {
    if (!empty($_GET['req'])) {
        require $_SERVER['DOCUMENT_ROOT'].'/Controller/Find.php';
        $a = new Find();
        $a->setQuery($_GET['req']);

        if ($a->findByName() != null) {
            ?>
            <div class="card mt-5 ml-5 mx-auto" style="max-width: 900px;">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <img src="../../public/images/<?php echo $a->findByName()['img'];?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title lead  text-primary"><?php echo $a->findByName()['product_name']?></h5>
                            <p class="card-text lead">This is a wider card with supporting text below as a natural
                                lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text mt-5">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                            <p class="display-3"><?php echo $a->findByName()['price'].'$'?></p>
                            <button class="btn btn-info" onclick="AddToCart('<?php echo $a->findByName()['product_name']?>','<?php echo $a->findByName()['price']?>','<?php echo $a->findByName()['id']?>','<?php echo $a->findByName()['img']?>')">Add to cart</button>
                        </div>

                    </div>
                </div>
            </div>
            <?php
        }
        else
        {
            echo '<h1 class="display-1 mt-5 text-center text-danger">Sorry... Product not found :(</h1>';

        }
    }
}
?>


<script src="../../public/js/jquery.js"></script>
<script src="../../public/js/bootstrap.js"></script>
<script src="../../public/js/main.js"></script>
</body>
</html>
