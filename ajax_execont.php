<?php
include('config.php');
if($_POST['exe'])
{
$id=$_POST['exe'];
$sql=mysqli_query($con,"select * from userregistration where Name='$id'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly='readonly' name='executivecontact' id='' value='$row[Phone]' />&nbsp;&nbsp;<input type='hidden' readonly='readonly' name='executiveusername' id='' value='$row[username]' /> ";
}
}
?>