<?php

require_once("config/db.php");

require_once("classes/Allorders.php");

$user = $_SESSION['user_name'];

$allorders = new Allorders($_GET['nrsite']);

if ($user == "admin") {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    include("views/allorders.php");

} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    include("views/accessdenided.php");
}


