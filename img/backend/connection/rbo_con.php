<?php

include("../db/db.php");  //set up sql connection 
if (!isset($_SESSION)) {
    session_start();
    //$uid = $_SESSION['id'];
     $uid = htmlspecialchars(trim($_SESSION['id']), ENT_QUOTES, 'UTF-8');
}

if (array_key_exists('save_rbo', $_POST)) {//check that the relevent code of controller
    $pass = $_POST['pass'];
    $password =  sha1($pass);
    $sql = "INSERT INTO  `rbo_register` ( 

  `rbo_id`,
  `name`,
  `address`,
  `nic`,
  `dob`,
  `gender`,
  `mobile`,
  `home`,
  `email`,
  `b_name`,
  `b_code`,
  `b_home`,
  `br_code`,
  `acc_no`,
  `province`,
  `district`,
  `city`,
  `u_name`,
  `pass`,
  `user` ,
  `lat`,
  `lng` 
  )
  VALUES (
   
  NULL,'" . htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['nic']), ENT_QUOTES, 'UTF-8') . "','" .htmlspecialchars(trim($_POST['dob']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['gender']), ENT_QUOTES, 'UTF-8') . "','" .htmlspecialchars(trim($_POST['mobile']), ENT_QUOTES, 'UTF-8'). "','" . htmlspecialchars(trim($_POST['home']), ENT_QUOTES, 'UTF-8'). "','" . htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8'). "','" . htmlspecialchars(trim($_POST['bank_name']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['bank_code']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['branch_home']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['branch_code']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['acc_no']), ENT_QUOTES, 'UTF-8'). "','" . htmlspecialchars(trim($_POST['province']), ENT_QUOTES, 'UTF-8'). "','" . htmlspecialchars(trim($_POST['district']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['city']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['u_name']), ENT_QUOTES, 'UTF-8') . "','" . htmlspecialchars(trim($_POST['pass']), ENT_QUOTES, 'UTF-8') . "','" . $uid ."','" .htmlspecialchars(trim($_POST['lat']), ENT_QUOTES, 'UTF-8') . "','" .htmlspecialchars(trim($_POST['lng']), ENT_QUOTES, 'UTF-8') . "'
 
);";

//echo $sql; 
    $data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
        $sql1 = mysqli_query($conn, "INSERT INTO user SET id=NULL,user='" . $_POST['u_name'] . "',val='2', pass='" . $_POST['pass'] . "',name='RBO',password='$password'");
        echo json_encode(array("msgType" => 1, "msg" => "Successfully Add informations")); //if sql result true pass magType1
    } else {
        echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data")); //if sql result true pass magType2
    }
}

if (array_key_exists('get_province', $_POST)) {
    $sql = "SELECT
province.pid,
province.province
FROM
province 
";

    $result = mysqli_query($conn, $sql);
    echo'<option>Select Yout Province....</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    if (!empty($data)) {
        foreach ($data AS $data) {
            //echo'<option>Select Your Province</option>';
            echo'<option value="' . $data['pid'] . '">' . $data['province'] . '</option>';
        }
    } else {
        echo'<option>No data found</option>';
    }
    echo json_encode($data);
}

if (array_key_exists('get_district', $_POST)) {
    $dis_id=htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');
    
    $sql = "SELECT
province.pid,
district.did,
district.pid, 
district.district
FROM
province
Inner Join district ON province.pid = district.pid 
WHERE district.pid='$dis_id'

";
//echo $sql;
    $result = mysqli_query($conn, $sql);
    echo'<option>Select Your District....</option>';
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
    
    $city_id=htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');
    
    $sql = "SELECT
city.city,
city.did,
district.did,
city.cid
FROM
district
Inner Join city ON district.did = city.did
WHERE city.did='$city_id'

";
//echo $sql;
    $result = mysqli_query($conn, $sql);
    echo'<option>Select Your City....</option>';
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


if (array_key_exists("nic_validation", $_POST)) {
    $nic=htmlspecialchars(trim($_POST['nic']), ENT_QUOTES, 'UTF-8');
    
    $sql = "SELECT
count(rbo_register.nic) as nic_count
FROM
rbo_register  WHERE rbo_register.`nic`='$nic'";


    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    echo json_encode($data);
}

if (array_key_exists("username_validation", $_POST)) {
    $user_name=htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8');
    
    $sql = "SELECT
count(user.user) as u_count
FROM
user  WHERE user.`user`='$user_name'";

    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
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

/* * **********************************  Update RBO Location **************************************** */

if (array_key_exists('update_rbo_location', $_POST)) {

    $rbo_id = htmlspecialchars(trim($_POST['rbo_id']), ENT_QUOTES, 'UTF-8');
    $lng = htmlspecialchars(trim($_POST['lng']), ENT_QUOTES, 'UTF-8');
    $lat = htmlspecialchars(trim($_POST['lat']), ENT_QUOTES, 'UTF-8');
	
    $sql = "UPDATE rbo_register SET lat='$lat' , lng='$lng' WHERE rbo_id = '$rbo_id'";
	$data = mysqli_query($conn, $sql); //check the result of query

    if ($data) {
        echo json_encode(array("msgType" => 1, "msg" => "Successfully Add informations")); //if sql result true pass magType1
    } else {
        echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data")); //if sql result true pass magType2
    }
}
?>