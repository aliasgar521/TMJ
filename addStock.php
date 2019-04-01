<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
 	<script type="text/javascript">
      function showSwal(){
       
      swal({
title: "Success!",
text: "Stock has been Added!",
icon: "success",
button: "Okay"
}).then(function() {
// Redirect the user
window.location.href = "index.php";

});

      }
      function showSwal1(){
        swal({
 		 title: "Sorry!",
  		 text: "Error in insertion!",
  		 icon: "warning",
       	 type: "success"
}).then(function() {
// Redirect the user
window.location.href = "index.php";

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
		$created = add_stock($_POST);
		if($created){
				echo '<script>','showSwal();','</script>';
		}
		else{
			echo '<script>','showSwal1();','</script>';
		}
	}
	else{
		header("Location: index.php");
	}
?>