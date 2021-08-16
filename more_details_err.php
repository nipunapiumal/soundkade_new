<?php
include 'db/db.php';
if (!isset($_SESSION)) {
    session_start();
    //$log = $_SESSION['email'];
    $log = htmlspecialchars(trim($_SESSION['email']), ENT_QUOTES, 'UTF-8');
}

//$id = $_GET['id'];
$id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');
$ebro_id = htmlspecialchars(trim($_GET['e_bro']), ENT_QUOTES, 'UTF-8');
$user = htmlspecialchars(trim($_GET['user']), ENT_QUOTES, 'UTF-8');
//echo $id;
//echo $ebro_id;
//echo $user;

if ($ebro_id == 0) {
    $sqlR = "
SELECT
form_prev_data.id AS sid,
district.district,
city.city,
main_category.category,
sub_category.sub_category,
form_prev_data.`data`,
customer_reg.name,
form_prev_data.contact_no,
form_prev_data.post_id,
form_prev_data.`date`,
form_prev_data.lat,
form_prev_data.lng,
form_prev_data.cat,
form_prev_data.ad_name
FROM
form_prev_data
Inner Join city ON city.cid = form_prev_data.city
Inner Join district ON district.did = city.did
Inner Join sub_category ON form_prev_data.subcat = sub_category.id
Inner Join main_category ON sub_category.cat_id = main_category.id
Inner Join customer_reg ON customer_reg.id = form_prev_data.`user`
WHERE
form_prev_data.id ='$id'";
}
if ($user == 0) {
    $sqlR = "
SELECT
form_prev_data.id AS sid,
district.district,
city.city,
main_category.category,
sub_category.sub_category,
form_prev_data.`data`,
erbo_register.name,
form_prev_data.contact_no,
form_prev_data.post_id,
form_prev_data.`date`,
form_prev_data.lat,
form_prev_data.lng,
form_prev_data.cat,
form_prev_data.ad_name
FROM
form_prev_data
Inner Join city ON city.cid = form_prev_data.city
Inner Join district ON district.did = city.did
Inner Join sub_category ON form_prev_data.subcat = sub_category.id
Inner Join main_category ON sub_category.cat_id = main_category.id
Inner Join erbo_register ON erbo_register.erbo_id = form_prev_data.`ebro_id`
WHERE
form_prev_data.id ='$id'";
}
//echo $sqlR;
$sqlm = mysqli_fetch_assoc(mysqli_query($conn, $sqlR));
$post_id = $sqlm['post_id'];
$cat_id = $sqlm['cat'];
$add_id = $sqlm['sid'];
$post_title = $sqlm['ad_name'];
$page_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$sqlp = mysqli_query($conn, "SELECT * FROM post_img WHERE post_id='$post_id'");
if (mysqli_num_rows($sqlp) > 0) {//this means this ad has photos
     $rowp = mysqli_fetch_array($sqlp);
     //$imageurl = "http://$_SERVER[HTTP_HOST]/";
     $imageurl ="http://mybroker.lk/post_ad/uploads/" . $post_id . "/{$rowp['img']}" ;
}
else{
     $imageurl ="http://mybroker.lk/wp-content/uploads/2015/06/logo.png" ;
}


$serialized_data = $sqlm['data']; // Unserialize the data  
$data = unserialize($serialized_data); // Show the unserialized data;

foreach ($data as $field => $value) {
    $sqlf = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM form_fields WHERE id='$field'"));
    //$sql_price="SELECT * FROM form_fields WHERE id='$field'";
    $field_name = $sqlf['name'];

    if ($field_name == 'Price') {
	$price = $value; //number_format($value,2);
    }
}


