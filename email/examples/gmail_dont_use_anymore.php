<?php

/*$subject = "Udara Akalanka Jayalath has sent a Leave request on 2016-08-01";
$body = file_get_contents('contentsutf8.html');
$receiveremail = "udaraaka@gmail.com";
$receivername = "Udara Akalanka Jayalath";

eLeaveSendMail($subject, $body, $receiveremail, $receivername);
*/

function eLeaveSendMail($subject, $body, $email_array){
	//echo "HIAAAAAAAAAAAAAAAAAAAAAAAAA<br>";
	
	//exit();
	ini_set('date.timezone', 'Asia/Colombo');
	ini_set('default_charset', 'UTF-8');
	require '../email/PHPMailerAutoload.php';	
	$mail = new PHPMailer;
	$mail->CharSet = 'utf-8';
	$mail->isSMTP();//Tell PHPMailer to use SMTP
	$mail->SMTPDebug = 0;//	0 = off (for production use), 1 = client messages, 2 = client and server messages
	$mail->Debugoutput = 'html';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->SMTPSecure = 'tls';//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPAuth = true;//Whether to use SMTP authentication
	$mail->IsHTML(true);
	$mail->Username = "childhomew@gmail.com";//Username to use for SMTP authentication - use full email address for gmail
	$mail->Password = "0823yamuna";//Password to use for SMTP authentication
	$mail->setFrom("childhomew@gmail.com", "e-Leave - Leave Management System of MTDI");//Sender's Email address and sender's name that will be displayed in the email
	//$mail->addReplyTo('replyto@example.com', 'First Last');//Set an alternative reply-to address
	
	foreach($email_array as $email){
		echo $email."<br>";
		$mail->addAddress($email);//Main Receiver of the message, you can specify more than one main receivers by calling this method again and again
	}
	
	//$mail->addAddress($receiveremail, $receivername);//Main Receiver of the message, you can specify more than one main recivers by calling this method again and again
	//$mail->addAddress("devoff.it4@mtdi.gov.lk");//Main Receiver of the message
	//$mail->addCC("devoff.it4@mtdi.gov.lk");// set CC 
	//$mail->addBCC("shansama85@gmail.com", "sriyawi@gmail.com", "devoff.it4@mtdi.gov.lk");// set BCC 
	$mail->Subject = $subject;//Subject of the Message
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	
	$aka_email_credits = "
				<div style='font-size:small; line-height:30%;'>
			  <p>e-Leave,  Leave Management System of  MTDI </p>
			  <p>Developed by: Udara Akalanka Jayalath</p>
			  <p>Contact: <a href='mailto:udaraaka@gmail.com?Subject=Messege%20From%20e-Leave' target='_top'>udaraaka@gmail.com</a> or <a href='mailto:devoff.it4@mtdi.gov.lk?Subject=Messege%20From%20e-Leave' target='_top'>udaraaka@gmail.com</a></p>
			</div>
	
	";
	
	
	
	$mail->msgHTML($body.$aka_email_credits, dirname(__FILE__));

	//$mail->AltBody = 'This is a plain-text message body. Created by Udara Akalanka'; //Plain text for the mail clients who don't support html
	//$mail->addAttachment('images/phpmailer_mini.png');////Attach an image file to the email
	
	//send the message, check for errors
	if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message sent!";
	}		
}