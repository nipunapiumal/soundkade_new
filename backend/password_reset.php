<?php
include "db/db.php";
if (!isset($_SESSION)) {
    session_start();
    //$level = $_SESSION['val'];
    $level = htmlspecialchars(trim($_SESSION['val']), ENT_QUOTES, 'UTF-8');

    if ($level == 1 || $level == 2 || $level == 3 || $level == 4) {
	
    } else {
	header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>EBroker</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<meta name="author" content="">
	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
	<!-- page specific plugin styles -->
	<!-- page specific plugin styles -->
	<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
	<link rel="stylesheet" href="assets/css/chosen.min.css" />
	<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
	<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
	<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" href="assets/css/bootstrap-colorpicker.min.css" />
	<!-- text fonts -->
	<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
	<!-- ace styles -->
	<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
	<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
	<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
	<link rel="stylesheet" href="assets/css/widget.css" />
	<script src="assets/js/ace-extra.min.js"></script>

	<link rel="stylesheet" href="bootstrap-sweetalert/lib/sweet-alert.css" />
	<script src="bootstrap-sweetalert/lib/sweet-alert.min.js"></script>

	<style>
	    .widget-header {
		border-bottom: none;
		padding-left: 5px;
	    }
	</style>
    </head>
    <body class="no-skin">
	<?php
	include 'common/nav_bar.php';
	?>
	<div class="main-container ace-save-state" id="main-container"> 
	    <script type="text/javascript">
		try {
		    ace.settings.loadState('main-container')
		} catch (e) {
		}
	    </script>
	    <!-- Side Bar -->
	    <div id="sidebar" class="sidebar responsive ace-save-state"> 
		<script type="text/javascript">
		    try {
			ace.settings.loadState('sidebar')
		    } catch (e) {
		    }
		</script>

		<!-- /.sidebar-shortcuts -->
		<?php
		include 'common/side_bar.php';
		?>
		<!-- /.nav-list -->
		<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse"> 
		    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i> 
		</div>
	    </div>

	    <!-- End Side Bar -->
	    <!-- /Start .main-content -->

	    <div class="main-content"> 
		<div class="main-content-inner"> 
		    <div class="breadcrumbs ace-save-state" id="breadcrumbs"> 
			<ul class="breadcrumb">
			    <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="#">Home</a> 
			    </li>
			</ul>
			<!-- /.breadcrumb -->
		    </div>
		    <!-- /Start .page-content -->
		    <div class="page-content"> 
			<div class="row"> 
			    <div class="col-xs-12"> 
				<!-- PAGE CONTENT BEGINS -->
				<div class="page-header"> 
				    <h1> Reset Password </h1>
				</div>
				<!-- /.page-header -->
				<!-- /Start .widget-box -->
				<div class="widget-box"> 
				    <div class="widget-body"> 
					<div class="widget-main"> 
					    <!-- Content -->
						
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
					    <!-- End Content -->
					</div>
				    </div>
				</div>
				<!-- /End .widget-box -->


				
				<!-- /.widget-body -->

				<!-- /.modal-dialog -->

				<!-- // Model -->
				<!-- /.widget-box -->
				<!-- PAGE CONTENT ENDS -->
			    </div>
			    <!-- /.col -->
			</div>
			<!-- /.row -->
		    </div>
		    <!-- /End .page-content -->
		</div></div>
	    <!-- /End .main-content -->
	    <div class="footer"> 
		<div class="footer-inner"> 
		    <div class="footer-content"> <span class=""> &copy; 2017 MyBroker.lk. All 
			    Rights Reserved. | Designed by <a href="http://cyclomax.net/" target="_blank">Cylcomax.</a></span> 
		    </div>
		</div>
	    </div>
	    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse"> <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i> 
	    </a> </div> 
	<!-- /.main-container -->
	<script src="assets/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript">
											if ('ontouchstart' in document.documentElement)
											    document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
	</script>
	<script src="assets/js/jquery-ui.custom.min.js"></script>
	<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
	<script src="assets/js/chosen.jquery.min.js"></script>
	<script src="assets/js/spinbox.min.js"></script>
	<script src="assets/js/bootstrap-datepicker.min.js"></script>
	<script src="assets/js/bootstrap-timepicker.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/daterangepicker.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
	<script src="assets/js/bootstrap-colorpicker.min.js"></script>
	<script src="assets/js/jquery.knob.min.js"></script>
	<script src="assets/js/autosize.min.js"></script>
	<script src="assets/js/jquery.inputlimiter.min.js"></script>
	<script src="assets/js/jquery.maskedinput.min.js"></script>
	<script src="assets/js/bootstrap-tag.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery-ui.custom.min.js"></script>
	<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
	<script src="assets/js/jquery.easypiechart.min.js"></script>
	<script src="assets/js/jquery.sparkline.index.min.js"></script>
	<script src="assets/js/jquery.flot.min.js"></script>
	<script src="assets/js/jquery.flot.pie.min.js"></script>
	<script src="assets/js/jquery.flot.resize.min.js"></script>
	<!-- ace scripts -->
	<script src="assets/js/ace-elements.min.js"></script>
	<script src="assets/js/ace.min.js"></script>
	<!-- page specific plugin scripts -->
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
	<script src="assets/js/dataTables.buttons.min.js"></script>
	<script src="assets/js/buttons.flash.min.js"></script>
	<script src="assets/js/buttons.html5.min.js"></script>
	<script src="assets/js/buttons.print.min.js"></script>
	<script src="assets/js/buttons.colVis.min.js"></script>
	<script src="assets/js/dataTables.select.min.js"></script>
	<!-- inline scripts related to this page -->
	<script type="text/javascript">

											jQuery(function ($) {
											    //initiate dataTables plugin
											    var myTable =
												    $('#dynamic-table')
												    //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
												    .DataTable({
													bAutoWidth: false,
													"aaSorting": [],
												    });

											})
	</script>
	<!-- inline scripts related to this page -->
	<script type="text/javascript">
	    jQuery(function ($) {
		$('#id-disable-check').on('click', function () {
		    var inp = $('#form-input-readonly').get(0);
		    if (inp.hasAttribute('disabled')) {
			inp.setAttribute('readonly', 'true');
			inp.removeAttribute('disabled');
			inp.value = "This text field is readonly!";
		    }
		    else {
			inp.setAttribute('disabled', 'disabled');
			inp.removeAttribute('readonly');
			inp.value = "This text field is disabled!";
		    }
		});


		if (!ace.vars['touch']) {
		    $('.chosen-select').chosen({allow_single_deselect: true});
		    //resize the chosen on window resize

		    $(window)
			    .off('resize.chosen')
			    .on('resize.chosen', function () {
				$('.chosen-select').each(function () {
				    var $this = $(this);
				    $this.next().css({'width': $this.parent().width()});
				})
			    }).trigger('resize.chosen');
		    //resize chosen on sidebar collapse/expand
		    $(document).on('settings.ace.chosen', function (e, event_name, event_val) {
			if (event_name != 'sidebar_collapsed')
			    return;
			$('.chosen-select').each(function () {
			    var $this = $(this);
			    $this.next().css({'width': $this.parent().width()});
			})
		    });


		    $('#chosen-multiple-style .btn').on('click', function (e) {
			var target = $(this).find('input[type=radio]');
			var which = parseInt(target.val());
			if (which == 2)
			    $('#form-field-select-4').addClass('tag-input-style');
			else
			    $('#form-field-select-4').removeClass('tag-input-style');
		    });
		}


		$('[data-rel=tooltip]').tooltip({container: 'body'});
		$('[data-rel=popover]').popover({container: 'body'});

		autosize($('textarea[class*=autosize]'));

		$('textarea.limited').inputlimiter({
		    remText: '%n character%s remaining...',
		    limitText: 'max allowed : %n.'
		});


		$.mask.definitions['~'] = '[+-]';
		$('.input-mask-date').mask('99/99/9999');
		$('.input-mask-phone').mask('(999) 999-9999');
		$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
		$(".input-mask-product").mask("a*-999-a999", {placeholder: " ", completed: function () {
			alert("You typed the following: " + this.val());
		    }});



		$("#input-size-slider").css('width', '200px').slider({
		    value: 1,
		    range: "min",
		    min: 1,
		    max: 8,
		    step: 1,
		    slide: function (event, ui) {
			var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
			var val = parseInt(ui.value);
			$('#form-field-4').attr('class', sizing[val]).attr('placeholder', '.' + sizing[val]);
		    }
		});

		$("#input-span-slider").slider({
		    value: 1,
		    range: "min",
		    min: 1,
		    max: 12,
		    step: 1,
		    slide: function (event, ui) {
			var val = parseInt(ui.value);
			$('#form-field-5').attr('class', 'col-xs-' + val).val('.col-xs-' + val);
		    }
		});



		//"jQuery UI Slider"
		//range slider tooltip example
		$("#slider-range").css('height', '200px').slider({
		    orientation: "vertical",
		    range: true,
		    min: 0,
		    max: 100,
		    values: [17, 67],
		    slide: function (event, ui) {
			var val = ui.values[$(ui.handle).index() - 1] + "";

			if (!ui.handle.firstChild) {
			    $("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
				    .prependTo(ui.handle);
			}
			$(ui.handle.firstChild).show().children().eq(1).text(val);
		    }
		}).find('span.ui-slider-handle').on('blur', function () {
		    $(this.firstChild).hide();
		});


		$("#slider-range-max").slider({
		    range: "max",
		    min: 1,
		    max: 10,
		    value: 2
		});

		$("#slider-eq > span").css({width: '90%', 'float': 'left', margin: '15px'}).each(function () {
		    // read initial values from markup and remove that
		    var value = parseInt($(this).text(), 10);
		    $(this).empty().slider({
			value: value,
			range: "min",
			animate: true

		    });
		});

		$("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item


		$('#id-input-file-1 , #id-input-file-2').ace_file_input({
		    no_file: 'No File ...',
		    btn_choose: 'Choose',
		    btn_change: 'Change',
		    droppable: false,
		    onchange: null,
		    thumbnail: false //| true | large
			    //whitelist:'gif|png|jpg|jpeg'
			    //blacklist:'exe|php'
			    //onchange:''
			    //
		});
		//pre-show a file name, for example a previously selected file
		//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])


		$('#id-input-file-3').ace_file_input({
		    style: 'well',
		    btn_choose: 'Drop files here or click to choose',
		    btn_change: null,
		    no_icon: 'ace-icon fa fa-cloud-upload',
		    droppable: true,
		    thumbnail: 'small'//large | fit
			    //,icon_remove:null//set null, to hide remove/reset button
			    /**,before_change:function(files, dropped) {
			     //Check an example below
			     //or examples/file-upload.html
			     return true;
			     }*/
			    /**,before_remove : function() {
			     return true;
			     }*/
		    ,
		    preview_error: function (filename, error_code) {
			//name of the file that failed
			//error_code values
			//1 = 'FILE_LOAD_FAILED',
			//2 = 'IMAGE_LOAD_FAILED',
			//3 = 'THUMBNAIL_FAILED'
			//alert(error_code);
		    }

		}).on('change', function () {
		    //console.log($(this).data('ace_input_files'));
		    //console.log($(this).data('ace_input_method'));
		});


		//$('#id-input-file-3')
		//.ace_file_input('show_file_list', [
		//{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
		//{type: 'file', name: 'hello.txt'}
		//]);




		//dynamically change allowed formats by changing allowExt && allowMime function
		$('#id-file-format').removeAttr('checked').on('change', function () {
		    var whitelist_ext, whitelist_mime;
		    var btn_choose
		    var no_icon
		    if (this.checked) {
			btn_choose = "Drop images here or click to choose";
			no_icon = "ace-icon fa fa-picture-o";

			whitelist_ext = ["jpeg", "jpg", "png", "gif", "bmp"];
			whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
		    }
		    else {
			btn_choose = "Drop files here or click to choose";
			no_icon = "ace-icon fa fa-cloud-upload";

			whitelist_ext = null;//all extensions are acceptable
			whitelist_mime = null;//all mimes are acceptable
		    }
		    var file_input = $('#id-input-file-3');
		    file_input
			    .ace_file_input('update_settings',
				    {
					'btn_choose': btn_choose,
					'no_icon': no_icon,
					'allowExt': whitelist_ext,
					'allowMime': whitelist_mime
				    })
		    file_input.ace_file_input('reset_input');

		    file_input
			    .off('file.error.ace')
			    .on('file.error.ace', function (e, info) {
				//console.log(info.file_count);//number of selected files
				//console.log(info.invalid_count);//number of invalid files
				//console.log(info.error_list);//a list of errors in the following format

				//info.error_count['ext']
				//info.error_count['mime']
				//info.error_count['size']

				//info.error_list['ext']  = [list of file names with invalid extension]
				//info.error_list['mime'] = [list of file names with invalid mimetype]
				//info.error_list['size'] = [list of file names with invalid size]


				/**
				 if( !info.dropped ) {
				 //perhapse reset file field if files have been selected, and there are invalid files among them
				 //when files are dropped, only valid files will be added to our file array
				 e.preventDefault();//it will rest input
				 }
				 */


				//if files have been selected (not dropped), you can choose to reset input
				//because browser keeps all selected files anyway and this cannot be changed
				//we can only reset file field to become empty again
				//on any case you still should check files with your server side script
				//because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
			    });


		    /**
		     file_input
		     .off('file.preview.ace')
		     .on('file.preview.ace', function(e, info) {
		     console.log(info.file.width);
		     console.log(info.file.height);
		     e.preventDefault();//to prevent preview
		     });
		     */

		});

		$('#spinner1').ace_spinner({value: 0, min: 0, max: 200, step: 10, btn_up_class: 'btn-info', btn_down_class: 'btn-info'})
			.closest('.ace-spinner')
			.on('changed.fu.spinbox', function () {
			    //console.log($('#spinner1').val())
			});
		$('#spinner2').ace_spinner({value: 0, min: 0, max: 10000, step: 100, touch_spinner: true, icon_up: 'ace-icon fa fa-caret-up bigger-110', icon_down: 'ace-icon fa fa-caret-down bigger-110'});
		$('#spinner3').ace_spinner({value: 0, min: -100, max: 100, step: 10, on_sides: true, icon_up: 'ace-icon fa fa-plus bigger-110', icon_down: 'ace-icon fa fa-minus bigger-110', btn_up_class: 'btn-success', btn_down_class: 'btn-danger'});
		$('#spinner4').ace_spinner({value: 0, min: -100, max: 100, step: 10, on_sides: true, icon_up: 'ace-icon fa fa-plus', icon_down: 'ace-icon fa fa-minus', btn_up_class: 'btn-purple', btn_down_class: 'btn-purple'});

		//$('#spinner1').ace_spinner('disable').ace_spinner('value', 11);
		//or
		//$('#spinner1').closest('.ace-spinner').spinner('disable').spinner('enable').spinner('value', 11);//disable, enable or change value
		//$('#spinner1').closest('.ace-spinner').spinner('value', 0);//reset to 0


		//datepicker plugin
		//link
		$('.date-picker').datepicker({
		    autoclose: true,
		    todayHighlight: true
		})
			//show datepicker when clicking on the icon
			.next().on(ace.click_event, function () {
		    $(this).prev().focus();
		});

		//or change it into a date range picker
		$('.input-daterange').datepicker({autoclose: true});


		//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
		$('input[name=date-range-picker]').daterangepicker({
		    'applyClass': 'btn-sm btn-success',
		    'cancelClass': 'btn-sm btn-default',
		    locale: {
			applyLabel: 'Apply',
			cancelLabel: 'Cancel',
		    }
		})
			.prev().on(ace.click_event, function () {
		    $(this).next().focus();
		});


		$('#timepicker1').timepicker({
		    minuteStep: 1,
		    showSeconds: true,
		    showMeridian: false,
		    disableFocus: true,
		    icons: {
			up: 'fa fa-chevron-up',
			down: 'fa fa-chevron-down'
		    }
		}).on('focus', function () {
		    $('#timepicker1').timepicker('showWidget');
		}).next().on(ace.click_event, function () {
		    $(this).prev().focus();
		});




		if (!ace.vars['old_ie'])
		    $('#date-timepicker1').datetimepicker({
			//format: 'MM/DD/YYYY h:mm:ss A',//use this option to display seconds
			icons: {
			    time: 'fa fa-clock-o',
			    date: 'fa fa-calendar',
			    up: 'fa fa-chevron-up',
			    down: 'fa fa-chevron-down',
			    previous: 'fa fa-chevron-left',
			    next: 'fa fa-chevron-right',
			    today: 'fa fa-arrows ',
			    clear: 'fa fa-trash',
			    close: 'fa fa-times'
			}
		    }).next().on(ace.click_event, function () {
			$(this).prev().focus();
		    });


		$('#colorpicker1').colorpicker();
		//$('.colorpicker').last().css('z-index', 2000);//if colorpicker is inside a modal, its z-index should be higher than modal'safe

		$('#simple-colorpicker-1').ace_colorpicker();
		//$('#simple-colorpicker-1').ace_colorpicker('pick', 2);//select 2nd color
		//$('#simple-colorpicker-1').ace_colorpicker('pick', '#fbe983');//select #fbe983 color
		//var picker = $('#simple-colorpicker-1').data('ace_colorpicker')
		//picker.pick('red', true);//insert the color if it doesn't exist


		$(".knob").knob();


		var tag_input = $('#form-field-tags');
		try {
		    tag_input.tag(
			    {
				placeholder: tag_input.attr('placeholder'),
				//enable typeahead by specifying the source array
				source: ace.vars['US_STATES'], //defined in ace.js >> ace.enable_search_ahead
				/**
				 //or fetch data from database, fetch those that match "query"
				 source: function(query, process) {
				 $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
				 .done(function(result_items){
				 process(result_items);
				 });
				 }
				 */
			    }
		    )

		    //programmatically add/remove a tag
		    var $tag_obj = $('#form-field-tags').data('tag');
		    $tag_obj.add('Programmatically Added');

		    var index = $tag_obj.inValues('some tag');
		    $tag_obj.remove(index);
		}
		catch (e) {
		    //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
		    tag_input.after('<textarea id="' + tag_input.attr('id') + '" name="' + tag_input.attr('name') + '" rows="3">' + tag_input.val() + '</textarea>').remove();
		    //autosize($('#form-field-tags'));
		}


		/////////
		$('#modal-form input[type=file]').ace_file_input({
		    style: 'well',
		    btn_choose: 'Drop files here or click to choose',
		    btn_change: null,
		    no_icon: 'ace-icon fa fa-cloud-upload',
		    droppable: true,
		    thumbnail: 'large'
		})

		//chosen plugin inside a modal will have a zero width because the select element is originally hidden
		//and its width cannot be determined.
		//so we set the width after modal is show
		$('#modal-form').on('shown.bs.modal', function () {
		    if (!ace.vars['touch']) {
			$(this).find('.chosen-container').each(function () {
			    $(this).find('a:first-child').css('width', '210px');
			    $(this).find('.chosen-drop').css('width', '210px');
			    $(this).find('.chosen-search input').css('width', '200px');
			});
		    }
		})
		/**
		 //or you can activate the chosen plugin after modal is shown
		 //this way select element becomes visible with dimensions and chosen works as expected
		 $('#modal-form').on('shown', function () {
		 $(this).find('.modal-chosen').chosen();
		 })
		 */



		$(document).one('ajaxloadstart.page', function (e) {
		    autosize.destroy('textarea[class*=autosize]')

		    $('.limiterBox,.autosizejs').remove();
		    $('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
		});

	    });

	    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	    load_district();

	    function save_info() {

		var district = $('#district').val();
		var city = $('#city').val();

		$.post('connection/city_con.php', {save_city: 'data', district: district, city: city}, //pass data to database
		function (data) {
		    if (data.msgType === 1) {
			swal("Added", "Successfully Added", "success");
			clear();
			/*setTimeout(function () {
			    swal({
				title: "Added!",
				text: "Successfully Added!",
				type: "success",
				confirmButtonText: "OK"
			    },
			    function (isConfirm) {
				if (isConfirm) {
				    window.location.href = "city.php";
				}
			    });
			}, 800);*/


		    } else {
			swal("Something Went Wrong", "Your Data could not added", "warning");
		    }

		}, "json");//result will encode and pass to view

	    }

	    function clear() {
		$('#district option:eq(0)').prop("selected", true);
		$('#city').val('');
	    }

	    function load_district() {

		$.post('connection/city_con.php', {'get_district': 'data'}, function (data) {
		    $("#district").html(data);
		});

	    }
	    /////////////////////////////////////////////////////////////////////////////validation////////////////////////////

	    $('#city').keyup(function () {
		city_exist_fun();
	    });




	    var city_exist = true;
	    function city_exist_fun() {
		$('#val_city_ext').fadeOut();
		var city = $('#city').val();
		$.post('connection/city_con.php', {city_exist: 'data', city: city},
		function (data) {
		    $.each(data, function (index, data) {
			if (data.city_count === "1") {
			    $('#val_city_ext').fadeIn();
			    city_exist = false;
			} else {
			    $('#val_city_ext').fadeOut();
			    city_exist = true;
			}
		    });
		}, "json");
	    }


	    function clear_validation_masg() {//clear all errror messages
		$('#val_city').fadeOut();
		$('#val_dist').fadeOut();

	    }

	    $('.form-control').focusin(function () {
		$('.formError').fadeOut();
	    });


	    //display for error msg when load validate_item function
	    function display_error_msg() {

		if ($('#dist').val() === 'Select District...') {
		    $('#val_dist').fadeIn();
		}
		if ($('#district').val() === '') {
		    $('#val_city').fadeIn();
		}
	    }



	    var validate_both = true;
	    function validate_both_fun() {
		if ($('#district').val() === 'Select District...') {
		    validate_both = false;
		    $('#val_dist').fadeIn();
		    display_error_msg();
		    scrollTo(0, 0);
		} else {
		    if ($('#city').val() === '') {
			validate_both = false;
			$('#val_city').fadeIn();
			display_error_msg();
			scrollTo(0, 0);
		    }

		    else {
			validate_both = true;
			clear_validation_masg();
		    }
		}
	    }




// START UDARA PART
	    
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

				
			}

			if ($('#confirmpassword').val().length == 0) {
				validate_ok = false;
				$('#confirmempty').fadeIn();
			}
			else if ($('#newpassword').val() !== $('#confirmpassword').val()) {
				validate_ok = false;
				$('#confirmwrong').fadeIn();

				
			}
			
			if ($('#currentpassword').val().length == 0) {
				validate_ok = false;
				$('#currentempty').fadeIn();
			}
			else{//this means user has entered current password. Check if it's correct by comparing with database value
				var currentpassword = $('#currentpassword').val();
				$.post( "connection/pass_reset_con.php", { currentpassword: $('#currentpassword').val(), user: "<?php echo $_SESSION['user']; ?>" }, function( data ) {
					alert(data);
					if(data =='0'){//this means current password is wrong
						//validate_ok = false;
						$('#currentwrong').fadeIn();
						alert(data);
					}
					else{//this means password is correct. at this point if other values are ok, we can submit new data to database
						if(validate_ok == true){
							//alert("validatation is correct");
							alert(data);
							$.post( "connection/pass_reset_con.php", { newpassword: $('#newpassword').val(), user: "<?php echo $_SESSION['user']; ?>" , id: "<?php echo $_SESSION['id']; ?>", val: "<?php echo $_SESSION['val']; ?>"}, function( data ) {
								//alert( "Data Loaded: " + data );
								if(data =='0'){//this means error adding to database

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
										});
										
									}						
								}


							});							
							
						}						
					}


				});
			}

			


			

	    }



	    $(function () {
		
		    $("#save").click(function () {

			validate_inputs();

		    });
		   

		
	    });
//END UDARA PART






	</script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>
</html>






