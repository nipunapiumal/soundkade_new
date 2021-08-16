<?php 
if (!isset($_SESSION)) {
  session_start();
  //$log = $_SESSION['email'];
  $log = htmlspecialchars(trim($_SESSION['email']), ENT_QUOTES, 'UTF-8');
}
?>
<header class="site-header" >
  <div class="top-header hidden-xs">
    <div class="container-flud" style="margin: 0 45px;">
      <div class="row">
        <div class="col-md-4 col-sm-6">
          <ul class="horiz-nav pull-left">
            <li>  <?php if(empty($log)) { ?>
            <a href="login.php"> <i class="fa fa-user"></i> Login </a> 
            <?php  } else { ?> <a href="logout.php"> <i class="fa fa-sign-out"></i> Logout </a> <?php } ?>
            </li>
            <?php if(!empty($log)) { ?>
              <li><a><?php echo $_SESSION['name']; ?></a></li>
            <?php } ?>
            
          </ul>
        </div>
        <div class="col-md-8 col-sm-6">
          <ul class="horiz-nav pull-right">
            <li><a href="http://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://instagram.com/accounts/login/" target="_blank"><i class="fa fa-instagram"></i></a></li>
            <li><a href="http://www.twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <?php if(!empty($log)) { ?>
              <li><a href="my_Acc/"><i class="fa fa-user"></i> &nbsp;My Account</a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="middle-header">
    <div class="container-flud" style="margin: 0 45px;">
      <div class="row">
        <div class="col-md-4 col-sm-8 col-xs-8">
            <h1 class="logo"> <a href="index.php" title="MyBroker.lk"><img src="wp-content/uploads/2015/06/logo.png" alt="Logo"></a> </h1>
        </div>
        <div class="col-md-8 col-sm-4 col-xs-4">
          <div class="contact-info-blocks hidden-sm hidden-xs">
			<div> <i class="fa fa-phone"></i> Contact Us <span>(+94)761181017</span> </div>
            <div> <i class="fa fa-envelope"></i> Email Us <span>info@mybroker.lk</span> </div>
            <!--<div> <i class="fa fa-clock-o"></i> Working Hours <span>09:00 to 17:00</span> </div>-->
		  </div>
          <a href="#" class="visible-sm visible-xs menu-toggle"><i class="fa fa-bars"></i></a> </div>
      </div>
    </div>
  </div>
  <div class="main-menu-wrapper">
    <div class="container-flud" style="margin: 0 45px;">
      <div class="row">
        <div class="col-md-12">
          <nav class="navigation">
            <ul id="menu-main-menu" class="sf-menu">
              <li id="menu-item-240" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-240"><a href="index.php">Home</a></li>
              <li id="menu-item-240" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-240"><a href="about_us.php">About Us</a></li>
              <li id="menu-item-240" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-240"><a href="contact_us.php">Contact Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li id="menu-item-240" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-240"><a style="
    color: #fff;font-weight: 600; background: #f25525; border-top-color: #a73b1b;" href="<?php
        if (empty($log)) {
            echo 'login.php';
        } else {
            echo 'post_ad/';
        }
        ?>">
                                    
                                POST YOUR AD</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>