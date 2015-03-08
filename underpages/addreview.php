<?php

require_once("config/db.php");
//require_once("classes/Home.php");

//$home = new Home();

require_once("classes/Film.php");
require_once("classes/Addreview.php");

$Film = new Film($_GET['id']);
$Review = new Review($_SESSION['user_name'], $Film->tittle, $_GET['id']);


if (isset($_SESSION['user_name'])){
	if($Review->checkuser()) {
		include("views/addreview.php");
	} else {
		echo 'You already have add an review';
	}
	
} else {
	echo 'You need to login!';
}


