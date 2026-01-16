<?php
include('config.php');
if($_POST['cst'])
{
$id=$_POST['cst'];
$id=explode("-",$id);
$sql=mysqli_query($con,"select * from dealer where CompanyName='$id[0]' and centre='$id[1]'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly='readonly' name='delcst' id='' value='$row[CST]' />";
}
}
?>