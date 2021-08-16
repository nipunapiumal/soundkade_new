<?php

include("../db/db.php");  //set up sql connection 


if (array_key_exists('load_ebro', $_POST)) {

    $rbo_id = htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');

    $sql = "SELECT
erbo_register.erbo_id,
erbo_register.name
FROM
erbo_register WHERE rbo_id='$rbo_id'
";
//echo $sql;
    $result = mysqli_query($conn, $sql);
    echo'<option>Select E-Broker Name...</option>';
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }

    if (!empty($data)) {
	foreach ($data AS $data) {
	    echo'<option value="' . $data['erbo_id'] . '">' . $data['name'] . '</option>';
	}
    } else {
	echo'<option>No data found</option>';
    }
    echo json_encode($data);
}




if (array_key_exists('save_cus', $_POST)) {//check that the relevent code of controller
//save in database
    $sql = "INSERT INTO  `customer_account` ( 
  `id`,
  `cus_code`,
  `date`,  
  `de`,   
  `cr`,  
  `ebro_id`, 
  `increment_id`, 
  `description` 
  
   
  )
  VALUES (
   
   NULL,'" . htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['date']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['amount']), ENT_QUOTES, 'UTF-8') . "','0','" . htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['increment_id']), ENT_QUOTES, 'UTF-8') . "','Funds come From E-Broker'
  );";

    $erbo_id = htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');
    $sql8 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT rbo_id FROM erbo_register WHERE erbo_id='$erbo_id'"));
    //$sql8="SELECT rbo_id FROM erbo_register WHERE erbo_id='{$_POST['id']}'";
    // echo $sql8;
    $rbo_id = $sql8['rbo_id'];

    $sqlc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `commission`  WHERE type='E-Broker'"));
    $commission = $sqlc['commission'];
    $amount = htmlspecialchars(trim($_POST['amount']), ENT_QUOTES, 'UTF-8');
    $credit_amount = (($amount) - (($amount * $commission) / 100));

    $sql2 = "INSERT INTO  `ebro_account` ( 
  `ebro_acc_id`,
  `ebro_id`,
  `date`,  
  `de`,   
  `cr`,  
  `increment_id`,  
  `rbo_id`,  
  `description`  
   
  )
  VALUES (
   NULL,'" . htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['date']), ENT_QUOTES, 'UTF-8') . "','0','$credit_amount','" . htmlspecialchars(trim($_POST['increment_id']), ENT_QUOTES, 'UTF-8') . "','$rbo_id','Funds Transfer to customer'
   
  );";
    //echo $sql;
    $data2 = mysqli_query($conn, $sql2);


    $increment_id = htmlspecialchars(trim($_POST['increment_id']), ENT_QUOTES, 'UTF-8');

    $sql3 = "UPDATE `increment_id` SET auto_id='$increment_id'+1 ";
    //echo $sql3;
    $data3 = mysqli_query($conn, $sql3);

    $data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
	echo json_encode(array("msgType" => 1, "msg" => "Successfully Add informations")); //if sql result true pass magType1
    } else {
	echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data")); //if sql result true pass magType2
    }
}

if (array_key_exists("load_ebro_funds", $_POST)) {

    $ebro_id = htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');
    $sql = "SELECT
ebro_account.ebro_id,
SUM(ebro_account.de) AS debit,
SUM(ebro_account.cr) AS credit
FROM
ebro_account WHERE  ebro_account.`ebro_id`='$ebro_id'";
//echo $sql;
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }
    echo json_encode($data);
}

if (array_key_exists("cus_validation", $_POST)) {

    $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
    $sql = "SELECT
count(customer_reg.email) AS email
FROM
customer_reg  WHERE customer_reg.`email`='$email'";


    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }
    echo json_encode($data);
}

if (array_key_exists("cal_balance", $_POST)) {

    $cus_email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
    $sql = "SELECT
SUM(customer_account.de) AS de,
SUM(customer_account.cr) AS cr,
customer_account.cus_code
FROM
customer_account  WHERE customer_account.cus_code='$cus_email' GROUP BY customer_account.cus_code
";


    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }
    echo json_encode($data);
}

if (array_key_exists("auto_complete", $_POST)) {

    $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
    $sql = "SELECT

customer_reg.email
FROM
customer_reg  WHERE customer_reg.email LIKE '$email%' 
";

    //echo $sql;
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }

    if (!empty($data)) {
	foreach ($data AS $data) {
	    echo'<option value="' . $data['email'] . '"></option>';
	}
    } else {
	echo'<option>No data found</option>';
    }
    echo json_encode($data);
}



?>