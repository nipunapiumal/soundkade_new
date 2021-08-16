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
bro_register
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

if (array_key_exists('delete_broker', $_POST)) {//delete button of data table
    
    $bro_id=htmlspecialchars(trim($_POST['broker']), ENT_QUOTES, 'UTF-8'); 
    
    $sql = "DELETE FROM	  `bro_register`  WHERE bro_id='$bro_id';";

    //echo $sql;

    $data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
	echo json_encode(array(array("msgType" => 1, "msg" => "Successfully Add informations"))); //if sql result true pass magType1
    } else {
	echo json_encode(array(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data"))); //if sql result true pass magType2
    }/* inside two functions there fore use two (array(array    )) arrays like this */
}

if (array_key_exists('get_data_to_up', $_POST)) {//data table 
    $id=htmlspecialchars(trim($_POST['ID']), ENT_QUOTES, 'UTF-8'); 
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
province.province AS pro,
district.did,
district.district AS dis,
city.cid,
city.city AS cit
FROM
bro_register
Inner Join district ON bro_register.district = district.did
Inner Join city ON bro_register.city = city.cid
Inner Join province ON bro_register.province = province.pid
WHERE bro_id='$id'
 ";

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

    

    //echo $sql;
   
    echo'<option value="' . $_POST['prov_id'] . '">' . $_POST['pname'] . '</option>';
    
    
    
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }

    if (!empty($data)) {
	//echo'<option>Select Yout Province</option>';
	foreach ($data AS $data) {

	    if($data['pid'] != $_POST['prov_id']) {
		echo'<option value="' . $data['pid'] . '">' . $data['province'] . '</option>';
		}
	}
    } else {
	echo'<option>No data found</option>';
    }
    echo json_encode($data);
}

if (array_key_exists('get_district_direct', $_POST)) {
 $prov_id=htmlspecialchars(trim($_POST['prov_id']), ENT_QUOTES, 'UTF-8');    
    
 $sql = "SELECT
district.did,
district.district
FROM
district where pid='$prov_id'
";

     $result = mysqli_query($conn, $sql);

    

    //echo $sql1;
   
    echo'<option value="' . $_POST['dist_id'] . '">' . $_POST['dname'] . '</option>';
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }

    if (!empty($data)) {
	   
	foreach ($data AS $data) {

	    if($data['did'] != $_POST['dist_id']) {
		echo'<option value="' . $data['did'] . '">' . $data['district'] . '</option>';
		}
	}
    } else {
	echo'<option>No data found</option>';
    }
    echo json_encode($data);
}


if (array_key_exists('get_city_direct', $_POST)) {
    
    $dis_id=htmlspecialchars(trim($_POST['dist_id']), ENT_QUOTES, 'UTF-8');  
    
    $sql = "SELECT
city.cid,
city.city
FROM
city  where did='$dis_id'
";

     $result = mysqli_query($conn, $sql);

    

    //echo $sql1;
   
     echo'<option value="' . $_POST['c_id'] . '">' . $_POST['cname'] . '</option>';
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }

    if (!empty($data)) {
	//echo'<option>Select Yout Province</option>';
	foreach ($data AS $data) {
		
		if($data['cid'] != $_POST['c_id']) {

	    echo'<option value="' . $data['cid'] . '">' . $data['city'] . '</option>';
		}
	}
    } else {
	echo'<option>No data found</option>';
    }
    echo json_encode($data);
}


if (array_key_exists("update_broker", $_POST)) {//ypdata button
    $bro_id=htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8'); 
    
    $name=htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8'); 
    $address=htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8'); 
    $nic=htmlspecialchars(trim($_POST['nic']), ENT_QUOTES, 'UTF-8'); 
    $dob=htmlspecialchars(trim($_POST['dob']), ENT_QUOTES, 'UTF-8'); 
    $gender=htmlspecialchars(trim($_POST['gen']), ENT_QUOTES, 'UTF-8'); 
    $mobile=htmlspecialchars(trim($_POST['mobile']), ENT_QUOTES, 'UTF-8'); 
    $home=htmlspecialchars(trim($_POST['home']), ENT_QUOTES, 'UTF-8'); 
    $email=htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8'); 
    $bank_name=htmlspecialchars(trim($_POST['bank_name']), ENT_QUOTES, 'UTF-8'); 
    $bank_code=htmlspecialchars(trim($_POST['bank_code']), ENT_QUOTES, 'UTF-8'); 
    $branch_name=htmlspecialchars(trim($_POST['branch_name']), ENT_QUOTES, 'UTF-8'); 
    $branch_code=htmlspecialchars(trim($_POST['branch_code']), ENT_QUOTES, 'UTF-8'); 
    $acc_no=htmlspecialchars(trim($_POST['acc_no']), ENT_QUOTES, 'UTF-8'); 
    $province=htmlspecialchars(trim($_POST['province']), ENT_QUOTES, 'UTF-8'); 
    $district=htmlspecialchars(trim($_POST['district']), ENT_QUOTES, 'UTF-8'); 
    $city=htmlspecialchars(trim($_POST['city']), ENT_QUOTES, 'UTF-8'); 
    $reg_mob=htmlspecialchars(trim($_POST['reg_mob']), ENT_QUOTES, 'UTF-8'); 
    
    
    $sql = "UPDATE `bro_register` SET `name`='$name',`address`='$address',`nic`='$nic',`dob`='$dob,`gender`='$gender',`mobile`='$mobile',`home`='$home',`email`='$email',`b_name`='$bank_name',`b_code`='$bank_code',`b_home`='$branch_name',`br_code`='$branch_code',`acc_no`='$acc_no',`province`='$province',`district`='$district',`city`='$city',`reg_mob`='$reg_mob' WHERE (`bro_id`='$bro_id');";
    $update = mysqli_query($conn, $sql);
    echo $sql;

    if ($update) {
	echo json_encode(array("msgType" => 1, "msg" => "Successfully Updated broker"));
    } else {
	echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Could not be Update your Data"));
    }
}

if (array_key_exists('get_district', $_POST)) {
    
     $id=htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');  
    
    $sql = "SELECT
province.pid,
district.did,
district.pid, 
district.district
FROM
province
Inner Join district ON province.pid = district.pid 
WHERE district.pid='$id'

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
    
   $id=htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');  
    
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