<?php
include("../db/db.php");  //set up sql connection 

if (array_key_exists('save_transac', $_POST)) {//check that the relevent code of controller
//save in database
$sql = "INSERT INTO transac_consult VALUES ( NULL," . htmlspecialchars(trim($_POST['transac']), ENT_QUOTES, 'UTF-8'). "," . htmlspecialchars(trim($_POST['consult']), ENT_QUOTES, 'UTF-8'). ")";

    
    //echo $sql; 
    $data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
	echo json_encode(array("msgType" => 1, "msg" => "Successfully Add informations")); //if sql result true pass magType1
    } else {
	echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data")); //if sql result true pass magType2
    }
}

if (array_key_exists("category_exist", $_POST)) {
    //$category=$_POST['categ'];
    $category=htmlspecialchars(trim($_POST['categ']), ENT_QUOTES, 'UTF-8');
    
    $sql = "SELECT
count(category) as categ_count
FROM
main_category  WHERE main_category.`category`='$category'";
//echo $sql;
   $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }
    echo json_encode($data);
}
?>