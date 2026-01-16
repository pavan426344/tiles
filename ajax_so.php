<?php
include('config.php');
if($_POST['exe'])
{
$id=$_POST['exe'];
$finalsales=explode("-",$id);
$dealer=mysqli_query($con,"select * from dealer where CompanyName='$finalsales[0]' and centre='$finalsales[1]'");
while($rowd=mysqli_fetch_array($dealer))
{
	$sql=mysqli_query($con,"select * from finalsales where Dealer_Name='$finalsales[0]' and Dealer_Tin='$rowd[TIN]' and confirm='1'");
	while($row=mysqli_fetch_array($sql))
	{
		echo "<option value='$row[doid]'>".$row['doid']."</option>";
	}
}
}
?>