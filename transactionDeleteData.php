<?php 
	include "conn/connection.php";
	
	$id_user = $_GET['id_user'];
	$id_manage = $_GET['id_manage'];


	$query = mysqli_query($con, "delete from manage where manage.id_user = '$id_user' and manage.id_manage = '$id_manage' limit 1");

	if($query){
		echo "success";
	} else{
		echo "failed";
	}
 ?>