<?php
include_once 'db/db.php';

$city = htmlspecialchars(trim($_GET['city']), ENT_QUOTES, 'UTF-8');
$dist = htmlspecialchars(trim($_GET['district']), ENT_QUOTES, 'UTF-8');
$cat = htmlspecialchars(trim($_GET['cat']), ENT_QUOTES, 'UTF-8');
$subcat = htmlspecialchars(trim($_GET['subcat']), ENT_QUOTES, 'UTF-8');
$keyword = htmlspecialchars(trim($_GET['keyword']), ENT_QUOTES, 'UTF-8');
$checked = htmlspecialchars(trim($_GET['checked']), ENT_QUOTES, 'UTF-8');

if (!empty($checked) && (!empty($subcat)) && (!empty($city))) {
    $thePostIdArray = ( preg_split("/\s*,\s*/", $checked));
    $conditions = array();
    
	foreach ($thePostIdArray as $field_set) {
		$conditions[] = "`data` LIKE '%" . $field_set . "%'";
    }
    $MySQL = "
    SELECT
        SQL_CALC_FOUND_ROWS
        `lat`, `lng`, contact_no, city , id , ebro_id , ebro_accept , user
    FROM
        form_prev_data";

// if there are conditions defined
    if (count($conditions) > 0) {
		$MySQL .= " WHERE " . implode(' AND ', $conditions) . " AND flag='1' AND city='$city' AND subcat='$subcat' ORDER BY  `form_prev_data`.`id` DESC";
    } else {
		$MySQL .= " WHERE flag='1' ORDER BY  `form_prev_data`.`id` DESC";
    }
}

if (empty($checked)) {

$fields = array('keyword', 'city', 'subcat', 'cat', 'district');
$conditions = array();

foreach ($fields as $field) {
	if (isset($_GET[$field]) && $_GET[$field] != '') {
		if ($field == 'keyword') {
		$conditions[] = "(`data` LIKE '%" . htmlspecialchars(trim($_GET[$field]), ENT_QUOTES, 'UTF-8') . "%' OR  `ad_name` LIKE '%" . mysqli_real_escape_string($conn, $_GET[$field]) . "%')";
		} else {
		$conditions[] = "`$field`='" . htmlspecialchars(trim($_GET[$field]), ENT_QUOTES, 'UTF-8') . "'";
		}
	}
}

$MySQL = "
SELECT
	SQL_CALC_FOUND_ROWS
	`lat`, `lng`, contact_no, city , id , ebro_id , ebro_accept , user
FROM
	form_prev_data";

// if there are conditions defined
if (count($conditions) > 0) {
	$MySQL .= " WHERE " . implode(' AND ', $conditions) . " AND flag='1' ORDER BY  `form_prev_data`.`id` DESC";
	} else {
	$MySQL .= " WHERE flag='1' ORDER BY  `form_prev_data`.`id` DESC";
}

}
//echo $MySQL;

?>
<!DOCTYPE HTML>
<html lang="en-US" class="no-js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<!-- Basic Page Needs -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>soundkade.lk</title>
<meta charset="UTF-8" />
<!-- Mobile Specific Metas ======= -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<link rel="shortcut icon" href="wp-content/themes/real-spaces/images/favicon.ico" />
<!-- CSS  ============ -->
<link rel='stylesheet' id='imic_bootstrap-css'  href='wp-content/themes/real-spaces/css/bootstrap8a54.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='imic_animations-css'  href='wp-content/themes/real-spaces/css/animations8a54.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='imic_font_awesome-css'  href='wp-content/themes/real-spaces/css/font-awesome.min8a54.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='imic_main-css'  href='wp-content/themes/real-spaces-child/style8a54.css?ver=1.0.0' type='text/css' media='all' />
<script type='text/javascript' src='wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4' defer></script>
<script type='text/javascript' src='wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1' defer></script>
        
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6g5AcD5YpyO_262QWVXeygFBvkKR49NA&sensor=false"></script>

<style>
#map-canvas { width: 1200px; height:700px; }
</style>
</head>

