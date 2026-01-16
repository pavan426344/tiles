<?php
include('../model/target_model.php');

class target_controller
{
	function getId()
	{
		return $this->_Id;	
	}	
	function setId($_Id)
	{
		$this->_Id=$_Id;
	}
	
	function getUserId()
	{
		return $this->_UserId;	
	}
	function setUserId($_UserId)
	{
		$this->_UserId=$_UserId;
	}
	
	function getTargetSales()
	{
		return $this->_TargetSales;
	}
	function setTargetSales($_TargetSales)
	{
		$this->_TargetSales=$_TargetSales;
	}
	function getTargetAmount()
	{
		return $this->_TargetAmount;	
	}
	function setTargetAmount($_TargetAmount)
	{
		$this->_TargetAmount=$_TargetAmount;
	}
	
	function getTargetDate()
	{
		return $this->_TargetDate;	
	}
	function setTargetDate($_TargetDate)
	{
		$this->_TargetDate=$_TargetDate;	
	}
	
	function getStatus()
	{
		return $this->_Status;
	}
	function setStatus($_Status)
	{
		$this->_Status=$_Status;	
	}
	
	function Insert(target_controller $InsertCon)
	{
		$InsertMod=new target_model();
		return $InsertMod->InsertTarget($InsertCon);	
	}
	
	function Delete(target_controller $DeleteCon)
	{
		$DeleteMod=new target_model();
		return $DeleteMod->DeleteTarget($DeleteCon);
	}
	
	function Update(target_controller $UpdateCon)
	{
		$UpdateMod=new target_model();
		return $UpdateMod->UpdateTarget($UpdateCon);	
	}
	
	function Select(target_controller $SelectCon)
	{
		$SelectMod=new target_model();
		return $SelectMod->SelectTarget($SelectCon);	
	}
	
	function SelectOne()
	{
			$SelectMod=new target_model();
			return $SelectMod->SelectOne();
	}
}
?>