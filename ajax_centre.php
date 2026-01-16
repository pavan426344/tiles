<?php
include('config.php');
if($_POST['add'])
{
$id=$_POST['add'];
$id=explode("-",$id);
$sql=mysqli_query($con,"select * from dealer where CompanyName='$id[0]' and centre='$id[1]'");
while($row=mysqli_fetch_array($sql))
{
	echo "<label style='font-size:16px;margin-left:40px;'>$row[centre]</label><label style='font-size:16px;margin-left:40px;'>Mr. $row[Name]</label><label style='font-size:16px;margin-left:40px;'>$row[Mobile]</label>";
}
}
?>