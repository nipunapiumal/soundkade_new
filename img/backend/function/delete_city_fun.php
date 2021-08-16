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

	$sql3 = mysqli_query($conn, "SELECT * FROM erbo_register WHERE city='$id'");
	//$row3 = mysqli_fetch_array($sql3);
	//$city3 = $row3[0];
	$num_rows3 = mysqli_num_rows($sql3);

	$sql1 = mysqli_query($conn, "SELECT * FROM rbo_register WHERE city='$id'");
	//$row1 = mysqli_fetch_array($sql1);
	//$city1 = $row1[0];
	$num_rows1 = mysqli_num_rows($sql1);

	$sql4 = mysqli_query($conn, "SELECT * FROM bro_register WHERE city='$id'");
	//$row4 = mysqli_fetch_array($sql4);
	//$city4 = $row4[0];3
	$num_rows4 = mysqli_num_rows($sql4);

	if ($num_rows1 > 0 || $num_rows3 > 0 || $num_rows4 > 0) {

	     echo "<script>alert('Details already exists!')</script>";
	    $redirectUrl = "../edit_city_table.php";
	    echo "<script type=\"text/javascript\">";
	    echo "window.location.href = '$redirectUrl'";
	    echo "</script>";
	} else {

	    $sql2 = mysqli_query($conn, "DELETE FROM city WHERE cid='$id'");


	    echo "<script>alert('Deleted Successfully!')</script>";
	    $redirectUrl = "../edit_city_table.php";
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








