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
  if($GLOBALS['connection'])
  {
    return $GLOBALS['connection'];
  }
  $dbhost = $GLOBALS["dbhost"];
  $dbuser = $GLOBALS["dbusr"];
  $dbpass = $GLOBALS["dbpwd"];
  var_dump($GLOBALS['dbhost']);
  $GLOBALS['connection'] = mysqli_connect($dbhost, $dbuser, $dbpass, $_GLOBAL['db']);
  if(!$conn)
  {
    die('Could not connect: ' . mysql_error());
  }
  return $GLOBALS['connection'];
}

?>