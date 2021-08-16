<?php

include("../db/db.php");  //set up sql connection 


if (array_key_exists('load_ebro', $_POST)) {
 
     $rbo_id=htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');
    
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




if (array_key_exists('save_funds_ebro', $_POST)) {//check that the relevent code of controller
//save in database
    $sql = "INSERT INTO  `ebro_account` ( 
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
   
   NULL,'" . htmlspecialchars(trim($_POST['ebro']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['date']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['amount']), ENT_QUOTES, 'UTF-8') . "','0','" .htmlspecialchars(trim($_POST['incerment_id']), ENT_QUOTES, 'UTF-8'). "','" . htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8') . "','Funds Come From RBO'
  );";

    
  $sql2 = "INSERT INTO  `rbo_account` ( 
  `rbo_acc_id`,
  `rbo_id`,
  `date`,  
  `debit`,   
  `credit`,  
  `increment_id`,  
  `description`  
   
  )
  VALUES (
  
   NULL,'" . htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['date']), ENT_QUOTES, 'UTF-8')  . "','0','" .htmlspecialchars(trim($_POST['amount']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['incerment_id']), ENT_QUOTES, 'UTF-8')  . "','Fund Tranfer to E-Broker'
  );";   
  
  $data2 = mysqli_query($conn, $sql2); 
  
  $increment_id=htmlspecialchars(trim($_POST['incerment_id']), ENT_QUOTES, 'UTF-8');
  
  $sql3="UPDATE `increment_id` SET auto_id='$increment_id'+1 ";
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
    
    $ebro_id=htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');  
    
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


?>