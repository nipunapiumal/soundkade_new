<?php

session_start();
include 'db/db.php';
$date = date('Y-m-d');
//$log = $_SESSION['name'];
$log = htmlspecialchars(trim($_SESSION['name']), ENT_QUOTES, 'UTF-8');



//$email = $_SESSION['email'];
$email = htmlspecialchars(trim($_SESSION['email']), ENT_QUOTES, 'UTF-8');

//$add_id = $_POST['add_id'];
$add_id = htmlspecialchars(trim($_POST['add_id']), ENT_QUOTES, 'UTF-8');


//$trans_id = $_POST['trans_id'];
$trans_id = htmlspecialchars(trim($_POST['trans_id']), ENT_QUOTES, 'UTF-8');

//$trans_email = $_POST['trans_email'];
$trans_email = htmlspecialchars(trim($_POST['trans_email']), ENT_QUOTES, 'UTF-8');
//$trans_cat_id = $_POST['trans_cat_id'];
$trans_cat_id = htmlspecialchars(trim($_POST['trans_cat_id']), ENT_QUOTES, 'UTF-8');

if (empty($log)) {
    echo "<script>alert('Please login to the system!')</script>";
    $redirectUrl = "login.php?id=$add_id";
    echo "<script type=\"text/javascript\">";
    echo "window.location.href = '$redirectUrl'";
    echo "</script>";
} else {



    // $sqlu = "SELECT * FROM customer_account WHERE cus_code='$email'";
    //$resultu = mysqli_query($conn, $sqlu);
    //$countu = mysqli_num_rows($resultu);
    //if ($countu >= 1) {
    //if($_POST['submit']){
    //$id = $_GET['id'];


    $sql2 = "SELECT
customer_reg.email,
customer_account.cus_code,
SUM(customer_account.de) AS de,
SUM(customer_account.cr) AS cr
FROM
customer_account
Inner Join customer_reg ON customer_reg.email = customer_account.cus_code
WHERE customer_reg.email='$trans_email' GROUP BY customer_reg.email


";
    //echo $sql2;
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($result2);
    $debit2 = $row2[2];
    $credit2 = $row2[3];

    $credit_balance = ($debit2 - $credit2);

    $sql3 = "SELECT
transaction.transac_type_id,
transaction.cat_id,
transaction.transac_fee
FROM
transaction
WHERE transaction.cat_id='$trans_cat_id' AND transaction.transac_type_id='$trans_id'



";
    //echo $sql3;
    $result3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_array($result3);
    $trans_fee = $row3[2];

    $sql5 = "SELECT id FROM customer_reg WHERE email='$trans_email'";
    //echo $sql5;
    $result5 = mysqli_query($conn, $sql5);
    $row5 = mysqli_fetch_array($result5);
    $user_id = $row5[0];


    if ($credit_balance >= $trans_fee) {



	$sql4 = "INSERT INTO  `cus_transaction` ( 
  `id`,
  `trans_id`,
  `cus_id`,  
  `trans_flag`,  
  `add_id`  
  
   
  )
  VALUES (
   NULL,'$trans_id','$user_id','0','$add_id'
  );";
//echo $sql4;
	$data4 = mysqli_query($conn, $sql4);

	//funds credit from customer///////////////////////////////////////////////



	$sql6 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `transaction`  WHERE transac_type_id='$trans_id'"));

	$transac_fee = $sql6['transac_fee'];



	$sql7 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `cus_transaction`  WHERE id='$hidden_id'"));
	$cus_id = $sql7['cus_id'];

	/*$sql8 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `customer_reg`  WHERE id='$cus_id'"));
	$email = $sql8['email'];*/
	//echo "SELECT * FROM `customer_reg`  WHERE id='$user'";
	//$sql9 = mysqli_fetch_assoc(mysqli_query($conn, "INSERT INTO customer_account SET cus_code='$email', date='$date', de='0', cr='$cat_price', ebro_id='0', increment_id='0'"));
	$sql_1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM increment_id"));
	$increment_id = $sql_1['auto_id'];



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
   NULL,'$email','$date','0','$transac_fee','0','$increment_id','Funds Credit for Transaction create'
  );";

	$sql_2 = "UPDATE `increment_id` SET auto_id='$increment_id'+1 ";
	//echo $sql3;
	$data3 = mysqli_query($conn, $sql_2);

//echo $sql; 
	$data1 = mysqli_query($conn, $sql9); //check the result of query
	//funds credit from customer ///////////////////////////////////////////////////////////////////////////
    }

    if ($credit_balance < $trans_fee) {
	$sql4 = "INSERT INTO  `cus_transaction` ( 
  `id`,
  `trans_id`,
  `cus_id`,  
  `trans_flag`,  
  `add_id` 
   
  )
  VALUES (
   NULL,'$trans_id','$user_id','2','$add_id'
  );";
	//echo $sql4;
	$data4 = mysqli_query($conn, $sql4);
    }





    //$qv = mysqli_query($conn, "UPDATE erbo_register SET name='$name', address='$address', nic='$nic', dob='$dob', gender='$gender', mobile='$mobile', home='$tel', email='$email', b_name='$bname', b_code='$bcode', b_home='$br_name', br_code='$br_code', acc_no='$acc_no', province='$prov', district='$dis', city='$city', d_id='$dev_id', r_id='$reg_mobile' WHERE erbo_id='$id'");
    echo "<script>alert('Successfully Added Transaction!')</script>";
    $redirectUrl = "index.php";
    echo "<script type=\"text/javascript\">";
    echo "window.location.href = '$redirectUrl'";
    echo "</script>";

    //}	
    //}
    /* if ($countu < 1 || $countu == 'null') {
      $sql5 = "INSERT INTO  `cus_transaction` (
      `id`,
      `trans_id`,
      `cus_id`,
      `trans_flag`,
      `add_id`


      )
      VALUES (
      NULL,'$trans_id','$user_id','2','$add_id'
      );";
      //echo $sql4;
      $data5 = mysqli_query($conn, $sql5);


      echo "<script>alert('Successfully Added Transaction!')</script>";
      $redirectUrl = "index.php";
      echo "<script type=\"text/javascript\">";
      echo "window.location.href = '$redirectUrl'";
      echo "</script>";
      } */


    /* else {
      $redirectUrl = "index.php";
      echo "<script type=\"text/javascript\">";
      echo "window.location.href = '$redirectUrl'";
      echo "</script>";
      } */
}
?>