<?php

include("../db/db.php");  //set up sql connection 


if (array_key_exists('load_bro', $_POST)) {
    
     $ebro_id=htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');
    
   $sql = "SELECT
bro_register.bro_id,
bro_register.name
FROM
bro_register WHERE ebro_id='$ebro_id'
";
//echo $sql;
    $result = mysqli_query($conn, $sql);
    echo'<option>Select Broker Name...</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    if (!empty($data)) {
        foreach ($data AS $data) {
            echo'<option value="' . $data['bro_id'] . '">' . $data['name'] . '</option>';
        }
    } else {
        echo'<option>No data found</option>';
    }
    echo json_encode($data);
}




if (array_key_exists('save_funds_bro', $_POST)) {//check that the relevent code of controller
//save in database
    $sql1 = "INSERT INTO  `bro_account` ( 
  `id`,
  `bro_id`,
  `date`,  
  `de`,   
  `ebro_id`,  
  `description`,  
  `increment_id`  
   
  )
  VALUES (

   NULL,'" .htmlspecialchars(trim($_POST['bro']), ENT_QUOTES, 'UTF-8') . "','" .htmlspecialchars(trim($_POST['date']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['amount']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8'). "','Funds Come From E-Broker','" . htmlspecialchars(trim($_POST['incerment_id']), ENT_QUOTES, 'UTF-8') . "'
  );";
$sqlc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `commission`  WHERE type='E-Broker'"));
$commission = $sqlc['commission'];
$amount=htmlspecialchars(trim($_POST['amount']), ENT_QUOTES, 'UTF-8'); 
$credit_amount=(($amount)-(($amount*$commission)/100));
    
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
  
   NULL,'" . htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8')  . "','" . htmlspecialchars(trim($_POST['date']), ENT_QUOTES, 'UTF-8')  . "','0','$credit_amount','" . htmlspecialchars(trim($_POST['incerment_id']), ENT_QUOTES, 'UTF-8')  . "','0','Funds Transfer to Broker'
  );";
  
  
  $data2 = mysqli_query($conn, $sql2); 
  
  $increment_id=htmlspecialchars(trim($_POST['incerment_id']), ENT_QUOTES, 'UTF-8');
  
  $sql3="UPDATE `increment_id` SET auto_id='$increment_id'+1 ";
  //echo $sql3;
  $data3 = mysqli_query($conn, $sql3); 
  
    $data1 = mysqli_query($conn, $sql1); //check the result of query

    if ($data1) {
	echo json_encode(array("msgType" => 1, "msg" => "Successfully Add informations")); //if sql result true pass magType1
    } else {
	echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data")); //if sql result true pass magType2
    }
}


?>