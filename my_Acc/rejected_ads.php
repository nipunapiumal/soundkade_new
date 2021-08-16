<?php
include '../db/db.php';
if (!isset($_SESSION)) {
    session_start();
    //$log = $_SESSION['email'];
    $log = htmlspecialchars(trim($_SESSION['email']), ENT_QUOTES, 'UTF-8');
   // $level = $_SESSION['val'];
    $level = htmlspecialchars(trim($_SESSION['val']), ENT_QUOTES, 'UTF-8');
    //$user = $_SESSION['user'];
    $user = htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');
    //$uid = $_SESSION['id'];
    $uid = htmlspecialchars(trim($_SESSION['id']), ENT_QUOTES, 'UTF-8');

    if (empty($log)) {
	header("Location: ../login.php");
    } else {
	$sqlu = mysqli_query($conn, "SELECT * FROM customer_reg WHERE email='$log' and val='1'");
	if (mysqli_num_rows($sqlu) == 0) {
	    header("Location: ../logout.php");
	}
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

	<!--data tables-->

	<!--<link rel='stylesheet'   href='data_table/datatables_bootsrap_min.css' type='text/css' media='all' />-->
	<!--<link rel='stylesheet'   href='data_table/bootsrap_min.css' type='text/css' media='all' />-->
	<link rel='stylesheet'   href='data_table/jquery.dataTables2.min.css' type='text/css' media='all' />

	<!--data tables-->


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
			<div class="row">
			    <div class="padding-tb45 bottom-blocks">
				<div class="container">
				    <div class="row">

					<?php include 'common_sidebar.php'; ?>   


					<div class="col-md-8 widget_popular_agent column">
					    <h5> Rejected Adds </h5>
					    <table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						    <tr>
							<th>ID</th>

							<th>Date</th>

							<th>View</th>
						    </tr>
						</thead>
						<!--<tfoot>
						    <tr>
							<th>ID</th>
							<th>Ref No</th>
							<th>Date</th>
							<th>Debit(Rs)</th>
							<th>Credit(Rs) date</th>
							<th>Description</th>
						    </tr>
						</tfoot>-->
						<tbody>



						    <?php
						    $sql = mysqli_query($conn, "SELECT
form_prev_data.id AS pid,
form_prev_data.ad_name,
form_prev_data.`data`,
form_prev_data.contact_no,
form_prev_data.house_no,
form_prev_data.cat,
form_prev_data.user,
form_prev_data.street,
form_prev_data.post_id,
form_prev_data.ebro_id,
customer_reg.name,
DATE(`form_prev_data`.`date`) AS `date`,
main_category.category,
sub_category.sub_category,
district.district,
city.city,
customer_reg.email
FROM
form_prev_data
Inner Join customer_reg ON form_prev_data.`user` = customer_reg.id
Inner Join city ON city.cid = form_prev_data.city
Inner Join district ON district.did = city.did
Inner Join sub_category ON sub_category.id = form_prev_data.subcat
Inner Join main_category ON main_category.id = sub_category.cat_id
WHERE
form_prev_data.flag ='4' AND
form_prev_data.user='$uid' AND form_prev_data.ebro_id='0'


");
						    $x = 0;
						    while ($row = mysqli_fetch_array($sql)) {
							$x++;
							?>  
    						    <tr>
    							<td><?php echo $x; ?>.</td>

    							<td><?php echo $row['date']; ?></td>





    							<td><a class="btn btn-primary btn-xs" data-toggle="modal" href="#ad_<?php echo $row['pid']; ?>"> &nbsp;<i class="ace-icon fa fa-pencil-square-o"></i>&nbsp; </a>

    							    <!-- Model -->
								<?php include '../common/ad_preview_modal.php'; ?>
    							    <!-- // Model -->
    							</td>
    						    </tr>			

						    <?php } ?>





						</tbody>
					    </table>



					</div>


				    </div>
				</div>
			    </div>
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

	<script>
	    /*$(document).ready(function () {
	     $('#example').DataTable();
	     });*/
	    $(document).ready(function () {
		$('#myTable').DataTable();
	    });

	</script>
    </body>
</html>