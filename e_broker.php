<?php
include 'db/db.php';
if (!isset($_SESSION)) {
    session_start();
    //$log = $_SESSION['email'];
    $log = htmlspecialchars(trim($_SESSION['email']), ENT_QUOTES, 'UTF-8');
    //$x = htmlspecialchars(trim($_SESSION["data"]), ENT_QUOTES, 'UTF-8');
    //$x=$_SESSION["data"];
    // echo $x;
}


$ebro_id = htmlspecialchars(trim($_GET['ebro_id']), ENT_QUOTES, 'UTF-8');
$cat = htmlspecialchars(trim($_GET['cat']), ENT_QUOTES, 'UTF-8');


$records_per_page = 15;
require 'pagination/pagination.php';
$pagination = new Pagination();

$sql_data_get = "SELECT * FROM form_prev_data WHERE (ebro_id = $ebro_id OR ebro_accept = $ebro_id) AND flag = 1";

if (isset($_GET['cat'])) {
    $sql_data_get .= " AND cat = $cat";
}

$sql_count = "SELECT * FROM form_prev_data WHERE (ebro_id = $ebro_id OR ebro_accept = ".$row_eb['ebro_id'].") AND flag = 1";
                $result_count = mysqli_query($conn, $sql_count);
               echo $count = mysqli_num_rows($result_count);

//echo $sql_data_get;

if (!($result = mysqli_query($conn, $sql_data_get))) {
    die(mysqli_error($conn));
}

$rows = mysqli_fetch_assoc(mysqli_query($conn, 'SELECT FOUND_ROWS() AS rows'));
$pagination->records($rows['rows']);
$pagination->records_per_page($records_per_page);

//echo $MySQL;
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

        <link rel="stylesheet" href="pagination/public/css/zebra_pagination.css">
        <script type="text/javascript" src="pagination/public/javascript/zebra_pagination.js"></script>

        <style>

            .widget ul > li ul
            {
                padding-top: 0px;
                margin-top: 0px;

            }

            .accordion-heading .accordion-toggle {
                padding: 5px;
                font-size: 14px;
            }
	    .accordion-inner{
		padding: 6px;
	    }

        </style>


    </head>

    <body>
        <div class="body"> 
            <!-- Start Site Header -->
	    <?php include 'common/header.php'; ?>
            <!-- End Site Header -->
            <div class="main" role="main">
                <div id="content" class="content full">
                    <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <?php 
                        $sql_bro="SELECT
erbo_register.erbo_id,
erbo_register.name,
erbo_register.address,
erbo_register.nic,
erbo_register.dob,
erbo_register.gender,
erbo_register.mobile,
erbo_register.home,
erbo_register.email,
erbo_register.b_name,
erbo_register.b_code,
erbo_register.b_home,
erbo_register.br_code,
erbo_register.acc_no,
erbo_register.province,
erbo_register.u_name,
erbo_register.pass,
erbo_register.d_id,
erbo_register.r_id,
erbo_register.`user`,
erbo_register.rbo_id,
erbo_register.lat,
erbo_register.lng,
district.district,
city.city
FROM
erbo_register
Inner Join city ON erbo_register.city = city.cid
Inner Join district ON erbo_register.district = district.did
WHERE erbo_id = $ebro_id";
                        $res_bro = mysqli_query($conn,$sql_bro);
                        $row_bro = mysqli_fetch_array($res_bro);?>
                        <h4 style="font-weight: 1000">E-Broker Details:</h4>
                        <div class="col-md-4">
                            <h5>Name : <?php echo $row_bro['name']; ?></h5>
                            <h5>Address : <?php echo $row_bro['address']; ?></h5>
                            <h5>Email : <?php echo $row_bro['email']; ?></h5>
                        </div>
                        <div class="col-md-4">
                            <h5>Mobile : <?php echo $row_bro['mobile']; ?></h5>
                            <h5>Home : <?php echo $row_bro['home']; ?></h5>
                            <h5>District : <?php echo $row_bro['district']; ?></h5>
                        </div>
                        <div class="col-md-4">
                            <h5>City : <?php echo $row_bro['city']; ?></h5>
                        </div>
                    </div>
                </div>

                <hr>
                        <div class="row">
				<div class="sidebar right-sidebar col-md-2 hidden-sm" id="sidebar-col">
                    <div id="search_properties-3" class="widget sidebar-widget widget_search_properties">
                        <div class="search_by">
                            <div>
                                <ul class="chevrons icon">

                                    <?php

                                   $sql_mcat="SELECT
