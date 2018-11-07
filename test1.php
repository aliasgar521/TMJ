<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

	<script type="text/javascript" >
		$(function() {
    	$("#skill_input").autocomplete({
        	source: "search.php",
    		});
		});
	</script>
</head>
<body>
	<div class="auto-widget">
    <p>Your Skills: <input type="text" id="skill_input"/></p>
</div>
</body>
</html