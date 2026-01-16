<?php
include("../model/deposit_model.php");

class deposit_controller
{
	function getId()
	{
		return $this->_Id;	
	}
	function setId($_Id)
	{
		$this->_Id=$_Id;
	}
	
	function getDealerId()
	{
		return $this->_DealerId;	
	}
	function setDesignId($_DealerId)
	{
		$this->_DealerId=$_DealerId;	
	}
	
	function getReferUser()
	{
		return $this->_ReferUser;		
	}
	function setReferUser($_ReferUser)
	{
		$this->_ReferUser=$_ReferUser;
	}
	
	function getBank()
	{
		return $this->_Bank;	
	}
	function setBank($_Bank)
	{
		$this->_Bank=$_Bank;
	}
	
	function getChequeNo()
	{
		return $this->_ChequeNo;	
	}
	function setChequeNo($_ChequeNo)
	{
		$this->_ChequeNo=$_ChequeNo;
	}
	
	function getChequeAmount()
	{
		return $this->_ChequeAmoount;	
	}
	function setChequeAmount($_ChequeAmount)
	{
		$this->_ChequeAmount=$_ChequeAmount;	
	}
	
	function getCash()
	{
		return $this->_Cash;	
	}
	function setCash($_Cash)
	{
		$this->_Cash=$_Cash;	
	}
	
	function getDate()
	{
		return $this->_Date;	
	}
	function setDate($_Date)
	{
		$this->_Date=$_Date;	
	}
	
	function getStatus()
	{
		return $this->_Status;	
	}
	function setStatus($_Status)
	{
		$this->_Status=$_Status;	
	}
	
	function getConfirmDate()
	{
		return $this->_ConfirmDate;	
	}
	function setConfirmDate($_ConfirmDate)
	{
		$this->_ConfirmDate=$_ConfirmDate;	
	}
	
	function getNextConfirm()
	{
		return $this->_NextConfirm;	
	}
	function setNextConfirm($_NextConfirm)
	{
		$this->_NextConfirm=$_NextConfirm;	
	}
	
	function Insert(deposit_controller $InsertCon)
	{
		
	}
	function Update(deposit_controller $UpdateCon)
	{
		
	}
	function Delete(deposit_controller $DeleteCon)
	{
		
	}
	function SelectAll()
	{
		
	}
	function Select(deposit_controller $SelectCon)
	{
		
	}
}
?>