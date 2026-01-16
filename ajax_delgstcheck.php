<?php
include('config.php');
if($_POST['gst'])
{
$id=$_POST['gst'];
$sql=mysqli_query($con,"select * from dealer where gstin_uin='$id'");
if(mysqli_fetch_row($sql) > 0)
{
	echo "<script>alert('GSTIN Or UIN No. Already Exist');</script>";
        echo "GSTIN Or UIN No. Already Exist";
}
}
?>