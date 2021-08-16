<?php

include("../db/db.php");  //set up sql connection 

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