<?php
include("../db/db.php");  //set up sql connection 

/////////////////////////////////////////////////////////////////////////////
if (array_key_exists('get_subcat', $_POST)) {
    $sql = "SELECT * FROM sub_category";

    $result = mysqli_query($conn, $sql);
    echo'<option>Nothing Selected</option>';
	while ($row = mysqli_fetch_assoc($result)) {
	  $data[] = $row;
    }   
	if (!empty($data)) {
	  foreach ($data AS $data) {
		echo'<option value="' . $data['id'] . '">' . $data['sub_category'] . '</option>';
	  }
    } else {
	  echo'<option></option>';
    }
    echo json_encode($data);
}

///////////////////////////////////////////////////////////////////////////
if (array_key_exists('get_location', $_POST)) {
    $sql = "SELECT * FROM city";

    $result = mysqli_query($conn, $sql);
    echo'<option>Nothing Selected</option>';
	while ($row = mysqli_fetch_assoc($result)) {
	  $data[] = $row;
    }

    if (!empty($data)) {
	  foreach ($data AS $data) {
		echo'<option value="' . $data['cid'] . '">' . $data['city'] . '</option>';
	  }
    } else {
	  echo'<option></option>';
    }
    echo json_encode($data);
}
//////////////////////////////////////////////////////////////////////////////

?>