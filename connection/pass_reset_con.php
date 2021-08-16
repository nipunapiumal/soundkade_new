<?php

include("../db/db.php");  //set up sql connection 

if (array_key_exists('currentpassword', $_POST)) {
	//echo sha1($_POST['currentpassword']);
	
	$sql = "SELECT * FROM customer_reg WHERE id='{$_POST['id']}' AND password='".hash('sha256', $_POST['currentpassword'])."' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result)<1){//this means current password is incorrect
		//echo "Current password you entered is wrong";
		echo "0";
	}
	else{
		echo "1";
	}

	

	//$row = mysqli_fetch_assoc($result);
	//echo $row[''];
	
}

if (array_key_exists('newpassword', $_POST)) {
	
	$sql = "UPDATE customer_reg SET 
	pw='{$_POST['newpassword']}',
	password='".hash('sha256', $_POST['newpassword'])."'
	WHERE id ='{$_POST['id']}' LIMIT 1";

	if (mysqli_query($conn, $sql)){
		echo "1";
		//echo "{$_POST['id']}";
		//delete all forgot_password records belongs to this user
		$deletequery = "DELETE FROM forgot_password WHERE cus_id='{$_POST['id']}'";
		mysqli_query($conn, $deletequery);
	}
	else{
		echo "0";
	}

}

?>