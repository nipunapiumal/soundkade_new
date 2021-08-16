<?php
include "db/db.php";
if (!isset($_SESSION)) {
    session_start();
    //$level = $_SESSION['val'];
    $level = htmlspecialchars(trim($_SESSION['val']), ENT_QUOTES, 'UTF-8');
    //$name = $_SESSION['user'];
    $name = htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');



    if (empty($level)) {
	header("Location: index.php");
    }
}
?>


<div class="row">
    <div class="col-xs-12"> 

	<div class="row">
	<div class="infobox infobox-green  infobox-small infobox-dark" style="width:250px">
		<div class="infobox-icon">
			<i class="ace-icon fa fa-download"></i>
		</div>

		<div class="infobox-data" style="max-width:250px">
			<div class="infobox-content" style="max-width:200px; font-size: 16px; font-weight:400"><a href="upload/app/mybroker.apk" style="color:#fff; text-decoration:none">Download Android App</a></div>
		</div>
	</div>
	</div>
	
	<div class="row">


	    <div class="space-10"></div>

	    <div class="col-sm-4 infobox-container">
		<h3 class="widget-title">Total</h3>
		<?php
		$sqlu = "SELECT district,erbo_id FROM erbo_register WHERE u_name='$name'";
		$resultu = mysqli_query($conn, $sqlu);
		$rowu = mysqli_fetch_array($resultu);
		$district = $rowu[0];
		$ebro_id = $rowu[1];


		$sql1 = "SELECT COUNT(*)
FROM form_prev_data
WHERE form_prev_data.flag ='2' AND
form_prev_data.district='$district' AND ebro_id='0'";

		$result1 = mysqli_query($conn, $sql1);
		$row1 = mysqli_fetch_array($result1);
		$count1 = $row1[0];



		$sql3 = "SELECT
Count(*),
form_prev_data.id,
cus_transaction.add_id
FROM
form_prev_data

Inner Join cus_transaction ON cus_transaction.add_id = form_prev_data.id
WHERE cus_transaction.trans_flag='2'
";

		$result3 = mysqli_query($conn, $sql3);
		$row3 = mysqli_fetch_array($result3);
		$count3 = $row3[0];



		$sql4 = "SELECT COUNT(*)

FROM
customer_reg


";

		$result4 = mysqli_query($conn, $sql4);
		$row4 = mysqli_fetch_array($result4);
		$count4 = $row4[0];


		$sqld = mysqli_fetch_assoc(mysqli_query($conn, "SELECT district FROM erbo_register WHERE u_name='$name'"));
		$dist = $sqld['district'];

		$sql5 = "SELECT COUNT(*)
FROM
bro_register
WHERE district='$dist'


";

		$result5 = mysqli_query($conn, $sql5);
		$row5 = mysqli_fetch_array($result5);
		$count5 = $row5[0];
		?>


		<div class="infobox infobox-blue">
		    <div class="infobox-icon"><i class="ace-icon fa fa-address-card-o"></i></div>

		    <div class="infobox-data"><span class="infobox-data-number"><?php echo $count1; ?></span>

			<div class="infobox-content">Total Adds Pool</div>


		    </div>

		    <div class="btn btn-success btn-minier pull-right" style="margin:10px;"> <button class="btn btn-success btn-minier" onclick="location.href = 'ebro_pending_ads.php'">View</button></div>

		</div>

		<div class="infobox infobox-pink">
		    <div class="infobox-icon"><i class="ace-icon fa fa-window-restore"></i></div>
		    <div class="infobox-data"><span class="infobox-data-number"><?php echo $count3; ?></span>
			<div class="infobox-content">Total Transaction Pool</div>
		    </div>
		    <div class="btn btn-success btn-minier pull-right" style="margin:10px;"> <button class="btn btn-success btn-minier" onclick="location.href = 'pending_ads_trans_ebro.php'">View</button></div>
		</div>

		<div class="infobox infobox-blue">
		    <div class="infobox-icon"><i class="ace-icon fa fa-address-card"></i></div>
		    <div class="infobox-data"><span class="infobox-data-number">8</span>
			<div class="infobox-content">Broker Adds</div>
		    </div>
		    <div class="btn btn-success btn-minier pull-right" style="margin:10px;"> <button class="btn btn-success btn-minier" >View</button></div>
		</div>


	    </div>

	    <?php
	    $sql2 = "SELECT
