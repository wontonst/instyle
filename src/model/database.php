<?php
/**
@param myId id of the user requesting. do NOT return the user's own picture :D
@returns an array in this fashion
array(
[0]=>array(
[name]=>'string with name of the user'.
[url]=>array(
'string of the image',
'...',
)
[up]=>int number of up votes
),
);
*/
function getImg($myId=-1){

}
/**
Maximum of 8 pictures per user. (dont use magic numebr set it in config.php and use $_GLOBAL
@param user adding the image, the image itself is passed from the form. Communicate with Nicole on what the $_GET is
*/
function addImg($myId){

}
/**
@param id the id of the img to drop
*/
function dropImg($id){

}
/**
@param id the id of the image to rate up
*/
function rateUp($id){

}
function register($email,$pwd){
  $connect = init_db();
  $table = "users";
  $select = "SELECT * from $table where email='$email'";
  $result = mysql_query($select, $connect) or die(mysql_error());
  if(!$result) {
    die('Connection failed.');
  }
  else {
    if($result->num_rows > 0) {
      redirect_and_die();
    }
    else {
        $sql = "INSERT INTO users ".
         "(email,password) ".
         "VALUES ('$email', '$password')";
        $retval = mysql_query( $sql, $connect );
        if(! $retval )
        {
          die('Could not enter data: ' . mysql_error());
        }
    }
  }

}
function login($email,$pwd){


}
/**
@returns false if no one is logged in, else return array with user id and list of user images/ups
*/
function isLoggedIn(){

}

?>