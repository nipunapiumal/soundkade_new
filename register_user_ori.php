<?php
//session_start();
header('Content-type: application/json');
include_once 'db/db.php';
$response = array();

if ($_POST) {


	$name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');

	$pass = htmlspecialchars(trim($_POST['password']), ENT_QUOTES, 'UTF-8');
	// password encrypt using SHA256();
  	$password = hash('sha256', $pass);

	$email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');

    //UDARA, GENERATING RANDOM STRING FOR ACTIVATION TOKEN
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    $token=  generateRandomString(20);// this token is sent with email to account activation



	
    $sql = "INSERT INTO customer_reg SET name='$name', email='$email', password='$password', val=1, token='$token'";


	// check email exist or not
	$query = "SELECT email FROM customer_reg WHERE email='$email'";
	$result = mysqli_query($conn, $query);
	$count = mysqli_num_rows($result);
	
	if($count != 0){
	  $response['status'] = 'error';
	  $response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Provided Email is already in use.';
	
	} else {
	
	  if (mysqli_query($conn, $sql)) {




        //udara sending email

        require_once 'email/PHPMailerAutoload.php';
        $mail = new PHPMailer;

        $thisusersid = mysqli_insert_id($conn);
        //$activationlink = "http://localhost/mybroker/activate_user.php?id={$thisusersid}&activetoken={$token}";
        $activationlink = "http://mybroker.lk/activate_user.php?id={$thisusersid}&activetoken={$token}";
        $emailsubject = "You have been registered at myborker.lk";
        $contents = "<p>Dear {$name},</p>
			<p>You have been registered at myborker.lk. Before you can login, you must activate your account.Please <a href='$activationlink'>click on this  activation link</a> to activate your account.
			</p>
			<p>Please ignore this email, if you didn't make this request.</p>
			 -- \n
			My Broker Pvt Ltd.<br>
			No 1112,<br>
			Pannipitiya Road,<br>
			Sri Lanka.
			";
        $mail->SMTPDebug = 0;//0,1,2,3,4 .. 1,2 are useful for check errors
        $mail->addAddress($email, $name);
        //$mail->addAddress("udaraaka@gmail.com", "Udara Akalanka");
        $mail->Subject = $emailsubject;
        $mail->msgHTML($contents);
        $mail->addAttachment('email/logo.png');

        $mail->send();


		$response['status'] = 'ok'; // log in
		$response['message'] = '<span class="glyphicon glyphicon-info-sign"></span>Registered Sucessfully. Before you can login, you must activate your account with the activation link we sent to your email address';


		$sql_uid = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM customer_reg WHERE email = '$email'"));
		$s_email = $sql_uid['id'];



/*		$_SESSION['email'] = $email;
		$_SESSION['id'] = $s_email;
		$_SESSION['val'] = '1';
		$_SESSION['name'] = $name;*/
  
	  } else {
		  $response['status'] = 'error';
		  // wrong details
		  $response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Something went wrong, try again later...';
	  }
	
	}
   
}

echo json_encode($response);
?>