`user`.`user`,
erbo_register.u_name,
erbo_register.erbo_id,
ebro_account.ebro_id,
SUM(ebro_account.de) AS debit,
SUM(ebro_account.cr) AS credit
FROM
`user`
Inner Join erbo_register ON `user`.`user` = erbo_register.u_name
Inner Join ebro_account ON erbo_register.erbo_id = ebro_account.ebro_id WHERE 	`user`.`user`='$name'

";
	    $result2 = mysqli_query($conn, $sql2);
	    $row2 = mysqli_fetch_array($result2);
	    $debit2 = $row2[4];
	    $credit2 = $row2[5];

	    $balance2 = ($debit2 - $credit2);
	    ?>

	    <div class="col-sm-4 infobox-container">
		<h3 class="widget-title"> Funds</h3>
		<div class="infobox infobox-green">
		    <div class="infobox-icon"><i class="ace-icon fa fa-money"></i></div>
		    <div class="infobox-data"><span class="infobox-data-number">Rs <?php echo $balance2; ?>/=</span>
			<div class="infobox-content">Available Balance</div>
		    </div>

		</div>

		<div class="infobox infobox-blue">
		    <div class="infobox-icon"><i class="ace-icon fa fa-user"></i></div>
		    <div class="infobox-data"><span class="infobox-data-number"><?php echo $count5; ?></span>
			<div class="infobox-content">Total Brokers</div>
		    </div>
                    <button class="btn btn-success btn-minier pull-right" style="margin:10px;"   onclick="location.href = 'ebroker2broker_fun_trans.php'">Transfer</button>
		</div>

		<div class="infobox infobox-pink">
		    <div class="infobox-icon"><i class="ace-icon fa fa-users"></i></div>
		    <div class="infobox-data"><span class="infobox-data-number"><?php echo $count4; ?></span>
			<div class="infobox-content">Total Customers</div>
		    </div>
		    <button class="btn btn-success btn-minier pull-right" style="margin:10px;" onclick="location.href = 'e_bro_fun_trans.php'">Transfer</button>
		</div>


	    </div>


	    <?php
	    $sql_vehi = "SELECT
price.price,
price.cat_id
FROM
price
 WHERE `price`.`cat_id`='1'

";
	    $result_vehi = mysqli_query($conn, $sql_vehi);
	    $row_vehi = mysqli_fetch_array($result_vehi);
	    $vehi_price = $row_vehi[0];
	    ?>

	    <div class="col-sm-4 infobox-container">
		<h3 class="widget-title">Create New Add </h3>
		<div class="infobox infobox-blue">
		    <div class="infobox-icon"><i class="ace-icon fa fa-car"></i></div>
		    <div class="infobox-data">
			<?php if ($balance2 >= $vehi_price) { ?>
    			<div class="infobox-content" id="car" style="line-height: 50px;"><a  data-target="#form_prev" data-toggle="modal" >Cars & Vehicle</a></div>
			<?php } ?>
			<?php if ($balance2 < $vehi_price) { ?>
    			<div class="infobox-content"  style="line-height: 50px;"><font color="red">Credit not enough</font></div>
			<?php } ?>
		    </div>

		</div>

		<?php
		$sql_home = "SELECT
price.price,
price.cat_id
FROM
price
 WHERE `price`.`cat_id`='2'

";
		$result_home = mysqli_query($conn, $sql_home);
		$row_home = mysqli_fetch_array($result_home);
		$home_price = $row_home[0];
		?>

		<div class="infobox infobox-green">
		    <div class="infobox-icon"><i class="ace-icon fa fa-home"></i></div>
		    <div class="infobox-data">
			<?php if ($balance2 >= $home_price) { ?>
    			<div class="infobox-content" id="home" style="line-height: 50px;"><a data-target="#form_prev" data-toggle="modal">Home Property</a></div>
			<?php } ?>
			<?php if ($balance2 < $home_price) { ?>
    			<div class="infobox-content"  style="line-height: 50px;"><font color="red">Credit not enough</font></div>
			<?php } ?>
		    </div>

		</div>

		<?php
		$sql_land = "SELECT
