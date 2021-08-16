<?php

include("../db/db.php");  //set up sql connection 

if (array_key_exists('save_com', $_POST)) {//check that the relevent code of controller

//save in database
    $sql = "INSERT INTO  `commission` ( 
  `id`,
  `type`,
  `commission`  
  )
  VALUES (
   NULL,'" . htmlspecialchars(trim($_POST['commission']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['com_fee']), ENT_QUOTES, 'UTF-8') . "'
  );";

//echo $sql; 
    $data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
	echo json_encode(array("msgType" => 1, "msg" => "Successfully Add informations")); //if sql result true pass magType1
    } else {
	echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data")); //if sql result true pass magType2
    }
}


if (array_key_exists("type_exist", $_POST)) {
    
   $type=htmlspecialchars(trim($_POST['type']), ENT_QUOTES, 'UTF-8');
   
    $sql = "SELECT
count(type) as com_type
FROM
commission  WHERE commission.`type`='$type'";
//echo $sql;
   $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }
    echo json_encode($data);
}

?>