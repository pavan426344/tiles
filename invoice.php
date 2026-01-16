          <?php		  
		  include("config.php");
		  @session_start();
                  $txnid=session_id()."". rand(1111,9999);
$username='';
$usertype='';
$i="";
$date="";
$cm="";
$dealer_do_id=0;
$total_box_weight=0;
if(isset($_SESSION['username']))
{
	include("config.php");
	$usertype=$_SESSION['usertype'];
	$username=$_SESSION['username'];
        $cm=$_SESSION['company'];
	
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
                                if(empty($_REQUEST['city']))
                                {
                                  echo "<script>alert('Please Enter Dealer Information Properly');document.location='purchase.php';</script>";
                                }
                                $name=$_REQUEST['city'];
                                //$name1="ORDER";
				
				$checkd=mysqli_query($con,"select * from finalsales order by finalSales_id DESC limit 0,1");
                               // $val1=array($i=>0);
                                if(mysqli_num_rows($checkd)>0)
                                {    
				while($rowdo=mysqli_fetch_array($checkd))
				{	
                                        $today_d_m=date('d-m');
                                        $do_d_m=explode("-",$rowdo['dodate']);
                                        $dodm=$do_d_m[0]."-".$do_d_m[1];
                                        if((strcmp($today_d_m,"01-04")==0)&&(strcmp($dodm,"01-04")!=0))
                                        {        
					
                                         //$do=$name1."-".date('y')."-1";
                                         $do=sprintf("%05d",1);
                                        }
                                        else
                                        {
                                        $valint=$rowdo['doid']+1;
					//$do=$name1."-".$do_d_m[2]."-".($valint+1); 
                                        $do=sprintf("%05d",$valint);
                                        } 
				}
                                }
                                else
                                {
                                  //$do=$name1."-".date('y')."-1"; 
                                  $do=sprintf("%05d",1);
                                }
				$nextuser='';
				$findu=mysqli_query($con,"select * from userregistration where username='$username'");					
				while($rowfind=mysqli_fetch_array($findu))
				{
					$nextuser=$rowfind['uexecutive'];	
				}
				
				//$do="DO-".rand(00001,99999)."-13-14";
				$dealern=explode("-",$_REQUEST['dealer']);
				$date=date('d-m-y');
                                
                                $select_dealer_id=mysqli_query($con,"select * from dealer where CompanyName='$dealern[0]' and centre='$dealern[1]'");
                                while($select_dealer_id_row=mysqli_fetch_array($select_dealer_id))
                                {
                                    $dealer_do_id=$select_dealer_id_row['Dealer_id'];
                                }
				$insertdo=mysqli_query($con,"insert into finalsales(User_id,txn_id,doid,dealer_id,Dealer_Name,Dealer_Address,Delivery_Address,State,Dealer_Tin,Dealer_Cst,gstin_uin,Date,dodate,Discount,cgst,sgst,igst,Total,Totalbox,roundoff,discountp,rsamount,executive,executivecontact,CompanyName,outstanding,OrderStatus,NextConfirm) values('$username','$txnid','$do','$dealer_do_id','$dealern[0]','$_REQUEST[deladdress]','$_REQUEST[deladd]','$_REQUEST[city]','','','$_REQUEST[delgst]','$_REQUEST[date]','$date','$_REQUEST[discountam]','$_REQUEST[cgst]','$_REQUEST[sgst]','$_REQUEST[igst]','$_REQUEST[totalam]','$_REQUEST[box]','$_REQUEST[totalamount1]','$_REQUEST[discount]','$_REQUEST[rswords]','$_REQUEST[delexe]','$_REQUEST[delexecontact]','$cm','$_REQUEST[outstanding]','0','$nextuser')");				
				
				
				if($insertdo==1)
				{
                                       
					for($i=1;$i<21;$i++)
					{
						$mrp="mrp".$i;
						if(isset($_REQUEST[$mrp]))	
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
							$insertproduct=mysqli_query($con,"insert into finalsales_product(txn_id,doid,DesignName,batch_no,Quantity,weight,Rate,MRP,Amount) values('$txnid','$do','$design','$batch','$box','$box_wight','$rate','$mrp','$amount')");
                                                        $select_p=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$design' and T_Batch_No='$batch'");
                                                        while($select_p_row=mysqli_fetch_array($select_p))
                                                        {
                                                            $r_qty=$select_p_row['T_Remain_Qty'];
                                                        } 
                                                        $f_r_qty=$r_qty-$box;
                                                        $update_p=mysqli_query($con,"update t_production set T_Book_Qty='$box',T_Remain_Qty='$f_r_qty' where T_Item_Stk_Name='$design' and T_Batch_No='$batch'");
						}
					}
					
						if($insertproduct==1)
						{
							
							$insertremarks=mysqli_query($con,"insert into remarks_do(remarks,username,date,doid,txn_id) values('$_REQUEST[remarks]','$username','$date','$do','$txnid')");
							$insertpdc=mysqli_query($con,"insert into pdccheck(User,Date,Doid,txn_id,Checkno,acc_no,Bankname,BankBranch,Confirm) values('$username','$date','$do','$txnid','$_REQUEST[checkno]','$_REQUEST[checkdate]','$_REQUEST[bankname]','$_REQUEST[bankbranch]',1)");
							if($insertremarks==1)
							{
								echo "<script>alert(Successfully File Dispatch Order);</script>";	
							}
							else
							{
								echo "<script>alert('Error In Purchase Order! Please Submit Again');document.location='purchase.php';</script>";
							}

						}
						else
							{
								echo "<script>alert('Error In Purchase Order! Please Submit Again');document.location='purchase.php';</script>";
							}
				}
			}
		  ?>
          <script language="javascript" type="text/javascript">
    window.history.forward();
	window.history.forward(-1);
