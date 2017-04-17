<?php
include_once 'dbconnect.php';

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
 <h1 id="cnew">Customer's Info</h1>
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email-id</th>
    <th>Bus Service Name</th>
    <th>Delete Option</th>
  </tr>
  
  <?php
$sql = "SELECT id,fname,lname,email,servicename FROM bus_owners";
		if ( $result = mysqli_query( $con1, $sql ) ) {
			// Fetch one and one row
			while ( $row1 = mysqli_fetch_row( $result ) ) {
				echo '<tr>
    <td>'.$row1[1].'</td>
    <td>'.$row1[2].'</td>
    <td>'.$row1[3].'</td>
	<td>'.$row1[4].'</td>
    <td> <button type="button" class="btn btn-danger">Delete</button></td>
  </tr>
  ';
			}	// Free result set
			mysqli_free_result( $result );
		}
		
	?>
  
  
</table>

</body>
</html>
