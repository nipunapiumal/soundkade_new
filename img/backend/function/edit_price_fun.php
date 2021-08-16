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
		//$cat=$_POST['cat'];
		$cat=htmlspecialchars(trim($_POST['cat']), ENT_QUOTES, 'UTF-8');
		//$price=$_POST['price'];
		$price=htmlspecialchars(trim($_POST['price']), ENT_QUOTES, 'UTF-8');
		//$commission=$_POST['commission'];
		$commission=htmlspecialchars(trim($_POST['commission']), ENT_QUOTES, 'UTF-8');

		 

			$sql=mysqli_query($conn,"UPDATE price SET cat_id='$cat',price='$price',commission='$commission' WHERE id='$id'");

			echo "<script>alert('Successfully Updated!')</script>";
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