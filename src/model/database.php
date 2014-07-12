<?php
/**
@param myId id of the user requesting. do NOT return the user's own picture :D
@returns an array in this fashion
array(
[0]=>array(
[url]=>'string of the image',
[up]=>int number of up votes
),
);
*/
function getImg($myId=-1){
	$conn=mysqli_connect("localhost","username","pwd","db");
	$ppl_to_choose_from=mysql_query('SELECT DISTINCT u_id FROM Images');
	$num_people_to_choose_from=mysql_num_rows($ppl_to_choose_from);
	
	$whom_to_choose=0;
	while($whom_to_choose!=$myId)
		$whom_to_choose=rand(1, $num_people_to_choose_from);
	$chosen_u_id = mysql_data_seek($ppl_to_choose_from, $whom_to_choose); // rows start at 0

	$pics=mysql_query("SELECT * FROM Images WHERE u_id='".$chosen_u_id."' FROM Images");

	$result = array();
	while ($row = mysql_fetch_array($pics)) {
		array_push($result, $row['url'], $row['ups']);
	}

	mysql_free_result($pics);
	mysql_close($conn);

	return $result;
}

/**
@param user adding the image, the image itself is passed from the form. Communicate with Nicole on what the $_GET is
*/
function addImg($myId){
	if(isset($_GET['pic'])) {
    	//Only strip slashes if magic quotes is enabled.
    	$pic = (get_magic_quotes_gpc()) ? stripslashes($_GET['pic']) : $_GET['pic'];
    	$pic = '/your/path/to/real/image/location/'.$pic;
    	$size = getimagesize($pic);
	    header('Content-type: '.$size['mime']);
	    //Read the image and send it directly to the output.
    	readfile($pic);

   		$conn=mysqli_connect("localhost","username","pwd","db");
   		mysqli_query($conn, "INSERT INTO Images ($myId, $pic, 0)"); // assuming it does primary key itself
		mysql_close($conn);
	}
}
/**
@param id the id of the img to drop
*/
function dropImg($id){
	$conn=mysqli_connect("localhost","username","pwd","db");
   	mysqli_query($conn, "DELETE FROM Images where id='" + $id +"'");
	mysql_close($conn);
}
/**
@param id the id of the image to rate up
*/
function rateUp($id){
	$conn=mysqli_connect("localhost","username","pwd","db");
   	mysqli_query($conn, "UPDATE Images SET up='(SELECT up FROM Images where id='".$id."' )+1' WHERE id='"+$id+"'");
	mysql_close($conn);
}

function register($email,$pwd){
}
function login($email,$pwd){

}


?>