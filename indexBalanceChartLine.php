<?php 
	include "conn/connection.php";
	$id_user = $_GET['id_user'];

	$currentYear = date("Y");
	$currentMonth = date("m");
	$currentDate = $currentYear. "-". $currentMonth. "-";

	$query = mysqli_query($con, "select abs(sum(ammount_in) - sum(ammount_ex)) as balance, date from manage where id_user = '$id_user' and date like '".$currentDate."%' group by date order by date asc");
	
	$result = [];
	while($row = mysqli_fetch_assoc($query)){
		$result[] = $row;
	}

	echo json_encode($result);
 ?>