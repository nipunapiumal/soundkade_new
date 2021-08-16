<?php

session_start();
header('Content-type: application/json');
include_once 'db/db.php';
$response = array();

if ($_POST) {

   // $user = trim($_POST['user']);
    //$pass = trim($_POST['password']);
   $uname= htmlspecialchars(trim($_POST['user']), ENT_QUOTES, 'UTF-8');
   $upass= htmlspecialchars(trim($_POST['password']), ENT_QUOTES, 'UTF-8');
   // $uname = strip_tags($user);
    //$upass = strip_tags($pass);
   $password =  sha1($upass);
    $sql = mysqli_query($conn, "SELECT * FROM user WHERE user='$uname'");
    $row = mysqli_fetch_assoc($sql);

    if (mysqli_num_rows($sql) == 1) {

	if ($row['password'] == $password) {

	    $response['status'] = 'ok'; // log in
	    $_SESSION['user'] = $row['user'];
	    $_SESSION['val'] = $row['val'];
	    $_SESSION['id'] = $row['id'];
	   // $_SESSION['name'] = $row['name'];
	    //$_SESSION['val'] = $user_level;
	} else {
	    $response['status'] = 'error';
	    // wrong details
	    $response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Incorrect Username or Password.';
	}
    } else {
	$response['status'] = 'error';
	// wrong details
	$response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Incorrect Username or Password.';
    }
}

echo json_encode($response);
?>