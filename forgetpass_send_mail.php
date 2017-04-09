
<?php
ob_start();
session_start();
//send mail if no error
include_once 'dbconnect.php';
// include phpmailer class
		require_once 'mailer/class.phpmailer.php';
		// creates object
		$mail = new PHPMailer(true);	


$email = strip_tags( $_GET[ 'email' ] );
$sql = "SELECT ukey FROM bus_users WHERE 'email'='$email";
$res = mysql_query( "SELECT ukey FROM bus_users WHERE email='$email'" );
			$row = mysql_fetch_array( $res );
			$count = mysql_num_rows( $res ); // if uname/pass correct it returns must be 1 row
			if ( $count = 1 ) {
					$ukey = $row['ukey'];
				}
$_SESSION['send_ukey']= $ukey;
$_SESSION['send_email']= $email;
$subject = "Password Reset";
// HTML email ends here
$message = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Confirmation</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="file:///C|/Users/lenovo/Documents/GitHub/busKaro/website/styleb1.css">
  <link rel="stylesheet" type="text/css" href="custom.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
	  #sec{

		  max-height: 303px;
	  }
	  
	  container{
		  max-height: 900px; !important;
	  }
	  #desc{
		  font-size: 30px;
		  font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
		  color:#4288D3;
	  }
	  span{font-size: 30px;
		  font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
		  color: #3879BD;
		  
	  }
	  h2{
		  background-color:#4288D3;
		  height: 80px;
		  font-size-adjust: auto;
		  font-weight:500px;
	  }
	  #d{
		  max-height: 60px;
	  }


	</style>

</head>

<body>
<section id="sec">
<div class="container" >
<div class="qlt-confirmation">
  	<div class="panel panel-default">
      <div class="panel-body">
        
        <h2 style="text-align: center; padding-top: 20px;">BusKaro</h2>
        <center>
        <img src="http://www.iconfinder.com/icons/642206/download/png//128" style="width:70px; height: 70px;">
         <h3>Hi,<span style="color: #5F5959;">USER</span></h3>
          <p id="desc" style=" font-size: 30px;
		  color: #3879BD;">We assure you to provide the best service in town.<img src="http://www.iconfinder.com/icons/1880589/download/png/64" style="width:60px; height: 60px;"></span><br><br><br>
			<p>Your key is '.$ukey.'<img src="http://www.iconfinder.com/icons/1814103/download/png/64" style="width:60px; height: 60px;"></p>

         <label id="d">
              Find Us On : 
              <a href="https://www.facebook.com/akash.ranjan.96742" target="_blank"><img style="vertical-align:middle" src="https://cdnjs.cloudflare.com/ajax/libs/webicons/2.0.0/webicons/webicon-facebook-m.png" /></a>
              <a href="https://twitter.com/aakashswain001" target="_blank"><img style="vertical-align:middle" src="https://cdnjs.cloudflare.com/ajax/libs/webicons/2.0.0/webicons/webicon-twitter-m.png" /></a>
              <a href="https://plus.google.com/u/0/+AkashSwain001" target="_blank"><img style="vertical-align:middle" src="https://cdnjs.cloudflare.com/ajax/libs/webicons/2.0.0/webicons/webicon-googleplus-m.png" /></a>
              
            </label>
		  </center>
      </div>
	</div>
</div>
	</div>
	</section>
</body>
</html>';
// HTML email ends here

try {
	$mail->IsSMTP();
	$mail->isHTML( true );
	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->AddAddress( $email );
	$mail->Username = "aakashswain001@gmail.com";
	$mail->Password = "sang@1234";
	$mail->SetFrom( 'aakashswain001@gmail.com', 'BusKaro' );
	$mail->AddReplyTo( "aakashswain001@gmail.com", "BusKaro" );
	$mail->Subject = $subject;
	$mail->Body = $message;
	$mail->AltBody = $message;

	if ( $mail->Send() ) {
header( "Location: confirm_pass_forget.php" );
exit;
	}

} catch ( phpmailerException $ex ) {
 echo '<script type ="text/javascript">alert("mail not send");</script>';
header( "Location: index.php" );
exit;
}
?>