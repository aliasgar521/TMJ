<?php

	include "connect1.php";
	function debug($arg){
		echo "<pre>";
		print_r($arg);
		echo "</pre>";
	}
function testing($menu){
		console.log("in add suplier function");
		$connection=connect_db();

		
		$invoice = $menu['invoice'];
		$sql = '';
		$j=0;
		$counter = $menu['hideme'];

		//echo $invoice;
		// $sql = "INSERT INTO `Supplier`(`supplier_name`,`location`) VALUES ('$supplier_name','$location')";
		$sql = "INSERT INTO `invoice`(`invoice_no`) VALUES ('$invoice')";
		$result = mysqli_query($connection,$sql);
		if(mysqli_affected_rows($connection)){
			$retsql = "SELECT max(id) as max FROM `invoice`;";
			$max = mysqli_query($connection,$retsql);
			if(mysqli_num_rows($max))
			{
				while($row = mysqli_fetch_assoc($max)){
						$max1=$row['max'];
				}
			}
			// $m1 = mysqli_fetch_assoc($max);
			// $max1 = $ml['max(id)'];
			// $rowSQL = mysqli_query( "SELECT MAX(id) AS max FROM `invoice`;" );
			// $row = mysqli_fetch_array( $rowSQL );
			// $largestNumber = $row['max'];
			
			// print($max);
			// for(int j=0;j<$counter;j++)
			// {
			// $name= $menu['pro_name'];
			// $quan=$menu['quan'.$j];
			for( $j=0; $j<$counter; $j++)		//check
			{
				$name= $menu['pro_name'.$j];
				$quantity=$menu['quan'.$j];
	$sql1 = "INSERT INTO `product`(`name`,`invoice_no`,`quan`) VALUES ('$name', '$max1','$quantity') ON DUPLICATE KEY UPDATE `quan` = `quan` +'$quantity'";
	$sql2 = "INSERT INTO `testing`(`inv_id`,`pro_name`,`quantity`) VALUES ('$max1','$name','$quantity')";
				$result1 = mysqli_query($connection,$sql1);
				$result2 = mysqli_query($connection,$sql2);

			}
			
			// }
			
			if(mysqli_affected_rows($connection)){
				return $name;
			}
		}
		return false;

		// $retsql = "SELECT max(id) FROM `invoice`";
		// $max = mysqli_query($connection,$retsql);
		// $m1 = $max->fetch_assoc();
		// $max = $ml['max(id)'];
	 			


		//  $sql1 = "INSERT INTO `product`(`name`,`invoice_no`) VALUES ('$name', '$max' )";
		// if(mysqli_affected_rows($connection)){
		// 	$result1 = mysqli_query($connection,$sql1);
		// 	if(mysqli_affected_rows($connection)){
		// 		return true;
		// 	}
			
		// }

		//return false;
	}
?>