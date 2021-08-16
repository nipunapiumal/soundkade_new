<?php
include_once("../connection/functions.php");//Udara's codes for image resizing


//header('Content-type: application/json');
include_once '../db/db.php';
date_default_timezone_set('Asia/Colombo');

//session_start();
//$val = $_SESSION['val'];
$val = htmlspecialchars(trim($_SESSION['val']), ENT_QUOTES, 'UTF-8');
// $log = $_SESSION['email'];
$log = htmlspecialchars(trim($_SESSION['email']), ENT_QUOTES, 'UTF-8');
// $uid = $_SESSION['id'];
$uid = htmlspecialchars(trim($_SESSION['id']), ENT_QUOTES, 'UTF-8');

//$response = array();

if ($val == 3) {
    //$user = $_SESSION['user'];
    $user = htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');

    $sql5 = "SELECT
`user`.`user`,
erbo_register.u_name,
erbo_register.erbo_id
FROM
erbo_register
INNER JOIN `user` ON `user`.`user` = erbo_register.u_name WHERE user.user='$user'
";

    $result5 = mysqli_query($conn, $sql5);
    $row5 = mysqli_fetch_array($result5);
    $ebro_reg_id = $row5[2];
}

date_default_timezone_set('Asia/Colombo');
$date = date("Y-m-d H:i:s");

//start exp date
$exp_date = date("Y-m-d H:i:s" , strtotime('+30 days', strtotime($date)));

//CODE FOR UPDATE AD EXPIRE TIME, I set it to 30 days
$expire_in = 30;//ad expire time in days, you can change it if you want
$expire_time = time() + 60*60*24*$expire_in;  // End of exp date

$sqlp = mysqli_fetch_assoc(mysqli_query($conn, "SELECT post_id FROM post_id"));
$post_id = $sqlp['post_id'];

