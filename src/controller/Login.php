<?php
class Login extends BaseController{
public function get(){
if(Account::isLoggedIn()){
Redirect::to('/profile');
}

createView('login');
}
public function post(){
if(Account::isLoggedIn()){
Redirect::to('/profile');
}
$ret = Account::login($_POST['email'],$_POST['password']);
if(!$ret)
echo 'Invalid username/password combo';
else
Redirect::to('/profile');
}
}