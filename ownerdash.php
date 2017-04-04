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
		<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

		<!--Font Awesome (added because you use icons in your prepend/append)-->
		<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

	</head>
	<body class="no-trans">
		<!-- scrollToTop -->
		<!-- ================ -->
		<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

<?php
include 'include/headertype3.php';
?>


		<div class="section clearfix">
			<h1 style="margin-left: 50px; padding-top: 20px;">Owner Dashboard</h1><hr>
			<div class="panel panel-default1">
				<div class="panel-heading">
				<div class="text-center">
				<button type="button" class="btn btn-warning btn-round"><i class="fa fa-bus fa-3x" id="thisbtn" data-toggle="modal" data-target="#myModal3"></i></button>
				</div>
				</div>
			</div>
		
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="panel panel-primary1">
						<div class="panel-heading">BusName<a href="#" data-toggle="modal" data-target="#myModal"></a></div>
						<div class="media">
							<div class="media-left media-top">
								<img class="media-object" src="images/bus1.jpg" alt="..." style="margin-left: 10px">
							</div>
							<div class="media-body">
								From: Bhubaneswar<br>
								To: Balasore<br>
								Total no of seats: 52<br>
								Commutes daily<br>
								Cost: Rs 200<br>
								Stoppages: ctc,bdk<br>
								Approval pending<br>
							</div>
						</div>
					</div>
				</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="panel panel-primary1">
						<div class="panel-heading">BusName<a href="#" data-toggle="modal" data-target="#myModal"></a></div>
						<div class="media">
							<div class="media-left media-top">
								<img class="media-object" src="images/bus1.jpg" alt="..." style="margin-left: 10px">
							</div>
							<div class="media-body">
								From: Bhubaneswar<br>
								To: Balasore<br>
								Total no of seats: 52<br>
								Commutes daily<br>
								Cost: Rs 200<br>
								Stoppages: ctc,bdk<br>
								Approval pending<br>
							</div>
						</div>
					</div>
				</div>

			</div>
						<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="panel panel-primary1">
						<div class="panel-heading">BusName<a href="#" data-toggle="modal" data-target="#myModal"></a></div>
						<div class="media">
							<div class="media-left media-top">
								<img class="media-object" src="images/bus1.jpg" alt="..." style="margin-left: 10px">
							</div>
							<div class="media-body">
								From: Bhubaneswar<br>
								To: Balasore<br>
								Total no of seats: 52<br>
								Commutes daily<br>
								Cost: Rs 200<br>
								Stoppages: ctc,bdk<br>
								Approval pending<br>
							</div>
						</div>
					</div>
				</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="panel panel-primary1">
						<div class="panel-heading">BusName<a href="#" data-toggle="modal" data-target="#myModal"></a></div>
						<div class="media">
							<div class="media-left media-top">
								<img class="media-object" src="images/bus1.jpg" alt="..." style="margin-left: 10px">
							</div>
							<div class="media-body">
								From: Bhubaneswar<br>
								To: Balasore<br>
								Total no of seats: 52<br>
								Commutes daily<br>
								Cost: Rs 200<br>
								Stoppages: ctc,bdk<br>
								Approval pending<br>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
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
							 <form class="form-horizontal">
   								 <div class="form-group">
							      <label class="control-label col-sm-2" for="busname">BusName</label>
     								 <div class="col-sm-10">          
       									 <input type="text" class="form-control" id="busname" placeholder="Enter name of bus">
     								 </div>
    							</div>
   								 <div class="form-group">
    								  <label class="control-label col-sm-2" for="From">From:</label>
     									 <div class="col-sm-10">
      										  <input type="text" class="form-control" id="from" placeholder="Enter starting point">
     									 </div>
    							</div>
   								 <div class="form-group">
      								<label class="control-label col-sm-2" for="to">To:</label>
      									<div class="col-sm-10">          
        									<input type="text" class="form-control" id="to" placeholder="Enter destination">
      									</div>
    							</div>
      							<div class="form-group">
      								<label class="control-label col-sm-2" for="seats">Total no of seats:</label>
      								<div class="col-sm-10">          
        								<input type="number" class="form-control" id="seats" placeholder="Enter total no of seats">
      								</div>
    							</div> 
      							<div class="form-group">
      								<label class="control-label col-sm-2" for="days">Commutes on:</label>
      								<div class="col-sm-10">          
        								<input type="text" class="form-control" id="days" placeholder="The days on which the bus travels">
      								</div>
    							</div>
      							<div class="form-group">
      								<label class="control-label col-sm-2" for="price">Price</label>
      								<div class="col-sm-10">          
        								<input type="text" class="form-control" id="price" placeholder="Enter price">
      								</div>
    							</div>
      							<div class="form-group">
      								<label class="control-label col-sm-2" for="stoppages">Stoppages</label>
      								<div class="col-sm-10">          
        								<input type="text" class="form-control" id="stoppages" placeholder="Enter stoppages">
      								</div>
    							</div>
    							<div class="form-group">
    								<label class="control-label col-sm-2" for="filepicker">Upload image</label>
    								<div class="col-sm-10">	<input type="file" id="filepicker" accept="image/*">
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