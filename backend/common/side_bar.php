<?php
$admin = $level == 1;
$rbo = $level == 2;
$ebro = $level == 3;
$cons = $level == 4;
?>

<div class="sidebar-shortcuts" id="sidebar-shortcuts">
    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
	<button class="btn btn-success"><i class="ace-icon fa fa-signal"></i></button>
	<button class="btn btn-info"><i class="ace-icon fa fa-pencil"></i></button>
	<button class="btn btn-warning"><i class="ace-icon fa fa-users"></i></button>
	<button class="btn btn-danger"><i class="ace-icon fa fa-cogs"></i></button>
    </div>
    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini"><span class="btn btn-success"></span> <span
	    class="btn btn-info"></span> <span class="btn btn-warning"></span> <span
	    class="btn btn-danger"></span></div>
</div>

<ul class="nav nav-list">
    <li class=""><a href="home.php"> <i class="menu-icon fa fa-home"></i> <span
		class="menu-text"> Dashboard </span> </a> <b class="arrow"></b></li>
    
    
     <?php if ($level == 4) { ?>
    
<li class=""><a href="consult_trans.php"> <i class="menu-icon fa fa-caret-right"></i> <span
		class="menu-text"> Transaction </span> </a> <b class="arrow"></b></li>
     <?php } ?>

    <?php if ($level == 1) { ?>
        <li class=""><a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-tag"></i> 
    	    <span
    		class="menu-text"> Settings </span> <b class="arrow fa fa-angle-down"></b> 
    	</a> <b
    	    class="arrow"></b> 
    	<ul class="submenu">
    	    <li class=""><a href="province.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Province </a> <b
    		    class="arrow"></b></li>
    	    <li class=""><a href="districts.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		    District </a> <b
    		    class="arrow"></b></li>

    	    <li class="">
    		<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-caret-right"></i> 
    		    City <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b> 


    		<ul class="submenu">

    		    <li class=""><a href="city.php"> <i class="menu-icon fa fa-caret-right"></i> 
    			    Add City </a> <b class="arrow"></b></li>
    		    <li class=""><a href="edit_city_table.php"> <i class="menu-icon fa fa-caret-right"></i> 
    			    Edit City </a> <b class="arrow"></b></li>
    		</ul>
    	    </li>







    	    <li class="">
    		<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Create Category <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b> 


    		<ul class="submenu">

    		    <li class=""><a href="create_sub_category.php"> <i class="menu-icon fa fa-caret-right"></i> 
    			    Category </a> <b class="arrow"></b></li>
    		</ul>
    	    </li>

    	    <li class="">
    		<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Transation <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b> 


    		<ul class="submenu">
    		    <li class=""><a href="create_transaction_type.php"> <i class="menu-icon fa fa-caret-right"></i> 
    			    Transaction Type</a> <b class="arrow"></b></li>
    		    <li class=""><a href="create_transaction.php"> <i class="menu-icon fa fa-caret-right"></i> 
    			    Transaction </a> <b class="arrow"></b></li>
    			  <!-- <li class=""><a href="create_consul_transac.php"> <i class="menu-icon fa fa-caret-right"></i> 
    			    Create Transaction Consultant </a> <b class="arrow"></b></li> -->
    		</ul>
    	    </li>
    	    <li class="">
    		<a href="add_pricing.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Add Pricing </a> <b class="arrow"></b></li>
    	    <li class="">
    		<a href="commission.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Commission </a> <b class="arrow"></b></li>
    	    <li class="">
    		<a href="form_fields.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Create Form Fields </a> <b class="arrow"></b></li>
    	    <li class=""><a href="associate_form_data.php">
    		    <i class="menu-icon fa fa-caret-right"></i> 
    		    Associate Form Data </a> <b class="arrow"></b></li>
    	    <!--<li class="">
    		<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Main Navigation <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b> 


    		<ul class="submenu">
    		    <li class=""><a href="#"> <i class="menu-icon fa fa-caret-right"></i> 
    			    Main Menu </a> <b class="arrow"></b></li>
    		    <li class=""><a href="#"> <i class="menu-icon fa fa-caret-right"></i> 
    			    Menu List </a> <b class="arrow"></b></li>
    		    <li class=""><a href="#"> <i
    				class="menu-icon fa fa-caret-right"></i> Group 
    			    Profile </a> <b class="arrow"></b> </li>
    		    <li class=""><a href="#"> <i
    				class="menu-icon fa fa-caret-right"></i> Group 
    			    Profile Privileges </a> <b
    			    class="arrow"></b></li>
    		</ul>-->
    	    </li>
    	</ul>
        </li>
        <!--<li class=""><a href="#"> <i class="menu-icon fa fa-user-plus"></i> <span class="menu-text"> 
    		User Registration </span> </a> <b class="arrow"></b></li>-->
        <li class=""><a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-fax"></i> 
    	    <span
    		class="menu-text"> RB Office </span> <b class="arrow fa fa-angle-down"></b> 
    	</a> <b
    	    class="arrow"></b> 
    	<ul class="submenu">
    	    <li class=""><a href="create_RBO.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Add RBO </a> <b
    		    class="arrow"></b></li>
    	    <!--<li class=""><a href="#"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Edit RBO </a> <b
    		    class="arrow"></b></li>-->












    	    <li class=""><a href="#"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Commission </a> <b
    		    class="arrow"></b></li>
    	    <li class=""><a href="#"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Analysis </a> <b
    		    class="arrow"></b></li>
    	    <li class=""><a href="#"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Reports </a> <b
    		    class="arrow"></b></li>


    	</ul>
        </li>

        <li class=""><a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-id-badge"></i> 
    	    <span
    		class="menu-text"> Consultant </span> <b class="arrow fa fa-angle-down"></b> 
    	</a> <b
    	    class="arrow"></b> 
    	<ul class="submenu">
    	    <li class=""><a href="create_Consultant.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Add Consultants </a> <b
    		    class="arrow"></b></li>
    	    <li class=""><a href="#"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Edit Consultants </a> <b
    		    class="arrow"></b></li>
    	    <li class=""><a href="create_consul_transac.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Transactions </a> <b
    		    class="arrow"></b></li>
    	    <!--<li class=""><a href="#"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Fund Transactions </a> <b
    		    class="arrow"></b></li>
    	    <li class=""><a href="#"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Commission </a> <b
    		    class="arrow"></b></li>
    	    <li class=""><a href="#"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Payout Reports </a> <b
    		    class="arrow"></b></li>-->
    	</ul>
        </li>




        <li class=""><a href="statement_RBO.php"> <i class="menu-icon fa fa-tasks"></i> 
    	    Statement </a> <b
    	    class="arrow"></b></li>			


        <li class=""><a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-money"></i> 
    	    <span
    		class="menu-text"> Funds Transaction </span> <b class="arrow fa fa-angle-down"></b> 
    	</a> <b class="arrow"></b> 
    	<ul class="submenu">
    	    <li class=""><a href="admin_fun_trans.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Fund Transfer </a> <b
    		    class="arrow"></b></li>

    	</ul>
        </li> 





    <?php } if ($level == 2) { ?>
        <li class=""><a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-user-circle-o"></i> 
    	    <span
    		class="menu-text"> E-Broker </span> <b class="arrow fa fa-angle-down"></b> 
    	</a> <b
    	    class="arrow"></b> 
    	<ul class="submenu">
    	    <li class=""><a href="create_eBroker.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Add New E-Brokers </a> <b
    		    class="arrow"></b></li>

    	    <!--<li class=""><a href="#"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Edit E-Brokers </a> <b
    		    class="arrow"></b></li>-->


    	    <!--<li class=""><a href="#"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Commission </a> <b
    		    class="arrow"></b></li>
    	    <li class=""><a href="#"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Statistics </a> <b
    		    class="arrow"></b></li>
    	    <li class=""><a href="#"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Reports </a> <b
    		    class="arrow"></b></li>-->
    	</ul>






        <li class=""><a href="statement_e_broker.php"> <i class="menu-icon fa fa-tasks"></i> 
    	    Statement </a> <b
    	    class="arrow"></b></li>

			
	     <li class=""><a href="rbo_consult.php"> <i class="menu-icon  fa fa-download"></i> 
    	    Attachments </a> <b
    	    class="arrow"></b></li>

        <li class=""><a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-money"></i> 
    	    <span
    		class="menu-text"> Funds Transaction </span> <b class="arrow fa fa-angle-down"></b> 
    	</a> <b class="arrow"></b> 
    	<ul class="submenu">
    	    <li class=""><a href="RBO_fun_trans.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		    Fund Transfer </a> <b
    		    class="arrow"></b></li>

				

    	</ul>
        </li>    







    </li>
    <li class=""><a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-check-square-o"></i> 
    	<span
    	    class="menu-text"> Transactions </span> <b class="arrow fa fa-angle-down"></b> 
        </a> <b class="arrow"></b> 
        <ul class="submenu">
    	<li class=""><a href="pending_ads_trans.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		Transactions Pool</a> <b
    		class="arrow"></b></li>

        </ul>
    </li>


<?php } if ($level == 3) { ?>
    <li class=""><a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-user-circle"></i> 
    	<span
    	    class="menu-text"> Broker </span> <b class="arrow fa fa-angle-down"></b> 
        </a> <b class="arrow"></b> 
        <ul class="submenu">
    	<li class=""><a href="create_Broker.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		Add New Brokers </a> <b
    		class="arrow"></b></li>
    	<!--<li class=""><a href="#"> <i class="menu-icon fa fa-caret-right"></i> 
    		Edit Brokers </a> <b
    		class="arrow"></b></li>-->




    	<!--<li class=""><a href="#"> <i class="menu-icon fa fa-caret-right"></i> 
    		Commission </a> <b
    		class="arrow"></b></li>
    	<li class=""><a href="#"> <i class="menu-icon fa fa-caret-right"></i> 
    		Statistics </a> <b
    		class="arrow"></b></li>
    	<li class=""><a href="#"> <i class="menu-icon fa fa-caret-right"></i> 
    		Reports </a> <b
    		class="arrow"></b></li>-->
        </ul>
    </li>



    <li class=""><a href="statement_broker.php"> <i class="menu-icon fa fa-tasks"></i> 
    	Statement </a> <b
    	class="arrow"></b></li>


    <li class=""><a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-money"></i> 
    	<span
    	    class="menu-text"> Funds Transaction </span> <b class="arrow fa fa-angle-down"></b> 
        </a> <b class="arrow"></b> 
        <ul class="submenu">
    	<li class=""><a href="ebroker2broker_fun_trans.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		Fund Transfer to Broker </a> <b
    		class="arrow"></b></li>

        </ul>
        <ul class="submenu">
    	<li class=""><a href="e_bro_fun_trans.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		Fund Transfer to Customer </a> <b
    		class="arrow"></b></li>

        </ul>
    </li> 







    <li class=""><a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-pencil-square-o"></i> 
    	<span
    	    class="menu-text"> Ads </span> <b class="arrow fa fa-angle-down"></b> 
        </a> <b class="arrow"></b> 


		

        <ul class="submenu">
    	<li class=""><a href="ebro_pending_ads.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		Ads Pool </a> <b
    		class="arrow"></b></li>
    	<li class=""><a href="ebro_accepted_ads.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		Reserve Ads </a> <b
    		class="arrow"></b></li>
        </ul>
    </li>

    <li class=""><a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-check-square-o"></i> 
    	<span
    	    class="menu-text"> Transactions </span> <b class="arrow fa fa-angle-down"></b> 
        </a> <b class="arrow"></b> 
        <ul class="submenu">
    	<li class=""><a href="pending_ads_trans_ebro.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		Transactions Pool </a> <b
    		class="arrow"></b></li>
    	<li class=""><a href="ebro_accepted_ads_trans.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		Reserve Transactions</a> <b
    		class="arrow"></b></li>
        </ul>
    </li>

<?php } ?>

