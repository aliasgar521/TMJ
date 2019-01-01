<?php

	function connect_db(){
	$connection = mysqli_connect("localhost","root","95752468ali","test1");
	if(!$connection){
		echo "Error in connection" ;
		exit;
	}
	else
		//echo "Connection established";
	return $connection;
}
?>