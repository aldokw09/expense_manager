<?php 
	include "conn/connection.php";
	date_default_timezone_set('Asia/Jakarta');
	$currentdate = date("Y-m-d his");

	$datefrom = $_GET['datefrom'];
	$dateto = $_GET['dateto'];
	$id_user = $_GET['id_user'];
	$category = $_GET['category'];

	if($datefrom != '' && $dateto != '' && $category != ''){
		$categoryName = "";
		$sql2 = "select * from category where id_category = '$category' limit 1";
		$query2 = mysqli_query($con, $sql2);
		$row2 = mysqli_fetch_assoc($query2);
		$categoryName = $row2['name_category'];

		$str = "Data Category " .$categoryName. " from " .$datefrom. " until " .$dateto;

		$sql = "select * from manage join category where manage.category = category.id_category and date >= '$datefrom' 
		        and date <= '$dateto' and manage.id_user = '$id_user' and manage.category = '$category'";
		$query = mysqli_query($con, $sql);
		$list = array ();

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