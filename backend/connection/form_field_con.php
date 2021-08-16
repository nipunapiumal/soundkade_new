<?php

include("../db/db.php");  //set up sql connection 

if (array_key_exists('save_data', $_POST)) {//check that the relevent code of controller
//save in database
    $sql = "INSERT INTO  `form_fields` ( 
  `id`,
  `name`,
  `type`  
  )
  VALUES (
  
   NULL,'" . htmlspecialchars(trim($_POST['field_name']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['field_type']), ENT_QUOTES, 'UTF-8') . "'
  );";

//echo $sql; 
    $data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
	echo json_encode(array("msgType" => 1, "msg" => "Successfully Add informations")); //if sql result true pass magType1
    } else {
	echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data")); //if sql result true pass magType2
    }
}

if (array_key_exists("field_exist", $_POST)) {
    
    $field_name=htmlspecialchars(trim($_POST['field']), ENT_QUOTES, 'UTF-8');
    
    $sql = "SELECT
count(name) as field_name
FROM
form_fields WHERE form_fields.`name`='$field_name'";
//echo $sql;
   $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }
    echo json_encode($data);
}






?>