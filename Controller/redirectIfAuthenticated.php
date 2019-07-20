<?php
session_start();
if (isset($_SESSION['user_data']))
{
    if (!empty($_SESSION['user_data']))
    {
        header('location:/home.php');
    }
    else
    {
        header('location:../views/auth/logout.php');
    }
}