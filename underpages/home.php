<?php

require_once("config/db.php");
require_once("classes/Home.php");

$home = new Home();

include("views/homeloged.php");

