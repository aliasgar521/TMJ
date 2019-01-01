<?php
	if(isset($_POST["submit"])){
		include "db.php";
		$created = addSales($_POST);
		if($created){
			// echo $created;
			header("Location: DailySales.php?id=Success&v=Insert Success");
			//echo '<script>','showSwal();','</script>';
		}
		else{
			header("Location: DailySales.php?id=Fail&v=Insert Fail");
			//echo '<script>','showSwal1();','</script>';
		}
	}
	else{
		header("Location: DailySales.php?id=NaiChalraBro");
	}