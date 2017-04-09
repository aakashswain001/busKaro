<?php

session_start();
//send mail if no error
include_once 'dbconnect.php';
$sql = "SELECT ukey FROM bus_users WHERE  email='$email";
$email = $_SESSION['send_email'];
$ukey = $_SESSION['send_ukey'];
if(isset($_POST['reset'])){
	
$pass =$_POST['pass1'];
$password=md5($pass);
	$query = "UPDATE bus_users
SET password = '$password' WHERE email = '$email'";
 	$res = mysql_query( $query );
 	if ( $res ) {
    header("Location: index.php");
		exit();
 	} else {

 		echo '<script type="text/javascript">alert("some error");</script>';
 	}

	
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="website/styleb1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Admin register</title>
</head>

<body>

<div class="container" style="padding-top: 10px;">
<div class="row">
	<div class="col-md-8">
	<form class="form-horizontal" role="form" method="post">
	   <h1 style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif'; margin-left: 120px;color: #399097; font-weight:500; padding-bottom: 30px;">ENTER KEY </h1>
	   <h3>A key was sent to your email address</h3>
	
		<div class="form-group">
			<label for="To" class="control-label col-sm-2">Key:</label>
			<div class="col-sm-3 col-lg-6">
				<input type="text" id="email" name="fkey" class="form-control" >
			</div>
		</div>
		<div class="form-group">
			<label for="To" class="control-label col-sm-2">Password:</label>
			<div class="col-sm-3 col-lg-6">
				<input type="text" id="email" name="pass1" class="form-control" >
			</div>
		</div>
     <input type="submit" class="btn-success" value="Submit" name="reset" style="margin-left: 200px;">
		</form>
	</div>
   </div>
	</div>
</body>
</html>
