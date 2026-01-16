<?php
if(isset($_REQUEST['executive']))
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
        <p align="center"> <h4>Executive wise Pending Order</h4>
        </p>
        <b>EXECUTIVE NAME :- <?php=$_REQUEST['executive']?> </b>
  <table>
  
  <tr ><th>SR No.</th>
  <th>DO</th>
  <th>ST</th>
  <?php
  $grade=$_REQUEST['grade1'];
  $series=$_REQUEST['series'];
  $design_substring[]="";
  $k=1;
  $select_series=mysqli_query($con,"select * from design ORDER BY DesignName ASC");
  while($select_series_row=mysqli_fetch_array($select_series))
  {
	  $rowcount++;
	  $design1[$rowcount]=0;
	
  ?>
  <th><?php echo $select_series_row['DesignName'];?></th>
  <?php
  $k++;
  }
 // echo $k;
  ?>
  <th>Total</th>
  </tr>
  
  <?php
  	
   $i=1;
   $select_sale=mysqli_query($con,"select * from finalsales where executive='$_REQUEST[executive]' and Confirm='0'");
   
        while($select_sale_row=mysqli_fetch_array($select_sale))
		{
			
        $order_id=$select_sale_row['doid'];
		$state_string=substr($order_id, 0,2);
		
		$slect_product1=mysqli_query($con,"select Distinct doid,Grade from finalsales_product where doid='$order_id'");
		
		while($slect_product1_row=mysqli_fetch_array($slect_product1))
		{
			
		?>
        <tr>
        <?php
		
		?>
        <td><?php echo $i;?></td><td><?php echo $order_id;?></td><td><?php echo $state_string;?></td>
		<?php
		$qty=0;
		$j=0;
		$count=1;
		//$design=0;
		$slect_product=mysqli_query($con,"select * from finalsales_product where doid='$order_id' order by DesignName asc");
		while($slect_product_row=mysqli_fetch_array($slect_product))
		{
		
		?>
        <?php
		$design=$slect_product_row['DesignName'];
		
		$select_sale_by_design=mysqli_query($con,"select * from design  ORDER BY DesignName ASC LIMIT $j,$k");
		
		while($select_sale_by_design_row=mysqli_fetch_array($select_sale_by_design))
		{
			    /*$design_substring=trim($select_sale_by_design_row['DesignName']," ");
			 	   
				$design_substring[$j]=$slect_product_row['Quantity'];
			   echo $design_substring[$j]."<br/>";*/
			//$rowcount++;
			if(strcmp($select_sale_by_design_row['DesignName'],$design)==0)
			{
			?>
             <td><?php echo substr($slect_product_row['Grade'],0,1)."-".$slect_product_row['Quantity'];?></td>
            
            <?php
			//$rowcount++;
			$qty=$qty+$slect_product_row['Quantity'];
			$design1[$count]=$design1[$count]+$slect_product_row['Quantity'];
			$j++;
			 $count++;
			//echo $design[$count];
			goto a;
			
			}
			if(strcmp($select_sale_by_design_row['DesignName'],$design)!=0)
			{
				echo "<td>-</td>";	
				$j++;
				 $count++;
				//$rowcount++;
			}
			 
			
		}
			a:
			
			
		}
		for($z=$j;$z<=$k-2;$z++)
			{
				echo "<td>-</td>";	
				//$rowcount++;
			}
  ?>
  	<td><?php echo $qty; 
			$qty1=$qty1+$qty;
	?></td>
  </tr>
 
  <?php
        $i++;	
		}
	
	
		
		}
		//echo $rowcount."-";
		?>
        
        <tr><td colspan="3">TOTAL</td>
        <?php
			
			for($new=1;$new<$rowcount+1;$new++)
			{
				?>
                	<td><?php echo $design1[$new]; ?></td>
                <?php
			}
		  ?>
        <td><?php echo $qty1; ?></td></tr>
	
  </table>
  end of table       
  
  
  </body>
  </html>
  <?php
}
else
{
 echo "<script>document.location='pending-order.php';</script>";	
}
  ?>