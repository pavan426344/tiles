<?php
include("../model/sales_controller.php");

class sales_controller
{
	function getSales_Id()
	{
		return $this->_Sales_Id;
	}
	function setSales_Id($Sales_Id)
	{
		$this->_Sales_Id=$Sales_Id;	
	}
	function getUserId()
	{
		return $this->_UserId;	
	}
	function setUserId($_UserId)
	{
		$this->_UserId=$_UserId;
	}
	
	function getDealerId()
	{
		return $this->_DealerId;	
	}
	function setDealerId($_DealerId)
	{
		$this->_DealerId=$_DealerId;	
	}
	
	function getDesignId()
	{
		return $this->_DesignId;	
	}
	function setDesignId($_DesignId)
	{
		$this->_DesignId=$_DesignId;
	}
	
	function getQuantity()
	{
		return $this->_Quantity;	
	}
	function setQuantity($_Quantity)
	{
		$this->_Quantity=$_Quantity;	
	}
	
	function getAmount()
	{
		return $this->_Amount;	
	}
	function setAmount($_Amount)
	{
		$this->_Amount=$_Amount;	
	}
	
	function getDate()
	{
		return $this->_Date;	
	}
	function setDate($_Date)
	{
		$this->_Date=$_Date;
	}
	
	function getDiscount()
	{
		return $this->_Discount;	
	}
	function setDiscount($_Discount)
	{
		$this->_Discount=$_Discount;
	}
	
	function getVat()
	{
		return $this->_Vat;	
	}
	function setVat($_Vat)
	{
		$this->_Vat=$_Vat;	
	}
	
	function getCst()
	{
		return $this->_Cst;	
	}
	function setCst($_Cst)
	{
		$this->_Cst=$_Cst;	
	}
	
	function getExcise()
	{
		return $this->_Excise;	
	}
	function setExcise($_Excise)
	{
		$this->_Excise=$_Excise;	
	}
	
	function getTotal()
	{
		return $this->_Total;	
	}
	function setTotal($_Total)
	{
		$this->_Total=$_Total;	
	}
	
	function getInsurance()
	{
		return $this->_Insurance;	
	}
	function setInsurance($_Insurance)
	{
		$this->_Insurance=$_Insurance;	
	}
	
	function getDispetch()
	{
		return $this->_Dispetch;	
	}
	function setDispetch($_Dispetch)
	{
		$this->_Dispetch=$_Dispetch;	
	}
	
	function getDeliveryDate()
	{
		return $this->_DeliveryDate;	
	}
	function setDeliveryDate($_DeliveryDate)
	{
		$this->_DeliveryDate=$_DeliveryDate;	
	}
	
	function getStatus()
	{
		return $this->_Status;	
	}
	function setStatus($_Status)
	{
		$this->_Status=$_Status;	
	}
	
	function getConfirm()
	{
		return $this->_Confirm;	
	}
	function setConfirm($_Confirm)
	{
		$this->_Confirm=$_Confirm;
	}
	
	function sales_controller()
	{
			
	}
	function Insert(sales_controller $InsertCon)
	{
		
	}
	function Update(sales_controller $UpdateCon)
	{
		
	}
	function Delete(sales_controller $DeleteCon)
	{
		
	}
	function SelectAll(sales_controller $SelectCon)
	{
		
	}
	function Select(sales_controller $SelectCon)
	{
		
	}
}
?>