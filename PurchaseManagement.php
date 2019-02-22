<?php
session_start();
include "db.php";
// if((!isset($_SESSION["username"]) && !isset($_SESSION["role"]=="admin")))
$user = $_SESSION['username'];
if((!isset($_SESSION['username']) && $_SESSION['role'] != "admin")){
   
    header("location: Login/login.php");
}
else if((isset($_SESSION['username']) && $_SESSION['role'] == "worker"))
{
    header("location: test.php");   
}
// else
//     {
//         header("location: Login/login.php");
//     }   
?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
       

        <?php include 'includes.php';?>

        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
         <!-- <script src="js/addProduct.js" type="text/javascript"></script> -->
        <!-- <script src="js/addProduct.js" type="text/javascript"></script> -->


        <title>T.M. Jiwaji</title>

        <!-- Bootstrap CSS CDN -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <!-- Our Custom CSS -->
        <!-- <link rel="stylesheet" href="style3.css"> -->
        <!-- Scrollbar Custom CSS -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css"> -->
        <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" /> -->

        <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
        <!-- BELOW THREE LINKS ARE FOR AUTOCOMPLETE FUNCTION. DONT TOUCH -->
        <!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
<!-- COMMENTED BELOW MIN.JS -->
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script> -->

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<!-- <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> -->

<!-- Bootstrap Date-Picker Plugin -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/> -->
        
<!-- Link for FONT AWESOME Icons -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
        

        <script>
        $(function() {
            $("#purc_item_name").autocomplete({
            source: "search.php",
            });
        });

        </script>
        <script type="text/javascript">
             jQuery(function($) {
  var i = 0;
  //var j=new array();
  $('#theButton').click(addAnotherTextBox);
  function addAnotherTextBox() {
    $("#theForm").append("<div class='rcorners3' style='background: #C0C0C0; padding:2%';>\
                            <input type='image' src='images/cross.png' class='delete-row' name='record' style='float:right;height:2%;width:2%'>\
                            <b><h3>Product number "+ (i+1) + "</h3></b><br>\
                            Item Name:<br>\
                                <input type='text' class='product_name' name='purc_item_name"+ i +"' id='purc_item_name'  style='width:40%' required='required' autocomplete='off'><br>\
                            Quantity purchase:<br>\
                                <input type='number' min='0'  name='purchase_quantity"+ i +"' id='stock_bought' style='width:40%' required='required''><br>\
                            Cost Price (in BD) :<br>\
                                <input type='number' min='0' step='0.01' style='width:40%' name='cost_price"+ i +"' id='cost_price' placeholder='Enter Cost price of single Pc.' required='required' ><br>\
                            Selling Price (in BD) : <br>\
                                <input type='number' step='0.01' min='0' name='sell_price"+ i +"' id='sell_price' style='width:40%' placeholder='Enter Selling price of single Pc.' required='required''><br>\
                            Whole Sale Price (in BD) : <br>\
                            <input type='number' step='0.01' min='0' name='wholesale_price"+ i +"' id='wholesale_price' style='width:40%' placeholder='Enter Whole Sale price of single Pc.' '><br>\
                            Description:<br>\
                                <input type='text' name='description"+ i +"' id='description' style='width:40%'><br>\
                            Cabinet Number:<br>\
                                <input type='number' name='cabinet"+ i +"' id='cabinet' style='width:40%'' ><br>\
                            Tags:<br>\
                                <input type='text' name='tags"+ i +"' id='tags' style='width:40%'><br>\
                            \
                            </div>");
    i++;
    $("#hideme").val(i);

   }

        //code to make the delete button work
        $(document).ready(function() {
            $("#theForm").on('click','.delete-row', function() {
                $(this).closest('div').remove();
                i--;
                $("#hideme").val(i);
                // console.log("clicked delete button");
                // Update total when delete button clicked code below
                
            });
        });

        //code for auto complete of the textbox
   $("#theForm").on("keydown","input.product_name",function(){
            $(this).autocomplete({
            source: "search.php",
            });
        });
});

        </script>
        <style type="text/css">
