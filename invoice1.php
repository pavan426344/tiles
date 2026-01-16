          <?php	  
		  include("config.php");
		  @session_start();
$username='';
$usertype='';
$total_box_weight=0;
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

		  $do='';
		  	if(isset($_REQUEST['purchase']))
			{
				
				$update=mysqli_query($con,"update finalsales set Delivery_Address='$_REQUEST[deladd1]',Discount='$_REQUEST[discountam]',cgst='$_REQUEST[cgst]',sgst='$_REQUEST[sgst]',igst='$_REQUEST[igst]',Total='$_REQUEST[totalam]',Totalbox='$_REQUEST[box]',roundoff='$_REQUEST[totalamount1]',discountp='$_REQUEST[discount]',rsamount='$_REQUEST[rswords]' where doid='$_REQUEST[doid]'");
				$date=date('d-m-y');
				/*$insertdo=mysqli_query($con,"insert into finalsales(User_id,doid,Dealer_Name,Dealer_Address,Delivery_Address,Dealer_Tin,Dealer_Cst,Date,dodate,Discount,taxtype,Vat,Excise,edu,hiedu,Total,roundoff,discountp,rsamount,transport,OrderStatus,NextConfirm) values('$username','$do','$_REQUEST[dealer]','$_REQUEST[deladdress]','$_REQUEST[deladd]','$_REQUEST[deltin]','$_REQUEST[delcst]','$_REQUEST[date]','$date','$_REQUEST[discountam]','$_REQUEST[taxtype]','$_REQUEST[vat]','$_REQUEST[excise]','$_REQUEST[edu]','$_REQUEST[hiedu]','$_REQUEST[totalam]','$_REQUEST[totalamount1]','$_REQUEST[discount]','$_REQUEST[rswords]','$_REQUEST[transport]','0','5')");				*/
				
				if($update==1)
				{
                                        $select_finalsales_product=mysqli_query($con,"select * from finalsales_product where doid='$_REQUEST[doid]'");
                                        while($select_finalsales_product_row=mysqli_fetch_array($select_finalsales_product))
                                        {
                                             $box_q=$select_finalsales_product_row['Quantity'];
                                             $rm_qty=0;
                                             $bk_qty=0;
                                             $select_production=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$select_finalsales_product_row[DesignName]' and T_Batch_No='$select_finalsales_product_row[batch_no]'");
                                             while($select_production_row=mysqli_fetch_array($select_production))
                                             {
                                                 $bk_qty=$select_production_row['T_Book_Qty'];
                                                 $rm_qty=$select_production_row['T_Remain_Qty'];
                                             
                                             }
                                             $b_qty=$bk_qty-$box_q;
                                             $actual_r_q=$rm_qty+$box_q;
                                             $update_production=mysqli_query($con,"update t_production set T_Book_Qty='$b_qty',T_Remain_Qty='$actual_r_q' where T_Item_Stk_Name='$select_finalsales_product_row[DesignName]' and T_Batch_No='$select_finalsales_product_row[batch_no]'");
                                             
                                        }        
                                        $countp=mysqli_query($con,"delete from finalsales_product where doid='$_REQUEST[doid]'");
					for($i=1;$i<21;$i++)
					{
						$mrp="mrp".$i;
						if(isset($_REQUEST[$mrp]))	
						{
							if(strcmp($_REQUEST[$mrp],"0")!=0)
							{
							$design=$_REQUEST['design'.$i];
							$box=$_REQUEST['totalbox'.$i];
                                                        $batch=$_REQUEST['batch'.$i];
							$rate=$_REQUEST['rate'.$i];
							$mrp=$_REQUEST['mrp'.$i];
							$amount=$_REQUEST['amount'.$i];
                                                        $r_qty=0;
                                                        $box_wight=0;
                                                        $select_weight=mysqli_query($con,"select * from t_item where T_Item_Stk_Name='$design' limit 0,1");
                                                        while($select_weight_row=mysqli_fetch_array($select_weight))
                                                        {
                                                            $box_wight=$box*$select_weight_row['T_Item_Weight'];
                                                        }
                                                        $total_box_weight=$total_box_weight+$box_wight;
							$insertproduct=mysqli_query($con,"insert into finalsales_product(txn_id,doid,DesignName,batch_no,Quantity,weight,Rate,MRP,Amount) values('$_REQUEST[txn_id]','$_REQUEST[doid]','$design','$batch','$box','$box_wight','$rate','$mrp','$amount')");
                                                        $select_p=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$design' and T_Batch_No='$batch'");
                                                        while($select_p_row=mysqli_fetch_array($select_p))
                                                        {
                                                            $r_qty=$select_p_row['T_Remain_Qty'];
                                                        } 
                                                        $f_r_qty=$r_qty-$box;
                                                        $update_p=mysqli_query($con,"update t_production set T_Book_Qty='$box',T_Remain_Qty='$f_r_qty' where T_Item_Stk_Name='$design' and T_Batch_No='$batch'");
							}
						}
					}
					
						if($insertproduct==1)
						{
							
							$insertremarks=mysqli_query($con,"insert into remarks_do(remarks,username,date,doid,txn_id) values('$_REQUEST[remarks]','$username','$date','$_REQUEST[doid]','$_REQUEST[txn_id]')");
							
						}
				}
			}
		  ?>
          <script language="javascript" type="text/javascript">
    window.history.forward(0);
