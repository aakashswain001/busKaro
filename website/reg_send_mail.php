<?php
ob_start();
session_start();
//send mail if no error
include_once 'dbconnect.php';
// include phpmailer class
		require_once 'mailer/class.phpmailer.php';
		// creates object
		$mail = new PHPMailer(true);	
		
$full_name = strip_tags( $_GET[ 'fullname' ] );
$confirmation_link = strip_tags( $_GET[ 'clink' ] );
$email = strip_tags( $_GET[ 'email' ] );
$subject = "Confirm BusKaro Registration";
$text_message = "Hello $full_name, <br /><br /> This is confirmation mail from BusKaro. We are here to make ur transport a lot easier";
$text_message2 = "Click <a href = " . $confirmation_link . ">Here</a>to complete the registration ";
// HTML email starts here


// HTML email ends here
$message = "<html><body>";

$message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";

$message .= "<tr><td>";

$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";

$message .= "<thead>
            <tr height='80'>
              <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >Bus Karo</th>
            </tr>
            </thead>";

$message .= "<tbody>
          
              <tr>
              <td colspan='4' style='padding:15px;'>
                <p style='font-size:20px;'>Hi' " . $full_name . ",</p>
                <hr />
                <p style='font-size:25px;'>Registration confirmation Email from BusKaro</p>
                <p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>" . $text_message . ".</p>
                <br>
                <p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>" . $text_message2 . ".</p>
                <br>
            </tr>
            
            <tr height='80'>
              <td colspan='4' align='center' style='background-color:#f5f5f5; border-top:dashed #00a2d1 2px; font-size:24px; '>
              <label>
              Find Me On : 
              <a href='https://www.facebook.com/akash.ranjan.96742' target='_blank'><img style='vertical-align:middle' src='https://cdnjs.cloudflare.com/ajax/libs/webicons/2.0.0/webicons/webicon-facebook-m.png' /></a>
              <a href='https://twitter.com/aakashswain001' target='_blank'><img style='vertical-align:middle' src='https://cdnjs.cloudflare.com/ajax/libs/webicons/2.0.0/webicons/webicon-twitter-m.png' /></a>
              <a href='https://plus.google.com/u/0/+AkashSwain001' target='_blank'><img style='vertical-align:middle' src='https://cdnjs.cloudflare.com/ajax/libs/webicons/2.0.0/webicons/webicon-googleplus-m.png' /></a>
              
              </label>
              </td>
            </tr>
            
            </tbody>";

$message .= "</table>";

$message .= "</td></tr>";
$message .= "</table>";

$message .= "</body></html>";

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
	$mail->Password = "sang1234";
	$mail->SetFrom( 'aakashswain001@gmail.com', 'BusKaro' );
	$mail->AddReplyTo( "aakashswain001@gmail.com", "BusKaro" );
	$mail->Subject = $subject;
	$mail->Body = $message;
	$mail->AltBody = $message;

	if ( $mail->Send() ) {

		$reg = 3;
	}

} catch ( phpmailerException $ex ) {
	$reg = 4;
}
header( "Location: index.php?reg=$reg" );
exit;
?>