<?php 
include "db/db.php";
//$prov = $_GET['id'];
$prov = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');
?>

<select class="form-control" name="district" style="width: 100%;" onChange="getCity(this.value)">
<option value=""></option>
<?php
//showing values in Catagory list box
$sql11=mysqli_query($conn, "SELECT * FROM district WHERE pid = '$prov'")or die ("query failed");

while ($row11=mysqli_fetch_array($sql11))
{ 
echo "<option value=\"".$row11['did']."\">".$row11['district']."</option>"; 
}
?>
</select>