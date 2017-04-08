<?php
session_start();
include_once 'dbconnect.php';
// it will never let you open index(login) page if session is set
if ( isset( $_SESSION[ 'user' ] ) == "" ) {
	header( "Location: index.php" );
	exit;
}
$e = $_SESSION['user'];
$res = mysql_query( "SELECT fname,email,servicename,adhar,addr,phone FROM bus_owners WHERE id= $e" );
		$row = mysql_fetch_array( $res );
			$count = mysql_num_rows( $res );
			if ( $count = 1 ) {
					
					$a1=$row['servicename'];
					$a2 = $row['adhar'];
					$a3 = $row['addr'];
					$a4 = $row['phone'];
					$a5 = $row['email'];
					$a6 = $row['fname'];
					
			} else {
			echo 'error';
				}
//for password change
 if ( isset( $_POST[ 'update' ] ) ){
 	// clean user inputs to prevent sql injections
 	$pass = trim( $_POST[ 'changepass' ] );
	$password= md5($pass);
	 
	 $ex = $_SESSION[ 'user' ];
  	$query = "UPDATE bus_owners
SET password = '$password'
WHERE id = $ex";
 	$res = mysql_query( $query );
 	if ( $res ) {
 		echo '<script type="text/javascript">alert("Password Successfully changed");</script>';

 	} else {

 		echo '<script type="text/javascript">alert("some error");</script>';
 	}

 }
//to check no of bus

	$bus_count = 0;
		$sql = "SELECT id FROM bus_details WHERE owner_id='$e'";
		if ( $result = mysqli_query( $con1, $sql ) ) {
			// Fetch one and one row
			while ( $row1 = mysqli_fetch_row( $result ) ) {
			$bus_count++;
			
			}
			// Free result set
			mysqli_free_result( $result );
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
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>

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

<style>
  html{height:100%;}

 


.box {
	width: 400px;
	height: 60px;
	-moz-border-radius: 30px;
	-webkit-border-radius: 30px;
	border-radius: 30px;
	-moz-background-clip: padding;
	-webkit-background-clip: padding-box;
	background-clip: padding-box;
	background-image: -moz-linear-gradient(90deg, #dfdfdf 0%, #e9e9e9 100%);
	background-image: -o-linear-gradient(90deg, #dfdfdf 0%, #e9e9e9 100%);
	background-image: -webkit-linear-gradient(90deg, #dfdfdf 0%, #e9e9e9 100%);
	background-image: linear-gradient(90deg, #dfdfdf 0%, #e9e9e9 100%);
	position: relative;
	top: 120px;
	display: table-cell;
	vertical-align: middle;
	text-align: center;
}

p {
  color: #999;
  display: inline;
  position: absolute;
  bottom: 13px;
  left: 20px;
  margin-left: 150px;
  margin-top: 40px;
  padding-top: 50px;
}
.user {
  color: #000;

}
#btm{
	border:2px solid;
	border-radius: 25px;

}
	
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
	#lastcol{
		display: none;
	}
	
	
}

</style>

		<script>
			$('#myModal').modal('show');
		</script>

	</head>

	<body class="no-trans">
		<!-- scrollToTop -->
		<!-- ================ -->
		<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

<?php include 'include/headertype4.php'; ?>

		<center>
  <div class="box" style="margin-top: 200px;">
    <p >Hi, <span class="user"><?= $a6;?></span></p>
  </div>
  
</center>

<center>

	<div class="container">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" style="margin-top: 150px;">
   
   
          <div class="panel panel-info">
          <br>
            
            <div class="panel-body" >

               <!-- <div class="col-md-3 col-lg-3 " align="center">  </div>-->
                
         
                <div class=" col-md-12 col-lg-12 col-xs-12" > 
                
                  <table class="table table-user-information" >
                    <tbody>
                    
                      <tr>
       <td>Bus Service Name: </td>
                         <td><?= $a1;?></td>
                        
                      </tr>
                      <tr>
                      	<td>Adhar Num: </td>
                         <td><?= $a2;?></td>
                      </tr>
                      <tr>
                        <td>Address: </td>
                        <td><?= $a3;?></td>
                        </tr>
                       <tr>
                        <td>Email Id: </td>
                        <td><?= $a5;?></td>
                        
                      </tr>
                        <td>Phone Number:</td>
                        <td><?= $a4;?></td>
                        </tr>
                        </tr>
                        <td>No of Buses: </td>
                        <td><?= $bus_count;?></td>
                        </tr>
                        <tr>
                        	<td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="btm">Change Password</button></td>
                        	<td id="lastcol"></td>
                        </tr>
                     
                     
                    </tbody>
                  </table>
                  
                  </div>
            </div>
            </div>
            </div>
            </div>
            </div>
        </center>
        
        <?php  include 'include/subfooter.php' ?>
        
        
        <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Password</h4>
      </div>
      <div class="modal-body">
        <div class="col-sm-4">
        	Reset Password:        	
        </div>
     <form method="post">   <div class="col-sm-8">
        	<input type="Password" required name="changepass">
        </div>
        <br>
        <br>
        <div class="col-sm-4">
        	Confirm Password:        	
        </div>
        <div class="col-sm-8">
        	<input type="Password" required name="confipass">
        </div>
      </div>
      <br>
      <br>
      <div class="modal-footer">
       <input type="submit" value="updade" class="btn btn-info btn-round" id="registerButtonService" name="update">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btm">Close</button>
</form> 
      </div>
    </div>

  </div>
</div>
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

	</body>
</html>