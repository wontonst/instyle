<?php

class Home extends BaseController{

public function get(){
createView('home',array('test'=>'variables works'));
}
public function post(){
echo 'start';
echo $_POST['email'].$_POST['password'];
$stat=Account::register($_POST['email'],$_POST['password']);
if(!$stat){
echo $GLOBALS['error'];
return;
}else{
Redirect::to('/login');
}
echo 'end';
}

}

?>
