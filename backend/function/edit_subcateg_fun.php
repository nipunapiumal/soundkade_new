<?php

include "../db/db.php";

session_start();
//$log = $_SESSION['user'];
$log = htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');
if (empty($log)) {

    $redirectUrl = "../index.php";
    echo "<script type=\"text/javascript\">";
    echo "window.location.href = '$redirectUrl'";
    echo "</script>";
} else {



    //$id = $_GET['id'];
    $id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');
    //$category = $_POST['category'];
    $category = htmlspecialchars(trim($_POST['category']), ENT_QUOTES, 'UTF-8');
    //$sub_category = $_POST['sub_category'];
    $sub_category = htmlspecialchars(trim($_POST['sub_category']), ENT_QUOTES, 'UTF-8');

    //$img = $_FILES["file"]["name"];
$img = htmlspecialchars(trim($_FILES["file"]["name"]), ENT_QUOTES, 'UTF-8');



    $query = mysqli_query($conn, "SELECT sub_category FROM sub_category WHERE sub_category='$sub_category' AND id!='$id'");

    if (mysqli_num_rows($query) != 0) {
        echo "<script>alert('Sub category Already Exists!')</script>";
        $redirectUrl = "../create_sub_category.php";
        echo "<script type=\"text/javascript\">";
        echo "window.location.href = '$redirectUrl'";
        echo "</script>";
    } else {








        if (!empty($img)) {

            if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 5000000)) {

                if ($_FILES["file"]["error"] > 0) {

                    echo "Return Code: " . $_FILES["file"]["error"] . "<br/>";
                } else {

                    if (file_exists("../img_upload/" . $img)) {

                        // echo $_FILES["file"]["name"] . " already exists.";

                        echo "<script>alert('Image Name Already Exist...Insert another!')</script>";
                        $redirectUrl = "../create_sub_category.php";
                        echo "<script type=\"text/javascript\">";
                        echo "window.location.href = '$redirectUrl'";
                        echo "</script>";
                    } else {

                        $sql2 = mysqli_query($conn, "SELECT img FROM sub_category WHERE id='$id'");
                        while ($row2 = mysqli_fetch_array($sql2)) {
                            $img1 = $row2['img'];
                        }

                        if (!empty($img1)) {
                            unlink("../img_upload/" . $img1);
                        }

                        move_uploaded_file($_FILES["file"]["tmp_name"], "../img_upload/" . $img);


                        $sql = mysqli_query($conn, "UPDATE sub_category SET cat_id='$category',sub_category='$sub_category',img='$img' WHERE id='$id'");
                        // $sqlh="UPDATE sub_category SET cat_id='$category',sub_category='$sub_category',img='$img' WHERE id='$id'";
                        //echo  $sqlh;  
                        echo "<script>alert('Data has been updated successfully')</script>";
                        $redirectUrl = "../create_sub_category.php";
                        echo "<script type=\"text/javascript\">";
                        echo "window.location.href = '$redirectUrl'";
                        echo "</script>";
                    }
                }
            } else {
                echo "Invalid file";
            }
        } else {
            $sql = mysqli_query($conn, "UPDATE sub_category SET cat_id='$category',sub_category='$sub_category' WHERE id='$id'");

            echo "<script>alert('Data has been updated successfully')</script>";
            $redirectUrl = "../create_sub_category.php";
            echo "<script type=\"text/javascript\">";
            echo "window.location.href = '$redirectUrl'";
            echo "</script>";
        }
    }
}
?>