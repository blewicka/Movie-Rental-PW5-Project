<?php

require_once("config/db.php");

require_once("classes/Myborrow.php");

$user = $_SESSION['user_name'];

$myborrow = new Myborrow($user, $_GET['status']);

if (isset($_SESSION['user_name'])) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    include("views/myborrow.php");

} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    echo 'You need to login!';
}


