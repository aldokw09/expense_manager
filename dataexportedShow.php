<?php 
	include "conn/connection.php";
	$id_user = $_GET['id_user'];
	
	$query = mysqli_query($con, "select * from report where id_user = $id_user order by id_report DESC");
	
	$result = array();
	while($row = mysqli_fetch_assoc($query)){
		$result[] = $row;
	}
	echo json_encode($result);
 ?>