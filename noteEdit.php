<?php 
	include "conn/connection.php";
	
	$id_user = $_GET['id_user'];
	$id_note = $_GET['id_note'];
	$query = mysqli_query($con, "select * from note where id_user = '$id_user' and id_note = '$id_note' limit 1");
	$result = array();
	while($row = mysqli_fetch_assoc($query)){
		$result[] = $row;
	}
	echo json_encode($result);
 ?>