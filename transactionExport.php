<?php 
	include "conn/connection.php";
	date_default_timezone_set('Asia/Jakarta');
	$currentdate = date("Y-m-d his");

	$datefrom = $_GET['datefrom'];
	$dateto = $_GET['dateto'];
	$id_user = $_GET['id_user'];

	if($datefrom != '' && $datefrom != null && $dateto != '' && $dateto != null){
		$sql = "select * from manage join category where manage.category = category.id_category and date >= '$datefrom' 
		        and date <= '$dateto' and id_user = '$id_user'";
		$query = mysqli_query($con, $sql);
		$list = array ();

		$str = "Data from " .$datefrom. " until " .$dateto;
		$list[] = array($str);
		$list[] = array("");
		$list[] = array("Name", "Ammount", "Category", "Type", "Date");
		while($row = mysqli_fetch_assoc($query)){
			if($row['type_category'] == 1){
				$type = 'Income';
				$ammount = $row['ammount_in'];
			} else{
				$type = 'Expense';
				$ammount = $row['ammount_ex'];
			}
	    	$list[] = array("Name" => $row['names'], "Ammount" => $ammount, "Category" => $row['name_category'], 
	    		"Type" => $type, "Date" => $row['date']);
		}

		$filename = $currentdate.'-'.$id_user.'.csv';
		$fp = fopen('file/'.$filename, 'w');

		foreach ($list as $fields) {
		    fputcsv($fp, $fields);
		}

		fclose($fp);

		$currentdate2 = date("Y-m-d h:i:s");
		$sql2 = "insert into report(id_user, name_report, filename, report_created_at) values ('$id_user', '$str', '$filename', '$currentdate2')";
		mysqli_query($con, $sql2);
	}
 ?>