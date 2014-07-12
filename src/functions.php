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
  if($_GLOBAL['connection'])
  {
    return $_GLOBAL['connection'];
  }
  $dbhost = $_GLOBAL["dbhost"];
  $dbuser = $_GLOBAL["dbusr"];
  $dbpass = $_GLOBAL["dbpwd"];
  $_GLOBAL['connection'] = mysql_connect($dbhost, $dbuser, $dbpass);
  if(!$conn)
  {
    die('Could not connect: ' . mysql_error());
  }
  mysql_select_db($_GLOBAL["dbtable"]);
  return $_GLOBAL['connection'];
}

?>