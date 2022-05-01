<?php


define('WEBROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
define('BASEPATH', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
define('PUBLIC_URL', WEBROOT . "public/assets/");

define('URL', $_SERVER['REQUEST_URI']);


require(BASEPATH . '/vendor/autoload.php');
session_start();




use MVC\Dispatcher;

$dispatch = new Dispatcher;
$dispatch->dispatch();
