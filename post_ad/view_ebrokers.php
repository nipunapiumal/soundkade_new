<?php
include '../db/db.php';
if (!isset($_SESSION)) {
    session_start();
    //$log = $_SESSION['email'];
    $log = htmlspecialchars(trim($_SESSION['email']), ENT_QUOTES, 'UTF-8');

    if (empty($log)) {
	header("Location: ../login.php");
    } else {
	$sqlu = mysqli_query($conn, "SELECT * FROM customer_reg WHERE email='$log' and val='1'");
	if (mysqli_num_rows($sqlu) == 0) {
	    header("Location: ../logout.php");
	
	} else {
		$dist = htmlspecialchars(trim($_GET['dist']), ENT_QUOTES, 'UTF-8');
		if(empty($dist)) {
			header("Location: index.php");
		
		} else {
			$sqlad = mysqli_fetch_assoc(mysqli_query($conn, "SELECT district FROM district WHERE did='$dist'"));
		}
	}

    }
}
?>
<!DOCTYPE HTML>
<html lang="en-US" class="no-js">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
	<!-- Basic Page Needs -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Soundkade.lk</title>
	<meta charset="UTF-8" />
	<!-- Mobile Specific Metas ======= -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<link rel="shortcut icon" href="../wp-content/themes/real-spaces/images/favicon.ico" />
	<!-- CSS  ============ -->
	<link rel='stylesheet' id='imic_bootstrap-css'  href='../wp-content/themes/real-spaces/css/bootstrap8a54.css?ver=1.0.0' type='text/css' media='all' />
	<link rel='stylesheet' id='imic_animations-css'  href='../wp-content/themes/real-spaces/css/animations8a54.css?ver=1.0.0' type='text/css' media='all' />
	<link rel='stylesheet' id='imic_font_awesome-css'  href='../wp-content/themes/real-spaces/css/font-awesome.min8a54.css?ver=1.0.0' type='text/css' media='all' />
	<link rel='stylesheet' id='imic_main-css'  href='../wp-content/themes/real-spaces-child/style8a54.css?ver=1.0.0' type='text/css' media='all' />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type='text/javascript' src='../wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4'></script>
	<script type='text/javascript' src='../wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>

    <style type="text/css">
      #map-canvas { width: 100%; height:450px; }
    </style>
   
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6g5AcD5YpyO_262QWVXeygFBvkKR49NA&sensor=false">
    </script>
</head>
    <body>
	<div class="body"> 

	    <!-- Start Site Header -->
	    <?php include 'common/header.php'; ?>
	    <!-- End Site Header --> 
		
		<input type="hidden" value="<?php echo $sqlad['district']; ?>" id="dist">

	    <!-- Site Showcase -->
	    <div class="site-showcase"> 
		<!-- Start Page Header -->
		<div class="parallax page-header" style="background-image:url(images/sell-banner.jpg);">
		    <div class="container">
			<div class="row">
			    <div class="col-md-12"> 
				<!--<h1>Sell Something</h1>--> 
			    </div>
			</div>
		    </div>
		</div>
		<!-- End Page Header --> 
	    </div>
	    <!-- Start Content -->

	    <div role="main">
		<div id="content" class="content full">
		    <div class="container">
			<div class="row">
			    <div class="col-md-12">
                	<div id="map-canvas"/>
			    </div>
			</div>
		    </div>
		</div>
	    </div>

	    <!-- Start Site Footer -->
	    <?php include 'common/footer.php'; ?>
	    <!-- End Site Footer --> 

	   
	    <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a> </div>
	<script type='text/javascript' src='../wp-content/themes/real-spaces/plugins/prettyphoto/js/prettyphoto8a54.js?ver=1.0.0'></script> 
	<script type='text/javascript' src='../wp-content/themes/real-spaces/plugins/flexslider/js/jquery.flexslider8a54.js?ver=1.0.0'></script> 
	<script type='text/javascript' src='../wp-content/themes/real-spaces/js/helper-plugins8a54.js?ver=1.0.0'></script> 
	<script type='text/javascript' src='../wp-content/themes/real-spaces/js/bootstrap8a54.js?ver=1.0.0'></script> 
	<script type='text/javascript'>
	      /* <![CDATA[ */
	      var urlajax = {"url": "", "tmpurl": "", "is_property": "", "sticky": "1", "is_contact": "", "home_url": "", "is_payment": "", "register_url": "", "is_register": "", "is_login": "", "is_submit_property": "", "basic": "Basic", "advanced": "Advanced"};
	      /* ]]> */
	</script> 
	<script type='text/javascript' src='../wp-content/themes/real-spaces/js/init8a54.js?ver=1.0.0'></script> 
	<script type='text/javascript' src='../wp-includes/js/jquery/ui/widget.mine899.js?ver=1.11.4'></script>


	
<!-- Map ---> 
<script>
  $('document').ready(function (e) {
	var x = $("#dist").val();
	var geocoder =  new google.maps.Geocoder();
	geocoder.geocode( { address: x }, function(results, status) {
	  if (status == google.maps.GeocoderStatus.OK) {
		var myLatLng = {lat: results[0].geometry.location.lat(), lng: results[0].geometry.location.lng()};

		var map = new google.maps.Map(document.getElementById('map-canvas'), {
		  zoom: 10,
		  center: myLatLng
		});

<?php
  $getpoints_eb = "SELECT `name`, `mobile`, `lat`, `lng` FROM erbo_register WHERE district='$dist'";
  if(!$result_eb = mysqli_query($conn, $getpoints_eb)){
    //die('There was an error running the query [' . $con->error . ']');
  } else {
    while ($row_eb =  mysqli_fetch_array($result_eb)) {
      echo 'var myLatlng1 = new google.maps.LatLng('.$row_eb['lat'].', '.$row_eb['lng'].');  
	  var marker1 = new google.maps.Marker({ 
	  	position: myLatlng1,  
		map: map,
		title:"'.$row_eb['mobile'].','.$row_eb['name'].'"
	  });';
    }
  } 

  $getpoints = "SELECT `name`, `mobile`, `lat`, `lng` FROM rbo_register WHERE district='$dist'";
  if(!$result = mysqli_query($conn, $getpoints)){
    //die('There was an error running the query [' . $con->error . ']');
  } else {
    while ($row_rbo =  mysqli_fetch_array($result)) {
      echo 'var myLatlng = new google.maps.LatLng('.$row_rbo['lat'].', '.$row_rbo['lng'].');  
	  var marker = new google.maps.Marker({ 
	  	position: myLatlng,  
		map: map, 
		icon: "images/rbo.png",
		title:"'.$row_rbo['mobile'].','.$row_rbo['name'].'"
	  });';
    }
  } 
?>

 
		  } else {
			alert("Something got wrong " + status);
		  }
		});
  });
</script>
	
    </body>
</html>