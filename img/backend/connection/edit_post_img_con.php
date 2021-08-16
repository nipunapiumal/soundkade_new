<?php 
header('Content-type: application/json');
include '../db/db.php';
$response = array();

if (!isset($_SESSION)) {
  session_start();
  $log = htmlspecialchars(strip_tags(trim($_SESSION['user'])), ENT_QUOTES, 'UTF-8');

  if (empty($log)) {
	header("Location: ../index.php");
  
  } else {
	  $sqlu = mysqli_query($conn, "SELECT * FROM user WHERE user='$log' and val=1");
	  if(mysqli_num_rows($sqlu) == 1) {

		/****************************************************************************/
		
		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp'); // valid extensions
		
		if ($_POST) {
			
			if(isset($_FILES['image'])) {
		
			$gal_id = htmlspecialchars(strip_tags(trim($_POST['pid'])), ENT_QUOTES, 'UTF-8');
		
			// check's valid format	
			foreach($_FILES['image']['tmp_name'] as $key => $tmp_name ){
				$file_name = $key.$_FILES['image']['name'][$key];
				$file_tmp = $_FILES['image']['tmp_name'][$key];
				$path = '../../post_ad/uploads/'.$gal_id.'/'; // upload directory
			
				$ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
				if(in_array($ext, $valid_extensions)) 
				{					
					if(is_dir($path)==false){
						mkdir("$path", 0700);		// Create directory if it does not exist
					}
					
					$path = $path.strtolower($file_name);	
					
					if (file_exists($path))
					{			
						$response['status'] = '2'; // File Exists
					
					} else {		
						if(move_uploaded_file($file_tmp,$path)) 
						{
							  $file_name = htmlspecialchars(trim($file_name), ENT_QUOTES, 'UTF-8');
							  $sql = "INSERT INTO post_img SET post_id='$gal_id',img='$file_name'";
							  $data = mysqli_query($conn, $sql); //check the result of query
						  
							  if ($data) {
								$response['status'] = '1'; // Success
							  
							  } else {
								$response['status'] = '3'; // Sql Error
							  }
						
						} else{				
						  //exit("Error While uploading image on the server");
						  $response['status'] = '4'; // Uploading Error
						}
					}
				} 
				else 
				{
					$response['status'] = '5'; // Invaild File
				}
			}
		
			} 
		
		}
		
		echo json_encode($response);	
	
	} else {
	    header("Location: ../index.php");
	}
  }
} 
?>