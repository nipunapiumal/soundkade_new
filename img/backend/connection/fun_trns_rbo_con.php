<?php

include("../db/db.php");  //set up sql connection 



if (array_key_exists('load_rbo', $_POST)) {
    $sql = "SELECT
rbo_register.rbo_id,
rbo_register.name
FROM
rbo_register 
";
//echo $sql;
    $result = mysqli_query($conn, $sql);
    echo'<option>Select RBO Name...</option>';
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }

    if (!empty($data)) {
	foreach ($data AS $data) {
	    echo'<option value="' . $data['rbo_id'] . '">' . $data['name'] . '</option>';
	}
    } else {
	echo'<option>No data found</option>';
    }
    echo json_encode($data);
}

if (array_key_exists('save_funds', $_POST)) {//check that the relevent code of controller
    $sqlc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `commission`  WHERE type='RBO'"));
    $commission = $sqlc['commission'];
    $amount = htmlspecialchars(trim($_POST['amount']), ENT_QUOTES, 'UTF-8');
    $debit_amount = (($amount) * ((100 + $commission) / 100));


    $sql = "INSERT INTO  `rbo_account` ( 
  `rbo_acc_id`,
  `rbo_id`,
  `date`,  
  `debit`,  
  
  `recept_no`,  
  `credit`,  
  `increment_id`,  
  `description`,  
  `amount`  
   
  )
  VALUES (
  
   NULL,'" . htmlspecialchars(trim($_POST['rbo']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['date']), ENT_QUOTES, 'UTF-8') . "','$debit_amount','" . htmlspecialchars(trim($_POST['recept_no']), ENT_QUOTES, 'UTF-8') . "','0','" . htmlspecialchars(trim($_POST['increment_id']), ENT_QUOTES, 'UTF-8') . "','Funds Rezived From Admin','" . htmlspecialchars(trim($_POST['amount']), ENT_QUOTES, 'UTF-8') . "'
  );";


    $increment_id = htmlspecialchars(trim($_POST['increment_id']), ENT_QUOTES, 'UTF-8');
    $sql3 = "UPDATE `increment_id` SET auto_id='$increment_id'+1 ";

    $data3 = mysqli_query($conn, $sql3);


    $recept_no = htmlspecialchars(trim($_POST['recept_no']), ENT_QUOTES, 'UTF-8');
    $sql4 = "UPDATE `recept_no` SET recept_no='$recept_no'+1 ";
    $data4 = mysqli_query($conn, $sql4);

    $data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
	echo json_encode(array("msgType" => 1, "msg" => "Successfully Add informations")); //if sql result true pass magType1
    } else {
	echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data")); //if sql result true pass magType2
    }
}

if (array_key_exists("load_rbo_funds", $_POST)) {

    $rbo_id = htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');

    $sql = "SELECT
rbo_account.rbo_id,
SUM(rbo_account.debit) AS debit,
SUM(rbo_account.credit) AS credit
FROM
rbo_account WHERE  rbo_account.`rbo_id`='$rbo_id'";
//echo $sql;
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }
    echo json_encode($data);
}
?>