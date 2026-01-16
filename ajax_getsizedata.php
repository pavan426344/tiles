<?php
include('config.php');
if(isset($_POST['grade2']))
{
$id="";	
$value=$_POST['grade2'];
$select_mrp=mysqli_query($con,"select * from t_size where T_Size_Name='$value'");
    
while($select_mrp_row=mysqli_fetch_array($select_mrp))
{
	echo "<input type='text' name='size_sqft' class='sqftsize' id='sqftsize' readonly value='$select_mrp_row[T_Size_Value]' />";
}

}
?>