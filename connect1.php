<?php

	function connect_db(){
	$connection = mysqli_connect("localhost","root","95752468ali","test2");
	if(!$connection){
		echo "Error in connection" ;
		exit;
	}
	else
		echo "Connection established";
	return $connection;
}
?>