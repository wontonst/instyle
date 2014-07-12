<?php
class ImageManager{
public static function getAll($res){
$ret = array();
while($r=mysqli_fetch_assoc($res)){
$ret[]=$r;
}
return $ret;
}
public static function getMyImg($myId){
$conn = init_db();
$res = mysqli_query($conn,"SELECT * FROM images WHERE u_id=$myId");
return ImageManager::getAll($res);
}
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
$conn=init_db();

$res = mysqli_query($conn,"select * from users where id!=$myId order by rand() limit 1");
$usr= mysqli_fetch_assoc($res);
$uid=$usr['id'];
$res = mysqli_query($conn,"select * from images where u_id=$uid");
return ImageManager::getAll($res);
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
$sql='insert into images (u_id, url, ups) values ('.$myId.', \''.$url.'.jpg\', 0)';
$res = mysqli_query($conn,$sql) or die(mysqli_error($conn).'failed query:'.__LINE__);
$dest = __DIR__."/../img/usr/" . $url.'.jpg';
echo 'moved to '.$dest;
move_uploaded_file($_FILES["pic"]["tmp_name"],
      $dest);
}
}
/**
@param id the id of the img to drop
*/
public static function dropImg($id){
  $conn=init_db();
    mysqli_query($conn,$conn, "DELETE FROM images where id='" . $id ."'");
}
/**
@param id the id of the image to rate up
*/
function rateUp($id){
    mysqli_query($conn, "UPDATE Images SET ups=ups+1 where id=$id");
}

}
?>