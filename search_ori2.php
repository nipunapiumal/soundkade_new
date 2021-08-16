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

$id = htmlspecialchars(trim($_GET['cat']), ENT_QUOTES, 'UTF-8');
$city = htmlspecialchars(trim($_GET['city']), ENT_QUOTES, 'UTF-8');
$subcat = htmlspecialchars(trim($_GET['subcat']), ENT_QUOTES, 'UTF-8');
$division = htmlspecialchars(trim($_GET['district']), ENT_QUOTES, 'UTF-8');
$keyword = htmlspecialchars(trim($_GET['keyword']), ENT_QUOTES, 'UTF-8');
//$data = htmlspecialchars(trim($_GET['data']), ENT_QUOTES, 'UTF-8');
$checked = htmlspecialchars(trim($_GET['checked']), ENT_QUOTES, 'UTF-8'); //GET array data which pass from jquery PUSH
//print_r ( preg_split("/\s*,\s*/",$checked));
//echo $checked;

$records_per_page = 15;
require 'pagination/pagination.php';
$pagination = new Pagination();

//UDARA'S PART
date_default_timezone_set('Asia/Colombo');
$currenttime = time();

if (!empty($checked) && (!empty($subcat)) && (!empty($city))) {
//$thePostIdArray = explode(" ,", $checked);
    $thePostIdArray = ( preg_split("/\s*,\s*/", $checked));
//$thePostIdArray = array('Toyota','Nissan','Hatchback','Saloon');
//print_r($thePostIdArray);
    $conditions = array();
//echo $thePostIdArray;
    foreach ($thePostIdArray as $field_set) {
	//if (isset($_GET[$field_set]) && $_GET[$field_set] != '') {

	$conditions[] = "`data` LIKE '%" . $field_set . "%'";

	//}
    }


    $MySQL = "
    SELECT
        SQL_CALC_FOUND_ROWS
        *
    FROM
        form_prev_data";

// if there are conditions defined: edited by udara to handle ad expire
    if (count($conditions) > 0) {
	$MySQL .= " WHERE " . implode(' AND ', $conditions) . " AND flag='1' AND exp_date>$currenttime AND city='$city' AND subcat='$subcat' ORDER BY  `form_prev_data`.`id` DESC";
    } else {
	$MySQL .= " WHERE flag='1' AND exp_date>$currenttime ORDER BY  `form_prev_data`.`id` DESC";
    }
//echo $MySQL1;


    $MySQL .= "
    LIMIT
        " . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . '
';
}
//echo $MySQL;

if (empty($checked)) {

    $fields = array('keyword', 'city', 'subcat', 'cat', 'district');
//print_r($fields);
    $conditions = array();



    foreach ($fields as $field) {
	if (isset($_GET[$field]) && $_GET[$field] != '') {
	    if ($field == 'keyword') {
		$conditions[] = "(`data` LIKE '%" . htmlspecialchars(trim($_GET[$field]), ENT_QUOTES, 'UTF-8') . "%' OR  `ad_name` LIKE '%" . mysqli_real_escape_string($conn, $_GET[$field]) . "%')";
	    } else {
		$conditions[] = "`$field`='" . htmlspecialchars(trim($_GET[$field]), ENT_QUOTES, 'UTF-8') . "'";
	    }
	}
    }

    $MySQL = "
    SELECT
        SQL_CALC_FOUND_ROWS
        *
    FROM
        form_prev_data";

// if there are conditions defined
    if (count($conditions) > 0) {
	$MySQL .= " WHERE " . implode(' AND ', $conditions) . " AND flag='1' AND exp_date>$currenttime ORDER BY  `form_prev_data`.`id` DESC";
    } else {
	$MySQL .= " WHERE flag='1' AND exp_date>$currenttime ORDER BY  `form_prev_data`.`id` DESC";
    }
//echo $MySQL;


    $MySQL .= "
    LIMIT
        " . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . '
';
}

/* if(!empty($data)){
  $MySQL ="'".$x."';";
  $MySQL .= "
  LIMIT
  " . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . '
  ';

  } */
//echo $MySQL; 


