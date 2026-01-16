<?php
include('config.php');
if($_POST['add'])
{
$id=$_POST['add'];
$id=explode("-",$id);
$sql=mysqli_query($con,"select * from dealer where CompanyName='$id[0]' and centre='$id[1]'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' value='$row[centre]' name='centre' readonly />";
}
}
?>