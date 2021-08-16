
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

	<!--Udara: you can also include sweetalets from cdn https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js -->
	<script src="my_Acc/common/sweetalert.min.js"></script>
	
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

			<?php
			if (array_key_exists('id', $_GET)) {
				$sql = "SELECT * FROM customer_reg WHERE id='".trim($_GET['id'])."' LIMIT 1";
				$result = mysqli_query($conn, $sql);

				if(mysqli_num_rows($result)> 0){//this means this user exists
					$row = mysqli_fetch_assoc($result);

                    if($row['activated'] == 1){
                        echo "<strong><font color='green'>Your account is already activated</font></strong>";
                    }
                    else if($row['activated'] == 2){
                        echo "<strong><font color='red'>Sorry!!. You are banned from using our website.</font></strong>";
                    }
                    else if($row['token'] != $_GET['activetoken']){
                        echo "<strong><font color='red'>Invalid Activation Token.</font></strong>";
                    }
                    else if($row['token'] == $_GET['activetoken'] && $row['activated'] == 0){
                       //trying to activate
                       $query = "UPDATE customer_reg SET activated=1 WHERE id=".trim($_GET['id'])." LIMIT 1";
                       if($result = mysqli_query($conn, $query)){
                             echo "<strong><font color='green'>Your account successfully activated. You can now log into our site and post ads</font></strong>";
                       }
                    }
                }
                else{
                     echo "<strong><font color='red'>Invalid User.</font></strong>";
                }

            }
			else{
				echo "<strong><font color='red'>What are you trying to do???? Asshole!!!</font></strong>";
			}


			?>

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
		
	    function validate_inputs() {
			
			$('#newempty').fadeOut();
			$('#confirmempty').fadeOut();
			$('#confirmwrong').fadeOut();
			
			
			var validate_ok = true;


			if ($('#newpassword').val().length == 0) {
				validate_ok = false;
				$('#newempty').fadeIn();
			}
			else if ($('#newpassword').val().length < 6) {
				validate_ok = false;
				$('#newsize').fadeIn();
			}
			else if ($('#newpassword').val() == $('#currentpassword').val()) {
				validate_ok = false;
				$('#newwrong').fadeIn();
				//display_error_msg();
				//scrollTo(0, 0);
				
			}

			if ($('#confirmpassword').val().length == 0) {
				validate_ok = false;
				$('#confirmempty').fadeIn();
			}
			else if ($('#newpassword').val() !== $('#confirmpassword').val()) {
				validate_ok = false;
				$('#confirmwrong').fadeIn();
				//display_error_msg();
				//scrollTo(0, 0);
				
			}
			

			
				
	
			;

					
						if(validate_ok == true){
							//alert("validatation is correct");
							$.post( "connection/pass_reset_con.php", { newpassword: $('#newpassword').val(), id: "<?php echo $row['cus_id']; ?>"}, function( data ) {
								//alert(data);
								if(data =='0'){//this means error adding to database
									//validate_ok = false;
									//$('#currentwrong').fadeIn();
									//alert( "wrong pw");
									//swal("Something Went Wrong", "Your Data could not added", "warning");
										swal({
										title: "Error!",
										text: "An Error occured while trying to change password!",
										type: "warning",
										confirmButtonText: "OK"
										});

												
								}
								else{//this means password change is successfull
									
										
										swal({
    										title: "Changed!",
    										text: "Password Successfully Changed!",
    										type: "success",
    										confirmButtonText: "OK"
										}
										).then(function() {
                                            window.location = "index.php";
                                        });
										
										
															
								}


							});							
							
						}						
					


			
			
	    }

		
		$("#save").click(function () {
			//alert("HI");
			validate_inputs();

			
		});
	</script>
</body>
</html>