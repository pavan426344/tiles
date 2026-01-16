<?php
if(isset($_REQUEST['design']))
{
	
 include("config.php");
		  @session_start();
$username='';
$usertype='';
$qty1=0;
$rowcount=0;

$design1=array();
if(isset($_SESSION['username']))
{
	include("config.php");
	$usertype=$_SESSION['usertype'];
	$username=$_SESSION['username'];
	
	$CheckStatus=mysqli_query($con,"select * from userlogin where User_Name='$username' and UserType='$usertype'");
	if(mysqli_num_rows($CheckStatus)>0)
	{
		while($Checkrow=mysqli_fetch_array($CheckStatus))
		{
			if($Checkrow['Status']=='0')	
			{
				echo "<script>document.location='index.php?ses=frr';</script>";			
			}
		}
	}
	else
	{
		echo "<script>document.location='index.php?ses=frr';</script>";	
	}
}
else
{
	echo "<script>document.location='index.php?ses=frr';</script>";
}


?>
<html>
<head>
<title></title>
<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
}
</style>
</head>
<body>
<p align="center" style="font-size:18px;"><strong>Entire Ceramics Limited</strong></p>
         <p align="center" style="font:Verdana, Geneva, sans-serif; font-size:14px;margin-top:-8px;" >Survey No: 25/4 & 25/5, N.H. No: 4, Vill: Maradihally, Tal: Hiriyur, Dist: Chitradurga, Karnataka-577532.<br />E.C.C. No.: AADCE0596R EM001  |  VAT NO.: 29811117249  |  C.S.T. NO.: 29811117249</p>
   <h4 align="center">Design wise Pending Order</h4>      
  <table align="center">
  
  <tr ><th>SR No.</th><th>GRADE</th>
  <th>DO</th>
  <th>ST</th>
  
  <th><?php echo $_REQUEST['design'];?></th>
 
  
  </tr>
  
  <?php
  	$total_box=0;
   $i=1;
   $select_sale=mysqli_query($con,"select * from finalsales where Confirm='0'");
   
        while($select_sale_row=mysqli_fetch_array($select_sale))
		{
			
        $order_id=$select_sale_row['doid'];
		$state_string=substr($order_id, 0,2);
		
		$slect_product1=mysqli_query($con,"select * from finalsales_product where doid='$order_id' and DesignName='$_REQUEST[design]'");
		
		while($slect_product1_row=mysqli_fetch_array($slect_product1))
		{
			
		?>
        <tr >
        <?php
		   $quantity=$slect_product1_row['Quantity'];
		?>
        <td><?php echo $i;?></td> 
        <td><?php echo $slect_product1_row['Grade'];?></td>
        <td><?php echo $order_id;?></td>
        <td><?php echo $state_string;?></td>
        <td style="text-align:right;"><?php echo $quantity; $total_box=$total_box+$quantity;?></td>
		<?php
		$i++;
		}
		
		
		}
		?>
      <tr>
      <td colspan="4">TOTAL</td>
      <td style="text-align:right;"><?php echo $total_box;?></td>
      </tr>
	
  </table>
        
  
  
  </body>
  </html>
  <?php
}
else
{
 echo "<script>document.location='pending-order.php';</script>";	
}
  ?>