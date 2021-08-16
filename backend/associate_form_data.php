<?php
include "db/db.php";
if (!isset($_SESSION)) {
    session_start();
    //$level = $_SESSION['val'];
    $level =htmlspecialchars(trim($_SESSION['val']), ENT_QUOTES, 'UTF-8');

    if ($level == 1) {
	
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
        <title>MyBroker.lk</title>
        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
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
        <link rel="stylesheet" href="bootstrap-sweetalert/lib/sweet-alert.css" />
        <script src="bootstrap-sweetalert/lib/sweet-alert.min.js"></script>

        <script src="assets/js/ace-extra.min.js"></script>
        <style>
            a:hover {
                text-decoration: none;
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
                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse"> <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i> </div>
            </div>
            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li> <a href="home.php">Home</a> </li>
                        </ul>
                    </div>
                    <div class="page-content"> 
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1> Associate Form Data </h1>
                        </div>
                        <!-- /.page-header --> 
                        <!-- body -->       
                        <div class="row">
                            <div class="col-xs-12">                        
                                <div class="widget-box">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <div class="form-group"> 
                                                <label>Select Main Category:</label>
                                                <select class="form-control" id="category">									
                                                </select>
                                                <span id="val_cat" style="display:none" class="formError"><font color="#F44336">Please Select Category</font></span>
                                            </div>					
                                            <div class="form-group">
                                                <label>Select Sub Category:</label>
                                                <select class="form-control" data-placeholder="Select Sub Category..." id="sub_category">
                                                    <option>Select Sub Category...</option>   
                                                </select>
                                                <span id="val_sub_cat" style="display:none" class="formError"><font color="#F44336">Please Select Sub Category</font></span>
                                            </div>								
                                        </div>
                                    </div>
                                </div>
                                <div class="space-6"></div>
                                <button class="btn btn-primary btn-xs" id="next"> NEXT </button>

                                <div class="space-6"></div>


                                <div id="form_tbl" style="display:none">
                                    <table id="simple-table" class="table  table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="center" width="10%"></th>
                                                <th>Field Name</th>
                                                <th>Type</th>
                                                <th>Order</th>
                                                <th>Add Data</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <button class="btn btn-danger btn-xs" id="btn-submit" style="width:80px"> SAVE </button>		  

                                        </div>
                                        <div class="col-md-1">
                                            <form action="form_preview.php" method="POST" target="_blank">
                                                <input type="text" id="preview" hidden="" name="preview">
                                                <button class="btn btn-primary btn-xs" id="view" > FORM PREVIEW </button>		  
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>		  
                        </div>
                        <br>
                        <!-- End body --> 

                        <!-- MODAL START -->
                        <!--<div id="asso_form" class="modal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="blue bigger">Add Default Data</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">					
                                            <div class="col-xs-12 col-sm-12">						
                                                <div class="space-4"></div>
                                                <div class="form-group">
                                                    <label>Default Values</label>
                                                    <div>
                                                        <input type="text" class="form-control" name="tags[]" id="form-field-tags" placeholder="Enter Values ..."/>
                                                    </div>
                                                </div>
                                                <div class="space-4"></div>						
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-xs btn-primary" id="save_data">ASSOCIATE DATA</button>
                                        <button class="btn btn-xs" data-dismiss="modal">CANCEL</button>						
                                    </div>
                                </div>
                            </div>
                        </div>--><!-- MODAL ENDS -->

                        <!----model start-->
                        <div class="modal fade" id="modalDefault1" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Field Data</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" class="form-control input-sm m-b-10" placeholder="please enter data"id="form-field-tags">
                                        <span id="val_model" style="display:none" class="formError"><font color="#F44336">Please Enter Field Data</font></span>

                                        <input type="text" class="form-control input-sm m-b-10" id="hidden_input" style="display:none"> <!--style="display:none"-->   

                                    </div>

                                    <div class="modal-footer">

                                       <!-- <button type="button" class="btn btn-success btn-xs" id="refresh" href="#modalDefault1" data-toggle="modal"><i class="ace-icon fa fa-refresh bigger-110"></i></button>-->
                                        <button type="button" class="btn btn-primary btn-xs "id="save_data">SAVE</button>
                                        <button type="button" class="btn btn-xs btn-danger" data-dismiss="modal" id="save_cancel">CANCEL</button>


                                        <div class="row">
                                            <br/>
                                            <table id="model_table" class="table  table-bordered table-hover">
                                                <thead>
                                                    <tr>

                                                        <th>Field data</th>

                                                        <th>Remove</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!----model end-->

                    </div>
                    <!-- /.page-content --> 
                </div>
            </div>
            <!-- /.main-content -->
            <div class="footer">
                <div class="footer-inner">
                    <div class="footer-content"> <span class=""> &copy; 2019 MyBroker.lk. All Rights Reserved. | Designed by <a href="http://cyclomax.net/" target="_blank">Cylcomax.</a></span> </div>
                </div>
            </div>
            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse"> <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i> </a> </div>

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


	    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	    load_category();

	    function load_category() {
		$.post('connection/asso_form_con.php', {'get_category': 'data'}, function (data) {
		    $("#category").html(data);
		});
	    }


	    $('#category').change(function () {
		var id = $(this).val();
		load_sub_category(id);
	    });


	    function load_sub_category(id) {
		$.post('connection/asso_form_con.php', {'get_sub_category': 'data', id: id}, function (data) {
		    $("#sub_category").html(data);
		});
	    }

	    //display for error msg when load validate_item function
	    function display_error_msg() {
		if ($('#category').val() === '') {
		    $('#val_cat').fadeIn();
		}
		if ($('#sub_category').val() === '') {
		    $('#val_sub_cat').fadeIn();
		}
	    }

	    function display_model_error_msg() {
		if ($('#form-field-tags').val() === '') {
		    $('#val_model').fadeIn();
		}

	    }

	    function clear_validation_msg() {
		$('#val_cat').fadeOut();
		$('#val_sub_cat').fadeOut();
		$('#val_model').fadeOut();

	    }

	    var validate_msg = true;

	    function validate_msg_fun() {
		if ($('#category').val() === '') {
		    validate_msg = false;
		    $('#val_cat').fadeIn();
		    display_error_msg();
		    $('#form_tbl').hide();
		    scrollTo(0, 0);

		} else {
		    if ($('#sub_category').val() === '') {
			validate_msg = false;
			$('#val_sub_cat').fadeIn();
			display_error_msg();
			$('#form_tbl').hide();
			scrollTo(0, 0);
		    }
		    else {
			validate_msg = true;
			clear_validation_msg();
		    }
		}
	    }


	    var validate_model_msg = true;

	    function validate_model_fun() {
		if ($('#form-field-tags').val() === '') {
		    validate_model_msg = false;
		    $('#val_model').fadeIn();
		    display_model_error_msg();

		    scrollTo(0, 0);


		} else {
		    validate_model_msg = true;
		    $('#val_model').fadeOut();
		    clear_validation_msg();
		}

	    }


	    $('.form-control').focusin(function () {
		$('.formError').fadeOut();
	    });

	    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	    $("#next").click(function () {

		$('#preview').val($('#sub_category').val());

		validate_msg_fun();
		if (validate_msg) {
		    display_table();
		}
	    });


	    /* $("#save_data").click(function () {
	     
	     model_table();
	     
	     });
	     
	     function model_table() {
	     $('#model_tbl').show();
	     load_model_data();
	     }*/

	    function display_table() {
		$('#form_tbl').show();
		load_table_data();
	    }

	    function load_table_data() {
		var tableData;
		var postData = {load_data: 'table'};//data pass to model
		$.post("connection/asso_form_con.php", postData, function (e) {
		    if (e === undefined || e.length === 0 || e === null) {//check values which comes from model
			tableData = '<tr><td> No Data Found in database </td></tr>';
			$('#simple-table tbody').html('').append(tableData);//data append to data table each coloums
		    } else {
			$.each(e, function (index, data) {
			    tableData += '<tr>';
			    tableData += '<td class="center"><input type="checkbox" class="check" name="field[]" value=' + data.id + ' id=t_' + data.id + '></td>';
			    tableData += '<td>' + data.name + '</td>';
			    tableData += '<td>' + data.type + '</td>';
			    tableData += '<td><input type="text"  class="order" name="order[]"  id=o_' + data.id + '></td>';
			    if (data.type === 'Select') {
				tableData += '<td><button class="btn btn-success btn-xs view_asso_form" value="' + data.id + '" href="#modalDefault1" data-toggle="modal" id=s_' + data.id + '>&nbsp;<i class="fa fa-plus"></i>&nbsp;</button></td>';
			    }
			    if (data.type === 'Text') {
				tableData += '<td></td>';
			    }
			    tableData += '</tr>';

			});
			//Load Json Data to Table
			$('#simple-table tbody').html('').append(tableData);
			$('.view_asso_form').hide();

			$('.order').hide();

			// Add Data to form fields
			$('.view_asso_form').click(function () {
			    var fid = $(this).val();
			    $('#hidden_input').val(fid);
			    var subcat = $('#sub_category').val();
			    load_model_data(fid, subcat);

			    // $.post("connection/asso_form_con.php", {add_data: 'upData', fid: fid}, function (up) {
			    // $.each(up, function (index, data) {				    
			    // $('#form-field-tags').val(data.data);
			    // });
			    // }, "json");




			});



			/*
			 var tag_input = $('#form-field-tags');
			 try {
			 tag_input.tag(
			 {
			 placeholder: tag_input.attr('placeholder'),
			 //enable typeahead by specifying the source array
			 //source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
			 /**
			 //or fetch data from database, fetch those that match "query"
			 source: function(query, process) {
			 $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
			 .done(function(result_items){
			 process(result_items);
			 });
			 }
			 */
			/*
			 }
			 )
			 
			 //programmatically add/remove a tag
			 var $tag_obj = $('#form-field-tags').data('tag');
			 //$tag_obj.add('Programmatically Added');
			 
			 var index = $tag_obj.inValues('some tag');
			 $tag_obj.remove(index);
			 }
			 catch (e) {
			 //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
			 tag_input.after('<textarea id="' + tag_input.attr('id') + '" name="' + tag_input.attr('name') + '" rows="3">' + tag_input.val() + '</textarea>').remove();
			 //autosize($('#form-field-tags'));
			 }*/

		    }
		    chk_fields();//checked check boxes when data table load


		    /* to check show input and checkboxes when checked*/
		    $("input[name='field[]']").click(function () {

			var add = $(this).val();
			if ($(this).is(':checked')) {
			    $('#s_' + add).show();
			    $('#o_' + add).show();

			} else {
			    $('#s_' + add).hide();
			    $('#o_' + add).hide();
			    $('#o_' + add).val('');//to hide order id for unchecked
			}

		    });




		}, "json");
	    }





	    $("#btn-submit").click(function () {

		save_info();
		//var add = $("input[name='field[]']").val();

		/*if(($(".check").is(':checked')) && ($(".order").val()!==0)){
		 
		 }*/
		/*if  ($("input[name='order[]']").val()==='' && $("input[name='field[]']").is(':checked')) {
		 swal("Order Number must be added", "Your Data could not added", "warning");
		 }*/

	    });


	    function chk_fields() {
		var subcat = $('#sub_category').val();

		$.post('connection/asso_form_con.php', {check_fields: 'upData', subcat: subcat}, function (data) {
		    for (var i = 0; i < data.length; i++) {
			$('#t_' + data[i].field_id).prop("checked", true);

			$('#s_' + data[i].field_id) /*&& ( data[i].type='select') )*/.show();

			$('#o_' + data[i].field_id).show();
			$('#o_' + data[i].field_id).val(data[i].order);//to show order number when load table
		    }
		}, "json");
	    }


	    function save_field_data() {

		//var fid = $('.view_asso_form').val();
		var fid = $('#hidden_input').val();
		var values = $('#form-field-tags').val();
		var subcat = $('#sub_category').val();

		//alert(fid);


		$('#form-field-tags').val('');

		$.post('connection/asso_form_con.php', {save_data: 'data', val: values, fid: fid, subcat: subcat}, //pass data to database

		function (data) {
		    if (data.msgType === 1) {
			swal("Added", "Successfully Added", "success");


			$('#modalDefault1').modal('hide');


		    } else {
			swal("Something Went Wrong", "Your Data could not added", "warning");
		    }
		    //load_model_data();
		    //$('#modalDefault1').removeData();
		    load_model_data();
		}, "json");
		//result will encode and pass to view
		// $("#modalDefault1").modal('show');
	    }




	    function save_info() {
		var subcat = $('#sub_category').val();

		var checked = [];
		$("input[name='field[]']:checked").each(function ()
		{
		    checked.push(parseInt($(this).val()));
		    //var add = $(this).val();
		    // $('#s_' + add).show();
		    //$('#o_' + add).show();
		});





		/*var order = {};
		 $(this).find("input").each(function () {
		 order[$(this)] = $(this).val();
		 });*/
		/*var order = []
		 $("input[name='order']").each(function ()
		 {
		 // push(parseInt($(this).val())); 
		 });*/






		/*
		 var order = [];
		 
		 $("input[name='order[]']").not("input[name='field[]']:checked,false").each(function () {
		 order.push($(this).val());
		 });*/


		var order = [];

		$("input[name='order[]']").each(function () {
		    var check = $(this).val();
		    if (check !== '') {
			order.push($(this).val());
		    }
		});




///////////////////////////////////////2D array/////////////////////
		/*  var checked = [];
		 
		 $("input[name='field[]']:checked").each(function () {
		 
		 var order = [];
		 
		 $("input[name='order[]']").each(function () {
		 order.push($(this).val());
		 });
		 
		 checked.push(order);
		 });*/

//////////////////////////////////2D array///////////////////////////////////





		$.post('connection/asso_form_con.php', {'fields_map': 'data', subcat: subcat, field: checked, order: order},
		function (data) {
		    if (data.msgType === 1) {
			swal("Added", "Successfully Added", "success");
			// $('#btn-view').removeClass("hidden");
		    } else {
			swal("Something Went Wrong", "Your Data could not added", "warning");
		    }
		}, "json");
	    }


	    function load_model_data(fid, subcat) {
		//var hidden_input = $('#hidden_input').val();
		var tableData;
		var postData = {load_model_data: 'table', fid: fid, subcat: subcat};//data pass to model
		$.post("connection/asso_form_con.php", postData, function (e) {
		    if (e === undefined || e.length === 0 || e === null) {//check values which comes from model
			tableData = '<tr><td colspan="2" align="left"> No Data Found in database </td></tr>';
			$('#model_table tbody').html('').append(tableData);//data append to data table each coloums
		    } else {
			$.each(e, function (index, data) {
			    tableData += '<tr>';
			    tableData += '<td align="left">' + data.data + '</td>';
			    tableData += '<td align="left"> <button class="btn btn-danger btn-minier ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only delete_com" value="' + data.id + '"><i class="ace-icon fa fa-trash-o bigger-110"></i>Delete</button> ';

			    tableData += '</tr>';
			});
			//Load Json Data to Table
			$('#model_table tbody').html('').append(tableData);


			$('.delete_com').click(function () {   //when press Delete button in the table
			    // $('#did').val($(this).val());
			    console.log(id_for_delete = $(this).val());
			    swal({
				title: "Are you sure?",
				text: "You will not be able to recover this data!",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, delete it!",
				closeOnConfirm: false
			    }, function () {

				$.post("connection/asso_form_con.php", {delete_data: 'delete', id_for_delete: id_for_delete}, function (delMsg) {//delete item
				    $.each(delMsg, function (index, valueDel) {
					if (valueDel.msgType === 1) {
					    swal("Deleted!", "Data been deleted successfully ", "success");
					} else if (valueDel.msgType === 2) {
					    swal("Something Went Wrong", "Your Data could not Deleted", "warning");
					}
				    });
				    load_model_data();
				    $('#modalDefault1').modal('hide');
				}, "json");

			    });
			});


		    }


		}, "json");
	    }


	    $(function () {

		$("#save_data").click(function () {
		    validate_model_fun();
		    if (validate_model_msg) {

			save_field_data();
			//load_model_data();
		    }

		});

		/* $("#refresh").click(function () {
		 load_model_data();
		 
		 });*/

	    });



        </script>

    </body>
</html>

