<?php

include("../db/db.php");  //set up sql connection 

/* * ********************************** Load Sub cat **************************************** */
if (array_key_exists('get_subcat', $_POST)) {
    //$cat_id=$_POST['cat_id'];
    $cat_id=htmlspecialchars(trim($_POST['cat_id']), ENT_QUOTES, 'UTF-8');

    $sql = "SELECT id,sub_category FROM sub_category WHERE cat_id='$cat_id'";

    $result = mysqli_query($conn, $sql);
    echo'<option value="">Select Sub Category...</option>';
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }

    if (!empty($data)) {
	foreach ($data AS $data) {
	    echo'<option value="' . $data['id'] . '">' . $data['sub_category'] . '</option>';
	}
    } else {
	echo'<option value="">No Data Found</option>';
    }
    echo json_encode($data);
}

/* * **********************************  load district **************************************** */

if (array_key_exists('get_district', $_POST)) {
    $sql = "SELECT * FROM district ORDER by district ASC";

    $result = mysqli_query($conn, $sql);
    echo'<option value="">Select District...</option>';
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }

    if (!empty($data)) {
	foreach ($data AS $data) {
	    echo'<option value="' . $data['did'] . '">' . $data['district'] . '</option>';
	}
    } else {
	echo'<option value="">No Data Found</option>';
    }
    echo json_encode($data);
}

/* * **********************************  load city **************************************** */

if (array_key_exists('get_city', $_POST)) {
    //$id = $_POST['id'];
    $id = htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');
    $sql = "SELECT
city.city,
city.did,
district.did,
city.cid
FROM
district
Inner Join city ON district.did = city.did
WHERE city.did='$id'

";
    $result = mysqli_query($conn, $sql);
    echo'<option value="">Select City...</option>';
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }

    if (!empty($data)) {
	foreach ($data AS $data) {
	    echo'<option value="' . $data['cid'] . '">' . $data['city'] . '</option>';
	}
    } else {
	echo'<option value="">No Data Found</option>';
    }
    echo json_encode($data);
}

/* * **********************************  Get city name **************************************** */

if (array_key_exists('get_city_name', $_POST)) {
    //$id = $_POST['id'];
    $id = htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');
    $sql = "SELECT city FROM city WHERE cid = '$id' ";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    echo json_encode(implode(" ", $row));
}
?>