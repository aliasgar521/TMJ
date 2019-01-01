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
                 var obj=JSON.parse(response);
                // var table = $('#marked');
                    var row = $('<tr>');
                    for(var i = 0; i < 3; i++) {
                        if(i==2)
                        {
                            row.append($('<td>').html(obj[i]));
                        }
                        else{
                            row.append($('<td>').html(obj[i]));
                        }
                        
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
                 
        });

    });
    $(document).ready(function() {
        $(".show-row").click(function(e){
            alert($('.test1').attr('name'));
            console.log(namezz);
            alert(namezz);
        });
    });


    $(document).ready(function() {
        $("#marked").on('click','.delete-row', function() {
            $(this).closest('tr').remove();
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
</html>                            