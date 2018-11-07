<?php
	if(isset($_POST["submit"])){
		include "db.php";
		$created = addPurchasedProducts($_POST);
		if($created){
			// echo $created;
			header("Location: PurchaseManagement.php?id=Success&v=Insert Success");
			//echo '<script>','showSwal();','</script>';
		}
		else{
			header("Location: PurchaseManagement.php?id=Fail&v=Insert Fail");
			//echo '<script>','showSwal1();','</script>';
		}
	}
	else{
		header("Location: PurchaseManagement.php?id=NaiChalraBro");
	}
?>