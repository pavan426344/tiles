<?php
include('config.php');
if(isset($_POST['pqt']))
{
$id="";	
$value=$_POST['pqt'];
$value1=$_POST['sz'];
$select_mrp=mysqli_query($con,"select * from t_size where T_Size_Name='$value1'");
    
while($select_mrp_row=mysqli_fetch_array($select_mrp))
{
        $t_w=$_POST['pqt']*$select_mrp_row['T_Weight'];
	echo "<input type='text' name='weight' value='$t_w' />";
}

}
?>