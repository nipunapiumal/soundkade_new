<?php
include "db/db.php";
//$dis = $_GET['id'];
$dis = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');
?>

<select name="city" class="form-control" style="width: 100%;">
    <option value=""></option>
    <?php
//showing values in Catagory list box
    $sql11 = mysqli_query($conn, "SELECT * FROM city WHERE did = '$dis'")or die("query failed");

    while ($row11 = mysqli_fetch_array($sql11)) {
        echo "<option value=\"" . $row11['cid'] . "\">" . $row11['city'] . "</option>";
    }
    ?>
</select>