</script> 
           
          <style type="text/css">
		  tr,td{border: 1px solid black; border-collapse:collapse;font-size:10px !important;}
		  </style>
         
          <p align="center" style="font-size:18px;"><strong>Swastik Ceramics Limited</strong></p>
         <p align="center" style="font:Verdana, Geneva, sans-serif; font-size:14px;margin-top:-8px;" >B-800,8th Floor,Ganesh Maridian,Opp. Gujarat Highcourt,SG Highway,Ahmedabad<br />GSTIN / UIN No.: 29CMDCE0596R1ZS |  CIN NO.: U26914MH2012LC070519</p>
<table width="100%" cellpadding="0" cellspacing="0" align="center" style="margin-left:-5px; margin-right:60px;font-family:Verdana, Geneva, sans-serif;border: 1px solid black; border-collapse:collapse;">
<tr><td><table width="100%"><tr><td align="left" width="50%"><strong>Order Date: <?php echo $_REQUEST['date']; ?></strong></td><td align="right"> <strong>PO No: <?php echo $_REQUEST['doid']; ?><br /> Date : <?php echo date("d-m-y"); ?> </strong></td></tr></table></td></tr>
<tr><td align="center"><font face="Verdana, Geneva, sans-serif" style="font-size:14px"><strong>PENDING ORDER</strong></font></td></tr>
<tr><td>
<table  align="center" width="100%">
<tr><td style="font-size:14px" width="50%" align="center"><strong>BUYER NAME & ADDRESS :</strong></td><td style="font-size:16px" align="center" width="50%"><strong>CONSIGNEE / DELIVERY ADDRESS :</strong></td></tr>
<?php $dealer=mysqli_query($con,"select * from dealer where Dealer_id='$_REQUEST[dealer_id]'"); 
while($rowd=mysqli_fetch_array($dealer))
{
?>
<tr>
<td style="font-size:10px" align="left" width="50%"><strong> <?php echo $rowd['CompanyName']; ?></strong><br /><?php echo $_REQUEST['deladd']; ?><br/><strong>GSTIN / UIN No.: <?php echo $_REQUEST['delgst']; ?></strong><br/><strong>PAN No.: <?php echo $rowd['PAN']; ?></strong><br />Contact Person:<strong><?php echo $rowd['Name']."-".$rowd['Mobile'];?></strong></td>
<td style="font-size:10px" align="left" width="50%" valign="top"><?php echo $_REQUEST['deladd']; ?></td></tr>
<?php
}
?>
</table>
</td></tr>
<tr><td align="right"><strong>Sales Executive:</strong><?php echo $_REQUEST['delexe'];  ?> &nbsp;&nbsp; <?php echo $_REQUEST['delexecontact'];  ?> </td></tr></table></td></tr>
<tr>
<td>
<table  align="center" width="100%" style="font-size:11px !important">
<tr align="center"><td width="5%">No.</td><td width="25%">Description of Goods</td>
<td width="10%">Box</td><td width="10%">Batch No</td><td width="10%">S.Rate</td><td width="10%">Rate</td><td width="15%">Amount</td>
</tr>
<?php
$j=1;
					for($i=1;$i<21;$i++)
					{
						$mrp="mrp".$i;
						
						if(isset($_REQUEST[$mrp]))	
						{	
							?>
                            <tr>
                            <td align="center"><?php echo $j; ?></td>
                            <td width="15%"><?php echo $_REQUEST['design'.$i]; ?></td>
                            <td align="center"><?php echo $_REQUEST['totalbox'.$i]; ?></td>
                            <td align="center"><?php echo $_REQUEST['batch'.$i]; ?></td>
                            <td align="center"><?php echo $_REQUEST['mrp'.$i]; ?></td>
                            <td align="center"><?php echo $_REQUEST['rate'.$i]; ?></td>
                            <td align="right"><?php echo number_format($_REQUEST['amount'.$i],"2"); ?></td>
                            </tr>
                            <?php	
						}
						$j++;
					}
					?>
                    <tr style="font-weight:bold"><td></td><td width="15%">Total</td><td align="center"><?php echo $_REQUEST['box']; ?></td><td></td><td></td><td></td><td align="right"><?php echo number_format($_REQUEST['subtotal'],"2"); ?></td></tr>
