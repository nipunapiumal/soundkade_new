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

<html>
    <head>
	<style>
	    .infobox>.infobox-icon>.ace-icon {
		margin: 0px;
		padding: 0px;

	    }
	    .infobox>.infobox-icon>.ace-icon {
		height: 36px;
	    }
	    .infobox{
		padding: 2px;
		height: 45px;
	    }
	    .infobox>.infobox-data{
		font-size: 14px;
	    }
	    .infobox>.infobox-data{
		line-height: 36px;
	    }
	    .infobox>.infobox-icon>.ace-icon:before{
		font-size: 20px;
		padding: 8px 0 7px;
		width: 38px;
	    }
	    .infobox>.infobox-icon {
		vertical-align: baseline;
	    }
	    .cat_1{
		background-color: #272626 !important;
		border-color:#272626 !important;
		color:#ffffff;
	    }
	    .cat_2{
		background-color: #f44336 !important;
		border-color:#f44336 !important;
		color:#ffffff;
	    }
	    .cat_3{
		background-color: #9522bb !important;
		border-color:#9522bb !important;
		color:#ffffff;
	    }
	    .cat_4{
		background-color: #bb9322 !important;
		border-color:#bb9322 !important;
		color:#ffffff;
	    }
	    .cat_5{
		background-color: #4CAF50 !important;
		border-color:#4CAF50 !important;
		color:#ffffff;
	    }
	    
	    
	</style>
    </head>
    <body>
	<div class="row">
	    <div class="col-xs-12"> 

		<div class="row">




		    <div class="col-sm-3 infobox-container">


			<?php
			$sqlu = mysqli_fetch_assoc(mysqli_query($conn, "SELECT district FROM rbo_register WHERE u_name='$name'"));
			$dist = $sqlu['district'];

			$sql_trans = mysqli_fetch_assoc(mysqli_query($conn, "SELECT
COUNT(cus_transaction.add_id) AS count_trans,
form_prev_data.id,
cus_transaction.trans_id,
transaction_type.id,
transaction_type.name,
cus_transaction.trans_flag,
form_prev_data.district,
cus_transaction.id
FROM
cus_transaction
Inner Join form_prev_data ON form_prev_data.id = cus_transaction.add_id
Inner Join transaction_type ON cus_transaction.trans_id = transaction_type.id
WHERE cus_transaction.trans_flag=0 AND form_prev_data.district='$dist'
"));
			$trans_request_count = $sql_trans['count_trans'];




			$sql_bro = mysqli_fetch_assoc(mysqli_query($conn, "SELECT
Count(bro_register.bro_id) AS count_bro,
bro_register.district
FROM
bro_register
WHERE bro_register.district='$dist'

"));
			$bro_count = $sql_bro['count_bro'];



			$sql_ebro = mysqli_fetch_assoc(mysqli_query($conn, "SELECT
Count(erbo_register.erbo_id) AS count_ebro,
erbo_register.district,
erbo_register.erbo_id
FROM
erbo_register
WHERE erbo_register.district='$dist'


"));
			$ebro_count = $sql_ebro['count_ebro'];
			?>


			<div class="infobox infobox-pink">
			    <div class="infobox-icon"><i class="ace-icon fa fa-window-restore"></i></div>

			    <div class="infobox-data">

				<div>Transaction Request-&nbsp;<span class="infobox-data-number"><?php echo $trans_request_count; ?></span></div>


			    </div>



			</div>

			<div class="infobox infobox-pink">
			    <div class="infobox-icon"><i class="ace-icon fa fa-window-restore"></i></div>
			    <div class="infobox-data">

				<div>Needs-&nbsp;<span class="infobox-data-number"><?php echo '5'; ?></span></div>


			    </div>

			</div>

			<div class="infobox infobox-pink">
			    <div class="infobox-icon"><i class="ace-icon fa fa-address-card"></i></div>
			    <div class="infobox-data">

				<div>Set Massages-&nbsp;<span class="infobox-data-number"><?php echo '2'; ?></span></div>


			    </div>
			</div>


		    </div>
		    <div class="col-sm-1 infobox-container">
		    </div>
		    <?php
		    $sql = "SELECT
`user`.`user`,
rbo_register.u_name,
rbo_register.rbo_id,
rbo_account.rbo_id,
SUM(rbo_account.debit)AS debit,
SUM(rbo_account.credit)AS credit
FROM
`user`
INNER JOIN rbo_register ON rbo_register.u_name = `user`.`user`
INNER JOIN rbo_account ON rbo_register.rbo_id = rbo_account.rbo_id WHERE `user`.`user`='$name'
";
		    $result = mysqli_query($conn, $sql);
		    $row = mysqli_fetch_array($result);
		    $debit = $row[4];
		    $credit = $row[5];

		    $balance = ($debit - $credit);
		    ?>
		    <div class="col-sm-4 infobox-container">

			<div class="infobox infobox-blue">
			    <div class="infobox-icon"><i class="ace-icon fa fa-user"></i></div>
			    <div class="infobox-data">

				<div>Registered Brokers-&nbsp;<span class="infobox-data-number"><?php echo $bro_count; ?></span></div>


			    </div>

			</div>
			<div class="infobox infobox-blue">
			    <div class="infobox-icon"><i class="ace-icon fa fa-users"></i></div>
			    <div class="infobox-data">

				<div>Registered E-Brokers-&nbsp;<span class="infobox-data-number"><?php echo $ebro_count; ?></span></div>


			    </div>

			</div>
			

		    </div>
		    <div class="col-sm-1 infobox-container">
			
		    </div>
		    <div class="col-sm-3 infobox-container">


			<div class="infobox infobox-pink">
			    <div class="infobox-icon"><i class="ace-icon fa fa-money"></i></div>
			    <div class="infobox-data">

				<div>Balance Rs-&nbsp;<span class="infobox-data-number"><?php echo $balance; ?>/=</span></div>


			    </div>

			</div>

			<div class="infobox infobox-pink">
			    <div class="infobox-icon"><i class="ace-icon fa fa-money"></i></div>
			    <div class="infobox-data">

				<div>Today Income Rs-&nbsp;<span class="infobox-data-number"><?php echo '2'; ?></span></div>


			    </div>
			</div>

			<div class="infobox infobox-pink">
			    <div class="infobox-icon"><i class="ace-icon fa fa-users"></i></div>
			    <div class="infobox-data">

				<div>Index-&nbsp;<span class="infobox-data-number"><?php echo '2'; ?></span></div>


			    </div>
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






		</div>

	    </div>
	</div>
	<div class="space-10"></div>
	<div class="row">
	    <div class="col-sm-9">
		<div class="row">
		    <div class="col-sm-6 infobox-container">
			<h4 class="widget-title">Searching(Need/Set)</h4>
			<?php
			$sql_wish = mysqli_query($conn, "SELECT
COUNT(form_prev_data.id) AS wish_count,
wish_list.id,
wish_list.add_id,
form_prev_data.id,
form_prev_data.flag,
form_prev_data.district,
form_prev_data.cat,
main_category.id AS cat_id,
main_category.category
FROM
wish_list
Inner Join form_prev_data ON form_prev_data.id = wish_list.add_id
Inner Join main_category ON main_category.id = form_prev_data.cat
WHERE form_prev_data.flag=1 AND form_prev_data.district='$dist'
GROUP BY form_prev_data.cat
");

			while ($row_wish = mysqli_fetch_array($sql_wish)) {
			    ?> 
    			<button class=" btn-xs cat_<?php echo $row_wish['cat_id']; ?>" style="width:300px;margin-bottom:8px;"><?php echo $row_wish['category']; ?>-&nbsp<?php echo $row_wish['wish_count']; ?></button><br/>
			<?php } ?>

		    </div>   
		    <div class="col-sm-6 infobox-container">
			<h4 class="widget-title">Owners</h4>
			<?php
			$sql_search = mysqli_query($conn, "SELECT
COUNT(form_prev_data.id) AS cat_count,
form_prev_data.cat,
form_prev_data.id,
form_prev_data.flag,
main_category.id AS cat_id,
main_category.category,
form_prev_data.district
FROM
form_prev_data
Inner Join main_category ON main_category.id = form_prev_data.cat
WHERE form_prev_data.flag=1 AND form_prev_data.district='$dist' GROUP BY form_prev_data.cat
");

			while ($row_search = mysqli_fetch_array($sql_search)) {
			    ?> 
			
			<button class="btn-xs cat_<?php echo $row_search['cat_id']; ?>" style="width:300px;margin-bottom:8px;" id="<?php echo $row_search['category']; ?>"><?php echo $row_search['category']; ?>-&nbsp<?php echo $row_search['cat_count']; ?></button><br/>
			<?php } ?>

		    </div>


		</div>
		<div class="row">

		    <div class="table-header"> Transaction</div>
		    <div class="table-responsive">
			<table id="dynamic-table_second" class="table table-striped table-bordered table-hover">
			    <thead>
				<tr>
				    <th>ID</th>
				    <th>REQUEST BY</th>
				    <th>TRANSACTION NAME</th>

				</tr>
			    </thead>
			    <tbody>
				<?php
				$sql_trans = mysqli_query($conn, "SELECT
transaction_type.name AS trans_name,
customer_reg.name AS req_by,
cus_transaction.add_id,
cus_transaction.id,
cus_transaction.trans_id
FROM
cus_transaction
Inner Join transaction_type ON transaction_type.id = cus_transaction.trans_id
Inner Join customer_reg ON cus_transaction.cus_id = customer_reg.id
Inner Join form_prev_data ON form_prev_data.id = cus_transaction.add_id
WHERE
cus_transaction.trans_flag ='0' AND
form_prev_data.district ='$dist'");
				
				$x = 0;
				while ($row_trans = mysqli_fetch_array($sql_trans)) {
				    $x++;
				    ?>  
    				<tr>
    				    <td><?php echo $x; ?>.</td>
    				    <td><?php echo $row_trans['req_by']; ?></td>
    				    <td><?php echo $row_trans['trans_name']; ?></td>

    				</tr>

				<?php } ?>

			    </tbody>
			</table>
		    </div>


		</div>


	    </div>
	    <div class="col-sm-3 infobox-container">


		<h4 class="widget-title"> Total Property</h4>

		<div class="infobox infobox-green">
		    <div class="infobox-icon"><i class="ace-icon fa fa-car"></i></div>
		    <div class="infobox-data">

			<div>Cars & Vehicle-&nbsp;<span class="infobox-data-number"><?php echo '2'; ?></span></div>


		    </div>

		</div>

		<div class="infobox infobox-green">
		    <div class="infobox-icon"><i class="ace-icon fa fa-home"></i></div>
		    <div class="infobox-data">

			<div>Home & Property-&nbsp;<span class="infobox-data-number"><?php echo '2'; ?></span></div>


		    </div>

		</div>

		<div class="infobox infobox-green">
		    <div class="infobox-icon"><i class="ace-icon fa fa-globe"></i></div>
		    <div class="infobox-data">

			<div>Land Sale-&nbsp;<span class="infobox-data-number"><?php echo '2'; ?></span></div>


		    </div>

		</div>
		<div class="infobox infobox-green">
		    <div class="infobox-icon"><i class="ace-icon fa fa-male"></i></div>
		    <div class="infobox-data">

			<div>Labor Supply-&nbsp;<span class="infobox-data-number"><?php echo '2'; ?></span></div>


		    </div>

		</div>
		<div class="infobox infobox-green">
		    <div class="infobox-icon"><i class="ace-icon fa fa-heart"></i></div>
		    <div class="infobox-data">

			<div>Marriage-&nbsp;<span class="infobox-data-number"><?php echo '2'; ?></span></div>


		    </div>

		</div>

		<h4 class="widget-title">Search Analyze</h4>


		<div class="infobox infobox-blue">
		    <div class="infobox-icon"><i class="ace-icon fa fa-car"></i></div>
		    <div class="infobox-data">

			<div>Cars & Vehicle-&nbsp;<span class="infobox-data-number"><?php echo '2'; ?></span></div>


		    </div>

		</div>

		<div class="infobox infobox-blue">
		    <div class="infobox-icon"><i class="ace-icon fa fa-home"></i></div>
		    <div class="infobox-data">

			<div>Home & Property-&nbsp;<span class="infobox-data-number"><?php echo '2'; ?></span></div>


		    </div>

		</div>

		<div class="infobox infobox-blue">
		    <div class="infobox-icon"><i class="ace-icon fa fa-globe"></i></div>
		    <div class="infobox-data">

			<div>Land Sale-&nbsp;<span class="infobox-data-number"><?php echo '2'; ?></span></div>


		    </div>

		</div>

		<div class="infobox infobox-blue">
		    <div class="infobox-icon"><i class="ace-icon fa fa-male"></i></div>
		    <div class="infobox-data">

			<div>Labor Supply-&nbsp;<span class="infobox-data-number"><?php echo '2'; ?></span></div>


		    </div>

		</div>

		<div class="infobox infobox-blue">
		    <div class="infobox-icon"><i class="ace-icon fa fa-heart"></i></div>
		    <div class="infobox-data">

			<div>Marriage-&nbsp;<span class="infobox-data-number"><?php echo '2'; ?></span></div>


		    </div>

		</div>
	    </div>

	</div>
    </body>
</html>