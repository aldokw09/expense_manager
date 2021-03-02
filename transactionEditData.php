<?php 
	include "conn/connection.php";

	$id_user = $_GET['id_user'];
	$id_manage = $_GET['id_manage'];
	$type = $_GET['type'];
	$names = $_GET['names'];
	$ammount = $_GET['ammount'];

	if($type==1){
		$sql = "update manage set names = '$names', ammount_in = '$ammount' where id_user = '$id_user' and id_manage = '$id_manage'";
		mysqli_query($con, $sql);
		echo "success";
	} 
	else if($type==2){
		$sql = "update manage set names = '$names', ammount_ex = '$ammount' where id_user = '$id_user' and id_manage = '$id_manage'";
		mysqli_query($con, $sql);
		echo "success";
	}
	else {
		echo "failed";
	}
	
?>