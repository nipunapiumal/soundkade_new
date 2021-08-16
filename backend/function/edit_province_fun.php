<?php

include "../db/db.php";

//$id = $_GET['id'];
$id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');
//$province2 = $_GET['province2'];
$province2 = htmlspecialchars(trim($_GET['province2']), ENT_QUOTES, 'UTF-8');

//$province = $_POST['prov'];
$province = htmlspecialchars(trim($_POST['prov']), ENT_QUOTES, 'UTF-8');

$query = mysqli_query($conn, "SELECT province FROM province WHERE province='$province'");


if (mysqli_num_rows($query) != 0 AND $province <> $province2) {
    echo "<script>alert('Province Name Already Exist!')</script>";
    $redirectUrl = "../edit_province.php?id=$id";
    echo "<script type=\"text/javascript\">";
    echo "window.location.href = '$redirectUrl'";
    echo "</script>";
} else {


    echo $sql = mysqli_query($conn, "UPDATE province SET province='$province' WHERE pid='$id'");


    echo "<script>alert('Successfully Updated!')</script>";
    $redirectUrl = "../province.php";
    echo "<script type=\"text/javascript\">";
    echo "window.location.href = '$redirectUrl'";
    echo "</script>";
}
?>
