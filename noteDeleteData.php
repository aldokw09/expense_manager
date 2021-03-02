<?php 
	include "conn/connection.php";
	
	$id_user = $_GET['id_user'];
	$id_note = $_GET['id_note'];


	$query = mysqli_query($con, "delete from note where id_user = '$id_user' and id_note = '$id_note' limit 1");

	if($query){
		echo "success";
	} else{
		echo "failed";
	}
 ?>