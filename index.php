<?php
session_start();
include "db.php";
// if((!isset($_SESSION["username"]) && !isset($_SESSION["role"]=="admin")))
$user = $_SESSION['username'];
if((!isset($_SESSION['username']) && $_SESSION['role'] != "admin")){
   
    header("location: Login/login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>T.M. Jivaji & Sons</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style3.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>




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
                    <i class="glyphicon glyphicon-arrow-left"></i>
                </div>

                <div class="sidebar-header">
                    <h3>TMJivaji & Sons</h3>
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
                        <a href="Report.php">Generate General Report</a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content" style="background: #FFF">

                <nav class="navbar navbar-default" style="background: #42A5F5"> <!--#B2EBF2-->
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <!-- <span>Open Sidebar</span> -->
                                <span></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <h3 style="text-align: center; color: white">
                                Tayyebali M. Jivaji & Sons
                                <a href="Login/logout.php" style="float:right">Logout</a>
                            </h3>
                            <h4 style="color: white"><div style="float:right">Welcome <?php echo $user ?></div></h4>
                           
                        </div>

                    </div>

                </nav>
                  <h3 style="text-align: center">
                    Inventory Management
                 </h3>
               <div class="col-lg-6 col-sm-12 col-md-6"  >
                <div class="container-fluid rcorners3" style="margin-left:2%; margin-right: 2%; margin-bottom: 5%; background: #E0E0E0"; >
                    <div class="row ">
                        <!-- <div class="col-md-4 col-md-offset-4"> -->
                <form id="InventoryForm" name="InventoryForm" action="addStock.php" method="post" style="padding: 20px" onsubmit="return validateForm()">
                    Item Name:<br>
                    <input type="text" name="item_name" id="item_name" >
                     <br>
                    Description:<br>
                    <input type="text" name="description" id="description" >
                    <br>
                    Quantity Present:<br>
                    <input type="number" name="stock_amt" id="stock_amt" min="0">
                    <br>
                    <!-- Supplier: <br>
                    <select name="supplier" id="supplier" type="text" > -->
                    <!-- <?php
                    $connection=connect_db();
                    $sql = mysqli_query($connection, "SELECT id,supplier_name,location FROM Supplier order by supplier_name ASC");
                    while ($row = $sql->fetch_assoc()){
                        echo "<option value=".$row['id']."><column>" . $row['supplier_name'] . "</column> - <column>". $row['location'] ."</column></option>";
                    } 
                    ?> -->
                    <!-- </select><br> -->
                    Date of Purchase:<br>
                    <input type="date" name="purchase_date" id="purchase_date">
                    <br>
                    Cost Price (in BD) :<br>
                    <input type="number" name="cost_price" id="cost_price" min="0" step="0.01">
                     <br>
                    Selling Price (in BD) :<br>
                    <input type="number" name="sell_price" id="sell_price" min="0" step="0.01">
                    <br>
                    Cabinet Number:<br>
                    <input type="number" name="cabinet" id="cabinet" min="0" >
                    <br>
                    Tags:<br>
                    <input type="text" name="tags" id="tags" >
                    <br>
                    
                    
                    <br><br>
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg btn-block" style="width:40%" >
                </form> 

            </div>
            <!-- </div> -->
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-6" >
             <div class="container-fluid rcorners3" style="margin-left:2%; margin-right: 2%; background: #E0E0E0">
                    <div class="row">
                <form id="SupplierForm" action="addSupplier.php" method="post" style="padding: 20px" required>
                    Supplier:<br>
                    <input type="text" name="supplier_name" id="location" >
                     <br>
                    Location:<br>
                    <input type="text" name="location" id="location" >
                    <br><br><br>
                    <input type="submit" class = "btn btn-primary btn-lg btn-block" name="submit" value="Submit" id="submit"  style="width:40%">


                </form>
            </div>
        </div>
    </div>
            </div>
        </div>



        <div class="overlay"></div>


        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

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
            function validateForm() {
            var cp = document.forms["InventoryForm"]["cost_price"].value;
            var sp = document.forms["InventoryForm"]["sell_price"].value;


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
   
    
<!--    <script type="text/javascript">
      function showSwal(){
        swal({
         title: "Thank You!",
         text: "Your response has been recorded!",
         icon: "success",
         button: "Ok!",
        });
        return true;
      }

    </script> -->
    <!--<script>
    document.getElementById('InventoryForm').onsubmit = function(){
 swal({
         title: "Thank You!",
         text: "Your response has been recorded!",
         icon: "success",
         button: "Ok!",
        });

    };

  </script>
  <script>
    $("form#SupplierForm").on('submit',function(event){
        
 swal({
         title: "Thank You!",
         text: "Supplier has been added!",
         icon: "success",
         button: "Ok!",
        });

    });

  </script>-->
 <!--  <script type="text/javascript">
      $(function(){
        $('#SupplierForm').on('submit',function(e){
             e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
            $.ajax({
                url:'addSupplier.php',
                data:$('#SupplierForm').serialize(),
                type:'POST',
                success:function(data){
        console.log(data);
        //Success Message == 'Title', 'Message body', Last one leave as it is
        swal("¡Success!", "Message sent!", "success");
      },
      error:function(data){
        //Error Message == 'Title', 'Message body', Last one leave as it is
        swal("Oops...", "Something went wrong :(", "error");
      }
    });
   
  });
});
  </script> -->
   <!-- <script type="text/javascript">
      $(function(){
        $('input#Suppliersubmit').on('click',function(e){
           //  e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
            $.ajax({
                url:'addSupplier.php',
                data:$('form#SupplierForm').serialize(),
                type:'POST',
                success:function(data){
        console.log(data);
        //Success Message == 'Title', 'Message body', Last one leave as it is
        swal("¡Success!", "Message sent!", "success");
      },
      error:function(data){
        //Error Message == 'Title', 'Message body', Last one leave as it is
        swal("Oops...", "Something went wrong :(", "error");
      }
    });
   
  });
});
  </script> -->
    </body>
</html>
