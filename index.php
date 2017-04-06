<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// it will never let you open index(login) page if session is set
if ( isset( $_SESSION[ 'user' ] ) != "" ) {
	header( "Location: checkuser.php" );
	exit;
}

if ( isset( $_POST[ 'signin' ] ) ) {
	
	// prevent sql injections/ clear user invalid inputs
		$email = trim( $_POST[ 'email' ] );
		$email = strip_tags( $email );
		$email = htmlspecialchars( $email );
		$pass = trim( $_POST[ 'password' ] );
		$pass = strip_tags( $pass );
		$pass = htmlspecialchars( $pass );
		// if there's no error, continue to login
		$password = md5( $pass ); // password hashing using SHA256
	//for bus users	 
			$res = mysql_query( "SELECT id,password FROM bus_users WHERE email='$email'" );
			$row = mysql_fetch_array( $res );
			$count = mysql_num_rows( $res ); // if uname/pass correct it returns must be 1 row
			if ( $count = 1 ) {
				if ( $count == 1 && $row[ 'password' ] == $password ) {
					$_SESSION[ 'user' ] = $row[ 'id' ];
					$_SESSION[ 'user_type' ] = "0";
					header( "Location: home.php" );
					exit();
				} else {
			echo '<script type = "text/javascript">alert("Username or Password incorrect");</script>';
				}
			}
	unset($pass);
	unset($password);
	unset($count);
	unset($res);
	unset($row);
	unset($email);
}
if ( isset( $_POST[ 'signin2' ] ) ) {
	// prevent sql injections/ clear user invalid inputs
		$email = trim( $_POST[ 'email2' ] );
		$email = strip_tags( $email );
		$email = htmlspecialchars( $email );
		$pass = trim( $_POST[ 'password2' ] );
		$pass = strip_tags( $pass );
		$pass = htmlspecialchars( $pass );
		// if there's no error, continue to login
		$password = md5( $pass ); // password hashing using SHA256
	//for bus users	 
			$res = mysql_query( "SELECT id,password FROM bus_owners WHERE email='$email'" );
			$row = mysql_fetch_array( $res );
			$count = mysql_num_rows( $res ); // if uname/pass correct it returns must be 1 row
			if ( $count = 1 ) {
				if ( $count == 1 && $row[ 'password' ] == $password ) {
					$_SESSION[ 'user' ] = $row[ 'id' ];
					$_SESSION[ 'user_type' ] = "1";
					header( "Location: ownerdash.php" );
					exit();
				} else {
			echo '<script type = "text/javascript">alert("Username or Password incorrect");</script>';	
				}
			}
	
	unset($pass);
	unset($password);
	unset($count);
	unset($res);
	unset($row);
	unset($email);
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
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Raleway:700,400,300" rel="stylesheet" type="text/css">

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

	<link href="css/myStyles.css" rel="stylesheet">

	<!-- Respomsive slider -->
	<link href="../css/responsive-calendar.css" rel="stylesheet">

	<!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
	<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css"/>

	<!--Font Awesome (added because you use icons in your prepend/append)-->
	<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css"/>

	<!-- Inline CSS based on choices in "Settings" tab -->
	<style>
		.bootstrap-iso .formden_header h2,
		.bootstrap-iso .formden_header p,
		.bootstrap-iso form {
			font-family: Arial, Helvetica, sans-serif;
			color: black
		}
		
		.bootstrap-iso form button,
		.bootstrap-iso form button:hover {
			color: white !important;
		}
		
		.asteriskField {
			color: red;
		}
	</style>

	<script>
		$( '#myModal' ).modal( 'show' );
	</script>

</head>

<body class="no-trans">
	<!-- scrollToTop -->
	<!-- ================ -->
	<div class="scrollToTop"><i class="icon-up-open-big"></i>
	</div>
	<!-- -->

	<?php
	include 'include/header.php';
	?>
	<!-- -->
	<?php
	include 'include/banner.php';
	?>
	<!-- -->
	<?php
	include 'include/about.php';
	?>

	<!-- section start -->
	<!-- ================ -->
	<div class="section translucent-bg bg-image-2 pb-clear">
		<div class="container object-non-visible" data-animation-effect="fadeIn">
			<h1 id="register" class="title text-center">Register With <span>Us</span></h1>
			<div class="space"></div>
			<div class="row" style="margin-top: 0px">
				<form method="get" action="register.php">
					<div class="col-md-8 col-md-offset-2 object-non-visible" style="margin-top: 0px" data-animation-effect="fadeIn">
						<div class="lead text-center">
							<div class="row" style="margin-top: 30px;">
								<input type="text" placeholder="First Name" class="registerText" id="firstName" name="fname">
							</div>
							<div class="row">
								<input type="text" placeholder="Last Name" class="registerText" id="lastName" name="lname">
							</div>
							<div class="row">
								<input type="email" placeholder="E-mail" name="email" class="registerText" id="email">
							</div>
							<div class="row">
								<input type="password" placeholder="Password" class="registerText" id="password" name="password">
							</div>
							<div class="row">
								<input type="password" placeholder="Confirm Password" class="registerText" id="cpassword">
							</div>
							<div class="row" style="margin-top: 30px;">
								<input type="submit" value="Register as a Customer" class="registerButton" id="registerButtonCustomer" name="reg_customer">
							</div>
							<div class="row">
								<p style="font-size: 15px">or</p>
							</div>
							<div class="row" style="margin-bottom: 50px;">
								<input type="submit" value="Register as a Service Provider" class="registerButton" id="registerButtonService" name="reg_owner">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- section end -->
	</div>
	<!-- section end -->

	<!-- -->
	<!-- section start -->
	<!-- ================ -->
	<!-- section end -->

	<!-- section start -->
	<!-- ================ -->
	<!-- section end -->

	<!-- footer start -->
	<?php 
	include 'include/footer.php';
	?>
	<!-- ================ -->
	<!-- popup -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						×</button>
				


					<h4 class="modal-title" id="myModalLabel">
						Login</h4>
				


				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12" style="border-right: 1px dotted #C2C2C2;padding-right: 30px; padding-bottom: 20px">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs">
								<li class="active"><a href="#Login" data-toggle="tab">Customer</a>
								</li>
								<li><a href="#Registration" data-toggle="tab">Service Provider</a>
								</li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content text-center">
								<div class="tab-pane active text-center" id="Login">
									<form role="form" method = "post" class="form-horizontal">
										<div class="form-group">
											<label for="email" class="col-sm-2 control-label">
												Email</label>
										
											<div class="col-sm-10">
												<input type="email" class="form-control" id="email1" placeholder="Email" name="email">
											</div>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1" class="col-sm-2 control-label">
												Password</label>
										


											<div class="col-sm-10">
												<input type="password" class="form-control" id="inputPassword1" placeholder="Password" name="password"/>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-2">
											</div>
											<div class="col-sm-10">
												<button type="submit" class="btn btn-primary btn-sm" name="signin">
													Submit</button>
											


												<a href="javascript:;">Forgot your password?</a>
											</div>
										</div>
									</form>
								</div>
								<div class="tab-pane" id="Registration">
									<form role="form" method="post" class="form-horizontal">
										<div class="form-group">
											<label for="email" class="col-sm-2 control-label">
												Email</label>
										


											<div class="col-sm-10">
												<input type="email" class="form-control" id="email2" placeholder="Email" name = "email2"/>
											</div>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1" class="col-sm-2 control-label">
												Password</label>
										


											<div class="col-sm-10">
												<input type="password" class="form-control" id="inputPassword2" placeholder="Password" name= "password2"/>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-2">
											</div>
											<div class="col-sm-10">
												<button type="submit" name ="signin2" class="btn btn-primary btn-sm">
													Submit</button>
											


												<a href="javascript:;">Forgot your password?</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


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

	<script src="js/responsive-calendar.js" type="text/javascript"></script>


	<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
	<!-- Include jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

	<!-- Include Date Range Picker -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	<script>
		$( document ).ready( function () {
			var date_input = $( 'input[name="date"]' ); //our date input has the name "date"
			var container = $( '.bootstrap-iso form' ).length > 0 ? $( '.bootstrap-iso form' ).parent() : "body";
			date_input.datepicker( {
				format: 'dd/mm/yyyy',
				container: container,
				todayHighlight: true,
				autoclose: true,
				autoclose: 1,
			} )
			date_input.datepicker.css( 'zIndex', 999999 );
		} );
	</script>
</body>
</html>
