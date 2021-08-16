<?php
if (!isset($_SESSION)) {
  session_start();
}
if (isset($_SESSION['email'])!= "") {
  header("Location: index.php");
  exit;
}
//$id = $_GET['id'];
//$id = $_GET['id'];
$id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');
$auto_id = htmlspecialchars(trim($_GET['auto_id']), ENT_QUOTES, 'UTF-8');
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
        <link rel="shortcut icon" href="wp-content/themes/real-spaces/images/favicon.ico" />
        <!-- CSS  ============ -->
        <link rel='stylesheet' id='imic_bootstrap-css'  href='wp-content/themes/real-spaces/css/bootstrap8a54.css?ver=1.0.0' type='text/css' media='all' />
        <link rel='stylesheet' id='imic_animations-css'  href='wp-content/themes/real-spaces/css/animations8a54.css?ver=1.0.0' type='text/css' media='all' />
        <link rel='stylesheet' id='imic_font_awesome-css'  href='wp-content/themes/real-spaces/css/font-awesome.min8a54.css?ver=1.0.0' type='text/css' media='all' />
        <link rel='stylesheet' id='imic_main-css'  href='wp-content/themes/real-spaces-child/style8a54.css?ver=1.0.0' type='text/css' media='all' />
        <script type='text/javascript' src='wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4'></script>
        <script type='text/javascript' src='wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>
    </head>

    <body>
        <div class="body"> 

            <!-- Start Site Header -->
	    <?php include 'common/header.php'; ?>
            <!-- End Site Header -->

            <!-- Site Showcase -->
            <div class="site-showcase"> 
                <!-- Start Page Header -->
                <div class="parallax page-header" style="background-image:url(img/login-banner.jpg);">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Login or Register</h1>
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
                                <div class="col-md-2"></div>
                                <div class="col-md-4 col-sm-4 registerform">
                                    <h3>Login</h3>
                                    <form id="login-form" method="post">

                                        <!-- json response will be here -->
                                        <div id="errorDiv1"></div>
                                        <!-- json response will be here -->

                                        <div class="form-group">
                                            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input class="form-control" id="loginname" type="text" name="login_name" placeholder="Email Address">

                                            </div>
                                            <input class="form-control" id="hidden_id" type="hidden" value="<?php echo $id; ?>" >
                                            <input class="form-control" id="hidden_auto_id" type="hidden" value="<?php echo $auto_id; ?>" >
                                            <span class="help-block" id="error_lg"></span>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                <input class="form-control" type="password" name="login_pw" placeholder="Password">

                                            </div>
                                            <span class="help-block" id="error_lg"></span>
                                        </div>
										<input class="submit_button btn btn-primary button2" type="submit" value="Login Now" id="btn-login"> 
										<a href="forgot_password.php">Fogot password?</a>                
                                    </form>
                                </div>

                                <div class="col-md-4 col-sm-4 register-form">
                                    <h3>Register</h3>
                                    <form method="post" id="registerform" name="registerform" class="register-form">
                                        <!-- json response will be here -->
                                        <div id="errorDiv"></div>
                                        <!-- json response will be here -->

                                        <div class="form-group">
                                            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input type="text" name="name"  class="form-control" placeholder="Name">      
                                            </div>
                                            <span class="help-block" id="error"></span>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                <input type="text" name="email" class="form-control" placeholder="Email Address">
                                            </div>
                                            <span class="help-block" id="error"></span>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                            </div>
                                            <span class="help-block" id="error"></span>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-repeat"></i></span>
                                                <input type="password" name="re_pwd" class="form-control" placeholder="Repeat Password">
                                            </div>
                                            <span class="help-block" id="error"></span>
                                        </div>
                                        <button type="submit" id="submit_btn" name="btn-signup" class="btn btn-primary">Register Now</button>
                                    </form>
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

        <script src="assets/jquery-1.12.4-jquery.min.js"></script>
        <script src="assets/bootstrap.min.js"></script>
        <script src="assets/jquery.validate.min.js"></script>

        <script>
	    // JavaScript Validation For Register Form 
	    $('document').ready(function ()
	    {
		// name validation
		var nameregex = /^[a-zA-Z ]+$/;

		$.validator.addMethod("validname", function (value, element) {
		    return this.optional(element) || nameregex.test(value);
		});

		// valid email pattern
		var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		$.validator.addMethod("validemail", function (value, element) {
		    return this.optional(element) || eregex.test(value);
		});

		$("#registerform").validate({
		    rules:
			    {
				password: {
				    required: true,
				    minlength: 6,
				    maxlength: 15
				},
				name: {
				    required: true,
				    validname: true,
				    minlength: 4
				},
				email: {
				    required: true,
				    validemail: true
				},
				re_pwd: {
				    required: true,
				    equalTo: '#password'
				}
			    },
		    messages:
			    {
				password: {
				    required: "Please Enter Password.",
				    minlength: "Password at least have 6 characters"
				},
				name: {
				    required: "Please Enter Your Name.",
				    validname: "Name must contain only alphabets and space",
				    minlength: "Your Name is Too Short"
				},
				email: {
				    required: "Please Enter Email Address.",
				    validemail: "Please Enter Valid Email Address"
				},
				re_pwd: {
				    required: "Please Retype Your Password.",
				    equalTo: "Passwords do not match!"
				}
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
		    submitHandler: submitForm
		});


		function submitForm() {

		    $.ajax({
			type: 'POST',
			async: false,
			url: 'register_user.php',
			data: $('#registerform').serialize(),
			dataType: 'json',
			success: function (data) {

			    $('button').html('Signing Up..').attr('disabled', 'disabled');

			    setTimeout(function () {

				if (data.status === 'ok') {

				    $('#errorDiv').slideDown(200, function () {
					$('#errorDiv').html('<div class="alert alert-info">' + data.message + '</div>');
					$('#errorDiv').delay(3000).slideUp(100);
					$("#registerform")[0].reset();
					$('#submit_btn').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Register Now');
					$('#submit_btn').removeAttr('disabled');
				    });
				} else {
				    $('#errorDiv').slideDown(200, function () {
					$('#errorDiv').html('<div class="alert alert-danger">' + data.message + '</div>');
					$('#errorDiv').delay(5000).slideUp(100);
					$('#submit_btn').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Register Now');
					$('#submit_btn').removeAttr('disabled');
				    });
				}

			    }, 1000);
			},
			error: function () {
			    alert('An unknown error occoured, Please try again Later...!')
			}
		    });
		    return false;
		}
	    });


	    ////////////////////////////////////////////////////////////


	    // JavaScript Validation For Login Page
	    $('document').ready(function ()
	    {
		$("#login-form").validate({
		    rules:
			    {
				login_name: {
				    required: true
				},
				login_pw: {
				    required: true
				}
			    },
		    messages:
			    {
				login_pw: {
				    required: "Password is Required.",
				},
				login_name: {
				    required: "Username is Required.",
				}
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
		    submitHandler: loginForm
		});


		function loginForm() {

		    $.ajax({
			url: 'login_fun.php',
			type: 'POST',
			data: $('#login-form').serialize(),
			dataType: 'json'
		    })
			    .done(function (data) {

				$('#btn-login').html('LOGIN...').prop('disabled', true);
				$('input[type=text],input[type=password]').prop('disabled', true);

				setTimeout(function () {

				    if (data.status === 'ok') {

					var id = $('#hidden_id').val();
					var auto_id = $('#hidden_auto_id').val();
					if (id === '') {
					    setTimeout('window.location.href = "post_ad/"; ', 3);
					}
					if (id !== '') {
					    setTimeout('window.location.href = "more_details.php?id=' + id + '"; ', 3);
					}
					if (id == '' && auto_id==22) {
					    setTimeout('window.location.href = "post_ad/"; ', 3);
					}
					if (id !== '' && auto_id==22) {
					    setTimeout('window.location.href = "wishlist.php?add_id=' + id + '"; ', 3);
					}
					

				    } else {

					$('#errorDiv1').slideDown('fast', function () {
					    $('#errorDiv1').html('<div class="alert alert-danger">' + data.message + '</div>');
					    // $("#login-form").trigger('reset');
					    $('input[type=text],input[type=password]').prop('disabled', false);
					    $('#btn-login').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; LOGIN').prop('disabled', false);
					}).delay(3000).slideUp('fast');
				    }

				}, 1000);

			    })
			    .fail(function () {
				$("#login-form").trigger('reset');
				alert('An unknown error occoured, Please try again Later...');
			    });
		}
	    });
        </script>

        <script type='text/javascript' src='wp-content/themes/real-spaces/plugins/prettyphoto/js/prettyphoto8a54.js?ver=1.0.0'></script> 
        <script type='text/javascript' src='wp-content/themes/real-spaces/plugins/flexslider/js/jquery.flexslider8a54.js?ver=1.0.0'></script> 
        <script type='text/javascript' src='wp-content/themes/real-spaces/js/helper-plugins8a54.js?ver=1.0.0'></script> 
        <script type='text/javascript' src='wp-content/themes/real-spaces/js/bootstrap8a54.js?ver=1.0.0'></script> 
        <script type='text/javascript'>
	    /* <![CDATA[ */
	    var urlajax = {"url": "", "tmpurl": "", "is_property": "", "sticky": "1", "is_contact": "", "home_url": "", "is_payment": "", "register_url": "", "is_register": "", "is_login": "", "is_submit_property": "", "basic": "Basic", "advanced": "Advanced"};
	    /* ]]> */
        </script> 
        <script type='text/javascript' src='wp-content/themes/real-spaces/js/init8a54.js?ver=1.0.0'></script> 
        <script type='text/javascript' src='wp-includes/js/jquery/ui/widget.mine899.js?ver=1.11.4'></script>

    </body>
</html>