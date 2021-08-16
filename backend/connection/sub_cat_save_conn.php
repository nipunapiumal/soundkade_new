<?php

include("../db/db.php");

session_start();
//$log = $_SESSION['user'];
$log =htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');

if (empty($log)) {

    $redirectUrl = "index.php";
    echo "<script type=\"text/javascript\">";
    echo "window.location.href = '$redirectUrl'";
    echo "</script>";
} else {


    //$cat = $_POST['cat'];
    //$sub_cat = $_POST['sub_cat'];
    $cat = htmlspecialchars(trim($_POST['cat']), ENT_QUOTES, 'UTF-8');
    $sub_cat = htmlspecialchars(trim($_POST['sub_cat']), ENT_QUOTES, 'UTF-8');

//$img = $_FILES["file"]["name"];
    $img = htmlspecialchars(trim($_FILES["file"]["name"]), ENT_QUOTES, 'UTF-8');
//echo $img;
    $sql1 = mysqli_query($conn, "SELECT * FROM sub_category WHERE sub_category='$sub_cat'");

    $num_rows = mysqli_num_rows($sql1);

    if ($num_rows == 1) {
        echo $id;
        echo "<script>alert('Sub-Category name already exists!')</script>";
        $redirectUrl = "../create_sub_category.php";
        echo "<script type=\"text/javascript\">";
        echo "window.location.href = '$redirectUrl'";
        echo "</script>";
    } else {
        if (!empty($img)) {

            if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 5000000)) {

                if ($_FILES["file"]["error"] > 0) {
                    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
                } else {

                    if (file_exists("../img_upload/" . $img)) {

                        //echo $_FILES["file"]["name"] . " already exists.";

                        echo "<script>alert('Image Name Already Exist...Insert another!')</script>";
                        $redirectUrl = "../create_sub_category.php";
                        echo "<script type=\"text/javascript\">";
                        echo "window.location.href = '$redirectUrl'";
                        echo "</script>";
                    } else {

                        move_uploaded_file($_FILES["file"]["tmp_name"], "../img_upload/" . $img);

                        $sql = mysqli_query($conn, "INSERT INTO sub_category SET cat_id='$cat',sub_category='$sub_cat',img='$img'");
                        //echo $sql;
                        echo "<script>alert('Data has been added successfully')</script>";
                        $redirectUrl = "../create_sub_category.php";
                        echo "<script type=\"text/javascript\">";
                        echo "window.location.href = '$redirectUrl'";
                        echo "</script>";
                    }
                }
            } else {

                echo "Invalid file";
            }
        }
    }
}
?>	
