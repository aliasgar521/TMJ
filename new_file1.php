<?php
include "db1.php";
?>
<html>

<head>
<title>Space-O | Ajax submit form</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/test.js" type="text/javascript"></script>


</head>
<body>
	<form id="TestForm" action="testing.php" method="post" style="padding: 20px">
                    Invoice Number:<br>
                    <input type="number" name="invoice" id="invoice">
                    <br>
                    <div id='theForm'></div>
                    <input id='theButton' class = "btn btn-primary" type='button' value='Add Product'>
                    <input id='hideme'   name='hideme'/>
                    <input id='hideme2'  value='' name='rec' type='hidden'/><br>
                   <input type="submit" class = "btn btn-primary" name="submit" value="Submit" id="submit" >
                </form>

</body>
</html>