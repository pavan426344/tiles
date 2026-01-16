<?php
include('config.php');
if($_POST['exe'])
{
$id=$_POST['exe'];
$id=explode("-",$id);
$sql=mysqli_query($con,"select * from dealer where CompanyName='$id[0]' and centre='$id[1]'");
while($row=mysqli_fetch_array($sql))
{
    
	echo "<input type='text' readonly='readonly' name='delexe' id='' value='$row[executive]' />&nbsp;&nbsp;<input type='text' readonly='readonly' name='delexecontact' id='' value='$row[executivecontact]' /> ";
}
}
?>