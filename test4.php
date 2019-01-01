<?php
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>jQuery Add / Remove Table Rows Dynamically</title>
<style type="text/css">
    form{
        margin: 20px 0;
    }
    form input, button{
        padding: 5px;
    }
    table{
        width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse;
    }
    table, th, td{
        border: 1px solid #cdcdcd;
    }
    table th, table td{
        padding: 10px;
        text-align: left;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".add-row").click(function(e){
            e.preventDefault();
                var name=document.getElementById("name").value;
                 $.ajax({
                 url: "test3p.php",
                 type: "GET",
                 data: { name: name },
                 success: function (response) {  
                 var txt = '{"id1": "ali", "id2": "8", "id3": "221"}';
                 var obj=JSON.parse(response);
                 // console.log(obj.id1);
                 // console.log(obj[0].id3);
                 console.log(obj);
                // var table = $('#marked');
                    var row = $('<tr>');
                    for(var i = 0; i < 3; i++) {
                       

                        row.append($('<td id="input_value">').html(obj[i]));
                        row.append($('</td>'));
                    }
                    row.append($('<td><input type="image" class="delete-row" id="delete-button" src="icon-delete.png" name="record"></button></td></tr>'));
                    $('#marked').append(row);
                }
                    // $('#marked').append(response);
                    // console.log(response);
                    // alert("helooo");

         // }
            });
                 alert($('#test2').attr('value'));
                 
        });

    });
    $(document).ready(function() {
        $(".show-row").click(function(e){
            e.preventDefault();
            console.log($('#test2').attr('name'));
            // console.log(namezz);
            // alert(namezz);
        });
    });


    
</script>
</script>
</head>
<body>
    <form method="GET" action="">
        <input type="text" id="name" name="name"  placeholder="Name">
        <button type="submit" class="add-row" value="Add Row" id="button"  name="submit" ></button>
        <button type="submit" class="show-row" value="Add Row" id="button"  name="submit" ></button>
    </form>
    <table>
        <thead>
            <tr>
                <!-- <th>Select</th> -->
                <th>Product Name</th>
                <th>Selling Price</th>
                <th>Quantity</th>
                <th>Select</th>
            </tr>
        </thead>
        <tbody id="marked">
            <tr>
            </tr>
        </tbody>
    </table>
     <button type="button" class="delete-row">Delete Row</button>
     <div id="thenode" style="position: absolute; top: 30px; left: 0px; width: 150px; background-color: white;"></div>
   
</body> 
<script>
    $(document).ready(function() {
        $(".show-row").click(function(e){
             e.preventDefault();
                var header = Array();    
                $("table tr th").each(function(i, v){
                        header[i] = $(this).text();
                })
                               
                alert(header);

                var data = Array();    
                $("table tr").each(function(i, v){
                    data[i] = Array();
                    $(this).children('td').each(function(ii, vv){
                        data[i][ii] = $(this).text();
                    }); 
                })
                alert(data);
            });
    });


</script>
</html>                            