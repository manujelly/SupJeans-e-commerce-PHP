<?php
session_start();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>For <?php echo $_GET['q']?></title>
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
<div>
    <h3 class="display-3 mx-auto"><?php $a='' ?></h3>
</div>
<?php
    if (isset($_GET['q']))
    {
        switch ($_GET['q'])
        {
            case 'Men':
                echo "<h1 class='display-1 text-center mt-5'>All For Men</h1>";
                break;
            case 'Women':
            echo "<h1 class='display-1 text-center mt-5'>All For Women</h1>";
            break;
            case 'Kids':
            echo "<h1 class='display-1 text-center mt-5'>All For Kids</h1>";
            break;
            default:
                header('location:/home.php');
        }
    }
?>
<div class="row">

    <div class="card-group">
        <div class="row mx-auto">

             <?php

             if (isset($_GET['q']))
             {
                 switch ($_GET['q'])
                 {
                     case 'Men':
                         $data=file_get_contents("http://".$_SERVER['HTTP_HOST']."/Model/ApiEndPoint.php?req=men_data");
                         $q=json_decode($data,true);
                         foreach($q as $item=>$key)
                     {
                         foreach ($key['products'] as $t) {
                             ?>
                             <div class="col-sm-4">
                                 <div class="card ml-4">
                                     <img src="../../public/images/<?php echo $t['img'];?>" class="card-img-top" alt="...">
                                     <div class="card">
                                         <div class="card-body">
                                             <button class="btn btn-info" onclick="AddToCart('<?php echo $t['product_name'];?>','<?php echo $t['price'] ?>','<?php echo $t['id'];?>','<?php echo $t['img'];?>')"><i class="fa fa-cart-plus"></i>Add to cart</button>
                                             <h5 class="card-title"><a class="lead text-decoration-none text-primary" href="/views/pages/single_page.php?q=<?php echo $t['id'];?>"><?php echo $t['product_name'];?></a></h5>
                                             <p class="card-text lead">This is a wider card with supporting text below as a natural lead-in to
                                                 additional content. This content is a little bit longer.</p>
                                             <p class="display-4"><?php echo $t['price'].$t['devise'];?></p>

                                         </div>
                                     </div>
                                 </div>
                             </div>

                             <?php
                         }
                         ?>
                         <?php
                     }
                         break;
                     case 'Women':
                         $data=file_get_contents("http://".$_SERVER['HTTP_HOST']."/Model/ApiEndPoint.php?req=women_data");
                         $q=json_decode($data,true);
                         foreach($q as $item=>$key)
                         {

                             foreach ($key['products'] as $t) {
                                 ?>
                                 <div class="col-sm-4">
                                     <div class="card ml-4">
                                         <img src="../../public/images/<?php echo $t['img'];?>" class="card-img-top" alt="...">
                                         <div class="card">
                                             <div class="card-body">
                                                 <button class="btn btn-info" onclick="AddToCart('<?php echo $t['product_name'];?>','<?php echo $t['price'] ?>','<?php echo $t['id'];?>','<?php echo $t['img'];?>')"><i class="fa fa-cart-plus"></i>Add to cart</button>
                                                 <h5 class="card-title"><a class="lead text-decoration-none text-primary" href="/views/pages/single_page.php?q=<?php echo $t['id'];?>"><?php echo $t['product_name'];?></a></h5>
                                                 <p class="card-text lead">This is a wider card with supporting text below as a natural lead-in to
                                                     additional content. This content is a little bit longer.</p>
                                                 <p class="display-4"><?php echo $t['price'].$t['devise'];?></p>

                                             </div>
                                         </div>
                                     </div>
                                 </div>

                                 <?php
                             }
                             ?>
                             <?php
                         }
                         break;
                     case 'Kids':
                         $data=file_get_contents("http://".$_SERVER['HTTP_HOST']."/Model/ApiEndPoint.php?req=kids_data");
                         $q=json_decode($data,true);

                         foreach($q as $item=>$key)
                         {
                             foreach ($key['products'] as $t) {
                                 ?>
                                 <div class="col-sm-4">
                                     <div class="card ml-4">
                                         <img src="../../public/images/<?php echo $t['img'];?>" class="card-img-top" alt="...">
                                         <div class="card">
                                             <div class="card-body">
                                                 <button class="btn btn-info" onclick="AddToCart('<?php echo $t['product_name'];?>','<?php echo $t['price'] ?>','<?php echo $t['id'];?>','<?php echo $t['img'];?>')"><i class="fa fa-cart-plus"></i>Add to cart</button>
                                                 <h5 class="card-title"><a class="lead text-decoration-none text-primary" href="/views/pages/single_page.php?q=<?php echo $t['id'];?>"><?php echo $t['product_name'];?></a></h5>
                                                 <p class="card-text lead">This is a wider card with supporting text below as a natural lead-in to
                                                     additional content. This content is a little bit longer.</p>
                                                 <p class="display-4"><?php echo $t['price'].$t['devise'];?></p>

                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <?php
                             }
                             ?>
                             <?php
                         }
                         break;
                     default:
                         echo '<h1 class="display-3 ml-3 text-danger">Warning. A link is not accepted :(</h1>';
                         break;
                 }
             }

        ?>
        </div>


    </div>
</div>
<script src="../../public/js/jquery.js"></script>
<script src="../../public/js/bootstrap.js"></script>
<script src="../../public/js/main.js"></script>
</body>
</html>