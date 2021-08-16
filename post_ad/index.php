<?php
include '../db/db.php';

if (!isset($_SESSION)) {
    session_start();
    //$log = $_SESSION['email'];
    $log = htmlspecialchars(trim($_SESSION['email']), ENT_QUOTES, 'UTF-8');
	$log2 = $_SESSION['fb_user_info']['email'];
	
// 	echo '<prev>';
// 	//print_r($log);
// 	print_r($log2);
// 	die();

	if (empty($log2)) {
		if (empty($log)) {
			//print_r($log);
			header("Location: ../login.php");
			} else {
			$sqlu = mysqli_query($conn, "SELECT * FROM customer_reg WHERE email='$log' and val='1'");
				if (mysqli_num_rows($sqlu) == 0) {
					header("Location: ../logout.php");
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

	<style>
		
	</style>
	
    </head>

    <body>
	<div class="body"> 

	    <!-- Start Site Header -->
	    <?php include 'common/header.php'; ?>
	    <!-- End Site Header --> 

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

		<?php 
					//print_r($_SESSION['email']);
					if($_SESSION['email'] != 'soundkade.lk@gmail.com'){
						echo '
						<div id="content" class="content full">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
								<h2 align="center"><font color="#eb2e2f">Sell Something</font></h2>
								<div class="col-md-0"></div>
								<div align="center">

								<div class="col-md-2 col-sm-2 col-sm-offset-0 col-xs-6 featured-block" id="car"><a data-target="" data-toggle=""><img src="../img/service.png" class="img-thumbnail"></a>
									<h4><a data-target="" data-toggle="">Soundkade Admins only</a></h4>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-6 featured-block" id="home"><a data-target="" data-toggle=""><img src="../img/property2.png" class="img-thumbnail"></a>
									<h4><a data-target="" data-toggle="">Soundkade Admins only</a></h4>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 featured-block new" id="land"><a data-target="#form_prev" data-toggle="modal"><img src="../img/land.png" class="img-thumbnail"></a>
									<h4><a data-target="#form_prev" data-toggle="modal">Speakers</a></h4>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-6 featured-block" id="labour"><a data-target="#form_prev" data-toggle="modal"><img src="../img/labour.png" class="img-thumbnail"></a>
									<h4><a data-target="#form_prev" data-toggle="modal">Musical Instruments</a></h4>
								</div>
								<div class="col-md-2  col-lg-offset-0 col-sm-2 col-xs-6 featured-block" id="marriage"><a data-target="#form_prev" data-toggle="modal"><img src="../img/marriage.png" class="img-thumbnail"></a>
									<h4><a data-target="#form_prev" data-toggle="modal">Accessories</a></h4>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 featured-block" id="other"><a data-target="#form_prev" data-toggle="modal"><img src="../img/other.png" class="img-thumbnail"></a>
									<h4><a data-target="#form_prev" data-toggle="modal">Other</a></h4>
								</div>
								</div>
								<div class="col-md-1"></div>

								</div>
							</div>
						</div>
					</div>';
					}else{
						echo '<div id="content" class="content full">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
								<h2 align="center"><font color="#eb2e2f">Sell Something</font></h2>

								<div class="col-md-0"></div>
								<div class="col-md-2 col-sm-2 col-sm-offset-0 col-xs-6 featured-block" id="car"><a data-target="#form_prev" data-toggle="modal"><img src="../img/service.png" class="img-thumbnail"></a>
									<h4><a data-target="#form_prev" data-toggle="modal">Soundkade.lk Speakers.. etc</a></h4>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-6 featured-block" id="home"><a data-target="#form_prev" data-toggle="modal"><img src="../img/property2.png" class="img-thumbnail"></a>
									<h4><a data-target="#form_prev" data-toggle="modal">Stock Clearence & Sales</a></h4>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 featured-block" id="land"><a data-target="#form_prev" data-toggle="modal"><img src="../img/land.png" class="img-thumbnail"></a>
									<h4><a data-target="#form_prev" data-toggle="modal">Other Speakers</a></h4>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-6 featured-block" id="labour"><a data-target="#form_prev" data-toggle="modal"><img src="../img/labour.png" class="img-thumbnail"></a>
									<h4><a data-target="#form_prev" data-toggle="modal">Musical Instruments</a></h4>
								</div>
								<div class="col-md-2  col-lg-offset-0 col-sm-2 col-xs-6 featured-block" id="marriage"><a data-target="#form_prev" data-toggle="modal"><img src="../img/marriage.png" class="img-thumbnail"></a>
									<h4><a data-target="#form_prev" data-toggle="modal">Accessories</a></h4>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 featured-block" id="other"><a data-target="#form_prev" data-toggle="modal"><img src="../img/other.png" class="img-thumbnail"></a>
									<h4><a data-target="#form_prev" data-toggle="modal">Other</a></h4>
								</div>
								<div class="col-md-1"></div>
								</div>
							</div>
						</div>
					</div>';
					}
		?>


		<!-- <div id="content" class="content full">
		    <div class="container">
			<div class="row">
			    <div class="col-md-12">
				<h2 align="center"><font color="#eb2e2f">Sell Something</font></h2>

				
				<div class="col-md-0"></div>
				<div class="col-md-2 col-sm-2 col-sm-offset-0 col-xs-6 featured-block" id="car"><a data-target="#form_prev" data-toggle="modal"><img src="../img/service.png" class="img-thumbnail"></a>
				    <h4><a data-target="#form_prev" style="pointer-events: none" data-toggle="modal">Soundkade.lk Speakers.. etc</a></h4>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-6 featured-block" id="home"><a data-target="#form_prev" data-toggle="modal"><img src="../img/property2.png" class="img-thumbnail"></a>
				    <h4><a data-target="#form_prev" data-toggle="modal">Stock Clearence & Sales</a></h4>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 featured-block" id="land"><a data-target="#form_prev" data-toggle="modal"><img src="../img/land.png" class="img-thumbnail"></a>
				    <h4><a data-target="#form_prev" data-toggle="modal">Other Speakers</a></h4>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-6 featured-block" id="labour"><a data-target="#form_prev" data-toggle="modal"><img src="../img/labour.png" class="img-thumbnail"></a>
				    <h4><a data-target="#form_prev" data-toggle="modal">Musical Instruments</a></h4>
				</div>
				<div class="col-md-2  col-lg-offset-0 col-sm-2 col-xs-6 featured-block" id="marriage"><a data-target="#form_prev" data-toggle="modal"><img src="../img/marriage.png" class="img-thumbnail"></a>
				    <h4><a data-target="#form_prev" data-toggle="modal">Accessories</a></h4>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 featured-block" id="other"><a data-target="#form_prev" data-toggle="modal"><img src="../img/other.png" class="img-thumbnail"></a>
				    <h4><a data-target="#form_prev" data-toggle="modal">Other</a></h4>
				</div>
				
				<div class="col-md-1"></div>
			    </div>
			</div>
		    </div>
		</div> -->
	    </div>
	    

	    <!--------------------  From Preview Modal   --------------------->
	    <?php include '../common/bootsrap_model.php'; ?>

	    <!-- Start Site Footer -->
	    <?php include 'common/footer.php'; ?>
	    <!-- End Site Footer --> 

	    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuWch6HsB-2Xj_a7gr0VpM-JJNOrLdMtE&v=3.exp&sensor=false"></script> 
	  

	   
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
	<script>
		
	</script>
    </body>
</html>