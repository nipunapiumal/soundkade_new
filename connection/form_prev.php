<?php
include '../db/db.php';
if (!isset($_SESSION)) {
    session_start();
    //$log = $_SESSION['email'];
    $log = htmlspecialchars(trim($_SESSION['email']), ENT_QUOTES, 'UTF-8');
    $log2 = $_SESSION['fb_user_info']['email'];
    
    //$uid = $_SESSION['id'];
    $uid = htmlspecialchars(trim($_SESSION['id']), ENT_QUOTES, 'UTF-8');
    //$val = $_SESSION['val'];
    $val = htmlspecialchars(trim($_SESSION['val']), ENT_QUOTES, 'UTF-8');

    if ($val == 1 || $val == 3) {
	//$subcat = $_GET['subcat'];
	$subcat = htmlspecialchars(trim($_GET['subcat']), ENT_QUOTES, 'UTF-8');

	//$cat = $_GET['cat'];
	$cat = htmlspecialchars(trim($_GET['cat']), ENT_QUOTES, 'UTF-8');

	//$city = $_GET['city'];
	$city = htmlspecialchars(trim($_GET['city']), ENT_QUOTES, 'UTF-8');

	//$dist = $_GET['district'];
	$dist = htmlspecialchars(trim($_GET['district']), ENT_QUOTES, 'UTF-8');

	//$lat = $_GET['lat'];
	$lat = htmlspecialchars(trim($_GET['lat']), ENT_QUOTES, 'UTF-8');

	//$lng = $_GET['lng'];
	$lng = htmlspecialchars(trim($_GET['lng']), ENT_QUOTES, 'UTF-8');

	//$house = $_GET['house_no'];
	//$house = htmlspecialchars(trim($_GET['house_no']), ENT_QUOTES, 'UTF-8');

	//$street = $_GET['street'];
	//$street = htmlspecialchars(trim($_GET['street']), ENT_QUOTES, 'UTF-8');
	
// 		echo '<prev>';
//     	print_r($log2);
//     	print_r($val);
//     	die();   	


	if (empty($subcat)) {
	    header("Location: index.php");
	} else {

	    $sql = "SELECT
fields_map.field_id AS field_id,
form_fields.name AS field_name,
form_fields.`type` AS `type`,
fields_map.`order`
FROM
((fields_map)
Inner Join form_fields ON ((fields_map.field_id = form_fields.id))) where `fields_map`.`form_id` =" . $_GET['subcat'] . " ORDER BY
fields_map.`order` ASC";

	    $result = mysqli_query($conn, $sql);

	    $sqls = mysqli_fetch_assoc(mysqli_query($conn, "SELECT
sub_category.sub_category AS subcat,
main_category.category AS cat
FROM
sub_category
Inner Join main_category ON sub_category.cat_id = main_category.id
WHERE
sub_category.id =  '$subcat'
"));

	    $sqlc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT
city.city,
district.district
FROM
district
Inner Join city ON district.did = city.did
WHERE
city.cid =  '$city'"));
	}
    } else {
    //echo '<script>alert("Please login again")</script>';
	header("Location: ../login.php");
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
	<link rel='stylesheet' id='imic_main-css'  href='../wp-content/themes/real-spaces/style.css' type='text/css' media='all' />
	<link rel='stylesheet'   href='../post_ad/css/style.css' type='text/css' media='all' />


	<script type='text/javascript' src='../wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4'></script>
	<script type='text/javascript' src='../wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>
	<style>
	    .ace-file-multiple .ace-file-container {
		position: relative;
		height: auto;
		border: 1px dashed #AAA;
		border-radius: 4px;
		text-align: center;
	    }
	    .ace-file-input .ace-file-container {
		display: block;
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		height: 30px;
		background-color: #FFF;
		border: 1px solid #D5D5D5;
		cursor: pointer;
		-webkit-box-shadow: none;
		box-shadow: none;
		-webkit-transition: all .15s;
		-o-transition: all .15s;
		transition: all .15s;
	    }
	</style>
    </head>

    <body>
	<div class="body"> 
	    <!-- Start Site Header -->
	    <?php include '../post_ad/common/header.php'; ?>
	    <!-- End Site Header --> 

	    <!-- Site Showcase -->
	    <div class="site-showcase"> 
		<!-- Start Page Header -->
		<div class="parallax page-header" style="background-image:url(../post_ad/images/plain.jpg);">
		    <div class="container">
			<div class="row">
			    <div class="col-md-12">
				<h1 style="color:#222">
				   Sell  Anything 
				</h1>
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
			<div class="page">

			    <div class="row">
				<div class="col-md-12">
				    <h4><b>Category: </b><?php echo $sqls['cat']; ?> > <?php echo $sqls['subcat']; ?> <br>
					<b>Location: </b><?php echo $sqlc['district']; ?> > <?php echo $sqlc['city']; ?></h4>

				    <form enctype="multipart/form-data" method="post" id="form-upload">              
					<div class="col-md-6 col-sm-6">
					    <div class="submit-form">
						<h4>Fill in the Details</h4>
						<div class="margin-15"></div>

						<div class="form-group">
						    <label>Ad Name <span style="color:red ;class="required">*</span></label>
						    <div class="input-group"> <span class="input-group-addon"><i class="fa fa-check-square"></i></span>
							<input type="text" name="ad_name" class="form-control" required>
						    </div>
						    <span class="help-block" id="error_lg"></span>
						</div>
						<div class="margin-15"></div>

						<!--<div class="form-group">
						<label>Street</label>
						<div class="input-group"> <span class="input-group-addon"><i class="fa fa-edit"></i></span>
						  <input type="text" name="street" class="form-control">
						</div>
						<span class="help-block" id="error_lg"></span>
						</div>
						<div class="margin-15"></div>-->


						<?php
						$fname = array(); //echo $sql;			   
						while ($row = mysqli_fetch_array($result)) {
						    $fid = $row['field_id'];//get the field id for the $fid
						    if ($row['type'] == 'Select') {
							?>
							<div class="margin-15"></div>
							<label><?php echo $row['field_name']; ?></label>
							<div class="input-group"> <span class="input-group-addon"><i class="fa fa-check-square-o"></i></span>
							    <select class="form-control selectpicker" name="<?php echo $row['field_id']; ?>" id="<?php echo $row['field_id']; ?>" required="">
								<option></option>
								<?php
								$sqlt = mysqli_query($conn, "SELECT * FROM form_data where field_id='$fid' and form_id='$subcat'");
								while ($rowt = mysqli_fetch_array($sqlt)) {
								    ?>
	    							<option value="<?php echo $rowt['data']; ?>"><?php echo $rowt['data']; ?></option>
								<?php } ?>
							    </select>
							</div>
						    <?php } else if ($row['type'] == 'Text') { ?>
							<div class="margin-15"></div>
							<label><?php echo $row['field_name']; ?></label>
							<div class="input-group"> <span class="input-group-addon"><i class="fa fa-edit"></i></span>
							    <input type="text" name="<?php echo $row['field_id']; ?>" id="<?php echo $row['field_id']; ?>" class="form-control" required="">
							</div>
							<div class="margin-15"></div>
							<?php
						    }

                            if(isset($_POST[$row['field_id']])){
                                    $fname[$fid] = $_POST[$row['field_id']];
                            }

                            //$fname[$fid] = $_POST[$fid];
						}
						?>
						<input type="hidden" name="sub_cat" value="<?php echo $subcat; ?>">
						<input type="hidden" name="cat" value="<?php echo $cat; ?>" id="category">
						<input type="hidden" name="city" value="<?php echo $city; ?>">
						<input type="hidden" name="district" value="<?php echo $dist; ?>">
						<input type="hidden" name="uid" value="<?php echo $uid; ?>">
						<input type="hidden" name="lat" value="<?php echo $lat; ?>">
						<input type="hidden" name="lng" value="<?php echo $lng; ?>">
						<input type="hidden" name="house_no" value="<?php echo $house; ?>">
						<input type="hidden" name="street" value="<?php echo $street; ?>">

						<div class="margin-15"></div>
					    </div>
					</div>
					<div class="col-md-6 col-sm-6">
					    <div class="col-md-12">
						<div class="submit-form" id="udara">
						    <h4>Image Upload</h4>
                            <p>Please note that you can add upto 5 images</p>
						    <div class="margin-15"></div>
						    <div id="filediv">
							<input name="file[]" type="file" id="file" accept=".jpg,.png,.jpeg"/>
						    </div>
						    <input type="button" id="add_more" class="upload" value="Add More Images" />
						    <div class="margin-15"></div>
						</div>
					    </div>

					    <div class="col-md-12"> 
						<div class="margin-20"></div> 
						<div class="submit-form">
						    <h4>Contact Details</h4>
						    <div class="margin-15"></div>
						    <div class="form-group">
							<label>Mobile No <span style="color:red ;class="required">*</span></label>
							<div class="input-group"> <span class="input-group-addon"><i class="fa fa-phone"></i></span>    
							    <input type="text" name="contact_no" class="form-control" required>

							</div><span class="help-block" id="error_lg"></span>
						    </div>
						    <div class="margin-15"></div>
						</div>
					    </div>
					    <!------------------------------multiple select----------------------------------> 
					    <div class="col-md-12"> 
						<div class="margin-20"></div> 
						<div class="submit-form">
						    <h4>Recommendation</h4>
						    <div class="margin-15"></div>
						    <div class="form-group">
							<label>Recommended by</label>
							<ul id="transaction">
							   
							    
							    
							</ul>
						    </div>
						    <div class="margin-15"></div>
						</div>
					    </div>

					    <!------------------------------multiple select----------------------------------> 

					    <div class="col-md-12">
						<div class="margin-20"></div>
						<input type="submit" value="Post Ad" name="submit" id="upload" class="btn btn-primary pull-left"/>
					    </div>
					</div>
					<?php include "../post_ad/save_form_data.php"; ?>


					<!--<form enctype="multipart/form-data" method="post" id="form-upload">
					<div class="form-group">
						<label>Mobile No</label>
						<div class="input-group"> <span class="input-group-addon"><i class="fa fa-phone"></i></span>    
						  <input type="text" name="contact_no" class="form-control">
						  
						</div><span class="help-block" id="error_lg"></span>
						</div>
						
						<input type="submit" value="Post Ad" name="submit" id="upload" class="btn btn-primary pull-left"/>-->
				    </form>
				</div>
			    </div>
			</div>
		    </div>
		</div>
	    </div>

	    <!-- Start Site Footer -->
	    <?php //include '../common/footer.php'; ?>
	    <!-- End Site Footer --> 

	    <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a> 
	</div>



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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
        <script src="../post_ad/js/script.js"></script>


	<script src="../assets/bootstrap.min.js"></script>
	<script src="../assets/jquery.validate.min.js"></script>


	<script>
	   
	    // JavaScript Validation Form 
	    $('document').ready(function ()
	    {
	 load_transaction();	
	// contact no validation
		var telregex = /^\d{10}$/;

		$.validator.addMethod("validtel", function (value, element) {
		    return this.optional(element) || telregex.test(value);
		});

		$("#form-upload").validate({
		    rules:
			    {
				contact_no: {
				    required: true,
				    validtel: true,
				},
				ad_name: {
				    required: true,
				}/*,
				 street: {
				 required: true,
				 }*/
			    },
		    messages:
			    {
				contact_no: {
				    required: "Please Enter Your Contact No.",
				    validtel: "Invalid Contact Number"
				},
				ad_name: {
				    required: "Please Enter Ad Name"
				}/*,
				 street: {
				 required: "Please Enter Street"
				 }*/
			    },
		    errorPlacement: function (error, element) {
			$(element).closest('.form-group').find('.help-block').html(error.html());
		    },
		    highlight: function (element) {
			$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		    },
		    unhighlight: function (element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass('has-error');
			$(element).closest('.form-group').find('.help-block').html('');
		    },
		    //submitHandler: submitForm
		});


		
	    });

	</script>
	<script>
	    function load_transaction() {
		var category = $('#category').val();
		$.post('transaction_con.php', {'get_trans': 'data',category:category}, function (data) {
		    $("#transaction").html(data);
		});

	    }

/*        $('#add_more').click(function(){
            //var files = $('#file')[0].files;
            //alert($('#file')[0].files.length);
            //by default this udara div has 5 child elements. so 5+ 5 images = 10;
           if(document.getElementById("udara").childElementCount > 5){
                //alert("you can select max 2 files.");
                document.getElementById("add_more").disabled = true;
                //document.getElementById("add_more").disabled = true;
                //document.getElementById("add_more").style.display = "none";
            }
            else{
                //alert("correct, you have selected less than 10 files");
                document.getElementById("add_more").disabled = true;
            }
        });

        $('#file').change(function(){
            //alert("HI");
            //var files = $('#file')[0].files;
            //alert($('#file')[0].files.length);
            //by default this udara div has 5 child elements. so 5+ 5 images = 10;
           if(document.getElementById("udara").childElementCount > 5){
                //alert("you can select max 2 files.");
                document.getElementById("add_more").disabled = true;
                //document.getElementById("add_more").disabled = true;
                //document.getElementById("add_more").style.display = "none";
            }
            else{
                //alert("correct, you have selected less than 10 files");
                document.getElementById("add_more").disabled = false;
            }
        });*/

	</script>
    </body>
</html>