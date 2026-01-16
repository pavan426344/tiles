<?php
include("config.php");
include("../controller/sales_controller.php");

class sales_model
{
	function Insert(sales_controller $UpdateCon)
	{
		$user=$UpdateCon->getUserId();
		$dealer=$UpdateCon->getDealerId();
		$design=$UpdateCon->getDesignId();
		$quantity=$UpdateCon->getQuantity();
		$amount=$UpdateCon->getAmount();
		$date=$UpdateCon->getDate();
		$discount=$UpdateCon->getDiscount();
		$vat=$UpdateCon->getVat();
		$cst=$UpdateCon->getCst();
		$excise=$UpdateCon->getExcise();
		$total=$UpdateCon->getTotal();
		$insurance=$UpdateCon->getInsurance();
		$confirm=$UpdateCon->getConfirm();
		
		
		$InsertMod=mysql_query("insert into finalsales(User_id,Dealer_id,Design_id,Quantity,Amount,Date,Discount,Vat,Cst,Excise,Total,Insurance,NextConfirm) values('$user','$dealer','$design','$quantity','$amount','$date','$discount','$vat','$cst','$excise','$total','$insurance','$confirm')");
		
		$i=0;
		if($InsertMod==1)
		{
			return $i=1;	
		}
		else
		{
			return $i;	
		}
	}
	
	function Update(sales_controller $UpdateCon)
	{
		$id=$UpdateCon->getSales_Id();
		$user=$UpdateCon->getUserId();
		$dealer=$UpdateCon->getDealerId();
		$design=$UpdateCon->getDesignId();
		$quantity=$UpdateCon->getQuantity();
		$amount=$UpdateCon->getAmount();
		$date=$UpdateCon->getDate();
		$discount=$UpdateCon->getDiscount();
		$vat=$UpdateCon->getVat();
		$cst=$UpdateCon->getCst();
		$excise=$UpdateCon->getExcise();
		$total=$UpdateCon->getTotal();
		$insurance=$UpdateCon->getInsurance();
		$dispetch=$UpdateCon->getDispetch();
		$deliverydate=$UpdateCon->getDeliveryDate();
		$status=$UpdateCon->getStatus();
		$confirm=$UpdateCon->getConfirm();
		
		$UpdateMod=mysql_query("update finalsales set Design_id='$design',Quantity='$quantity',Amount='$amount',Date='$date',Discount='$discount',Vat='$vat',Cst='$cst',Excise='$excise',Total='$total',Insurance='$insurance',Dispetch='$dispetch',Delivery_Date='$deliverydate' where Finalsales_Id='$id'");
		
		$i=0;
		if($UpdateMod==1)
		{
			return $i=1;	
		}
		else
		{
			return $i;	
		}
	}
	function UpdateStatus(sales_controller $UpdateCon)
	{
		$id=$UpdateCon->getSales_Id();
		$status=$UpdateCon->getStatus();
		
		$UpdateMod=mysql_query("update finalsales set OrderStatus='$status' where Finalsales_Id='$id'");
		
		$i=0;
		if($UpdateMod==1)
		{
			return $i=1;	
		}
		else
		{
			return $i;	
		}
	}
	
	function UpdateConfirm(sales_controller $UpdateCon)
	{
		$id=$UpdateCon->getSales_Id();
		$confirm=$UpdateCon->getConfirm();
		
		$UpdateMod=mysql_query("update finalsales set NextConfirm='$confirm' where Finalsales_Id='$id'");
		$i=0;
		if($UpdateMod==1)
		{
			return $i=1;	
		}
		else
		{
			return $i;	
		}
	}
	function Delete(sales_controller $DeleteCon)
	{
		$id=$DeleteCon->getSales_Id();
		$DeleteMod=mysql_query("delete from finalsales where Finalsales_Id='$id'");	
		$i=0;
		if($DeleteMod==1)
		{
			return $i=1;	
		}
		else
		{
			return $i;	
		}
	}
	
	function SelectAll()
	{
		$Select=mysql_query("select * from finalsales");	
		return $Select;
	}
	
	function Select(sales_controller $SelectCon)
	{
		$id=$SelectCon->getSales_Id();
		$SelectMod=mysql_query("select * from finalsales where Finalsales_Id='$id'");
		return $SelectMod;
	}
}
?>