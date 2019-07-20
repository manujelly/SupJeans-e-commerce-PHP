<?php
require $_SERVER['DOCUMENT_ROOT'].'/Controller/redirectIfAuthenticated.php';

if (isset($_POST['submit']))
{
    require $_SERVER['DOCUMENT_ROOT'].'/Model/User.php';
    require $_SERVER['DOCUMENT_ROOT'].'/Controller/Authentication.php';
    $log=new Authentication();
    $log->Login($_POST['email'],$_POST['password']);
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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
    <div id="form" class="mt-5" >
        <form action="" method="post">
            <div class="col-6" id="message">

            </div>
            <div class="form-group col-6">
                <?php
                if (isset($_GET['message']))
                {
                    switch ($_GET['message'])
                    {
                        case 106:
                            echo '<p class="alert alert-danger">Email does\'nt exists</p>';
                            break;
                        case 108:
                            echo '<p class="alert alert-danger">Bad credentials</p>';
                            break;
                        case 'success':
                        echo '<p class="alert alert-success">Success !!</p>';
                        break;
                    }
                }
                ?>
                <label class="">Email</label>
                <input id="email" name="email" type="email" class="form-control" placeholder="Enter your email here..." required/>
            </div>
            <div class="form-group col-6">
                <label class="">Password</label>
                <input id="password" name="password" type="password" class="form-control" placeholder="Enter your password here..." required/>
            </div>
            <div class="col-6 text-center">
                <button class="btn btn-info" name="submit" type="submit">Login</button>
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