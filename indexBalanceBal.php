<?php 
	include "conn/connection.php";
	$id_user = $_GET['id_user'];

	$query = mysqli_query($con, "select abs(sum(ammount_in) - sum(ammount_ex)) as balance, date from manage where id_user = '$id_user'");
	$row = mysqli_fetch_assoc($query);
	$result = $row['balance'];

	echo json_encode($result);
 ?>