
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>soundkade.lk</title>
<meta name="description" content="sounkade.lk" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

<!-- bootstrap & fontawesome -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
<!-- text fonts -->
<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
<!-- ace styles -->
<link rel="stylesheet" href="assets/css/ace.min.css" />
<style>
.img-responsive {
	display:inline;	
}
</style>
</head>

<body class="login-layout light-login">
<div class="main-container">
  <div class="main-content">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="login-container">
          <div class="space-20"></div>
          <div class="center">
            <a href="../index.php"><img src="img/logo.png" alt="soundkade.lk" title="soundkade.lk" class="img-responsive"></a>
          </div>
          <div class="position-relative">
            <div id="login-box" class="login-box visible widget-box no-border">
              <div class="widget-body">
                <div class="widget-main">
                  <h4 class="header blue lighter bigger"> ADMINISTRATOR LOGIN </h4>
                  <div class="space-6"></div>
                  
                  <form id="login-form" method="post">
                    <fieldset>
                      
                      <!-- json response will be here -->
                      <div id="errorDiv"></div>
                      <!-- json response will be here -->
                      <div class="space-6"></div>
                      <label class="form-group block clearfix"> <span class="block input-icon input-icon-right">
                        <input type="text" class="form-control" placeholder="Username" name="user" autofocus/>
                        <i class="ace-icon fa fa-user"></i> </span>
                        <span class="help-block" id="error"></span>
                      </label>
                      
                      <label class="form-group block clearfix"> <span class="block input-icon input-icon-right">
                        <input type="password" class="form-control" placeholder="Password" name="password"/>
                        <i class="ace-icon fa fa-lock"></i> </span> 
                        <span class="help-block" id="error"></span>
                      </label>
                      
                      <div class="space"></div>
                      
                      <div class="clearfix">
                        <button class="width-35 pull-right btn btn-xs btn-primary" type="submit" id="btn-login"> 
                        <i class="ace-icon fa fa-key"></i> <span class="bigger-110">LOGIN</span> </button>
                      </div>
                      
                      <div class="space-4"></div>
                    </fieldset>
                  </form>
                  <div class="space-6"></div>
                </div>
                <!-- /.widget-main -->
              </div>
              <!-- /.widget-body --> 
            </div>
            <!-- /.login-box -->
          </div>
          <!-- /.position-relative -->
        </div>
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
  </div>
  <!-- /.main-content --> 
</div>
<!-- /.main-container --> 

<script src="assets/jquery-1.12.4-jquery.min.js"></script>
<script src="assets/bootstrap.min.js"></script>
<script src="assets/jquery.validate.min.js"></script>

<script>
// JavaScript Validation For Login Page
$('document').ready(function()
{ 		 
   $("#login-form").validate({
			  
	rules:
	{	
		  password: {
			  required: true
		  },
		  user: {
			  required: true
		  }
	 },
	 messages:
	 {
		  
		  password: {
			  required: "Password is Required.",
		  },
		  user: {
			  required: "Username is Required.",
		  }
	 },
	 errorPlacement : function(error, element) {
		$(element).closest('.form-group').find('.help-block').html(error.html());
	 },
	 highlight : function(element) {
		$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
	 },
	 unhighlight: function(element, errorClass, validClass) {
		$(element).closest('.form-group').removeClass('has-error');
		$(element).closest('.form-group').find('.help-block').html('');
	 },
		  submitHandler: loginForm
	}); 

	 
	function loginForm(){
		 
	   $.ajax({
			  url: 'login_fun.php',
			  type: 'POST',
			  data: $('#login-form').serialize(),
			  dataType: 'json'
		 })
		 .done(function(data){
			  
			  $('#btn-login').html('LOGIN...').prop('disabled', true);
			  $('input[type=text],input[type=password]').prop('disabled', true);
			  
			  setTimeout(function(){
							 
				  if ( data.status==='ok' ) {
			  
				  setTimeout('window.location.href = "home.php"; ',3);
					  
								 
				  } else {
								 
					  $('#errorDiv').slideDown('fast', function(){
						  $('#errorDiv').html('<div class="alert alert-danger">'+data.message+'</div>');
						  $("#login-form").trigger('reset');
						  $('input[type=text],input[type=password]').prop('disabled', false);
						  $('#btn-login').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; LOGIN').prop('disabled', false);
					  }).delay(3000).slideUp('fast');
				  }
							
			  },1000);
			  
		 })
		 .fail(function(){
			  $("#login-form").trigger('reset');
			  alert('An unknown error occoured, Please try again Later...');
		 });
	  }
});
</script>

<!-- basic scripts --> 
<!--[if !IE]> 
<script src="assets/js/jquery-2.1.4.min.js"></script>-->
<script type="text/javascript">
if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script> 
</body>
</html>