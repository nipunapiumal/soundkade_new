<?php

include '../db/db.php';
$date = date('Y-m-d');

if (array_key_exists('accept_ad', $_POST)) {//delete button of data table
    //$ebro = $_POST['ebro_id'];
    $id = htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');



    $sql = "UPDATE `consult_upload` SET `flag` =1 WHERE id='$id';";


    //echo $sql;

    $data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
	echo json_encode(array(array("msgType" => 1, "msg" => "Successfully Add informations"))); //if sql result true pass magType1
    } else {
	echo json_encode(array(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data"))); //if sql result true pass magType2
    }/* inside two functions there fore use two (array(array    )) arrays like this */
}

if (array_key_exists('reject_ad', $_POST)) {//delete button of data table
    $id = htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');



    $sql = "UPDATE `consult_upload` SET `flag` =2 WHERE id='$id';";

    //echo $sql;

    $data = mysqli_query($conn, $sql); //check the result of query


    if ($data) {
	echo json_encode(array(array("msgType" => 1, "msg" => "Successfully Add informations"))); //if sql result true pass magType1
    } else {
	echo json_encode(array(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data"))); //if sql result true pass magType2
    }/* inside two functions there fore use two (array(array    )) arrays like this */
}


if (array_key_exists('load_data', $_POST)) {//data table   
    $increment_id = htmlspecialchars(trim($_POST['increment_id']), ENT_QUOTES, 'UTF-8');
    $sql = "SELECT * FROM consult_upload WHERE cus_trans_id='$increment_id'";

    //echo $sql;
    $result = mysqli_query($conn, $sql);
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }
    echo json_encode($data);//
}

if (array_key_exists('delete_data', $_POST)) {//delete button of data table
    //$delete_id=$_POST['id_for_delete'];
    $delete_id = htmlspecialchars(trim($_POST['id_for_delete']), ENT_QUOTES, 'UTF-8');

    $sql2 = mysqli_query($conn, "SELECT * FROM consult_upload WHERE id ='$delete_id'");
    while ($row2 = mysqli_fetch_array($sql2)) {
	$img = $row2['upload_name'];
    }

    //if (!empty($img)) {
	//unlink(glob("../upload/pdf/$img"));
    //}
    
    
    $path2 = "../upload/pdf/$img";
	$files = glob($path2);
	
	
	
	foreach($files as $file) {
		unlink($file);
	}
	


   
//echo "../upload/pdf/$img";




    $sql = "DELETE  FROM consult_upload WHERE `id`='$delete_id';";
//echo $sql;
    $data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
	echo json_encode(array(array("msgType" => 1, "msg" => "Successfully deleted informations"))); //if sql result true pass magType1
    } else {
	echo json_encode(array(array("msgType" => 2, "msg" => "Sorry ! Could not be delete your Data"))); //if sql result true pass magType2
    }/* inside two functions there fore use two (array(array    )) arrays like this */
}
?>