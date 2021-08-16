<?php
include '../db/db.php';
$date = date('Y-m-d');

if (array_key_exists('trans', $_POST)) {//delete button of data table
	//$ebro = $_POST['ebro_id'];
    //$trans_id=htmlspecialchars(trim($_POST['trans_id']), ENT_QUOTES, 'UTF-8');
    $hidden_id=htmlspecialchars(trim($_POST['hidden_trans_id']), ENT_QUOTES, 'UTF-8');
    
    
    $consult_id=htmlspecialchars(trim($_POST['consultant']), ENT_QUOTES, 'UTF-8');
    
    
    /*$sql6 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `transaction`  WHERE transac_type_id='$trans_id'"));

    $transac_fee = $sql6['transac_fee'];*/
   
    
  
     /*$sql7 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `cus_transaction`  WHERE id='$hidden_id'"));
     $cus_id = $sql7['cus_id'];*/
     
     /* $sql8 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `customer_reg`  WHERE id='$cus_id'"));
     $email = $sql8['email'];*/
     //echo "SELECT * FROM `customer_reg`  WHERE id='$user'";
     //$sql9 = mysqli_fetch_assoc(mysqli_query($conn, "INSERT INTO customer_account SET cus_code='$email', date='$date', de='0', cr='$cat_price', ebro_id='0', increment_id='0'"));
   /* $sql_1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM increment_id"));
     $increment_id = $sql_1['auto_id'];*/
     
     
  /*   
     $sql9 = "INSERT INTO  `customer_account` ( 

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
   NULL,'$email','$date','0','$transac_fee','0','$increment_id','Funds Credit for Transaction'
  );";
     
  $sql_2="UPDATE `increment_id` SET auto_id='$increment_id'+1 ";
  //echo $sql3;
  $data3 = mysqli_query($conn, $sql_2); 
    
//echo $sql; 
    $data1 = mysqli_query($conn, $sql9); //check the result of query
*/
    $sql = "UPDATE `cus_transaction` SET `trans_flag`=1,`consult_id`='$consult_id'  WHERE id='$hidden_id';";
    
    
    //echo $sql;

    $data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
	echo json_encode(array(array("msgType" => 1, "msg" => "Successfully Add informations"))); //if sql result true pass magType1
    } else {
	echo json_encode(array(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data"))); //if sql result true pass magType2
    }/* inside two functions there fore use two (array(array    )) arrays like this */
}



?>