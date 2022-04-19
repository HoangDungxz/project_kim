<?php

// $sql = "INSERT INTO `productimages`(`path`, `product_id`) VALUES ('[value-2]','[value-3]'), ";

// echo rand(5, 15);

// die;

use SRC\helper\Session;

define('WEBROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
define('BASEPATH', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
define('PUBLIC_URL', WEBROOT . "public/assets/");

require(BASEPATH . '/vendor/autoload.php');
session_start();




use MVC\Dispatcher;

$dispatch = new Dispatcher;
$dispatch->dispatch();
