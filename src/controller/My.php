<?php

class My{

public function get(){
$myimg = ImageManager::getMyImg($_SESSION['id']);
var_dump($myimg);
return createView('my',array('imgs'=>$myimg));
}
public function post(){
var_dump($_SESSION);
echo ImageManager::addImg($_SESSION['id']);
//return createView('my');

}
}

?>