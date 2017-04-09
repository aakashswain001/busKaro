<?php

// it will never let you open index(login) page if session is set
if ( isset( $_GET[ 'admin' ] ) != "" ) {
	
	$name =$_GET['name'];
$pass = $_GET['pass'];
if(($name=="admin")&&($pass=="pass")){
	header("Location: details.html");
	exit();
}else{
	echo '<script type ="text/javascript">alert("error");</script>';
}
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="file:///C|/Users/lenovo/Documents/GitHub/busKaro/website/styleb1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Admin register</title>
</head>

<body>

<div class="container" style="padding-top: 10px;">
<div class="row">
	<div class="col-md-8">
	<form class="form-horizontal" role="form">
		<div class="form-group" >
			<label for="from" class="control-label col-sm-2">Name :</label>
			<div class="col-sm-3 col-lg-6">
				<input type="text" id="from" name="name" class="form-control"> 
			</div>
		</div>
		<div class="form-group">
			<label for="d_on" class="control-label col-sm-2">Password:</label>
			<div class="col-sm-3 col-lg-6">
				<input type="password" id="d_on" name="pass" class="form-control">
		</div>
			</div>

	<div class="col-md-8 col-lg-8" style="float: right;">
		<input type="submit" name = "admin">
		
		</form>
	</div>
	</div>
   </div>
	</div>
</body>
</html>
