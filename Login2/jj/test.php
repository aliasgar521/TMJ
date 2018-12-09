
<!DOCTYPE html>
<html>
<head>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<meta charset=utf-8 />
<title>Test Page</title>
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
<body>
  <form method='POST' id="myform">
    <input id='theButton' type='button' value='Add box'>
    <div id='theForm'></div>
    <input type='submit' value='Submit' name='submit'>
    <input id='hideme'  value=0 name='counter' type='hidden'/>
  </form>
</body>
</html>

<script>
jQuery(function($) {
  var i = 0;
  $('#theButton').click(addAnotherTextBox);
  function addAnotherTextBox() {
    $("#theForm").append("<div id='myindiv'"+ i +"'><br><label>Attribute: <input type='text' name='thebox" + i + "' ><label>Value: <input type='text' name='theval" + i + "' >     <button onclick='myFunction("+ i +")' id ='subber'"+i+">More</button>  <div> ");
  	i++;
  	$("#hideme").val(i);
   }
   
   
 
});


 function myFunction(divno) {
 jQuery(function($) {
   $("#myindiv"+divno+"").append("<label>Value: <input type='text' name='theval" + divno + "' >");
});
   }

</script>

<?php
if(isset($_POST["submit"])){

//echo "here";
	//echo($_POST);
	var_dump($_POST);
	//echo '<br>COUNTER<br>';	
	$counter=(int)$_POST["counter"];
	
	var_dump($counter);
	$connection = mysqli_connect("localhost", "stark", "iron", "phptest");
	$stmt = $connection->prepare('INSERT INTO test(mytext,myval)VALUES(?,?)');
		
		
		for($i=0;$i<$counter;$i++){
		echo $i.'<br>';
		$stmt->bind_param("ss",$_POST['thebox'.$i],$_POST['theval'.$i]);
		$stmt->execute();
	}
    $stmt->close();
}
?>
