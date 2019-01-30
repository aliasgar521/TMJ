<?php

	include "connect.php";
	function debug($arg){
		echo "<pre>";
		print_r($arg);
		echo "</pre>";
	}

	function add_supplier($menu){
		console.log("in add suplier function");
		$connection=connect_db();

		$supplier_name= $menu['supplier_name'];
		$location = $menu['location'];
		$sql = '';
		

		$sql = "INSERT INTO `Supplier`(`supplier_name`,`location`) VALUES ('$supplier_name','$location')";

		$result = mysqli_query($connection,$sql);
		if(mysqli_affected_rows($connection)){
			return true;
		}
		return false;
	}
	/*function populate_supplier(){
		$connection=connect_db();
		$sql = mysqli_query($connection, "SELECT supplier_name FROM Supplier order by supplier_name ASC");
                    while ($row = $sql->fetch_assoc()){
                        echo "<option value=\"owner1\">" . $row['supplier_name'] . "</option>";
                    }

	}*/
	function add_stock($menu){
		$connection=connect_db();
	
		 $item_name= $menu['item_name'];
		 $desc= $menu['description'];
		 $stock_amt= $menu['stock_amt'];
		//$supplier_id=$menu['supplier'];
		$cp=$menu['cost_price'];
		$sp=$menu['sell_price'];
		$cabinet=$menu['cabinet'];
		$tags = $menu['tags'];
		$purchase_date=$menu['purchase_date'];
		$t=strtotime($menu['purchase_date']);
		
		if(empty($desc))
		{
			$desc="";
		}
		if(empty($cabinet))
		{
			$cabinet="";
		}
		if(empty($tags))
		{
			$tags="";
		}
		//QUERY WITH SUPPLIER ID IN IT
		// $sql1 = "INSERT INTO `Inventory`(`item_name`,`description`,`stock_amt`,`supplier_id`,`cost_price`,`sell_price`,`cabinet`,`tag`,`purchase_date`) VALUES ('$item_name','$desc','$stock_amt','$supplier_id','$cp','$sp','$cabinet','$tags','$t')";

		//QUERY WITHOUT SUPPLIER ID
		$sql1 = "INSERT INTO `Inventory`(`item_name`,`description`,`stock_amt`,`cost_price`,`sell_price`,`cabinet`,`tag`,`purchase_date`,`deleted`) VALUES ('$item_name','$desc','$stock_amt','$cp','$sp','$cabinet','$tags','$t','0')";

		$result = mysqli_query($connection,$sql1);
		if(mysqli_affected_rows($connection)){
			return true;
			

		}
		return false;
	}


	function update_stock($menu){
		$connection=connect_db();
	
		 $pro_id= $menu['pro_id'];
		 $item_name= $menu['item_name'];
		 $desc= $menu['description'];
		 $stock_amt= $menu['stock_amt'];
		//$supplier_id=$menu['supplier'];
		$cp=$menu['cost_price'];
		$sp=$menu['sell_price'];
		$cabinet=$menu['cabinet'];
		$tags = $menu['tags'];
		// $purchase_date=$menu['purchase_date'];
		// $t=strtotime($menu['purchase_date']);
		$sql1 = '';
		//QUERY WITH SUPPLIER ID IN IT
		// $sql1 = "INSERT INTO `Inventory`(`item_name`,`description`,`stock_amt`,`supplier_id`,`cost_price`,`sell_price`,`cabinet`,`tag`,`purchase_date`) VALUES ('$item_name','$desc','$stock_amt','$supplier_id','$cp','$sp','$cabinet','$tags','$t')";

		//QUERY WITHOUT SUPPLIER ID
		$sql1 = "UPDATE `Inventory` set `item_name`= '$item_name',`description`='$desc',`stock_amt`='$stock_amt',`cost_price`='$cp',`sell_price`='$sp',`cabinet`='$cabinet',`tag`='$tags' where `id`='$pro_id'";

		$result = mysqli_query($connection,$sql1);
		if(mysqli_affected_rows($connection)){
			return true;
			

		}
		return false;
	}



//  function search_testing(){
//  	$html ='';
//  	$html .= '<h1>Hello world</h1>';
//  	return $html;
//  }

 
// function getSearchResults(){
// 	$connection=connect_db();
// 	global $searchString;
// 	$searchString=$_GET["search"];
// 	$html ='';

// 	$sql3="SELECT * FROM `Inventory` where `tags` LIKE '%$searchString%' OR `item_name` LIKE '%$searchString%' OR `description` LIKE '%$searchString%' or `id`= '$searchString' ";
// 	$result1 = mysqli_query($connection,$sql3);
// 		if(mysqli_num_rows($result1)){
// 			$html .='';
// 			while($row1 = mysqli_fetch_assoc($result1)){
						
