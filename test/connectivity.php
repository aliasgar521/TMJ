<?php 
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'test2'); 
define('DB_USER','root'); 
define('DB_PASSWORD','95752468ali'); 
$con=mysqli_connect("localhost","root","95752468ali","test1");
// $db = mysql_select_db(DB_NAME,$con);
// $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: ".mysql_error()); 
/* $ID = $_POST['user']; $Password = $_POST['pass']; */ 
function SignIn() 
{ 
	session_start(); //starting the session for user profile page if(!empty($_POST['user'])) 
					//checking the 'user' name which is from Sign-In.html, is it empty or have some text 
	{ 
		// $query = mysql_query("SELECT * FROM UserName where userName = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysql_error()); 
		$query = "SELECT * FROM UserName where userName = '$_POST[user]' AND pass = '$_POST[pass]'"; 
		
		// $row = mysql_fetch_array($query) or die(mysql_error()); 
		$row = mysqli_query($con,$query);
		echo "Username is ".$row['userName'];
		if(!empty($row['userName']) AND !empty($row['pass'])) 
		{ 
			$_SESSION['userName'] = $row['pass'];
			echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE..."; 
		} 
		else 
		{ 
			echo "SORRY... YOU ENTERED WRONG ID AND PASSWORD... PLEASE RETRY..."; 
		} 
	} 
}
if(isset($_POST['submit'])) 
	{ 
		echo "Gonna run sign in function";
		SignIn(); 
	} 
?>
