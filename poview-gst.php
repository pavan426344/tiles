<?php
 include('config.php');

session_start();
$username='';
$usertype='';
if(isset($_SESSION['username']))
{
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
  $so_date=0;
  $do_confirm=0;
  $total_weight=0;
  $txnid="";
  $selectdo=mysqli_query($con,"select * from finalsales where doid='$_REQUEST[dono]' and Confirm='0' and status='1'"); 
  if(mysqli_num_rows($selectdo)>0)
  {    
  while($rowdo=mysqli_fetch_array($selectdo))
	{
            $txnid=$rowdo['txn_id'];
		if($rowdo['Confirm']==1)
			{
				$do_confirm=1;
				$so_date=$rowdo['sodate'];
		    }
			reset($rowdo);
 ?> 
			<style type="text/css">
		  	tr,td{border: 1px solid black; border-collapse:collapse;font-size:10px !important;}
		  	</style>
          <p align="center" style="font-size:18px;"><strong>Swastik Ceramics Limited</strong></p>
          <p align="center" style="font:Verdana, Geneva, sans-serif; font-size:14px;margin-top:-8px;" >B-800,8th Floor,Ganesh Maridian,Opp. Gujarat Highcourt,SG Highway,Ahmedabad<br />GSTIN / UIN No.: 29CMDCE0596R1ZS |  CIN NO.: U26914MH2012LC070519</p>
<table width="100%" cellpadding="0" cellspacing="0" align="center" style="margin-left:-5px; margin-right:60px;font-family:Verdana, Geneva, sans-serif;border: 1px solid black; border-collapse:collapse;">
<tr><td><table width="100%"><tr><td align="left" width="50%"><strong>Order Date: <?php echo $rowdo['Date']; ?></strong></td><td align="right"> <strong>PO No: <?php echo $_REQUEST['dono']; ?><br /> Date : <?php echo $rowdo['dodate']; ?> </strong></td></tr></table></td></tr>
<tr><td align="center"><font face="Verdana, Geneva, sans-serif" style="font-size:12px"><strong>PENDING ORDER</strong></font></td></tr>
<tr><td>
<table  align="center" width="100%">
<tr><td style="font-size:12px" width="50%" align="center"><strong>BUYER NAME & ADDRESS :</strong></td><td style="font-size:12px" align="center" width="50%"><strong>CONSIGNEE / DELIVERY ADDRESS :</strong></td></tr>

<?php 
$dealer=mysqli_query($con,"select * from dealer where Dealer_id='$rowdo[dealer_id]'"); 
while($rowd=mysqli_fetch_array($dealer))
{
    $dealer_name_do=$rowdo['Dealer_Name'];
    if(strcmp($dealer_name_do,$rowd['CompanyName'])==0)
    {        
?>
<tr>
<td style="font-size:10px" align="left" width="50%"><strong><?php echo $dealer_name_do; ?></strong><br /><?php echo $rowdo['Dealer_Address']; ?><br /><strong>GSTIN / UIN No.: <?php echo $rowdo['gstin_uin']; ?></strong><br/><strong>PAN No.: <?php echo $rowd['PAN']; ?></strong><br/>Contact Person: <strong><?php echo $rowd['Name']."-".$rowd['Mobile']?></strong><br/><strong>Phone No: <?php echo $rowd['Phone']; ?><br/><strong>Email Id: <?php echo $rowd['Email']; ?></strong></strong></td>
<td style="font-size:10px" align="left" width="50%" valign="top"><?php echo "<b>".$rowdo['Delivery_Address']."</b>"; ?></td></tr>
<?php
    }

    } ?>

</table>
</td></tr>
<tr><td><table width="100%"><tr><td align="right"><strong>Sales Executive:</strong><?php echo $rowdo['executive']; ?> &nbsp; &nbsp; <?php echo $rowdo['executivecontact']; ?></td></tr></table> </td></tr>
<tr><td></td></tr>
<tr>
<td>
<table  align="center" width="100%" style="font-size:11px !important">
<tr align="center" style="font-size:11px !important;width:100%;" ><td width="5%">No.</td><td width="25%">Description of Goods</td><td width="10%">Box</td>
<td width="10%">Batch No</td><td width="10%">S.Rate</td><td width="10%">Rate</td><td width="15%">Amount</td>
</tr>
<?php
$j=1;
$box=0;
$amount=0;
					$selectproduct=mysqli_query($con,"select * from finalsales_product where doid='$_REQUEST[dono]'");
					while($rowproduct=mysqli_fetch_array($selectproduct))
					{   
					        $design_name=$rowproduct['DesignName'];
							?>
                            <tr style="font-size:11px !important;width:100%;">
                            <td align="center"><?php echo $j; ?></td>
                            <td width="15%"><?php echo $design_name; ?></td>
                            <td align="center"><?php echo $rowproduct['Quantity']; ?></td>
                            <td align="center"><?php echo $rowproduct['batch_no']; ?></td>
                            <td align="center"><?php echo $rowproduct['MRP']; ?></td>
                            <td align="center"><?php echo $rowproduct['Rate']; ?></td>
                            <td align="right"><?php echo number_format($rowproduct['Amount'],"2"); ?></td>
                            </tr>
                       <?php  
						$j++;
						$box=$box+$rowproduct['Quantity'];
						$amount=$amount+$rowproduct['Amount'];
                                                $total_weight=$total_weight+$rowproduct['weight'];
					}
					?>
                    <tr style="font-weight:bold"><td></td><td width="15%">Total</td><td align="center"><?php echo $box; ?></td><td></td><td></td><td></td><td align="right"><?php echo number_format($amount,"2"); ?></td></tr>
</table>
</td>
</tr>
<tr>
<td>
<?php 
$cheque='';
$selectpdc=mysqli_query($con,"select * from pdccheck where doid='$_REQUEST[dono]'"); 
while($rowpdc=mysqli_fetch_array($selectpdc))
{
	$cheque=$rowpdc['Chequecopy'];
?>
<table  align="center" width="100%">
<tr><td colspan="2"><strong>Security Cheque Detail</strong></td><td>Discount@<?php echo $rowdo['discountp']; ?>%</td><td align="right"><?php echo number_format($rowdo['Discount'],"2"); ?></td></tr>
<tr>
<td  align="left">Cheque No</td><td><?php echo $rowpdc['Checkno']; ?></td>
<td width="25%" align="left">CGST @9% </td><td align="right"> <?php echo number_format($rowdo['cgst'],"2"); ?></td>
</tr>
<tr>
<td  align="left">Account No. </td><td><?php echo $rowpdc['acc_no']; ?></td>
<td align="left">SGST @ 9%</td><td align="right"><?php echo number_format($rowdo['sgst'],"2"); ?></td>
</tr>
<tr>
<td  align="left">Bank Name </td><td><?php echo $rowpdc['Bankname']; ?></td>
<td width="25%" align="left">IGST @ 18%</td><td align="right"><?php echo number_format($rowdo['igst'],"2"); ?></td>
</tr>

<tr>
<td align="left">Bank Branch </td><td> <?php echo $rowpdc['BankBranch']; ?></td>
<td width="25%" align="right">Round Off Amount </td><td align="right"><strong><?php $tv=round($rowdo['roundoff']);echo number_format($tv,"2"); ?></strong></td>
</tr>

</table>
<?php
}
?>
</td>
</tr>
<tr>
<td>
<table align="left" width="100%">
<tr>
    <td colspan="2"><strong>Rs In Words:- </strong><?php echo $rowdo['rsamount']; ?></td><td><strong>Total Weight:- </strong><?php echo $total_weight." Kg";?></td></tr>
<?php $remarks=mysqli_query($con,"select * from remarks_do where doid='$_REQUEST[dono]'"); 
while($rowremarks=mysqli_fetch_array($remarks))
{
?>
<tr>
<td><strong>Remarks:</strong> <?php echo $rowremarks['remarks']; ?></td>
<td><strong>User:</strong><?php echo $rowremarks['username']; ?></td>
<td><strong>Date:</strong><?php echo $rowremarks['date']; ?></td>
</tr>
<?php
}
?>
</table>
</td>
</tr>
</table>
     		<br/>
            <?php 
			
			} 
                        
                            
                            ?>
            <?php 
              
  
             $select=mysqli_query($con,"select * from profilesetting where User_id='$username'");
			while($rowprofile=mysqli_fetch_array($select))
			{
			 ?>
            <table align="center">
            <tr>
            	<?php
                if($rowprofile['edit_po']==1)
                {    
                ?>
		<td><a href="purchase1.php?doid=<?php echo $_REQUEST['dono']; ?>&type=edit">EDIT</a></td>
                <?php
                }
                if($rowprofile['reject_po']==1)
                {
                ?>
		<td><a href="reject-do.php?rdoid=<?php echo $_REQUEST['dono']; ?>&txn_id=<?php echo $txnid; ?>">Reject</a></td>
                <?php
                }
                if($rowprofile['delete_po']==1)
                {
                ?>
                <td><a href="delete-do.php?ddoid=<?php echo $_REQUEST['dono']; ?>&txn_id=<?php echo $txnid; ?>" onclick="return confirm('Are You Sure?')" >Delete</a></td>
                <?php
                }
                if($rowprofile['approve_po']==1)
                {
                ?>
                
		<td>		
                <a href="do-details.php?appid=<?php echo $_REQUEST['dono']; ?>&txn_id=<?php echo $txnid; ?>">Approve</a></td>
                <?php
                }
                        
                ?>
                <td><input type="button" onclick="window.print()" value="Print" /></td><td><input type="button" name="close" value="Close" onclick="window.close()" /></td>
             </tr>
             </table>

<?php  }
  }
  else
  {
      echo "<script>alert('PO Approved or Rejected');document.location='home.php';</script>";
  }    
  ?>