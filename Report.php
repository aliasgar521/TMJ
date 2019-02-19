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
?>
<!DOCTYPE html>
<html>
    <head>
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
        
        <?php include 'includes.php';?>
        <title>T.M. Jiwaji & Sons</title>

        <!-- Bootstrap CSS CDN -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <!-- Our Custom CSS -->
        <!-- <link rel="stylesheet" href="style3.css"> -->
        <!-- Scrollbar Custom CSS -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css"> -->



          <!-- BELOW THREE LINKS ARE FOR AUTOCOMPLETE FUNCTION. DONT TOUCH -->
        <!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->


        <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
        <!-- <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> -->

        <!-- Bootstrap Date-Picker Plugin -->
        <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script> -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/> -->
                
        <!-- Link for FONT AWESOME Icons -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
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
            .wrapper1 {
                text-align: center;
            }

            .button1 {
                position: absolute;
                top: 50%;
            }
             .rcorners3 {
                border-radius: 10px;
                /*background: url(paper.gif);
                background-position: left top;
                background-repeat: repeat;*/
                padding: 4%;
                margin-top:20px; 
                background:#E0E0E0;
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
                        <a href="Report.php">Generate Sales Report</a>
                    </li>
                </ul>
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

                        <div class="navbar-collapse" id="bs-example-navbar-collapse-1">
                            <h3 style="text-align: center; color: white">
                                Taiyebali M. Jiwaji & Sons
                                <a href="Login/logout.php" style="float:right">Logout</a>

                            </h3>
                            <h4 style="color: white"><div style="float:right">Welcome <?php echo $user ?></div></h4>
                        </div>
                            
                        

                    </div>

                </nav>
                  <h3 style="text-align: center">
                    Generate Report
                 </h3>
              <br><br>
                <div class="container-fluid center_div">
                    <div class="row ">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <form id="date_report" method="get" action="#" class="rcorners3"> 
                                <input type="submit" class="btn btn-primary btn-block" name="submit" value="Generate Todays Report!">
                            </form>
                            <form id="date_report" method="get" action="#"  class="rcorners3"> 
                                <input type="date"  name="single_date" id="single_date" style="margin-left: 2%">
                                <input type="submit" class="btn btn-primary" name="submit_date" style="margin-left:2%" value="Generate Report!">
                            </form>
                             <form id="product" method="get" action="#"  class="rcorners3"> 
                                Enter Product: 
                                <input type="text" name="product_input" id="product_input" class="product_input" style="width:67%"/>
                                <input type="submit" class="btn btn-primary" name="submit_product"  style="margin:2%" value="Generate Specific Product Purchase Report!">
 
                            </form>
                        </div>
                    
                    
                        <div class="col-lg-8 col-md-8 col-sm-12">
                    <?php 
                        if(isset($_GET['submit']))
                        {
                            display();
                        }
                        else if(isset($_GET['submit_date'])){
                            $date=htmlentities($_GET['single_date']);
                            $date1=strtotime($date);
                            echo "<script>console.log($date1)</script>";
                            display_date($date,$date1);

                        }
                        else if(isset($_GET['submit_product'])){
                            $product=htmlentities($_GET['product_input']);
                            display_product($product);
                        }
                    ?>
                    <?php 

                        function display(){
                            $connection=connect_db();
                            // date_default_timezone_set('Asia/Bahrain');
                            $date = date('d-m-Y 00:00:00', time());
                            $t=strtotime($date);
                            $t2=($t)+86400;
                            // echo "<script>alert($t)</script>";
                            $sql="select sales_date,item_name,quantity,SalesDetails.sell_price,profit,sales_person from SalesDetails join Sales on SalesDetails.bill_id=Sales.bill_id join Inventory on SalesDetails.product_id=Inventory.id where sales_date> '$t' AND sales_date< '$t2' ";

                            $result = mysqli_query($connection,$sql);
                            if(mysqli_num_rows($result)){
                                echo '<h2>Report of Today </h2>';
                                 echo'</u></h2><table>
                                        <tr  style="background:#428bca;color:white" >
                                            

                                            <th>Date & Time</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Sold For</th>
                                            <th>Profit</th>
                                            <th>Sales Person</th>
                                            
                                            
                                            
                                        </tr>';
                                     while($row = $result->fetch_assoc()){
                                        $time=$row["sales_date"];
                                        $time1= date("d-m-Y h:i a ", substr("$time", 0, 10));

                                        echo "<tr><td>".$time1."</td><td>".$row["item_name"]."</td><td>".$row["quantity"]."</td><td>".$row["sell_price"]."</td><td>".$row["profit"]."</td><td>".$row["sales_person"]."</td></tr>";
                                    }
                                    echo "</table>";
                                }
                                else
                                    echo "<br><br><h1>No results found</h1>";
                        }

                        function display_date(string $date,int $date1){
                            $connection=connect_db();
                            $date2=($date1)+86400;    
                            echo "<script>console.log($date2)</script>";
                            $sql="select sales_date,item_name,quantity,SalesDetails.sell_price,profit,sales_person from SalesDetails join Sales on SalesDetails.bill_id=Sales.bill_id join Inventory on SalesDetails.product_id=Inventory.id where sales_date > '$date1' AND sales_date < '$date2'";

                            $result = mysqli_query($connection,$sql);
                            if(mysqli_num_rows($result)){
                                echo '<h2>Purchase report of Date <u>';
                                echo $date; echo'</u></h2><table>
                                <tr  style="background:#42A5F5;color:white" >
                                    <th>Date & Time</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Sold For</th>
                                    <th>Profit</th>
                                    <th>Sales Person</th>
                                
                                </tr>';
                                while($row = $result->fetch_assoc()){
                                    $time=$row["sales_date"];
                                    $time1= date("d-m-Y h:i a ", substr("$time", 0, 10));

                                    echo "<tr><td>".$time1."</td><td>".$row["item_name"]."</td><td>".$row["quantity"]."</td><td>".$row["sell_price"]."</td><td>".$row["profit"]."</td><td>".$row["sales_person"]."</td></tr>";
                                }
                                echo "</table>";
                            }
                            else
                                echo "<br><br><h1>No results Found</h1>";
                        }

                        function display_product(string $product){
                            $connection=connect_db();
                            $sql="select sales_date,item_name,quantity,SalesDetails.sell_price,profit,sales_person from SalesDetails join Sales on SalesDetails.bill_id=Sales.bill_id join Inventory on SalesDetails.product_id=Inventory.id where item_name='$product' order by sales_date DESC";

                            $result = mysqli_query($connection,$sql);
                            if(mysqli_num_rows($result)){
                                echo '<h2>Report of Product <u>';
                                echo $product; echo'</u></h2><table>
                                <tr  style="background:#428bca;color:white" >
                                    <th>Date & Time</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Sold For</th>
                                    <th>Profit</th>
                                    <th>Sales Person</th>
                                </tr>';
                                while($row = $result->fetch_assoc()){
                                    $time=$row["sales_date"];
                                    $time1= date("d-m-Y h:i a ", substr("$time", 0, 10));

                                    echo "<tr><td>".$time1."</td><td>".$row["item_name"]."</td><td>".$row["quantity"]."</td><td>".$row["sell_price"]."</td><td>".$row["profit"]."</td><td>".$row["sales_person"]."</td></tr>";
                                }
                                echo "</table>";
                            }
                            else
                                echo "<br><br><h1>No results found</h1>";
                        }
                        ?>
                        
                    </table>
                </div>
            
                </div>
            </div>
        </div>



        <div class="overlay"></div>


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
    </body>
</html>
