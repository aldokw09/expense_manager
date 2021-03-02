<?php 
	include "conn/connection.php";

	$id_user = $_GET['id_user'];
	$id_note = $_GET['id_note'];
	$name_note = $_GET['name_note'];
	$note_text = $_GET['note_text'];

	$sql  = "update note set name_note = '$name_note', note_text = '$note_text' where id_user = '$id_user' and id_note = '$id_note'";
	if(mysqli_query($con, $sql)){
		echo "success";
	}
	else {
		echo "failed";
	}
	
 ?>