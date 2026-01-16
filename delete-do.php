<?php
	if(isset($_REQUEST['ddoid']))
	{
		include("config.php");
		$checkdo=mysqli_query($con,"select * from finalsales where doid='$_REQUEST[ddoid]' and Confirm=0");	
		if(mysqli_fetch_row($checkdo)>0)
		{
                        $reject_po=0; 
			$deletedo=mysqli_query($con,"delete from finalsales where txn_id='$_REQUEST[txn_id]' and doid='$_REQUEST[ddoid]'");
			if($deletedo==1)
			{
                           $select_product_sale=mysqli_query($con,"select * from finalsales_product where txn_id='$_REQUEST[txn_id]' and doid='$_REQUEST[ddoid]'");
                           while($select_product_sale_row=mysqli_fetch_array($select_product_sale))
                           {
                                $d_reject=$select_product_sale_row['DesignName'];
                                $b_reject=$select_product_sale_row['batch_no'];
                                $q_reject=$select_product_sale_row['Quantity'];
                                $remain_qty=0;
                                $bk_qty=0;
                                $select_production=mysqli_query($con,"select * from t_production where T_Item_Stk_Name='$d_reject' and T_Batch_No='$b_reject'");
                                while($select_production_row=mysqli_fetch_array($select_production))
                                {
                                    $bk_qty=$select_production_row['T_Book_Qty']; 
                                    $remain_qty=$select_production_row['T_Remain_Qty'];
                                }
                                $r_q=$remain_qty+$q_reject;
                                $b_q=$bk_qty-$q_reject;
                                $update_production=mysqli_query($con,"update t_production set T_Book_Qty='$b_q',T_Remain_Qty='$r_q' where T_Item_Stk_Name='$d_reject' and T_Batch_No='$b_reject'");
                                if($update_production==1)
                                {
                                $reject_po=1;   
                                }    
                                else 
                                {
                                $reject_po=0; 
                                }
                   
                            }
				$deletepro=mysqli_query($con,"delete from finalsales_product where txn_id='$_REQUEST[txn_id]' and doid='$_REQUEST[ddoid]'");		
				if($deletepro==1)
				{
					$deleteremarks=mysqli_query($con,"delete from remarks_do where doid='$_REQUEST[ddoid]'");	
					if($deleteremarks==1)
					{
						$deletepdc=mysqli_query($con,"delete from pdccheck where Doid='$_REQUEST[ddoid]'");
						echo "<script>alert('Successfully Delete PO');document.location='home.php';</script>";
					}
					else
					{
						echo "<script>alert('Error In Delete PO');document.location='home.php';</script>";
					}
				}
				else
				{
					echo "<script>alert('Error In Delete PO');document.location='home.php';</script>";
				}
			}
			else
			{
				echo "<script>alert('Error In Delete PO');document.location='home.php';</script>";
			}
		}
	}
?>