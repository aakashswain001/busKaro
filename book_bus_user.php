<?php
include_once 'dbconnect.php';
$bus_date = $_POST[ 'date' ];

$fro = $_POST[ "from" ];
$t = $_POST[ "to" ];
$res = mysql_query( "SELECT id,name FROM city WHERE id='$fro'" );
$row = mysql_fetch_array( $res );
$count = mysql_num_rows( $res ); // if uname/pass correct it returns must be 1 row
$frommm = $row[ 'name' ];
$res = mysql_query( "SELECT name FROM city WHERE id='$t'" );
$row = mysql_fetch_array( $res );
$count = mysql_num_rows( $res ); // if uname/pass correct it returns must be 1 row
$tooo = $row[ 'name' ];

$sql = "SELECT id,busname,price,locn,dep,arr FROM bus_details WHERE  tooo='$t' AND frommm='$fro'";

if ( $result = mysqli_query( $con1, $sql ) ) {
	while ( $row1 = mysqli_fetch_row( $result ) ) {
		$a0 = $row1[ 0 ];
		if ( isset( $_POST[ 'book' . $a0 ] ) ) {
			$bus_id = $row1[0];
			$a1 = $row1[ 1 ];
			$a2 = $row1[ 2 ];
			$a3 = $row1[ 3 ];
			$dep = $row1[ 4 ];
			$arr = $row1[ 5 ];
		}
	}
	// Free result set
	mysqli_free_result( $result );
}
 $id2 = $bus_id;
