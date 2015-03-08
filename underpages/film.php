<?php

require_once("config/db.php");

require_once("classes/Film.php");

$user = $_SESSION['user_name'];

$Film = new Film($_GET['id']);

$Film->getreviewsfromsql();

if ($user == "admin") {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    include("views/film.php");

} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    include("views/film.php");
}


