<?php
include('config.php');
include_once('controller/register_controller.php');
class register_model
{
	function InsertRegister(register_controller $UpdateCon)
	{
		$name=$UpdateCon->getName();
		$address=$UpdateCon->getAddress();
		$city=$UpdateCon->getCity();
		$state=$UpdateCon->getState();
		$country=$UpdateCon->getCountry();
		$pincode=$UpdateCon->getPincode();
		$email=$UpdateCon->getEmail();
		$phone=$UpdateCon->getPhone();
		$phone1=$UpdateCon->getPhone1();
		$designtation=$UpdateCon->getDesigntation();
		$previouscompany=$UpdateCon->getPreviousCompany();
		$idproof=$UpdateCon->getIdProof();
		$salary=$UpdateCon->getSalary();
		$tada=$UpdateCon->getTADA();
		$workaddress=$UpdateCon->getWorkAddress();
		$workbranch=$UpdateCon->getWorkBranch();
		$workcity=$UpdateCon->getWorkCity();
		$workstate=$UpdateCon->getWorkState();
		$workcountry=$UpdateCon->getWorkCountry();
		$workpincode=$UpdateCon->getWorkPincode();
		$workemail=$UpdateCon->getWorkEmail();
		$workphone=$UpdateCon->getWorkPhone();
		//$linkuser=$UpdateCon->getLinkUser();
		$empcode=$UpdateCon->getEmpCode();
		$refempcode=$UpdateCon->getRefEmpCode();
		$bankname=$UpdateCon->getBankName();
		$bankbranch=$UpdateCon->getBankBranch();
		$accno=$UpdateCon->getAccNo();
		$ifci=$UpdateCon->getIFCI();
		$date=$UpdateCon->getRegistrationDate();
		$usertype=$UpdateCon->getUserType();
		
		$username=$UpdateCon->getUsername();
		$insertmod=mysql_query("insert into userregistration(Name,Address,City,State,Country,Pincode,Email,Phone,Phone1,Designation,PreviousCompany,IdProof,Salary,TADA,WorkAddress,WorkBranch,WorkCity,WorkState,WorkCountry,WorkPincode,WorkPhone,WorkEmail,EmpCode,RefEmpUsername,BankName,AccNo,Branch,IFCI,RegistrationDate,UserType,username) values('$name','$address','$city','$state','$country',$pincode,'$email','$phone','$phone1','$designtation','$previouscompany','$idproof',$salary,'$tada','$workaddress','$workbranch','$workcity','$workstate','$workcountry',$workpincode,'$workphone','$workemail','$empcode','$refempcode','$bankname','$accno','$bankbranch','$ifci','$date',$usertype,'$username')");
		
		return $insertmod;
	}
	
	function UpdateStatus(register_controller $statuscon)
	{
			$status=$statuscon->getStatus();
			$empcode=$statuscon->getUsername();
			$statusmod=mysql_query("update userregistration set Status='$status' where username='$empcode'");
			return $statusmod;
	}
	
	function UpdateDetail(register_controller $UpdateCon)
	{
			$name=$UpdateCon->getName();
		$address=$UpdateCon->getAddress();
		$city=$UpdateCon->getCity();
		$state=$UpdateCon->getState();
		$country=$UpdateCon->getCountry();
		$pincode=$UpdateCon->getPincode();
		$email=$UpdateCon->getEmail();
		$phone=$UpdateCon->getPhone();
		$phone1=$UpdateCon->getPhone1();
		$designtation=$UpdateCon->getDesigntation();
		$previouscompany=$UpdateCon->getPreviousCompany();
		$idproof=$UpdateCon->getIdProof();
		$salary=$UpdateCon->getSalary();
		$tada=$UpdateCon->getTADA();
		$workaddress=$UpdateCon->getWorkAddress();
		$workbranch=$UpdateCon->getWorkBranch();
		$workcity=$UpdateCon->getWorkCity();
		$workstate=$UpdateCon->getWorkState();
		$workcountry=$UpdateCon->getWorkCountry();
		$workpincode=$UpdateCon->getWorkPincode();
		$workemail=$UpdateCon->getWorkEmail();
		$workphone=$UpdateCon->getWorkPhone();
		$linkuser=$UpdateCon->getLinkUser();
		$empcode=$UpdateCon->getEmpCode();
		$refempcode=$UpdateCon->getRefEmpCode();
		$bankname=$UpdateCon->getBankName();
		$bankbranch=$UpdateCon->getBankBranch();
		$accno=$UpdateCon->getAccNo();
		$ifci=$UpdateCon->getIFCI();
		$date=$UpdateCon->getRegistrationDate();
		$usertype=$UpdateCon->getUserType();
		$username=$UpdateCon->getUsername();
		
		$UpdateMod=mysql_query("update userregistration set Name='$name',Address='$address',City='$city',State='$state',Country='$country',Pincode='$pincode',Email='$email',Phone='$phone',Phone1='$phone1',Designation='$designtation',PreviousCompany='$previouscompany',$IdProof='$idproof',Salary='$salary',TADA='$tada',WorkAddress='$workaddress',WorkBranch='$workbranch',WorkCity='$workcity',WorkState='$workstate',WorkCountry='$workcountry',WorkPincode='$workpincode',WorkPhone='$workphone',WorkEmail='$workemail',BankName='$bankname',AccNo='$accno',Branch='$bankbranch',IFCI='$ifci' where username='$username'");
		
		return $UpdateMod;
	}
		function DeleteUser(register_controller $DeleteCon)
		{
			$empcode=$DeleteCon->getUsername();
			$DeleteMod=mysql_query("delete from userregistration where username='$empcode'");		
		}
		
		function SelectAll()
		{
			$Select=mysql_query("select * from userregistration");	
			return $Select;
		}
		
		function Select(register_controller $SelectCon)
		{
			$username=$SelectCon->getUsername();
			$SelectMod=mysql_query("select * from userregistration where username='$username'");	
			return $SelectMod;
		}
	
}
?>