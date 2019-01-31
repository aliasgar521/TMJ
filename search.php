<?php

// // Database configuration
// $dbHost     = 'localhost';
// $dbUsername = 'root';
// $dbPassword = '95752468ali';
// $dbName     = 'test1';

// Connect with the database
// $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
include "connect.php";
$connection=connect_db();
// Get search term
$searchTerm = $_GET['term'];

// Get matched data from Inventory table
$sql = "SELECT * FROM `Inventory` WHERE `item_name` LIKE '%".$searchTerm."%' AND `deleted` <> 1 ORDER BY item_name ASC";

// Generate Inventory data array
$result = mysqli_query($connection,$sql);
$inventoryData = array();
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $data['id'] = $row['id'];
        $data['value'] = $row['item_name'];
        array_push($inventoryData, $data);
    }
}

// Return results as json encoded array
echo json_encode($inventoryData);

?>