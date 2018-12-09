<?php



session_start();
echo "SESSION DATA";
echo "<br> <br> <br>";

if (!isset($_SESSION["name"])) {  header("Location: index.php");}

var_dump($_SESSION);
$cookie_name="logmein";	
echo "<br><br>";
if(!isset($_COOKIE[$cookie_name])||$_COOKIE[$cookie_name]=="usr=&hash=") {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
?>




<?php
if(isset($_POST["logout"])){
setcookie($cookie_name, "", time() - 3600);
session_destroy();
header("Location: index.php");
}
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <div class="container">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">

	
      <h1>Sample HTML Page </h1>
      <form class="login-form" action='' method="POST">
      <input type="submit" value="logout" name="logout" class="btn blue"/>	
	  </form>
    </div> <!-- /container -->
</html>

  


