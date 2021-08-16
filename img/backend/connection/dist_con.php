<?php

include("../db/db.php");  //set up sql connection 

if (array_key_exists('save_dist', $_POST)) {//check that the relevent code of controller
//save in database
    $sql = "INSERT INTO  `district` ( 
  `did`,
  `pid`,
  `district`  
  )
  VALUES (
   NULL,'" . htmlspecialchars(trim($_POST['province']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['district']), ENT_QUOTES, 'UTF-8') . "'
  );";

//echo $sql; 
    $data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
	echo json_encode(array("msgType" => 1, "msg" => "Successfully Add informations")); //if sql result true pass magType1
    } else {
	echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data")); //if sql result true pass magType2
    }
}

if (array_key_exists('get_province', $_POST)) {
    $sql = "SELECT
province.pid,
province.province
FROM
province 
";

    $result = mysqli_query($conn, $sql);
    echo'<option>Select Province...</option>';
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }

    if (!empty($data)) {
	foreach ($data AS $data) {
	    //echo'<option>Select Yout Province</option>';
	    echo'<option value="' . $data['pid'] . '">' . $data['province'] . '</option>';
	}
    } else {
	echo'<option>No data found</option>';
    }
    echo json_encode($data);
}

if (array_key_exists("district_exist", $_POST)) {
    $district=htmlspecialchars(trim($_POST['dist']), ENT_QUOTES, 'UTF-8');
    $sql = "SELECT
count(district) as dist_count
FROM
district  WHERE district.`district`='$district'";
//echo $sql;
   $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }
    echo json_encode($data);
}
?>