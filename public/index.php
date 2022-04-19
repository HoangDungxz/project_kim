<?php

// $test = 1;
// a($test);


// function a($x)
// {
//     $trace = debug_backtrace();
//     $file = file($trace[0]['file']);
//     $line = $file[$trace[0]['line'] - 1];

//     var_dump($line); // Prints "a($test);" Do the Stringparsing and your done

// }

define('WEBROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
define('BASEPATH', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
define('PUBLIC_URL', WEBROOT . "public/assets/");

require(BASEPATH . '/vendor/autoload.php');
session_start();




use MVC\Dispatcher;

$dispatch = new Dispatcher;
$dispatch->dispatch();
