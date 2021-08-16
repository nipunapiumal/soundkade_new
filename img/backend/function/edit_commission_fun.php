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
		//$province=$_POST['prov'];
		//$province=htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');
		//$district=$_POST['dis'];
		$commission=htmlspecialchars(trim($_POST['com_fee']), ENT_QUOTES, 'UTF-8');

		
		

			$sql=mysqli_query($conn,"UPDATE commission SET commission='$commission' WHERE id='$id'");

			echo "<script>alert('Successfully Updated!')</script>";
			$redirectUrl = "../commission.php";
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