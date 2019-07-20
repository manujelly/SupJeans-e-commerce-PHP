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
    <title>Home</title>
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../public/css/main.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <?php
    require $_SERVER['DOCUMENT_ROOT'].'/views/partials/nav.php'
    ?>
</nav>

<form  style="margin-top: 12%" action="/Controller/Functions.php?action=update" method="post">
    <h1 class="display-1 text-center">
        To finalize your order we need some information</h1>
    <div class="form-group col-6 mx-auto">
        <label for="formGroupExampleInput">Billing address</label>
        <input type="text" class="form-control" name="b_address" id="formGroupExampleInput" placeholder="Billing address" required>
    </div>
    <div class="form-group col-6 mx-auto">
        <label for="formGroupExampleInput2">Delivery address</label>
        <input type="text" class="form-control" name="d_address" id="formGroupExampleInput2" placeholder="Delivery address" required>
    </div>
    <button class="btn btn-primary" type="submit" name="submit"  style="margin-left: 45%">Proceed to payement</button>
</form>
</body>
<script src="../../public/js/jquery.js"></script>
<script src="../../public/js/bootstrap.js"></script>
<script src="../../public/js/main.js"></script>
</html>