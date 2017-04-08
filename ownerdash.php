<?php
session_start();
include_once 'dbconnect.php';
// it will never let you open index(login) page if session is set
if ( isset( $_SESSION[ 'user' ] ) == "" ) {
	header( "Location: index.php" );
	exit;
}
$e = $_SESSION['user'];
$res = mysql_query( "SELECT servicename,adhar,addr,phone FROM bus_owners WHERE id= $e" );
		$row = mysql_fetch_array( $res );
			$count = mysql_num_rows( $res );
			if ( $count = 1 ) {
					$a1=$row['servicename'];
					$a2 = $row['adhar'];
					$a3 = $row['addr'];
					$a4 = $row['phone'];
					if($a1=='' || $a2 =='' || $a3=='' || $a4==''){
						header( "Location: owner_add_data.php" );
						exit;
					}
				} else {
			echo 'error';
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

</head>

<body class="no-trans">
	<!-- scrollToTop -->
	<!-- ================ -->
	<div class="scrollToTop"><i class="icon-up-open-big"></i>
	</div>

	<?php
	include 'include/headertype3.php';
	?>


	<div class="section clearfix">
		<h1 style="margin-left: 50px; padding-top: 20px;">Owner Dashboard</h1>
		<hr>
		<div class="panel panel-default1">
			<div class="panel-heading">
				<div class="text-center">
					<button type="button" class="btn btn-warning btn-round" id="thisbtn" data-toggle="modal" data-target="#myModal3"><i class="fa fa-bus fa-3x" ></i></button>
				</div>
			</div>
		</div>
		<?php
		
		$ex = $_SESSION[ 'user' ];
		$sql = "SELECT id,busname,frommm,tooo,price,locn,status,dep,arr FROM bus_details WHERE owner_id='$ex'";
		if ( $result = mysqli_query( $con1, $sql ) ) {
			// Fetch one and one row
			while ( $row1 = mysqli_fetch_row( $result ) ) {
				$a1 = $row1[ 1 ];
				$a2 = $row1[ 2 ];
				$a3 = $row1[ 3 ];
				$a4 = $row1[ 4 ];
				$a5 = $row1[ 5 ];
				$a6 = $row1[ 6 ];
				$a9= $row1[7];
				$a8 = $row1[8];
				$res = mysql_query( "SELECT name FROM city WHERE id='$a2'" );
			$row = mysql_fetch_array( $res );
			$count = mysql_num_rows( $res ); // if uname/pass correct it returns must be 1 row
			$a2 = $row['name'];	

$res = mysql_query( "SELECT name FROM city WHERE id='$a3'" );
			$row = mysql_fetch_array( $res );
			$count = mysql_num_rows( $res ); // if uname/pass correct it returns must be 1 row
			$a3 = $row['name'];

				if ($a6 == "y"){$a7 = "Accepted";}else{$a7= "Acceptance Pending";}
				echo '<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-primary1">
					<div class="panel-heading">BusName
					</div>
					<div class="media">
						<div class="media-left media-top">
							<img class="media-object" src='.$a5.' alt="..." height="50%" width="60%" style="margin-left: 10px;">
						</div>
						<div class="media-body">
						Name: '.$a1.'<br>
							From:' .$a2.' <br>Departure Time:' .$a9.' <br> To: '.$a3.'<br>Arrival Time:' .$a8.' <br> <br>Cost: Rs '.$a4.'<br>status: '.$a7.'<br>
						</div>
					</div>
				</div>
			</div>
		</div>';

			}
			// Free result set
			mysqli_free_result( $result );
		}
		?>
		<hr>


		<!--code for add bus modal-->
		<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						×</button>
					



						<h4 class="modal-title" id="myModalLabel">
						Add Bus</h4>
					



					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12" style="border-right: 1px dotted #C2C2C2;padding-right: 30px; padding-bottom: 20px">
								<!-- Nav tabs -->
								<form class="form-horizontal" method="post" action="get_data_newbus.php" enctype="multipart/form-data">
									<div class="form-group">
										<label class="control-label col-sm-2" for="busname">BusName</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="busname" id="busname" placeholder="Enter name of bus">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="From">From:</label>
										<div class="col-sm-10">
					
											<select name="from" class="inputText" placeholder="Source city"/>
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


										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="to">To:</label>
										<div class="col-sm-10">
											
											<select name="to" class="inputText" placeholder="Source city"/>
									<?php
									//include( 'db.php' );
									$result = mysql_query( "SELECT id,name FROM city" );
									while ( $row = mysql_fetch_array( $result ) ) {
										echo '<option value="' . $row[ 'id' ] . '">';
										echo $row[ 'name' ];
										echo '</option>';
									}
									?>
									</select>				</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="price">Price</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="price" id="price" placeholder="Enter price">
										</div>
									</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="price">Departure Time</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="dep" id="dep" placeholder="Departure Time">
										</div>
									</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="price">Arrival</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="arr" id="arr" placeholder="Arrival Time">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="filepicker">Upload image</label>
										<div class="col-sm-10"> <input type="file" id="fileToUpload" name="fileToUpload">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-2">
										</div>
										<div class="col-sm-10">
											<button type="submit" class="btn btn-primary btn-sm" name="signin">
													Submit</button>
										

										</div>
									</div>
								</form>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>

		<?php

		include 'include/footer.php';
		?>




		<!-- JavaScript files placed at the end of the document so the pages load faster
		================================================== -->
	<!-- Jquery and Bootstap core js files -->
	<script type="text/javascript" src="plugins/jquery.min.js"></script>
	<!-- Backstretch javascript -->
	<script type="text/javascript" src="plugins/jquery.backstretch.min.js"></script>
	
	<!-- Appear javascript -->
	<script type="text/javascript" src="plugins/jquery.appear.js"></script>
	
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

	<!-- Modernizr javascript -->
	<script type="text/javascript" src="plugins/modernizr.js"></script>

	<!-- Isotope javascript -->
	<script type="text/javascript" src="plugins/isotope/isotope.pkgd.min.js"></script>

	

	
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