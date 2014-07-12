<?php
class Database{
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
public static function getImg($myId=-1){
	$conn=mysqli_connect("localhost","username","pwd","db");
	$ppl_to_choose_from=mysqli_query('SELECT DISTINCT u_id FROM Images');
	$num_people_to_choose_from=mysqli_num_rows($ppl_to_choose_from);

  $whom_to_choose=0;
  while($whom_to_choose!=$myId)
    $whom_to_choose=rand(1, $num_people_to_choose_from);
  $chosen_u_id = mysqli_data_seek($ppl_to_choose_from, $whom_to_choose); // rows start at 0

  $pics=mysqli_query("SELECT * FROM Images WHERE u_id='".$chosen_u_id."' FROM Images");

  $result = array();
  while ($row = mysqli_fetch_array($pics)) {
    array_push($result, $row['url'], $row['ups']);
  }

  mysqli_free_result($pics);
  mysqli_close($conn);

  return $result;
}

/**
Maximum of 8 pictures per user. (dont use magic number set it in config.php and use $_GLOBAL
@param user adding the image, the image itself is passed from the form. Communicate with Nicole on what the $_POST is
*/
public static function addImg($myId){
	if(isset($_FILES['pic']) && $_FILES['pic']['error'] <= 0) {
    	//Only strip slashes if magic quotes is enabled.
    	$pic = (get_magic_quotes_gpc()) ? stripslashes($_FILE['pic']) : $_FILE['pic'];
    	$pic = __DIR__.'/../img/'.$pic;
    	$size = getimagesize($pic);
	    header('Content-type: '.$size['mime']);
	    //Read the image and send it directly to the output.
    	readfile($pic);

   		$conn=init_db();
   		mysqli_query($conn, "INSERT INTO Images ($myId, $pic, 0)"); // assuming it does primary key itself
		mysqli_close($conn);
	}
}
/**
@param id the id of the img to drop
*/
public static function dropImg($id){
  $conn=mysqli_connect("localhost","username","pwd","db");
    mysqli_query($conn, "DELETE FROM Images where id='" + $id +"'");
  mysqli_close($conn);
}
/**
@param id the id of the image to rate up
*/
function rateUp($id){
  $conn=mysqli_connect("localhost","username","pwd","db");
    mysqli_query($conn, "UPDATE Images SET up='(SELECT up FROM Images where id='".$id."' )+1' WHERE id='"+$id+"'");
  mysqli_close($conn);
}

function register($email,$pwd){
  $connect = init_db();
  $table = "users";
  $select = "SELECT * from $table where email='$email'";
  $result = mysqli_query($select, $connect) or die(mysqli_error());
  if(!$result) {
    die('mySQL Connection failed on Database.php:'.__LINE__);
  }
  else {
      redirect_and_die();
    }
    else {
        $sql = "INSERT INTO users ".
         "(email,password) ".
         "VALUES ('$email', '$password')";
        $retval = mysqli_query( $sql, $connect );
        if(! $retval )
        {
          die('Could not enter data: ' . mysqli_error($GLOBALS['config']['connetion']));
        }
    }
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
  if($_SESSION->count() == 0) {
    return false;
  }
  else {
    return true;
  }
}
}
?>
