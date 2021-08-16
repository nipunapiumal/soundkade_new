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
<link rel="shortcut icon" href="wp-content/themes/real-spaces/images/favicon.ico" />
<!-- CSS  ============ -->
<link rel='stylesheet' id='imic_bootstrap-css'  href='wp-content/themes/real-spaces/css/bootstrap8a54.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='imic_animations-css'  href='wp-content/themes/real-spaces/css/animations8a54.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='imic_font_awesome-css'  href='wp-content/themes/real-spaces/css/font-awesome.min8a54.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='imic_main-css'  href='wp-content/themes/real-spaces-child/style8a54.css?ver=1.0.0' type='text/css' media='all' />
<script type='text/javascript' src='wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4' defer></script>
<script type='text/javascript' src='wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1' defer></script>
<style>
h3.title {
	text-transform: uppercase;
	font-size: 20px;
	color: #f25525;
	font-weight: 500;
}
</style>
</head>

<body>
<div class="body"> 
  
  <!-- Start Site Header -->
  <?php include 'common/header.php'; ?>
  <!-- End Site Header -->
  
  <div class="site-showcase"> 
    <!-- Start Page Header -->
    <div class="parallax page-header" style="background-image:url(img/aboutus-banner.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><font color="#000">About Us</font></h1>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Header --> 
  </div>
  <div class="" role="">
    <div id="content" class="content full">
      <div class="container">
        <div class="row">
          <div class="col-md-12" id="content-col">
            <div class="row">
              <div class="col-md-12">
                <h3 class="title">About Soundkade.lk</h3>
                <hr>
                <!-- <p>My broker.lk is serving E-businesses celebrates their low-cost start-up mobile App. compared to the traditional internet market to the world. My broker’s modernized technology gets more advanced, less expensive and more available, it has become even easier to start a business to the interest individuals. Mobile phone is smart enough than a computer and access to the internet and particular product. My broker App gives access to a much larger customer base than your personal contacts or people over the Earth. </p>
                <p> My broker services are provided to you by <strong>My Broker Pvt Ltd, No 1112, Pannipitiya Road, Battaramulla, Sri Lanka.</strong> In order to access and use some or a portion of the services, company may be required to register with the company. </p> -->
                <p>Welcome to soundkade.lk, offering Sri Lanka  the best in cutting edge karaoke speaker, home theater, hi-fi audio, musical instruments and custom control systems for homes and businesses. Locally owned, soundkade.lk has been a fixture of Colombo 07 since 2020. Our showroom represents the finest manufacturers in the industry. We offer competitive pricing, an unbeatable trade-up program, and quality new and used options for every budget.</p>
                <!--<h3 class="title">Mission &amp; Vision</h3>-->
                <hr>
          <!--      <h4>VISION</h4>-->
                <!-- <p>To be the most convenient business partner in Sri Lanka at the E market sector.</p> -->
          <!--      <h4>MISSION</h4>-->
          <!--      <p></p>-->
          <!--      <br>-->
          <!--    </div>-->
          <!--    <div class="col-md-6">-->
          <!--      <h3 class="title">Background of Soundkade.lk</h3>-->
          <!--      <hr>-->
                <!-- <p>My broker is one of largest classifieds site with thousands of live Ads in a wide range of categories – vehicles, housing, jobs, marriage proposals and everything in between. Every five seconds you can see new Ads and we’re proud to help our customers both in sales and buyers side to help the country economic boom while without country waste, time, spaces, transport and also money in every second. My broker serves environmentally friendly and local way to see, touch and try an item before you buy it.</p> -->
          <!--      <h3 class="title">Business location</h3>-->
          <!--      <hr>-->
                <!-- <p>No 1112, Pannipitiya road, Battaramulla is the main office of the business. Branches or customer service center will be ready at provincial locations as per the customer volume.</p> -->
          <!--      <h3 class="title">Service layout</h3>-->
          <!--      <hr>-->
                <!-- <p>Brokers and E brokers serve to the customers to initiate the advertisement and establish the link with my broker. When initiated to the advertisement consisting pictures and relevant information will appear on the site and just in time the inquiry will generate for customer to customer C2C, business to business B2B, Business to Customer B2C etc.</p> -->
          <!--    </div>-->
          <!--  </div>-->
          <!--</div>-->
          <!--<div class="col-md-12" id="content-col">-->
          <!--  <div class="row"><br>-->
          <!--    <div class="col-md-12 " >-->
               <!-- <div class="block-heading">			remove coment after the free period
          <!--        <h4 class=""><span class="heading-icon"><i class="fa fa-question"></i></span>FAQs FROM THE SELLER</h4>  -->
          <!--      </div>-->
          <!--      <div class="accordion" id="toggless">-->
          <!--        <div class="accordion-group panel">-->
          <!--          <div class="accordion-inner">-->
          <!--            <ul class="chevrons icon">-->
          <!--              <li> <i class="fa fa-caret-right"></i><i class="icon icon-envelope-alt"></i> Is it safety at my broker.lk for transaction and advertising?</li>-->
          <!--              <li> <i class="fa fa-caret-right"></i><i class="icon icon-film"></i> How to post an Ad step by step guide?</li>-->
          <!--              <li> <i class="fa fa-caret-right"></i><i class="icon icon-film"></i> How long are Ads active?</li>-->
          <!--              <li> <i class="fa fa-caret-right"></i><i class="icon icon-film"></i> How to post an effective Ad?</li>-->
          <!--              <li> <i class="fa fa-caret-right"></i><i class="icon icon-film"></i> Can I double check my Ad and category?</li>-->
          <!--            </ul>-->
          <!--            <p><strong>Answer:</strong> When you posting an Ad in services, real estates, jobs, used cars, trucks or vacation rentals, you have opportunity choose one to three visibility plans;</p>-->
          <!--            <strong>Ad Choice</strong>-->
          <!--            <ol type="i" class="faq">-->
          <!--              <li> &nbsp;Basic Standard Ad (The Detail Are As Follows) Duration – 60 Days-->
          <!--                <ul class="chevrons icon">-->
          <!--                  <li><i class="fa fa-check"></i><i class="icon icon-envelope-alt"></i> <strong>Vehicle - Rs 300.00 (Ad plus three pictures as you wish)</strong></li>-->
          <!--                  <li><i class="fa fa-check"></i><i class="icon icon-film"></i> <strong>Home - Rs. 500.00 (Ad plus three pictures as you wish)</strong></li>-->
          <!--                  <li><i class="fa fa-check"></i><i class="icon icon-film"></i> <strong>Land - Rs. 500.00 (Ad plus three pictures as you wish)</strong></li>-->
          <!--                  <li><i class="fa fa-check"></i><i class="icon icon-film"></i> <strong>Marriage - Rs. 1000.00 (Ad plus three pictures as you wish)</strong></li>-->
          <!--                  <li><i class="fa fa-check"></i><i class="icon icon-film"></i> <strong>Labour - Rs. 1000.00 (Ad plus three pictures as you wish)</strong></li>-->
          <!--                </ul>-->
  
          <!--              </li>-->
          <!--              <li> &nbsp;Most Popular Visibility Ad With Ten Pictures)</li>-->
          <!--              <li> &nbsp;Maximum Visibility and automatic bump up every 7 days with 20 pictures.</li>-->
          <!--              <li> &nbsp;Ads in most categories stay on my broker for 60 days. After 60 days automatically deleted. If few days prior to when your Ad is set to expire, you will receive an email notification with the option to re post it. Re posting an Ad extends its life by another 60 days period, and brings it back to the top of the first page of its category.</li>-->
          <!--              <li> &nbsp;Reposting Ad may extend by another 30 days period. If you would like to re post your Ad to the top of the search result page before it expires. </li>-->
          <!--              <li> &nbsp;It is easy to post an Ad online quickly. But to maximize your effort, consider the many ways your Ad might be improved upon for better results. There are many factors to creating an effective classified ad. Here are a few trips from our experts.</li>-->
          <!--              <li> &nbsp;How effective an internet Ad is depending very strongly on the ability of potential buyers to locate the posting. The more detail you can provide on item, the higher the quality of the leads will be.</li>-->
          <!--              <li> &nbsp;Ads with photos receive higher quality, more serious replies that those without. Adding well lit, good quality images to your Ad will go a long way in creating buyer interest. Unlike newspaper classified, there is no cost to post a picture on my broker, so take advantage and include images on your Ads to maximize both free and paid advertising.</li>-->
          <!--              <li> &nbsp;It is important to ensure that you post your ad to the correct location and category. Make sure your price is in line with the current market. People expect used items to be significantly lower in price than new items. Conducting a price comparison on my broker can help ensure your items are in line with the help desk.</li>-->
          <!--            </ol>-->
          <!--          </div>-->
          <!--        </div>-->
          <!--      </div>-->
          <!--    </div>-->
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
<script type='text/javascript' src='wp-content/themes/real-spaces/plugins/prettyphoto/js/prettyphoto8a54.js?ver=1.0.0' defer></script> 
<script type='text/javascript' src='wp-content/themes/real-spaces/plugins/flexslider/js/jquery.flexslider8a54.js?ver=1.0.0' defer></script> 
<script type='text/javascript' src='wp-content/themes/real-spaces/js/helper-plugins8a54.js?ver=1.0.0' defer></script> 
<script type='text/javascript' src='wp-content/themes/real-spaces/js/bootstrap8a54.js?ver=1.0.0' defer></script> 
<script type='text/javascript'>
	    /* <![CDATA[ */
	    var urlajax = {"url": "", "tmpurl": "", "is_property": "", "sticky": "1", "is_contact": "", "home_url": "", "is_payment": "", "register_url": "", "is_register": "", "is_login": "", "is_submit_property": "", "BASIC": "BASIC", "ADVANCED": "ADVANCED"};
	    /* ]]> */
        </script> 
<script type='text/javascript' src='wp-content/themes/real-spaces/js/init8a54.js?ver=1.0.0' defer></script> 
<script type='text/javascript' src='wp-includes/js/jquery/ui/widget.mine899.js?ver=1.11.4' defer></script>
        <!-- hide header search -->
        <script type="text/javascript">
        			document.getElementById("searchbar").style.display = "none";
        			document.getElementById("headerinfo").style.display = "none";
        </script>

</body>
</html>