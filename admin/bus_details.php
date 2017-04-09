<?php
include_once '../dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	.btn:nth-of-type(odd){
		margin-right: 10px;!important;
	}
	#cnew{ font-family: arial, sans-serif;
		color: #366EA2;
		text-align: center;
font-weight: 300;
		
	}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 70%;
	margin-left: 190px;
}

td, th {
    border: 2px solid #dddddd;
    text-align: center;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>

<table>
 <h1 id="cnew">Bus Owner's Info</h1>
   <tr>
    <th>Name</th>
    <th>Bus Name</th>
    <th>From</th>
    <th>To</th>
    <th>Price</th>
    <th>Status</th>
    <th>Options</th>
  </tr>
  <?php
$sql = "SELECT id,owner_id,busname,frommm,tooo,price,status FROM bus_details";
		if ( $result = mysqli_query( $con1, $sql ) ) {
			// Fetch one and one row
			while ( $row1 = mysqli_fetch_row( $result ) ) {
				$owner_id = $row1[1];
$res = mysql_query( "SELECT fname,lname FROM bus_owners WHERE id='$owner_id'" );
			$row = mysql_fetch_array( $res );
			$count = mysql_num_rows( $res ); // if uname/pass correct it returns must be 1 row
			$owner_name = $row['fname'].''.$row['lname'];
$bus_name = $row1[2];
				$from = $row1[3];
				$to = $row1[4];
				$price= $row1[5];
				$status = $row1[6];
$res = mysql_query( "SELECT name FROM city WHERE id='$from'" );
			$row = mysql_fetch_array( $res );
			$count = mysql_num_rows( $res ); // if uname/pass correct it returns must be 1 row
				$from = $row['name'];
				
$res = mysql_query( "SELECT name FROM city WHERE id='$to'" );
			$row = mysql_fetch_array( $res );
			$count = mysql_num_rows( $res ); // if uname/pass correct it returns must be 1 row
				$to = $row['name'];
				echo '<tr>
	  <td>'.$owner_name.'</td>
    <td>'.$bus_name.'</td>
    <td>'.$from.'</td>
    <td>'.$to.'</td>
    <td>'.$price.'</td>
	<td>'.$status.'</td>
    <td> <button type="button" class="btn btn-success">Approve</button><button type="button" class="btn btn-danger">Diapprove</button></td>
  </tr>';
			}
			// Free result set
			mysqli_free_result( $result );
		}
		
	?>
  
  
</table>

</body>
</html>