$lat = $sqlm['lat'];
$long = $sqlm['lng'];
?>
<!DOCTYPE HTML>
<html lang="en-US" class="no-js">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta property="og:url"           content="<?php echo $page_url ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?php echo $post_title ?> :mybroker.lk" />
    <meta property="og:description"   content="<?php echo $post_title ?> at mybroker.lk" />
    <meta property="og:image"         content="<?php echo $imageurl ?>" />
    <head>
        <!-- Basic Page Needs -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php echo $post_title ?> : MyBroker.lk</title>
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

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuWch6HsB-2Xj_a7gr0VpM-JJNOrLdMtE&v=3.exp&sensor=false"></script>

        <style type="text/css">
            #map-canvas { width: 100%; height:250px; }
            #address {  line-height:2; font-size:15px }
			.price, .counts {
				padding-left: 0;
			}
        </style>


        <script type="text/javascript">
	    function initialize() {
		var mapOptions = {
		    center: new google.maps.LatLng(<?php echo $lat . ', ' . $long; ?>),
		    zoom: 13
		};
		var map = new google.maps.Map(document.getElementById("map-canvas"),
			mapOptions);

<?php
echo '  var myLatlng1 = new google.maps.LatLng(' .
 $lat . ', ' . $long . '); 
      var marker1 = new google.maps.Marker({ 
        position: myLatlng1, 
        map: map, 
        //title:"' . $sqlm[contact_no] . '"
      });';
?>

	    }
	    google.maps.event.addDomListener(window, 'load', initialize);


        </script>




    </head>

    <body>
        <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

        <div class="body">
            <!-- Start Site Header -->
	    <?php include 'common/header.php'; ?>
            <!-- End Site Header --> 


            <!-- Start Content -->
            <div role="main">
                <div id="content" class="content full">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="page-title"><?php echo $sqlm['ad_name']; ?>, <span class="location sort_by_location"> For sale by <?php echo $sqlm['name']; ?> <?php echo $sqlm['city']; ?>, <?php echo $sqlm['district']; ?>.</span><span class="" style="font-size: 60%; color: #999; font-family: 'Open Sans', sans-serif!important; font-style: italic;"><i class="fa fa-clock-o" aria-hidden="true" style="color: #44a7ff; margin: 0px 5px 0 7px;"></i><?php echo $sqlm['date']; ?></span></h2>
                            </div>
                            <div class="col-md-8" id="content-col">

				<?php
				$sqlp = mysqli_query($conn, "SELECT * FROM post_img WHERE post_id='$post_id'");
				if (mysqli_num_rows($sqlp) > 1) {//this means this post has more than one images
				    ?>
    				<div class="single-property">
    				    <div class="property-slider">
    					<div id="property-images<?php echo $rowp['id']; ?>" class="flexslider">
    					    <ul class="slides">
						    <?php
						    while ($rowp = mysqli_fetch_array($sqlp)) {
							 $img_path = "post_ad/uploads/" . $post_id . "/" . $rowp['img'];
							?>
							<li class="item"><div style="width:100%; overflow:hidden"> <img src="<?php echo $img_path; ?>" alt=""> </div></li>
						    <?php } ?>
    					    </ul>
    					</div>
    					<div id="property-thumbs<?php echo $rowp['id']; ?>" class="flexslider">
    					    <ul class="slides">
						    <?php
						    $sqlps = mysqli_query($conn, "SELECT * FROM post_img WHERE post_id='$post_id'");
						    while ($rowps = mysqli_fetch_array($sqlps)) {
							$img_paths = "post_ad/uploads/" . $post_id . "/" . $rowps['img'];
							?>
							<li class="item"><div style="height:115px; width:175px; overflow:hidden"> <img src="<?php echo $img_paths; ?>" alt=""></div> </li>
						    <?php } ?>
    					    </ul>
    					</div>
    				    </div>
    				</div>
				<?php }
                else if (mysqli_num_rows($sqlp) > 0) {//This means this post only have one photo
                    $rowp = mysqli_fetch_array($sqlp);
                    $img_path = "post_ad/uploads/" . $post_id . "/" . $rowp['img'];
                    echo "<div style='margin-bottom:15px'><img src='$img_path' alt='' width='100%'></div>";

				}




                 ?>

                                <!-- Start Related Properties -->
                                <div id="related-properties-block">
				    <?php if ($sqlm['cat'] != 4 && $sqlm['cat'] != 5) { ?>
    				    <div class="row"  style="margin-left:0px;">
					<div class="price col-md-4" style="margin-bottom: 5px"><strong>Rs.</strong><span class=""><?php if ($price[2]=='.') {
                            echo substr(str_replace("Rs","" ,$price),1);
                        }else{
                            echo str_replace("Rs","" ,$price);
                        } ?></span></div>
    					<form method="post" action="check_balance_for_trans.php">
    					    <div class=" col-md-4"><select name="trans_id" class="form-control selectpicker" required="">
    						    <option>Select Transaction Type</option>

							<?php
							$sql = mysqli_query($conn, "SELECT
form_prev_data.post_id,
adds_transaction.post_id,
adds_transaction.trans_id,
transaction_type.id,
transaction_type.name
FROM
adds_transaction
Inner Join form_prev_data ON form_prev_data.post_id = adds_transaction.post_id
Inner Join transaction_type ON adds_transaction.trans_id = transaction_type.id
WHERE form_prev_data.post_id='$post_id'

");
							while ($row = mysqli_fetch_array($sql)) {
							    ?>
							    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
							<?php } ?>
    						</select></div>

    					    <input placeholder="Name" class="form-control" name="trans_email" style="display:none" value="<?php echo $log; ?>" />	    
    					    <input placeholder="Name" class="form-control" name="trans_cat_id" style="display:none" value="<?php echo $cat_id; ?>" />	    
    					    <input placeholder="Name" class="form-control" name="add_id" style="display:none" value="<?php echo $add_id; ?>" />	    
    					    <div class=" col-md-4"><button type ="submit" name ="submit" class="btn btn-primary">Create Transaction</button></div>
    					</form>
    				    </div>
				    <br>
    				   
				    <?php } ?>

    <!-- Your share button code -->
    <div class="fb-share-button"
        data-href="<?php echo $page_url ?>"
        data-layout="button_count">
    </div>
                                    
				    <span><a href="wishlist.php?add_id=<?php echo $add_id;?>&auto_id=22"><i class="fa fa-tag"></i>Add to Wishlist</a></span>
				    
                                    <br>
                                    <br>
                                    
				    <div class="widget">
                                        <h3 class="widgettitle">Ad Details</h3>

                                        <div id="address" class="tab-pane">
					    <?php
					    foreach ($data as $field => $value) {
						$sqlf1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM form_fields WHERE id='$field'"));
						$field_name1 = $sqlf1['name'];

						if ($field_name1 != 'Price') {
						    ?>
						    <strong><?php echo $sqlf1['name']; ?>:</strong> <?php echo $value; ?><br/>
						    <?php
						}
					    }
					    ?>
                                        </div>
                                    </div>
                                    <br>
                                </div>
				
                            </div>
                            <!-- Start Sidebar --> 
                            <br>
                            <br>
                            <br>
                            <div class="sidebar right-sidebar col-md-4">
                                <div id="map-canvas"></div><br>
                                <style type="text/css">
                                    /*#txt_contact_num:hover{
                                        color:#428bca;
                                    }*/
                                    #txt_contact_num small:hover{
                                        color:#428bca;
                                    }
                                </style>
                                <div class="widget">
                                    <h3 class="widgettitle">CONTACT SELLER</h3>
                                    <div class="agent sidebar-agent-profile" >
                                        <h4 id="txt_contact_num" class="margin-0"><i class="fa fa-phone"></i> &nbsp;<?php echo substr($sqlm['contact_no'],0,-3); ?>XXX <a id="contact_no_sal"><small>&nbsp; Click to show phone number</small></a></h4>
                                    </div>
                                    
                                    <div id="txt_contact_num_atc" class="agent sidebar-agent-profile" style="display: none;">
                                        <h4 class="margin-0"><i class="fa fa-phone"></i> &nbsp;<?php echo $sqlm['contact_no']; ?></h4>
                                    </div>
                                </div>
                                
                                <br>
                                <div class="widget">
                                    <h3 class="widgettitle">Share this ad</h3>
                                    <div id="description">
                                        <div class="share-bar">
                                            <ul class="share-buttons">
                                                <li class="share-title"><i class="fa fa-share-alt"></i></li>
                                                <li class="facebook-share"><a href="https://www.facebook.com" target="_blank" title="Share on Facebook"><i class="fa fa-facebook"></i></a></li>
                                                <li class="twitter-share"><a href="https://twitter.com" target="_blank" title="Tweet"><i class="fa fa-twitter"></i></a></li>
                                                <li class="google-share"><a href="https://plus.google.com" target="_blank" title="Share on Google+"><i class="fa fa-google-plus"></i></a></li> 
                                                <li class="linkedin-share"><a href="http://www.linkedin.com" target="_blank" title="Share on Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                                <li class="email-share"><a href="#" title="Email"><i class="fa fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <br>
				    <?php if ($sqlm['cat'] != 4 && $sqlm['cat'] != 5) { ?>
    				    <div class="price"><strong>Rs.</strong><span class=""><?php echo $price; ?></span></div>
				    <?php } ?>

                                    <br>
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
        <script type="text/javascript">
            $(document).ready(function(){
                $("#contact_no_sal").click(function(){
                    $("#txt_contact_num").css("display","none");
                    $("#txt_contact_num_atc").fadeIn();
                });
            });
        </script>
    </body>
</html>