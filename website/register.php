 <?php
 ob_start();
 session_start();
 if( isset($_SESSION['user'])!="" ){
  header("Location: checkuser.php");
 }
 include_once 'dbconnect.php';
 $error = false;
 $reg = 0;

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
  $password = hash('sha256', $pass);
  $status = "N";
	 $ukey1 = rand(10,20).$email;
	 $ukey = hash('sha256',$ukey1);
	 unset($ukey1);
  // if there's no error, continue to signup
  if( !$error ) {
 
   $query = "INSERT INTO bus_users(fname,lname,password,email,status,ukey) VALUES('$fname','$lname','$password','$email','$status','$ukey')";
   $res = mysql_query($query);
    
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($fname);
    unset($ukey);
    unset($lname);
    unset($pass);
    unset($password);
    unset($email);
	   $reg=1;
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
	 $ukey1 = rand(10,20).$email;
	 $ukey = hash('sha256',$ukey1);
	 unset($ukey1);
  // if there's no error, continue to signup
  if( !$error ) {
 
   $query = "INSERT INTO bus_owners(fname,lname,password,email,status,ukey) VALUES('$fname','$lname','$password','$email','$status','$ukey')";
   $res = mysql_query($query);
    
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($fname);
    unset($ukey);
    unset($lname);
    unset($pass);
    unset($password);
    unset($email);
	   $reg=1;
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   } 
    
  }
 }
header("Location: index.php?reg=$reg");
?>