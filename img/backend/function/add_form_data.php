<?php

session_start();
include '../db/db.php';
//$log=$_SESSION['user'];
$log = htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');

if (empty($log)) {

    $redirectUrl = "../index.php";
    echo "<script type=\"text/javascript\">";
    echo "window.location.href = '$redirectUrl'";
    echo "</script>";
} else {

    $sqlu = "SELECT * FROM user WHERE user='$log' and val='1'";
    $resultu = mysqli_query($conn, $sqlu);
    $countu = mysqli_num_rows($resultu);
    if ($countu == 1) {

	//if($_POST['submit']){

	//$data = $_POST['data'];
	$data = htmlspecialchars(trim($_POST['data']), ENT_QUOTES, 'UTF-8');
	//$f_id = $_POST['f_id'];
	$f_id = htmlspecialchars(trim($_POST['f_id']), ENT_QUOTES, 'UTF-8');
	//$scat = $_POST['scat'];
	$scat = htmlspecialchars(trim($_POST['scat']), ENT_QUOTES, 'UTF-8');

	$qv = mysqli_query($conn, "INSERT INTO form_data SET field_id='$f_id', data='$data'");

	$redirectUrl = "../associate_form_data.php?id=$scat";
	echo "<script type=\"text/javascript\">";
	echo "window.location.href = '$redirectUrl'";
	echo "</script>";

	//}	
    } else {
	$redirectUrl = "../index.php";
	echo "<script type=\"text/javascript\">";
	echo "window.location.href = '$redirectUrl'";
	echo "</script>";
    }
}
?>