<?php
include_once('model/register_model.php');
class register_controller
{
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
	function getPhone1()
	{
		return $this->_Phone;
	}
	function setPhone1($_Phone1)
	{
		$this->_Phone1=$_Phone1;	
	}
	function getDOB()
	{
		return $this->_DOB;	
	}
	function setDOB($_DOB)
	{
		$this->_DOB=$_DOB;
	}
	function getReligious()
	{
		return $this->_Religious;	
	}
	function setReligious($_Religious)
	{
		$this->_Religious=$_Religious;	
	}
	function getIdproofname1()
	{
		return $this->_Idproofname1;	
	}
	function setIdproofname1($_Idproofname1)
	{
		$this->_Idproofname1=$_Idproofname1;
	}
	function getIdproofpath1()
	{
		return $this->_Idproofpath1;	
	}
	function setIdproofpath1($_Idproofpath1)
	{
		$this->_Idproofpath1=$_Idproofpath1;	
	}
	function getIdproof1()
	{
		return $this->_Idproof1;	
	}
	function setIdproof1($_Idproof1)
	{
		$this->_Idproof1=$_Idproof1;
	}
	function getIdproofname1()
	{
		return $this->_Idproofname1;	
	}
	function setIdproofname2($_Idproofname2)
	{
		$this->_Idproofname2=$_Idproofname22;
	}
	function getIdproofpath2()
	{
		return $this->_Idproofpath2;	
	}
	function setIdproofpath2($_Idproofpath2)
	{
		$this->_Idproofpath2=$_Idproofpath2;	
	}
	function getIdproof2()
	{
		return $this->_Idproof2;	
	}
	function setIdproof2($_Idproof2)
	{
		$this->_Idproof2=$_Idproof2;
	}
	function getDesigntation()
	{
		return $this->_Designtation;	
	}
	function setDesigntation($_Designtation)
	{
		$this->_Designtation=$_Designtation;
	}
	function getPreviousCompany()
	{
		return $this->_PreviousCompany;	
	}
	function setPreviousCompany($_PreviousCompany)
	{
		$this->_PreviousCompany=$_PreviousCompany;	
	}
	function getIdProof()
	{
		return $this->_IdProof;	
	}
	function setIdProof($_IdProof)
	{
		$this->_IdProof=$_IdProof;	
	}
	function getSalary()
	{
		return $this->_Salary;	
	}
	function setSalary($_Salary)
	{
		$this->_Salary=$_Salary;	
	}
	function getTADA()
	{
		return $this->_TADA;	
	}
	function setTADA($_TADA)
	{
		$this->_TADA=$_TADA;
	}
	function getWorkAddress()
	{
		return $this->_WorkAddress;
	}
	function setWorkAddress($_WorkAddress)
	{
		$this->_WorkAddress=$_WorkAddress;	
	}
	function getWorkBranch()
	{
		return $this->_WorkBranch;	
	}
	function setWorkBranch($_WorkBranch)
	{
		$this->_WorkBranch=$_WorkBranch;	
	}
	function getWorkCity()
	{
		return $this->_WorkCity;
	}
	function setWorkCity($_WorkCity)
	{
			$this->_WorkCity=$_WorkCity;
	}
	function getWorkState()
	{
		return $this->_WorkState;	
	}
	function setWorkState($_WorkState)
	{
		$this->_WorkState=$_WorkState;
	}
	function getWorkCountry()
	{
		return $this->_WorkCountry;	
	}
	function setWorkCountry($_WorkCountry)
	{
		$this->_WorkCountry=$_WorkCountry;
	}
	function getWorkPincode()
	{
		return $this->_WorkPincode;	
	}
	function setWorkPincode($_WorkPincode)
	{
		$this->_WorkPincode=$_WorkPincode;	
	}
	function getWorkEmail()
	{
		return $this->_WorkEmail;	
	}
	function setWorkEmail($_WorkEmail)
	{
		$this->_WorkEmail=$_WorkEmail;
	}
	function getWorkPhone()
	{
		return $this->_WorkPhone;
	}
	function setWorkPhone($_WorkPhone)
	{
		$this->_WorkPhone=$_WorkPhone;	
	}
	function getLinkUser()
	{
		return $this->_LinkUser;	
	}
	function setLinkUser($_LinkUser)
	{
		$this->_LinkUser=$_LinkUser;	
	}
	function getEmpCode()
	{
		return $this->_EmpCode;	
	}
	function setEmpCode($_EmpCode)
	{
		$this->_EmpCode=$_EmpCode;	
	}
	function getRefEmpCode()
	{
		return $this->_RefEmpCode;	
	}
	function setRefEmpCode($_RefEmpCode)
	{
		$this->_RefEmpCode=$_RefEmpCode;	
	}
	function getBankName()
	{
		return $this->_BankName;	
	}
	function setBankName($_BankName)
	{
		$this->_BankName=$_BankName;
	}
	function getBankBranch()
	{
		return $this->_BankBranch;	
	}
	function setBankBranch($_BankBranch)
	{
		$this->_BankBranch=$_BankBranch;
	}
	function getAccNo()
	{
		return $this->_AccNo;	
	}
	function setAccNo($_AccNo)
	{
		$this->_AccNo=$_AccNo;
	}
	function getIFCI()
	{
		return $this->_IFCI;	
	}
	function setIFCI($_IFCI)
	{
		$this->_IFCI=$_IFCI;
	}
	function getRegistrationDate()
	{
		return $this->_RegistrationDate;	
	}
	function setRegistrationDate($_RegistrationDate)
	{
		$this->_RegistrationDate=$_RegistrationDate;	
	}
	function getUserType()
	{
		return $this->_UserType;	
	}
	function setUserType($_UserType)
	{
		$this->_UserType=$_UserType;	
	}
	function getStatus()
	{
		return $this->_Status;
	}
	function setStatus($_Status)
	{
		$this->_Status=$_Status;	
	}
	function getLastLogin()
	{
		return $this->_LastLogin;
	}
	function setLastLogin($_LastLogin)
	{
		$this->_LastLogin=$_LastLogin;
	}
	function getLeaveDate()
	{
		return $this->_LeaveDate;	
	}
	function setLeaveDate($_LeaveDate)
	{
		$this->_LeaveDate=$_LeaveDate;
	}
	
	function getUsername()
	{
		return $this->_Username;	
	}
	function setUsername($_Username)
	{
		$this->_Username=$_Username;
	}
	
	function register_controller()
	{
		
	}
	function InsertRegister(register_controller $InsertCon)
	{
		$insertMod=new register_model();
		return $insertMod->InsertRegister($InsertCon);
	}
	function UpdateStatus(register_controller $statusCon)
	{
		$statusMod=new register_model();
		return $statusMod->UpdateStatus($statusCon);
	}
	function UpdateDetail(register_controller $UpdateCon)
	{
		$UpdateMod=new register_model();
		return $UpdateMod->UpdateDetail($UpdateCon);
	}
	function DeleteUser(register_controller $DeleteCon)
	{
		$DeleteMod=new register_model();
		return $DeleteMod->DeleteUser($DeleteCon);
	}
}
?>