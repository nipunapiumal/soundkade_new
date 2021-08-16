<?php

include '../db/db.php';
session_start();
//$log = $_SESSION['user'];
$log = htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');
if (empty($log)) {

    $redirectUrl = "../index.php";
    echo "<script type=\"text/javascript\">";
    echo "window.location.href = '$redirectUrl'";
    echo "</script>";
} else {

    $sqlu = "SELECT * FROM user WHERE user='$log' and val='4'";
    $resultu = mysqli_query($conn, $sqlu);
    $countu = mysqli_num_rows($resultu);
    if ($countu == 1) {


	$sqluser = "SELECT * FROM user where user='$log'";
	$resultuser = mysqli_query($conn, $sqluser);
	while ($rowuser = mysqli_fetch_array($resultuser)) {
	    //$user_id = $rowuser['id'];
	}


	//$id = $_POST['title'];
	$id = htmlspecialchars(trim($_POST['trans_id']), ENT_QUOTES, 'UTF-8');

	//echo $id;


	$file_name = $_FILES["file"]["name"];



	if (empty($file_name)) {
	    echo "<script>alert('Enter the required fields')</script>";
	    $redirectUrl = "../consult_trans.php";
	    echo "<script type=\"text/javascript\">";
	    echo "window.location.href = '$redirectUrl'";
	    echo "</script>";
	} else {

	    $allowedExts = array("gif", "pdf", "GIF", "jpeg", "JPEG", "jpg", "JPG", "png", "PNG", "doc", "docx", "PNG", "zip");
	    $extension = end(explode(".", $_FILES["file"]["name"]));
	    if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "application/pdf") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/x-png") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "application/msword") || ($_FILES["file"]["type"] == "application/zip") || ($_FILES["file"]["type"] == "application/x-zip-compressed") || ($_FILES["file"]["type"] == "multipart/x-zip") || ($_FILES["file"]["type"] == "application/x-compressed") || ($_FILES["file"]["type"] == "application/octet-stream") || ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")) && ($_FILES["file"]["size"] < 90000000000) // increased allowed size may be your problem
		    && in_array($extension, $allowedExts)) {
		if ($_FILES["file"]["error"] > 0) {
		    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		} else {
		    //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		    //echo "Type: " . $_FILES["file"]["type"] . "<br>";
		    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

		    if (file_exists("../upload/pdf/" . $_FILES["file"]["name"])) {
			//echo $_FILES["file"]["name"] . " already exists. ";
			echo "<script>alert('Image already Exist!')</script>";
			$redirectUrl = "../consult_trans.php";
			echo "<script type=\"text/javascript\">";
			echo "window.location.href = '$redirectUrl'";
			echo "</script>";
		    } else {
			move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/pdf/" . $_FILES["file"]["name"]);
			//echo "Stored in: " . "../upload/pdf/" . $_FILES["file"]["name"];
		    }
		}
	    } else {
		echo "Invalid file";
	    }


	    $sql = mysqli_query($conn, "INSERT INTO consult_upload SET upload_name='$file_name',cus_trans_id='$id'");

	    echo "<script>alert('Insert Successfully!')</script>";
	    $redirectUrl = "../consult_trans.php";
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









