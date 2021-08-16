<?php
include '../db/db.php';
$date = date('Y-m-d');

if (array_key_exists('accept_ad', $_POST)) {//delete button of data table
	//$ebro = $_POST['ebro_id'];
	$trans_id = htmlspecialchars(trim($_POST['trans_id']), ENT_QUOTES, 'UTF-8');
    $sql = "UPDATE `cus_transaction` SET `trans_flag` = 3  WHERE id='$trans_id';";

    //echo $sql;

    $data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
	echo json_encode(array(array("msgType" => 1, "msg" => "Successfully Add informations"))); //if sql result true pass magType1
    } else {
	echo json_encode(array(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data"))); //if sql result true pass magType2
    }/* inside two functions there fore use two (array(array    )) arrays like this */
}


?>