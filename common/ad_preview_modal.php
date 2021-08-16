<div id="ad_<?php echo $row['pid']; ?>" class="modal fade" tabindex="-1"> 
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 class="smaller lighter blue no-margin"><?php echo $row['ad_name']; ?></h3>
		</div>
		<div class="modal-body">
		<table class="table table-bordered">
			<tr><th colspan="2">Owner Details</th></tr>
			<tr><td>Name</td><td><?php echo $row['name']; ?></td></tr>
			<tr><td>Contact Number</td><td><?php echo $row['contact_no']; ?></td></tr>
			<tr><td>Email Address</td> <td><?php echo $row['email']; ?></td></tr>

			<tr><th colspan="2">Ad Details</th></tr>
			<tr><td>Main Category</td><td><?php echo $row['category']; ?></td></tr>
			<tr><td>Sub Category</td><td><?php echo $row['sub_category']; ?></td></tr>
			
			<tr><th colspan="2">Location Details</th></tr>
			<tr><td>District</td><td><?php echo $row['district']; ?></td></tr>
			<tr><td>City</td><td> <?php echo $row['city']; ?></td></tr>

		</table>
		
					<?php $serialized_data = $row['data']; // Unserialize the data  
			$data = unserialize($serialized_data); // Show the unserialized data; ?>
			
			 <?php 
			  foreach($data as $field => $value) { 
			  if(!empty($value)) {
				$sqlf =  mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM form_fields WHERE id='$field'"));
				$field_name = $sqlf['name'];
			  ?>
              <p>  <strong><?php echo $sqlf['name']; ?>:</strong> <?php echo $value; ?></p>
				
              <?php }} ?>
		<hr>
					
			<?php  //echo "SELECT * FROM post_img WHERE post_id=".$row['post_id'];			
			$sqlp = mysqli_query($conn, "SELECT * FROM post_img WHERE post_id=".$row['post_id']);
			if(mysqli_num_rows($sqlp) > 0) { ?>	
												
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div>
                            <ul class="ace-thumbnails clearfix">                               
                                <?php 
							  	while($rowp = mysqli_fetch_array($sqlp)) { 
								$img_path = "../post_ad/uploads/".$row['post_id']."/".$rowp['img']; ?>                               
                                <li>
                                    <a href="<?php echo $img_path; ?>" data-rel="colorbox">
                                        <img width="160"  src="<?php echo $img_path; ?>" />
                                    </a>
                                </li>
                               <?php } ?>
                            </ul>
                        </div><!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->		
		
			<?php } ?>
	
		</div>
		<div class="modal-footer">
		<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal"> <i class="ace-icon fa fa-times"></i> Close </button>
		</div>
	</div>
	<!-- /.modal-content --> 
  </div> 
	<!-- /.modal-dialog --> 
</div>