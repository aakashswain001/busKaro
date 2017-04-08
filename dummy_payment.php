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
$seat_no = "";
if ( $count = 1 ) {
	$user_name = $row[ 'fname' ] . ' ' . $row[ 'lname' ];
} else {
	echo 'error';
}
echo $a;
$seat_count = 0;
for ( $i = 1; $i <= 10; $i++ ) {
	if ( $_SESSION[ $i . 'A' ] == "on" ) {

		$seat_count++;
		$seat_no = $i . 'A,' . $seat_no;
		$k = $i . 'A';
		$query = "INSERT INTO tickets(bus_id,date,seat_no) VALUES('$bus_id','$date','$k')";
		$res = mysql_query( $query );
	}
	if ( $_SESSION[ $i . 'B' ] == "on" ) {
		$seat_count++;
		$seat_no = $i . 'B,' . $seat_no;
		$k = $i . 'B';
		$query = "INSERT INTO tickets(bus_id,date,seat_no) VALUES('$bus_id','$date','$k')";
		$res = mysql_query( $query );
	
	}	if ( $_SESSION[ $i . 'C' ] == "on" ) {
		$seat_count++;
		$seat_no = $i . 'C,' . $seat_no;
		//	echo '<input type = "hidden" name = "'.$i.'C" value="on">';
		$k = $i . 'C';
		$query = "INSERT INTO tickets(bus_id,date,seat_no) VALUES('$bus_id','$date','$k')";
		$res = mysql_query( $query );
	}	if ( $_SESSION[ $i . 'D' ] == "on" ) {

		$seat_count++;
		$seat_no = $i . 'D,' . $seat_no;
		//echo '<input type = "hidden" name = "'.$i.'D" value="on">';	
		$k = $i . 'D';
		$query = "INSERT INTO tickets(bus_id,date,seat_no) VALUES('$bus_id','$date','$k')";
		$res = mysql_query( $query );
	}	if ( $_SESSION[ $i . 'E' ] == "on" ) {
		$seat_count++;
		$seat_no = $i . 'E,' . $seat_no;
		//	echo '<input type = "hidden" name = "'.$i.'E" value="on">';
		$k = $i . 'E';
		$query = "INSERT INTO tickets(bus_id,date,seat_no) VALUES('$bus_id','$date','$k')";
		$res = mysql_query( $query );
	}	if ( $_SESSION[ $i . 'F' ] == "on" ) {

		$seat_count++;
		$seat_no = $i . 'F,' . $seat_no;
		$k =  $i . 'F' ;
		$query = "INSERT INTO tickets(bus_id,date,seat_no) VALUES('$bus_id','$date','$k')";
		$res = mysql_query( $query );
}
}
$tot_price = $seat_count * $price;
?>
<!DOCTYPE html>
<html>

<head>
	<title>Payment Gateway</title>
	<link rel="stylesheet" type="text/css" href="css/paymentStyles.css">
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

</head>

<body style="width: 100%; padding-top: 20px;">
	<div style="width: 100%; padding-top: 20px; text-align: center">
		<table class="payment-gateway">
			<th colspan="2">
				<h2>Ticket Receipt</h2>
			</th>
			<tr>
				<td colspan="2" style="text-align: left;">Your transaction has been successful</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: left;">Name:
					<?= $user_name?>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: left;">Bus Name:
					<?= $bus_name?>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: left;">From :
					<?= $from?>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: left;">To :
					<?= $to?>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: left;">Arrival:
					<?= $arr?>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: left;">Departure:
					<?= $dep?>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: left;">Date:
					<?= $date?>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: left;">Seat No:
					<?= $seat_no?>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: left; ">Amount Paid : Rs.
					<?=$tot_price ?>
				</td>
			</tr>
			<tr class="last">
				<td><button type="button" class="btn btn-primary" value="print">print</button>
				</td>
				<td><a href="home.php"><button type="button" class="btn btn-danger">Return Home</button></a>
				</td>
			</tr>
		</table>
	</div>
	<div style="text-align: center">
		<p style="width: 70%; margin: auto; text-align: left; color: gray; font-size: 13px;">*this is a dummy payment gateway</p>
	</div>
</body>

</html>