<?php 
	include "conn/connection.php";
	$id_user = $_GET['id_user'];

	$query = mysqli_query($con, "select ammount_in, ammount_ex, abs(sum(ammount_in) - sum(ammount_ex)) as balance, date from manage where id_user = '$id_user'");
	$row = mysqli_fetch_assoc($query);
	if($row['ammount_ex'] > $row['ammount_in']){
		$result = array("symbol" => "-","balance" => $row['balance']);
	}
	else{
		$result = array("symbol" => "","balance" => $row['balance']);
	}
	

	echo json_encode($result);
 ?>