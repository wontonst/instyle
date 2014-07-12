<?php

class Redirect{

public static function to($url){
header('Location: http://'.$_SERVER['SERVER_NAME'].$url);
}

}

?>