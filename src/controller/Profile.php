<?php
class Profile extends BaseController{
public function get(){
$_SESSION['email'] = 'a@a.a';
if($_SESSION['email']) {
$email = $_SESSION['email'];
$name = $_SESSION['name'];
$imgs = ImageManager::getImg();
createView('profile',array('imgs'=>$imgs));

}
else {
Redirect::to('/login');
return;
}

}
public function post(){

}
}