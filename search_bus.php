<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// it will never let you open index(login) page if session is set
if ( isset( $_SESSION[ 'user' ] ) == "" ) {
	echo '<script type= "text/javascript">alert("You need to log in first");</script>';
	header( "Location: index.php" );
	exit;
} else if ( $_SESSION[ 'user_type' ] == 1 ) {

	echo '<script type= "text/javascript">alert("You need to log in as a user");</script>';
	header( "Location: checkuser.php" );
	exit();
}
$fro = $_GET[ 'frommm' ];
$t = $_GET[ 'tooo' ];
$date_bus = $_GET[ 'date' ];
$res = mysql_query( "SELECT name FROM city WHERE id='$fro'" );
$row = mysql_fetch_array( $res );
$count = mysql_num_rows( $res ); // if uname/pass correct it returns must be 1 row
$frommm = $row[ 'name' ];
$res = mysql_query( "SELECT name FROM city WHERE id='$t'" );
$row = mysql_fetch_array( $res );
$count = mysql_num_rows( $res ); // if uname/pass correct it returns must be 1 row
$tooo = $row[ 'name' ];

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

</head>

<body class="no-trans">
	<!-- scrollToTop -->
	<!-- ================ -->
	<div class="scrollToTop"><i class="icon-up-open-big"></i>
	</div>


	<?php 
include 'include/headertype2.php';
?>


	<div class="sectionsearch clearfix">
		<div class="panelsearch panel-info">
			<div class="panel-heading" id="my">
				<?php
				echo '<h3>  ROUTE:   ' . $frommm . ' to ' . $tooo . '&nbsp;</h3>
					<h3 id="mydate">DATE:  ' . $date_bus . '</h3>';
				?>
				<button class="btn btn-default" onclick="show_box();return false;" id="mobtn">Change</button>

			</div>
		</div>


		<!-- part of the code which brings the form when change button is clicked-->
		<script language="javascript">
			function show_box() {
				$( "#search_box" ).toggle( 500, "swing" );
			}
		</script>
		<section class="modify_search_container" id="search_box" style="display:none; padding-top: 25px;">
			<div class="">
				<div class="container">
					<div class="row smart-forms">
						<form name="booking_frm" id="frm_sub" method="get">
							<div class="col-md-3">
								<div class="form-group">
									<select name="frommm" class="inputText" placeholder="Source city"/>
									<?php
									//include( 'db.php' );
									$result = mysql_query( "SELECT id,name FROM city" );
									while ( $row = mysql_fetch_array( $result ) ) {
										echo '<option value="' . $row[ 'id' ] . '">';
										echo $row[ 'name' ];
										echo '</option>';
									}
									?>
									</select>

									<ul id="from_suggesstion">
									</ul>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<select name="tooo" class="inputText" placeholder="Destination city"/>
									<?php
									//include( 'db.php' );
									$result = mysql_query( "SELECT id,name FROM city" );
									while ( $row = mysql_fetch_array( $result ) ) {
										echo '<option value="' . $row[ 'id' ] . '">';
										echo $row[ 'name' ];
										echo '</option>';
									}
									?>
									</select>

									<ul id="to_suggesstion">
									</ul>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<input type="date" placeholder="Journey Date" required name="date" id="OnwardDate" class="form-control">
								</div>
							</div>
							<div class="col-md-2">
								<input type="submit" class="btn btn-default" value="Search Buses" id="btn_submit"/>
							</div>
							<div class="clearfix"></div>
							<div class="search_space_buttom"></div>
						</form>
					</div>
				</div>
			</div>
			<hr>
		</section>
		<!-- end of the code-->
		<div class="text-center">
			<div class="panel panel-default" id="mypanelhead">
				<div class="panel-heading" id="mypan">
					<table class="table table-striped" id="mytable">
						<form method="post" action="book_bus_user">
						
				<input type= "hidden" value = "<?=$date_bus?>" name = "date">
						
				<input type= "hidden" value = "<?= $fro?>" name = "from">
				<input type= "hidden" value = "<?= $t?>" name = "to">
								<?php
							$sql = "SELECT id,busname,price,locn,dep,arr FROM bus_details WHERE  tooo='$t' AND frommm='$fro'";
							
							if ( $result = mysqli_query( $con1, $sql ) ) {
								$count1 = 0;
								//<a href="#" data-toggle="modal" data-target="#myModal2">Bus details</a>

								// Fetch one and one row
								while ( $row1 = mysqli_fetch_row( $result ) ) {
									$count1++;
									$a0 = $row1[0];
									$a1 = $row1[ 1 ];
									$a2 = $row1[ 2 ];
									$a3 = $row1[ 3 ];
									
$dep = $row1[4];
$arr = $row1[5];
									echo '<tr style="height: 100px;">
				<td><b>' . $a1 . '</b><br><br>Bus Name</td>
				<td>' . $frommm . '<br><br>from</td>
				<td>' . $tooo . '<br><br>To</td>
				<td>Rs. ' . $a2 . '<br><br>Price</td>
				<td>Dep : '.$dep.'<br><br>Arr : '.$arr.'</td>
				<td><button type = "submit" name = "book'.$a0.'" class="btn btn-danger">Book Seats</button></td>
			</tr>';
								}
								// Free result set
								mysqli_free_result( $result );
							}
							if ( $count1 == 0 ) {
								echo '<tr style="height: 200px;">
				<td><h2>NO BUS FOUND </h2></td>
			</tr>';

							}
							?>
						</form>
					</table>
				</div>
			</div>
		</div>




	</div>
	<?php include 'include/about.php'; 
include 'include/footer.php';
?>

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
									<form role="form" method="post" class="form-horizontal">
										<div class="form-group">
											<label for="email" class="col-sm-2 control-label">
												Email</label>
										

											<div class="col-sm-10">
												<input type="email" required class="form-control" id="email1" placeholder="Email" name="email">
											</div>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1" class="col-sm-2 control-label">
												Password</label>
										



											<div class="col-sm-10">
												<input type="password" required class="form-control" id="inputPassword1" placeholder="Password" name="password"/>
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
												<input type="email" required class="form-control" id="email2" placeholder="Email" name="email2"/>
											</div>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1" class="col-sm-2 control-label">
												Password</label>
										



											<div class="col-sm-10">
												<input type="password" required class="form-control" id="inputPassword2" placeholder="Password" name="password2"/>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-2">
											</div>
											<div class="col-sm-10">
												<button type="submit" name="signin2" class="btn btn-primary btn-sm">
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


	<!-- modal part2-->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" id="momod">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						×</button>
				


					<h4 class="modal-title" id="myModalLabel">
						Bus Details</h4>
				


				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12" style="border-right: 1px dotted #C2C2C2;padding-right: 30px; padding-bottom: 20px">
							<div class="media">
								<div class="media-left media-top">
									<img class="media-object" src="images/bus1.jpg" alt="..." style="margin-left: 10px">
								</div>
								<div class="media-body">
									From: Bhubaneswar<br> To: Balasore<br> Total no of seats: 52<br> Commutes daily<br> Cost: Rs 200<br> Stoppages: ctc,bdk<br>
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


</body>

</html>