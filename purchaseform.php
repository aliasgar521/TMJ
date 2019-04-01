<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
 	<script type="text/javascript">
      function showSwal(){
       
      swal({
title: "Success!",
text: "Purchase Entry Made!",
icon: "success",
Button: "Ok"
}).then(function() {
// Redirect the user
window.location.href = "PurchaseManagement.php";

});

      }
      function showSwal1(){
        swal({
 		 title: "Sorry!",
  		 text: "Error in Insertion!",
  		 icon: "warning",
       	 type: "success" 
}).then(function() {
// Redirect the user
window.location.href = "PurchaseManagement.php";

});
      }


    </script>
</head>
<body>

</body>
</html>
<?php
	if(isset($_POST["submit"])){
		include "db.php";
		$created = addPurchasedProducts($_POST);
		if($created){
			// echo $created;
			// header("Location: PurchaseManagement.php?id=Success&v=Insert Success");
			echo '<script>','showSwal();','</script>';
		}
		else{
			// header("Location: PurchaseManagement.php?id=Fail&v=Insert Fail");
			echo '<script>','showSwal1();','</script>';
		}
	}
	else{
		header("Location: PurchaseManagement.php?id=NaiChalraBro");
	}
?>