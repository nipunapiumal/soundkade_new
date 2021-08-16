<?php

include "../db/db.php";
if (!isset($_SESSION)) {
    session_start();
    //$level = $_SESSION['val'];
    $level = htmlspecialchars(trim($_SESSION['val']), ENT_QUOTES, 'UTF-8');

    if ($level == 1) {
	//$id = $_GET['id'];
	$id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');
	//$category=$_POST['e_category'];
	//$e_t_type=$_POST['e_t_type'];
	//$e_t_fee = $_POST['e_t_fee'];
	$e_t_fee = htmlspecialchars(trim($_POST['e_t_fee']), ENT_QUOTES, 'UTF-8');
	//$commission = $_POST['commission'];
	$commission =htmlspecialchars(trim($_POST['commission']), ENT_QUOTES, 'UTF-8');
	//$job_cost = $_POST['job_cost'];
	$job_cost = htmlspecialchars(trim($_POST['job_cost']), ENT_QUOTES, 'UTF-8');

	//$query = mysqli_query($conn,"SELECT * FROM transaction WHERE cat_id = $category and transac_type_id=$e_t_type");



	$sql = mysqli_query($conn, "UPDATE transaction SET  transac_fee = '$e_t_fee', commission = '$commission', job_cost = '$job_cost' WHERE id = $id");

	//echo "UPDATE transaction SET cat_id = $category , transac_type_id = $e_t_type , transac_fee = $e_t_fee WHERE id = $id";

	echo "<script>alert('Successfully Updated!')</script>";
	$redirectUrl = "../create_transaction.php";
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