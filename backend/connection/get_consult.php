<?php

include("../db/db.php");  //set up sql connection 


if (array_key_exists('get_consult', $_POST)) {
    $sql = "SELECT con_id, name FROM consult_register";

    $result = mysqli_query($conn, $sql);
    echo'<option value="Select Consultant Name...">Select Consultant Name...</option>';
    while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
    }

    if (!empty($data)) {
    foreach ($data AS $data) {
        //echo'<option>Select Main Category</option>';
        echo'<option value="' . $data['con_id'] . '">' . $data['name'] . '</option>';
    }
    } else {
    echo'<option>No data found</option>';
    }
    echo json_encode($data);
}

?>