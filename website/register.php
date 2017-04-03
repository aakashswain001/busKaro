 <?php
 ob_start();
 session_start();
 if( isset($_SESSION['user'])!="" ){
  header("Location: checkuser.php");
	 exit;
 }
 include_once 'dbconnect.php';
 $error = false;

//method for signup users
 if ( isset($_GET['reg_customer']) ) {
  // clean user inputs to prevent sql injections
  $fname = trim($_GET['fname']);
  $fname = strip_tags($fname);
  $fname = htmlspecialchars($fname);
  
  $lname = trim($_GET['lname']);
  $lname = strip_tags($lname);
  $lname = htmlspecialchars($lname);
  
  $email = trim($_GET['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_GET['password']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  // password encrypt using SHA256();
  $password = md5( $pass);
  $status = "N";
	 $ukey = md5($email);
  // if there's no error, continue to signup
  if( !$error ) {
 
   $query = "INSERT INTO bus_users(fname,lname,password,email,status,ukey) VALUES('$fname','$lname','$password','$email','$status','$ukey')";
   $res = mysql_query($query);
    
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    $fullname = $fname.' '.$lname;
	$clink = 'http://www.buskaro.in/confirm_reg?ukey='.'u1'.$ukey;
	   header("Location: reg_send_mail.php?fullname=$fullname&clink=$clink&email=$email");
	   exit;
	   unset($fname);
    unset($ukey);
    unset($lname);
    unset($pass);
    unset($password);
    unset($email);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   } 
    
  }
 }

//method for owners
if ( isset($_GET['reg_owner']) ) {
  
  // clean user inputs to prevent sql injections
  $fname = trim($_GET['fname']);
  $fname = strip_tags($fname);
  $fname = htmlspecialchars($fname);
  
  $lname = trim($_GET['lname']);
  $lname = strip_tags($lname);
  $lname = htmlspecialchars($lname);
  
  $email = trim($_GET['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_GET['password']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  $status = "N";
	 $ukey = hash('sha256',$email);
	
  // if there's no error, continue to signup
  if( !$error ) {
 
   $query = "INSERT INTO bus_owners(fname,lname,password,email,status,ukey) VALUES('$fname','$lname','$password','$email','$status','$ukey')";
   $res = mysql_query($query);
    
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    $fullname = $fname.' '.$lname;
		$clink = 'http://www.buskaro.in/confirm_reg?ukey='.'u2'.$ukey;
	  header("Location: reg_send_mail.php?fullname=$fullname&clink=$clink&email=$email");
	   exit;
	unset($fname);
    unset($ukey);
    unset($lname);
    unset($pass);
    unset($password);
    unset($email);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   } 
    
  }
 }
header("Location: index.php");
exit;
ob_end_flush();
?>