<?php
include_once 'dbconnect.php';
session_start();
$bus_id = $_POST[ 'bus_id' ];
$bus_name = $_POST[ 'busname' ];
$date = $_POST[ 'date' ];
$from = $_POST[ 'from' ];
$to = $_POST[ 'to' ];
$price = $_POST[ 'price' ];
$dep = $_POST[ 'dep' ];
$arr = $_POST[ 'arr' ];
$e = $_SESSION[ 'user' ];
$res = mysql_query( "SELECT fname,lname FROM bus_users WHERE id= $e" );
$row = mysql_fetch_array( $res );
$count = mysql_num_rows( $res );
if ( $count = 1 ) {
	$user_name = $row[ 'fname' ] . ' ' . $row[ 'lname' ];
} else {
	echo 'error';
}

$seat_count = 0;
for ( $i = 0; $i < 10; $i++ ) {
	$_SESSION[ $i . 'A' ] = "";
	$_SESSION[ $i . 'B' ] = "";
	$_SESSION[ $i . 'C' ] = "";
	$_SESSION[ $i . 'D' ] = "";
	$_SESSION[ $i . 'E' ] = "";
	$_SESSION[ $i . 'F' ] = "";
}

for ( $i = 1; $i <= 10; $i++ ) {
	if ( $_POST[ $i . 'A' ] == "on" ) {
		$_SESSION[ $i . 'A' ] = "on";
		$seat_count++;
	}

	if ( $_POST[ $i . 'B' ] == "on" ) {
		$_SESSION[ $i . 'B' ] = "on";
		$seat_count++;
		//	echo '<input type = "hidden" name = "'.$i.'B" value="on">';
	}

	if ( $_POST[ $i . 'C' ] == "on" ) {
		$_SESSION[ $i . 'C' ] = "on";
		$seat_count++;
		//	echo '<input type = "hidden" name = "'.$i.'C" value="on">';
	}

	if ( $_POST[ $i . 'D' ] == "on" ) {
		$_SESSION[ $i . 'D' ] = "on";
		$seat_count++;
		//echo '<input type = "hidden" name = "'.$i.'D" value="on">';	
	}

	if ( $_POST[ $i . 'E' ] == "on" ) {
		$_SESSION[ $i . 'E' ] = "on";
		$seat_count++;
		//	echo '<input type = "hidden" name = "'.$i.'E" value="on">';
	}

	if ( $_POST[ $i . 'F' ] == "on" ) {
		$_SESSION[ $i . 'F' ] = "on";
		$seat_count++;
		//	echo '<input type = "hidden" name = "'.$i.'F" value="on">';
	}
}

