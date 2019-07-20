<?php
require $_SERVER['DOCUMENT_ROOT'].'/Controller/Authentication.php';
$logout=new Authentication();
$logout->logout();