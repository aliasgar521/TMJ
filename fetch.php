<?php  

 


 //fetch.php  
include "db.php";
$connect= connect_db();
if(isset($_POST["id"]))  
 {  
 	
      $query = "SELECT * FROM Inventory WHERE id = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  

      echo json_encode($row);  
 }  

?>