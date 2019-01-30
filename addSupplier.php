<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 	<script type="text/javascript">
      function showSwal(){
       
      swal({
title: "Success!",
text: "Supplier Added",
icon: "success",
type: "success",
confirmButtonText: "Cool"
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
	if(isset($_POST["submit_supplier"])){
		include "db.php";
		$created = add_supplier($_POST);
		if($created){
			//header("Location: index.php?id=Success&v=Insert Success");
			echo '<script>','showSwal();','</script>';
		}
		else{
			//header("Location: index.php?id=Fail&v=Insert Fail");
			echo '<script>','showSwal1();','</script>';
		}
	}
	else{
		header("Location: index.php");
	}
?>