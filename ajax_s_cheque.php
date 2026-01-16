<?php
include('config.php');
if($_POST['chk'])
{
$id=$_POST['chk'];
$id=explode("-",$id);
$sql=mysqli_query($con,"select * from dealer_security_cheque where dealer_name='$id[0]' and centre='$id[1]' and status=1 order by dealer_security_cheque_id ASC limit 0,1");
if(mysqli_num_rows($sql)==0)
{
    echo "<input type='text' readonly='readonly' name='checkno' id='checkno' value='' />";
}
else
{
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly='readonly' name='checkno' id='checkno' value='$row[cheque_no]' />";
}
}
}
?>