.icon{
  padding-left: 10px;
  margin-right: 20px;
}
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
                margin-top:20px; 
               /* width: 200px;
                height: 150px; */
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
                        <a href="Report.html">Generate Sales Report</a>
                    </li>
                </ul>

                <!--<ul class="list-unstyled CTAs">
                    <li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a></li>
                    <li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a></li>
                </ul>-->
            </nav>

            <!-- Page Content Holder -->
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
                  <h3 style="text-align: center">
                    Purchase Management
                 </h3>



                <div class="container center_div rcorners3"  style="background: #E0E0E0; margin-bottom: 5%">
                    <!-- <div class="row"> -->
                        <!-- <div class="col-md-4 col-md-offset-4"> -->

                <form id="PurchaseForm"  action="purchaseform.php" method="post" style="padding: 20px" onsubmit="return validateForm()">
                    Invoice Number:<br>
                    <input type="number" name="invoice" id="invoice" min="0" required="required">
                    <br>
                    Date of Purchase:<br>
                    <input type="date"  name="date_of_purchase" id="date_of_purchase" required="required" >
                    <br>
                    Purchase made by:<br>
                    <!-- <input type="text" name="purc_person"  id="purc_person" required="required"> -->
                    <select type="text" name="purc_person" id="purc_person" >
                    <?php
                    $connection=connect_db();
                    $sql = mysqli_query($connection, "SELECT username from users order by username ASC");
                    while ($row = $sql->fetch_assoc()){
                        echo "<option value=".$row['username']."><column>".$row['username']."</column> </option>";
                    } 
                    ?>
                    </select>
                    <br>
                    Supplier: <br>
                    <select name="supplier" id="supplier" type="text" required="required">
                    <?php
                        $connection=connect_db();
                        $sql = mysqli_query($connection, "SELECT id,supplier_name,location FROM Supplier order by supplier_name ASC");
                        while ($row = $sql->fetch_assoc()){
                            echo "<option value=".$row['id']."><column>" . $row['supplier_name'] . "</column> - <column>". $row['location'] ."</column></option>";
                        } 
                    ?>
                    </select>
                    <input class="btn btn-primary" name="add_supplier" id="add_supplier"  value="Add Supplier">
                    <br>
                    Payment form:<br>
                    <input type="radio" name="payment" value="cash"/> Cash<br>
                    <input type="radio" name="payment" value="credit"/> Credit<br>
                    Total Payable Amount:<br>
                    <input type="number" name="payable" id="payable" required="required" min="0" step="0.01"><br><br>



                    <div id='theForm'></div>
                    <br>


                    <!-- <button type="button" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-plus-sign"></span> Plus
                    </button> -->
                    <input type="submit" class = "btn btn-success btn-lg " name="submit" style="width:48%"  value="Submit" id="submit" >  

                    <button id='theButton' class = "btn btn-primary btn-lg " style="width:48%;float:right" type='button' style=''>
                        <i class="fa fa-plus icon" aria-hidden="true"> Add Product</i>
                    </button>
                    <input id='hideme'  name='hideme'  type='hidden'/>
                    <input id='hideme2'  value='' name='rec' type='hidden'/>
                    <br>
                    <!-- Item Name:<br>
                    <input type="text" name="purc_item_name" id="purc_item_name" style="width:40%">
                    <br>
                    Quantity purchase:<br>
                    <input type="number" name="stock_bought" id="stock_bought">
                    <br>
                   
                    
                    Cost Price:<br>
                    <input type="number" name="cost_price" id="cost_price" placeholder="Enter CP of single Pc.">
                    <br>
                    Selling Price: <br>
                    <input type="number" name="sell_price" id="sell_price">
                    <br>
                    Description:<br>
                    <input type="text" name="description" id="description" style="width:40%">
                    <br>
                    Cabinet Number:<br>
                    <input type="number" name="cabinet" id="cabinet" >
                    <br>
                   
                    Tags:<br>
                    <input type="text" name="tags" id="tags" style="width:40%">
                    <br>
                     -->
                   <br>
                    <!-- TOTAL PAYABLE AMOUNT FIELD NEEDED? -->


                </form> 
            <!-- </div> -->
            <!-- </div> -->
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

        <div class="overlay"></div>


        <!-- jQuery CDN -->
        <!-- COMMENTED BEOW MIN.JS -->
        <!-- <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script> -->
        <!-- Bootstrap Js CDN -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
        <!-- jQuery Custom Scroller CDN -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script> -->

        <!-- <script src="js/addProduct.js" type="text/javascript"></script> -->
        <script src="vendor/js/bootstrap.min.js"></script>
        
        <!-- jQuery Custom Scroller CDN -->
        <script src="vendor/mcustomscrollbar.concat.min.js"></script>

     <!--    <script type="text/javascript">  
        $(document).ready(function() {  
            $("#theButton").on("click", function() {  
                $("#theForm").append("<div><br><input type='text'/><br></div>");  
            });  
        })
        </script> -->
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
            $(document).ready(function(){  
                $("#add_supplier").click(function(e){
                        e.preventDefault();
                        $('#add_supplier_data_Modal').modal('show'); 
                       });
            });
        </script>

        <!-- Below script does not work since id does not match(probably) -->
        <script type="text/javascript">
            function validateForm() {
            var cp = document.forms["PurchaseForm"]["cost_price"].value;
            var sp = document.forms["PurchaseForm"]["sell_price"].value;
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
        </script>
    </body>
</html>