<?php 
	include "conn/connection.php";
	
	$id_user = $_GET['id_user'];
	$query = mysqli_query($con, "select * from note where id_user = '$id_user' order by date DESC, id_note DESC");
	$result = array();
	while($row = mysqli_fetch_assoc($query)){
		$result[] = $row;
	}
	echo json_encode($result);
 ?>