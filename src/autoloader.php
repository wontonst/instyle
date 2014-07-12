<?php

spl_autload_register(function($cn){
include(__DIR__.'/view');
});
spl_autload_register(function($cn){
include(__DIR__.'/controller');
});
spl_autload_register(function($cn){
include(__DIR__.'/model');
});

?>