<?php
include('config.php');
if($_POST['exe'])
{
$id=$_POST['exe'];
$sql=mysqli_query($con,"select * from dealer where CompanyName='$id'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly='readonly' name='delexe' id='' value='$row[executive]' />&nbsp;&nbsp;<input type='text' readonly='readonly' name='delexecontact' id='' value='$row[executivecontact]' /> ";
}
}
?>