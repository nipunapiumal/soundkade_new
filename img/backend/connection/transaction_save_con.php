<?php
include("../db/db.php");  //set up sql connection 

if (array_key_exists('save_transac', $_POST)) {//check that the relevent code of controller
//save in database

$sql = "INSERT INTO  transaction VALUES ( NULL," . htmlspecialchars(trim($_POST['category']), ENT_QUOTES, 'UTF-8') . "," . htmlspecialchars(trim($_POST['transac']), ENT_QUOTES, 'UTF-8') . "," . htmlspecialchars(trim($_POST['transac_fee']), ENT_QUOTES, 'UTF-8') . "," .htmlspecialchars(trim($_POST['job_cost']), ENT_QUOTES, 'UTF-8') . ")";
    
    //echo $sql; 
    $data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
	echo json_encode(array("msgType" => 1, "msg" => "Successfully Add informations")); //if sql result true pass magType1
    } else {
	echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data")); //if sql result true pass magType2
    }
}


?>