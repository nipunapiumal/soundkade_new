<?php

include("../db/db.php");  //set up sql connection 

/* * ********************* get_category ************************* */
if (array_key_exists('get_category', $_POST)) {
    $sql = "SELECT * FROM main_category";

    $result = mysqli_query($conn, $sql);
    echo"<option value=''>Select Category...</option>";
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    if (!empty($data)) {
        foreach ($data AS $data) {
            echo'<option value="' . $data['id'] . '">' . $data['category'] . '</option>';
        }
    } else {
        echo"<option value=''>No Data Found</option>";
    }
    echo json_encode($data);
}

/* * ********************* get_sub_category ************************* */
if (array_key_exists('get_sub_category', $_POST)) {
    //$cat_id=$_POST['id'];
    $cat_id = htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');
    
    $sql = "SELECT
sub_category.id AS sid,
sub_category.sub_category
FROM
main_category
Inner Join sub_category ON main_category.id = sub_category.cat_id 
WHERE main_category.id='$cat_id'

";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    if (!empty($data)) {
        foreach ($data AS $data) {
            echo'<option value="' . $data['sid'] . '">' . $data['sub_category'] . '</option>';
        }
    } else {
        echo"<option value=''>No Data Found</option>";
    }
    echo json_encode($data);
}

/* * ********************* load table data ************************* */
if (array_key_exists('load_data', $_POST)) {//data table    
    $sql = "SELECT * FROM form_fields order by name ASC";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    echo json_encode($data);
}

/* * ********************* fields map ************************* */

if (array_key_exists('fields_map', $_POST)) {
    $subcat = $_POST['subcat'];
    //$values = $_POST['values'];      

    if (!empty($_POST['field'])) {
        mysqli_query($conn, "DELETE FROM fields_map WHERE form_id='$subcat'");
        foreach (array_combine(($_POST['field']), ($_POST['order'])) as $field => $order) {//combine two arrays



            $qv = mysqli_query($conn, "SELECT * FROM fields_map WHERE form_id='$subcat' and field_id='$field'");

            if (mysqli_num_rows($qv) == 0) {

                $sql1 = "INSERT INTO fields_map SET `form_id`='$subcat', `field_id`='$field'";
                mysqli_query($conn, $sql1); 
		
		 
               
                $sql = "UPDATE  fields_map SET `order`='$order' WHERE field_id='$field'";
                //echo $sql;
                $data = mysqli_query($conn, $sql);
            }
        }
    }


   /*
        foreach ($_POST['order'] as $order) {
            // echo $order."<br>";
            $sql1 = "UPDATE  fields_map SET `order`='$order' WHERE field_id='$field'";
            // echo $sql1;
            $data = mysqli_query($conn, $sql1);
        }
    */

    if ($data) {
        echo json_encode(array("msgType" => 1, "msg" => "Successfully Add informations")); //if sql result true pass magType1
    } else {
        echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data")); //if sql result true pass magType2
    }
}

/* * ********************* get checked fields ************************* */

if (array_key_exists('check_fields', $_POST)) {
   // $subcat = $_POST['subcat'];
    $subcat =  htmlspecialchars(trim($_POST['subcat']), ENT_QUOTES, 'UTF-8');

    $sql = "SELECT
form_fields.id,
form_fields.`type`,
fields_map.id,
fields_map.form_id,
fields_map.field_id,
fields_map.`order`
FROM
form_fields
Inner Join fields_map ON form_fields.id = fields_map.field_id
WHERE fields_map.form_id='$subcat'";
   // echo $sql;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data);
    } else {
        
    }
}

/* * ********************* Add Data to form fields ************************* */

if (array_key_exists('add_data', $_POST)) {
    //$fid = $_POST['fid'];
    $fid =  htmlspecialchars(trim($_POST['fid']), ENT_QUOTES, 'UTF-8');

    $sql = "SELECT * FROM form_data WHERE field_id='$fid'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data);
    } else {
        
    }
}

/* * ********************* Save Fields Data ************************* */

if (array_key_exists('save_data', $_POST)) {
    //echo $fid = $_POST['fid'];
   // $fid = $_POST['fid'];
    $fid = htmlspecialchars(trim($_POST['fid']), ENT_QUOTES, 'UTF-8');
    //$val = $_POST['val'];
    $val = htmlspecialchars(trim($_POST['val']), ENT_QUOTES, 'UTF-8');
   // $sub_cat = $_POST['subcat'];
    $sub_cat = htmlspecialchars(trim($_POST['subcat']), ENT_QUOTES, 'UTF-8');

    //if(!empty($_POST['val'])) {
    //foreach($_POST['val'] as $val) {
    //echo $val;
    //$qv = mysqli_query($conn, "SELECT * FROM form_data WHERE field_id='$fid' and data='$val'");
    //if (mysqli_num_rows($qv) == 0){				
    $sql = "INSERT INTO form_data SET field_id='$fid', data='$val' , form_id='$sub_cat'";
    //echo $sql;
    $data = mysqli_query($conn, $sql);
    //}
    //}
    //}

    if ($data) {
        echo json_encode(array("msgType" => 1, "msg" => "Successfully Add informations")); //if sql result true pass magType1
    } else {
        echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data")); //if sql result true pass magType2
    }
}

if (array_key_exists('load_model_data', $_POST)) {//data table
    //$field_id=$_POST['fid'];
    $field_id=htmlspecialchars(trim($_POST['fid']), ENT_QUOTES, 'UTF-8');
    //$form_id=$_POST['subcat'];
    $form_id=htmlspecialchars(trim($_POST['subcat']), ENT_QUOTES, 'UTF-8');
    
    $sql = "SELECT * FROM form_data  WHERE form_data.field_id='$field_id' AND form_data.form_id='$form_id'";
    //echo $sql;
    $data = array();
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    echo json_encode($data);
}

if (array_key_exists('delete_data', $_POST)) {//delete button of data table
    //$delete_id=$_POST['id_for_delete'];
    $delete_id=htmlspecialchars(trim($_POST['id_for_delete']), ENT_QUOTES, 'UTF-8');
    
    $sql = "DELETE FROM form_data WHERE (`id`='$delete_id');";

    $data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
        echo json_encode(array(array("msgType" => 1, "msg" => "Successfully deleted informations"))); //if sql result true pass magType1
    } else {
        echo json_encode(array(array("msgType" => 2, "msg" => "Sorry ! Could not be delete your Data"))); //if sql result true pass magType2
    }/* inside two functions there fore use two (array(array    )) arrays like this */
}

if (array_key_exists('check_plus', $_POST)) {//data table    
    $sql = "SELECT * FROM form_fields order by name ASC";
    //echo $sql;
    //$data = array();
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    echo json_encode($data);
}

?>