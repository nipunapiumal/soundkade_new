<?php

//header('Content-type: application/json');
include_once '../db/db.php';


$sub_cat = htmlspecialchars(trim($_POST['hid_subcat']), ENT_QUOTES, 'UTF-8');
$row_id = htmlspecialchars(trim($_POST['row_id']), ENT_QUOTES, 'UTF-8');
//$cat = $_POST['cat'];
//$form_list = $_POST['form_list'];
//$img = $_FILES['file']['name'];


/*echo $contact.'<br/>';
echo $sub_cat.'<br/>';
echo $cat.'<br/>';
echo $city.'<br/>';
echo $dist.'<br/>';
echo $lat.'<br/>';
echo $lng.'<br/>';
echo $house_no.'<br/>';
echo $street.'<br/>';
print_r($trans_list)."<br/>";*/
//print_r($form_list)."<br/>";
//print_r($img)."<br/>";

$sql1 = "SELECT
fields_map.field_id AS field_id,
fields_map.form_id,
form_fields.name AS field_name,
form_fields.`type` AS `type`,
fields_map.`order`
FROM
((fields_map)
Inner Join form_fields ON ((fields_map.field_id = form_fields.id))) where `fields_map`.`form_id`='$sub_cat' ORDER BY
fields_map.`order` ASC
";
//echo $sql1;
    $data = array();
    $result1 = mysqli_query($conn, $sql1);
    while ($row1 = mysqli_fetch_array($result1)) {
	$data[] = $row1[0];
    }
    $fname = array();
//print_r($data);
    foreach (array_combine($data, ($_POST['form_list'])) as $field_id => $form_list) {//combine two arrays


        //array_push($data_final, array($field_id => $form_list));
        // echo "ok "."<br/>"  ;   
        //echo  $form_list;  
        $fname[$field_id] = $form_list;
        //$serialized_data = serialize($GLOBALS[$fname]);

        }

        //print_r($fname);

        $serialized_data = serialize($fname);

        $sql_2 = "UPDATE `form_prev_data` SET data='$serialized_data' WHERE id='$row_id'";

        $data3 = mysqli_query($conn, $sql_2);
         
         //echo $serialized_data;
         //print_r($serialized_data);
        $redirectUrl = "../finalized_ads.php";
        echo "<script type=\"text/javascript\">";
	    echo "window.location.href = '$redirectUrl'";
	    echo "</script>";

?>