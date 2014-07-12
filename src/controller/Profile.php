<?php
class Profile extends BaseController{
public function get(){
if($_SESSION['email']) {
$email = $_SESSION['email'];
$name = $_SESSION['name'];
//$images = getImgsForUser()
createView('profile');
}
else {
Redirect::to('/login');
return;
}

}
public function post(){

}
}