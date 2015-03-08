<?php

require_once("config/db.php");
require_once("classes/Allfilms.php");


$allfilms = new Allfilms($_GET['nrsite']);

include("views/allfilms.php");

