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
function init_db() {
  if(isset($GLOBALS['config']['connection']))
  {
    return $GLOBALS['config']['connection'];
  }
  $dbhost = $GLOBALS['config']["dbhost"];
  $dbuser = $GLOBALS['config']["dbusr"];
  $dbpass = $GLOBALS['config']["dbpwd"];
  $GLOBALS['config']['connection'] = mysqli_connect($GLOBALS['config']['dbhost'], $GLOBALS['config']['dbusr'], $GLOBALS['config']['dbpwd']);
  if(!$GLOBALS['config']['connection'])
  {
    die('Could not connect to database: ' . mysqli_error($GLOBALS['config']['connection']));
  }
  mysqli_select_db($GLOBALS['config']['connection'],$GLOBALS['config']['dbname']);
  return $GLOBALS['config']['connection'];
}
function close_db(){
unset($GLOBALS['config']['connection']);
}
?>