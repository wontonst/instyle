<?php

function createView($name){
include(__DIR__.'/view/'.$name.'.php');
}

//connects to a MYSQL database
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