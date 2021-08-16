<?php
include "db/db.php";
if (!isset($_SESSION)) {
    session_start();
    //$level = $_SESSION['val'];
    $level = htmlspecialchars(trim($_SESSION['val']), ENT_QUOTES, 'UTF-8');
    //$name = $_SESSION['user'];
    $name = htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');
    //echo $name;

    if (empty($level)) {
	header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta charset="utf-8"/>
	<title>EBroker</title>
	<meta name="description" content=""/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
	<meta name="author" content="">

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="assets/css/ionicons.min.css"/>
	<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css"/>
	<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style"/>
	<link rel="stylesheet" href="assets/css/ace-skins.min.css"/>
	<link rel="stylesheet" href="assets/css/ace-rtl.min.css"/>
	<script src="assets/js/ace-extra.min.js"></script>





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

		<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse"><i id="sidebar-toggle-icon"
										      class="ace-icon fa fa-angle-double-left ace-save-state"
										      data-icon1="ace-icon fa fa-angle-double-left"
										      data-icon2="ace-icon fa fa-angle-double-right"></i> </div>
	    </div>
	    <div class="main-content">
		<div class="main-content-inner">
		    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
			    <li><i class="ace-icon fa fa-home home-icon"></i> <a href="#">Home</a></li>
			    <li class="active">Dashboard</li>
			</ul>
			<!-- /.breadcrumb -->

			<div class="nav-search" id="nav-search">
			    <form class="form-search">
				<span class="input-icon">
				    <input type="text" placeholder="Search ..." class="nav-search-input"
                                           id="nav-search-input" autocomplete="off"/>
				    <i class="ace-icon fa fa-search nav-search-icon"></i> </span>
			    </form>
			</div>

			<!-- /.nav-search --> 
		    </div>
		    <div class="page-content">
			<div class="ace-settings-container" id="ace-settings-container">
			    <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn"><i
				    class="ace-icon fa fa-cog bigger-130"></i></div>
			    <div class="ace-settings-box clearfix" id="ace-settings-box">
				<div class="pull-left width-50">
				    <div class="ace-settings-item">
					<div class="pull-left">
					    <select id="skin-colorpicker" class="hide">
						<option data-skin="no-skin" value="#438EB9">#438EB9</option>
						<option data-skin="skin-1" value="#222A2D">#222A2D</option>
						<option data-skin="skin-2" value="#C6487E">#C6487E</option>
						<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
					    </select>
					</div>
					<span>&nbsp; Choose Skin</span></div>
				    <div class="ace-settings-item">
					<input type="checkbox" class="ace ace-checkbox-2 ace-save-state"
					       id="ace-settings-navbar" autocomplete="off"/>
					<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
				    </div>
				    <div class="ace-settings-item">
					<input type="checkbox" class="ace ace-checkbox-2 ace-save-state"
					       id="ace-settings-sidebar" autocomplete="off"/>
					<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
				    </div>
				    <div class="ace-settings-item">
					<input type="checkbox" class="ace ace-checkbox-2 ace-save-state"
					       id="ace-settings-breadcrumbs" autocomplete="off"/>
					<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
				    </div>
				    <div class="ace-settings-item">
					<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl"
					       autocomplete="off"/>
					<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
				    </div>
				    <div class="ace-settings-item">
					<input type="checkbox" class="ace ace-checkbox-2 ace-save-state"
					       id="ace-settings-add-container" autocomplete="off"/>
					<label class="lbl" for="ace-settings-add-container"> Inside <b>.container</b> </label>
				    </div>
				</div>
				<!-- /.pull-left -->

				<div class="pull-left width-50">
				    <div class="ace-settings-item">
					<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover"
					       autocomplete="off"/>
					<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
				    </div>
				    <div class="ace-settings-item">
					<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact"
					       autocomplete="off"/>
					<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
				    </div>
				    <div class="ace-settings-item">
					<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight"
					       autocomplete="off"/>
					<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
				    </div>
				</div>
				<!-- /.pull-left --> 
			    </div>
			    <!-- /.ace-settings-box --> 
			</div>
			<!-- /.ace-settings-container -->
			<div class="row">

			    <div class="col-md-4 ">	
				<?php
				if ($level == 1) {
				    echo'
				<a class="btn btn-success btn-lg" href="admin_fun_trans.php">Top up RBO</a>
				';
				}
				?>



				<?php
				if ($level == 3) {
				    echo'
				<!--<div class="row">
				<div class="col-md-6">
				<a class="btn btn-success " href="ebroker2broker_fun_trans.php">Top up Broker</a>
				</div>
				
				<div class="col-md-6">
				<a class="btn btn-success " href="e_bro_fun_trans.php">Top up Customer</a>
				</div>
				</div>-->
				';
				}
				?>

			    </div>



			    <?php
			    $sql2 = "SELECT
`user`.`user`,
erbo_register.u_name,
erbo_register.erbo_id,
ebro_account.ebro_id,
SUM(ebro_account.de) AS debit,
SUM(ebro_account.cr) AS credit
FROM
`user`
Inner Join erbo_register ON `user`.`user` = erbo_register.u_name
Inner Join ebro_account ON erbo_register.erbo_id = ebro_account.ebro_id WHERE 	`user`.`user`='$name'

";
			    $result2 = mysqli_query($conn, $sql2);
			    $row2 = mysqli_fetch_array($result2);
			    $debit2 = $row2[4];
			    $credit2 = $row2[5];

			    $balance2 = ($debit2 - $credit2);
			    ?>

                            <div class="col-md-4 ">


				<?php
				if ($level == 3) {
				    echo'
				<!--Cash Balance E-Broker:<input  type="text" id="rec_no" value="Rs-->  ';
				}
				?><?php
				if ($level == 3) {
				    //echo $balance2;
				}
				?><?php
				if ($level == 3) {
				    echo'<!--/="/>-->
			   ';
				}
				?>
			    </div> 




			</div>
			<!-- /.page-header -->


			<?php
			if ($level == 1) {
			    include 'admin_dashboard.php';
			}
			?>
			<?php
			if ($level == 2) {
			    include 'RBO_dashboard.php';
			}
			?>
			<?php
			if ($level == 3) {
			    include 'e_broker_dashboard.php';
			}
			?>
			<?php
			if ($level == 4) {
			    include 'consultant_dashboard.php';
			}
			?>




			<!-- /.row --> 
		    </div>
		    <!-- /.page-content --> 
		</div>
	    </div>
	    <!-- /.main-content -->

	    <div class="footer">
		<div class="footer-inner">
		    <div class="footer-content"> <span class=""> &copy; 2017 MyBroker.lk. All Rights Reserved. | Designed by <a href="http://cyclomax.net/" target="_blank">Cylcomax.</a></span> </div>
		</div>
	    </div>
	    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse"> <i
		    class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i> </a></div>
	<!-- /.main-container --> 

	<!--model start  -->

	<?php include '../common/bootsrap_model.php'; ?>

	<!--model end  -->

	<!--[if !IE]> -->
	<script src="assets/js/jquery-2.1.4.min.js"></script>

	<!-- <![endif]--> 

	<!--[if IE]>
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<![endif]--> 
	<script type="text/javascript">
		    if ('ontouchstart' in document.documentElement)
			document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
	</script> 
	<script src="assets/js/bootstrap.min.js"></script> 

	<!-- page specific plugin scripts --> 

	<!--[if lte IE 8]>
	<script src="assets/js/excanvas.min.js"></script>
	<![endif]--> 
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
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


	<script type="text/javascript">

	    jQuery(function ($) {
		//initiate dataTables plugin
		var myTable =
			$('#dynamic-table_second')
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
		$('.easy-pie-chart.percentage').each(function () {
		    var $box = $(this).closest('.infobox');
		    var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
		    var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
		    var size = parseInt($(this).data('size')) || 50;
		    $(this).easyPieChart({
			barColor: barColor,
			trackColor: trackColor,
			scaleColor: false,
			lineCap: 'butt',
			lineWidth: parseInt(size / 10),
			animate: ace.vars['old_ie'] ? false : 1000,
			size: size
		    });
		})

		$('.sparkline').each(function () {
		    var $box = $(this).closest('.infobox');
		    var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
		    $(this).sparkline('html',
			    {
				tagValuesAttribute: 'data-values',
				type: 'bar',
				barColor: barColor,
				chartRangeMin: $(this).data('min') || 0
			    });
		});


		//flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
		//but sometimes it brings up errors with normal resize event handlers
		$.resize.throttleWindow = false;

		var placeholder = $('#piechart-placeholder').css({'width': '90%', 'min-height': '150px'});
		var data = [
		    {label: "social networks", data: 38.7, color: "#68BC31"},
		    {label: "search engines", data: 24.5, color: "#2091CF"},
		    {label: "ad campaigns", data: 8.2, color: "#AF4E96"},
		    {label: "direct traffic", data: 18.6, color: "#DA5430"},
		    {label: "other", data: 10, color: "#FEE074"}
		]

		function drawPieChart(placeholder, data, position) {
		    $.plot(placeholder, data, {
			series: {
			    pie: {
				show: true,
				tilt: 0.8,
				highlight: {
				    opacity: 0.25
				},
				stroke: {
				    color: '#fff',
				    width: 2
				},
				startAngle: 2
			    }
			},
			legend: {
			    show: true,
			    position: position || "ne",
			    labelBoxBorderColor: null,
			    margin: [-30, 15]
			}
			,
			grid: {
			    hoverable: true,
			    clickable: true
			}
		    })
		}

		drawPieChart(placeholder, data);

		/**
		 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
		 so that's not needed actually.
		 */
		placeholder.data('chart', data);
		placeholder.data('draw', drawPieChart);


		//pie chart tooltip example
		var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
		var previousPoint = null;

		placeholder.on('plothover', function (event, pos, item) {
		    if (item) {
			if (previousPoint != item.seriesIndex) {
			    previousPoint = item.seriesIndex;
			    var tip = item.series['label'] + " : " + item.series['percent'] + '%';
			    $tooltip.show().children(0).text(tip);
			}
			$tooltip.css({top: pos.pageY + 10, left: pos.pageX + 10});
		    } else {
			$tooltip.hide();
			previousPoint = null;
		    }

		});

		/////////////////////////////////////
		$(document).one('ajaxloadstart.page', function (e) {
		    $tooltip.remove();
		});


		var d1 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.5) {
		    d1.push([i, Math.sin(i)]);
		}

		var d2 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.5) {
		    d2.push([i, Math.cos(i)]);
		}

		var d3 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.2) {
		    d3.push([i, Math.tan(i)]);
		}


		var sales_charts = $('#sales-charts').css({'width': '100%', 'height': '220px'});
		$.plot("#sales-charts", [
		    {label: "Domains", data: d1},
		    {label: "Hosting", data: d2},
		    {label: "Services", data: d3}
		], {
		    hoverable: true,
		    shadowSize: 0,
		    series: {
			lines: {show: true},
			points: {show: true}
		    },
		    xaxis: {
			tickLength: 0
		    },
		    yaxis: {
			ticks: 10,
			min: -2,
			max: 2,
			tickDecimals: 3
		    },
		    grid: {
			backgroundColor: {colors: ["#fff", "#fff"]},
			borderWidth: 1,
			borderColor: '#555'
		    }
		});


		$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
		function tooltip_placement(context, source) {
		    var $source = $(source);
		    var $parent = $source.closest('.tab-content')
		    var off1 = $parent.offset();
		    var w1 = $parent.width();

		    var off2 = $source.offset();
		    //var w2 = $source.width();

		    if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2))
			return 'right';
		    return 'left';
		}


		$('.dialogs,.comments').ace_scroll({
		    size: 300
		});


		//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
		//so disable dragging when clicking on label
		var agent = navigator.userAgent.toLowerCase();
		if (ace.vars['touch'] && ace.vars['android']) {
		    $('#tasks').on('touchstart', function (e) {
			var li = $(e.target).closest('#tasks li');
			if (li.length == 0)
			    return;
			var label = li.find('label.inline').get(0);
			if (label == e.target || $.contains(label, e.target))
			    e.stopImmediatePropagation();
		    });
		}

		$('#tasks').sortable({
		    opacity: 0.8,
		    revert: true,
		    forceHelperSize: true,
		    placeholder: 'draggable-placeholder',
		    forcePlaceholderSize: true,
		    tolerance: 'pointer',
		    stop: function (event, ui) {
			//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
			$(ui.item).css('z-index', 'auto');
		    }
		}
		);
		$('#tasks').disableSelection();
		$('#tasks input:checkbox').removeAttr('checked').on('click', function () {
		    if (this.checked)
			$(this).closest('li').addClass('selected');
		    else
			$(this).closest('li').removeClass('selected');
		});


		//show the dropdowns on top or bottom depending on window height and menu position
		$('#task-tab .dropdown-hover').on('mouseenter', function (e) {
		    var offset = $(this).offset();

		    var $w = $(window)
		    if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
			$(this).addClass('dropup');
		    else
			$(this).removeClass('dropup');
		});

	    })
	</script> 
	<!-- Yandex.Metrika counter --> 
	<script type="text/javascript">
		    (function (d, w, c) {
			(w[c] = w[c] || []).push(function () {
			    try {
				w.yaCounter25836836 = new Ya.Metrika({
				    id: 25836836,
				    webvisor: true,
				    clickmap: true,
				    trackLinks: true,
				    accurateTrackBounce: true
				});
			    } catch (e) {
			    }
			});

			var n = d.getElementsByTagName("script")[0],
				s = d.createElement("script"),
				f = function () {
				    n.parentNode.insertBefore(s, n);
				};
			s.type = "text/javascript";
			s.async = true;
			s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

			if (w.opera == "[object Opera]") {
			    d.addEventListener("DOMContentLoaded", f, false);
			} else {
			    f();
			}
		    })(document, window, "yandex_metrika_callbacks");
	</script>
	<noscript>
	<div><img src="http://mc.yandex.ru/watch/25836836" style="position:absolute; left:-9999px;" alt=""/></div>
	</noscript>
	<!-- /Yandex.Metrika counter --> 
	<script>
	    (function (i, s, o, g, r, a, m) {
		i['GoogleAnalyticsObject'] = r;
		i[r] = i[r] || function () {
		    (i[r].q = i[r].q || []).push(arguments)
		}, i[r].l = 1 * new Date();
		a = s.createElement(o),
			m = s.getElementsByTagName(o)[0];
		a.async = 1;
		a.src = g;
		m.parentNode.insertBefore(a, m)
	    })(window, document, 'script', '../www.google-analytics.com/analytics.js', 'ga');

	    ga('create', 'UA-38894584-2', 'auto');
	    ga('send', 'pageview');

	</script>
	<script>

	    /*
	     $(document).ready(function () {
	     $("#sidebar").addClass("menu-min");
	     
	     });
	     */

	</script>


    </body>


</html>
