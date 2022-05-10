<?php


define('WEBROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
define('BASEPATH', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
define('PUBLIC_URL', WEBROOT . "public/assets/");

define('URL', $_SERVER['REQUEST_URI']);


// $imgs = [];
// $count = 1;
// foreach (array_filter(glob(ROOT . 'public/assets/upload/products/*'), 'is_file') as $file) {

//     if (strpos($file, 'default-product-image.png')) {
//         continue;
//     }

//     $newName = "C:/xampp/htdocs/project_kim/public/assets/upload/products/";
//     $newName = str_replace($newName, '', $file);
//     // rename($file, $newName);
//     array_push($imgs, $newName);

//     // $count++;
// };

// $sql = "INSERT INTO `productimages`(`path`, `product_id`, `deleted`) VALUES ";

// for ($i = 1; $i <= 502; $i++) {
//     $imgs_copy = [...$imgs];

//     for ($j = 1; $j < random_int(4, 7); $j++) {
//         $pos = array_rand($imgs_copy);
//         $path = $imgs_copy[$pos];
//         unset($imgs_copy[$pos]);

//         $sql .= "('$path','$i',0),";
//     }
// }

// echo ($sql);



// die;


require(BASEPATH . '/vendor/autoload.php');
session_start();

use MVC\Dispatcher;

$dispatch = new Dispatcher;
$dispatch->dispatch();
