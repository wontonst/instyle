<?php

class Logout{

public function get(){
Account::logout();
Redirect::to('/');
}
public function post(){

}
}

?>