<body>
<div class="body"> 

    <div role="main">
		<div id="content" class="content full">
		    <div class="container">
			<div class="row">
			
			<?php
			$sql_map = mysqli_fetch_assoc(mysqli_query($conn, $MySQL));
			$map_city = $sql_map['city'];

			$sql_map_city = mysqli_fetch_assoc(mysqli_query($conn, "SELECT city FROM city WHERE cid='$map_city'")); ?>

			<input type="hidden" value="<?php echo $sql_map_city['city']; ?>" id="map_city">
			
		    <div class="col-md-12">
            	<div id="map-canvas"/>
		    	</div>
			</div>
		    </div>
		</div>
	</div>
  
  <!-- Start Site Footer -->
  <?php //include 'common/footer.php'; ?>
  <!-- End Site Footer --> 
  
  <?php //include 'common/privacy_policy.php'; ?>
  
  <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a> </div>
<script type='text/javascript' src='wp-content/themes/real-spaces/plugins/prettyphoto/js/prettyphoto8a54.js?ver=1.0.0' defer></script> 
<script type='text/javascript' src='wp-content/themes/real-spaces/plugins/flexslider/js/jquery.flexslider8a54.js?ver=1.0.0' defer></script> 
<script type='text/javascript' src='wp-content/themes/real-spaces/js/helper-plugins8a54.js?ver=1.0.0' defer></script> 
<script type='text/javascript' src='wp-content/themes/real-spaces/js/bootstrap8a54.js?ver=1.0.0' defer></script> 
<script type='text/javascript'>
	    /* <![CDATA[ */
	    var urlajax = {"url": "", "tmpurl": "", "is_property": "", "sticky": "1", "is_contact": "", "home_url": "", "is_payment": "", "register_url": "", "is_register": "", "is_login": "", "is_submit_property": "", "BASIC": "BASIC", "ADVANCED": "ADVANCED"};
	    /* ]]> */
        </script> 
<script type='text/javascript' src='wp-content/themes/real-spaces/js/init8a54.js?ver=1.0.0' defer></script> 
<script type='text/javascript' src='wp-includes/js/jquery/ui/widget.mine899.js?ver=1.11.4' defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Map --> 
<script>
  $('document').ready(function (e) {
	var x = $("#map_city").val();
	
	//if(x != '') {
	 
	var geocoder =  new google.maps.Geocoder();
	geocoder.geocode( { address: x }, function(results, status) {
	  if (status == google.maps.GeocoderStatus.OK) {
		var myLatLng = {lat: results[0].geometry.location.lat(), lng: results[0].geometry.location.lng()};

		var map = new google.maps.Map(document.getElementById('map-canvas'), {
		  zoom: 9,
		  center: myLatLng
		});

<?php
  //$getpoints_eb = "SELECT `lat`, `lng`, contact_no FROM form_prev_data WHERE district='$map_dist'";
  if(!$result_eb = mysqli_query($conn, $MySQL)){
    //die('There was an error running the query [' . $con->error . ']');
  } else {
    while ($row_eb =  mysqli_fetch_array($result_eb))
    {
    	$e_bro_id = 0;

    	if ($row_eb['ebro_id']==0) {
    		$e_bro_id = $row_eb['ebro_accept'];
    	}
    	if ($row_eb['ebro_accept']==0) {
    		$e_bro_id = $row_eb['ebro_id'];
    	}
      echo 'var myLatlng1 = new google.maps.LatLng('.$row_eb['lat'].', '.$row_eb['lng'].');  
	  var marker'.$row_eb['id'].' = new google.maps.Marker({
	  	position: myLatlng1,  
		map: map,
		url'.$row_eb['id'].': "more_details.php?id='.$row_eb['id'].'&e_bro='.$e_bro_id.'&user='.$row_eb['user'].'",
	  });';

	 echo "google.maps.event.addListener(marker".$row_eb['id'].", 'click', function() {
          window.location.href = marker".$row_eb['id'].".url".$row_eb['id'].";
        });";
    }
  } 
?>
		  } else {
			alert("Something got wrong " + status);
		  }
		});
	//}
	
  });
</script>

</body>
</html>