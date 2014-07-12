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
  $connect = init_db();
  $table="users";
  $select = "SELECT * from users where email='$email' and password='$pwd'";
  $result = mysqli_query($connect,$select);
  if(!$result) {
    $GLOBALS['error']='Connection failed.'.$mysqli_error($connect);
return false;
  }
  else {
$data=       mysqli_fetch_assoc($result);
        $_SESSION['email'] = $data['email'];
        $_SESSION['id'] = $data['id'];
return true;
    }
  }

public function isLoggedIn(){
  if(!isset($_SESSION['email']) || !$_SESSION['email']) {
    return false;
  }
  else {
    return true;
  }
}
public function logout(){
unset($_SESSION['email']);
unset($_SESSION['id']);
}
}
?>
