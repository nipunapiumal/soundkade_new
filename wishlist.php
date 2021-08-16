<?php

session_start();
include 'db/db.php';
$date = date('Y-m-d');
//$log = $_SESSION['name'];
$log = htmlspecialchars(trim($_SESSION['name']), ENT_QUOTES, 'UTF-8');
$user_id = htmlspecialchars(trim($_SESSION['id']), ENT_QUOTES, 'UTF-8');




//$email = $_SESSION['email'];
//$email = htmlspecialchars(trim($_SESSION['email']), ENT_QUOTES, 'UTF-8');
//$add_id = $_POST['add_id'];
$add_id = htmlspecialchars(trim($_GET['add_id']), ENT_QUOTES, 'UTF-8');
$auto_id = htmlspecialchars(trim($_GET['auto_id']), ENT_QUOTES, 'UTF-8');
//$id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');


//$trans_id = $_POST['trans_id'];
//$trans_id = htmlspecialchars(trim($_POST['trans_id']), ENT_QUOTES, 'UTF-8');
//$trans_email = $_POST['trans_email'];
//$trans_email = htmlspecialchars(trim($_POST['trans_email']), ENT_QUOTES, 'UTF-8');
//$trans_cat_id = $_POST['trans_cat_id'];
//$trans_cat_id = htmlspecialchars(trim($_POST['trans_cat_id']), ENT_QUOTES, 'UTF-8');

if (empty($log)) {
    echo "<script>alert('Please login to the system!')</script>";
    $redirectUrl = "login.php?id=$add_id&auto_id=$auto_id";
    echo "<script type=\"text/javascript\">";
    echo "window.location.href = '$redirectUrl'";
    echo "</script>";
}
if (!empty($log)) {

    $sql4 = "INSERT INTO  `wish_list` ( 
  `id`,
  `add_id`,
  `cus_id`
  
   
  )
  VALUES (
   NULL,'$add_id','$user_id'
  );";
//echo $sql4;

    $data4 = mysqli_query($conn, $sql4);
    
    echo "<script>alert('Successfully added to wish list')</script>";
    $redirectUrl1 = "search.php";
    echo "<script type=\"text/javascript\">";
    echo "window.location.href = '$redirectUrl1'";
    echo "</script>";
    
    
}

?>