<?php
if (!isset($_SESSION)) {
  session_start();
  //$log = $_SESSION['email'];
  $log = htmlspecialchars(trim($_SESSION['email']), ENT_QUOTES, 'UTF-8');
}
?>
    <style>


    * {
  box-sizing: border-box;
}


/* Style the search field */
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 0px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
  border-radius: 15px 0 0 15px;
}

/* Style the submit button */
form.example button {
  float: left;
  width: 20%;
  padding: 14px;
  border: 6px  #000000;
  /*background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none; */
  cursor: pointer;
  border-radius: 0 15px 15px 0;
}

form.example button:hover {
  background: #222;
  border-color: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}

.top-header-custom {
  background-color: #fff !important;
  color:#222 !important;
}

.links:hover {
  background-color: #fff !important ;
}



    </style>
<header class="site-header">
  <div class="top-header-custom">
    <div class="container-flud" style="margin: 0 45px;">
      <div class="row">
        <div class="col-md-4 col-sm-6">
          
        </div>
        <div id="headerinfo" class="col-md-8 col-sm-6" style="padding-top: 5px;">
          <ul class="horiz-nav pull-right">
            <li style="background-color: #f1f1f1;color:#222;border-radius:10px 0 0 10px;border:none"><a href="https://www.facebook.com/soundkade.lk/" target="_blank" class="links" ><i class="fa fa-facebook" style="color:#222;font-size:15px;"></i></a></li>
            <li class="mobile_num" style="background-color: #f1f1f1;color:#222;border-radius:0px 0px 0px 0px;border:none;padding:5px">
            <form action="tel:+94760970100">
              <a type="submit" role="button" style="color:#222;font-size:15px;"><i class="fa fa-phone">  076 097 0100</i></a>
            </form>
            <!--<li style="background-color: #eb2e2f;color:#222;border-radius:0px 10px 10px 0px;border:none;padding:0px"><a style="font-weight: bold;" href="../login.php">POST AD</a></li>-->
            <li style="background-color: #eb2e2f;color:#222;border-radius:0px 10px 10px 0px;border:none;padding:0px"><a href="<?php
                                    if (empty($log)) {
                                        echo '../login.php';
                                    } else {
                                        echo 'post_ad/';
                                    }
                                    ?>" >
                                    POST AD
                                </a></li>
            </li>
           
            <!-- <li>
            <i class="fa fa-phone" style="color:#222;margin-right:3px;font-size:15px"> 076-0970100</i>
            </li> -->
            
            <?php if(!empty($log)) { ?>
              <li><a href="my_Acc/"><i class="fa fa-user"></i> &nbsp;My Account</a></li>
            <?php } ?>
          </ul>
        </div>


      </div>
    </div>
  </div>
  <div class="middle-header">
   
  </div>
  <!-- <div class="main-menu-wrapper">
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
  </div> -->
  <div class="container">
  <div class="row">
    <div class="col-md-12 col-lg-12" style="margin-top:80px; margin-bottom: 40px;text-align:center">
      <h1 class="logo"> <a href="index.php" title="soundkade.lk"><img src="wp-content/uploads/2015/06/logo.png" alt="Logo" width="480"></a> </h1>
    </div>
  <!--     Udara's search form-->
    <div id="searchbar" class="col-md-8 col-lg-6 col-sm-10 col-xs-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-2 col-lg-offset-3" style="margin-top:5px; margin-bottom: 80px;text-align:center">

      <form class="example" method="get" action="search.php">
        <input type="text" placeholder="Search here to buy.." name="keyword" class="input-lg">
        <button class="btn btn-primary btn-lg" type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>

<!--end udara's search form -->
  </div>
  </div>

</header>