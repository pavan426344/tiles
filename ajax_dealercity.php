<?php
include('config.php');
if($_POST['city'])
{
$id=$_POST['city'];
$id=explode("-",$id);
$sql=mysqli_query($con,"select * from dealer where CompanyName='$id[0]' and centre='$id[1]'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly='readonly' name='city' id='city' value='$row[State]' />";
}
}
?>