<?php
class Login extends BaseController{
public function get(){
if(Database::isLoggedIn()){
Redirect::to('/profile');
}

createView('login');
}
public function post(){
if(Database::isLoggedIn()){
Redirect::to('/profile');
}
echo 'Invalid username/password combo';
}
}