<?php
 include('config.php');
  $selectdo=mysqli_query($con,"select * from approvesales where txn_id='$_REQUEST[txn_id]' and doid='$_REQUEST[sono]'"); 
 	while($rowdo=mysqli_fetch_array($selectdo))
	{
 ?> 
			<style type="text/css">
		  	tr,td{border: 1px solid black; border-collapse:collapse;font-size:10px !important;}
		  	</style>
          <p align="center" style="font-size:18px;"><strong>Swastik Ceramics Limited</strong></p>
          <p align="center" style="font:Verdana, Geneva, sans-serif; font-size:14px;margin-top:-8px;" >B-800,8th Floor,Ganesh Maridian,Opp. Gujarat Highcourt,SG Highway,Ahmedabad<br />GSTIN / UIN No.: 29CMDCE0596R1ZS |  CIN NO.: U26914MH2012LC070519</p>
<p align="center" ><strong>Unit - <?php echo $rowdo['unit_name'];?></strong></p>
          <table width="100%" cellpadding="0" cellspacing="0" align="center" style="margin-left:-5px; margin-right:60px;font-family:Verdana, Geneva, sans-serif;border: 1px solid black; border-collapse:collapse;">
<tr><td><table width="100%"><tr><td align="left" width="50%"><strong>Order Date: <?php echo $rowdo['Date']; ?></strong></td><td align="right"> <strong>SO No: <?php echo $_REQUEST['sono']; ?><br /> Date : <?php echo $rowdo['sodate']; ?> </strong></td></tr></table></td></tr>
<tr><td align="center"><font face="Verdana, Geneva, sans-serif" style="font-size:12px"><strong>PACKING LIST</strong></font></td></tr>
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
$total_weight=0;
					$selectproduct=mysqli_query($con,"select * from approvesales_product where doid='$_REQUEST[sono]'");
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
</table>
     		
            <?php } ?>
          <br/>
            <table align="center"><tr><td>
<a href="pdfpacking.php?sono=<?php echo $_REQUEST['sono']; ?>&txn_id=<?php echo $_REQUEST['txn_id']; ?>"> PDF Export</a></td><td><input type="button" onclick="window.print()" value="Print" /></td><td><input type="button" name="close" value="Close" onclick="window.close()" /></td></tr></table>