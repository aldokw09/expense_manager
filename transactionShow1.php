<?php 
	include "conn/connection.php";

	$id_user = $_GET['id_user'];
	$query = mysqli_query($con, "select * from manage join category where manage.category = category.id_category and
			 manage.id_user = '$id_user' and manage.ammount_ex = 0 order by manage.date DESC, id_manage DESC");
	
	$result = array();
	while($row = mysqli_fetch_assoc($query)){
		$result[] = $row;
	}
	echo json_encode($result);
 ?>