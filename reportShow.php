<?php 
	include "conn/connection.php";
	$id_user = $_GET['id_user'];
	$category = $_GET['category'];

	$query = mysqli_query($con, "select * from manage join category where manage.category = category.id_category 
		     and id_user = '$id_user' and category = '$category'");
	
	$result = array();
	while($row = mysqli_fetch_assoc($query)){
		$result[] = $row;
	}
	echo json_encode($result);
 ?>