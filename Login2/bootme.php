<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<link rel="stylesheet" href="bootme.css">

<?php

//print_r($_POST);
$connection = mysqli_connect("localhost", "root", "95752468ali", "Reliance");
//var_dump($connection);

if(isset($_POST["submit"])){

$unsafepass = $_POST["password"];
$unsafepassre = $_POST["repassword"];
$unsafename = $_POST["username"];


if(($unsafepass==$unsafepassre)){
print_r($_POST);
	$unsafename=trim($unsafename);
	$unsafepass= sha1($unsafepass);
	$stmt = $connection->prepare('INSERT INTO login(pass,name)VALUES (?,?)');
	$stmt->bind_param("ss",$unsafepass,$unsafename);
	$stmt->execute();
    $stmt->close();
	header("Location: index.php");
	}
else{
	echo "Passwords do not match ";
	}	
}       $connection->close();

?>

<HTML>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
<br><br>
<div class="col-lg-4">
</div>
<div class="container">
    <div class="row">
                <div class="col-md-5">
                        <form class="form-horizontal" action='' method="POST">
                          <fieldset>
                            <div id="legend">
                              <legend class="">Sign-up</legend>
                            </div>
                            <div class="form-group">
                              <!-- Username -->
                              <label c for="username">Username</label>
                              <div class="controls">
                                <input type="text" id="username" name="username" placeholder="Username" class="form-control input-xlarge ">
                              </div>
                            </div>
                            <div class="form-group">
                              <!-- Password-->
                              <label for="password">Password</label>
                              <div class="controls">
                                <input type="password" id="password" name="password" placeholder="Password" class="form-control input-xlarge">
                              </div>
                            </div>
                            <div class="form-group">
                              <!-- Password-->
                              <label for="password">Repeat Password</label>
                              <div class="controls">
                                <input type="password" id="repassword" name="repassword" placeholder="Repeat Password" class="form-control input-xlarge">
                              </div>
                            </div>
                            <div class="form-group">
                              <!-- Button -->
                               <input type="submit" value="Sign Up" name="submit" class="btn btn-primary"/>
                            </div>
                          </fieldset>
                        </form>
                </div>
        </div>
    </div>
    </body>
</HTML>

