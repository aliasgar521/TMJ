

<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- <?php #include '../includes.php';?> -->
        <title>T.M. Jivaji</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="../style3.css">
        <link rel="stylesheet" href="register.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="../vendor/mcustomscrollbar.min.css">
        <link href="../vendor/sweetalert/sweetalert.css" rel="stylesheet" />

        <script src="../vendor/sweetalert/sweetalert.min.js"></script>

<!-- <link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="tcss.css"> -->
</head>
<body style="background: #F5F5F5">

    



    <div class="wrapper">
            <!-- Sidebar Holder -->
            
            <div id="content" style="background: #FFF">

                <nav class="navbar navbar-default" style="background: #42A5F5"> <!--#B2EBF2-->
                    <div class="container-fluid">

                        

                        <div class="navbar-collapse" id="bs-example-navbar-collapse-1">
                            <h3 style="text-align: center; color: white">
                                Taiyebali M. Jiwaji & Sons
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

                <?php
                // Start the session
                session_start();
                //var_dump($_POST)
                ?>
                <?php
					require('db.php');
					
					// If form submitted, insert values into the database.
					if (isset($_POST['username'])){
					        // removes backslashes
						$username = stripslashes($_REQUEST['username']);
					        //escapes special characters in a string
						$username = mysqli_real_escape_string($con,$username);
						$password = stripslashes($_REQUEST['password']);
						$password = mysqli_real_escape_string($con,$password);
						//Checking is user existing in the database or not
					        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
						$result = mysqli_query($con,$query) or die(mysql_error());
						$rows = mysqli_num_rows($result);
					        if($rows==1){
						    $_SESSION['username'] = $username;
                            while($data = $result->fetch_assoc()){
                                $_SESSION['role'] = $data['role'];
                                $role =$data['role'];
                            }
                            
                           // console.log($role);
					            // Redirect user to index.php

                                    if(isset($_SESSION['role']))
                                    {
        						    header("Location: ../index.php");
        					        }
                                    else{
                                        echo "<div class='form'>
                                        <h3>You are not allowed to visit this site</h3>
                                        <br/>Click here to <a href='login.php'>Login</a></div>";
                                    }
                             }else{
        						echo "<div class='form'>
            					<h3>Username/password is incorrect.</h3>
            					<br/>Click here to <a href='login.php'>Login</a></div>";
						}
					    }
                        else{
				?>


<main>
  <!-- flex item -->
    <div class="left">
      <img src="../images/leaves.jpeg">
      <h1>Log in</h1>

     	<div class="form">
            
                

		      <form action="" method="post" name="login">
		      	<div class="rounded">
					<input type="text" name="username" placeholder="Username" required style="padding:6px;border-radius:30px;" /><br><br>
					<input type="password" name="password" placeholder="Password" required style="padding:6px;border-radius:30px;"  /><br><br>
					<input name="submit" class="btn btn-success btn-block" type="submit" value="Login" style="border-radius:30px;  margin:0 auto;"  />
				</div>
			</form>
			<p>Not registered yet? <a href='registration.php'>Register Here</a></p>	
		</div>
	</div>
  <!-- flex item -->
    
</main>

<?php } ?>
            </div>
        </div>


         <script src="../vendor/jquery/jquery.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="../vendor/mcustomscrollbar.concat.min.js"></script>

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
     


    </body>
</html>
