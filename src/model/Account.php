<?php
class Account{

function register($email,$pwd){
  $connect = init_db();
  $select = "SELECT * from users where email='$email'";
  $result = mysqli_query($connect,$select) or die(mysqli_error($connect));
  if(!$result) {
    $GLOBALS['error']='mySQL Connection failed on Database.php:'.__LINE__;
return false;
  }
  if($result->num_rows > 0) {
$GLOBALS['error'] = 'Email already taken';
return false;
  }
  else {
        $sql = "INSERT INTO users ".
         "(email,password) ".
         "VALUES ('$email', '$pwd')";
        $retval = mysqli_query($connect, $sql );
        if(! $retval )
        {
          $GLOBALS['error']='Could not register user: ' . mysqli_error($GLOBALS['config']['connection']);
return false;
        }
return true;
    }
}
function login($email,$pwd){
  echo 'hi';
  $connect = init_db();
  $table="users";
  $select = "SELECT id,password from users where email='$email'";
  $result = mysqli_query($select, $connect) or die(mysqli_error());
  if(!$result) {
    die('Connection failed.');
  }
  else {
    if($result->num_rows > 0) {
      redirect_and_die();
    }
    else {
      $password = mysqli_result($result, 1);
      if($password === $pwd) {
        session_start();
        echo "$HI";
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $id;
      }
    }
  }
}
function isLoggedIn(){
  if(!isset($_SESSION['email']) || !$_SESSION['email']) {
    return false;
  }
  else {
    return true;
  }
}
}
?>
