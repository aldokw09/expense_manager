<?php 
	include "conn/connection.php";
	$id_user = $_GET['id_user'];
	$category = $_GET['category'];

	$query2 = mysqli_query($con, "select sum(ammount_in) as total from manage join category where manage.category = category.id_category and id_user = '$id_user' and category = '$category'");
	$row = mysqli_fetch_assoc($query2);
	$count = mysqli_num_rows($query2);

	if($count>0 && $row['total'] != null){
		$result = $row['total'];
	}
	else{
		$result = 0;
	}
	

	echo json_encode($result);
 ?>