</script> 
           
          <style type="text/css">
		  tr,td{border: 1px solid black; border-collapse:collapse;font-size:10px !important;}
		  </style>
         
          <p align="center" style="font-size:18px;"><strong>Swastik Ceramics Limited</strong></p>
          <p align="center" style="font:Verdana, Geneva, sans-serif; font-size:14px;margin-top:-8px;" >B-800,8th Floor,Ganesh Maridian,Opp. Gujarat Highcourt,SG Highway,Ahmedabad<br />GSTIN / UIN No.: 29CMDCE0596R1ZS |  CIN NO.: U26914MH2012LC070519</p>
<table width="100%" cellpadding="0" cellspacing="0" align="center" style="margin-left:-5px; margin-right:60px;font-family:Verdana, Geneva, sans-serif;border: 1px solid black; border-collapse:collapse;">
<tr><td><table width="100%"><tr><td align="left" width="50%"><strong>Order Date: <?php echo $_REQUEST['date']; ?></strong></td><td align="right"> <strong>PO No: <?php echo $do; ?><br /> Date : <?php echo date("d-m-y"); ?> </strong></td></tr></table></td></tr>
<tr><td align="center"><font face="Verdana, Geneva, sans-serif" style="font-size:14px"><strong>PENDING ORDER</strong></font></td></tr>
<tr><td>
<table  align="center" width="100%">
<tr><td style="font-size:12px" width="50%" align="center"><strong>BUYER NAME & ADDRESS :</strong></td><td style="font-size:12px" align="center" width="50%"><strong>CONSIGNEE / DELIVERY ADDRESS :</strong></td></tr>
<?php $dealer=mysqli_query($con,"select * from dealer where Dealer_id='$dealer_do_id'"); 
while($rowd=mysqli_fetch_array($dealer))
{
?>
<tr>
<td style="font-size:10px" align="left" width="50%"><strong><?php echo $dealern[0]; ?></strong><br /><?php echo $_REQUEST['deladdress']; ?><br/><strong>GSTIN / UIN No.: <?php echo $_REQUEST['delgst']; ?></strong><br/><strong>PAN No.: <?php echo $rowd['PAN']; ?></strong><br />Contact Person:<strong><?php echo $rowd['Name']."-".$rowd['Mobile'];?></strong></td>
<td style="font-size:10px" align="left" width="50%" valign="top"><?php echo $_REQUEST['deladd']; ?></td></tr>
<?php
}
?>
</table>
</td></tr>
<tr><td><table width="100%"><tr><td align="right"><strong>Sales Executive: </strong><?php echo $_REQUEST['delexe'];  ?> &nbsp;&nbsp; <?php echo $_REQUEST['delexecontact'];  ?></td></tr></table></td></tr>
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
<td width="25%" align="left">CGST @9% </td><td align="right"> <?php echo number_format($_REQUEST['cgst'],"2"); ?></td>
</tr>
<tr>
<td  align="left">Acc No. </td><td><?php echo $_REQUEST['checkdate']; ?></td>
<td align="left">SGST @9%</td><td align="right"><?php echo number_format($_REQUEST['sgst'],"2"); ?></td>
</tr>
<tr>
<td  align="left">Bank Name </td><td><?php echo $_REQUEST['bankname']; ?></td>
<td width="25%" align="left">IGST @18%  </td><td align="right"><?php echo number_format($_REQUEST['igst'],"2"); ?></td>
</tr>

<tr>
<td align="left">Bank Branch </td><td><?php echo $_REQUEST['bankbranch']; ?></td>
<td width="25%" align="right">Round OFF Amount</td><td align="right"><strong><?php $tv= round($_REQUEST['totalamount1']);echo number_format($tv,"2"); ?></strong></td>
</tr>

</table>
</td>
</tr>
<tr>
<td>
<table align="left" width="100%">
<tr>
<td><strong>Rs In Words:- </strong><?php echo $_REQUEST['rswords']; ?></td><td><strong>Total Weight:- </strong><?php echo $total_box_weight." Kg";?></td></tr>
<tr>
    <td colspan="2"><strong>Remarks:</strong> <?php echo $_REQUEST['remarks']; ?></td>
</tr>
<tr>
    <td colspan="2"><strong>Outstanding:</strong> <?php echo $_REQUEST['outstanding']; ?></td>
</tr>
</table>
</td>
</tr>
</table>
<p align="left"><strong>User: <?php echo $username; ?><?php $time_now=mktime(date('h')+5,date('i')+30,date('s'));
echo "<br>".date('h:i:s A',$time_now);?></strong></p>
<table align="center"><tr align="center"><td><input type="button" name="print" value="Print" onclick="window.print()" /></td><td><a href="purchase.php">Back</a></td></tr></table>