<?php

include("../db/db.php");  //set up sql connection 



if (array_key_exists('load_category', $_POST)) {
    $sql = "SELECT
main_category.id,
main_category.category
FROM
main_category
";

    $result = mysqli_query($conn, $sql);
    echo'<option value="Select Main Category...">Select Main Category...</option>';
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }

    if (!empty($data)) {
	foreach ($data AS $data) {
	    //echo'<option>Select Main Category</option>';
	    echo'<option value="' . $data['id'] . '">' . $data['category'] . '</option>';
	}
    } else {
	echo'<option>No data found</option>';
    }
    echo json_encode($data);
}

if (array_key_exists('save_data', $_POST)) {//check that the relevent code of controller
//save in database
$sql = "INSERT INTO  `price` ( 
  `id`,
  `cat_id`,
  `price`
 
  )
  VALUES (
   
   NULL,'" . htmlspecialchars(trim($_POST['category']), ENT_QUOTES, 'UTF-8')  . "','" .htmlspecialchars(trim($_POST['price']), ENT_QUOTES, 'UTF-8') . "'
  );";
    
//echo $sql; 
    $data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
	echo json_encode(array("msgType" => 1, "msg" => "Successfully Add informations")); //if sql result true pass magType1
    } else {
	echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data")); //if sql result true pass magType2
    }
}

?>