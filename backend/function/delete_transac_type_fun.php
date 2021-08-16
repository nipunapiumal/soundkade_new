<?php

include "../db/db.php";
if (!isset($_SESSION)) {
    session_start();
    //$level = $_SESSION['val'];
    $level = htmlspecialchars(trim($_SESSION['val']), ENT_QUOTES, 'UTF-8');

    if ($level == 1) {
	//$id = $_GET['id'];
	$id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');

	$result = mysqli_query($conn, "SELECT * FROM transaction_type WHERE id='$id'");
	$num_rows = mysqli_num_rows($result);

	if ($num_rows == 0) {
	    echo $id;
	    echo "<script>alert('Details already exists!')</script>";
	    $redirectUrl = "../create_transaction_type.php";
	    echo "<script type=\"text/javascript\">";
	    //echo "window.location.href = '$redirectUrl'";
	    echo "</script>";
	} else {
	    $sql2 = mysqli_query($conn, "DELETE FROM transaction_type WHERE id='$id'");

	    echo "<script>alert('Deleted Successfully!')</script>";
	    $redirectUrl = "../create_transaction_type.php";
	    echo "<script type=\"text/javascript\">";
	    echo "window.location.href = '$redirectUrl'";
	    echo "</script>";
	}
    } else {
	$redirectUrl = "../index.php";
	echo "<script type=\"text/javascript\">";
	echo "window.location.href = '$redirectUrl'";
	echo "</script>";
    }
}
?>