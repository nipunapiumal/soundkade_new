<?php

include_once '../db/db.php';

if (array_key_exists('get_trans', $_POST)) {
     $category=htmlspecialchars(trim($_POST['category']), ENT_QUOTES, 'UTF-8');
     
   $sql = "SELECT
transaction.transac_type_id,
transaction.cat_id,
transaction_type.name,
transaction_type.id
FROM
transaction
Inner Join transaction_type ON transaction.transac_type_id = transaction_type.id
WHERE transaction.cat_id='$category'
 
";
//echo $sql;
    $result = mysqli_query($conn, $sql);
    //echo'<option>Select District...</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    if (!empty($data)) {
        foreach ($data AS $data) {
           
	    echo'<li>&nbsp;<input type="checkbox" name="trans_list[]" value="'.$data['id'].'"/>&nbsp;&nbsp;'.$data['name'] .'</li>';
	    
        }
    } else {
        echo'<option>No data found</option>';
    }
   json_encode($data);
}

?>