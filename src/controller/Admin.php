<?php
class Admin extends BaseController{
public function get(){
$_SESSION['email'] = 'a@a.a';
if($_SESSION['email']) {
$email = $_SESSION['email'];
$name = $_SESSION['name'];
//$images = getImgsForUser()
createView('admin');
}
else {
  header("Location: login");
  die();
}

}
public function post(){

}
}