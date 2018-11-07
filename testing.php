<?php
	if(isset($_POST["submit"])){
		include "db1.php";
		$created = testing($_POST);
		if($created){
			// echo $created;
			header("Location: new_file1.php?id=Success&v=Insert Success");
			//echo '<script>','showSwal();','</script>';
		}
		else{
			header("Location: new_file1.php?id=Fail&v=Insert Fail");
			//echo '<script>','showSwal1();','</script>';
		}
	}
	else{
		header("Location: new_file1.php?id=NaiChalraBro");
	}
?>