<?php

// Database configuration
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = '95752468ali';
$dbName     = 'test1';

// Connect with the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Get search term
$searchTerm = $_GET['term'];

// Get matched data from Inventory table
$query = $db->query("SELECT * FROM `Inventory` WHERE `item_name` LIKE '%".$searchTerm."%' ORDER BY item_name ASC");

// Generate Inventory data array
$inventoryData = array();
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $data['id'] = $row['id'];
        $data['value'] = $row['item_name'];
        $data['available'] =$row['stock_amt'];
        array_push($inventoryData, $data);
    }
}

// Return results as json encoded array
echo json_encode($inventoryData);

?>