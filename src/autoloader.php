<?php

//spl_autoload_register(function($cn){
//include(__DIR__.'/view/'.$cn.'.php');
//});
spl_autoload_register(function($cn){
include(__DIR__.'/controller/'.$cn.'.php');
});
spl_autoload_register(function($cn){
include(__DIR__.'/model/'.$cn.'.php');
});
spl_autoload_register(function($cn){
include(__DIR__.'/kitters/'.$cn.'.php');
});

?>