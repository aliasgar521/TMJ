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

        <!-- <script src="jquery/jquery.js"></script> -->
        <!-- Bootstrap CSS CDN -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <!-- <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-grid.css">
        <link rel="stylesheet" href="css/bootstrap-reboot.css">-->
 
        <!-- Wrote this link at the bottom -->
        <!-- <script src="js/bootstrap.min.js"></script> -->
        


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
<!-- 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->

        <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
        <!-- <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> -->

       

		<script>
      
        $(function() {
            $("input.product_input").autocomplete({
            source: "search_availability.php",
            });
        });
//         $('input.product_input').autocomplete(
//         {
//         source:'index.php?/Ajax/SearchUsers', 
//         minLength: 3, 
//         delay: 300,
//         open: function() {
//             $('.ui-autocomplete').width('auto');
//             $('.ui-widget-content').css('background', '#E1F7DE');
//             $('.ui-menu-item a').removeClass('ui-corner-all');
//         }

//     }
// ).data("ui-autocomplete")._renderItem = function( ul, item ) {
//     return $( "<li>" )
//        .append( "<a>" + item.label + "<br>" + item.desc + "</a>" )
//        .appendTo( ul );
// };
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
                        url: "displayTable.php",
                        type: "GET",
                        data: { name: name, quantity: quantity},
                        success: function (response) {   
                        var obj=JSON.parse(response);
                        var row = $('<tr>');
                            for(var i = 0; i < 4; i++) {
                                if(i==0){
                                    row.append($('<td class="pro_name">').html(obj[i]));
                                }
                                else if(i==1){
                                    
                                    row.append($('<td class="quantity" id=quant'+j+' >').html(obj[i]));
                                }
                                else if(i==2){
                                    row.append($('<td class="sell_price_input" id='+j+' name="pro_sp"'+j+' contenteditable="true">').html(obj[i]));
                                }
                                else if(i==3){

                                    row.append($('<td class="total_price_input" id=total_sp'+j+' name="total_sp"'+j+' contenteditable="true">').html(obj[i]));
                                }
                                else{
                                    row.append($('<td>').html(obj[i]));
                                }
                                row.append($('</td>'));
                            }
                            
                            row.append($('<td><input type="image" class="delete-row" id="delete-button" src="images/icon-delete.png" name="record"></button></td></tr>'));
                            j++;
                            // row.append($('<td value = "pro_name"'+j+'></td></tr>'));

                            $('#marked').append(row);

                        }


                 // }
             });
                        // For the TOTAL part to work
                        setTimeout(function(){
                            var total_sum;
                        total_sum=calculate_values();
                        $("#total_sum_value").html(total_sum);
                        document.getElementById("product_input").value="";
                        document.getElementById("product_quant").value="";

                    },100);
                        
                        // var namezz = $("#test1230").attr("name");
                           // alert($('#test0').attr('value'));
                        $("#hideme").val(j);
                        // **************************************check below line *************************************************
                        document.getElementById("product_input").focus;
                        // *************************************************************************************************
                        console.log("The Value of J is "+ j);
                         
                });
            });

            $(document).ready(function() {
            $("#marked").on('click','.delete-row', function() {
                $(this).closest('tr').remove();
                // console.log("clicked delete button");
                // Update total when delete button clicked code below
                setTimeout(function(){
                    var total_sum;
                    total_sum=calculate_values();
                    $("#total_sum_value").html(total_sum);
                },100);
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

                        <div class="navbar-collapse" id="bs-example-navbar-collapse-1">
                            <h3 style="text-align: center; color: white">
                                Taiyebali M. Jiwaji & Sons
                                <a href="Login/logout.php" style="float:right">Logout</a>

                            </h3>
                            <h4 style="color: white"><div style="float:right">Welcome <?php echo $user ?></div></h4>
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
                                            <tr>
                                                <td colspan="3" ><span><b style="float:right">TOTAL  :</b></span></td>
                                                <b><td class="total_sale" name="total_sum_value" id="total_sum_value"></td></b>
                                            </tr>
                                        </table>
                                        <input id='hideme'  name='hideme'  type='hidden'/>
                                        <input type="submit" class="btn btn-success btn-md btn-block" id="Finalize_sale" value="Finalize Sale" name="submit">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

        <div class="overlay"></div>
         <!-- jQuery CDN -->
        <!-- <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script> -->

        <!-- Bootstrap Js CDN -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
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
            $(document).ready(function() {
            $("#Finalize_sale").click(function(e){
                e.preventDefault();
                    counter= document.getElementById("hideme").value;
                    var total_sale;
                    total_sale=document.getElementById("total_sum_value").innerHTML;
                    // alert("The total sale value is "+total_sale);
                    // console.log("The Value of J is "+ j);
                var TableData;
                TableData = storeTblValues()
                TableData = JSON.stringify(TableData);

                // alert(TableData);
                $.ajax({
                    type: "POST",
                    url: "finalizeSale.php",
                    data: "pTableData=" + TableData + "&counter_value=" + counter + "&total_sale=" + total_sale,
                    success: function(msg){
                         // return value stored in msg variable
                         showSwal();
                    }
                });
                });
            });


            function showSwal(){

                swal({
                    title: "Success!",
                    text: "Sale Finalized!",
                    icon: "success",
                    type: "success",
                    confirmButtonText: "Cool"
                }).then(function() {
                // Redirect the user
                    window.location.href = "DailySales.php";

                });

            }
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
                TableData.pop();
                return TableData;
            }

        

                // Code to make SP and TSP Dynamic
            // ************************************************************************************************************************************
            //code to make sp,tsp and total dynamic according to sp
            $(document).ready(function(){
                $('#myTable').on('change input','.sell_price_input', function(){

                        var total_sum;
                        var j=$(this).attr('id');

                        var id1=$(this).parent();
                        total_sum=calculate_values_from_sp(j);
                        id1.find(".total_price_input").html(total_sum);
                        var total_sum1;
                        total_sum1=calculate_values();
                        $("#total_sum_value").html(total_sum1);
                });
            });
            
            function calculate_values_from_sp(j){
                var calculated_total_sum=0;
                    var sp=$("#"+j).text();
                    var quant=$("#quant"+j).text();
                    if ($.isNumeric(quant) && $.isNumeric(sp)) {
                        calculated_total_sum += (parseFloat(quant)*parseFloat(sp));
                    } 
                return calculated_total_sum;
            }


            //code to make the Total selling price,sp and Total dynamic according to tsp
            $(document).ready(function(){
                $('#myTable').on('change input','.total_price_input ', function(){
                    // setTimeout(function(){
                        var total_sum;
                        var j=$(this).attr('id');
                        // console.log(j);
                        var id0 = j[j.length -1];
                        var id1=$(this).parent();
                        var sell_price_pp = calculate_sell_price_pp(id0);
                        id1.find(".sell_price_input").html(sell_price_pp);
                        total_sum=calculate_values();
                        $("#total_sum_value").html(total_sum);
                    // },100);
                });
            });
            function calculate_values(){

                var calculated_total_sum=0;
                $("#myTable .total_price_input").each(function(){
                        // console.log("its cool.");
                    var get_textbox_value = $(this).text();
                    // console.log(get_textbox_value);
                    if ($.isNumeric(get_textbox_value)) {
                        calculated_total_sum += parseFloat(get_textbox_value);
                    }                  
                });
                return calculated_total_sum;
            }

            function calculate_sell_price_pp(id0){
                var calculated_pp=0;
                var total_sp=$("#total_sp"+id0).text();
                var quant=$("#quant"+id0).text();
                if ($.isNumeric(quant) && $.isNumeric(total_sp)) {
                    calculated_pp += (parseFloat(total_sp)/parseFloat(quant));
                } 
                return calculated_pp;
            }












        //             var sell_value=$(this).text();
        //             var quant=$(this).closest('.quantity').text();
        //             console.log(sell_value);
        //             // if ($.isNumeric(sell_value) && $.isNumeric(quant)) {
        //             total_sum_input=parseFloat(sell_value)*parseFloat(quant);
        //             console.log(total_sum_input);
        //         // }
        //             // 
        //         },50);
        //     });
        // });
        // $(document).ready(function(){
        //     $('#myTable').on('click','.delete-row ', function(){
        //         // setTimeout(function(){
        //         //     var total_sum;
        //         //     total_sum=calculate_values();
        //         //     $("#total_sum_value").html(total_sum);
        //         // },50);

        //     });
        // });
                
        </script>
        
    </body>
</html>
