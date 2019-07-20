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
            <li class="nav-item active lead">
                <a class="nav-link" href="/home.php">Home <span class="sr-only">(current)</span></a>
            </li><li class="nav-item active lead">
                <a class="nav-link" href="/Controller/Functions.php?req=user_list">Users list <span class="sr-only">(current)</span></a>
            </li><li class="nav-item active lead">
                <a class="nav-link" href="/Controller/Functions.php?req=receipts">Receipts<span class="sr-only">(current)</span></a>
            <li class="nav-item dropdown lead">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Account</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/views/pages/auth/logout.php">Logout</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="" method="get">
            <input style="transition: width 500ms" required id="field"  onmouseenter="$(this).css('width',600)" onmouseout="$(this).css('width',200)"   class="form-control mr-sm-2"  type="search" name="req" placeholder="Search By Email..." aria-label="Search">
            <button  id="sub" class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search </button>
        </form>
    </div>

</nav>
<?php
if (isset($_GET['message'])) {
    if ($_GET['message'] == 'successd') {
        ?>
        <p  id="message" class="alert alert-success" style="margin-top: 62px">The user privileges has been deny</p>
        <?php
    }
    elseif($_GET['message']=='successg') {
        ?>
        <p id="message" class="alert alert-success " style="margin-top:62px">The user privileges has been granted</p>

        <?php
    }?>
    <?php
}
?>
<h1 class="display-1 text-center mt-5 ">List of All users</h1>
<table class="table table-bordered table-dark m">
    <thead>
    <tr>
        <th scope="col" class="lead">#</th>
        <th scope="col" class="lead">Email</th>

        <th scope="col" class="lead">Billing address</th>
        <th scope="col" class="lead">Delivery address</th>
        <th scope="col" class="lead text-center">Status</th>
        <th scope="col" class="text-center lead">Grant/Deny</th>

    </tr>
    </thead>
    <tbody>
    <?php

    if (!isset($_GET['req']))
    {
        $sql="select * from supjeans.user";
        $a=new Database();
        $req=$a->connexion()->prepare($sql);
        $req->execute();
        while ($item=$req->fetch())
        {?>
            <tr>
                <th scope="row" class="lead"><?php  echo $item['id'] ?></th>
                <?php
                if ($item['email']==$_SESSION['user_data']) {
                    ?>
                    <td class="bg-info"><?php echo $item['email'] ?></td>
                    <?php
                }
                else
                {?>
                    <td><?php echo $item['email'] ?></td>
                    <?php
                }
                ?>

                <td><?php  echo $item['billing_address'] ?></td>
                <td><?php  echo $item['delivery_address'] ?></td>

                <?php
                if ($item['status']=='admin') {
                    ?>
                    <td class="lead text-info text-center"><?php  echo $item['status'] ?></td>
                    <?php
                }
                else
                {
                ?>
                    <td class="lead text-light text-center"><?php  echo $item['status'] ?></td>

                    <?php
                }?>

                <?php
                if ($item['email']==$_SESSION['user_data'])
                {
                    echo '<td class="text-center"><p>No action</p></td>';
                }

                else
                {
                    if ($item['status']=='user') {
                        ?>
                        <td>
                            <a title="grant user" style="margin-left: 50%"
                               href="/Controller/Functions.php?req=grant_user&ref=<?php echo $item['id'] ?>"
                               class="text-success"><i class="fa fa-trophy"></i></a>
                        </td>
                        <?php
                    }
                    else {
                        ?>
                        <td>
                            <a title="deny user" style="margin-left: 50%"
                               href="/Controller/Functions.php?req=deny_user&ref=<?php echo $item['id'] ?>"
                               class="text-warning"><i class="fa fa-ban"></i></a>
                        </td>
                        <?php
                    }
                }

                ?>
            </tr>
            <?php
        }
    }
    else
    {
        $req=$_GET['req'];
        $sql="select * from supjeans.user where email='$req'";
        $a=new Database();
        $req=$a->connexion()->prepare($sql);
        $req->execute();
        while ($item=$req->fetch())
        {?>
            <tr>
                <th scope="row"><?php  echo $item['id'] ?></th>
                <?php
                if ($item['email']==$_SESSION['user_data']) {
                    ?>
                    <td class="bg-info"><?php echo $item['email'] ?></td>
                    <?php
                }
                else
                {?>
                    <td><?php echo $item['email'] ?></td>
                    <?php
                }
                ?>

                <td><?php  echo $item['billing_address'] ?></td>
                <td><?php  echo $item['delivery_address'] ?></td>
                <?php
                if ($item['status']=='admin') {
                    ?>
                    <td class="lead text-info text-center"><?php  echo $item['status'] ?></td>
                    <?php
                }
                else
                {
                    ?>
                    <td class="lead text-light text-center"><?php  echo $item['status'] ?></td>

                    <?php
                }?>

                <?php
                if ($item['email']==$_SESSION['user_data'])
                {
                    echo '<td class="text-center"><p>No action</p></td>';
                }

                else
                {
                    if ($item['status']=='user') {
                        ?>
                        <td>
                            <a title="grant user" style="margin-left: 50%"
                               href="/Controller/Functions.php?req=grant_user&ref=<?php echo $item['id'] ?>"
                               class="text-success"><i class="fa fa-trophy"></i></a>
                        </td>
                        <?php
                    }
                    else {
                        ?>
                        <td>
                            <a title="deny user" style="margin-left: 50%"
                               href="/Controller/Functions.php?req=deny_user&ref=<?php echo $item['id'] ?>"
                               class="text-warning"><i class="fa fa-ban"></i></a>
                        </td>
                        <?php
                    }
                }

                ?>
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
