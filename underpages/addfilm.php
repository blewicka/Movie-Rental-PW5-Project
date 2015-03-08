<?php

require_once("config/db.php");

require_once("classes/Addfilm.php");

$user = $_SESSION['user_name'];

$addfilm = new Addfilm();

if ($user == "admin") {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    include("views/addfilm.php");

} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    include("views/accessdenided.php");
}


