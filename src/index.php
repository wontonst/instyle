<?php
require_once(__DIR__.'/config.php');
require_once(__DIR__.'/functions.php');
require_once(__DIR__.'/autoloader.php');
session_start();
// handle routing
$url = $_SERVER['REQUEST_URI'];
if($url == '/')
$url='/home';
$path = explode('/',$url);
$classname=ucfirst($path[1]);
$controller = new $classname();

switch($_SERVER['REQUEST_METHOD']){
case 'GET';
$controller->get();
break;
case 'POST':
$controller->post();
break;
}

?>