if (isset($_POST['submit'])) {


////////////// Image Upload //////////////////////////////////////////////////////////////////////////////////////////////

    $j = 0;     // Variable for indexing uploaded image.
    $target_path = "../post_ad/uploads/" . $post_id . "/";     // Declaring Path for uploaded images.
    $thumb_path = "../post_ad/thumbs/" . $post_id . "/";     // Declaring Path for uploaded images.
    $error = true;

    if (is_dir($target_path) === false) {
	    mkdir($target_path);
    }
    if (is_dir($thumb_path) === false) {
	    mkdir($thumb_path);
    }
    //$img = htmlspecialchars(trim($_FILES["file"]["name"]), ENT_QUOTES, 'UTF-8');
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {


// Loop to get individual element from the array
	$validextensions = array("jpeg", "jpg", "png", "gif");      // Extensions which are allowed.
	$ext = explode('.', basename($_FILES['file']['name'][$i]));   // Explode file name from dot(.)
	$file_extension = strtolower(end($ext)); // some files have extension name in capital letters
	//$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];     // Set the target path with a new name of image.
	$j = $j + 1;      // Increment the number of uploaded images according to the files in array.
	if (($_FILES["file"]["size"][$i] < 10000000) && in_array($file_extension, $validextensions)) {
        $sanitizedname = preg_replace('/[^a-zA-Z0-9-_\.]/','',str_replace(" ", "-", $_POST['ad_name']));
        $currenttimestamp = time();
        $newfilename = $sanitizedname."-$currenttimestamp-$post_id-$i.$file_extension";
        //$newthumbname = $sanitizedname."-$currenttimestamp-$post_id-$is-thumb.$file_extension";


		if (move_uploaded_file($_FILES['file']['tmp_name'][$i], "{$target_path}{$newfilename}")) {

             //create a resized version of the image, put the same value in the second parameter so the original file will be overwritten.
             convertImage("{$target_path}{$newfilename}", "{$target_path}{$newfilename}", 650, 650, 70);
            //create a thumbnail of the image
             convertImage("{$target_path}{$newfilename}", "{$thumb_path}{$newfilename}", 250, 250, 70);

		    $error = false;


		    $sql = mysqli_query($conn, "INSERT INTO post_img SET img='$newfilename', post_id='$post_id'");
		} else {     //  If File Was Not Moved.
		    echo $j . ').<span id="error">please try again!.</span><br/><br/>';
		}

	} else {
	}
    }

    //$contact = $_POST['contact_no'];
    $contact = htmlspecialchars(trim($_POST['contact_no']), ENT_QUOTES, 'UTF-8');
    //$sub_cat = $_POST['sub_cat'];
    $sub_cat = htmlspecialchars(trim($_POST['sub_cat']), ENT_QUOTES, 'UTF-8');
    //$cat = $_POST['cat'];
    $cat = htmlspecialchars(trim($_POST['cat']), ENT_QUOTES, 'UTF-8');
    //$city = $_POST['city'];
    $city = htmlspecialchars(trim($_POST['city']), ENT_QUOTES, 'UTF-8');
    //$dist = $_POST['district'];
    $dist = htmlspecialchars(trim($_POST['district']), ENT_QUOTES, 'UTF-8');
    if ($val == 1) {
	//$uid = $_POST['uid'];
	$uid = htmlspecialchars(trim($_POST['uid']), ENT_QUOTES, 'UTF-8');
	$ebro_id = 0;
    }
    if ($val == 3) {
	$uid = 0;
	$ebro_id = $ebro_reg_id;
    }

    //$lat = $_POST['lat'];
    $lat = htmlspecialchars(trim($_POST['lat']), ENT_QUOTES, 'UTF-8');
    //$lng = $_POST['lng'];
    $lng = htmlspecialchars(trim($_POST['lng']), ENT_QUOTES, 'UTF-8');
    //$house_no = $_POST['house_no'];
    $house_no = htmlspecialchars(trim($_POST['house_no']), ENT_QUOTES, 'UTF-8');
    //$street = $_POST['street'];
    $street = htmlspecialchars(trim($_POST['street']), ENT_QUOTES, 'UTF-8');
    //$ad_name = $_POST['ad_name'];
    $ad_name = htmlspecialchars(trim($_POST['ad_name']), ENT_QUOTES, 'UTF-8');

    $table = 'form_prev_data';
    $serialized_data = serialize($GLOBALS['fname']);
    if ($val == 1 || $val == 3) {
	
	
	 if (!empty($_POST['trans_list'])) {
			foreach ($_POST['trans_list'] as $trans) {
			 $sql_trans = "INSERT INTO adds_transaction SET `post_id`='$post_id', `trans_id`='$trans'";
			  //echo $sql_trans;
                mysqli_query($conn, $sql_trans);
			    // echo $trans . "<br/>";
			}
		    }
	
	$sql = "INSERT INTO $table SET subcat='$sub_cat', data='$serialized_data', cat='$cat', city='$city', district='$dist',user='$uid', post_id='$post_id', contact_no='$contact', date='$date', lat='$lat', lng='$lng', house_no='$house_no', street='$street', ad_name='$ad_name', ebro_id='$ebro_id',flag='1', exp_date = '$expire_time'";

	if (mysqli_query($conn, $sql)) {

	    ///////////////////////////////////update e_broker credit when add post direct by e-broker/////////////////
	    //$ebro_reg_id


	    $sqlc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT price FROM price WHERE cat_id='$cat'"));
	    $price = $sqlc['price'];
	    //$comm = $sqlc['commission'];


	    $sql_com = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `commission`  WHERE type='E-Broker'"));
	    $commission = $sql_com['commission'];

	    $cr = (($price) - (($price * $commission) / 100));


	    //$cr = $price - $comm;
	    //$sql8 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT rbo_id FROM erbo_register WHERE erbo_id='$ebro_reg_id'"));
	    //$rbo_id = $sql8['rbo_id'];
	    if ($val == 3) {
		$sql_1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM increment_id"));
		$increment_id = $sql_1['auto_id'];


		$sqlcr = "INSERT INTO ebro_account SET ebro_id='$ebro_id', date='$date', cr='$cr',increment_id='$increment_id',de='0',rbo_id='0',description='Funds Credit For Direct ADD post'";
		mysqli_query($conn, $sqlcr);


		$sql_2 = "UPDATE `increment_id` SET auto_id='$increment_id'+1 ";

		$data3 = mysqli_query($conn, $sql_2);
	    }
	    ///////////////////////////////////update e_broker credit when add post direct by e-broker/////////////////  
///////////////////////////////////////////////////////check available balance//////////////////////////////////////////// 

	    if ($val == 1) {
		$sql30 = "SELECT
customer_reg.email,
customer_account.cus_code,
SUM(customer_account.de) AS de,
SUM(customer_account.cr) AS cr
FROM
customer_reg
Inner Join customer_account ON customer_reg.email = customer_account.cus_code WHERE customer_reg.email='$log' GROUP BY customer_reg.email


";
		//echo $sql2;
		$result30 = mysqli_query($conn, $sql30);
		$row30 = mysqli_fetch_array($result30);
		$debit30 = $row30[2];
		$credit30 = $row30[3];

		$balance30 = ($debit30 - $credit30);
		//echo $balance30;

		$sql31 = "SELECT
price.price,
price.cat_id
FROM
price
WHERE price.cat_id='$cat'



";
		//echo $sql2;
		$result31 = mysqli_query($conn, $sql31);
		$row31 = mysqli_fetch_array($result31);
		$cat31 = $row31[1];
		$price31 = $row31[0];
//echo $price31;

		if ($balance30 >= $price31) {

		    //$sql32 = mysqli_fetch_assoc(mysqli_query($conn, "UPDATE `form_prev_data` SET flag='0' WHERE (form_prev_data.user='$uid' AND form_prev_data.post_id='$post_id')"));
		    $sql32 = "UPDATE `form_prev_data` SET flag='0' WHERE form_prev_data.user='$uid' AND form_prev_data.post_id='$post_id'";
		    $result32 = mysqli_query($conn, $sql32);

		    //funds credited from customer/////////////////////////////////////////////////////

		    $sql7 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `price`  WHERE cat_id='$cat'"));
		    $cat_price = $sql7['price'];

		    $sql8 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `customer_reg`  WHERE id='$uid'"));
		    $email = $sql8['email'];
		    //echo "SELECT * FROM `customer_reg`  WHERE id='$user'";
		    //$sql9 = mysqli_fetch_assoc(mysqli_query($conn, "INSERT INTO customer_account SET cus_code='$email', date='$date', de='0', cr='$cat_price', ebro_id='0', increment_id='0'"));
		    $sql_3 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM increment_id"));
		    $increment_id_1 = $sql_3['auto_id'];


		    $sql9 = "INSERT INTO  `customer_account` ( 

  `id`,
  `cus_code`,
  `date`,
  `de`,
  `cr`,
  `ebro_id`,
  `increment_id`,
  `description`
  
  )
  VALUES (
   NULL,'$email','$date','0','$cat_price','0','$increment_id_1','Funds Credit for post ADD'
  );";

		    $data1 = mysqli_query($conn, $sql9); //check the result of query


		    $sql_2 = "UPDATE `increment_id` SET auto_id='$increment_id_1'+1 ";
		    //echo $sql3;
		    $data3 = mysqli_query($conn, $sql_2);




		    //funds credited from customer////////////////////////////////////////////////////////////
		} else {
		    if ($balance30 < $price31) {
			
		    }
		    $sql33 = "UPDATE `form_prev_data` SET flag='2' WHERE form_prev_data.user='$uid' AND form_prev_data.post_id='$post_id'";
		    $result33 = mysqli_query($conn, $sql33);
		}
	    }




	    //////////////////////////////////////////////////////////////check available balance//////////////////////////////////  



	    $response['status'] = 'ok';

	    $pid = $post_id + 1;
	    mysqli_query($conn, "UPDATE post_id SET post_id='$pid'");

	    echo "<script>alert('Data has been added successfully')</script>";
	    if ($val == 1) {
		//$redirectUrl = "../post_ad/index.php";
		$redirectUrl = "../post_ad/view_ebrokers.php?dist=$dist";
	    }
	    if ($val == 3) {
		$redirectUrl = "../backend/home.php";
	    }

	    echo "<script type=\"text/javascript\">";
	    echo "window.location.href = '$redirectUrl'";
	    echo "</script>";
	}
    } else {
	$response['status'] = 'error';
	// wrong details
	$response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Please Try again.';
    }
}
?>