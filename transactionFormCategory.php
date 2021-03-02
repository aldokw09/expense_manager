<?php 
	include "conn/connection.php";
	$query = mysqli_query($con, "select * from category order by type_category, name_category ASC");
	
	$result = array();
	while($row = mysqli_fetch_assoc($query)){
		$result[] = $row;
	}
	echo json_encode($result);
 ?>