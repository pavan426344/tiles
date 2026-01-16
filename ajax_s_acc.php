<?php
include('config.php');
if($_POST['acc'])
{
$id=$_POST['acc'];
$id=explode("-",$id);
$sql=mysqli_query($con,"select * from dealer_security_cheque where dealer_name='$id[0]' and centre='$id[1]' and status=1 order by dealer_security_cheque_id ASC limit 0,1");
if(mysqli_num_rows($sql)==0)
{
   echo "<input type='text' readonly='readonly' name='checkdate' id='checkdate' value='' />";
}
else
{
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly='readonly' name='checkdate' id='checkdate' value='$row[AccNo]' />";
}
}
}
?>