<?php
require "conn.php";
if(!empty($_POST["flat"])) 
{
$flat= $_POST["flat"];
$sql="SELECT door_no FROM r_area_code WHERE flat_name='$flat' group by door_no order by id asc";
$res = mysqli_query($conn,$sql);	
?>
<option value="" selected>Select Door</option>
<?php
while($row = mysqli_fetch_array($res))
{
?>
<option value="<?php echo $row["door_no"]; ?>"><?php echo $row["door_no"]; ?></option>
<?php
}
}


?>