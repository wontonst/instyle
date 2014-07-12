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
  if($GLOBALS['config']['connection'])
  {
    return $GLOBALS['config']['connection'];
  }
  $dbhost = $GLOBALS['config']["dbhost"];
  $dbuser = $GLOBALS['config']["dbusr"];
  $dbpass = $GLOBALS['config']["dbpwd"];
  $GLOBAL['connection'] = mysqli_connect($GLOBAL['config']['dbhost'], $GLOBALS['config']['dbuser'], $GLOBALS['config']['dbpass']);
  if(!$conn)
  {
    die('Could not connect: ' . mysqli_error());
  }
  mysqli_select_db($GLOBALS['config']['connection'],$GLOBAL['config']['dbname']);
  return $GLOBALS['config']['connection'];
}

?>