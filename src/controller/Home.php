<?php

class Home extends BaseController{

public function get(){
createView('home',array('test'=>'variables works'));
}
public function post(){
Database::register($_POST['email'],$_POST['password']);
echo 'work?';
}

}

?>
