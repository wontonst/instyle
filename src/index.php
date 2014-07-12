<?php
require_once(__DIR__'/function.php');
require_once(__DIR__.'/config.php');
require_once(__DIR__.'/autoloader.php');
// handle routing
$url = $_SERVER['REQUIRE_URI'];
if($url == '/')
$url='/home';
$path = explode('/',$url);
$controller = new ReflectionClass(ucfirst($path[0]));

$controller->make();

?>

