<?php 
	include "conn/connection.php";
	$id_user = $_GET['id_user'];

	$currentYear = date("Y");
	$currentMonth = date("m");
	$currentDate = $currentYear. "-". $currentMonth. "-";

	$query = mysqli_query($con, "select sum(manage.ammount_in) as balance, category.name_category, manage.date from manage join category where manage.category = category.id_category and manage.id_user = '$id_user' and manage.date like '".$currentDate."%' and manage.ammount_in <> 0 group by manage.category order by date asc");
	
	$result = [];
	while($row = mysqli_fetch_assoc($query)){
		$result[] = $row;
	}

	echo json_encode($result);
 ?>