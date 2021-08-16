<?php
date_default_timezone_set('Asia/Colombo');
include("../db/db.php");  //set up sql connection 

if (array_key_exists('email', $_POST)) {
	
	
	$sql = "SELECT * FROM customer_reg WHERE email='".trim($_POST['email'])."' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result)<1){//this means current there isn't any profile associated with this email
		echo "<strong><font color='red'>email you provided not exists in our system</font></strong>";

	}
	else{//email exits so send password reset link to this email
		//echo "1";
		//get this customers details from database
		$row = mysqli_fetch_assoc($result);
		
		
		$currenttimestamp = time();
		$reset_hash = password_hash("$currenttimestamp", PASSWORD_DEFAULT);
		$reset_url = "https://soundkade.lk/reset_password.php?reset_id=$reset_hash";
		//$reset_url = "http://localhost/mybroker/reset_password.php?reset_id=$reset_hash";
		$linkvalidtimeinhours = 3;
		
		//first add reset record to database
		$insertquery = "INSERT INTO forgot_password VALUES (NULL, '$reset_hash', '$currenttimestamp', '{$row['id']}')";
		
		if(mysqli_query($conn, $insertquery)){//send email only if query is successful

			
			$subject = "Password reset link for mybroker.lk account {$_POST['email']}";
			$contents = "
			<p>Dear {$row['name']},</p>
			<p>A password reset request has been received for your mybroker.lk account on ".date("Y-m-d, g:i a", $currenttimestamp).". Please <strong><a href='$reset_url'>click here</a></strong> to go to the password reset page. Please note that this reset link is only valid for $linkvalidtimeinhours hours.
			</p>
			<p>Please ignore this email, if you didn't make this request.</p>
			 -- \n 
			My Broker Pvt Ltd.<br>
			No 1112,<br>
			Pannipitiya Road,<br>
			Sri Lanka.
			";
			
			//START SENDING AN EMAIL
			
			require '../email/PHPMailerAutoload.php';

			$mail = new PHPMailer;
			$mail->isSMTP();//Tell PHPMailer to use SMTP
			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			$mail->SMTPDebug = 0;
			//Ask for HTML-friendly debug output
			$mail->Debugoutput = 'html';
			//Set the hostname of the mail server
			$mail->Host = "smtp.ipage.com";
			//Set the SMTP port number - likely to be 25, 465 or 587
			$mail->Port = 587;
			//Whether to use SMTP authentication
			$mail->SMTPAuth = true;
			//Username to use for SMTP authentication
			$mail->Username = "info@mybroker.lk";
			//Password to use for SMTP authentication
			$mail->Password = "Geo@1234";
			//Set who the message is to be sent from
			$mail->setFrom('info@mybroker.lk', 'My Broker');
			//Set an alternative reply-to address
			$mail->addReplyTo('info@mybroker.lk', 'My Broker');
			//Set who the message is to be sent to
			$mail->addAddress($_POST['email'], $row['name']);
			//Set the subject line
			$mail->Subject = $subject;
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			$mail->msgHTML($contents);
			//Replace the plain text body with one created manually
			$mail->AltBody = 'This is a plain-text message body';
			//Attach an image file
			$mail->addAttachment('../email/logo.png');

			//send the message, check for errors
			if (!$mail->send()) {
				echo "An error occured while trying to send an email with password reset link";
			} else {
				echo "<strong><font color='green'>An email has been sent to {$_POST['email']} with password reset link. Please reset your password within $linkvalidtimeinhours hours</font></strong>";
				
			}			
		}		
	}

	

	//$row = mysqli_fetch_assoc($result);
	//echo $row[''];
	
}



?>