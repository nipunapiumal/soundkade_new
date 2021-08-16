<?php

include "../db/db.php";
if (!isset($_SESSION)) {
    session_start();
    //$level = $_SESSION['val'];
    $level = htmlspecialchars(trim($_SESSION['val']), ENT_QUOTES, 'UTF-8');

    if ($level == 1) {
	//$id = $_GET['id'];
	$id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');
//echo $id;






	$sql2 = mysqli_query($conn, "DELETE FROM price WHERE id='$id'");


	echo "<script>alert('Deleted Successfully!')</script>";
	$redirectUrl = "../add_pricing.php";
	echo "<script type=\"text/javascript\">";
	echo "window.location.href = '$redirectUrl'";
	echo "</script>";
    } else {
	$redirectUrl = "../index.php";
	echo "<script type=\"text/javascript\">";
	echo "window.location.href = '$redirectUrl'";
	echo "</script>";
    }
}
?> 	








