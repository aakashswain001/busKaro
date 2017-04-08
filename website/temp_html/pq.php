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
<html>
<body>
	<form method="get" action="abc.php"> 
     Name:<input type="text" name="name"> </input>
     Contact:<input type="number" name="no"></input>
     Email:<input type="e-mail" name="email"></input>
     <input type="submit"></input>
	</form>
</body>
</html>