<?php

require_once("config/db.php");
//require_once("classes/Home.php");

//$home = new Home();

require_once("classes/Film.php");
require_once("classes/Borrow.php");

$Film = new Film($_GET['id']);
$Borrow = new Borrow($Film->film_id, $Film->tittle ,$_SESSION['user_name']);


if (isset($_SESSION['user_name'])){
	if($Borrow->checkuseralreadyborrowed()) {
		echo 'You already have borrowed this film';
	} else {
		include("views/borrow.php");
	}
	//if($Review->checkuser()) {
		
		//include("views/borrow.php");
	//} else {
	//	echo 'You already have add an review';
	//}
	
} else {
	echo 'You need to login!';
	include("underpages/register.php");
}


