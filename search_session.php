<?php
include_once 'db/db.php';
/*if (array_key_exists('session', $_POST)) {
   
    $x=htmlspecialchars(trim($_POST['x']), ENT_QUOTES, 'UTF-8');  
    
    $_SESSION["data"]=$x;
    //echo $_SESSION["data"];
    $session=$_SESSION["data"];
    if (!empty($session)) {
	echo json_encode(array("msgType" => 1, "msg" => "Successfully Updated broker"));
    } else {
	echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Could not be Update your Data"));
    } 
		
}*/

if (array_key_exists('get_field', $_POST)) {
    //$fid = $_POST['fid'];
    $data1 =  htmlspecialchars(trim($_POST['data']), ENT_QUOTES, 'UTF-8');
    $hidden_subcat =  htmlspecialchars(trim($_POST['hidden_subcat']), ENT_QUOTES, 'UTF-8');

    $sql = "SELECT * FROM form_data WHERE data='$data1' AND form_id='$hidden_subcat'";
    //echo $sql;
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }
    echo json_encode($data);
   
}

?>