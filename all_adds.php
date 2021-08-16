<?php
if (!isset($_SESSION)) {
    session_start();
    //$log = $_SESSION['email'];
     $log = htmlspecialchars(trim($_SESSION['email']), ENT_QUOTES, 'UTF-8');
}
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
                <div class="" style="background-color:#efefef;padding:10px">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="search">
                                    <form method="get" id="searchform" action="#">
                                        <div class="col-md-3">
                                            <div class="input-group input-group-lg" style="width:100%">
                                                <select name="location" class="form-control selectpicker">
                                                    <option selected>Any</option>
                                                    <option>Colombo</option>
                                                    <option>Kurunegala</option>
                                                    <option>Kegalle</option>
                                                    <option>Kandy</option>
                                                    <option>Anuradhapura</option>
                                                    <option>Ampara</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group input-group-lg" style="width:100%">
                                                <select name="cat" class="form-control selectpicker">
                                                    <option selected>Any</option>
                                                    <option>Cars & Vehicles</option>
                                                    <option>Home/Property</option>
                                                    <option>Land Sale</option>
                                                    <option>Labour Supply</option>
                                                    <option>Marriage</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-lg">
                                                <input type="text" class="form-control" name="s" id="s" value="" />
                                                <span class="input-group-btn">
                                                    <button type ="submit" name ="submit" class="btn btn-primary"><i class="fa fa-search fa-lg"></i></button>
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
                            <div class="sidebar right-sidebar col-md-3" id="sidebar-col" style="padding:15px">
                                <div id="search_properties-3" class="widget sidebar-widget widget_search_properties">
                                    <div class="sidebar-widget-title">
                                        <h3 class="widgettitle">Cars & Vehicles</h3>
                                    </div>
                                    <div class="full-search-form">
                                        <form method="get" action="#">
                                            <input type="hidden" class="form-control" name="s" id="s" value="Search1" />
                                            <div class="search_by">
                                                <div>
                                                    <h5>Sub Category</h5>
                                                    <ul class="chevrons icon"> 
                                                        <li><i class="fa fa-check-square"></i> <a href="#">Cars</a></li>
                                                        <li><i class="fa fa-check-square"></i> <a href="#">Motorbikes & Scooters</a></li>
                                                        <li><i class="fa fa-check-square"></i> <a href="#">Three Wheelers</a></li>
                                                        <li><i class="fa fa-check-square"></i> <a href="#">Vans, Buses & Lorries</a></li>
                                                        <li><i class="fa fa-check-square"></i> <a href="#">Heavy Machinery & Tractors</a></li>
                                                        <li><i class="fa fa-check-square"></i> <a href="#">Auto Parts & Accessories</a></li>
                                                    </ul>
                                                </div>
                                            </div><br>
                                            <div>
                                                <label>Select Category</label>
                                                <select name="category" class="form-control selectpicker">
                                                    <option selected>Any</option>
                                                    <option>Cars & Vehicles</option>
                                                    <option>Home/Property</option>
                                                    <option>Land Sale</option>
                                                    <option>Labour Supply</option>
                                                    <option>Marriage</option>
                                                </select>
                                                <label>Select Location</label>
                                                <select name="location" class="form-control selectpicker">
                                                    <option selected>Any</option>
                                                    <option>Colombo</option>
                                                    <option>Kurunegala</option>
                                                    <option>Kegalle</option>
                                                    <option>Kandy</option>
                                                    <option>Anuradhapura</option>
                                                    <option>Ampara</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-danger btn-block"><i class="fa fa-search"></i> Search</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9" id="content-col">
                                <div class="property-listing row">
                                    <ul class="col-md-12" id="property_grid_holder">
                                        <li class="type-rent col-md-12">
                                            <div id="property67" style="display:none;"><span class ="property_address">55 East 52nd St</span><span class ="property_price"><strong>&#36;</strong> <span> 1450000</span></span><span class ="latitude">40.7590777</span><span class ="longitude">-73.97361480000001</span><span class ="property_image_map">http://wp1.imithemes.com/real-spaces-wp/wp-content/uploads/2014/06/property4-150x100.jpg</span><span class ="property_url">http://wp1.imithemes.com/real-spaces-wp/?property=55-east-52nd-street</span><span class ="property_image_url">http://wp1.imithemes.com/real-spaces-wp/wp-content/themes/real-spaces/images/map-marker.png</span></div>
                                            <div class="col-md-4"> <a href="../indexb662.html?property=55-east-52nd-street" class="property-featured-image"><img src="../wp-content/uploads/2014/06/property4-600x400.jpg" class="attachment-600-400-size size-600-400-size wp-post-image" alt="" srcset="http://wp1.imithemes.com/real-spaces-wp/wp-content/uploads/2014/06/property4.jpg 600w, http://wp1.imithemes.com/real-spaces-wp/wp-content/uploads/2014/06/property4-300x200.jpg 300w, http://wp1.imithemes.com/real-spaces-wp/wp-content/uploads/2014/06/property4-150x100.jpg 150w, http://wp1.imithemes.com/real-spaces-wp/wp-content/uploads/2014/06/property4-100x67.jpg 100w" sizes="(max-width: 600px) 100vw, 600px" /><span class="images-count"><i class="fa fa-picture-o"></i> 3</span> <span class="badges badge-sale">Sale</span> </a> </div>
                                            <div class="col-md-8">
                                                <div class="property-info">
                                                    <div class="price"><strong>Rs.</strong><span class="">145,000</span></div>
                                                    <h3><a href="../indexb662.html?property=55-east-52nd-street">55 East 52nd Street</a><span class="pid"> (rs-1715)</span></h3>
                                                    <a class="accent-color" data-original-title="" data-toggle="tooltip" style="cursor:default; text-decoration:none;" href="javascript:void(0);"><span class="location">Pennsylvania</span></a><br>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vehicula dapibus mauris, quis ullamcorper enim aliquet sed. Maecenas quis eget tellus dui. Vivamus condimentum egestas. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod sollicitudin nunc, eget pretium massa. Ut sed adipiscing enim, pellentesque ultrices erat. Integer placerat felis</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="type-rent col-md-12">
                                            <div id="property71" style="display:none;"><span class ="property_address">Jackson</span><span class ="property_price"><strong>&#36;</strong> <span> 3500/month</span></span><span class ="latitude">32.2987573</span><span class ="longitude">-90.18481029999998</span><span class ="property_image_map">http://wp1.imithemes.com/real-spaces-wp/wp-content/uploads/2014/06/property5-150x100.jpg</span><span class ="property_url">http://wp1.imithemes.com/real-spaces-wp/?property=4-new-york-plaza</span><span class ="property_image_url">http://wp1.imithemes.com/real-spaces-wp/wp-content/themes/real-spaces/images/map-marker.png</span></div>
                                            <div class="col-md-4"> <a href="../index15e1.html?property=4-new-york-plaza" class="property-featured-image"><img src="../wp-content/uploads/2014/06/property5-600x400.jpg" class="attachment-600-400-size size-600-400-size wp-post-image" alt="" srcset="http://wp1.imithemes.com/real-spaces-wp/wp-content/uploads/2014/06/property5.jpg 600w, http://wp1.imithemes.com/real-spaces-wp/wp-content/uploads/2014/06/property5-300x200.jpg 300w, http://wp1.imithemes.com/real-spaces-wp/wp-content/uploads/2014/06/property5-150x100.jpg 150w, http://wp1.imithemes.com/real-spaces-wp/wp-content/uploads/2014/06/property5-100x67.jpg 100w" sizes="(max-width: 600px) 100vw, 600px" /><span class="images-count"><i class="fa fa-picture-o"></i> 3</span> <span class="badges badge-rent">Rent</span> </a> </div>
                                            <div class="col-md-8">
                                                <div class="property-info">
                                                    <div class="price"><strong>Rs.</strong><span class="">3,500</span></div>
                                                    <h3><a href="../index15e1.html?property=4-new-york-plaza">459 West Broadway</a><span class="pid"> (rs-1719)</span></h3>
                                                    <a class="accent-color" data-original-title="" data-toggle="tooltip" style="cursor:default; text-decoration:none;" href="javascript:void(0);"><span class="location">California</span></a><br>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vehicula dapibus mauris, quis ullamcorper enim aliquet sed. Maecenas quis eget tellus dui. Vivamus condimentum egestas. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod sollicitudin nunc, eget pretium massa. Ut sed adipiscing enim, pellentesque ultrices erat. Integer placerat felis</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="type-rent col-md-12">
                                            <div id="property75" style="display:none;"><span class ="property_address">125 Worth Street</span><span class ="property_price"><strong>&#36;</strong> <span> 600000</span></span><span class ="latitude">40.7156814</span><span class ="longitude">-74.00233370000001</span><span class ="property_image_map">http://wp1.imithemes.com/real-spaces-wp/wp-content/uploads/2014/06/property7-150x100.jpg</span><span class ="property_url">http://wp1.imithemes.com/real-spaces-wp/?property=125-worth-street</span><span class ="property_image_url">http://wp1.imithemes.com/real-spaces-wp/wp-content/themes/real-spaces/images/map-marker.png</span></div>
                                            <div class="col-md-4"> <a href="../index4ff1.html?property=125-worth-street" class="property-featured-image"><img src="../wp-content/uploads/2014/06/property7-600x400.jpg" class="attachment-600-400-size size-600-400-size wp-post-image" alt="" srcset="http://wp1.imithemes.com/real-spaces-wp/wp-content/uploads/2014/06/property7.jpg 600w, http://wp1.imithemes.com/real-spaces-wp/wp-content/uploads/2014/06/property7-300x200.jpg 300w, http://wp1.imithemes.com/real-spaces-wp/wp-content/uploads/2014/06/property7-150x100.jpg 150w, http://wp1.imithemes.com/real-spaces-wp/wp-content/uploads/2014/06/property7-100x67.jpg 100w" sizes="(max-width: 600px) 100vw, 600px" /><span class="images-count"><i class="fa fa-picture-o"></i> 3</span> <span class="badges badge-sale">Sale</span> </a> </div>
                                            <div class="col-md-8">
                                                <div class="property-info">
                                                    <div class="price"><strong>Rs.</strong><span class="">60,000</span></div>
                                                    <h3><a href="../index4ff1.html?property=125-worth-street">125 Worth Street</a><span class="pid"> (rs-1723)</span></h3>
                                                    <a class="accent-color" data-original-title="" data-toggle="tooltip" style="cursor:default; text-decoration:none;" href="javascript:void(0);"><span class="location">Connecticut</span></a><br>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vehicula dapibus mauris, quis ullamcorper enim aliquet sed. Maecenas quis eget tellus dui. Vivamus condimentum egestas. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod sollicitudin nunc, eget pretium massa. Ut sed adipiscing enim, pellentesque ultrices erat. Integer placerat felis</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
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

    </body>
</html>