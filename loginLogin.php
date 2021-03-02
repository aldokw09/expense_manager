<?php 
	include "conn/connection.php";
	session_start();

	$email = addslashes($_GET['email']);
	$password = addslashes($_GET['password']);
	$query = mysqli_query($con, "select * from user where email = '$email'");
	$count = mysqli_num_rows($query);
	if($count == 1) {
		$row = mysqli_fetch_assoc($query);
		if(password_verify($password, $row['password'])) {
			$str = $row['name_user'];
			$split = explode(" ",$str);
	        $_SESSION['user123'] = $row['id_user'];
	        $_SESSION['name_user'] = $split[0];

	        echo "success";
    	}
    } else{
    	echo "failed";
    }
 ?>