$tot_price = $seat_count * $price;
?>
<!--
Author: W3layouts
Author URL: http: //w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
License URL: http: //creativecommons.org/licenses/by/3.0/
	-->
	<!DOCTYPE html>
	<html>

	<head>
		<title>Payment Form Widget Flat Responsive Widget Template :: w3layouts</title>
		<!-- for-mobile-apps -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="keywords" content="Payment Form Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
		<script type="application/x-javascript">
			addEventListener( "load", function () {
				setTimeout( hideURLbar, 0 );
			}, false );

			function hideURLbar() {
				window.scrollTo( 0, 1 );
			}
		</script>
		<!-- //for-mobile-apps -->
		<link href="css/stylePayment.css" rel="stylesheet" type="text/css" media="all"/>
		<link href="css/paymentStyles.css" rel="stylesheet" type="text/css" media="all"/>
		<link href='//fonts.googleapis.com/css?family=Fugaz+One' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Alegreya+Sans:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js/jquery.min.js"></script>
	</head>

	<body>
		<div class="main">
			<div class="content">

				<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="text/javascript">
					$( document ).ready( function () {
						$( '#horizontalTab' ).easyResponsiveTabs( {
							type: 'default', //Types: default, vertical, accordion           
							width: 'auto', //auto or any width like 600px
							fit: true // 100% fit in a container
						} );
					} );
				</script>
				<div class="sap_tabs">
					<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						<div class="pay-tabs">
							<h2>Select Payment Method</h2>
							<ul class="resp-tabs-list">
								<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span><label class="pic1"></label>Credit Card</span>
								</li>
								<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span><label class="pic3"></label>Net Banking</span>
								</li>
								<li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span><label class="pic4"></label>PayPal</span>
								</li>
								<li class="resp-tab-item" aria-controls="tab_item-3" role="tab"><span><label class="pic2"></label>Debit Card</span>
								</li>
								<div class="clear"></div>
							</ul>
						</div>
						<div class="resp-tabs-container">
							<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
								<div class="pay-info">
									<div class="payment-details">
										<h3 class="pay-title">Payment Details</h3>
										<div class="user-info">
											<h5 class="name">Name:   <?php echo $user_name; ?></h5>
											<div class="bus-details">
												<h5 class="left">Bus Name:   <?php echo $bus_name; ?></h5>
												<h5 class="right">Selected seats:   <?php echo $seat_count; ?></h5>
											</div>
											<div class="from-to">
												<h5 class="left">From:   <?php echo $from; ?></h5>
												<h5 class="right">To:   <?php echo $to; ?></h5>
											</div>
											<h5 class="date">Date:   <?php echo $date; ?></h5>
											<div class="time">
												<h5 class="left">Departure time:   <?php echo $dep; ?></h5>
												<h5 class="right">Arrival time:   <?php echo $arr; ?></h5>
											</div>
											<div class="total-cost">
												<h5 class="right">Total cost:   <?php echo $tot_price; ?></h5>
											</div>
										</div>
									</div>
								</div>
								<div class="payment-info">
									<h3 class="pay-title">Credit Card Info</h3>
									<form action="dummy_payment.php" method="post">
										<div class="tab-for">
											<h5>NAME ON CARD</h5>
											<input type="text" required value="">
											<h5>CARD NUMBER</h5>
											<input class="pay-logo" type="text" value="0000-0000-0000-0000" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '0000-0000-0000-0000';}" required="">
										</div>
										<div class="transaction">
											<div class="tab-form-left user-form">
												<h5>EXPIRATION</h5>
												<ul>
													<li>
														<input type="number" required class="text_box" type="text" value="6" min="1"/>
													</li>
													<li>
														<input type="number" required class="text_box" type="text" value="1988" min="1"/>
													</li>

												</ul>
											</div>
											<div class="tab-form-right user-form-rt">
												<h5>CVV NUMBER</h5>
												<input type="text" value="xxxx" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'xxxx';}" required="">
											</div>
											<div class="clear"></div>
										</div>
										<input type="hidden" name="busname" value=<?=$bus_name?>>
										<input type="hidden" name="date" value=<?=$date?>>
										<input type="hidden" name="price" value=<?=$price?>>
										<input type="hidden" name="bus_id" value=<?=$bus_id?>>
										<input type="hidden" name="from" value=<?=$from?>>
										<input type="hidden" name="to" value=<?=$to?>>
										<input type="hidden" name="arr" value=<?=$arr?>>
										<input type="hidden" name="dep" value=<?=$dep?>>
										<input type="submit" value="SUBMIT">

									</form>
									<div class="single-bottom">
										<ul>
											<li>
												<input type="checkbox" id="brand" value="">
												<label for="brand"><span></span>By checking this box, I agree to the Terms & Conditions & Privacy Policy.</label>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
								<div class="pay-info">
									<div class="payment-details">
										<h3 class="pay-title">Payment Details</h3>
										<div class="user-info">
											<h5 class="name">Name:   <?php echo $user_name; ?></h5>
											<div class="bus-details">
												<h5 class="left">Bus Name:   <?php echo $bus_name; ?></h5>
												<h5 class="right">Selected seats:   <?php echo $seat_count; ?></h5>
											</div>
											<div class="from-to">
												<h5 class="left">From:   <?php echo $from; ?></h5>
												<h5 class="right">To:   <?php echo $to; ?></h5>
											</div>
											<h5 class="date">Date:   <?php echo $date; ?></h5>
											<div class="time">
												<h5 class="left">Departure time:   <?php echo $dep; ?></h5>
												<h5 class="right">Arrival time:   <?php echo $arr; ?></h5>
											</div>
											<div class="total-cost">
												<h5 class="right">Total cost:   <?php echo $tot_price; ?></h5>
											</div>
										</div>
									</div>
								</div>
								<div class="payment-info">
									<h3>Net Banking</h3>
									<div class="radio-btns">
										<div class="swit">
											<div class="check_box">
												<div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>Andhra Bank</label> </div>
											</div>
											<div class="check_box">
												<div class="radio"> <label><input type="radio" name="radio"><i></i>Allahabad Bank</label> </div>
											</div>
											<div class="check_box">
												<div class="radio"> <label><input type="radio" name="radio"><i></i>Bank of Baroda</label> </div>
											</div>
											<div class="check_box">
												<div class="radio"> <label><input type="radio" name="radio"><i></i>Canara Bank</label> </div>
											</div>
											<div class="check_box">
												<div class="radio"> <label><input type="radio" name="radio"><i></i>IDBI Bank</label> </div>
											</div>
											<div class="check_box">
												<div class="radio"> <label><input type="radio" name="radio"><i></i>Icici Bank</label> </div>
											</div>
											<div class="check_box">
												<div class="radio"> <label><input type="radio" name="radio"><i></i>Indian Overseas Bank</label> </div>
											</div>
											<div class="check_box">
												<div class="radio"> <label><input type="radio" name="radio"><i></i>Punjab National Bank</label> </div>
											</div>
											<div class="check_box">
												<div class="radio"> <label><input type="radio" name="radio"><i></i>South Indian Bank</label> </div>
											</div>
											<div class="check_box">
												<div class="radio"> <label><input type="radio" name="radio"><i></i>State Bank Of India</label> </div>
											</div>
										</div>
										<div class="swit">
											<div class="check_box">
												<div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>City Union Bank</label> </div>
											</div>
											<div class="check_box">
												<div class="radio"> <label><input type="radio" name="radio"><i></i>HDFC Bank</label> </div>
											</div>
											<div class="check_box">
												<div class="radio"> <label><input type="radio" name="radio"><i></i>IndusInd Bank</label> </div>
											</div>
											<div class="check_box">
												<div class="radio"> <label><input type="radio" name="radio"><i></i>Syndicate Bank</label> </div>
											</div>
											<div class="check_box">
												<div class="radio"> <label><input type="radio" name="radio"><i></i>Deutsche Bank</label> </div>
											</div>
											<div class="check_box">
												<div class="radio"> <label><input type="radio" name="radio"><i></i>Corporation Bank</label> </div>
											</div>
											<div class="check_box">
												<div class="radio"> <label><input type="radio" name="radio"><i></i>UCO Bank</label> </div>
											</div>
											<div class="check_box">
												<div class="radio"> <label><input type="radio" name="radio"><i></i>Indian Bank</label> </div>
											</div>
											<div class="check_box">
												<div class="radio"> <label><input type="radio" name="radio"><i></i>Federal Bank</label> </div>
											</div>
											<div class="check_box">
												<div class="radio"> <label><input type="radio" name="radio"><i></i>ING Vysya Bank</label> </div>
											</div>
										</div>
										<div class="clear"></div>
									</div>
									<form method="post" action="dummy_payment.php">
										<input type="hidden" name="busname" value=<?=$bus_name?>>
										<input type="hidden" name="date" value=<?=$date?>>
										<input type="hidden" name="from" value=<?=$from?>>
										<input type="hidden" name="bus_id" value=<?=$bus_id?>>
										<input type="hidden" name="to" value=<?=$to?>>
										<input type="hidden" name="arr" value=<?=$arr?>>
										<input type="hidden" name="dep" value=<?=$dep?>>
										<input type="hidden" name="price" value=<?=$price?>>
										<input type="submit" value="continue" name="submit">
									</form>

								</div>
							</div>
							<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
								<div class="pay-info">
									<div class="payment-details">
										<h3 class="pay-title">Payment Details</h3>
										<div class="user-info">
											<h5 class="name">Name:   <?php echo $user_name; ?></h5>
											<div class="bus-details">
												<h5 class="left">Bus Name:   <?php echo $bus_name; ?></h5>
												<h5 class="right">Selected seats:   <?php echo $seat_count; ?></h5>
											</div>
											<div class="from-to">
												<h5 class="left">From:   <?php echo $from; ?></h5>
												<h5 class="right">To:   <?php echo $to; ?></h5>
											</div>
											<h5 class="date">Date:   <?php echo $date; ?></h5>
											<div class="time">
												<h5 class="left">Departure time:   <?php echo $dep; ?></h5>
												<h5 class="right">Arrival time:   <?php echo $arr; ?></h5>
											</div>
											<div class="total-cost">
												<h5 class="right">Total cost:   <?php echo $tot_price; ?></h5>
											</div>
										</div>
									</div>
								</div>
								<div class="payment-info">
									<h3>PayPal</h3>
									<h4>Already Have A PayPal Account?</h4>
									<div class="login-tab">
										<div class="user-login">
											<h2>Login</h2>

											<form action="dummy_payment.php">
												<input type="text" value="name@email.com" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'name@email.com';}" required="">
												<input type="password" value="PASSWORD" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'PASSWORD';}" required="">
												<div class="user-grids">
													<div class="user-left">
														<div class="single-bottom">
															<ul>
																<li>
																	<input type="checkbox" id="brand1" value="">
																	<label for="brand1"><span></span>Remember me?</label>
																</li>
															</ul>
														</div>
													</div>
													<div class="user-right">
														<input type="submit" value="LOGIN" onclick="redirect()">
														<script type="text/javascript">
															function redirect() {
																$( 'form' ).attr( 'action', 'dummy_payment.php' );
															};
														</script>
													</div>
													<div class="clear"></div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">
								<div class="pay-info">
									<div class="payment-details">
										<h3 class="pay-title">Payment Details</h3>
										<div class="user-info">
											<h5 class="name">Name:   <?php echo $user_name; ?></h5>
											<div class="bus-details">
												<h5 class="left">Bus Name:   <?php echo $bus_name; ?></h5>
												<h5 class="right">Selected seats:   <?php echo $seat_count; ?></h5>
											</div>
											<div class="from-to">
												<h5 class="left">From:   <?php echo $from; ?></h5>
												<h5 class="right">To:   <?php echo $to; ?></h5>
											</div>
											<h5 class="date">Date:   <?php echo $date; ?></h5>
											<div class="time">
												<h5 class="left">Departure time:   <?php echo $dep; ?></h5>
												<h5 class="right">Arrival time:   <?php echo $arr; ?></h5>
											</div>
											<div class="total-cost">
												<h5 class="right">Total cost:   <?php echo $tot_price; ?></h5>
											</div>
										</div>
									</div>

								</div>
								<div class="payment-info">

									<h3 class="pay-title">Dedit Card Info</h3>
									<form method="get" action="dummy_payment.php">
										<div class="tab-for">
											<h5>NAME ON CARD</h5>
											<input type="text" value="">
											<h5>CARD NUMBER</h5>
											<input class="pay-logo" type="text" value="0000-0000-0000-0000" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '0000-0000-0000-0000';}" required="">
										</div>
										<div class="transaction">
											<div class="tab-form-left user-form">
												<h5>EXPIRATION</h5>
												<ul>
													<li>
														<input type="number" class="text_box" type="text" value="6" min="1"/>
													</li>
													<li>
														<input type="number" class="text_box" type="text" value="1988" min="1"/>
													</li>

												</ul>
											</div>
											<div class="tab-form-right user-form-rt">
												<h5>CVV NUMBER</h5>
												<input type="text" value="xxxx" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'xxxx';}" required="">
											</div>
											<div class="clear"></div>
										</div>
										<input type="submit" value="SUBMIT" onclick="redirect()">
										<script type="text/javascript">
											function redirect() {
												$( 'form' ).attr( 'action', 'dummy_payment.php' );
											};
										</script>
									</form>
									<div class="single-bottom">
										<ul>
											<li>
												<input type="checkbox" id="brand" value="">
												<label for="brand"><span></span>By checking this box, I agree to the Terms & Conditions & Privacy Policy.</label>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</body>

	</html>