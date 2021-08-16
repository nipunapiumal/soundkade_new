<?php
include_once 'db/db.php';
if (!isset($_SESSION)) {
    session_start();
    // $log = $_SESSION['email'];
    $log = htmlspecialchars(trim($_SESSION['email']), ENT_QUOTES, 'UTF-8');
    //echo $log;
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
<link rel="shortcut icon" href="wp-content/themes/real-spaces/images/favicon.ico" />
<!-- CSS  ============ -->
<link rel='stylesheet' id='imic_bootstrap-css'  href='wp-content/themes/real-spaces/css/bootstrap8a54.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='imic_animations-css'  href='wp-content/themes/real-spaces/css/animations8a54.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='imic_font_awesome-css'  href='wp-content/themes/real-spaces/css/font-awesome.min8a54.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='imic_main-css'  href='wp-content/themes/real-spaces-child/style8a54.css?ver=1.0.0' type='text/css' media='all' />
<script type='text/javascript' src='wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4' defer></script>
<script type='text/javascript' src='wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1' defer></script>
<style>
h3.title {
	text-transform: uppercase;
	font-size: 20px;
	color: #f25525;
	font-weight: 500;
}
</style>
</head>

<body>
<div class="body"> 
  
  <!-- Start Site Header -->
  <?php include 'common/header.php'; ?>
  <!-- End Site Header -->
  
  <div class="site-showcase"> 
    <!-- Start Page Header -->
<!--	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4848.372459220356!2d79.91916587107276!3d6.900724474794783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae250aad6097f45%3A0x5ccd2669ee837f77!2s1112+Pannipitiya+Rd%2C+Sri+Jayawardenepura+Kotte!5e0!3m2!1sen!2slk!4v1516095601186" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>-->
    <!-- End Page Header --> 
  </div> 
  <div class="" role="">
    <div id="content" class="content full">
      <div class="container">
        <div class="row">

		
                      	<div class="col-md-6 col-sm-6">
                                       <h3>CONTACT US</h3>
              <div class="row">
              	                <form method="post" id="" name="contactform" class="contact-form" action="">
                  <div class="col-md-12 margin-15">
                    <div class="form-group">
                      <input type="text" id="name" name="name"  class="form-control input-lg" placeholder="Name*" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <input type="email" id="email" name="email"  class="form-control input-lg" placeholder="Email*" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <input type="text" id="phone" name="phone" class="form-control input-lg" placeholder="Phone" autocomplete="off">
                    </div>
					<div class="form-group">
                      <textarea cols="6" rows="5" id="comments" name="comments" class="form-control input-lg" placeholder="Message"></textarea>
                      <input id="submit" name="submit" type="" class="btn btn-primary btn-lg btn-block" value="Submit Now!">
                    </div>
                  </div>
 
                </form>
              </div>

              </div>
                <div class="col-md-6 col-sm-6">
                        <br><br>
            	
              	<div class="padding-as25 lgray-bg">
              		<h5><i class="fa fa-home"></i> &nbsp;ADDRESS</h5>
					<p>soundkade.lk<br />
                     No 20D,
Guildford Crescents
Colombo 07</p>
				   
				   <h5><i class="fa fa-phone"></i> &nbsp;CONTACT NUMBER</h5>
				   <p>0760970100</p>
				   
				   <h5><i class="fa fa-envelope"></i> &nbsp;EMAIL ADDRESS</h5>
				   <p>info@soundkade.lk</p>
				   
				   
				</div>                
          	            	</div>		
		
		
        </div>
      </div>
    </div>
  </div>
  
  <!-- Start Site Footer -->
  <?php include 'common/footer.php'; ?>
  <!-- End Site Footer --> 
  
  <?php include 'common/privacy_policy.php'; ?>
  
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
</body>
</html>