<?php
session_start();
include '../db/db.php';
//$log=$_SESSION['user'];
$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');

if (empty($log)) {
     
	$redirectUrl = "../index.php";
	echo "<script type=\"text/javascript\">";
	echo "window.location.href = '$redirectUrl'";
	echo "</script>";
	 
}else{

	$sqlu="SELECT * FROM user WHERE user='$log' and val='3'";
	$resultu=mysqli_query($conn,$sqlu);
	$countu=mysqli_num_rows($resultu);
	if($countu==1){
	 
		//if($_POST['submit']){
			
		 // $id = $_GET['id'];
		  $id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');
		  //$name = $_POST['name'];
		  $name =htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
		  //$address = $_POST['address'];
		  $address = htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8');
		  //$nic = $_POST['nic'];
		  $nic = htmlspecialchars(trim($_POST['nic']), ENT_QUOTES, 'UTF-8');
		  //$dob = $_POST['dob'];
		  $dob = htmlspecialchars(trim($_POST['dob']), ENT_QUOTES, 'UTF-8');
		  //$gender =  $_POST['gender'];
		  $gender =  htmlspecialchars(trim($_POST['gender']), ENT_QUOTES, 'UTF-8');
		  //$email = $_POST['email'];
		  $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
		  //$mobile = $_POST['mobile'];
		  $mobile = htmlspecialchars(trim($_POST['mobile']), ENT_QUOTES, 'UTF-8');
		 // $tel = $_POST['tel'];
		  $tel = htmlspecialchars(trim($_POST['tel']), ENT_QUOTES, 'UTF-8');
		  //$bname = $_POST['bname'];
		  $bname = htmlspecialchars(trim($_POST['bname']), ENT_QUOTES, 'UTF-8');
		 // $bcode = $_POST['bcode'];
		  $bcode = htmlspecialchars(trim($_POST['bcode']), ENT_QUOTES, 'UTF-8');
		  //$br_name = $_POST['br_name'];
		  $br_name = htmlspecialchars(trim($_POST['br_name']), ENT_QUOTES, 'UTF-8');
		  //$br_code = $_POST['br_code'];
		  $br_code = htmlspecialchars(trim($_POST['br_code']), ENT_QUOTES, 'UTF-8');
		  //$acc_no = $_POST['acc_no'];
		  $acc_no = htmlspecialchars(trim($_POST['acc_no']), ENT_QUOTES, 'UTF-8');
		  
		  //$prov = $_POST['province'];
		  $prov = htmlspecialchars(trim($_POST['province']), ENT_QUOTES, 'UTF-8');
		  //$dis = $_POST['district'];
		  $dis = htmlspecialchars(trim($_POST['district']), ENT_QUOTES, 'UTF-8');
		  //$city = $_POST['city'];
		  $city = htmlspecialchars(trim($_POST['city']), ENT_QUOTES, 'UTF-8');
		  
		  //$reg_mob = $_POST['reg_mob'];
		  $reg_mob = htmlspecialchars(trim($_POST['reg_mob']), ENT_QUOTES, 'UTF-8');
		
		  $qv = mysqli_query($conn, "UPDATE bro_register SET name='$name', address='$address', nic='$nic', dob='$dob', gender='$gender', mobile='$mobile', home='$tel', email='$email', b_name='$bname', b_code='$bcode', b_home='$br_name', br_code='$br_code', acc_no='$acc_no', province='$prov', district='$dis', city='$city', reg_mob='$reg_mob' WHERE bro_id='$id'");

		  $redirectUrl = "../search_broker.php";
		  echo "<script type=\"text/javascript\">";
		  echo "window.location.href = '$redirectUrl'";
		  echo "</script>";
 
		//}	
		
	
		
	} else{
		$redirectUrl = "../index.php";
		echo "<script type=\"text/javascript\">";
		echo "window.location.href = '$redirectUrl'";
		echo "</script>";
	
	}
}
?>