<?php
include "../db.php";
?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>T.M. Jivaji</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="../style3.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- <link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="tcss.css"> -->
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
                        <a href="Report.html">Generate Report</a>
                    </li>
                </ul>

                <!--<ul class="list-unstyled CTAs">
                    <li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a></li>
                    <li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a></li>
                </ul>-->
            </nav>

            <!-- Page Content Holder -->
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
                            </h3>
                            <!--<ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                            </ul>-->
                            
                        </div>

                    </div>

                </nav>
                  <h3 style="text-align: center">
                    Login
                 </h3>



		<div class="login-page">
			<div class="col-lg-4 col-md-12 col-sm-12" >
  				<div class="form">
    
    	<!--  <p id="demo" class= "dangers"></p>-->
    	
    				<div id=mydiv class="alert alert-danger" role="alert">   
  						Invalid Username/Password
  					</div>

    				<form class="login-form" action='' method="POST">
      					<input type="text" placeholder="Username" name="username"/>
      					<input type="password" placeholder="Password" name="password"/>
						<input type="submit" value="Sign in" name="submit" class="btn blue"/>	
						<div>
							<p class="message">Not registered? <a href="bootme.php">Create an account</a></p>
						</div>
						<div>
							<p class="message" id="para"></p>
						</div>
						<div>
							<input type="checkbox" name="autologin" value="1">Remember Me
						</div>
	  				</form>
	    

  				</div>
			</div>
		</div>
	</div>
	</div>

 <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
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
            function validateForm() {
            var cp = document.forms["InventoryForm"]["cost_price"].value;
            var sp = document.forms["InventoryForm"]["sell_price"].value;


            if (cp > sp) {
                swal({
                    title: "Error!",
                    text: "Cost price is more than Selling Price!",
                    icon: "error",
                    button: "Ok!",
                });
            
            return false;
                }
            }
        </script>
</body>
</HTML>

<?php
// Start the session
session_start();
//var_dump($_POST)
?>
<?php

//THIS IS COOL 
$connection = mysqli_connect("localhost", "root", "95752468ali", "test1");
$cookie_name="logmein";
	// Check if the cookie exists
if(isSet($_COOKIE[$cookie_name]))
	{
	echo "Cookies are enabled.";
	parse_str($_COOKIE[$cookie_name]);

	// Make a verification input $usr and $hash pass
	$stmt = $connection->prepare('SELECT pass FROM login where name = ?');
	$stmt->bind_param("s",$usr);
	$result =$stmt->execute();
	$qres=$stmt->get_result();
	if($qres->num_rows>0){
	while($data = $qres->fetch_assoc()){
        if(strcmp($data["pass"],$hash)==0){
		echo "Its COOKIE a match".'<br>';
		$_SESSION["name"] =$usr;
		setcookie ($cookie_name, 'usr='.$usr.'&hash='.$hash, time() + $cookie_time+3600);
		header("Location: ../customize/index.php");
		}
	   }
	}
}





if(isset($_POST["submit"])){
//print_r($_POST);
$unsafepass = $_POST["password"];
$unsafename = $_POST["username"];
$post_autologin = $_POST['autologin'];
	$unsafepass= sha1($unsafepass);
	//$stmt = $connection->prepare('INSERT INTO login(pass,uname)VALUES (?,?)');
	$stmt = $connection->prepare('SELECT pass FROM login where name = ?');
	$stmt->bind_param("s",$unsafename);
	$result =$stmt->execute();
	//$stmt->store_result();
	$qres=$stmt->get_result();
	//$stmt->bind_result($qres);
	//echo $unsafepass;
	//var_dump($qres);
	$flag=0;
	if($qres->num_rows>0){
	while($data = $qres->fetch_assoc()){
        	echo 'HASH:' .$data["pass"].'<br><br>';
		echo $unsafepass.'<br>' ;		
		if(strcmp($data["pass"],$unsafepass)==0){
		$flag=1;
		echo "Its a match";
		$_SESSION["name"] =$unsafename;
			if($post_autologin == 1)
			{
			echo "Cookies set".'<br>';
			setcookie ($cookie_name, 'usr='.$unsafename.'&hash='.$unsafepass, time() + 3600);
			}
		header("Location: ../customize/index.php");
		}
	   }
	}
	if($flag==0){
	//unsuccessful attempt
//echo '<script type="text/javascript">', ' document.getElementById('para').innerHTML = "You pressed button 1";','</script>';
echo 'before call';
echo '<script>','jsfunction();','</script>';
echo 'after call';
	}
	$stmt->close();
}       $connection->close()
?>
