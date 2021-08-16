<?php

include '../db/db.php';
if (array_key_exists('loading_broker', $_POST)) {//data table 
    $sql = "SELECT
bro_register.bro_id,
bro_register.name,
bro_register.address,
bro_register.nic,
bro_register.dob,
bro_register.gender,
bro_register.mobile,
bro_register.home,
bro_register.email,
bro_register.b_name,
bro_register.b_code,
bro_register.b_home,
bro_register.br_code,
bro_register.acc_no,
bro_register.province,
bro_register.district,
bro_register.city,
bro_register.reg_mob,
province.pid,
province.province,
district.did,
district.district,
city.cid,
city.city
FROM
rbo_register
Inner Join district ON bro_register.district = district.did
Inner Join city ON bro_register.city = city.cid
Inner Join province ON bro_register.province = province.pid
 ";

//echo $sql;
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }
    echo json_encode($data);
}

if (array_key_exists('delete_rbo', $_POST)) {//delete button of data table
    
    
    $rbo_id=htmlspecialchars(trim($_POST['broker']), ENT_QUOTES, 'UTF-8');  
    
    $sql = "DELETE FROM	  `rbo_register`  WHERE rbo_id='$rbo_id';";

    //echo $sql;

    $data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
	echo json_encode(array(array("msgType" => 1, "msg" => "Successfully Add informations"))); //if sql result true pass magType1
    } else {
	echo json_encode(array(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data"))); //if sql result true pass magType2
    }/* inside two functions there fore use two (array(array    )) arrays like this */
}

if (array_key_exists('get_data_to_up', $_POST)) {//data table 
    $sql = "SELECT
rbo_register.rbo_id,
rbo_register.name,
rbo_register.address,
rbo_register.nic,
rbo_register.dob,
rbo_register.gender,
rbo_register.mobile,
rbo_register.home,
rbo_register.email,
rbo_register.b_name,
rbo_register.b_code,
rbo_register.b_home,
rbo_register.br_code,
rbo_register.acc_no,
rbo_register.province,
rbo_register.district,
rbo_register.city,
rbo_register.u_name,
rbo_register.pass,
rbo_register.user,
district.did,
district.district AS disc,
city.cid,
city.city AS city,
province.pid,
province.province AS pro
FROM
rbo_register
Inner Join province ON rbo_register.province = province.pid
Inner Join district ON rbo_register.district = district.did
Inner Join city ON rbo_register.city = city.cid";

//echo $sql;
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }
    echo json_encode($data);
}

if (array_key_exists('get_province', $_POST)) {
    $sql = "SELECT
province.pid,
province.province
FROM
province 
";

     $result = mysqli_query($conn, $sql);

    

    //echo $sql1;
   
    //echo'<option>Select Your Province....</option>';
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }

    if (!empty($data)) {
	//echo'<option>Select Yout Province</option>';
	foreach ($data AS $data) {

	    echo'<option value="' . $data['pid'] . '">' . $data['province'] . '</option>';
	}
    } else {
	echo'<option>No data found</option>';
    }
    echo json_encode($data);
}

if (array_key_exists('get_district_direct', $_POST)) {
    $sql = "SELECT
district.did,
district.district
FROM
district 
";

     $result = mysqli_query($conn, $sql);
    //echo $sql1;
   
    //echo'<option>Select Your Province....</option>';
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }

    if (!empty($data)) {
	//echo'<option>Select Yout Province</option>';
	foreach ($data AS $data) {

	    echo'<option value="' . $data['did'] . '">' . $data['district'] . '</option>';
	}
    } else {
	echo'<option>No data found</option>';
    }
    echo json_encode($data);
}


if (array_key_exists('get_city_direct', $_POST)) {
    $sql = "SELECT
city.cid,
city.city
FROM
city 
";

     $result = mysqli_query($conn, $sql);

    

    //echo $sql1;
   
    //echo'<option>Select Your Province....</option>';
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }

    if (!empty($data)) {
	//echo'<option>Select Yout Province</option>';
	foreach ($data AS $data) {

	    echo'<option value="' . $data['cid'] . '">' . $data['city'] . '</option>';
	}
    } else {
	echo'<option>No data found</option>';
    }
    echo json_encode($data);
}


if (array_key_exists("update_rbo", $_POST)) {//ypdata button
    $sql = "UPDATE `rbo_register` SET `name`='{$_POST['name']}',`address`='{$_POST['address']}',`nic`='{$_POST['nic']}',`dob`='{$_POST['dob']}',`gender`='{$_POST['gene']}',`mobile`='{$_POST['mobile']}',`home`='{$_POST['home']}',`email`='{$_POST['email']}',`b_name`='{$_POST['bank_name']}',`b_code`='{$_POST['bank_code']}',`b_home`='{$_POST['branch_name']}',`br_code`='{$_POST['branch_code']}',`acc_no`='{$_POST['acc_no']}',`province`='{$_POST['province']}',`district`='{$_POST['district']}',`city`='{$_POST['city']}',`u_name`='{$_POST['u_name']}',`pass`='{$_POST['pwd']}' WHERE (`rbo_id`='{$_POST['id']}');";
    $update = mysqli_query($conn, $sql);
    //echo $sql;

    if ($update) {
	echo json_encode(array("msgType" => 1, "msg" => "Successfully Updated broker"));
    } else {
	echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Could not be Update your Data"));
    }
}

if (array_key_exists('get_district', $_POST)) {
    $sql = "SELECT
province.pid,
district.did,
district.pid, 
district.district
FROM
province
Inner Join district ON province.pid = district.pid 
WHERE district.pid='{$_POST['id']}'

";
//echo $sql;
    $result = mysqli_query($conn, $sql);
    //echo'<option>Select Your District....</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    if (!empty($data)) {
        foreach ($data AS $data) {
            echo'<option value="' . $data['did'] . '">' . $data['district'] . '</option>';
        }
    } else {
        echo'<option>No data found</option>';
    }
    echo json_encode($data);
}

if (array_key_exists('get_city', $_POST)) {
    $sql = "SELECT
city.city,
city.did,
district.did,
city.cid
FROM
district
Inner Join city ON district.did = city.did
WHERE city.did='{$_POST['id']}'

";
//echo $sql;
    $result = mysqli_query($conn, $sql);
    //echo'<option>Select Your City....</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    if (!empty($data)) {
        foreach ($data AS $data) {
            echo'<option value="' . $data['cid'] . '">' . $data['city'] . '</option>';
        }
    } else {
        echo'<option>No data found</option>';
    }
    echo json_encode($data);
}
?>