</table>
</td>
</tr>
<tr>
<td>
<table  align="center" width="100%">
<tr><td colspan="2">Security Check Detail</td><td>Discount@<?php echo $_REQUEST['discount']; ?>%</td><td align="right"><?php echo $_REQUEST['discountam']; ?></td></tr>
<tr>
<td  align="left">Cheque No</td><td><?php echo $_REQUEST['checkno']; ?></td>
<td width="25%" align="left">CGST @9% </td><td align="right"> <?php echo $_REQUEST['cgst']; ?></td>
</tr>
<tr>
<td  align="left">Acc No. </td><td><?php echo $_REQUEST['checkdate']; ?></td>
<td align="left">SGST @9%</td><td align="right"><?php echo $_REQUEST['sgst']; ?></td>
</tr>
<tr>
<td  align="left">Bank Name </td><td><?php echo $_REQUEST['bankname']; ?></td>
<td width="25%" align="left">IGST @18%  </td><td align="right"><?php echo $_REQUEST['igst']; ?></td>
</tr>

<tr>
<td align="left">Bank Branch </td><td><?php echo $_REQUEST['bankbranch']; ?></td>
<td width="25%" align="right">Round OFF Amount</td><td align="right"><strong><?php echo $_REQUEST['totalamount1']; ?></strong></td>
</tr>

</table>
</td>
</tr>
<tr>
<td>
<table align="left" width="100%">
<tr>
<td><strong>Rs In Words:- </strong><?php echo $_REQUEST['rswords']; ?></td></tr>
<tr>
<td><strong>Remarks:</strong> <?php echo $_REQUEST['remarks']; ?></td>
</tr>
</table>
</td>
</tr>
</table>
<p align="left"><strong>User: <?php echo $username; ?><?php $time_now=mktime(date('h')+5,date('i')+30,date('s'));
echo "<br>".date('h:i:s A',$time_now);?></strong></p>
<table align="center"><tr align="center"><td><input type="button" name="print" value="Print" onclick="window.print()" /></td><td><a href="purchase.php">Back</a></td></tr></table>