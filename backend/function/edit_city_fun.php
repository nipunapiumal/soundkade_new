<?php
include "../db/db.php";
if (!isset($_SESSION)) 
{
	session_start();
	//$level = $_SESSION['val'];
	$level = htmlspecialchars(trim($_SESSION['val']), ENT_QUOTES, 'UTF-8');

	if ($level == 1) {
		//$id=$_GET['id'];
		$id=htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');
		//$district=$_POST['dist'];
		$district=htmlspecialchars(trim($_POST['dist']), ENT_QUOTES, 'UTF-8');
		//$city=$_POST['city'];
		$city=htmlspecialchars(trim($_POST['city']), ENT_QUOTES, 'UTF-8');

		$query = mysqli_query($conn,"SELECT city FROM city WHERE city='$city' and cid!='$id'");

		if (mysqli_num_rows($query)!= 0) {
			echo "<script>alert('City Name Already Exist!')</script>";
			$redirectUrl = "../edit_city_table.php";
			echo "<script type=\"text/javascript\">";
			echo "window.location.href = '$redirectUrl'";
			echo "</script>";  	 

		}  else {

			$sql=mysqli_query($conn,"UPDATE city SET did='$district',city='$city' WHERE cid='$id'");

			echo "<script>alert('Successfully Updated!')</script>";
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