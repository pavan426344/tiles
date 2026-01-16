<?php
if(!isset($_REQUEST['dono']))
{
	echo "<script>document.location='home.php';</script>";
}
include('config.php');

require_once("dompdf/dompdf_config.inc.php");

ob_start();

?>
         <?php
  $selectdo=mysqli_query($con,"select * from finalsales where doid='$_REQUEST[dono]'"); 
 	while($rowdo=mysqli_fetch_array($selectdo))
	{
 ?> 
<style type="text/css">
		  tr,td{border: 1px solid black; border-collapse:collapse;font-size:10px !important;}
		  </style>
          <p align="center" style="font-size:18px;"><strong>Entire Ceramics Limited</strong></p>
           <p align="center" style="font:Verdana, Geneva, sans-serif; font-size:14px;margin-top:-8px;" >Survey No: 25/4 & 25/5, N.H. No: 4, Vill: Maradihally, Tal: Hiriyur, Dist: Chitradurga, Karnataka-577532.<br />GSTIN / UIN No.: 29AADCE0596R1ZV  |  CIN NO.: U26914GJ2012PLC070519</p>
<table width="100%" cellpadding="0" cellspacing="0" align="center" style="margin-left:-5px; margin-right:60px;font-family:Verdana, Geneva, sans-serif;border: 1px solid black; border-collapse:collapse;">
<tr><td><table width="100%"><tr><td align="left" width="50%"><strong>Order Date: <?php echo $rowdo['Date']; ?></strong></td><td align="right"> <strong>DO No: <?php echo $_REQUEST['dono']; ?><br /> Date : <?php echo $rowdo['dodate']; ?> </strong></td></tr></table></td></tr>
<tr><td align="center"><font face="Verdana, Geneva, sans-serif" style="font-size:12px"><strong>DISPATCH ORDER</strong></font></td></tr>
<tr><td>
<table  align="center" width="100%">
<tr><td style="font-size:12px" width="50%" align="center"><strong>BUYER NAME & ADDRESS :</strong></td><td style="font-size:12px" align="center" width="50%"><strong>CONSIGNEE / DELIVERY ADDRESS :</strong></td></tr>
<?php 
$dealer=mysqli_query($con,"select * from dealer where TIN='$rowdo[Dealer_Tin]'"); 
while($rowd=mysqli_fetch_array($dealer))
{
    $dealer_name_do=$rowdo['Dealer_Name'];
    if(strcmp($dealer_name_do,$rowd['CompanyName'])==0)
    {        
?>
<tr>
<td style="font-size:10px" align="left" width="50%"><strong><?php echo $dealer_name_do; ?></strong><br /><?php echo $rowdo['Dealer_Address']; ?><br /><strong>TIN: <?php  echo $rowdo['Dealer_Tin']; ?></strong>|<strong>CST: <?php echo $rowdo['Dealer_Cst']; ?></strong><br /> <strong>GSTIN / UIN No.: <?php echo $rowdo['gstin_uin']; ?></strong><br/>Contact Person:<strong><?php echo $rowd['Name']."--".$rowd['Mobile']?></strong><br/><strong>Phone No: <?php echo $rowd['Phone']; ?><br/><strong>Email Id: <?php echo $rowd['Email']; ?></strong></strong></td>
<td style="font-size:10px" align="left" width="50%" valign="top"><?php echo "<b>".$rowdo['Delivery_Address']."</b>"; ?></td></tr>
<?php
    }

    } ?>
</table>
</td></tr>
<tr><td><table width="100%"><tr><td align="right"><strong>Sales Executive:</strong><?php echo $rowdo['executive']; ?> &nbsp; &nbsp; <?php echo $rowdo['executivecontact']; ?></td></tr></table> </td></tr>
<tr>
<td>
<table  align="center" width="100%" style="font-size:11px !important">
<tr align="center"><td width="5%">No.</td><td width="25%">Description of Goods</td><td width="10%">Size</td>
<td width="10%">Grade</td><td width="10%">Pack</td><td width="10%">BOX</td><td width="10%">MRP</td><td width="10%">Rate</td><td width="15%">Amount</td>
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
                            <tr>
                            <td align="center"><?php echo $j; ?></td>
                            <td width="15%"><?php echo $design_name; ?></td>
                            <td>
                            <?php
							$select_size=mysqli_query($con,"select * from design where DesignName='$design_name'");
							while($select_size_row=mysqli_fetch_array($select_size))
							{
							 echo $select_size_row['Size']; 
							}
							 ?>
</td>
                            <td align="center"><?php echo $rowproduct['Grade']; ?></td>
                            <td align="center"><?php echo $rowproduct['pack']; ?></td>
                            <td align="center"><?php echo $rowproduct['Quantity']; ?></td>
                            <td align="center"><?php echo $rowproduct['MRP']; ?></td>
                            <td align="center"><?php echo $rowproduct['Rate']; ?></td>
                            <td align="right"><?php echo $rowproduct['Amount']; ?></td>
                            </tr>
                       <?php  
						$j++;
						$box=$box+$rowproduct['Quantity'];
						$amount=$amount+$rowproduct['Amount'];
					}
					?>
                    <tr style="font-weight:bold"><td></td><td width="15%">Total</td><td></td><td></td><td></td><td align="center"><?php echo $box; ?></td><td></td><td></td><td align="right"><?php echo $amount; ?></td></tr>
</table>
</td>
</tr>
<tr>
<td>
<?php $selectpdc=mysqli_query($con,"select * from pdccheck where doid='$_REQUEST[dono]'"); 
while($rowpdc=mysqli_fetch_array($selectpdc))
{
?>
<table  align="center" width="100%">
<tr><td colspan="2"><strong>Security Check Detail</strong></td><td>Discount@<?php echo $rowdo['discountp']; ?>%</td><td align="right"><?php echo $rowdo['Discount'].".00"; ?></td></tr>
<tr>
<td  align="left">Cheque No</td><td><?php echo $rowpdc['Checkno']; ?></td>
<td width="25%" align="left">CGST @14% </td><td align="right"> <?php echo $rowdo['cgst']; ?></td>
</tr>
<tr>
<td  align="left">Account No. </td><td><?php echo $rowpdc['acc_no']; ?></td>
<td align="left">SGST @14%</td><td align="right"><strong><?php echo $rowdo['sgst']; ?></strong></td>
</tr>
<tr>
<td  align="left">Bank Name </td><td><?php echo $rowpdc['Bankname']; ?></td>
<td width="25%" align="left">IGST @28%  </td><td align="right"><?php echo $rowdo['igst']; ?></td>
</tr>

<tr>
<td align="left">Bank Branch </td><td> <?php echo $rowpdc['BankBranch']; ?></td>
<td align="right">Round Off Amount</td><td align="right"><strong><?php echo $rowdo['roundoff']; ?></strong></td>
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
<td colspan="3"><strong>Rs In Words:- </strong><?php echo $rowdo['rsamount']; ?></td></tr>
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
     		
            <?php } ?>
            
<?php
	
$html = ob_get_clean();

$dompdf = new DOMPDF();

$dompdf->load_html($html);

$dompdf->render();
$name=$_REQUEST['dono'].".pdf";
$dompdf->stream($name);

?>

