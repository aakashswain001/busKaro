<?php
ob_start();
session_start();
//send mail if no error
include_once 'dbconnect.php';
// include phpmailer class
		require_once 'mailer/class.phpmailer.php';
		// creates object
		$mail = new PHPMailer(true);	
		
$name = strip_tags( $_GET[ 'name2' ] );
$msg= strip_tags( $_GET[ 'message2' ] );
$email = strip_tags( $_GET[ 'email2' ] );
$message = $msg.'my email is'.$email;
$subject=$name.', has messaged through BusKaro.';
try {
	$mail->IsSMTP();
	$mail->isHTML( true );
	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->AddCC("priyabrat.pradhan.cetb@gmail.com");
	$mail->AddCC("sanghota4567@gmail.com");
	$mail->AddCC("apasish100@gamil.com");
	$mail->Username = "aakashswain001@gmail.com";
	$mail->Password = "sang@1234";
	$mail->SetFrom( 'aakashswain001@gmail.com', 'BusKaro' );
	$mail->AddReplyTo( "aakashswain001@gmail.com", "BusKaro" );
	$mail->Subject = $subject;
	$mail->Body = $message;
	$mail->AltBody = $message;

	if ( $mail->Send() ) {
	}

} catch ( phpmailerException $ex ) {
}
header( "Location: index.php" );
exit;
?>