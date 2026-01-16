<?php
include('config.php');
include('controller/login_controller.php');
class login_model
{	
	function checkLogin(login_controller $check)
	{
		$_Username=$check->getUsername();
		$_Password=$check->getPassword();
		$_Usertype=$check->getUsertype();
		$checkresult=mysql_query("select * from userlogin where User_Name='$_Username' and Pass_Word='$_Password' and UserType=$_Usertype");
		return $checkresult;
	}
	
	function checkUsername(login_controller $check)
	{
		$username=$check->getUsername();
		$checkusername=mysql_query("select * from userlogin where User_Name='$username'");
		return $checkusername;
	}
	function Insert(login_controller $InsertCon)
	{
		$username=$InsertCon->getUsername();
		$password=$InsertCon->getPassword();
		$usertype=$InsertCon->getUsertype();
		$InsertMod=mysql_query("insert into userlogin values('$username','$password',$usertype)");
		return $InsertMod;
	}
}
?>