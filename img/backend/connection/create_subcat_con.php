<?php

include("../db/db.php");  //set up sql connection 



if (array_key_exists('get_subcat', $_POST)) {
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

if (array_key_exists('get_transac', $_POST)) {
    
    
    $sql = "SELECT transaction_type.id, transaction_type.name FROM transaction_type WHERE transaction_type.name NOT IN (SELECT

transaction_type.name
FROM
transaction_type
Inner Join transaction ON transaction_type.id = transaction.transac_type_id
)";

    $result = mysqli_query($conn, $sql);
    echo'<option value="Select Transaction Type...">Select Transaction Type...</option>';
    while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
    }

    if (!empty($data)) {
    foreach ($data AS $data) {
        //echo'<option>Select Main Category</option>';
        echo'<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
    }
    } else {
    echo'<option>No data found</option>';
    }
    echo json_encode($data);
}

if (array_key_exists('get_transac_for_consult', $_POST)) {
    $sql = "SELECT
transaction_type.id,
transaction_type.name
FROM
transaction_type
";

    $result = mysqli_query($conn, $sql);
    echo'<option value="Select Transaction Type...">Select Transaction Type...</option>';
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }

    if (!empty($data)) {
	foreach ($data AS $data) {
	    //echo'<option>Select Main Category</option>';
	    echo'<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
	}
    } else {
	echo'<option>No data found</option>';
    }
    echo json_encode($data);
}

?>