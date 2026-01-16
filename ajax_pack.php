<?php
include('config.php');
if(isset($_REQUEST['design1']))
{
$id=$_REQUEST['design1'];
$totalbox=$_REQUEST['totalbox'];
$per_b=($totalbox*10)/100;
$val1=$totalbox-$per_b;
$val2=$totalbox+$per_b;
?>
<select name="batch1">
    
<?php
$sql=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$id' and T_Remain_Qty >= '$totalbox'");
while($row=mysqli_fetch_array($sql))
{
          
	echo "<option value=".$row['T_Batch_No'].">".$row['T_Batch_No']."(".$row['T_Remain_Qty'].")</option>";
       
}
?>
    </select>
    <?php
}

if(isset($_REQUEST['design2']))
{
$id=$_REQUEST['design2'];
$totalbox=$_REQUEST['totalbox'];
$per_b=($totalbox*10)/100;
$val1=$totalbox-$per_b;
$val2=$totalbox+$per_b;
?>
<select name="batch2">
    
<?php
$sql=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$id' and T_Remain_Qty >= '$totalbox'");
while($row=mysqli_fetch_array($sql))
{
            
	echo "<option value=".$row['T_Batch_No'].">".$row['T_Batch_No']."(".$row['T_Remain_Qty'].")</option>";
       
}
?>
    </select>
    <?php
}
if(isset($_REQUEST['design3']))
{
$id=$_REQUEST['design3'];
$totalbox=$_REQUEST['totalbox'];
$per_b=($totalbox*10)/100;
$val1=$totalbox-$per_b;
$val2=$totalbox+$per_b;
?>
<select name="batch3">
    
<?php
$sql=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$id' and T_Remain_Qty >= '$totalbox'");
while($row=mysqli_fetch_array($sql))
{
            
	echo "<option value=".$row['T_Batch_No'].">".$row['T_Batch_No']."(".$row['T_Remain_Qty'].")</option>";
       
}
?>
    </select>
    <?php
}
if(isset($_REQUEST['design4']))
{
$id=$_REQUEST['design4'];
$totalbox=$_REQUEST['totalbox'];
$per_b=($totalbox*10)/100;
$val1=$totalbox-$per_b;
$val2=$totalbox+$per_b;
?>
<select name="batch4">
    
<?php
$sql=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$id' and T_Remain_Qty >= '$totalbox'");
while($row=mysqli_fetch_array($sql))
{
            
	echo "<option value=".$row['T_Batch_No'].">".$row['T_Batch_No']."(".$row['T_Remain_Qty'].")</option>";
       
}
?>
    </select>
    <?php
}
if(isset($_REQUEST['design5']))
{
$id=$_REQUEST['design5'];
$totalbox=$_REQUEST['totalbox'];
$per_b=($totalbox*10)/100;
$val1=$totalbox-$per_b;
$val2=$totalbox+$per_b;
?>
<select name="batch5">
    
<?php
$sql=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$id' and T_Remain_Qty >= '$totalbox'");
while($row=mysqli_fetch_array($sql))
{
            
	echo "<option value=".$row['T_Batch_No'].">".$row['T_Batch_No']."(".$row['T_Remain_Qty'].")</option>";
       
}
?>
    </select>
    <?php
}
if(isset($_REQUEST['design6']))
{
$id=$_REQUEST['design6'];
$totalbox=$_REQUEST['totalbox'];
$per_b=($totalbox*10)/100;
$val1=$totalbox-$per_b;
$val2=$totalbox+$per_b;
?>
<select name="batch6">
    
<?php
$sql=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$id' and T_Remain_Qty >= '$totalbox'");
while($row=mysqli_fetch_array($sql))
{
            
	echo "<option value=".$row['T_Batch_No'].">".$row['T_Batch_No']."(".$row['T_Remain_Qty'].")</option>";
       
}
?>
    </select>
    <?php
}
if(isset($_REQUEST['design7']))
{
$id=$_REQUEST['design7'];
$totalbox=$_REQUEST['totalbox'];
$per_b=($totalbox*10)/100;
$val1=$totalbox-$per_b;
$val2=$totalbox+$per_b;
?>
<select name="batch7">
    
<?php
$sql=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$id' and T_Remain_Qty >= '$totalbox'");
while($row=mysqli_fetch_array($sql))
{
            
	echo "<option value=".$row['T_Batch_No'].">".$row['T_Batch_No']."(".$row['T_Remain_Qty'].")</option>";
       
}
?>
    </select>
    <?php
}
if(isset($_REQUEST['design8']))
{
$id=$_REQUEST['design8'];
$totalbox=$_REQUEST['totalbox'];
$per_b=($totalbox*10)/100;
$val1=$totalbox-$per_b;
$val2=$totalbox+$per_b;
?>
<select name="batch8">
    
<?php
$sql=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$id' and T_Remain_Qty >= '$totalbox'");
while($row=mysqli_fetch_array($sql))
{
            
	echo "<option value=".$row['T_Batch_No'].">".$row['T_Batch_No']."(".$row['T_Remain_Qty'].")</option>";
       
}
?>
    </select>
    <?php
}
if(isset($_REQUEST['design9']))
{
$id=$_REQUEST['design9'];
$totalbox=$_REQUEST['totalbox'];
$per_b=($totalbox*10)/100;
$val1=$totalbox-$per_b;
$val2=$totalbox+$per_b;
?>
<select name="batch9">
    
<?php
$sql=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$id' and T_Remain_Qty >= '$totalbox'");
while($row=mysqli_fetch_array($sql))
{
            
	echo "<option value=".$row['T_Batch_No'].">".$row['T_Batch_No']."(".$row['T_Remain_Qty'].")</option>";
       
}
?>
    </select>
    <?php
}
if(isset($_REQUEST['design10']))
{
$id=$_REQUEST['design10'];
$totalbox=$_REQUEST['totalbox'];
$per_b=($totalbox*10)/100;
$val1=$totalbox-$per_b;
$val2=$totalbox+$per_b;
?>
<select name="batch10">
    
<?php
$sql=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$id' and T_Remain_Qty >= '$totalbox'");
while($row=mysqli_fetch_array($sql))
{
            
	echo "<option value=".$row['T_Batch_No'].">".$row['T_Batch_No']."(".$row['T_Remain_Qty'].")</option>";
       
}
?>
    </select>
    <?php
}
if(isset($_REQUEST['design11']))
{
$id=$_REQUEST['design11'];
$totalbox=$_REQUEST['totalbox'];
$per_b=($totalbox*10)/100;
$val1=$totalbox-$per_b;
$val2=$totalbox+$per_b;
?>
<select name="batch11">
    
<?php
$sql=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$id' and T_Remain_Qty >= '$totalbox'");
while($row=mysqli_fetch_array($sql))
{
            
	echo "<option value=".$row['T_Batch_No'].">".$row['T_Batch_No']."(".$row['T_Remain_Qty'].")</option>";
       
}
?>
    </select>
    <?php
}
if(isset($_REQUEST['design12']))
{
$id=$_REQUEST['design12'];
$totalbox=$_REQUEST['totalbox'];
$per_b=($totalbox*10)/100;
$val1=$totalbox-$per_b;
$val2=$totalbox+$per_b;
?>
<select name="batch12">
    
<?php
$sql=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$id' and T_Remain_Qty >= '$totalbox'");
while($row=mysqli_fetch_array($sql))
{
            
	echo "<option value=".$row['T_Batch_No'].">".$row['T_Batch_No']."(".$row['T_Remain_Qty'].")</option>";
       
}
?>
    </select>
    <?php
}
if(isset($_REQUEST['design13']))
{
$id=$_REQUEST['design13'];
$totalbox=$_REQUEST['totalbox'];
$per_b=($totalbox*10)/100;
$val1=$totalbox-$per_b;
$val2=$totalbox+$per_b;
?>
<select name="batch13">
    
<?php
$sql=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$id' and T_Remain_Qty >= '$totalbox'");
while($row=mysqli_fetch_array($sql))
{
            
	echo "<option value=".$row['T_Batch_No'].">".$row['T_Batch_No']."(".$row['T_Remain_Qty'].")</option>";
       
}
?>
    </select>
    <?php
}
if(isset($_REQUEST['design14']))
{
$id=$_REQUEST['design14'];
$totalbox=$_REQUEST['totalbox'];
$per_b=($totalbox*10)/100;
$val1=$totalbox-$per_b;
$val2=$totalbox+$per_b;
?>
<select name="batch14">
    
<?php
$sql=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$id' and T_Remain_Qty >= '$totalbox'");
while($row=mysqli_fetch_array($sql))
{
            
	echo "<option value=".$row['T_Batch_No'].">".$row['T_Batch_No']."(".$row['T_Remain_Qty'].")</option>";
       
}
?>
    </select>
    <?php
}
if(isset($_REQUEST['design15']))
{
$id=$_REQUEST['design15'];
$totalbox=$_REQUEST['totalbox'];
$per_b=($totalbox*10)/100;
$val1=$totalbox-$per_b;
$val2=$totalbox+$per_b;
?>
<select name="batch15">
    
<?php
$sql=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$id' and T_Remain_Qty >= '$totalbox'");
while($row=mysqli_fetch_array($sql))
{
            
	echo "<option value=".$row['T_Batch_No'].">".$row['T_Batch_No']."(".$row['T_Remain_Qty'].")</option>";
       
}
?>
    </select>
    <?php
}
if(isset($_REQUEST['design16']))
{
$id=$_REQUEST['design16'];
$totalbox=$_REQUEST['totalbox'];
$per_b=($totalbox*10)/100;
$val1=$totalbox-$per_b;
$val2=$totalbox+$per_b;
?>
<select name="batch16">
    
<?php
$sql=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$id' and T_Remain_Qty >= '$totalbox'");
while($row=mysqli_fetch_array($sql))
{
            
	echo "<option value=".$row['T_Batch_No'].">".$row['T_Batch_No']."(".$row['T_Remain_Qty'].")</option>";
       
}
?>
    </select>
    <?php
}
if(isset($_REQUEST['design17']))
{
$id=$_REQUEST['design17'];
$totalbox=$_REQUEST['totalbox'];
$per_b=($totalbox*10)/100;
$val1=$totalbox-$per_b;
$val2=$totalbox+$per_b;
?>
<select name="batch17">
    
<?php
$sql=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$id' and T_Remain_Qty >= '$totalbox'");
while($row=mysqli_fetch_array($sql))
{
            
	echo "<option value=".$row['T_Batch_No'].">".$row['T_Batch_No']."(".$row['T_Remain_Qty'].")</option>";
       
}
?>
    </select>
    <?php
}
if(isset($_REQUEST['design18']))
{
$id=$_REQUEST['design18'];
$totalbox=$_REQUEST['totalbox'];
$per_b=($totalbox*10)/100;
$val1=$totalbox-$per_b;
$val2=$totalbox+$per_b;
?>
<select name="batch18">
    
<?php
$sql=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$id' and T_Remain_Qty >= '$totalbox'");
while($row=mysqli_fetch_array($sql))
{
            
	echo "<option value=".$row['T_Batch_No'].">".$row['T_Batch_No']."(".$row['T_Remain_Qty'].")</option>";
       
}
?>
    </select>
    <?php
}
if(isset($_REQUEST['design19']))
{
$id=$_REQUEST['design19'];
$totalbox=$_REQUEST['totalbox'];
$per_b=($totalbox*10)/100;
$val1=$totalbox-$per_b;
$val2=$totalbox+$per_b;
?>
<select name="batch19">
    
<?php
$sql=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$id' and T_Remain_Qty >= '$totalbox'");
while($row=mysqli_fetch_array($sql))
{
            
	echo "<option value=".$row['T_Batch_No'].">".$row['T_Batch_No']."(".$row['T_Remain_Qty'].")</option>";
       
}
?>
    </select>
    <?php
}
if(isset($_REQUEST['design20']))
{
$id=$_REQUEST['design20'];
$totalbox=$_REQUEST['totalbox'];
$per_b=($totalbox*10)/100;
$val1=$totalbox-$per_b;
$val2=$totalbox+$per_b;
?>
<select name="batch20">
    
<?php
$sql=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$id' and T_Remain_Qty >= '$totalbox'");
while($row=mysqli_fetch_array($sql))
{
            
	echo "<option value=".$row['T_Batch_No'].">".$row['T_Batch_No']."(".$row['T_Remain_Qty'].")</option>";
       
}
?>
    </select>
    <?php
}

?>