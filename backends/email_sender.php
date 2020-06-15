<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require_once "../vendor/autoload.php";
	require 'email_templates.php';
	
	// echo "Email Sender page";
	function send_invite($receivers,$html) {
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = 'ams101.arvixeshared.com
';
		$mail->SMTPAuth = true;
		$mail->Username = 'no-reply@schoolsuite.com.ng';
		$mail->Password = '9C$_Yk&Ug;]k';
		$mail->SMTPSecure = 'ssl';
		$mail->SMTPOptions = array(
			'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
			)
		);
		$mail->CharSet   = "UTF-8";
  		// $mail->SMTPDebug = 2;   
		$mail->Port = 465; 
		$mail->setFrom('no-reply@schoolsuite.com.ng','SchoolSuiteNg'); 

		$mail->addAddress($receivers);
		$mail->isHTML(true);
		$mail->Subject = "Join a Group on Academia";
		$mail->Body = $html;
		$alt_text = "Hello Awesome Person, you've been invited to join an Academia group, ";
		$alt_text .= "Register at https://elearning.schoolsuite.com.ng and go to your dashboard to view invite now";
		$mail->AltBody = $alt_text;
		if(!$mail->send()) {
		    return ['data'=>'','status'=>false,'message'=>"Mailer Error: " . $mail->ErrorInfo];
		}else {
		    return ['data'=>'','status'=>true,'message'=>"Message has been sent successfully"];
		}

	}
 
?>