<?php

class Home extends BaseController{

public function get(){
createView('home',array('test'=>'variables works'));
}
public function post(){
echo 'I AM POSTING YAAAAAAAAAAAAAAAAA';
}

}

?>
