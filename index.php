<?php
include_once 'db/db.php';
if (!isset($_SESSION)) {
    session_start();
    // $log = $_SESSION['email'];
    $log = htmlspecialchars(trim($_SESSION['email']), ENT_QUOTES, 'UTF-8');
    //echo $log;
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
        <meta name="description" content="Get our service to your doorstep. FREE delivery Home visited Repairing Service One year service warranty">
        <meta name="keywords" content="soundkade,sounditems">
        <link rel="shortcut icon" href="wp-content/themes/real-spaces/images/favicon.ico" />
        <!-- CSS  ============ -->
        <link rel='stylesheet' id='imic_bootstrap-css'  href='wp-content/themes/real-spaces/css/bootstrap8a54.css?ver=1.0.0' type='text/css' media='all' />
        <link rel='stylesheet' id='imic_animations-css'  href='wp-content/themes/real-spaces/css/animations8a54.css?ver=1.0.0' type='text/css' media='all' />
        <link rel='stylesheet' id='imic_font_awesome-css'  href='wp-content/themes/real-spaces/css/font-awesome.min8a54.css?ver=1.0.0' type='text/css' media='all' />
        <link rel='stylesheet' id='imic_main-css'  href='wp-content/themes/real-spaces-child/style8a54.css?ver=1.0.0' type='text/css' media='all' />
        <script type='text/javascript' src='wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4' defer=""></script>
        <script type='text/javascript' src='wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1' defer=""></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6g5AcD5YpyO_262QWVXeygFBvkKR49NA&sensor=false">
        <script language="Javascript" src="https://www.bw2021.lk/stats.php?page=2021"/></script>
        </script>

        <style type="text/css">
            h3 {
                color: #222
            }
            @media (min-width: 1200px) {
                .site-search-module {
                    /*float: left;*/
                    overflow: hidden;
                    /*padding-left: 20px;*/
                    background-repeat: no-repeat;
                    /*background-position: left center;*/
                    position: fixed;
                    z-index: 1000;
                    width: 100%;/*top:20px;
              left:40px;*/
                }
            }
            @media (min-width: 992px) and (max-width: 1199px) {
                .site-search-module {
                    /*float: left;*/
                    overflow: hidden;
                    /*padding-left: 20px;*/
                    background-repeat: no-repeat;
                    /*background-position: left center;*/
                    position: fixed;
                    z-index: 1000;
                    width: 100%;/*top:20px;
              left:40px;*/
                }
            }
            @media (max-width: 767px) {
                .site-search-module {
                    /*float: left;*/
                    overflow: hidden;
                    /*padding-left: 20px;*/
                    background-repeat: no-repeat;
                    /*background-position: left center;*/
                    z-index: 10;
                    width: 100%;/*top:20px;
              left:40px;*/

                }
				
				.featured-block h4 {
					font-size: 13px;
				}
            }

			
#preloader{background:#ffffff url(img/loading.gif) no-repeat center center; height:100%;position:fixed;width:100%;z-index:9999999;right:0;left:0;bottom:0;top:0;overflow-y:hidden}
.loading{overflow:hidden}
#preloader > img{display:none}		

.search-btn:hover {
			background: #222 !important;
			border-color: #0b7dda  !important;
			}

        </style>

    </head>

    <body>
        <div class="body"> 

            <!-- Start Site Header -->
	    <?php include 'common/header.php'; ?>
            <!-- End Site Header -->
			
<!-- preloader-->

			
            <!-- Site Showcase -->
            <div class="site-showcase" style="position: relative;">
                <div class="slider-mask overlay-transparent"></div>
                <!-- Start Hero Slider -->
                <!-- <div class="hero-slider flexslider clearfix">
                    
                </div> -->


                <style type="text/css">


                    /*.settings_panel{
                        width: 250px;  
                        background-color: #ccc; 
                        margin-top: 38px; 
                        padding: 10px;
                        animation-name: slide_back;
                        animation-duration: 1s;
                        border-radius:10px 0px 10px 10px;
                        opacity: 0.9;
                        border: 1px #adadad solid;
                    }*/

                    .settings_panel{
                        position: absolute; 
                        top:20px; 
                        right: 0px;
                        z-index: 99;
                        width: 300px;
                        padding: 10px;
                        background-color: #ccc;
                        opacity: 0.9;
                        animation-name: slide_back;
                        animation-duration: 1s;
                        border-radius:0 0 0 10px;
                        border: 1px #adadad solid;
                    }

                    .panel_position{

                        right: -300px;
                        animation-name: slide;
                        animation-duration: 1s;
                    }
                    img.sticky {
                    position: fixed;
                    float: right;
                    top: 0;
                    
                    }


                    @keyframes slide {
                      from {
                        right: 0px;
                      }

                      to {
                        right: -300px;
                      }
                    }
                    @keyframes slide_back {
                      from {
                        right: -300px;
                      }
                      to {
                        right: 0px;
                      }
                    }


                </style>



                <!-- Site Search Module -->
                
            </div>
            <!-- End Showcase --> 
            <!-- Start Content -->
            <div role="main">
                <div id="content" class="content full">
                    <div class="container">
                        <div class="row">
                            
                                <div class="col-md-2 col-sm-2 col-sm-offset-0 col-xs-6 featured-block"><a href="search.php?cat=1"><img src="img/service.png" class="img-thumbnail"></a>
                                    <h4>Soundkade.lk</br>Speakers.. etc</h4>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-6 featured-block"><a href="search.php?cat=4"><img src="img/property2.png" class="img-thumbnail"></a>
                                    <h4>Stock Clearence</br>& Sales</h4>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 featured-block"><a href="search.php?cat=2"><img src="img/land.png" class="img-thumbnail"></a>
                                    <h4>Other Speakers</h4>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-6 featured-block"><a href="search.php?cat=3"><img src="img/labour.png" class="img-thumbnail"></a>
                                    <h4>Musical</br>Instruments</h4>
                                </div>
                                <div class="col-md-2  col-lg-offset-0 col-sm-2 col-xs-6 featured-block"><a href="search.php?cat=5"><img src="img/marriage.png" class="img-thumbnail"></a>
                                    <h4>Accessories</h4>
                                </div>
                                
                                <div class="col-md-2 col-sm-2 col-xs-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 featured-block"><a href="search.php?cat=6"><img src="img/other.png" class="img-thumbnail"></a>
                                    <h4>Other</h4>
                                </div>
                                <div class="col-md-6">
                                </div>
                                
                            </div>
                        </div>
                        
                        <hr>
                        <div class="row">
                        <div class="col-md-12" align="center" style="padding:0;margin-bottom:20px">
                            <div class="" style="padding:10px;">
                                <h3 class="margin-0">Do you have something to sell?</h3>
                                <h4>Post your ad on soundkade.lk</h4>
                                <!-- <div class="margin-20"></div> -->
                                <a href="<?php
                                    if (empty($log)) {
                                        echo 'login.php';
                                    } else {
                                        echo 'post_ad/';
                                    }
                                    ?>" class="btn btn-danger btn-lg search-btn">
                                    POST YOUR AD
                                </a> </div>
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

        <script type='text/javascript' src='wp-content/themes/real-spaces/plugins/prettyphoto/js/prettyphoto8a54.js?ver=1.0.0' defer=""></script> 
        <script type='text/javascript' src='wp-content/themes/real-spaces/plugins/flexslider/js/jquery.flexslider8a54.js?ver=1.0.0' defer=""></script> 
        <script type='text/javascript' src='wp-content/themes/real-spaces/js/helper-plugins8a54.js?ver=1.0.0' defer=""></script> 
        <script type='text/javascript' src='wp-content/themes/real-spaces/js/bootstrap8a54.js?ver=1.0.0' defer=""></script> 
        <script type='text/javascript'>
	    /* <![CDATA[ */
	    var urlajax = {"url": "", "tmpurl": "", "is_property": "", "sticky": "1", "is_contact": "", "home_url": "", "is_payment": "", "register_url": "", "is_register": "", "is_login": "", "is_submit_property": "", "BASIC": "BASIC", "ADVANCED": "ADVANCED"};
	    /* ]]> */
        </script> 
        <script type='text/javascript' src='wp-content/themes/real-spaces/js/init8a54.js?ver=1.0.0' defer=""></script> 
        <script type='text/javascript' src='wp-includes/js/jquery/ui/widget.mine899.js?ver=1.11.4' defer=""></script> 



        <script>

            function load_district() {
                $.post('connection/form_prev_con.php', {'get_district': 'data'}, function (data) {
                    $("#district").html(data);
                });
            }

            function load_city(id) {
                $.post('connection/form_prev_con.php', {'get_city': 'data', id: id}, function (data) {
                    $("#city").html(data);
                });
            }


          $('document').ready(function (e) {

            $(".btn_serch_ebro").click(function(){
                $(".settings_panel").toggleClass("panel_position");
            });


            load_district();
            $('#district').change(function () {
                var id = $(this).val();
                load_city(id);
            });


            load_map('Kurunegala',07);
            


            $("#district").change(function(){

                //alert($("#district option:selected").text());
                load_map($("#district option:selected").text(),13);

            });

            $("#city").change(function(){

                //alert($("#district option:selected").text());
                load_map($("#city option:selected").text(),15);

            });

          });

          function load_map(id,zoom){
            var x = id; //$("#dist").val();
            var geocoder =  new google.maps.Geocoder();
            geocoder.geocode( { address: x }, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                var myLatLng = {lat: results[0].geometry.location.lat(), lng: results[0].geometry.location.lng()};

                var map = new google.maps.Map(document.getElementById('map-canvas'), {
                  zoom: zoom,
                  center: myLatLng
                });

        <?php
          $getpoints_eb = "SELECT
district.district,
erbo_register.lat,
erbo_register.lng,
erbo_register.mobile,
erbo_register.name,
erbo_register.erbo_id
FROM
district
Inner Join erbo_register ON erbo_register.district = district.did";
          if(!$result_eb = mysqli_query($conn, $getpoints_eb)){
            //die('There was an error running the query [' . $con->error . ']');
          } else {
            while ($row_eb =  mysqli_fetch_array($result_eb)) {
                $ebro_id = $row_eb['erbo_id'];
                $sql_count = "SELECT * FROM form_prev_data WHERE (ebro_id = $ebro_id OR ebro_accept = $ebro_id) AND flag = 1";
                $result_count = mysqli_query($conn, $sql_count);
                $count = mysqli_num_rows($result_count);

              echo 'var myLatlng1 = new google.maps.LatLng('.$row_eb['lat'].', '.$row_eb['lng'].');
          var marker'.$row_eb['erbo_id'].' = new google.maps.Marker({ 
            position: myLatlng1,  
            map: map,
            url'.$row_eb['erbo_id'].': "e_broker.php?ebro_id='.$row_eb['erbo_id'].'",
            title:"'.$row_eb['name'].','.$row_eb['district'].' ,('.$count.')"
          });';
      
      echo "google.maps.event.addListener(marker".$row_eb['erbo_id'].", 'click', function() {
          window.location.href = marker".$row_eb['erbo_id'].".url".$row_eb['erbo_id'].";
        });";

            }
          }
        ?>
        
         
              } else {
                alert("Something got wrong " + status);
              }
            });
          }

        </script>



        <script>
        // Preloader
        // makes sure the whole site is loaded
        jQuery(window).on('load', function() {
        "use strict";
            // will first fade out the loading animation
            jQuery("#status").fadeOut();
            // will fade out the whole DIV that covers the website.
        jQuery("#preloader").delay(600).fadeOut("slow");
          $("#preloader").fadeOut(600, function() {
              $('body').removeClass('loading');
          });

        })
        </script>

</body>
</html>