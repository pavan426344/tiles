<?php
include('config.php');
if($_POST['gst'])
{
$id=$_POST['gst'];
$id=explode("-",$id);
$sql=mysqli_query($con,"select * from dealer where CompanyName='$id[0]' and centre='$id[1]'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly='readonly' name='delgst' id='' value='$row[gstin_uin]' />";
}
}
?>