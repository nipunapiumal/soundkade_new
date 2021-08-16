<?php
date_default_timezone_set('Asia/Colombo');
include '../db/db.php';
$date = date('Y-m-d');

if (array_key_exists('accept_ad', $_POST)) {//delete button of data table
    //$ebro = $_POST['ebro_id'];
    $add_id_1 = htmlspecialchars(trim($_POST['ad_id']), ENT_QUOTES, 'UTF-8');


 
    $sql = "UPDATE `form_prev_data` SET `flag` =1 WHERE id='$add_id_1';";


    //echo $sql;

    $data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
		echo json_encode(array(array("msgType" => 1, "msg" => "Successfully Add informations"))); //if sql result true pass magType1
		
		//UDARA'S CODE FOR SENDING EMAIL
		$query = "SELECT 

		form_prev_data.data,
		form_prev_data.date AS date,
		customer_reg.name AS name,
		customer_reg.email AS email,
		customer_reg.id

		FROM form_prev_data 

		Inner Join customer_reg ON form_prev_data.user = customer_reg.id

		WHERE form_prev_data.id='$add_id_1'";
		
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		
			$subject = "Your AD at mybroker.lk is Approved";
			$contents = "
			<p>Dear {$row['name']},</p>
			<p>Congratz!!!!. Your AD in My Broker website, which has been added on {$row['date']} is approved now.
			</p>
			 -- \n 
			My Broker Pvt Ltd.<br>
			No 1112,<br>
			Pannipitiya Road,<br>
			Sri Lanka.
			";
			file_put_contents("temp.txt", $contents);
			//START SENDING AN EMAIL
			
			require '../../email/PHPMailerAutoload.php';

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
			$mail->addAddress($row['email'], $row['name']);
			//Set the subject line
			$mail->Subject = $subject;
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			$mail->msgHTML($contents);
			//Replace the plain text body with one created manually
			$mail->AltBody = 'This is a plain-text message body';
			//Attach an image file
			$mail->addAttachment('../../email/logo.png');

			//send the message, check for errors
			if (!$mail->send()) {
				
				//file_put_contents("temp.txt", "An error occured while trying to send an email with password reset link \n", FILE_APPEND);
			} else {
				
				//file_put_contents("temp.txt", "<strong><font color='green'>An email has been sent to {$row['email']} </font></strong> \n", FILE_APPEND);
				
			}		
		//END UDARA'S CODE
		
		
		
		
    } else {
		echo json_encode(array(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data"))); //if sql result true pass magType2
    }/* inside two functions there fore use two (array(array    )) arrays like this */
}

if (array_key_exists('reject_ad', $_POST)) {//delete button of data table
    $add_id = htmlspecialchars(trim($_POST['ad_id']), ENT_QUOTES, 'UTF-8');
    
    
    
    $sql = "UPDATE `form_prev_data` SET `flag` =4 WHERE id='$add_id';";

    //echo $sql;

    $data = mysqli_query($conn, $sql); //check the result of query

    $sql6 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `form_prev_data`  WHERE id='$add_id'"));

    //$sql="SELECT * FROM `form_prev_data`  WHERE id='{$_POST['ad_id']}'";
    //echo $sql;

    $price = $sql6['cat'];
    $user = $sql6['user'];
    //$comm = $sql6['commission'];
    $sql7 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `price`  WHERE cat_id='$price'"));
    $cat_price = $sql7['price'];

    $sql8 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `customer_reg`  WHERE id='$user'"));
    $email = $sql8['email'];
    //echo "SELECT * FROM `customer_reg`  WHERE id='$user'";
    //$sql9 = mysqli_fetch_assoc(mysqli_query($conn, "INSERT INTO customer_account SET cus_code='$email', date='$date', de='0', cr='$cat_price', ebro_id='0', increment_id='0'"));
    $sql_1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM increment_id"));
    $increment_id = $sql_1['auto_id'];


    $sql9 = "INSERT INTO  `customer_account` ( 

  `id`,
  `cus_code`,
  `date`,
  `de`,
  `cr`,
  `ebro_id`,
  `increment_id`,
  `description`
  
  )
  VALUES (
   NULL,'$email','$date','$cat_price','0','0','$increment_id','Funds Debit due to add reject '
  );";

    $sql_2 = "UPDATE `increment_id` SET auto_id='$increment_id'+1 ";
    //echo $sql3;
    $data3 = mysqli_query($conn, $sql_2);


//echo $sql; 
    $data1 = mysqli_query($conn, $sql9); //check the result of query


    if ($data1) {
	echo json_encode(array(array("msgType" => 1, "msg" => "Successfully Add informations"))); //if sql result true pass magType1
    } else {
	echo json_encode(array(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data"))); //if sql result true pass magType2
    }/* inside two functions there fore use two (array(array    )) arrays like this */
	
	
	//UDARA'S CODE FOR SENDING EMAIL
	$query = "SELECT 

	form_prev_data.data,
	form_prev_data.date AS date,
	customer_reg.name AS name,
	customer_reg.email AS email,
	customer_reg.id

	FROM form_prev_data 

	Inner Join customer_reg ON form_prev_data.user = customer_reg.id

	WHERE form_prev_data.id='$add_id'";
	
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	
		$subject = "Your AD at mybroker.lk is Rejected";
		$contents = "
		<p>Dear {$row['name']},</p>
		<p>Sorry!!!!. Your AD in My Broker website, which has been added on {$row['date']} is rejected because it doesn't comply with our policies.
		</p>
		 -- \n 
		My Broker Pvt Ltd.<br>
		No 1112,<br>
		Pannipitiya Road,<br>
		Sri Lanka.
		";
		file_put_contents("temp.txt", $contents);
		//START SENDING AN EMAIL
		
		require '../../email/PHPMailerAutoload.php';

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
		$mail->addAddress($row['email'], $row['name']);
		//Set the subject line
		$mail->Subject = $subject;
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML($contents);
		//Replace the plain text body with one created manually
		$mail->AltBody = 'This is a plain-text message body';
		//Attach an image file
		$mail->addAttachment('../../email/logo.png');

		//send the message, check for errors
		if (!$mail->send()) {
			
			file_put_contents("temp.txt", "An error occured while trying to send an email with password reset link \n", FILE_APPEND);
		} else {
			
			file_put_contents("temp.txt", "<strong><font color='green'>An email has been sent to {$row['email']} </font></strong> \n", FILE_APPEND);
			
		}		
	//END UDARA'S CODE	
	
	
}

if (array_key_exists('remove_ad', $_POST)) {//delete button of data table
    $add_id = htmlspecialchars(trim($_POST['ad_id']), ENT_QUOTES, 'UTF-8');
    $sql = "UPDATE `form_prev_data` SET `flag`=5 WHERE id='$add_id';";

    $data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
	echo json_encode(array(array("msgType" => 1, "msg" => "Successfully Add informations"))); //if sql result true pass magType1
    } else {
	echo json_encode(array(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data"))); //if sql result true pass magType2
    }/* inside two functions there fore use two (array(array    )) arrays like this */
}
?>