// 				$html .= '<form action="#" style="padding: 20px">
// 					Item Name:<br>
//                     <input type="text" name="sold_item_name" id="sold_item_name" style="width:40%" value = "'.$row1['item_name'].'">
//                      <br>
//                     Quantity Sold:<br>
//                     <input type="number" name="stock_sold" id="stock_sold">
//                     <br>
//                     In-Hand Cash:<br>
//                     <input type="number" name="in_cash" id="in_cash">
//                     <br>
//                     Supplier: <br>
//                     <input type="text" name="distributor" id="distributor" style="width:40%">
//                     <br>
//                     Selling Price: <br>
//                     <input type="number" name="sp" id="sp" placeholder="Field will be auto-filled">
//                     <br>
//                     Cost Price: <br>
//                     <input type="number" name="cp" id="cp" placeholder="Field will be auto-filled">
//                     <br>
//                     Profit: <br>
//                     <input type="number" name="profit" id="profit" placeholder="Field will be auto-filled">
//                     <br></form>';
// 			}
			
// 		}
// 	$html .= '';
// 	return $html;
// }

function addPurchasedProducts($menu){

	$connection=connect_db();
	
	$invoice = $menu['invoice'];
	$date = $menu['date_of_purchase'];
	$person = $menu['purc_person'];
	$supplier_id = $menu['supplier'];
	$payment = $menu['payment'];
	$payable = $menu['payable'];

	$t=strtotime($menu['date_of_purchase']);
	$sql = '';
	$sql1 = '';
	$sql2= '';
	$j=0;
	$counter = $menu['hideme'];

$sql = "INSERT INTO `Invoice`(`invoice_number`,`supplier_id`,`purchase_date`,`purchase_person`,`payment`,`payable`) VALUES ('$invoice','$supplier_id','$t','$person','$payment','$payable')";
	$result = mysqli_query($connection,$sql);
		
		//should the argument below be connection or $result    ??????????????????????????????????????/??????????????????????????
		if(mysqli_affected_rows($connection)){
			$retsql = "SELECT max(id) as max FROM `Invoice`";
			$max = mysqli_query($connection,$retsql);
			if(mysqli_num_rows($max))
			{
				while($row = mysqli_fetch_assoc($max)){
						$max1=$row['max'];
				}
			}

			for( $j=0; $j<$counter; $j++)		
			{
				$pro_name=$menu['purc_item_name'.$j];
				$quantity=$menu['purchase_quantity'.$j];
				$cp=$menu['cost_price'.$j];
				$sp=$menu['sell_price'.$j];
				$desc=$menu['description'.$j];
				$cabinet=$menu['cabinet'.$j];
				$tags=$menu['tags'.$j];
				
				$sql1 = "INSERT INTO `Inventory`(`item_name`,`description`,`stock_amt`,`cost_price`,`sell_price`,`cabinet`,`tag`) VALUES ('$pro_name','$desc','$quantity','$cp','$sp','$cabinet','$tags') ON DUPLICATE KEY UPDATE `cost_price` = ((`cost_price` * `stock_amt`)+('$quantity' * '$cp'))/(`stock_amt` + '$quantity'), `sell_price` = ((`sell_price` * `stock_amt`)+('$quantity' * '$sp'))/(`stock_amt` + '$quantity') ,`stock_amt` = `stock_amt` +'$quantity'";

				$sql2 = "INSERT INTO `invandpro`(`invoice_id`,`pro_name`,`quantity`,`cost_price`) VALUES ('$max1','$pro_name','$quantity','$cp')";
				$result1 = mysqli_query($connection,$sql1);
				$result2 = mysqli_query($connection,$sql2);
			}	
			if(mysqli_affected_rows($connection)){
				return true;
			}

// INSERT INTO `Inventory`(`item_name`,`description`,`stock_amt`,`cost_price`,`sell_price`,`cabinet`,`tag`) VALUES ('Murtaza','','1','20','14','1','') ON DUPLICATE KEY UPDATE cost_price = ((cost_price * stock_amt) + (1*20))/(stock_amt+1),sell_price = ((sell_price* stock_amt) + (1*14))/(stock_amt+1),`stock_amt` = `stock_amt` +'1';

			
		}
		return false;
}



function display_search(){
		$connection=connect_db();
		$menu = '';
		$sql = "SELECT * FROM `Inventory`";

		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)){

			
			while($row = mysqli_fetch_assoc($result)){

				$menu .= '<option id="att'.$row['id'].'" value = "'.$row['title'].'">';
			}
		}
			$sql1 = "SELECT * FROM `products`";

		$result1 = mysqli_query($connection,$sql1);
		if(mysqli_num_rows($result1)){
			while($row1 = mysqli_fetch_assoc($result1)){

				$menu .= '<option id="pro'.$row1['id'].'" value = "'.$row1['name'].'"><a href="www.google.com"></a></option>';
			}
		}
			$sql2 = "SELECT * FROM `category`";

			$result2 = mysqli_query($connection,$sql2);
			if(mysqli_num_rows($result2)){
			while($row2 = mysqli_fetch_assoc($result2)){

				$menu .= '<option id="cat'.$row2['id'].'" value = "'.$row2['name'].'">';
			}
		}
			return $menu;


		

	}



?>