<?php

include("../db/db.php");  //set up sql connection 

if (array_key_exists('currentpassword', $_POST)) {
	//echo sha1($_POST['currentpassword']);
	
	$sql = "SELECT * FROM user WHERE user='{$_POST['user']}' AND password='".sha1($_POST['currentpassword'])."' LIMIT 1";
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
//echo $_POST['newpassword'];
$sql = "REPLACE INTO user (id, pass, password) VALUES (
'{$_POST['id']}', 
'{$_POST['newpassword']}', 
'".sha1($_POST['newpassword'])."'";

$sql = "UPDATE user SET 
pass='{$_POST['newpassword']}',
password='".sha1($_POST['newpassword'])."'
WHERE id = '{$_POST['id']}' LIMIT 1";

if (mysqli_query($conn, $sql)){
	echo "1";
}
else{
	echo "0";
}


/*
$sql = "INSERT INTO  `city` ( 
  `cid`,
  `did`,
  `city`
  )
  VALUES (
   NULL,'" . $_POST['district'] . "','" . $_POST['city'] . "'
  );";
    
//echo $sql; 
    $data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
	echo json_encode(array("msgType" => 1, "msg" => "Successfully Add informations")); //if sql result true pass magType1
    } else {
	echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data")); //if sql result true pass magType2
    }
	*/
}



exit();

if (array_key_exists('save_city', $_POST)) {//check that the relevent code of controller
//save in database
$sql = "INSERT INTO  `city` ( 
  `cid`,
  `did`,
  `city`
  )
  VALUES (
   NULL,'" . $_POST['district'] . "','" . $_POST['city'] . "'
  );";
    
//echo $sql; 
    $data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
	echo json_encode(array("msgType" => 1, "msg" => "Successfully Add informations")); //if sql result true pass magType1
    } else {
	echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data")); //if sql result true pass magType2
    }
}

if (array_key_exists('get_district', $_POST)) {
   $sql = "SELECT
district.did,
district.district
FROM
district 
";
//echo $sql;
    $result = mysqli_query($conn, $sql);
    echo'<option>Select District...</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    if (!empty($data)) {
        foreach ($data AS $data) {
            echo'<option value="' . $data['did'] . '">' . $data['district'] . '</option>';
        }
    } else {
        echo'<option>No data found</option>';
    }
    echo json_encode($data);
}


if (array_key_exists("city_exist", $_POST)) {
    $sql = "SELECT
count(city) as city_count
FROM
city  WHERE city.`city`='{$_POST['city']}'";
//echo $sql;
   $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }
    echo json_encode($data);
}
?>