main_category.category,
main_category.id
FROM
main_category
Inner Join form_prev_data ON form_prev_data.cat = main_category.id
WHERE ebro_id = '$ebro_id'
GROUP BY category";

                                    $res_mcat = mysqli_query($conn,$sql_mcat);
                                    while ($row_cat = mysqli_fetch_array($res_mcat)) {
                                    ?>

                                    <li><i class="fa fa-check-square"></i><i class="icon icon-envelope-alt"></i> <a href="e_broker.php?cat=<?php echo $row_cat['id'] ?>&ebro_id=<?php echo $ebro_id ?>"><?php echo $row_cat['category'] ?></a></li>

                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-sm-12" id="content-col">
                    <div class="property-listing row">
                        <ul class="col-md-12" id="property_grid_holder">
					<?php
					while ($rowse = mysqli_fetch_array($result)) {

					    $post_id = $rowse['post_id'];
					    $sqlimg = mysqli_fetch_assoc(mysqli_query($conn, "SELECT img FROM post_img WHERE post_id='$post_id' order by id ASC LIMIT 1"));

					    if (empty($sqlimg['img'])) {
						$img_path = 'post_ad/uploads/no-image.png';
					    } else {
						$img_path = "post_ad/uploads/" . $post_id . "/" . $sqlimg['img'];
					    }

					    $c_id = $rowse['city'];
					    $sqlc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT city FROM city WHERE cid='$c_id'"));

					    $d_id = $rowse['district'];
					    $sqld = mysqli_fetch_assoc(mysqli_query($conn, "SELECT district FROM district WHERE did='$d_id'"));

					    $serialized_data = $rowse['data']; // Unserialize the data  
					    $data = unserialize($serialized_data); // Show the unserialized data; 

					    foreach ($data as $field => $value) {
						$sqlf = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM form_fields WHERE id='$field'"));
						$field_name = $sqlf['name'];

						if ($field_name == 'Price') {
						    $price = $value; //number_format($value,2);
						}
					    }
					    ?>              
    					<li class="type-rent col-md-12">

    					    <div class="col-md-3 col-sm-4"> 
    						<a href="more_details.php?id=<?php echo $rowse['id']; ?>&e_bro=<?php echo $rowse['ebro_id']; ?>&user=<?php echo $rowse['user']; ?> " class="property-featured-image">
    						    <img src="<?php echo $img_path; ?>" class="attachment-600-400-size size-600-400-size wp-post-image img-thumbnail" alt="<?php echo $name; ?>" sizes="(max-width: 600px) 100vw, 600px" />
    						</a> </div>
    					    <div class="col-md-9">
    						<div class="property-info">
							<?php if ($rowse['cat'] != 4 && $rowse['cat'] != 5) { ?>
							    <div class="price"><strong>Rs.</strong><span class=""><?php echo $price; ?></span></div>
							<?php } ?>

    						    <h3><a href="more_details.php?id=<?php echo $rowse['id']; ?>&e_bro=<?php echo $rowse['ebro_id']; ?>&user=<?php echo $rowse['user']; ?>"><?php echo $rowse['ad_name']; ?></a></h3>
    						    <span class="location"><?php echo $rowse['house_no'] . ", " . $rowse['street'] . ", " . $sqlc['city'] . ", " . $sqld['district']; ?></span><br>
    						    <p>                      
							    <?php ?>
    						    </p>
    						</div>
    					    </div>
    					</li>
					<?php } ?>                
                                    </ul>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <br>
				    <?php
// render the pagination links
				    $pagination->render();
				    ?>
                                </div>
                            </div>            
                            <!-- Start Sidebar --> 
                        </div>
                    </div>
                </div>
            </div>		

            <!-- Start Site Footer -->
	    <?php include 'common/footer.php'; ?>
            <!-- End Site Footer -->
			
			<?php include 'common/privacy_policy.php'; ?>

            <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>

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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

		<script>

	    check_data();
	    function check_data() {


		/*var field_id = [];
		 
		 $("#hidden_collapse").each(function () {
		 //var check_field = $(this).val();
		 
		 field_id.push($(this).val());
		 
		 });*/




		//input comma separated values convert to array object  
		var hidden_array = $('#hidden_array').val();
		var hidden_subcat = $('#hidden_subcat').val();
		//var hidden_collapse = $('#hidden_collapse').val();
		var temp = new Array();
		temp = hidden_array.split(",");
		//input comma separated values convert to array object

		//foreach write inside jquery 
		/* temp.forEach(function (i) { //this part write for button inside form
		 document.getElementById(i).checked = true;
		 });*/
		//alert(hidden_collapse);
		for (i = 0; i !== temp.length; i++) {
		    var checkbox = $("input[type='checkbox'][value='" + temp[i] + "']");
		    checkbox.attr("checked", "checked");

		    //for (k = 0; k !== field_id.length; k++) {



		    $.post('search_session.php', {'get_field': 'data', data: temp[i], hidden_subcat: hidden_subcat}, function (data) {
			$.each(data, function (index, data) {


			    // alert(data.field_id );
			    $('#' + data.field_id).addClass("in");
			    //$("p:first").addClass("intro");

			});
		    }, "json");

		    //}
		}

		//foreach write inside jquery 
	    }


	    $(function () {



		$("#search_btn").click(function () {
		    var hidden_subcat = $('#hidden_subcat').val();
		    var hidden_city = $('#hidden_city').val();

		    var checked = [];
		    $("input[name='field[]']:checked").each(function ()
		    {
			checked.push($(this).val());


		    });
		    window.location.href = "search.php?subcat=" + hidden_subcat + "&checked=" + checked + "&city=" + hidden_city;



		});


	    });
        </script>	
		
    </body>
</html>