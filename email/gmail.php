<?php
function eLeaveSendMail($subject, $body, $email_array){

	ini_set('date.timezone', 'Asia/Colombo');
	ini_set('default_charset', 'UTF-8');
	//require '../email/PHPMailerAutoload.php';
	require_once("../email/PHPMailerAutoload.php");
	$mail = new PHPMailer;
	$mail->CharSet = 'utf-8';
	$mail->isSMTP();//Tell PHPMailer to use SMTP
	$mail->SMTPDebug = 0;//	0 = off (for production use), 1 = client messages, 2 = client and server messages
	$mail->Debugoutput = 'html';
	$mail->Host = 'mail.soundkade.lk';
	$mail->Port = 25;//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->SMTPSecure = 'tls';//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPAuth = true;//Whether to use SMTP authentication
	$mail->IsHTML(true);
	$mail->Username = "info@soundkade.lk";//Username to use for SMTP authentication - use full email address for gmail
	$mail->Password = "Info@123!";//Password to use for SMTP authentication
	$mail->setFrom("info@soundkade.lk", "sounkade.lk");//Sender's Email address and sender's name that will be displayed in the email
	//$mail->addReplyTo('replyto@example.com', 'First Last');//Set an alternative reply-to address
	if(is_array($email_array)){//this variable can be either an array or single string depending on the email
		foreach($email_array as $email){
			$mail->addAddress($email);//Main Receiver of the message, you can specify more than one main receivers by calling this method again and again
		}
	}
	else{
		$mail->addAddress($email_array);//Main Receiver of the message, you can specify more than one main receivers by calling this method again and again		
	}
	
	//$mail->addAddress($receiveremail, $receivername);//Main Receiver of the message, you can specify more than one main recivers by calling this method again and again
	//$mail->addAddress("devoff.it4@mtdi.gov.lk");//Main Receiver of the message
	//$mail->addCC("devoff.it4@mtdi.gov.lk");// set CC 
	//$mail->addBCC("shansama85@gmail.com", "sriyawi@gmail.com", "devoff.it4@mtdi.gov.lk");// set BCC 
	$mail->Subject = $subject;//Subject of the Message
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	//$aka_email_salutation ="<div><strong>Dear e-Leave User, </strong></div>"; 
	
	$aka_email_credits = "
				<div style='font-size:small; line-height:30%;'>
			  <p>e-Hospital,  Hospital Management System for Ragama Teaching Hospital </p>
			  <p>Developed by: Neelika Sapugastanne</p>
			  <p>Contact: <a href='mailto:dearneelika@gmail.com?Subject=Messege%20From%20e-Hospital' target='_top'>dearneelika@gmail.com</a></p>
			</div>
	
	";
	
	
	
	$mail->msgHTML("{$body}.{$aka_email_credits}", dirname(__FILE__));

	//$mail->AltBody = 'This is a plain-text message body. Created by Udara Akalanka'; //Plain text for the mail clients who don't support html
	//$mail->addAttachment('images/phpmailer_mini.png');////Attach an image file to the email
	
	//send the message, check for errors
	if (!$mail->send()) {
		echo "
		<div class='alert alert-danger'>
                               Mailer Error: {$mail->ErrorInfo}
        </div>";		
		
	} else {
		echo "
		<div class='alert alert-success'>
                               Email messege and SMS successfully sent.
        </div>";		
	}		
}