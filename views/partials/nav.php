
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div  class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand lead" href="/home.php">SUPJEANS</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0" id="item">
        <li class="nav-item active">
            <a class="nav-link lead" href="/home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <?php
        $a=file_get_contents("http://".$_SERVER['HTTP_HOST']."/Model/ApiEndPoint.php");
        $obj=json_decode($a,true);

        foreach ($obj as $d)
        {?>
            <li class="nav-item active">
                <a class="nav-link lead" href="/views/pages/groupby.php?q=<?php echo $d['display'] ?>"><?php echo $d['display']; ?></a>
            </li>
            <?php
        }
        ?>
        <li class="nav-item active lead">
            <?php
            if (isset($_SESSION['mycart']))
            {
                echo "<a id='mycart' href='/Controller/Functions.php?action=mycart' class=' nav-link text-info'>My cart <span class=\"badge badge-light\">".count($_SESSION['mycart'])."</span>
                 <span class=\"sr-only\">unread messages</span></a>";
            }
            else
            {
                echo '<a id="mycart" href="/Controller/Functions.php?action=mycart" class=" nav-link text-info">My cart <span class="badge badge-light">0</span><span class="sr-only">unread messages</span></a>';
            }
            ?>

        </li>
        <?php
        require $_SERVER['DOCUMENT_ROOT'].'\Model\User.php';
        if (isset($_SESSION['user_data']))
        {
            $a=new User();
            if ($a->getRole()=="admin")
            {?>
                <li class="nav-item active lead">
                    <a class="nav-link" href="/views/pages/admin/user_list.php">Admin</a>
                </li>
                <?php
            }
            ?>
            <li class="nav-item dropdown lead">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">MyAccount</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="/views/pages/recent_orders.php">Recent orders</a>
                <a class="dropdown-item" href="/views/pages/auth/logout.php">Logout</a>
            </div>
            </li>
        <?php
        }
        else
        {?>
        <li class="nav-item dropdown lead">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Account</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="/views/pages/auth/login.php">Login</a>
                <a class="dropdown-item" href="/views/pages/auth/register.php">Register</a>
            </div>
        </li>
        <?php
        }
        ?>
    </ul>

    <form class="form-inline my-2 my-lg-0 " action="/views/pages/result_search.php" method="get">
        <input style="transition: width 500ms" required id="field" onmouseenter="$(this).css('width',600)" onmouseout="$(this).css('width',200)"   class="form-control mr-sm-2"  type="search" name="req" placeholder="Search here..." aria-label="Search">
        <button id="sub" class="btn btn-outline-info my-2 my-sm-0" type="submit">Search </button>
    </form>
</div>
