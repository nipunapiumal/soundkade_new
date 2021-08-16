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

		$sqlu="SELECT * FROM form_prev_data WHERE subcat='$id'";
		$resultu=mysqli_query($conn, $sqlu);
		$countu=mysqli_num_rows($resultu);

		if (!$countu > 0) {
			$sql2 = mysqli_query($conn, "DELETE FROM sub_category WHERE id='$id'");

			echo "<script>alert('Deleted Successfully!')</script>";
			$redirectUrl = "../create_sub_category.php";
			echo "<script type=\"text/javascript\">";
			echo "window.location.href = '$redirectUrl'";
			echo "</script>";
		}else{
			echo "<script>alert('Unable to delete this data!')</script>";
			$redirectUrl = "../create_sub_category.php";
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








