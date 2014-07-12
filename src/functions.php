<?php

function createView($name,$variables=null){
if($variables)
foreach($variables as $k => $v){
$$k = $v;
}
include(__DIR__.'/view/'.$name.'.php');
}
function createPartial($name,$variables=null){
if($variables)
foreach($variables as $k => $v){
$$k = $v;
}
include(__DIR__.'/view/'.$name.'.php');
}
?>