price.price,
price.cat_id
FROM
price
 WHERE `price`.`cat_id`='3'

";
		$result_land = mysqli_query($conn, $sql_land);
		$row_land = mysqli_fetch_array($result_land);
		$land_price = $row_land[0];
		?>

		<div class="infobox infobox-pink">
		    <div class="infobox-icon"><i class="ace-icon fa fa-globe"></i></div>
		    <div class="infobox-data">
			<?php if ($balance2 >= $land_price) { ?>
    			<div class="infobox-content" style="line-height: 50px;" id="land"><a data-target="#form_prev" data-toggle="modal">Land Sale</a></div>
			<?php } ?>
			<?php if ($balance2 < $land_price) { ?>
    			<div class="infobox-content"  style="line-height: 50px;"><font color="red">Credit not enough</font></div>
			<?php } ?>
		    </div>

		</div>

		<?php
		$sql_labor = "SELECT
price.price,
price.cat_id
FROM
price
 WHERE `price`.`cat_id`='4'

";
		$result_labor = mysqli_query($conn, $sql_labor);
		$row_labor = mysqli_fetch_array($result_labor);
		$labor_price = $row_labor[0];
		?>
		<div class="infobox infobox-blue">
		    <div class="infobox-icon"><i class="ace-icon fa fa-male"></i></div>
		    <div class="infobox-data">
			<?php if ($balance2 >= $labor_price) { ?>
    			<div class="infobox-content" style="line-height: 50px;" id="labour"><a data-target="#form_prev" data-toggle="modal">Labor Supply</a></div>
			<?php } ?>
			<?php if ($balance2 < $labor_price) { ?>
    			<div class="infobox-content"  style="line-height: 50px;"><font color="red">Credit not enough</font></div>
			<?php } ?>
		    </div>

		</div>

		<?php
		$sql_marriage = "SELECT
price.price,
price.cat_id
FROM
price
 WHERE `price`.`cat_id`='5'

";
		$result_marriage = mysqli_query($conn, $sql_marriage);
		$row_marriage = mysqli_fetch_array($result_marriage);
		$marriage_price = $row_marriage[0];
		?>
		<div class="infobox infobox-red">
		    <div class="infobox-icon"><i class="ace-icon fa fa-heart"></i></div>
		    <div class="infobox-data">
			<?php if ($balance2 >= $marriage_price) { ?>
    			<div class="infobox-content" style="line-height: 50px;" id="marriage"><a data-target="#form_prev" data-toggle="modal">Marriage</a></div>
			<?php } ?>
			<?php if ($balance2 < $marriage_price) { ?>
    			<div class="infobox-content"  style="line-height: 50px;"><font color="red">Credit not enough</font></div>
			    <?php } ?>
		    </div>

		</div>
		<?php
		$sql_marriage = "SELECT
price.price,
price.cat_id
FROM
price
 WHERE `price`.`cat_id`='6'

";
	    
		$result_other = mysqli_query($conn, $sql_other);
		$row_other = mysqli_fetch_array($result_other);
		$other_price = $row_other[0];
		?>
		<div class="infobox infobox-blue">
		    <div class="infobox-icon"><i class="ace-icon fa fa-handshake-o"></i></div>
		    <div class="infobox-data">
			<?php if ($balance2 >= $other_price) { ?>
    			<div class="infobox-content" style="line-height: 50px;" id="other"><a data-target="#form_prev" data-toggle="modal">Other</a></div>
			<?php } ?>
			<?php if ($balance2 < $other_price) { ?>
    			<div class="infobox-content"  style="line-height: 50px;"><font color="red">Credit not enough</font></div>
			    <?php } ?>
		    </div>

		</div>


	</div>

    </div></div>