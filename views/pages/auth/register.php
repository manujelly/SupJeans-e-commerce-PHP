<?php
require $_SERVER['DOCUMENT_ROOT'].'/Controller/redirectIfAuthenticated.php';
if (isset($_POST['submit']))
{
    require $_SERVER['DOCUMENT_ROOT'].'/Model/User.php';
    require $_SERVER['DOCUMENT_ROOT'].'/Controller/Authentication.php';
    $user=new User();
    $newregister=new Authentication();
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password_confirmation']);
    $newregister->register($user->getEmail(),$user->getPassword(),$_POST['password_confirmation']);
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="../../../public/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../../../public/css/main.css" rel="stylesheet"/>
</head>
<body>
<div class="container">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <?php
    require $_SERVER['DOCUMENT_ROOT'].'/views/partials/nav.php';
    ?>
    </nav>
    <div class="row justify-content-center border mt-5 bg-info">
        <header class="col-lg-12">
            <p class="display-1 text-center text-white">SupJeans Project</p>
        </header>

    </div>

    <div id="form">
        <form action="" method="post">
            <div class="col-6" id="message">
            <?php
            if (isset($_GET['message']))
            {
                switch ($_GET['message']){
                    case 100:
                        echo "<p class='alert alert-danger'>All fields are required</p>";
                    break;
                    case 101:
                        echo "<p class='alert alert-danger'>Email field don't have a email format</p>";
                    break;
                    case 102:
                        echo "<p class='alert alert-danger'>Password field is required</p>";
                    break;
                    case 103:
                        echo "<p class='alert alert-danger'>Password confirmation field is required</p>";
                    break;
                    case 104:
                        echo "<p class='alert alert-danger'>Bad credentials !!</p>";
                    break;
                    case 105:
                        echo "<p class='alert alert-danger'>Password confirmation and password does'nt match</p>";
                    break;
                    case 106:
                        echo "<p class='alert alert-danger'>Email has already taken</p>";
                    break;


                    default:
                        echo "<p class='alert alert-danger'>Error not accepted</p>";
                        break;
                }
            }
            ?>


            </div>
            <div class="form-group col-6">
                <label class="">Email</label>
                <input id="email" name="email" type="email" class="form-control" placeholder="Enter your email here..."/>
            </div>
            <div class="form-group col-6">
                <label class="">Password</label>
                <input id="password" name="password" type="password" class="form-control" placeholder="Enter your password here..."/>
            </div>
            <div class="form-group col-6">
                <label class="">Password confirmation</label>
                <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" placeholder="Confirm your password here.."/>
            </div>
            <div class="col-6 text-center text-info">
                <button id="submit" name="submit" class="btn btn-primary" type="submit">Register</button>
            </div>

        </form>

    </div>


</div>
<div class="text-center">
    <p>SupJeans project-Supinfo International University-Paris</p>
</div>



<script src="../../../public/js/jquery.js"></script>
<script src="../../../public/js/main.js"></script>
<script src="../../../public/js/bootstrap.js"></script>
</body>
</html>