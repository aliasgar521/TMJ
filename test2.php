<?php
session_start();
include "db.php";
// if((!isset($_SESSION["username"]) && !isset($_SESSION["role"]=="admin")))
if((!isset($_SESSION['username']) && $_SESSION['role'] != "admin")){
   
    header("location: Login/login.php");
}
else if((isset($_SESSION['username']) && $_SESSION['role'] == "worker"))
{
    header("location: test.php");   
}
?>
<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>T.M. Jivaji & Sons</title>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

	<script>
      
        $(function() {
            $("input.product_input").autocomplete({
            source: "search.php",
            });
        });
    </script>
    <style>
			table {
			        font-family: arial, sans-serif;
			        border-collapse: collapse;
			        width: 100%;
			        border-radius:10px;
			        margin-bottom: 5%;

			}
			td, th {
			        /*border: 1px solid #dddddd;*/
			        text-align: center;
			        padding: 8px;
			}
			tr:nth-child(odd) {
			        background-color: #dddddd;
			}
		</style>

</head>
<body>
	 <div class="container center_div">

    	
           
    <form id="product" method="#" onsubmit="return true"> 
            Enter Product: 
            <input type="text" name="product_input" id="product_input" class="product_input"/>    
            <input type="submit" class="btn btn-primary " name="submit" style="margin:20px" onclick="myCreateFunction()" value="Add Product">
            </form>
      
        <table id="myTable">
        	 <thead>
        		<tr  style="background:#428bca;color:white" >
                <th>Product</th>
                <th>Selling Price</th>
                <th>Quantity</th>  
            </tr>
        	</thead>
        	<tbody> 
        		
        	</tbody>
            
            

        </table>

        <?php 
        $n =0;
        if(isset($_GET['submit'])){
        	echo "Hello world";
        	echo $n+1;	
        	
        }
        $n++;
        	

        	?>
        <!-- <?php
        $connection=connect_db();
        
        $n = 0;
        if(isset($_GET['submit'])){
        $product=htmlentities($_GET['product_input']);
        $sql="SELECT item_name,stock_amt,sell_price from Inventory where item_name = '$product'";
        $result = mysqli_query($connection,$sql);
            if(mysqli_num_rows($result)){
                while($row = $result->fetch_assoc()){
                	$item_name=$row["item_name"];
                    $sell_price=$row["sell_price"];
                    $stock_amt=$row["stock_amt"];
                    echo "<script type='text/javascript'>
                    		var name='ali';
                    		var email='asgar';
                    		var markup = '<tr><td><input type='checkbox' name='record'></td><td>' + name + '</td><td>' + email + '</td></tr>';
            
            			$('table tbody').append(markup);
                    		</script>";
                }
            }
        }
                    // $n=$n+1;

        ?>  -->


<script>
    function myCreateFunction() {
 //      var table = document.getElementById("myTable");
 //        let newRow = tableRef.insertRow(-1);
 //        let newCell = newRow.insertCell(0);
 //        let newText = document.createTextNode('New bottom row');
 //  		newCell.appendChild(newText);
	// }
      //var n = document.getElementById("myTable").rows.length;

      // var row = table.insertRow(0);
      // var cell1 = row.insertCell(0);
      // var cell2 = row.insertCell(1);
      // var cell3 = row.insertCell(2);

      // cell1.innerHTML = "<?php echo $item_name ?>";
      // cell2.innerHTML = "<?php echo $sell_price ?>";
      // cell3.innerHTML = "<?php echo $stock_amt ?>";
	  // cell1.innerHTML = "Ali";
   //    cell2.innerHTML = "Asgar";
   //    cell3.innerHTML = "F";
   // var name = "ali";
   // var email = "asgar";
   // var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + name + "</td><td>" + email + "</td></tr>";
            
   //          $("table tbody").append(markup);


   //  }

    function myDeleteFunction() {
      document.getElementById("myTable").deleteRow(0);
    }

    // $(document).ready(function(){
    //     $(".add-row").click(function(){
    //         var name = $("#name").val();
    //         var email = $("#email").val();
    //         var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + name + "</td><td>" + email + "</td></tr>";
    //         $("table tbody").append(markup);
    //     });
     
</script>
        </script>
</body>