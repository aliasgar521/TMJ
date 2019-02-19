<?php
session_start();
include "db.php";
$user = $_SESSION['username'];
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
        <?php include 'includes.php';?>
        

        <title>T.M. Jiwaji & Sons</title>

        <!-- Bootstrap CSS CDN -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <!-- Our Custom CSS -->
        <!-- <link rel="stylesheet" href="style3.css"> -->
        <!-- Scrollbar Custom CSS -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css"> -->

        <!-- Used to make the drop down list better looking -->
        <!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"> -->


        <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" /> -->

        <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script> -->

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->

        <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
        <!-- <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> -->

       
        <script>
            $(function() {
            $("input.product_input").autocomplete({
            source: "search.php",
            });
        });
        
        </script>
		<style type="text/css">
            .center_div{
            margin: 0 auto;
            width:90% /* value of your choice which suits your alignment */
            }
            @media (max-width: @screen-xs) {
                body{font-size: 10px;}
            }

            @media (max-width: @screen-sm) {
                body{font-size: 14px;}
            }
            .rcorners3 {
                border-radius: 25px;
                background: url(paper.gif);
                background-position: left top;
                background-repeat: repeat;
                padding: 20px;
                /*margin-top:20px; */
               /* width: 200px;
                height: 150px; */
            }
            
            
        </style>
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
                    background-color: #dddddd  ;
            }
            ul.list li{
              width: auto;
              float: right;
            }
        </style>


