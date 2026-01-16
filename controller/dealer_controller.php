<?php
include('../model/dealer_model.php');

class dealer_controller
{
	function getCompanyName()
	{
		return $this->_CompanyName;	
	}
	function setCompanyName($_CompanyName)
	{
		$this->_CompanyName=$_CompanyName;
	}
	function getName()
	{
		return $this->_Name;	
	}
	function setName($_Name)
	{
		$this->_Name=$_Name;
	}
	function getAddress()
	{
		return $this->_Address;	
	}
	function setAddress($_Address)
	{
		$this->_Address=$_Address;
	}
	function getCity()
	{
		return $this->_City;	
	}
	function setCity($_City)
	{
		$this->_City=$_City;	
	}
	function getState()
	{
		return $this->_State;
	}
	function setState($_State)
	{
		$this->_State=$_State;
	}
	function getCountry()
	{
		return $this->_Country;
	}
	function setCountry($_Country)
	{
		$this->_Country=$_Country;	
	}
	function getPincode()
	{
		return $this->_Pincode;	
	}
	function setPincode($_Pincode)
	{
		$this->_Pincode=$_Pincode;
	}
	function getEmail()
	{
		return $this->_Email;	
	}
	function setEmail($_Email)
	{
		$this->_Email=$_Email;
	}
	function getPhone()
	{
		return $this->_Phone;
	}
	function setPhone($_Phone)
	{
		$this->_Phone=$_Phone;
	}
	function getMobile()
	{
		return $this->_Mobile;
	}
	function setMobile($_Mobile)
	{
		$this->_Mobile=$_Mobile;	
	}
	function getFax()
	{
		return $this->_Fax;	
	}
	function setFax($_Fax)
	{
		$this->_Fax=$_Fax;	
	}
	function getWebsite()
	{
		return $this->_Website;	
	}
	function setWebsite($_Website)
	{
		$this->_Website=$_Website;	
	}
	function getTan()
	{
		return $this->_Tan;	
	}
	function setTan($_Tan)
	{
		$this->_Tan=$_Tan;	
	}
	function getVat()
	{
		return $this->_Vat;	
	}
	function setVat($_Vat)
	{
		$this->_Vat=$_Vat;
	}
	function getExcise()
	{
		return $this->_Excise;
	}
	function setExcise($_Excise)
	{
		$this->_Excise=$_Excise;	
	}
	function getCommissionRate()
	{
		return $this->_CommissionRate;	
	}
	function setCommissionRate($_CommissionRate)
	{
		$this->_CommissionRate=$_CommissionRate;	
	}
	function getAnnualTurnOver()
	{
		return $this->_AnnualturnOver;	
	}
	function setAnnualTurnOver($_AnnualturnOver)
	{
		$this->_AnnualturnOver=$_AnnualturnOver;	
	}
	function getBankName()
	{
		return $this->_BankName;	
	}
	function setBankName($_BankName)
	{
		$this->_BankName=$_BankName;	
	}
	function getAccNo()
	{
		return $this->_AccNo;	
	}
	function setAccNo($_AccNo)
	{
		$this->_AccNo=$_AccNo;	
	}
	function getBranch()
	{
		return $this->_Branch;	
	}
	function setBranch($_Branch)
	{
		$this->_Branch=$_Branch;	
	}
	function getIFCI()
	{
		return $this->_IFCI;	
	}
	function setIFCI($_IFCI)
	{
		$this->_IFCI=$_IFCI;	
	}
	function getDate()
	{
	  return $this->_Date;	
	}
	function setDate($_Date)
	{
		$this->_Date=$_Date;	
	}
	function getReferUser()
	{
		return $this->_ReferUser;	
	}
	function setReferUser($_ReferUser)
	{
		$this->_ReferUser=$_ReferUser;
	}
	function getStatus()
	{
		return $this->_Status;	
	}
	function setStatus($_Status)
	{
		$this->_Status=$_Status;	
	}
	function getId()
	{
		return $this->_Id;	
	}
	function setId($_Id)
	{
		$this->_Id=$_Id;	
	}
	
	function __dealer_controller()
	{
		
	}
	function InsertDealer(dealer_controller $InsertCon)
	{
		$InsertMod=new dealer_model();
		return $InsertMod->InsertDealer($InsertCon);
	}
	
	function SetStatus(dealer_controller $StatusCon)
	{
		$StatusMod=new dealer_model();
		return $StatusMod->SetStatus($StatusCon);	
	}
	
	function UpdateDealer(dealer_controller $UpdateCon)
	{
		$UpdateMod=new dealer_model();
		return $UpdateMod->UpdateDealer($UpdateCon);
	}
	
	function SelectAll()
	{
		$dealers=new dealer_model();
		return $dealers->SelectAll();	
	}
	
	function SelectDealer($SelectCon)
	{
		$SelectMod=new dealer_model();
		return $SelectMod->SelectOneDealer($SelectCon);	
	}
	
	function DeleteDealer($DeleteCon)
	{
		$DeleteMod=new dealer_model();
		return $DeleteMod->DeleteDealer($DeleteCon);	
	}
	
	function SelectByEmp($SelectEmpCon)
	{
		$SelectEmpMod=new dealer_model();
		return $SelectEmpMod->SelectDealerByEmp($SelectEmpCon);	
	}
	
	function SelectByCity($SelectCityCon)
	{
		$SelectCityMod=new dealer_model();
		return $SelectCityMod->SelectDealerByCity($SelectCityCon);	
	}
}
?>