?>
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styleb.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">



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


	<script>
		$( document ).ready( function () {
			// invoke the carousel
			$( '#myCarousel' ).carousel( {
				interval: 6000
			} );

			// scroll slides on mouse scroll 
			$( '#myCarousel' ).bind( 'mousewheel DOMMouseScroll', function ( e ) {

				if ( e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0 ) {
					$( this ).carousel( 'prev' );


				} else {
					$( this ).carousel( 'next' );

				}
			} );

			//scroll slides on swipe for touch enabled devices 

			$( "#myCarousel" ).on( "touchstart", function ( event ) {

				var yClick = event.originalEvent.touches[ 0 ].pageY;
				$( this ).one( "touchmove", function ( event ) {

					var yMove = event.originalEvent.touches[ 0 ].pageY;
					if ( Math.floor( yClick - yMove ) > 1 ) {
						$( ".carousel" ).carousel( 'next' );
					} else if ( Math.floor( yClick - yMove ) < -1 ) {
						$( ".carousel" ).carousel( 'prev' );
					}
				} );
				$( ".carousel" ).on( "touchend", function () {
					$( this ).off( "touchmove" );
				} );
			} );

		} );
		//animated  carousel start
		$( document ).ready( function () {

			//to add  start animation on load for first slide 
			$( function () {
				$.fn.extend( {
					animateCss: function ( animationName ) {
						var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
						this.addClass( 'animated ' + animationName ).one( animationEnd, function () {
							$( this ).removeClass( animationName );
						} );
					}
				} );
				$( '.item1.active img' ).animateCss( 'slideInDown' );
				$( '.item1.active h2' ).animateCss( 'zoomIn' );
				$( '.item1.active p' ).animateCss( 'fadeIn' );

			} );

			//to start animation on  mousescroll , click and swipe



			$( "#myCarousel" ).on( 'slide.bs.carousel', function () {
				$.fn.extend( {
					animateCss: function ( animationName ) {
						var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
						this.addClass( 'animated ' + animationName ).one( animationEnd, function () {
							$( this ).removeClass( animationName );
						} );
					}
				} );

				// add animation type  from animate.css on the element which you want to animate

				$( '.item1 img' ).animateCss( 'slideInDown' );
				$( '.item1 h2' ).animateCss( 'zoomIn' );
				$( '.item1 p' ).animateCss( 'fadeIn' );

				$( '.item2 img' ).animateCss( 'pulse' );
				$( '.item2 h2' ).animateCss( 'flash' );
				$( '.item2 p' ).animateCss( 'fadeIn' );

				$( '.item3 img' ).animateCss( 'fadeInLeft' );
				$( '.item3 h2' ).animateCss( 'fadeInDown' );
				$( '.item3 p' ).animateCss( 'fadeIn' );
			} );
		} );
	</script>




	<body class="no-trans">
		<!-- scrollToTop -->
		<!-- ================ -->
		<div class="scrollToTop"><i class="icon-up-open-big"></i>
		</div>
		<?php include 'include/headertype6.php'; ?>
		<style>
			.carousel-inner> .item> img,
			.carousel-inner> .item> a> img {
				width: 70%;
				margin: auto;
			}
		</style>

		<body>
			<blockquote>
				<h1 id="head" class="text-center text-uppercase col-lg-12">Ticket Booking</h1>
			</blockquote>
			<div class="row">
				<div class="container">
					<div class="col-md-6">
						<div id="myCarousel" class="carousel slide" style="height:100px,width:200px">
							<!-- Indicators -->
							<ol class="carousel-indicators">
								<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
								<li data-target="#myCarousel" data-slide-to="1"></li>
								<li data-target="#myCarousel" data-slide-to="2"></li>
							</ol>

							<!-- Wrapper for slides -->
							<div class="carousel-inner">
								<div class="item item1 active">
									<div class="fill" style=" background-color:#48c3af; height: 350px;">
										<div class="inner-content">
											<div class="carousel-img">
												<img src="images/b11.png" alt="bus1" class="img img-responsive"/>
											</div>
											<div class="carousel-desc">

												<h2>Bus With Best Seats</h2>
												<p>Comfort 100%</p>

											</div>
										</div>
									</div>
								</div>
								<div class="item item2">
									<div class="fill" style="background-color:#b33f4a; height: 350px;">
										<div class="inner-content">
											<div class="carousel-img">
												<img src="images/b12.png" alt="bus2" class="img img-responsive"/>
											</div>
											<div class="carousel-desc">
												<h2>Windows Everywhere</h2>
												<p>Emergency exit at the back</p>

											</div>
										</div>
									</div>
								</div>
								<div class="item item3">
									<div class="fill col-lg-12" style="background-color:#7fc2f4; height: 350px;">
										<div class="inner-content" style="max-height: 400px;">
											<div class="carousel-img">
												<img src="images/b12.png" alt="bus3" class="img img-responsive"/>
											</div>
										</div>
										<div class="carousel-desc">

											<h2>Have A Safe Journey</h2>
											<p>Enjoy!!!</p>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="container">
						<div class="col-md-6">
							<form class="form-horizontal" role="form">

								<div class="form-group" style="padding-top: 20px;">
									<label for="seat_no" class="control-label col-sm-2">BusName:</label>
									<div class="col-sm-3 col-lg-6 col-lg-offset-0">
										<?php echo $a1; ?>
									</div>
								</div>
								<div class="form-group">
									<label for="from" class="control-label col-sm-2">From:</label>
									<div class="col-sm-3 col-lg-6 col-lg-offset-0">
										<?php echo $frommm; ?>
									</div>
								</div>
								<div class="form-group">
									<label for="from" class="control-label col-sm-2">Departure: </label>
									<div class="col-sm-3 col-lg-6 col-lg-offset-0">
										<?php echo $dep; ?>
									</div>
								</div>
								<div class="form-group">
									<label for="To" class="control-label col-sm-2">To:</label>
									<div class="col-sm-3 col-lg-6">
										<?php echo $tooo; ?>
									</div>
								</div>
								<div class="form-group">
									<label for="from" class="control-label col-sm-2">Arrival:</label>
									<div class="col-sm-3 col-lg-6 col-lg-offset-0">
										<?php echo $arr; ?>
									</div>
								</div>
								<div class="form-group">
									<label for="d_on" class="control-label col-sm-2">Date:</label>
									<div class="col-sm-3 col-lg-6">
										<?php echo $bus_date; ?>
									</div>
								</div>
							</form>

						</div>
					</div>
				</div>



				<div class="row" style="padding-top:10px;">
					<div class="container" style="padding-top:10px;">
						<div class="col-md-12">
							<div class="cockpit" style="padding-top:10px;">
								<h1 style="padding-top:10px;">Please select a seat</h1>
							</div>

							<form method="post" action="payment">

								<ol class="cabin fuselage">
									<li class="row row--1">
										<ol class="seats" type="A">
											<li class="seat">
												<input type="checkbox" id="1A" name="1A"/>
												<label for="1A">1A</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="1B" name="1B"/>
												<label for="1B">1B</label>
											</li>

											<li class="seat">
												<input type="checkbox" disabled id="1D" name="1D"/>
												<label for="1D">O</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="1E" name="1E"/>
												<label for="1E">1E</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="1F" name="1F"/>
												<label for="1F">1F</label>
											</li>
										</ol>
									</li>
									<li class="row row--2">
										<ol class="seats" type="A">
											<li class="seat">
												<input type="checkbox" id="2A" name="2A"/>
												<label for="2A" id="ab">2A</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="2B" name="2B"/>
												<label for="2B">2B</label>
											</li>

											<li class="seat">
												<input type="checkbox" id="2D" name="2D"/>
												<label for="2D">2D</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="2E" name="2E"/>
												<label for="2E">2E</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="2F" name="2F"/>
												<label for="2F">2F</label>
											</li>
										</ol>
									</li>
									<li class="row row--3">
										<ol class="seats" type="A">
											<li class="seat">
												<input type="checkbox" id="3A" name="3A"/>
												<label for="3A">3A</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="3B" name="3B"/>
												<label for="3B">3B</label>
											</li>

											<li class="seat">
												<input type="checkbox" id="3D" name="3D"/>
												<label for="3D">3D</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="3E" name="3E"/>
												<label for="3E">3E</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="3F" name="3F"/>
												<label for="3F">3F</label>
											</li>
										</ol>
									</li>
									<li class="row row--4">
										<ol class="seats" type="A">
											<li class="seat">
												<input type="checkbox" id="4A" name="4A"/>
												<label for="4A">4A</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="4B" name="4B"/>
												<label for="4B">4B</label>
											</li>

											<li class="seat">
												<input type="checkbox" id="4D" name="4D"/>
												<label for="4D">4D</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="4E" name="4E"/>
												<label for="4E">4E</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="4F" name="4F"/>
												<label for="4F">4F</label>
											</li>
										</ol>
									</li>
									<li class="row row--5">
										<ol class="seats" type="A">
											<li class="seat">
												<input type="checkbox" id="5A" name="5A"/>
												<label for="5A">5A</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="5B" name="5B"/>
												<label for="5B">5B</label>
											</li>

											<li class="seat">
												<input type="checkbox" id="5D" name="5D"/>
												<label for="5D">5D</label>

											</li>
											<li class="seat">
												<input type="checkbox" id="5E" name="5E"/>
												<label for="5E">5E</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="5F" name="5F"/>
												<label for="5F">5F</label>
											</li>
										</ol>
									</li>
									<li class="row row--6">
										<ol class="seats" type="A">
											<li class="seat">
												<input type="checkbox" id="6A" name="6A"/>
												<label for="6A">6A</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="6B" name="6B"/>
												<label for="6B">6B</label>
											</li>

											<li class="seat">
												<input type="checkbox" id="6D" name="6D"/>
												<label for="6D">6D</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="6E" name="6E"/>
												<label for="6E">6E</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="6F" name="6F"/>
												<label for="6F">6F</label>
											</li>
										</ol>
									</li>
									<li class="row row--7">
										<ol class="seats" type="A">
											<li class="seat">
												<input type="checkbox" id="7A" name="7A"/>
												<label for="7A">7A</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="7B" name="7B"/>
												<label for="7B">7B</label>
											</li>

											<li class="seat">
												<input type="checkbox" id="7D" name="7D"/>
												<label for="7D">7D</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="7E" name="7E"/>
												<label for="7E">7E</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="7F" name="7F"/>
												<label for="7F">7F</label>
											</li>
										</ol>
									</li>
									<li class="row row--8">
										<ol class="seats" type="A">
											<li class="seat">
												<input type="checkbox" id="8A" name="8A"/>
												<label for="8A">8A</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="8B" name="8B"/>
												<label for="8B">8B</label>
											</li>

											<li class="seat">
												<input type="checkbox" id="8D" name="8D"/>
												<label for="8D">8D</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="8E" name="8E"/>
												<label for="8E">8E</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="8F" name="8F"/>
												<label for="8F">8F</label>
											</li>
										</ol>
									</li>
									<li class="row row--9">
										<ol class="seats" type="A">
											<li class="seat">
												<input type="checkbox" id="9A" name="9A"/>
												<label for="9A">9A</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="9B" name="9B"/>
												<label for="9B">9B</label>
											</li>

											<li class="seat">
												<input type="checkbox" id="9D" name="9D"/>
												<label for="9D">9D</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="9E" name="9E"/>
												<label for="9E">9E</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="9F" name="9F"/>
												<label for="9F">9F</label>
											</li>
										</ol>
									</li>
									<li class="row row--10">
										<ol class="seats" type="A">
											<li class="seat">
												<input type="checkbox" id="10A" name="10A"/>
												<label for="10A">10A</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="10B" name="10B"/>
												<label for="10B">10B</label>
											</li>

											<li class="seat">
												<input type="checkbox" id="10D" name="10D"/>
												<label for="10D">10D</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="10E" name="10E"/>
												<label for="10E">10E</label>
											</li>
											<li class="seat">
												<input type="checkbox" id="10F" name="10F"/>
												<label for="10F">10F</label>
											</li>
										</ol>
									</li>
								</ol>
								<?php
								$sql = "SELECT id,seat_no from tickets WHERE date='$bus_date' AND bus_id='$id2'";
								if ( $result = mysqli_query( $con1, $sql ) ) {
									while ( $row1 = mysqli_fetch_row( $result ) ) {
										$b0 = $row1[ 0 ];
										$b1 = $row1[ 1 ];
										echo '<script type="text/javascript">document.getElementById("' . $b1 . '").disabled = true;</script>';

									}
									// Free result set
									mysqli_free_result( $result );
								}

								?>



						</div>
					</div>
				</div>
<input type="hidden" name="bus_id" value=<?=$bus_id ?>>
				<input type="hidden" name="dep" value=<?=$dep ?>>
				<input type="hidden" name="arr" value=<?=$arr ?>>
				<input type="hidden" name="busname" value=<?=$a1 ?>>
				<input type="hidden" name="date" value=<?=$bus_date ?>>
				<input type="hidden" name="from" value=<?=$frommm ?>>
				<input type="hidden" name="to" value=<?=$tooo ?>>
				<input type="hidden" name="price" value=<?=$a2 ?>>
				<div class="col-sm-3 col-lg-2" style="float:right"><input type="submit" id="submit" name="submit" value="GO" onClick="return validate()" class="btn btn-primary">
				</div>
				</form>
		</body>

</html>