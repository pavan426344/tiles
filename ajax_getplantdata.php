<?php
include('config.php');
if(isset($_POST['cname']))
{
$id="";	
$value=$_POST['cname'];
$select_mrp=mysqli_query($con,"select * from t_plant where T_Company_Name='$value'");
?>
<select name="plant" required>
<?php
while($select_mrp_row=mysqli_fetch_array($select_mrp))
{
	echo "<option value='".$select_mrp_row['T_Plant_Name']."'>".$select_mrp_row['T_Plant_Name']."</option>";
}
?>
 </select>
<?php
}
?>