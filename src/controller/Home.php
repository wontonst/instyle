<?php

class Home extends BaseController{

public function get(){
createView('home',array('test'=>'variables works'));
}
public function post(){
echo 'start';
Database::register($_POST['email'],$_POST['password']);
echo 'work?';
}

}

?>
