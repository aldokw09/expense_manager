<?php 
	include "conn/connection.php";
	
	$id_user = $_GET['id_user'];
	$id_report = $_GET['id_report'];
	$filename = addslashes($_GET['filename']);


	$query = mysqli_query($con, "delete from report where id_user = '$id_user' and id_report = '$id_report' limit 1");

	if($query){
		unlink("file/".$filename);
		echo "success";
	} else{
		echo "failed";
	}
 ?>