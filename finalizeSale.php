<?php
	include "connect.php";
	session_start();
	function debug($arg){
		echo "<pre>";
		print_r($arg);
		echo "</pre>";
	}
// Unescape the string values in the JSON array
$tableData = $_POST['pTableData'];
$counter = $_POST['counter_value'];
$total = $_POST['total_sale'];
// Decode the JSON array
$tableData = json_decode($tableData,TRUE);

// now $tableData can be accessed like a PHP array
date_default_timezone_set('Asia/Bahrain');
$date = date('m/d/Y h:i:s a', time());
$t=strtotime($date);
echo $date;
echo($user = $_SESSION['username']);


addSales($tableData,$counter,$total,$t);

function addSales($table,$counter,$total,$date){
	$user = $_SESSION['username'];
	$connection=connect_db();
	$sales_person="Fakhruddin";
	$total_amount=$total;

	// echo $total;

	// $counter=$menu['hideme'];
	$j=0;

	//To insert initial values into Sales Table
	$sql = "INSERT INTO `Sales`(`sales_date`,`total_amount`,`sales_person`) VALUES ('$date','$total_amount','$user')";
	$result = mysqli_query($connection,$sql); 
	$html .='';
	if(mysqli_affected_rows($connection)){
		$retsql = "SELECT max(bill_id) as max FROM `Sales`";
		$max = mysqli_query($connection,$retsql);
		if(mysqli_num_rows($max)){
			while($row = mysqli_fetch_assoc($max)){
				$max1=$row['max'];
			}
		}



		for($j=0;$j<$counter+1;$j++){
			$pro_name=$table[$j]['product'];
			$quantity=$table[$j]['quantity'];
			$sp=$table[$j]['sp'];
			$tsp=$table[$j]['tsp'];
			// $html .='<script>alert('$pro_name')</script>';
			$sql1= "SELECT `id`,`cost_price` from `Inventory` where `item_name`='$pro_name'";
			$result1=mysqli_query($connection,$sql1);
			if(mysqli_num_rows($result1)){
				while($row1 = mysqli_fetch_assoc($result1)){
					$product_id = $row1['id'];
					$product_cost=$row1['cost_price'];
				}
			}
			$profit=($tsp-($product_cost * $quantity));
			$sql2 = "INSERT INTO `SalesDetails`(`bill_id`,`product_id`,`quantity`,`sell_price`,`profit`) VALUES ('$max1','$product_id','$quantity','$sp','$profit')";
			$sql3="UPDATE `Inventory` SET `stock_amt`=(`stock_amt`-'$quantity') where `id`='$product_id'";
			$result2=mysqli_query($connection,$sql2);
			$result3=mysqli_query($connection,$sql3);
			
		}
		if(mysqli_affected_rows($connection)){
				return true;
			}
	}
	return $html;
}





?>