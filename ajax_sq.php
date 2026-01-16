<?php
include('config.php');
if($_POST['design'])
{
$id=$_POST['design'];
$sql=mysqli_query($con,"select * from design where DesignName='$id'");
while($row=mysqli_fetch_array($sql))
{
	echo "Total Sq Ft: <input type='text' width='20' name='sqft' id='sqft' readonly='readonly' value='$row[Sqft]'/> <br /> Total Sq Mtr: <input type='text' name='sqmtr' width='20' id='sqmtr' readonly='readonly' value='$row[Sqmtr]'/>";
}
}
?>