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

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style3.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

        <!-- Used to make the drop down list better looking -->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">


        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script> -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

        <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
        <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

       

		<script>
      
        $(function() {
            $("input.product_input").autocomplete({
            source: "search_availability.php",
            });
        });
        </script>
        <!-- Ajax script for entering values to table -->

        <script type="text/javascript">
            $(document).ready(function() {
                var j=0;
                $("#button_add_product").click(function(e){
                    e.preventDefault();
                    
                        var name=document.getElementById("product_input").value;
                        var quantity=document.getElementById("product_quant").value;
                        $.ajax({
                        url: "test3p.php",
                        type: "GET",
                        data: { name: name, quantity: quantity },
                        success: function (response) {   
                        var obj=JSON.parse(response);
                        var row = $('<tr>');
                            for(var i = 0; i < 4; i++) {
                                if(i==0){
                                    row.append($('<td>').html(obj[i]));
                                }
                                else if(i==1){
                                    
                                    row.append($('<td>').html(obj[i]));
                                }
                                else if(i==2){
                                    row.append($('<td class="sell_price_input" name="pro_sp"'+j+' contenteditable="true">').html(obj[i]));
                                }
                                else if(i==3){
                                    row.append($('<td id="total_price_input" name="total_sp"'+j+ 'contenteditable="true">').html(obj[i]));
                                }
                                else{
                                    row.append($('<td>').html(obj[i]));
                                }
                                row.append($('</td>'));
                            }
                            
                            j++;
                            row.append($('<td><input type="image" class="delete-row" id="delete-button" src="icon-delete.png" name="record"></button></td></tr>'));
                            // row.append($('<td value = "pro_name"'+j+'></td></tr>'));

                            $('#marked').append(row);

                        }


                 // }
             });
                        // var namezz = $("#test1230").attr("name");
                           // alert($('#test0').attr('value'));
                        $("#hideme").val(j);
                        document.getElementById("product_input").focus;
                        console.log("The Value of J is "+ j);
                         
                });
            });

            $(document).ready(function() {
            $("#marked").on('click','.delete-row', function() {
                $(this).closest('tr').remove();
                });
            });

            $(document).ready(function(){
                $(".calculate-total").on('click',function(){
                    var table=document.getElementById("myTable");
                    var totalCost=document.getElementById("total-value");
                    var sumVal=0;
                    for(var i=1; i < table.rows.length; i++){
                        sumVal = sumVal + parseInt(table.rows[i].cells[3].innerHTML);
                    }
                    console.log(sumVal);
                     // $("total-value").append(sumVal);
                    totalCost.value = sumVal;

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
                margin-top:20px; 
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
			tr:nth-child(even) {
			        background-color: #AEB6BF  ;
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
                        <a href="Report.html">Generate General Report</a>
                    </li>
                </ul>
            </nav>

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
                        </div>

                    </div>

                </nav>

                <div class="container center_div">

                	<form id="product" method="get" action=""> 
                       
                
                        Enter Product: 
                        <input type="text" name="product_input" id="product_input" class="product_input" placeholder="Product Name" />   
                        <input type="text" name="product_quant" id="product_quant" class="product_quant" placeholder="Quantity Required" />     
                        <button type="submit" class="btn btn-md btn-primary" value="Add Row" id="button_add_product"  name="submit" >Add Product</button><br><br>
                        
                    </form>

                    
                    <div class="container-fluid">
                        <div class="row">
                            <div class= "col-lg-8">
                                <div class="container-fluid rcorners3" style=" margin-right: 1%; background: #E0E0E0";>
                                    <form action="" method="">
                                        <table id="myTable">
                                            <thead>
                                                <tr style="background:#428bca;color:white" >
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Selling Price</th>
                                                    <th>Total Price</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                      
                                            <tbody id="marked">
                                              
                                            </tbody>
                                            
                                        </table>
                                        <input id='hideme'  name='hideme'  type='hidden'/>
                                        <input type="submit" class="btn btn-success btn-md btn-block" id="Finalize_sale" value="Finalize Sale" name="submit">
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4 rcorners3" style=" background: #E0E0E0";>
                                Total:&nbsp;&nbsp;
                                
                                <textarea id="total-value" style="height:25px; "></textarea><br><br>
                                <input type="submit" class="btn btn-md btn-primary calculate-total" id="button" value="Calculate Total" name="submit" >
                                

                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

        <div class="overlay"></div>
         <!-- jQuery CDN -->
        <!-- <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script> -->
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
            $(document).ready(function() {
            $("#Finalize_sale").click(function(e){
                e.preventDefault();
                    counter= document.getElementById("hideme").value;
                    // console.log("The Value of J is "+ j);
                var TableData;
                TableData = storeTblValues()
                TableData = JSON.stringify(TableData);

                alert(TableData);
                $.ajax({
                    type: "POST",
                    url: "test5p.php",
                    data: "pTableData=" + TableData + "&counter_value=" + counter,
                    success: function(msg){
                        // return value stored in msg variable
                        alert(msg);
                    }
                });
                });
            });


            function storeTblValues()
            {
                var counter=0;
                var TableData = new Array();

                $('#myTable tr').each(function(row, tr){
                    TableData[row]={
                        "product" : $(tr).find('td:eq(0)').text()
                        , "quantity" :$(tr).find('td:eq(1)').text()
                        , "sp" : $(tr).find('td:eq(2)').text()
                        , "tsp" : $(tr).find('td:eq(3)').text()
                    }    
                    
                    
                }); 

                TableData.shift();  // first row will be empty - so remove
                // TableData.shift();  // first row will be empty - so remove
                
                return TableData;
            }
            

        </script>
    </body>
</html>