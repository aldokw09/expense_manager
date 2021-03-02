<?php 
	include "conn/connection.php";

	$id_user = $_GET['id_user'];
	$type = $_GET['type'];
	$names = $_GET['names'];
	$ammount = $_GET['ammount'];
	$category = $_GET['category'];
	$date = $_GET['date'];
	if($type == 1){
		mysqli_query($con, "insert into manage(id_user, names, ammount_in, category, date) values('$id_user','$names','$ammount','$category','$date')");
		echo "success";
	}
	else if($type == 2){
		mysqli_query($con, "insert into manage(id_user, names, ammount_ex, category, date) values('$id_user','$names','$ammount','$category','$date')");
		echo "success";
	} 
	else {
		echo "failed";
	}
	
 ?>