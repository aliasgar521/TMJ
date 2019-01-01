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
		$sql1 = '';
		//QUERY WITH SUPPLIER ID IN IT
		// $sql1 = "INSERT INTO `Inventory`(`item_name`,`description`,`stock_amt`,`supplier_id`,`cost_price`,`sell_price`,`cabinet`,`tag`,`purchase_date`) VALUES ('$item_name','$desc','$stock_amt','$supplier_id','$cp','$sp','$cabinet','$tags','$t')";

		//QUERY WITHOUT SUPPLIER ID
		$sql1 = "INSERT INTO `Inventory`(`item_name`,`description`,`stock_amt`,`cost_price`,`sell_price`,`cabinet`,`tag`,`purchase_date`) VALUES ('$item_name','$desc','$stock_amt','$cp','$sp','$cabinet','$tags','$t')";

		$result = mysqli_query($connection,$sql1);
		if(mysqli_affected_rows($connection)){
			return true;
			echo '<script>','showSwal();','</script>';

		}
		return false;
	}


 function search_testing(){
 	$html ='';
 	$html .= '<h1>Hello world</h1>';
	 // $html .= '	<form action="" method="GET" enctype="multipart/form-data">
  // 	            <input type="text" id="searchBarQJT" name="search" list="json-datalist" autocomplete="off"
  // 	            <datalist id="json-datalist" >';

//                 echo display_search()  
//       $html .= '</datalist>
//                  </form>
//                 <form action="#" style="padding: 20px">'
                   
//                      //echo getSearchResults()
                    
                    
//             $html .= '<br><br>
//                     <input type="submit" value="Submit" class="btn btn-primary" style="width:40%">
//                 </form> '
 	return $html;
 }
function getSearchResults(){
	$connection=connect_db();
	global $searchString;
	$searchString=$_GET["search"];
	$html ='';

	$sql3="SELECT * FROM `Inventory` where `tags` LIKE '%$searchString%' OR `item_name` LIKE '%$searchString%' OR `description` LIKE '%$searchString%' or `id`= '$searchString' ";
$result1 = mysqli_query($connection,$sql3);
				if(mysqli_num_rows($result1)){
					$html .='';
					
					
					while($row1 = mysqli_fetch_assoc($result1)){
						//$str = $row1['imgPath'];
						//$images = json_decode($str, TRUE);
						// $html .= '<div class="col-lg-3 col-sm-6 col-md-6 col-6 mb-4" style="padding:2%;">
						// 			<div class="card h-100">
						// 						<img class="card-img-top" src="../'.$images[0].'" alt="Avatar"  data-toggle="modal" onclick="openModal('.$row1['id'].');currentSlide(1);" href="#'.$row1['id'].'">
						// 					<div class="container text-center">
						// 						<h4><b>'.$row1['name'].'</b></h4>
						// 						<p>'.$row1['prodDesc'].'</p>
						// 					</div>
						// 			</div>
						// 		</div>';
						$html .= '<form action="#" style="padding: 20px">
						Item Name:<br>
                    <input type="text" name="sold_item_name" id="sold_item_name" style="width:40%" value = "'.$row1['item_name'].'">
                     <br>
                    Quantity Sold:<br>
                    <input type="number" name="stock_sold" id="stock_sold">
                    <br>
                    In-Hand Cash:<br>
                    <input type="number" name="in_cash" id="in_cash">
                    <br>
                    Supplier: <br>
                    <input type="text" name="distributor" id="distributor" style="width:40%">
                    <br>
                    Selling Price: <br>
                    <input type="number" name="sp" id="sp" placeholder="Field will be auto-filled">
                    <br>
                    Cost Price: <br>
                    <input type="number" name="cp" id="cp" placeholder="Field will be auto-filled">
                    <br>
                    Profit: <br>
                    <input type="number" name="profit" id="profit" placeholder="Field will be auto-filled">
                    <br></form>';
						
						
										
			}
			
		}
		$html .= '';
return $html;
}

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

// function addSales($menu){
// 	$connection=connect_db();
// 	$date=0;
// 	$sales_person="Fakhruddin";
// 	$total_amount="998";
// 	$counter=$menu['hideme'];
// 	$j=0;

// 	//To insert initial values into Sales Table
// 	$sql = "INSERT INTO `Sales`(`sales_date`,`total_amount`,`sales_person`) VALUES ('$date','$total_amount','$sales_person')";
// 	$result = mysqli_query($connection,$sql); 
// 	$html .='';

// 	if(mysqli_affected_rows($connection)){
// 		$retsql = "SELECT max(bill_id) as max FROM `Sales`";
// 		$max = mysqli_query($connection,$retsql);
// 		if(mysqli_num_rows($max)){
// 			while($row = mysqli_fetch_assoc($max)){
// 				$max1=$row['max'];
// 			}
// 		}

// 		// include('simple_html_dom.php');
// 		// $html = str_get_html($string);
// 		// $tables = $html->find('table[id=myTable]');
// 		// $rows = $tables->find('tr');
// 		// foreach ($rows as $row) {
// 		// 	foreach ($row->children() as $cell) {
//   //       		// echo $cell->plaintext;
//   //       		// echo "<script>alert($cell->plaintext)</script>"
//   //       	}
//   //       }




// 		for($j=0;$j<$counter;$j++){
// 			// $pro_name=$menu['pro_name'.$j];
// 			$quantity=$menu['pro_quant'.$j];
// 		// 	$sp=$menu['pro_sp'.$j];
// 			// $tsp=$menu['total_sp'.$j];
// 		// 	// $html .='<script>alert('$pro_name')</script>';
// 		// 	$sql1= "SELECT `id`,`cost_price` from `Inventory` where `item_name`='$pro_name'";
// 		// 	$result1=mysqli_query($connection,$sql1);
// 		// 	if(mysqli_num_rows($result1)){
// 		// 		while($row1 = mysqli_fetch_assoc($result1)){
// 		// 			$product_id = $row1['id'];
// 		// 			$product_cost=$row1['cost_price'];
// 		// 		}

// 		// 	}
// 			// $profit=($tsp-($product_cost * $quantity));
// 			$sql2 = "INSERT INTO `SalesDetails`(`bill_id`,`product_id`,`quantity`,`sell_price`,`profit`) VALUES ('$max1','4','$quantity','10','15')";
// 			$result2=mysqli_query($connection,$sql2);
// 			if(mysqli_affected_rows($connection)){
// 				return true;
// 			}


// 		}
// 	}
// 	// return $html;
// }


?>