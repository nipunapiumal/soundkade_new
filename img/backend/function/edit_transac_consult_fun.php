<?php

include "../db/db.php";
if (!isset($_SESSION)) {
    session_start();
    //$level = $_SESSION['val'];
    $level = htmlspecialchars(trim($_SESSION['val']), ENT_QUOTES, 'UTF-8');

    if ($level == 1) {
	//$id = $_GET['id'];
	$id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');
	//$transac_type = $_POST['transac_type'];
	$transac_type = htmlspecialchars(trim($_POST['transac_type']), ENT_QUOTES, 'UTF-8');
	//$consult_name = $_POST['consult_name'];
	$consult_name = htmlspecialchars(trim($_POST['consult_name']), ENT_QUOTES, 'UTF-8');

	$sql = mysqli_query($conn, "UPDATE transac_consult SET transac_id = '$transac_type' , consult_id = '$consult_name' WHERE id = $id");

	echo "<script>alert('Successfully Updated!')</script>";
	$redirectUrl = "../create_consul_transac.php";
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