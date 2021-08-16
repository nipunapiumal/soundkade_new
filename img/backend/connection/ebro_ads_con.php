<?php

include '../db/db.php';
$date = date('Y-m-d');

if (array_key_exists('accept_ad', $_POST)) {//delete button of data table
    //$ebro = $_POST['ebro_id'];
    $ebro = htmlspecialchars(trim($_POST['ebro_id']), ENT_QUOTES, 'UTF-8');
    $add_id = htmlspecialchars(trim($_POST['ad_id']), ENT_QUOTES, 'UTF-8');

    $sql = "UPDATE `form_prev_data` SET `flag` = 3, ebro_accept='$ebro' WHERE id='$add_id';";

    //echo $sql;

    $data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
	echo json_encode(array(array("msgType" => 1, "msg" => "Successfully Add informations"))); //if sql result true pass magType1
    } else {
	echo json_encode(array(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data"))); //if sql result true pass magType2
    }/* inside two functions there fore use two (array(array    )) arrays like this */
}

if (array_key_exists('finalize_ad', $_POST)) {//delete button of data table
    //$ebro = $_POST['ebro_id'];
    $ebro = htmlspecialchars(trim($_POST['ebro_id']), ENT_QUOTES, 'UTF-8');
    //$cat = $_POST['cat_id'];
    $cat = htmlspecialchars(trim($_POST['cat_id']), ENT_QUOTES, 'UTF-8');
    $ad_id = htmlspecialchars(trim($_POST['ad_id']), ENT_QUOTES, 'UTF-8');

    $sqlc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT price FROM price WHERE cat_id='$cat'"));
    $price = $sqlc['price'];
    //$comm = $sqlc['commission'];

    $sql_com = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `commission`  WHERE type='E-Broker'"));
    $commission = $sql_com['commission'];

    $cr = (($price) - (($price * $commission) / 100));







    $sql_1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM increment_id"));
    $increment_id = $sql_1['auto_id'];


    $sqlcr = "INSERT INTO ebro_account SET ebro_id='$ebro', date='$date', cr='$cr',increment_id='$increment_id',de='0',rbo_id='0',description='Funds goes to finalize add'";

    if (mysqli_query($conn, $sqlcr)) {

	$sql = "UPDATE `form_prev_data` SET `flag` = 1 WHERE id='$ad_id';";
	$data = mysqli_query($conn, $sql); //check the result of query
    }

    $sql_2 = "UPDATE `increment_id` SET auto_id='$increment_id'+1 ";
    //echo $sql3;
    $data3 = mysqli_query($conn, $sql_2);

    if ($data) {
	echo json_encode(array(array("msgType" => 1, "msg" => "Successfully Add informations"))); //if sql result true pass magType1
    } else {
	echo json_encode(array(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data"))); //if sql result true pass magType2
    }/* inside two functions there fore use two (array(array    )) arrays like this */
}
?>