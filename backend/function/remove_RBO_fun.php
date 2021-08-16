<?php

session_start();
include '../db/db.php';
//$log = $_SESSION['user'];
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

	//$id = $_GET['id'];
	$id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');
	$qv = mysqli_query($conn, "DELETE FROM rbo_register WHERE rbo_id='$id'");

	$redirectUrl = "../search_RBO.php";
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