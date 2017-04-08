<?php
include_once 'dbconnect.php';
session_start();
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
<!DOCTYPE html>
<html>
<head>
	<title>Payment Gateway</title>
	<link rel="stylesheet" type="text/css" href="css/paymentStyles.css">
</head>
<body style="width: 100%; padding-top: 20px;">
	<div style="width: 100%; padding-top: 20px; text-align: center">
		<table class="payment-gateway">
			<th colspan="2"><h2>Payment Gateway</h2></th>
			<tr>
				<td colspan="2" style="text-align: left;">Your transaction has been successful</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: left; ">Amount Paid = Rs.</td>
			</tr>
			<tr class="last">
				<td><input type="submit" value="Generate receipt"></td>
				<td><input type="submit" value="return to home"></td>
			</tr>
		</table>
	</div>
	<div style="text-align: center">
		<p style="width: 70%; margin: auto; text-align: left; color: gray; font-size: 13px;">*this is a dummy payment gateway</p>
	</div>
</body>
</html>