if (!($result = @mysqli_query($conn, $MySQL))) {
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

            <!-- Site Showcase -->
            <div class="site-showcase"> 
                <!-- Start Page Header -->
                <div style="background-color:#efefef;padding:10px 0 10px 0">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="search">
                                    <form method="get" action="search.php">
                                        <div class="col-md-3">

                                            <!--hidden variables set-->
                                            <input type="hidden" id="hidden_subcat" value="<?php echo $subcat; ?>">
                                            <input type="hidden" id="hidden_city" value="<?php echo $city; ?>">
                                            <input type="hidden" id="hidden_array" value="<?php echo $checked; ?>"><!--assign values which come from $_GET-->
                                            <!--hidden variables set-->


                                            <div class="input-group input-group-lg" style="width:100%">

                                                <select name="city" class="form-control" id="drop_city">
													<option value="">Select City</option>

						    <?php
						    $sqlp = mysqli_query($conn, "SELECT
city.cid,
form_prev_data.city,
city.city AS name,
form_prev_data.flag
FROM
form_prev_data
Inner Join city ON city.cid = form_prev_data.city
WHERE form_prev_data.flag='1'
GROUP BY form_prev_data.city");
						    while ($rowp = mysqli_fetch_array($sqlp)) {
							?>                    
    						    <option value="<?php echo $rowp['cid']; ?>"><?php echo $rowp['name']; ?></option>
						    <?php } ?>
                                                </select>



                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group input-group-lg" style="width:100%">



                                                <select name="subcat" class="form-control" id="drop_subcat">
													<option value="">Select Category</option>

						    <?php
						    $sql = mysqli_query($conn, "SELECT
form_prev_data.subcat,
form_prev_data.flag,
sub_category.id,
sub_category.sub_category
FROM
form_prev_data
Inner Join sub_category ON sub_category.id = form_prev_data.subcat
WHERE form_prev_data.flag='1' AND sub_category.id != '$subcat'
GROUP BY form_prev_data.subcat");
						    while ($row = mysqli_fetch_array($sql)) {
							?>                    
    						    <option value="<?php echo $row['id']; ?>"><?php echo $row['sub_category']; ?></option>
						    <?php } ?>
                                                </select>


                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-lg">
                                                <input type="text" class="form-control" name="keyword"  value="" />

                                                <span class="input-group-btn">
                                                    <button type ="submit" name ="submit" class="btn btn-primary" id="submit"><i class="fa fa-search fa-lg"></i></button>
                                                </span> </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Header --> 
            </div>
            <!-- Start Content -->
            <div class="main" role="main">
                <div id="content" class="content full">
                    <div class="container">
                        <div class="row">
						
                            <div class="sidebar right-sidebar col-md-3 hidden-xs hidden-sm" id="sidebar-col">
								<div id="search_properties-3" class="widget sidebar-widget widget_search_properties">
                                    
						<?php //if (!empty($division) || !empty($city)) { ?>
						<a href="view_ad_locations.php?district=<?php echo $division; ?>&city=<?php echo $city; ?>&cat=<?php echo $id; ?>&subcat=<?php echo $subcat; ?>&keyword=<?php echo $keyword; ?>&checked=<?php echo $checked; ?>" target="new" class="btn btn-danger btn-lg"><h6 style="color:#FFF; margin-bottom:0">VIEW MAP</h6></a>
						<br><br>
						<?php //} ?>
									
									<div class="sidebar-widget-title">
                                        <h3 class="widgettitle">Search</h3>
                                    </div>
                                    <div class="full-search-form">
                                        <form method="get" action="search.php"> 

                                            <div class="accordion-group panel">
                                                <div class="accordion-heading accordionize"> <a class="accordion-toggle " data-toggle="collapse" data-parent="#accordionac" href="#ac1"><h5 style="margin-bottom:0">MAIN CATEGORIES</h5><i class="fa fa-angle-down"></i> </a> </div>
                                                <div id="ac1" class="accordion-body  collapse">
						    <?php if ($id != 1) { ?>
    						    <div class="accordion-inner"><a href="search.php?cat=1">Cars & Vehicles</a></div>
						    <?php } ?>
						    <?php if ($id != 2) { ?>
    						    <div class="accordion-inner"><a href="search.php?cat=2">Property</a></div>
						    <?php } ?>
						    <?php if ($id != 3) { ?>
    						    <div class="accordion-inner"><a href="search.php?cat=3">Land Sale</a></div>
						    <?php } ?>
						    <?php if ($id != 4) { ?>
    						    <div class="accordion-inner"><a href="search.php?cat=4">Labor Supply</a></div>
						    <?php } ?>
						    <?php if ($id != 5) { ?>
    						    <div class="accordion-inner"><a href="search.php?cat=5">Marriage</a></div>
						    <?php } ?>

                                                </div>
                                            </div>



					    <?php
					    if (!empty($checked) && (!empty($subcat)) && (!empty($city))) {
//$thePostIdArray = explode(" ,", $checked);
						$thePostIdArray = ( preg_split("/\s*,\s*/", $checked));
//$thePostIdArray = array('Toyota','Nissan','Hatchback','Saloon');
//print_r($thePostIdArray);
						$conditions = array();
//echo $thePostIdArray;
						foreach ($thePostIdArray as $field_set) {
						    //if (isset($_GET[$field_set]) && $_GET[$field_set] != '') {

						    $conditions[] = "`data` LIKE '%" . $field_set . "%'";

						    //}
						}


						$MySQL_1 = "
    SELECT
        SQL_CALC_FOUND_ROWS
        *
    FROM
        form_prev_data";

// if there are conditions defined
						if (count($conditions) > 0) {
						    $MySQL_1 .= " WHERE " . implode(' AND ', $conditions) . " AND flag='1' AND exp_date>$currenttime AND city='$city' AND subcat='$subcat' GROUP BY form_prev_data.cat ORDER BY  `form_prev_data`.`id` DESC";
						} else {
						    $MySQL_1 .= " WHERE flag='1' AND exp_date>$currenttime AND exp_date>$currenttime GROUP BY form_prev_data.cat ORDER BY  `form_prev_data`.`id` DESC";
						}

						$result_1 = mysqli_query($conn, $MySQL_1);
						$num_rows_1 = mysqli_num_rows($result_1);
//echo $MySQL1;
					    }
//echo $MySQL;

					    if (empty($checked)) {

						$fields = array('keyword', 'city', 'subcat', 'cat', 'district');
//print_r($fields);
						$conditions = array();



						foreach ($fields as $field) {
						    if (isset($_GET[$field]) && $_GET[$field] != '') {
							if ($field == 'keyword') {
							    $conditions[] = "(`data` LIKE '%" . htmlspecialchars(trim($_GET[$field]), ENT_QUOTES, 'UTF-8') . "%' OR  `ad_name` LIKE '%" . mysqli_real_escape_string($conn, $_GET[$field]) . "%')";
							} else {
							    $conditions[] = "`$field`='" . htmlspecialchars(trim($_GET[$field]), ENT_QUOTES, 'UTF-8') . "'";
							}
						    }
						}

						$MySQL_1 = "
    SELECT
        SQL_CALC_FOUND_ROWS
        *
    FROM
        form_prev_data";

// if there are conditions defined
						if (count($conditions) > 0) {
						    $MySQL_1 .= " WHERE " . implode(' AND ', $conditions) . " AND flag='1' AND exp_date>$currenttime GROUP BY form_prev_data.cat ORDER BY  `form_prev_data`.`id` DESC";
						} else {
						    $MySQL_1 .= " WHERE flag='1' AND exp_date>$currenttime GROUP BY form_prev_data.cat ORDER BY  `form_prev_data`.`id` DESC";
						}
//echo $MySQL;
						$result_1 = mysqli_query($conn, $MySQL_1);
						$num_rows_1 = mysqli_num_rows($result_1);
					    }



					    /*
					      foreach ($fields as $field) {
					      if (isset($_GET[$field]) && $_GET[$field] != '') {
					      if ($field == 'keyword') {
					      $conditions[] = "`data` LIKE '%" . htmlspecialchars(trim($_GET[$field]), ENT_QUOTES, 'UTF-8') . "%' OR  `ad_name` LIKE '%" . mysqli_real_escape_string($conn, $_GET[$field]) . "'";
					      } else {
					      $conditions[] = "`$field`='" . htmlspecialchars(trim($_GET[$field]), ENT_QUOTES, 'UTF-8') . "'";
					      }
					      }
					      }

					      $MySQL_1 = "
					      SELECT
					      SQL_CALC_FOUND_ROWS
					     *
					      FROM
					      form_prev_data";

					      // if there are conditions defined
					      if (count($conditions) > 0) {
					      $MySQL_1 .= " WHERE " . implode(' AND ', $conditions) . " AND flag='1' GROUP BY form_prev_data.cat ORDER BY `form_prev_data`.`id` DESC";
					      } else {
					      $MySQL_1 .= " WHERE flag='1' GROUP BY form_prev_data.cat ORDER BY  `form_prev_data`.`id` DESC";
					      }
					      //echo $MySQL_1;
					      $result_1 = mysqli_query($conn, $MySQL_1);
					      $num_rows_1 = mysqli_num_rows($result_1);
					     * 
					     */
					    ?>

                                         <div class="search_by">

                                                <div>
						    <?php
						    if ($num_rows_1 > 1) {
							?>
							<?php
							$sql_main = mysqli_query($conn, "SELECT * FROM main_category ");
							while ($row_main = mysqli_fetch_array($sql_main)) {
							    $main_id = $row_main['id'];
							    $main_name = $row_main['category'];
							    ?>
							    <ul class="chevrons icon">

								<li><i class="fa fa-check-square"></i> <a href="search.php?cat=<?php echo $main_id; ?>" class="main_cat_1"><?php echo $main_name; ?></a>

								    <ul>
									<?php
									$sql_sub = mysqli_query($conn, "SELECT * FROM sub_category WHERE  cat_id='$main_id'");
									while ($row_sub = mysqli_fetch_array($sql_sub)) {
									    ?>
									    <?php
									    if (count($conditions) > 0) {
										$sqlco_main = "SELECT COUNT(*) FROM form_prev_data WHERE " . implode(' AND ', $conditions) . " AND flag='1' AND exp_date>$currenttime AND subcat=" . $row_sub['id'];
									    } else {
										$sqlco_main = "SELECT COUNT(*) FROM form_prev_data WHERE flag='1' AND exp_date>$currenttime AND subcat=" . $row_sub['id'];
									    }

									    $resultco_main = mysqli_query($conn, $sqlco_main);
									    $rowco_main = mysqli_fetch_array($resultco_main);
									    $count_main = $rowco_main[0];
									    ?>

									    <?php if ($count_main > 0) { ?>
										<li> <a href="search.php?subcat=<?php echo $row_sub['id']; ?>"><img src="backend/img_upload/<?php echo $row_sub['img']; ?>" width="20" height="50">&nbsp;&nbsp;<?php echo $row_sub['sub_category']; ?>&nbsp;&nbsp;(<?php echo $count_main; ?>)</a></li> 

									    <?php } ?>
									<?php } ?>
								    </ul>
								</li>
							    <?php } ?>


    						    </ul>
						    <?php } ?>

						    <?php
						    if ($num_rows_1 == 1) {
							?>
							<?php
							$sql_1 = mysqli_fetch_assoc(mysqli_query($conn, $MySQL_1));
							$main_category_id = $sql_1['cat'];
							//$sub_category= $sql_1['sub_cat'];

							$sql_2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM main_category WHERE id='$main_category_id'"));
							$main_category_name = $sql_2['category'];

							// while ($rowse = mysqli_fetch_array($result)) {
							?>
    						    <ul class="chevrons icon">

    							<li><i class="fa fa-check-square"></i> <a href="search.php?cat=<?php echo $main_category_id; ?>"><?php echo $main_category_name; ?></a>

    							    <ul>
								    <?php
								    $sql_sub_1 = mysqli_query($conn, "SELECT * FROM sub_category WHERE cat_id='$main_category_id' ORDER BY sub_category ASC");
								    while ($row_sub_1 = mysqli_fetch_array($sql_sub_1)) {
									?>
									<?php
									if (count($conditions) > 0) {
									    $sqlco = "SELECT COUNT(*) FROM form_prev_data WHERE" . implode(' AND ', $conditions) . "AND flag='1' AND exp_date>$currenttime AND subcat=" . $row_sub_1['id'];
									} else {
									    $sqlco = "SELECT COUNT(*) FROM form_prev_data WHERE flag='1' AND exp_date>$currenttime AND subcat=" . $row_sub_1['id'];
									}
									$resultco = mysqli_query($conn, $sqlco);
									$rowco = mysqli_fetch_array($resultco);
									$count1 = $rowco[0];
									?>

									<?php if ($count1 > 0) { ?>
	    								<li> <a href="search.php?subcat=<?php echo $row_sub_1['id']; ?>"><img src="backend/img_upload/<?php echo $row_sub_1['img']; ?>" width="20" height="50">&nbsp;&nbsp;<?php echo $row_sub_1['sub_category']; ?>&nbsp;&nbsp;(<?php echo $count1; ?>)</a></li> 
									<?php } ?>
								    <?php } ?>
    							    </ul>
    							</li>
							    <?php //}       ?>


    						    </ul>
						    <?php } ?>
                                     </div>
                                            </div>

                                            <br>

					    <?php
					    if (!empty($checked) && (!empty($subcat)) && (!empty($city))) {
//$thePostIdArray = explode(" ,", $checked);
						$thePostIdArray = ( preg_split("/\s*,\s*/", $checked));
//$thePostIdArray = array('Toyota','Nissan','Hatchback','Saloon');
//print_r($thePostIdArray);
						$conditions = array();
//echo $thePostIdArray;
						foreach ($thePostIdArray as $field_set) {
						    //if (isset($_GET[$field_set]) && $_GET[$field_set] != '') {

						    $conditions[] = "`data` LIKE '%" . $field_set . "%'";

						    //}
						}


						$MySQL_2 = "
    SELECT
        SQL_CALC_FOUND_ROWS
        *
    FROM
        form_prev_data";

// if there are conditions defined
						if (count($conditions) > 0) {
						    $MySQL_2 .= " WHERE " . implode(' AND ', $conditions) . " AND flag='1' AND exp_date>$currenttime AND city='$city' AND subcat='$subcat' GROUP BY form_prev_data.district ORDER BY  `form_prev_data`.`id` DESC";
						} else {
						    $MySQL_2 .= " WHERE flag='1' AND exp_date>$currenttime GROUP BY form_prev_data.district ORDER BY  `form_prev_data`.`id` DESC";
						}

						$result_2 = mysqli_query($conn, $MySQL_2);
						$num_rows_2 = mysqli_num_rows($result_2);
//echo $MySQL1;
					    }
//echo $MySQL;

					    if (empty($checked)) {

						$fields = array('keyword', 'city', 'subcat', 'cat', 'district');
//print_r($fields);
						$conditions = array();



						foreach ($fields as $field) {
						    if (isset($_GET[$field]) && $_GET[$field] != '') {
							if ($field == 'keyword') {
							    $conditions[] = "(`data` LIKE '%" . htmlspecialchars(trim($_GET[$field]), ENT_QUOTES, 'UTF-8') . "%' OR  `ad_name` LIKE '%" . mysqli_real_escape_string($conn, $_GET[$field]) . "%')";
							} else {
							    $conditions[] = "`$field`='" . htmlspecialchars(trim($_GET[$field]), ENT_QUOTES, 'UTF-8') . "'";
							}
						    }
						}

						$MySQL_2 = "
    SELECT
        SQL_CALC_FOUND_ROWS
        *
    FROM
        form_prev_data";

// if there are conditions defined
						if (count($conditions) > 0) {
						    $MySQL_2 .= " WHERE " . implode(' AND ', $conditions) . " AND flag='1' AND exp_date>$currenttime GROUP BY form_prev_data.district ORDER BY  `form_prev_data`.`id` DESC";
						} else {
						    $MySQL_2 .= " WHERE flag='1' AND exp_date>$currenttime GROUP BY form_prev_data.district ORDER BY  `form_prev_data`.`id` DESC";
						}
//echo $MySQL;
						$result_2 = mysqli_query($conn, $MySQL_2);
						$num_rows_2 = mysqli_num_rows($result_2);
					    }


					    /*
					      foreach ($fields as $field) {
					      if (isset($_GET[$field]) && $_GET[$field] != '') {
					      if ($field == 'keyword') {
					      $conditions[] = "`data` LIKE '%" . htmlspecialchars(trim($_GET[$field]), ENT_QUOTES, 'UTF-8') . "%' OR  `ad_name` LIKE '%" . mysqli_real_escape_string($conn, $_GET[$field]) . "'";
					      } else {
					      $conditions[] = "`$field`='" . htmlspecialchars(trim($_GET[$field]), ENT_QUOTES, 'UTF-8') . "'";
					      }
					      }
					      }

					      $MySQL_2 = "
					      SELECT
					      SQL_CALC_FOUND_ROWS
					     *
					      FROM
					      form_prev_data";

					      // if there are conditions defined
					      if (count($conditions) > 0) {
					      $MySQL_2 .= " WHERE " . implode(' AND ', $conditions) . " AND flag='1' GROUP BY form_prev_data.district ORDER BY `form_prev_data`.`id` DESC";
					      } else {
					      $MySQL_2 .= " WHERE flag='1' GROUP BY form_prev_data.district ORDER BY  `form_prev_data`.`id` DESC";
					      }
					      //echo $MySQL_2;
					      $result_2 = mysqli_query($conn, $MySQL_2);
					      $num_rows_2 = mysqli_num_rows($result_2);
					     * 
					     */
					    ?>
                                <div class="search_by">
                                                <div>

						    <?php
						    if ($num_rows_2 > 1) {
							?>
    						    <h5>LOCATION</h5>
    						    <ul class="chevrons icon">

							    <?php
							    $sql_dis = mysqli_query($conn, "SELECT
* FROM district
");
							    while ($row_dis = mysqli_fetch_array($sql_dis)) {
								?>
								<?php
								if (count($conditions) > 0) {
								    $sqlco_dis = "SELECT COUNT(*) FROM form_prev_data WHERE " . implode(' AND ', $conditions) . " AND flag='1' AND exp_date>$currenttime AND district=" . $row_dis['did'];
								} else {
								    $sqlco_dis = "SELECT COUNT(*) FROM form_prev_data WHERE  flag='1' AND exp_date>$currenttime AND district=" . $row_dis['did'];
								}
								$resultco_dis = mysqli_query($conn, $sqlco_dis);
								$rowco_dis = mysqli_fetch_array($resultco_dis);
								$count_4 = $rowco_dis[0];
								?>

								<?php if ($count_4 > 0) { ?>
	    							<li><i class="fa fa-check-square "></i> <a href="search.php?district=<?php echo $row_dis['did']; ?>&subcat=<?php echo $subcat; ?>"><?php echo $row_dis['district']; ?>&nbsp;&nbsp;(<?php echo $count_4; ?>)</a>


	    							</li>
								<?php } ?>
							    <?php } ?>

    						    </ul>
						    <?php } ?>
						    <?php
						    if ($num_rows_2 == 1) {
							?>
    						    <h5>LOCATION</h5>
    						    <ul class="chevrons icon">

							    <?php
							    $sql_dis_1 = mysqli_fetch_assoc(mysqli_query($conn, $MySQL));
							    $main_district_id = $sql_dis_1['district'];
							    //while ($row_dis = mysqli_fetch_array($sql_dis)) {
							    $sql_dis_2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM district WHERE did='$main_district_id'"));
							    $main_district_name = $sql_dis_2['district'];
							    ?>
							    <?php
							    if (count($conditions) > 0) {
								$sqlco_dis_3 = "SELECT COUNT(*) FROM form_prev_data WHERE " . implode(' AND ', $conditions) . " AND flag='1' AND exp_date>$currenttime AND district='$main_district_id'";
							    } else {
								$sqlco_dis_3 = "SELECT COUNT(*) FROM form_prev_data WHERE flag='1' AND exp_date>$currenttime AND district='$main_district_id'";
							    }
							    $resultco_dis_3 = mysqli_query($conn, $sqlco_dis_3);
							    $rowco_dis_3 = mysqli_fetch_array($resultco_dis_3);
							    $count_dis = $rowco_dis_3[0];
							    ?>

							    <?php if ($count_dis > 0) { ?>
								<li><i class="fa fa-check-square"></i> <a href="search.php?district=<?php echo $main_district_id; ?>"><?php echo $main_district_name; ?>&nbsp;&nbsp;(<?php echo $count_dis; ?>)</a>

								    <ul>
									<?php
									$sql_city = mysqli_query($conn, "SELECT * FROM city WHERE did='$main_district_id'
									  ");
									while ($row_city = mysqli_fetch_array($sql_city)) {
									    ?>
									    <?php
									    if (count($conditions) > 0) {
										$sqlco_city = "SELECT COUNT(*) FROM form_prev_data WHERE " . implode(' AND ', $conditions) . "  AND flag='1' AND exp_date>$currenttime AND district='$main_district_id' AND city=" . $row_city['cid'];
									    } else {
										$sqlco_city = "SELECT COUNT(*) FROM form_prev_data WHERE flag='1' AND exp_date>$currenttime AND district='$main_district_id' AND city=" . $row_city['cid'];
									    }
									    $resultco_city = mysqli_query($conn, $sqlco_city);
									    $rowco_city = mysqli_fetch_array($resultco_city);
									    $count_city = $rowco_city[0];
									    ?>
									    <?php if ($count_city > 0) { ?>
										<li> <a href="search.php?city=<?php echo $row_city['cid']; ?>&subcat=<?php echo $subcat; ?>"><?php echo $row_city['city']; ?>&nbsp;&nbsp;(<?php echo $count_city; ?>)</a></li> 
									    <?php } ?>
									<?php } ?>
								    </ul>
								</li>
							    <?php } ?>


    						    </ul>
						    <?php } ?>
                                          </div>
                                            </div>

                                            <br/>
					    <?php if (!empty($city)) { ?>
    					    <div class="search_by">
    						<div>

    						    <br/>
							<?php
							if (!empty($city) && !empty($subcat)) {
							    ?>
							    <h5>ADDITIONAL INFO</h5>
							    </br>
							<?php } ?>

    						    <div class="widget-main">
							    <?php
//echo $sub_cat;
							    $sql_form = "SELECT
fields_map.field_id,
form_fields.name,
form_fields.`type`,
fields_map.form_id,
fields_map.id,
form_fields.id AS main,
fields_map.`order`
FROM
fields_map
Inner Join form_fields ON form_fields.id = fields_map.field_id
WHERE fields_map.form_id='$subcat' AND form_fields.`type`='Select' ORDER BY fields_map.`order` ASC";
							    $result_form = mysqli_query($conn, $sql_form);
//echo $sql_form;
							    while ($row_form = mysqli_fetch_array($result_form)) {
								?>

								<div class="form-group"> 


								    <div class="accordion-group panel">
									<div class="accordion-heading accordionize"> <a class="accordion-toggle " data-toggle="collapse" data-parent="#accordionac" href="#<?php echo $row_form['main']; ?>"><h5><?php echo $row_form['name']; ?></h5><i class="fa fa-angle-down"></i> </a> </div>

									<div id="<?php echo $row_form['main']; ?>" class="accordion-body collapse ">
									   <!-- <input type="hidden" id="hidden_collapse" value="<?php /* echo $row_form['main']; */ ?>">-->

									    <?php
									    $sql_form_data = "SELECT * FROM form_data WHERE `field_id`=" . $row_form['field_id'] . " AND `form_id`=" . $subcat;

									    $result_data = mysqli_query($conn, $sql_form_data);

									    while ($row_data = mysqli_fetch_array($result_data)) {
										?>
	    								    <div class="accordion-inner"><input type="checkbox"  name="field[]"  value="<?php echo $row_data['data']; ?>" id="<?php echo $row_data['data']; ?>">&nbsp;&nbsp;<?php echo $row_data['data']; ?></div>
	    								    <!--<div class="accordion-inner"><input type="checkbox"  name="field[]"  value="<?php /* echo 'Honda'; */ ?>" checked="true">&nbsp;&nbsp;<?php /* echo 'Honda'; */ ?></div>-->


										<?php /* if($data===$row_data['data']){ */ ?>
	    								<!--<div class="accordion-inner"><input type="checkbox"    value="<?php /* echo $row_data['data']; */ ?>" checked="true">&nbsp;&nbsp;<?php /* echo $row_data['data']; */ ?></div>-->


										<?php //}     ?>
									    <?php } ?>


									</div>


								    </div>


								</div>					

							    <?php } ?>

    						    </div>

							<?php //}         ?>


    						</div>
    					    </div>
					    <?php } ?>


                                        </form>
					<?php
					if (!empty($city) && !empty($subcat)) {
					    ?>
    					<button id="search_btn"  class="btn btn-primary btn-sm"> 
    					    Search</button>
					<?php } ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-12" id="content-col">
                                <div class="property-listing row">
                                    <ul class="col-md-12" id="property_grid_holder">
					<?php
					while ($rowse = mysqli_fetch_array($result)) {

					    $post_id = $rowse['post_id'];
					    $sqlimg = mysqli_fetch_assoc(mysqli_query($conn, "SELECT img FROM post_img WHERE post_id='$post_id' order by id ASC LIMIT 1"));

					    if (empty($sqlimg['img'])) {
						$img_path = 'post_ad/uploads/no-image.png';
					    } else {
						$img_path = "post_ad/thumbs/" . $post_id . "/" . $sqlimg['img'];
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
                        //UDARA, MAKING IMAGE ALT VALUE USING IMAGE NAME
					    ?>              
    					<li class="type-rent col-md-12 col-xs-12 col-sm-12 col-lg-12" style="margin-bottom:5px">


    					    <div class="col-md-3 col-sm-4 col-xs-4 col-lg-3" style="margin-top:10px">
    						<a href="more_details.php?id=<?php echo $rowse['id']; ?>&e_bro=<?php echo $rowse['ebro_id']; ?>&user=<?php echo $rowse['user']; ?> " class="property-featured-image">
    						    <img src="<?php echo $img_path; ?>" class="attachment-600-400-size size-600-400-size wp-post-image img-thumbnail" alt="This is an iamge of <?php echo $rowse['ad_name']; ?>" sizes="(max-width: 600px) 100vw, 600px" />
    						</a> 
							</div>
							
							<!--      Udara part first div-->
							
    					    <div class="col-md-9 col-sm-8 col-xs-8 col-lg-9">
    						<div class="property-info">


                      
                           <div class="col-xs-12 col-sm-12  col-md-7  col-lg-8" style="margin-top:10px">
    						    <h4><a href="more_details.php?id=<?php echo $rowse['id']; ?>&e_bro=<?php echo $rowse['ebro_id']; ?>&user=<?php echo $rowse['user']; ?>"><?php echo $rowse['ad_name']; ?></a></h4>
    						    <span class="location" style="padding: 0;"><?php echo $rowse['street'] . ", " . $sqlc['city']; ?></span><br>
                                <span class="" style="color: #999; font-family: 'Open Sans', sans-serif!important; font-style: italic;"><i class="fa fa-clock-o" aria-hidden="true" style="    color: #44a7ff; font-size: 11px; margin-right: 2px;"></i><?php echo $rowse['date']; ?></span><br>
    						    <p>
							    <?php ?>
    						    </p>
                                  </div>

                      <!--      Udara part end first div-->

                            <div class="col-xs-12 col-sm-12 col-md-5  col-lg-4">
							<?php if ($rowse['cat'] != 4 && $rowse['cat'] != 5) { ?>
							    <div class="" style="margin-top:-10px; color:#2D85D3"><strong>Rs. <?php
                                //echo $price[0];
                                if ($price[2]=='.') {
                                    echo substr(str_replace("Rs","" ,$price),1);
                                }else{
                                    echo str_replace("Rs","" ,$price);
                                }

                                ; ?></strong></div>
							<?php } ?>
                            </div>


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



	    /*   function onClickHandler(item) {
	     //var chk = document.getElementById("box").value;
	     var hidden_val = $('#hidden_val').val();
	     var hidden_session = $('#hidden_session').val();
	     var name = (item.value);
	     var total = $("input[type=checkbox]:checked").length;
	     
	     //check box values pass to jquery array
	     var checked = [];
	     $("input[name='field[]']:checked").each(function ()
	     {
	     checked.push($(this).val());
	     
	     
	     });
	     //alert(checked);
	     //check box values pass to jquery array
	     
	     
	     
	     var x = '';
	     if (x !== '') {
	     x = hidden_session;
	     }
	     // alert(x);
	     if ((x === '') && (total === 1)) {
	     x = "SELECT SQL_CALC_FOUND_ROWS * FROM form_prev_data WHERE data LIKE '%" + name + "%'";
	     //alert(x);
	     } else {
	     x = hidden_session + "AND data LIKE '%" + name + "%'";
	     }
	     
	     
	     
	     
	     $.post('search_session.php', {'session': 'data', x: x}, function (data) {
	     if (data.msgType === 1) {
	     
	     window.location.href = "search.php?subcat=" + hidden_val + "&data=" + name + "&checked=" + checked;
	     
	     }
	     
	     }, "json");//result will encode and pass to view
	     
	     
	     
	     
	     
	     }*/


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