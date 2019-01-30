<?php    
include "db.php";
$connect= connect_db();
if(isset($_POST["id"]))  
 {  
 	
      $query = "UPDATE Inventory set stock_amt = 0,cost_price=0,sell_price=0,cabinet=0,deleted=1 WHERE id = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  

     
 }  

?>