<?php 
	include "conn/connection.php";

	$id_user = $_GET['id_user'];
	$name_note = $_GET['name_note'];
	$note_text = $_GET['note_text'];
	$date = $_GET['date'];

	$sql  = "insert into note(id_user, name_note, note_text, date) values('$id_user','$name_note','$note_text','$date')";
	if(mysqli_query($con, $sql)){
		echo "success";
	}
	else {
		echo "failed";
	}
	
 ?>