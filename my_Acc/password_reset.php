<?php
include '../db/db.php';
if (!isset($_SESSION)) {
    session_start();
    // $log = $_SESSION['email'];
    $log = htmlspecialchars(trim($_SESSION['email']), ENT_QUOTES, 'UTF-8');
    // $level = $_SESSION['val'];
    $level = htmlspecialchars(trim($_SESSION['val']), ENT_QUOTES, 'UTF-8');
    // $user = $_SESSION['user'];
    //$user = htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');

    if (empty($log)) {
	header("Location: ../login.php");
    } else {
	$sqlu = mysqli_query($conn, "SELECT * FROM customer_reg WHERE email='$log' and val='1'");
	if (mysqli_num_rows($sqlu) == 0) {
	    header("Location: ../logout.php");
	}
	date_default_timezone_set('Asia/Colombo');
	//$date = date("Y-m-d");


	
	//$date = '25-05-2012';
	//$date1 = $_POST['date1'];
	//$date2 = $_POST['date2'];

	//$var = "20/04/2012";
	 //$first_date=date("Y-m-d", strtotime($date1) );
	 //$second_date=date("Y-m-d", strtotime($date2) );
	 //echo $first_date;
	 //echo $second_date;


    }
}
?>
<!DOCTYPE HTML>
<html lang="en-US" class="no-js">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
	<!-- Basic Page Needs -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>MyBroker.lk</title>
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

	<!--data tables-->

	<!--<link rel='stylesheet'   href='data_table/datatables_bootsrap_min.css' type='text/css' media='all' />-->
	<!--<link rel='stylesheet'   href='data_table/bootsrap_min.css' type='text/css' media='all' />-->
	<link rel='stylesheet'   href='data_table/jquery.dataTables2.min.css' type='text/css' media='all' />

	<!--data tables-->


	<!--date-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">



	<!--date-->



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

			<!--date-->



			<!--date-->

			<div class="row">


					<?php include 'common_sidebar.php'; ?>   

					<!--START UDARA PART-->
					<h1>Reset Password</h1>
					 <div class="col-md-4">					    
						<div class="form-group"> 
						<label>Current Password:</label>
						<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> 
						    </span> 
						    <input placeholder="current password" type="password" class="form-control" id="currentpassword" autocomplete="false"/>
						</div>
						<span id="currentempty" style="display:none" class="formError"><font color="#F44336">Please Enter Current Password</font></span>
						<span id="currentwrong" style="display:none" class="formError"><font color="#F44336">Current Password you entered is wrong</font></span>

					    </div>						
						
					    <div class="form-group"> 
						<label>New Password:</label>
						<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> 
						    </span> 
						    <input placeholder="new password" type="password" class="form-control" id="newpassword" autocomplete="false"/>
						</div>
						<span id="newempty" style="display:none" class="formError"><font color="#F44336">Please Enter New Password</font></span>
						<span id="newwrong" style="display:none" class="formError"><font color="#F44336">Current password and new password are the same</font></span>
						<span id="newsize" style="display:none" class="formError"><font color="#F44336">Password must have at least 6 charactors</font></span>						

					    </div>						
						
					    <div class="form-group"> 
						<label>Confirm New Password:</label>
						<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> 
						    </span> 
						    <input placeholder="confirm new password" type="password" class="form-control" id="confirmpassword" autocomplete="false"/>
						</div>
						<span id="confirmempty" style="display:none" class="formError"><font color="#F44336">Please Enter Confirm Password</font></span>
						<span id="confirmwrong" style="display:none" class="formError"><font color="#F44336">This value must match with new password</font></span>

					    </div>

					    <div class="form-group"> 
						<button id="save"  class="btn btn-primary btn-sm"> 
						    Submit</button>
					    </div>						

					</div>

					<!--END UDARA PART-->





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
	<script type='text/javascript' src='data_table/jquery.js'></script>
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

	<!--data tables-->

	<!--<script type='text/javascript' src='data_table/jquery_datatables_bootsrap.js'></script>
	<script type='text/javascript' src='data_table/jquery_datatables_min.js'></script>-->
	<script type='text/javascript' src='data_table/jquery.dataTables2.min.js'></script>

	<!--data tables-->

	
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<!--Udara: you can also include sweetalets from cdn https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js -->
	
	
	<script src="common/sweetalert.min.js"></script>
	
	
	<script>

	    $(document).ready(function () {
		$('#myTable').DataTable();
		
		
		
		
	    });

	</script>
	<script>
	    $(function () {
		$("#datepicker1").datepicker();
		$("#datepicker2").datepicker();
	    });
		
	    function validate_inputs() {
			
			$('#currentempty').fadeOut();
			$('#currentwrong').fadeOut();
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
			
			if ($('#currentpassword').val().length == 0) {
				validate_ok = false;
				$('#currentempty').fadeIn();
			}
			else{//this means user has entered current password. Check if it's correct by comparing with database value
				var currentpassword = $('#currentpassword').val();
				$.post( "connection/pass_reset_con.php", { currentpassword: $('#currentpassword').val(), id: "<?php echo $_SESSION['id']; ?>" }, function( data ) {
					//alert( "Data Loaded: " + data );
					if(data =='0'){//this means current password is wrong
						//validate_ok = false;
						$('#currentwrong').fadeIn();
						//alert( "wrong pw");
					}
					else{//this means password is correct. at this point if other values are ok, we can submit new data to database
						if(validate_ok == true){
							//alert("validatation is correct");
							$.post( "connection/pass_reset_con.php", { newpassword: $('#newpassword').val(), id: "<?php echo $_SESSION['id']; ?>"}, function( data ) {
								//alert( "Data Loaded: " + data );
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
									if(validate_ok == true){
										
										swal({
										title: "Changed!",
										text: "Password Successfully Changed!",
										type: "success",
										confirmButtonText: "OK"
										}
										).then(function(){//reload the page after click ok 
											location.reload();
										});
										
										
									}						
								}


							});							
							
						}						
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