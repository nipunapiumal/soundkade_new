<?php
include '../db/db.php';

if (!isset($_SESSION)) {
  session_start();
  $log = htmlspecialchars(strip_tags(trim($_SESSION['user'])), ENT_QUOTES, 'UTF-8');
  $level = htmlspecialchars(trim($_SESSION['val']), ENT_QUOTES, 'UTF-8');

  if (empty($log)) {
	header("Location: ../index.php");
  
  } else {
	  $sqlu = mysqli_query($conn, "SELECT * FROM user WHERE user='$log' and val=1");
	  if(mysqli_num_rows($sqlu) == 1) {
		  
		if (array_key_exists('remove_post_img', $_POST)) {//delete button of data table
			$id = htmlspecialchars(strip_tags(trim($_POST['img'])), ENT_QUOTES, 'UTF-8');
			
			$query2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM post_img WHERE id='$id'"));
			$pid = $query2['post_id'];
			
			if(!empty($query2['img'])) {
				$path = "../../post_ad/uploads/".$pid."/".$query2['img'];
				$files = glob($path);
				
				foreach($files as $file) {
					unlink($file);
				}
			}			
			
			$sql = "DELETE FROM post_img WHERE id='$id'";
			$data = mysqli_query($conn, $sql); //check the result of query

			if ($data) {
				echo json_encode(array(array("msgType" => 1, "msg" => "Successfully Add informations"))); //if sql result true pass magType1
			} else {
				echo json_encode(array(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data"))); //if sql result true pass magType2
			}/* inside two functions there fore use two (array(array    )) arrays like this */
		}
			
		} else {
	    	header("Location: ../index.php");
		}
  	}
} 
?>