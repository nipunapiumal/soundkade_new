<?php

include "../db/db.php";
if (!isset($_SESSION)) {
    session_start();
    //$level = $_SESSION['val'];
    $level = htmlspecialchars(trim($_SESSION['val']), ENT_QUOTES, 'UTF-8');

    if ($level == 1) {
	//$id = $_GET['id'];
	$id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');
	//$name = $_POST['transac'];
	$name = htmlspecialchars(trim($_POST['transac']), ENT_QUOTES, 'UTF-8');

	$query = mysqli_query($conn, "SELECT * FROM transaction_type WHERE name='$name'");

	if (mysqli_num_rows($query) != 0) {
	    echo $name;
	    echo "<script>alert('Category Name Already Exist!')</script>";
	    $redirectUrl = "../create_transaction_type.php";
	    echo "<script type=\"text/javascript\">";
	    //echo "window.location.href = '$redirectUrl'";
	    echo "</script>";
	} else {

	    $sql = mysqli_query($conn, "UPDATE transaction_type SET name='$name' WHERE id='$id'");

	    echo "<script>alert('Successfully Updated!')</script>";
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
