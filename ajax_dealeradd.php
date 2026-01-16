<?php
include('config.php');
if($_POST['add'])
{
$id=$_POST['add'];
$id=explode("-",$id);
$sql=mysqli_query($con,"select * from dealer where CompanyName='$id[0]' and centre='$id[1]'");
while($row=mysqli_fetch_array($sql))
{
	echo "<textarea id='addr' name='deladdress' style='width:300px !important' readonly='readonly'>$row[Address] $row[City],$row[State],$row[Country],$row[Pincode]</textarea>";
}
}
?>