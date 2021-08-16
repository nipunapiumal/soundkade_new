<?php
include "../db/db.php";
if (!isset($_SESSION)) 
{
	session_start();
	//$level = $_SESSION['val'];
	$level = htmlspecialchars(trim($_SESSION['val']), ENT_QUOTES, 'UTF-8');

	if ($level == 1) {
		//$id=$_GET['id'];
		$id= htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');
		//$province=$_POST['prov'];
		$province=htmlspecialchars(trim($_POST['prov']), ENT_QUOTES, 'UTF-8');
		//$district=$_POST['dis'];
		$district=htmlspecialchars(trim($_POST['dis']), ENT_QUOTES, 'UTF-8');

		$query = mysqli_query($conn,"SELECT district FROM district WHERE district='$district' and did!='$id'");

		if (mysqli_num_rows($query)!= 0) {
			echo "<script>alert('District Name Already Exist!')</script>";
			$redirectUrl = "../districts.php";
			echo "<script type=\"text/javascript\">";
			echo "window.location.href = '$redirectUrl'";
			echo "</script>";  	 

		}  else {

			$sql=mysqli_query($conn,"UPDATE district SET pid='$province',district='$district' WHERE did='$id'");

			echo "<script>alert('Successfully Updated!')</script>";
			$redirectUrl = "../districts.php";
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