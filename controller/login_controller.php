<?php
include('model/login_model.php');
class login_controller
{
	function setUsername($_Username)
	{
		$this->_Username=$_Username;	
	}
	function getUsername()
	{
		return $this->_Username;
	}
	function setPassword($_Password)
	{
		$this->_Password=$_Password;	
	}
	function getPassword()
	{
		return $this->_Password;
	}
	function setUsertype($_Usertype)
	{
		$this->_Usertype=$_Usertype;
	}
	function getUsertype()
	{
		return $this->_Usertype;	
	}
	
	function setStatus($_Status)
	{
		$this->_Status=$_Status;
	}
	
	function getStatus()
	{
		return $this->_Status;	
	}
	
	function login_controller()
	{
		
	}
	function checkLogin(login_controller $check)
	{
		$checkLogin=new login_model();
		return ($checkLogin->checkLogin($check));
	}
	
	function checkUsername(login_controller $check)
	{
		$checkUsername=new login_model();
		return $checkUsername->checkUsername($check);	
	}
	function Insert(login_controller $InsertCon)
	{
		$InsertMod=new login_model();
		return $InsertMod->Insert($InsertCon);
	}
}
?>