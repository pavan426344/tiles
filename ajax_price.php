<?php
include('config.php');
if(isset($_POST['design1']))
{
$id="";	
$value=$_POST['design1'];
$sql=mysqli_query($con,"select * from t_mrp where T_Stk_Name='$value'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly name='mrp1' id='mrp1' style='width:100px;' value='$row[mrp]' />";
}
}
if(isset($_POST['design2']))
{
$id="";	
$value=$_POST['design2'];
$sql=mysqli_query($con,"select * from t_mrp where T_Stk_Name='$value'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly name='mrp2' id='mrp2' style='width:100px;' value='$row[mrp]' />";
}
}
if(isset($_POST['design3']))
{
$id="";	
$value=$_POST['design3'];
$sql=mysqli_query($con,"select * from t_mrp where T_Stk_Name='$value'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly name='mrp3' id='mrp3' style='width:100px;' value='$row[mrp]' />";
}
}
if(isset($_POST['design4']))
{
$id="";	
$value=$_POST['design4'];
$sql=mysqli_query($con,"select * from t_mrp where T_Stk_Name='$value'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly name='mrp4' id='mrp4' style='width:100px;' value='$row[mrp]' />";
}
}
if(isset($_POST['design5']))
{
$id="";	
$value=$_POST['design5'];
$sql=mysqli_query($con,"select * from t_mrp where T_Stk_Name='$value'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly name='mrp5' id='mrp5' style='width:100px;' value='$row[mrp]' />";
}
}
if(isset($_POST['design6']))
{
$id="";	
$value=$_POST['design6'];
$sql=mysqli_query($con,"select * from t_mrp where T_Stk_Name='$value'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly name='mrp6' id='mrp6' style='width:100px;' value='$row[mrp]' />";
}
}
if(isset($_POST['design7']))
{
$id="";	
$value=$_POST['design7'];
$sql=mysqli_query($con,"select * from t_mrp where T_Stk_Name='$value'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly name='mrp7' id='mrp7' style='width:100px;' value='$row[mrp]' />";
}
}
if(isset($_POST['design8']))
{
$id="";	
$value=$_POST['design8'];
$sql=mysqli_query($con,"select * from t_mrp where T_Stk_Name='$value'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly name='mrp8' id='mrp8' style='width:100px;' value='$row[mrp]' />";
}
}
if(isset($_POST['design9']))
{
$id="";	
$value=$_POST['design9'];
$sql=mysqli_query($con,"select * from t_mrp where T_Stk_Name='$value'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly name='mrp9' id='mrp9' style='width:100px;' value='$row[mrp]' />";
}
}
if(isset($_POST['design10']))
{
$id="";	
$value=$_POST['design10'];
$sql=mysqli_query($con,"select * from t_mrp where T_Stk_Name='$value'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly name='mrp10' id='mrp10' style='width:100px;' value='$row[mrp]' />";
}
}
if(isset($_POST['design11']))
{
$id="";	
$value=$_POST['design11'];
$sql=mysqli_query($con,"select * from t_mrp where T_Stk_Name='$value'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly name='mrp11' id='mrp11' style='width:100px;' value='$row[mrp]' />";
}
}
if(isset($_POST['design12']))
{
$id="";	
$value=$_POST['design12'];
$sql=mysqli_query($con,"select * from t_mrp where T_Stk_Name='$value'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly name='mrp12' id='mrp12' style='width:100px;' value='$row[mrp]' />";
}
}
if(isset($_POST['design13']))
{
$id="";	
$value=$_POST['design13'];
$sql=mysqli_query($con,"select * from t_mrp where T_Stk_Name='$value'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly name='mrp13' id='mrp13' style='width:100px;' value='$row[mrp]' />";
}
}
if(isset($_POST['design14']))
{
$id="";	
$value=$_POST['design14'];
$sql=mysqli_query($con,"select * from t_mrp where T_Stk_Name='$value'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly name='mrp14' id='mrp14' style='width:100px;' value='$row[mrp]' />";
}
}
if(isset($_POST['design15']))
{
$id="";	
$value=$_POST['design15'];
$sql=mysqli_query($con,"select * from t_mrp where T_Stk_Name='$value'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly name='mrp15' id='mrp15' style='width:100px;' value='$row[mrp]' />";
}
}
if(isset($_POST['design16']))
{
$id="";	
$value=$_POST['design16'];
$sql=mysqli_query($con,"select * from t_mrp where T_Stk_Name='$value'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly name='mrp16' id='mrp16' style='width:100px;' value='$row[mrp]' />";
}
}
if(isset($_POST['design17']))
{
$id="";	
$value=$_POST['design17'];
$sql=mysqli_query($con,"select * from t_mrp where T_Stk_Name='$value'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly name='mrp17' id='mrp17' style='width:100px;' value='$row[mrp]' />";
}
}
if(isset($_POST['design18']))
{
$id="";	
$value=$_POST['design18'];
$sql=mysqli_query($con,"select * from t_mrp where T_Stk_Name='$value'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly name='mrp18' id='mrp18' style='width:100px;' value='$row[mrp]' />";
}
}
if(isset($_POST['design19']))
{
$id="";	
$value=$_POST['design19'];
$sql=mysqli_query($con,"select * from t_mrp where T_Stk_Name='$value'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly name='mrp19' id='mrp19' style='width:100px;' value='$row[mrp]' />";
}
}
if(isset($_POST['design20']))
{
$id="";	
$value=$_POST['design20'];
$sql=mysqli_query($con,"select * from t_mrp where T_Stk_Name='$value'");
while($row=mysqli_fetch_array($sql))
{
	echo "<input type='text' readonly name='mrp20' id='mrp20' style='width:100px;' value='$row[mrp]' />";
}
}
?>