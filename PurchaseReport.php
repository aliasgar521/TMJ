<?php
session_start();
include "db.php";
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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
        <!-- <script src="js/addProduct.js" type="text/javascript"></script> -->
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

        <div class="wrapper" >
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
            <div id="content" style="background: #FFF; margin-bottom: 10%;">

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
                    Generate Purchase Report
                 </h3>
               
                <div class="container-fluid center_div">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <br><br>
                            <form id="date_report" method="get" action="#" class="rcorners3"> 
                                Enter Date:&nbsp;
                                <input type="date"  name="single_date" id="single_date" ><br><br>
                                <input type="submit" class="btn btn-primary btn-block" name="submit_date"  value="Generate Report!">
                            </form>
                            
                            <form id="date_report2" method="get" action="#" class="rcorners3"> 
                                From Date:&nbsp;
                                <input type="date"  name="double_date1" id="double_date1"><br><br>
                                To Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="date"  name="double_date2" id="double_date2"><br><br>
                                <input type="submit" class="btn btn-primary btn-block" name="submit_double_date" value="Generate Report!">
                            </form>
                            
                            <form id="product" method="get" action="#" class="rcorners3"> 
                                Enter Product: 
                                <input type="text" name="product_input" id="product_input" class="product_input" style="width:67%"/><br><br>
                               
                                <input type="submit" class="btn btn-primary btn-block" name="submit"  value="Generate Product Purchase Report!">
                                
                            </form>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            
                            <br>
                            <br>
                             <?php 
                                    if(isset($_GET['submit']))
                                    {
                                        $product=htmlentities($_GET['product_input']);
                                        $message = "Success! You entered: ".$product;
                                        display($product);
                                    } 
                                    else if(isset($_GET['submit_double_date']))
                                    {
                                        $ddate1=htmlentities($_GET['double_date1']);
                                        $ddate2=htmlentities($_GET['double_date2']);
                                        

                                      
                                        display_ddate($ddate1,$ddate2);
                                    } 
                                    else if(isset($_GET['submit_date']))
                                    {
                                        $date=htmlentities($_GET['single_date']);
                                        $message = "Success! You entered: ".$date;
                                        $date1=strtotime($date);
                                        display_date($date,$date1);
                                    } 
                                ?>
                                <?php 

                                    function display(string $product){
                                    $connection=connect_db();
                                    $sql="SELECT pro_name,quantity,supplier_name,cost_price,purchase_date from invandpro join Invoice on Invoice.id = invandpro.invoice_id join Supplier on Invoice.supplier_id=Supplier.id where pro_name = '$product'";

                                    $result = mysqli_query($connection,$sql);
                                    if(mysqli_num_rows($result)){
                                        echo '<h2>Report of Product <u>';
                                        echo $product; 
                                        echo'</u></h2><table>
                                        <tr  style="background:#428bca;color:white" >
                                            <th text-align:center>Date</th>
                                            <th>Supplier</th>
                                            <th>Product</th>
                                            <th>Cost Price</th>
                                            <th>Quantity</th>   
                                        </tr>';
                                        while($row = $result->fetch_assoc()){
                                            $time=$row["purchase_date"];
                                            $time1= date("d-m-Y ", substr("$time", 0, 10));

                                            echo "<tr>
                                                    <td>".$time1."</td>
                                                    <td>".$row["supplier_name"]."</td>
                                                    <td>".$row["pro_name"]."</td>
                                                    <td>".$row["cost_price"]."</td>
                                                    <td>".$row["quantity"]."</td>
                                                    </tr>";
                                        }
                                        echo "</table>";
                                    }
                                    else
                                        echo "<br><br><h1>No results found</h1>";
                                     $connection->close();
                                    }
                                     function display_date(string $date,string $date1){
                                    $connection=connect_db();
                                        //$product = $menu['product_input'];
                                        // $sql="SELECT pro_name,quantity,cost_price from invandpro where pro_name = '$product';";
                                    $t1=strtotime($date);
                                    $sql="SELECT purchase_date,purchase_person,invoice_number,pro_name,quantity,cost_price,supplier_name from Invoice join invandpro on Invoice.id=invandpro.invoice_id join Supplier on Invoice.supplier_id=Supplier.id where purchase_date = '$t1'";

                                    $result = mysqli_query($connection,$sql);
                                    if(mysqli_num_rows($result)){
                                        echo '<h2>Purchase report of Date <u>';
                                                 echo $date; echo'</u></h2><table>
                                                <tr  style="background:#42A5F5;color:white" >
                                                    <th>Date</th>
                                                    <th>Supplier</th>
                                                    <th>Purchased By</th>
                                                    <th>Invoice</th>
                                                    <th>Product</th>
                                                    <th>Cost Price</th>
                                                    <th>Quantity</th>
                                                    
                                                </tr>';
                                            while($row = $result->fetch_assoc()){
                                                $time=$row["purchase_date"];
                                                $time1= date("d-m-Y ", substr("$time", 0, 10));

                                                echo "<tr>
                                                        <td>".$time1."</td>
                                                        <td>".$row["supplier_name"]."</td>
                                                        <td>".$row["purchase_person"]."</td>
                                                        <td>".$row["invoice_number"]."</td>
                                                        <td>".$row["pro_name"]."</td>
                                                        <td>".$row["cost_price"]."</td>
                                                        <td>".$row["quantity"]."</td>
                                                    </tr>";
                                            }
                                            echo "</table>";
                                        }
                                        else
                                            echo "<br><br><h1>No results Found</h1>";
                                         $connection->close();
                                    }
                                    function display_ddate(string $ddate1,string $ddate2){
                                    $connection=connect_db();
                                        //$product = $menu['product_input'];
                                        // $sql="SELECT pro_name,quantity,cost_price from invandpro where pro_name = '$product';";
                                    $t1=strtotime($ddate1);
                                    $t2=strtotime($ddate2);

                                    $sql="SELECT purchase_date,purchase_person,invoice_number,pro_name,quantity,cost_price,supplier_name from Invoice join invandpro on Invoice.id=invandpro.invoice_id join Supplier on Invoice.supplier_id=Supplier.id where purchase_date between '$t1' and '$t2' order by purchase_date ASC";

                                    $result = mysqli_query($connection,$sql);
                                    if(mysqli_num_rows($result)){
                                        echo '<h2>Purchase report since <u>';
                                        echo $ddate1; 
                                        echo ' to '; 
                                        echo $ddate2; 
                                        echo 
                                        '</u></h2>
                                        <table>
                                            <tr style="background:#42A5F5;color:white" >
                                                <th>Date</th>
                                                <th>Supplier</th>
                                                <th>Purchased By</th>
                                                <th>Invoice</th>
                                                <th>Product</th>
                                                <th>Cost Price</th>
                                                <th>Quantity</th>
                                            </tr>';
                                        while($row = $result->fetch_assoc()){
                                            $time=$row["purchase_date"];
                                            $time1= date("d-m-Y ", substr("$time", 0, 10));

                                            echo "<tr>
                                                    <td>".$time1."</td>
                                                    <td>".$row["supplier_name"]."</td>
                                                    <td>".$row["purchase_person"]."</td>
                                                    <td>".$row["invoice_number"]."</td>
                                                    <td>".$row["pro_name"]."</td>
                                                    <td>".$row["cost_price"]."</td>
                                                    <td>".$row["quantity"]."</td>
                                                </tr>";
                                        }
                                        echo "</table>";
                                    }
                                    else
                                        echo "<br><br><h1>No results Found</h1>";
                                         $connection->close();
                                    }
                                    ?>
                                    
                                
                                
                            <!-- </table> -->
                        </div>

                           
                    </div>
                    <!-- Above is row wala div -->
                </div>
                <!-- Above is container wala div -->
            </div>    <!--content div -->
        </div>   <!--wrapper div -->


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
