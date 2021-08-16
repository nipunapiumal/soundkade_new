<?php
include '../db/db.php';
if (!isset($_SESSION)) {
    session_start();
    //$log = $_SESSION['email'];
    $log = htmlspecialchars(trim($_SESSION['email']), ENT_QUOTES, 'UTF-8');
    //$level = $_SESSION['val'];
    $level = htmlspecialchars(trim($_SESSION['val']), ENT_QUOTES, 'UTF-8');
   // $user = $_SESSION['user'];
    $user = htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');
    
    if (empty($log)) {
	header("Location: ../login.php");
    } else {
	$sqlu = mysqli_query($conn, "SELECT * FROM customer_reg WHERE email='$log' and val='1'");
	if (mysqli_num_rows($sqlu) == 0) {
	    header("Location: ../logout.php");
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
	<script type='text/javascript' src='../wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4'></script>
	<script type='text/javascript' src='../wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>
    </head>

    <body>
	<div class="body"> 

	    <!-- Start Site Header -->
	    <?php include '../post_ad/common/header.php'; ?>
	    <!-- End Site Header -->

	    <div role="main">
		<div id="content" class="content full">
		    <div class="container">
			<div class="row">
			     <div class="padding-tb45 bottom-blocks">
        <div class="container">
          <div class="row">
	      
	   <?php include 'common_sidebar.php'; ?>   
	      
          
            <div class="col-md-4 widget_popular_agent column">
             <!--<h3 class="">Popular Agent</h3>
              <a href="author/mia-kennedy/index.html"><img src="wp-content/uploads/2016/09/staff5.jpg" alt="" class="img-thumbnail"></a>-->
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <h4>ADD POST</h4>
                  <a href="../post_ad/" class="btn btn-danger btn-lg">POST YOUR ADD</a> </div>
               <!-- <div class="col-md-6 col-sm-6 col-xs-6">
                  <ul class="contact-info">
                    <li><i class="fa fa-phone"></i> 9999 8765 0231</li>
                    <li><i class="fa fa-envelope"></i> Mia@mail.com</li>
                  </ul>
                </div>-->
              </div>
            </div>
             <div class="col-md-4 widget_popular_agent column">
             <!--<h3 class="">Popular Agent</h3>
              <a href="author/mia-kennedy/index.html"><img src="wp-content/uploads/2016/09/staff5.jpg" alt="" class="img-thumbnail"></a>-->
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
		    <?php
						    $sql2 = "SELECT
SUM(customer_account.de) AS de,
SUM(customer_account.cr) AS cr,
customer_account.cus_code
FROM
customer_account  WHERE customer_account.cus_code='$log' GROUP BY customer_account.cus_code

";
						    //echo $sql2;
						    $result2 = mysqli_query($conn, $sql2);
						    $row2 = mysqli_fetch_array($result2);
						    $debit2 = $row2[0];
						    $credit2 = $row2[1];

						    $balance2 = ($debit2 - $credit2);
						    ?>
                  <h4>Available Balance</h4>
                  <input  class="form-control" id="balance" autocomplete="off" readonly="" value="Rs <?php echo $balance2; ?>/="/></div>
               <!-- <div class="col-md-6 col-sm-6 col-xs-6">
                  <ul class="contact-info">
                    <li><i class="fa fa-phone"></i> 9999 8765 0231</li>
                    <li><i class="fa fa-envelope"></i> Mia@mail.com</li>
                  </ul>
                </div>-->
              </div>
            </div>
          </div>
        </div>
      </div>
			    <!--<div class="col-md-12">
				<h2 align="center"><a href="../post_ad"><font color="#f25525">POST YOUR AD</font></a></h2>
				<hr>
				<div class="col-md-3"> <a href="rejected_ads.php" class="btn btn-danger">
					VIEW REJECTED ADS
				    </a>
				</div>
			    </div>-->
			</div>
		    </div>
		</div>
	    </div>

	    <!-- Start Site Footer -->
	    <?php include '../post_ad/common/footer.php'; ?>
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
    </body>
</html>