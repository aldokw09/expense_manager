<?php 
	include "conn/connection.php";
	$id_user = $_GET['id_user'];

	$query = mysqli_query($con, "select sum(ammount_ex) as balance, date from manage where id_user = '$id_user'");
	
	$result = "";
	$row = mysqli_fetch_assoc($query);
	if($row['balance'] == ''){
		$row['balance'] = '0';
	}
	$result = $row['balance'];

	echo json_encode($result);
 ?>