<?php
include_once 'db/db.php';
if (!isset($_SESSION)) {
    session_start();
    // $log = $_SESSION['email'];
    //$log = htmlspecialchars(trim($_SESSION['email']), ENT_QUOTES, 'UTF-8');
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
    <div class="parallax page-header" style="background-image:url(img/forgot-password-banner.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><font color="#000"></font></h1>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Header --> 
  </div>
  <div class="" role="">
    <div id="content" class="content full">
      <div class="container">
        <div class="row">
          <div class="col-md-12" id="content-col">
            <div class="row">
              <div class="col-md-4">
 
                                     <h3>Forgot Password</h3>
									<p>Please enter your registered email address to send password reset link</p>
   
                                        <div class="form-group">
                                            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                <input class="form-control" id="email" type="text" name="email" placeholder="Email Address">

                                            </div>
                                       
                                            <span class="help-block" id="error_lg"></span>
                                        </div>

                                        <div id="notify_area"></div>
										<br>
										<button id="save"  class="btn btn-primary btn-sm"> Send Reset Link</button>
 
              </div>

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

        <script src="assets/jquery-1.12.4-jquery.min.js"></script>
        <script src="assets/bootstrap.min.js"></script>
        <script src="assets/jquery.validate.min.js"></script>
		
	<script>
		
		function isEmail(email) {
		  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		  return regex.test(email);
		}
		
		
	    function validate_inputs() {
			

			
			
			var validate_ok = true;

			//alert(isEmail($('#email').val()));
				
			
			
			if ($('#email').val().length == 0) {
				validate_ok = false;
				//$('#newempty').fadeIn();
				$('#notify_area').html("<strong><font color='red'>Please fill email address field</font></strong>");
			}
			else if(isEmail($('#email').val()) == false){
				$('#notify_area').html("<strong><font color='red'>The value you entered is not a valid email</font></strong>");
			}
			else{//this means user has entered correct email. so we try to send a email with password reset link
				$('#notify_area').html("<strong><font color='green'>Sending email. Please wait</font></strong>");//display this until email sent

				$.post( "connection/forgot_password_con.php", { email: $('#email').val()}, function( data ) {
					//alert(  data );
					$('#notify_area').html(data);
					//alert(data);
				});
			}
			
	    }


		
		$("#save").click(function () {
			//alert("HI");
			validate_inputs();
			/*city_exist_fun();
			if (validate_both && city_exist) {
			    //save_info();
			}*/
			
		});
	</script>
</body>
</html>