<li class=""><a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-search"></i> 
	<span
	    class="menu-text"> Search </span> <b class="arrow fa fa-angle-down"></b> 
    </a> 
	<b class="arrow"></b> 
    <ul class="submenu">

	<?php if ($level == 1) { ?>
    	<li class=""><a href="search_RBO.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		RBO </a> <b
    		class="arrow"></b></li>

    	<li class=""><a href="search_consultant.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		Consultant </a> <b
    		class="arrow"></b></li>

	<?php } if ($level == 2) { ?>
    	<li class=""><a href="search_eBroker.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		E-Broker </a> <b
    		class="arrow"></b></li>

	<?php } if ($level == 3) { ?>
    	<li class=""><a href="search_broker_ajax.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		Broker </a> <b
    		class="arrow"></b></li>
	    <?php } ?>


    </ul>
</li>

<?php if ($level == 1) { ?>
    <li class=""><a href="#"> <i class="menu-icon fa fa-envelope"></i> <span class="menu-text"> 
    	    SMS Configuration </span> </a> <b class="arrow"></b></li>
    <!--<li class=""><a href="#"> <i class="menu-icon fa fa-folder-open"></i> <span class="menu-text"> 
    	    Ads Management </span> </a> <b class="arrow"></b></li>-->
    <li class=""><a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-pencil-square-o"></i> 
    	<span
    	    class="menu-text"> Ads </span> <b class="arrow fa fa-angle-down"></b> 
        </a> <b class="arrow"></b> 

		
        <ul class="submenu">
    	<li class=""><a href="admin_pending_ads.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		Ads Pool</a> <b
    		class="arrow"></b></li>
			
			<li class=""><a href="finalized_ads.php"> <i class="menu-icon fa fa-caret-right"></i> 
    		Finalized Ads</a> <b
    		class="arrow"></b></li>

			
        </ul>
    </li>	
		<li class= ""><a href="customer.php"><i class= "menu-icon fa fa-user"></i>
    	    Customer </a> <b
			class="arrow"></b></li>
			
			
			
<?php } ?>


<?php if ($level == 1 || 2 || 3) { ?>


<li class= ""><a href="password_reset.php"><i class= "menu-icon fa fa-key"></i>
    	    Reset Password </a> <b
			class="arrow"></b></li

			<?php } ?>


</ul>