</head>
    <body style="background: #F5F5F5">


        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div id="dismiss">
                    <i class="fa fa-arrow-left"></i>
                </div>

                <div class="sidebar-header">
                    <h3>T.M. Jiwaji & Sons</h3>
                </div>

                <ul class="list-unstyled components">
                 
                    <li>
                        <a href="index.php">Inventory Management</a>
                    </li>
                    <li>
                        <a href="DailySales.php">Daily Sales</a>
                    </li>
                    <li>
                        <a href="PurchaseManagement.php">Purchase Management</a>
                    </li>
                    <li>
                        <a href="PurchaseReport.php">Generate Purchase Report</a>
                    </li>
                    <li>
                        <a href="Report.php">Generate Sales Report</a>
                    </li>
                </ul>

            </nav>

            <div id="content" style="background: #FFF">

                <nav class="navbar navbar-default" style="background: #42A5F5"> <!--#B2EBF2-->
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="fa fa-arrow-right"></i>
                                <!-- <span>Open Sidebar</span> -->
                                <span></span>
                            </button>
                        </div>

                        <div class=" navbar-collapse" id="bs-example-navbar-collapse-1">
                            <h3 style="text-align: center; color: white">
                                Taiyebali M. Jiwaji & Sons
                                <a href="Login/logout.php" style="float:right">Logout</a>

                            </h3>
                            <h4 style="color: white"><div style="float:right">Welcome <?php echo $user ?></div></h4>
                        </div>

                    </div>

                </nav>

                <div class="container center_div">
                    <div class="row ">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input class="btn btn-primary" name="add_product" id="add_product" style="margin:2%; float:left;" value="Add Product">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <!-- <input class="btn btn-primary" name="add_supplier" id="add_supplier" style="margin:2%;" value="Add Supplier"> -->
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            
                            <form id="product" method="get" action="" style="float:right" > 
                                <input type="text" name="product_input" id="product_input" class="product_input" placeholder="Search Product"  />
                                <img  src="images/search.png" style="height:5%;width:5%;" >
                                <input type="submit" class="btn btn-primary" name="submit_product"  style="" value="Enter" id="search_button" >
                            </form>
                        </div>
                            
                    </div>
                    

                    <br><br><br>

                   
                    <?php 
                        if(isset($_GET['submit_product'])){
                            $product=htmlentities($_GET['product_input']);
                            display_product($product);
                        }
                    ?>
                    <?php 
                            

                        $connection=connect_db();
                        
                        // echo "<script>alert($t)</script>";
                        $sql="select * from Inventory where deleted=0 order by item_name ASC";

                        $result = mysqli_query($connection,$sql);
                        if(mysqli_num_rows($result)){
                            // echo '<h2>Report of Today </h2>';
                            echo'<div id="product_table">
                                <table>
                                    <tr  style="background:#428bca;color:white" >
                    
                                        <th>Product</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Cost Price</th>
                                        <th>Sell Price</th>
                                        <th>Cabinet</th>
                                        <th>Tags</th>
                                        <th>Purchase Date</th>
                                        <th>Edit</th>
                                        
                                    </tr>';
                                 while($row = $result->fetch_assoc()){
                                    $time=$row["purchase_date"];
                                    $time1= date("d-m-Y ", (int)"$time");

                                    echo "<tr>
                                            <td>".$row["item_name"]."</td>
                                            <td>".$row["description"]."</td>
                                            <td>".$row["stock_amt"]."</td>
                                            <td>".$row["cost_price"]."</td>
                                            <td>".$row["sell_price"]."</td>
                                            <td>".$row["cabinet"]."</td>
                                            <td>".$row["tag"]."</td>
                                            <td>".$time1."</td>
                                            <td>
                                            	<input type='image' class='edit_data' id=".$row["id"]." src='images/edit.png' name='record' style='height:20px;width:18px'>
                                            	<input type='image' class='delete_data' id=".$row["id"]." src='images/icon-delete.png' name='record_delete'>
                                            </td>
                                           </tr>";
                                }
                                echo "</table></div>";
                            }
                            else
                                echo "<br><br><h1>No results found</h1>";

                            ?>
                            <?php 
                            function display_product(string $product){
                                $connection=connect_db();
//                                 echo "<script> 
//                                     $('#search_button').click(function(e){
//                                         e.preventDefault();
//                                         $('#product_table').hide();
                                        
//                                     });
//                                 </script>";
                                $sql="select * from Inventory where item_name='$product' order by item_name ASC";

                                $result = mysqli_query($connection,$sql);
                        if(mysqli_num_rows($result)){
                            // echo '<h2>Report of Today </h2>';
                            echo'<div style="background:#E0E0E0;margin-bottom:2%" class="rcorners3">
                                    <table style="margin-bottom:0%">
                                    <tr  style="background:#428bca;color:white" >
                    
                                        <th>Product</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Cost Price</th>
                                        <th>Sell Price</th>
                                        <th>Cabinet</th>
                                        <th>Tags</th>
                                        <th>Purchase Date</th>
                                        <th>Edit</th>
                                        
                                    </tr>';
                                 while($row = $result->fetch_assoc()){
                                    $time=$row["purchase_date"];
                                    $time1= date("d-m-Y ", (int)"$time");

                                    echo "<tr id='pro_table'>
                                            <td id='pro_name' class='pro_name'>".$row["item_name"]."</td>
                                            <td>".$row["description"]."</td>
                                            <td>".$row["stock_amt"]."</td>
                                            <td>".$row["cost_price"]."</td>
                                            <td>".$row["sell_price"]."</td>
                                            <td>".$row["cabinet"]."</td>
                                            <td>".$row["tag"]."</td>
                                            <td>".$time1."</td>
                                            <td>
                                                <input type='image' class='edit_data' id=".$row["id"]." src='images/edit.png' name='record' style='height:20px;width:18px'>
                                                <input type='image' class='delete_data' id=".$row["id"]." src='images/icon-delete.png' name='record_delete'>
                                            </td>
                                            </tr>";
                                }
                                echo "</table></div>";
                            }
                            else
                                echo "<br><br><h1>No results found</h1>";

                        }

                            
                        ?>
                        <!-- Try out below code for edit button -->
                        <!--  <button type='button' class='edit_data' id=".$row["id"]."  name='record' style='height:20px;width:18px'><i class='fa fa-pencil'></i></button> -->
                </div>
            </div>
        </div>


        <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Add Product</h4>  
                </div>  
                <div class="modal-body">  
                     <form id="InventoryForm" name="InventoryForm" action="addStock.php" method="post" style="padding: 20px" onsubmit="return validateForm()">
                    Item Name:<br>
                    <input type="text" name="item_name" id="item_name" class="item_name" required="required" >
                     <br>
                    Description:<br>
                    <input type="text" name="description" id="description" >
                    <br>
                    Quantity Present:<br>
                    <input type="number" name="stock_amt" id="stock_amt" min="0" required="required">
                    <br>
                    Date of Purchase:<br>
                    <input type="date" name="purchase_date" id="purchase_date" required="required">
                    <br>
                    Cost Price (in BD) :<br>
                    <input type="number" name="cost_price" id="cost_price" min="0" step="0.01" required="required">
                     <br>
                    Selling Price (in BD) :<br>
                    <input type="number" name="sell_price" id="sell_price" min="0" step="0.01" required="required">
                    <br>
                    Cabinet Number:<br>
                    <input type="number" name="cabinet" id="cabinet" value=""  >
                    <br>
                    Tags:<br>
                    <input type="text" name="tags" id="tags" >
                    <br>
                    
                    
                    <br><br>
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg btn-block" style="width:40%" >
                </form> 
                </div>   
                
           </div>  
      </div>  
 </div>  

    <div id="update_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Update Product</h4>  
                </div>  
                <div class="modal-body">  
                     <form id="UpdateForm" name="UpdateForm" action="updateStock.php" method="post" style="padding: 20px" onsubmit="">
                    Item Name:<br>
                    <input type="text" name="item_name" id="item_name_u" class="item_name" >
                     <br>
                    Description:<br>
                    <input type="text" name="description" id="description_u" >
                    <br>
                    Quantity Present:<br>
                    <input type="number" name="stock_amt" id="stock_amt_u" min="0">
                    <br>
                   <!--  Date of Purchase:<br>
                    <input type="date" name="purchase_date" id="purchase_date">
                    <br> -->
                    Cost Price (in BD) :<br>
                    <input type="number" name="cost_price" id="cost_price_u" min="0" step="0.01">
                     <br>
                    Selling Price (in BD) :<br>
                    <input type="number" name="sell_price" id="sell_price_u" min="0" step="0.01">
                    <br>
                    Cabinet Number:<br>
                    <input type="number" name="cabinet" id="cabinet_u" >
                    <br>
                    Tags:<br>
                    <input type="text" name="tags" id="tags_u" >
                    <br>
                    <input type="number" name="pro_id" id="pro_id_u" hidden="true">
                    <br>
                                        
                    <br><br>
                    <input type="submit" name="submit_update" value="Submit" class="btn btn-primary btn-lg btn-block" style="width:40%" >
                </form>  
                </div>   
                <!-- <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>  
                </div>  --> 
           </div>  
      </div>  
 </div>  

    <div id="add_supplier_data_Modal" class="modal fade">  
        <div class="modal-dialog">  
            <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Add Supplier</h4>  
                </div>  
                <div class="modal-body">  
                    <form id="SupplierForm" action="addSupplier.php" method="post" style="padding: 20px" required>
                        Supplier:<br>
                        <input type="text" name="supplier_name" id="location" >
                         <br>
                        Location:<br>
                        <input type="text" name="location" id="location" >
                        <br><br><br>
                        <input type="submit" class = "btn btn-primary btn-lg btn-block" name="submit_supplier" value="Submit" id="submit"  style="width:40%">
                    </form>
                </div>   
                <!-- <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>  
                </div>  --> 
            </div>  
        </div>  
    </div>  

             <!-- jQuery CDN -->
            <!-- <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script> -->
            <!-- Bootstrap Js CDN -->
            <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
            <!-- jQuery Custom Scroller CDN -->
            <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script> -->

            <script src="vendor/js/bootstrap.min.js"></script>
        
        <!-- jQuery Custom Scroller CDN -->
        <script src="vendor/mcustomscrollbar.concat.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#sidebar").mCustomScrollbar({
                        theme: "minimal"
                    });

                    $('#dismiss, .overlay').on('click', function () {
                        $('#sidebar').removeClass('active');
                        $('.overlay').fadeOut();
                    });

                    $('#sidebarCollapse').on('click', function () {
                        $('#sidebar').addClass('active');
                        $('.overlay').fadeIn();
                        $('.collapse.in').toggleClass('in');
                        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                    });
                });
            </script>

            <script type="text/javascript">
                $(document).ready(function(){  
                   $(".edit_data").click(function(e){
                    e.preventDefault();
                    
                       var id = $(this).attr("id");  
                       $.ajax({  
                            url:"fetch.php",  
                            method:"POST",  
                            data:{id:id},  
                            dataType:"JSON",  
                            success:function(data){  
                                   
                                 $('#item_name_u').val(data.item_name);
                                 $('#description_u').val(data.description);  
                                 $('#stock_amt_u').val(data.stock_amt);  
                                 $('#cost_price_u').val(data.cost_price);  
                                 $('#sell_price_u').val(data.sell_price);  
                                 $('#cabinet_u').val(data.cabinet);  
                                 $('#tags_u').val(data.tag);  
                                 $('#pro_id_u').val(data.id); 
                                 // var date= new Date(parseInt(data.purchase_date)*1000).format('dd/mm/yyyy');
                                 // $('#purchase_date').val(date);

                                
                                 $('#update_data_Modal').modal('show'); 
                            }  
                       });  
                  });  

                   $("#add_product").click(function(e){
                    e.preventDefault();
                    $('#add_data_Modal').modal('show'); 
                   });

                    $("#add_supplier").click(function(e){
                    e.preventDefault();
                    $('#add_supplier_data_Modal').modal('show'); 
                   });


                    $(".delete_data").click(function(e){
                    e.preventDefault();
                    
                       var id = $(this).attr("id");  
                       $.ajax({  
                            url:"deleteProduct.php",  
                            method:"POST",  
                            data:{id:id},  
                            success:function(){  
                                deleteSwal();
                                setTimeout(function(){
                                   window.location.reload();
                            }, 2000);  
                                   
                            }  
                       });  
                  });  
                    // $("#search_button").click(function(e){
                    // e.preventDefault();

                    //     $("#product_table").hide();
                    //     return;
                    // });
                });
            </script>
            <script type="text/javascript">
            function validateForm() {
            var cp = document.forms["InventoryForm"]["cost_price"].value;
            var sp = document.forms["InventoryForm"]["sell_price"].value;
            cp = parseInt(cp);
            sp = parseInt(sp);

            if (cp > sp) {
                swal({
                    title: "Error!",
                    text: "Cost price is more than Selling Price!",
                    icon: "error",
                    button: "Ok!",
                });
            
            return false;
                }
            }
            function deleteSwal(){
                swal({
                    title: "Success",
                    text: "Item has been deleted!",
                    icon: "success",
                    button: "Ok!",
                });
            }
        </script>
        
    </body>
</html>
