<?php
class ImageManager{
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
       if ($_FILES["pic"]["error"] > 0) {
    echo "Return Code: " . $_FILES["pic"]["error"] . "<br>";
  } else {
$conn = init_db();
$url = uniqid();
$res = mysqli_query($conn,'insert into images (u_id, url, ups) values ('.$myId.', \''.$url.'\', 0)') or die(mysqli_error($conn).'failed query Database.php:'.__LINE__);
$dest = __DIR__."/../img/usr/" . $url;
echo 'moved to '.$dest;
move_uploaded_file($_FILES["pic"]["tmp_name"],
      $dest);
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

}
?>