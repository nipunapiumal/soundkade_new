<?php

include '../db/db.php';
$date = date('Y-m-d');



if (array_key_exists('trans', $_POST)) {//delete button of data table
    //$ebro = $_POST['ebro'];
    $ebro = htmlspecialchars(trim($_POST['ebro']), ENT_QUOTES, 'UTF-8');
    //$cat = $_POST['cat_id'];
    $trans_id = htmlspecialchars(trim($_POST['trans_id']), ENT_QUOTES, 'UTF-8');

    $sqlc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `transaction`  WHERE transac_type_id='$trans_id'"));
    $transac_fee = $sqlc['transac_fee'];
    //$commission = $sqlc['commission'];
    //echo "SELECT * FROM `transaction`  WHERE transac_type_id='$trans_id'";

    $sql_com = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `commission`  WHERE type='E-Broker'"));
    $commission = $sql_com['commission'];

    $cr = (($transac_fee) - (($transac_fee * $commission) / 100));



    $sql_1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM increment_id"));
    $increment_id = $sql_1['auto_id'];


    $sqlcr = "INSERT INTO ebro_account SET ebro_id='$ebro', date='$date', cr='$cr',increment_id='$increment_id',de='0',rbo_id='0',description='Funds goes to finalize transaction'";

    if (mysqli_query($conn, $sqlcr)) {
	$cons_id = htmlspecialchars(trim($_POST['consultant']), ENT_QUOTES, 'UTF-8');
	$hidden_id = htmlspecialchars(trim($_POST['hidden_trans_id']), ENT_QUOTES, 'UTF-8');

	$sql = "UPDATE `cus_transaction` SET `trans_flag`=1,`consult_id`='$cons_id'  WHERE id='$hidden_id';";
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