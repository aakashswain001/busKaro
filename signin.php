<?php
//login part
ob_start();
session_start();
require_once 'dbconnect.php';

if ( isset( $_POST[ 'signin' ] ) ) {
	
	
	// prevent sql injections/ clear user invalid inputs
		$email = trim( $_POST[ 'email' ] );
		$email = strip_tags( $email );
		$email = htmlspecialchars( $email );
		$pass = trim( $_POST[ 'password' ] );
		$pass = strip_tags( $pass );
		$pass = htmlspecialchars( $pass );
		$type = trim( $_POST[ 'tab-selected' ] );
		$type = strip_tags( $type );
		$type = htmlspecialchars( $type );

		// if there's no error, continue to login
		$password = md5( $pass ); // password hashing using SHA256
	//for bus users	 
$type="bus_user";
	if ( $type == "bus_user" ) {
			$res = mysql_query( "SELECT id,password FROM bus_users WHERE email='$email'" );
			$row = mysql_fetch_array( $res );
			$count = mysql_num_rows( $res ); // if uname/pass correct it returns must be 1 row
			if ( $count = 1 ) {
				if ( $count == 1 && $row[ 'password' ] == $password ) {
					$_SESSION[ 'user' ] = $row[ 'id' ];
					$_SESSION[ 'user_type' ] = "0";
					header( "Location: home.php" );
					exit();
				} else {
					$reg = 10;
				}
			}
		} else {
			//for ownwers
			$res = mysql_query( "SELECT id, fname, password FROM com_users WHERE email='$email'" );
			$row = mysql_fetch_array( $res );
			$count = mysql_num_rows( $res ); // if uname/pass correct it returns must be 1 row
			if ( $count == 1 && $row[ 'password' ] == $password ) {
				$_SESSION[ 'user' ] = $row[ 'id' ];
				$_SESSION[ 'user_type' ] = "1";
				header( "Location: ownerdash.html" );
				exit();
			} else {
				$reg=10;
			}
		}

		unset( $email );
		unset( $password );
		unset( $pass );
}
header("Location: index.php?reg=$reg");
exit();
ob_end_flush();

?>
