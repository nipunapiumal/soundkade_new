<?php
include_once 'db/db.php';

if(isset($_POST['district'])){
    include_once '../db/db.php';
    $query ="SELECT cid, city from city WHERE did={$_POST['district']} ORDER BY city ASC";

    $result = mysqli_query($conn, $query);
    //echo $sql_form;
    echo "<option value=''>All Cities</option>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='{$row['cid']}'>{$row['city']}</option>";
    }
}
?>