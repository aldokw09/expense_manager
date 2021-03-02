<?php 
	include "conn/connection.php";
	
	$id_user = $_GET['id_user'];
	$id_manage = $_GET['id_manage'];
	$query = mysqli_query($con, "select * from manage join category where manage.category = category.id_category
			 and manage.id_user = '$id_user' and manage.id_manage = '$id_manage' limit 1");
	$result = array();
	while($row = mysqli_fetch_assoc($query)){
		$result[] = $row;
	}
	echo json_encode($result);
 ?>