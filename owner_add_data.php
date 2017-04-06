 <?php
 ob_start();
 session_start();
 include_once 'dbconnect.php';
 if ( isset( $_GET[ 'update' ] ) ) {
 	// clean user inputs to prevent sql injections
 	$sname = trim( $_GET[ 'servicename' ] );
 	$adhar = trim( $_GET[ 'adhar' ] );

 	$addr = trim( $_GET[ 'addr' ] );
 	$phone = trim( $_GET[ 'phone' ] );
 
 	$ex = $_SESSION[ 'user' ];
  	$query = "UPDATE bus_owners
SET servicename = '$sname', adhar = '$adhar', addr = '$addr' ,  phone = '$phone'
WHERE id = $ex";
 	$res = mysql_query( $query );
 	if ( $res ) {

 		header( "Location: ownerdash.php" );
 		exit();
 	} else {

 		echo '<script type="text/javascript">alert("some error");</script>';
 	}

 }



 ?>



<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<title>Buskaro | One stop bus booking website</title>
	<meta name="description" content="Worthy a Bootstrap-based, Responsive HTML5 Template">
	<meta name="author" content="htmlcoder.me">

	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<link rel="shortcut icon" href="images/favicon.ico">

	<!-- Web Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>

	<!-- Bootstrap core CSS -->
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">

	<!-- Font Awesome CSS -->
	<link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

	<!-- Plugins -->
	<link href="css/animations.css" rel="stylesheet">

	<!-- Worthy core CSS file -->
	<link href="css/style.css" rel="stylesheet">

	<!-- Custom css -->
	<link href="css/custom.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="ostyle.css">

	<link href="css/myStyles.css" rel="stylesheet">
	<meta charset="utf-8"/>
	<title>jQuery UI Datepicker - Restrict date range</title>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

	<script>
		$( document ).ready( function () {
			$( "#datepicker" ).datepicker();
		} );

		function chooseFile() {
			$( "#fileInput" ).click();
		}
	</script>


</head>
<?php include 'include/headertype3.php';
                      ?>

<div class="section translucent-bg bg-image-2 pb-clear " style="size: 100%;">
	<div class="container object-non-visible" data-animation-effect="fadeIn">
		<h1 id="register" class="title text-center" style="margin-top: 50px;"><span>Additional </span>Information</h1>
		<div class="space"></div>
		<div class="row" style="margin-top: 0px">
			<div class="col-md-8 col-md-offset-2 object-non-visible" style="margin-top: 0px" data-animation-effect="fadeIn">
				<form method="get">
					<div class="lead text-center">
						<div class="row" style="margin-top: 30px;">
							<input type="text" placeholder="Adhar Number" class="registerText" id="adharnumber" name="adhar">
						</div>
						<div class="row">
							<input type="text" name="addr" placeholder="Address" class="registerText" id="address">
						</div>


						<div class="row">
							<input type="text" name="phone" placeholder="Mobile Number" class="registerText" id="mobile">
						</div>
						<div class="row">
							<input type="text" name="servicename" placeholder="Bus Service Name" class="registerText" id="busname">
						</div>

						<div class="row" style=" margin-left:250px margin-top:250px;">
							<input type="submit" value="update" class="registerButton" id="registerButtonService" name="update">
						</div>
					</div>
				</form>
				<!---->
			</div>
		</div>
	</div>
</div>
<!-- section end -->
</div>
<!-- section end -->


<?php include 'include/subfooter.php';
                      ?>
<!-- JavaScript files placed at the end of the document so the pages load faster
		================================================== -->
<!-- Jquery and Bootstap core js files -->
<script type="text/javascript" src="plugins/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<!-- Modernizr javascript -->
<script type="text/javascript" src="plugins/modernizr.js"></script>

<!-- Isotope javascript -->
<script type="text/javascript" src="plugins/isotope/isotope.pkgd.min.js"></script>

<!-- Backstretch javascript -->
<script type="text/javascript" src="plugins/jquery.backstretch.min.js"></script>

<!-- Appear javascript -->
<script type="text/javascript" src="plugins/jquery.appear.js"></script>

<!-- Initialization of Plugins -->
<script type="text/javascript" src="js/template.js"></script>

<!-- Custom Scripts -->
<script type="text/javascript" src="js/custom.js"></script>

</body>

</html>