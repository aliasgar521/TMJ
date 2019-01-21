
<?php
include "db.php";
$connection= connect_db();
$product=$_GET['name'];
$quantity=$_GET['quantity'];
$sql="SELECT item_name,stock_amt,sell_price from Inventory where item_name = '$product'";
$result = mysqli_query($connection,$sql);
if(mysqli_num_rows($result)){
    while($row = $result->fetch_assoc()){
        $item_name=$row["item_name"];
        $sell_price=$row["sell_price"];
        $stock_amt=$row["stock_amt"];
        $total_price=$sell_price * $quantity;
        $array = array($item_name ,$quantity,$sell_price,$total_price );

        $myJSON = json_encode($array);
    }
}
echo $myJSON;
?>