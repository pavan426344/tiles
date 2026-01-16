<?php
include('config.php');
if($_POST['tin'])
{
$id=$_POST['tin'];
$sql=mysqli_query($con,"select * from userregistration where username='$id'");
if(mysqli_fetch_row($sql) > 0)
{
	echo "<script>alert('Already Exist');</script>";
}
}
?>