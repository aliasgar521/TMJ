
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
        <link rel="stylesheet" href="register.css">
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
               <!--    <h3 style="text-align: center">
                    Registration
                 </h3>
 -->
            


                <?php
                    require('db.php');
                    // If form submitted, insert values into the database.
                    if (isset($_REQUEST['username'])){
                    // removes backslashes
                        $username = stripslashes($_REQUEST['username']);
                        //escapes special characters in a string
                        $username = mysqli_real_escape_string($con,$username); 
                        $email = stripslashes($_REQUEST['email']);
                        $email = mysqli_real_escape_string($con,$email);
                        $password = stripslashes($_REQUEST['password']);
                        $password = mysqli_real_escape_string($con,$password);
                        $trn_date = date("Y-m-d H:i:s");
                        $query = "INSERT into `users` (username, password, email, trn_date)
                        VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
                        $result = mysqli_query($con,$query);
                        if($result){
                            echo "<div class='form'>
                            <h3>You are registered successfully.</h3>
                            <br/><a href='login.php'>Click here to Login</a></div>";
                        }           
                    }
                    else{

                ?>



                <!-- <div class="form">
                    <form name="registration" action="" method="post">
                        <input type="text" name="username" placeholder="Username" required /><br>
                        Email not reallly needed -->
                        <!-- input type="email" name="email" placeholder="Email" required /><br>    
                        <input type="password" name="password" placeholder="Password" required  /><br>
                        <input type="submit" name="submit" value="Register" />
                    </form>
                </div> -->

                 <!-- main container -->
<main>
  <!-- flex item -->
    <div class="left">
      <img src="https://images.unsplash.com/photo-1509310257498-b97f8488bf03?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6faa5ed40dc7e9e828bd358799983c53&auto=format&fit=crop&w=500&q=80">
      <h1>Sign up</h1>
      <!-- <p>
        Email
      </p>
      <p>
        Password
      </p> -->
        <div class="form">
            <form name="registration" action="" method="post">
                <div class="rounded">
                    <input type="text" name="username" placeholder="Username" required autocomplete="off" style="padding:6px;border-radius:30px;" /><br><br>
                    <!-- Email not reallly needed -->
                    <input type="email" name="email" placeholder="Email" required autocomplete="off" style="padding:6px;border-radius:30px;"/><br>   <br> 
                    <input type="password" name="password" placeholder="Password" required  autocomplete="off" style="padding:6px;border-radius:30px;"/><br> <br>
                    <input type="submit" class="btn btn-success btn-block" name="submit" value="Register" style=" margin:0 auto; border-radius:30px;" />
                </div>
            </form>
        </div>
    </div>
  <!-- flex item -->
    
  </main>




                <?php } ?>
            </div>
        </div>


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
     


    </body>
</html>
