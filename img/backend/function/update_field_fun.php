<?php

include "../db/db.php";


//$id = $_GET['id'];
$id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');

//$up_name = $_POST['up_name'];
$up_name = htmlspecialchars(trim($_POST['up_name']), ENT_QUOTES, 'UTF-8');
//$up_type = $_POST['up_type'];
$up_type = htmlspecialchars(trim($_POST['up_type']), ENT_QUOTES, 'UTF-8');


$query = mysqli_query($conn, "SELECT name FROM form_fields WHERE name='$up_name' AND type='$up_type'");



if (mysqli_num_rows($query) != 0
) {
    echo "<script>alert('Field Name Already Exist!')</script>";
    $redirectUrl = "../form_fields.php";
    echo "<script type=\"text/javascript\">";
    echo "window.location.href = '$redirectUrl'";
    echo "</script>";
} else {


    $sql = mysqli_query($conn, "UPDATE form_fields SET name='$up_name',type='$up_type' WHERE id='$id'");


    echo "<script>alert('Successfully Updated!')</script>";
    $redirectUrl = "../form_fields.php";
    echo "<script type=\"text/javascript\">";
    echo "window.location.href = '$redirectUrl'";
    echo "</script>";
}
?>
