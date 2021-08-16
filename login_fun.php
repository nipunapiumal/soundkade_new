<?php

session_start();
header('Content-type: application/json');
include_once 'db/db.php';
$response = array();

if ($_POST) {

    //$email = trim($_POST['login_name']);
    //$email = strip_tags($email);
    //$email = htmlspecialchars($email);
    $email = htmlspecialchars(trim($_POST['login_name']), ENT_QUOTES, 'UTF-8');
    
    //$pass = trim($_POST['login_pw']);
    //$pass = strip_tags($pass);
    //$pass = htmlspecialchars($pass);
    $pass = htmlspecialchars(trim($_POST['login_pw']), ENT_QUOTES, 'UTF-8');

    $password = hash('sha256', $pass); // password hashing using SHA256

    $sql = mysqli_query($conn, "SELECT * FROM customer_reg WHERE email='$email' LIMIT 1");
    $row = mysqli_fetch_assoc($sql);
    $count = mysqli_num_rows($sql);

    if($row['activated']== 0){
        $response['status'] = 'error';
        // wrong details
        $response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> Your account has not activated yet. Please check the activation email that we sent you earlier. if you haven\'t received our email, please <a href="resend_email.php?email='.$email.'">Click here to resend that emali</a>
';
    }
    else if($row['activated']== 2){
        $response['status'] = 'error';
        // wrong details
        $response['message'] = '<span class="glyphicon glyphicon-info-sign"></span>Sorry!!!. You are banned from using our website';
    }
    else if ($count == 1 && $row['password'] == $password) {

        $response['status'] = 'ok'; // log in
        $_SESSION['email'] = $row['email'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['val'] = $row['val'];
        $_SESSION['name'] = $row['name'];
    } else {
        $response['status'] = 'error';
        // wrong details
        $response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Incorrect Username or Password.';
    }
}

echo json_encode($response);
?>