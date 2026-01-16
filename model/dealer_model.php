<?php
include('config.php');
include('../controller/dealer_controller.php');

class dealer_model
{
	function InsertDealer(dealer_controller $UpdateCon)
	{
		$companyname=$UpdateCon->getCompanyName();
		$name=$UpdateCon->getName();
		$address=$UpdateCon->getAddress();
		$city=$UpdateCon->getCity();
		$state=$UpdateCon->getState();
		$country=$UpdateCon->getCountry();
		$pincode=$UpdateCon->getPincode();
		$email=$UpdateCon->getEmail();
		$phone=$UpdateCon->getPhone();
		$mobile=$UpdateCon->getMobile();
		$fax=$UpdateCon->getFax();
		$website=$UpdateCon->getWebsite();
		$tan=$UpdateCon->getTan();
		$vat=$UpdateCon->getVat();
		$excise=$UpdateCon->getExcise();
		$commissionrate=$UpdateCon->getCommissionRate();
		$annualturnover=$UpdateCon->getAnnualTurnOver();
		$bankname=$UpdateCon->getBankName();
		$accno=$UpdateCon->getAccNo();
		$branch=$UpdateCon->getBranch();
		$ifci=$UpdateCon->getIFCI();
		$date=$UpdateCon->getDate();
		$referuser=$UpdateCon->getReferUser();
		$status=$UpdateCon->getStatus();
		$InsertMod=mysql_query("insert into dealer(CompanyName,Name,Address,City,State,Country,Pincode,Phone,Mobile,Fax,Email,Website,Tan,Vat,Excise,CommissionRate,AnnualTurnover,BankName,AccNo,Branch,IFCI,DateOfRegistration,ReferUser_id,Status) values('$companyname','$name','$address','$city','$state','$country','$pincode','$phone','$mobile','$fax','$email','$website','$tan','$vat','$excise','$commissionrate','$annualturnover','$bankname','$accno','$branch','$ifci','$date','$referuser','$status')");
	}	
	
	function SetStatus(dealer_controller $StatusCon)
	{
		$id=$StatusCon->getId();
		$status=$StatusCon->getStatus();
		
		$StatusMod=mysql_query("update dealer set Status='$status' where Dealer_Id='$id'");	
	}
	
	function UpdateDealer(dealer_controller $UpdateCon)
	{
		$id=$UpdateCon->getId();
		$companyname=$UpdateCon->getCompanyName();
		$name=$UpdateCon->getName();
		$address=$UpdateCon->getAddress();
		$city=$UpdateCon->getCity();
		$state=$UpdateCon->getState();
		$country=$UpdateCon->getCountry();
		$pincode=$UpdateCon->getPincode();
		$email=$UpdateCon->getEmail();
		$phone=$UpdateCon->getPhone();
		$mobile=$UpdateCon->getMobile();
		$fax=$UpdateCon->getFax();
		$website=$UpdateCon->getWebsite();
		$tan=$UpdateCon->getTan();
		$vat=$UpdateCon->getVat();
		$excise=$UpdateCon->getExcise();
		$commissionrate=$UpdateCon->getCommissionRate();
		$annualturnover=$UpdateCon->getAnnualTurnOver();
		$bankname=$UpdateCon->getBankName();
		$accno=$UpdateCon->getAccNo();
		$branch=$UpdateCon->getBranch();
		$ifci=$UpdateCon->getIFCI();
		$date=$UpdateCon->getDate();
		$referuser=$UpdateCon->getReferUser();
		$status=$UpdateCon->getStatus();
		
		$UpdateMod=mysql_query("update dealer set CompanyName='$companyname',Name='$name',Address='$address',City='$city',State='$state',Country='$country',Pincoe='$pincode',Phone='$phone',Mobile='$mobile',Fax='$fax',Email='$email',Website='$website',Tan='$tan',Vat='$vat',Excise='$excise',CommissionRate='$commissionrate',AnnualTurnover='$annualturnover',BankName='$bankname',AccNo='$accno',Branch='$branch',IFCI='$ifci' where Dealer_Id='$id'");
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
	
	function SelectAll()
	{
		$dealers=mysql_query("select * from dealer");	
		return $dealers;
	}
	
	function SelectOneDealer(dealer_controller $SelectCon)
	{
		$id=$SelectCon->getId();
		$SelectMod=mysql_query("select * from dealer where Dealer_Id='$id'");
		return $SelectMod;
	}
	
	function DeleteDealer(dealer_controller $DeleteCon)
	{
		$id=$DeleteCon->getId();
		$DeleteMod=mysql_query("delete from dealer where Dealer_Id='$id'");
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
	
	function SelectDealerByEmp(dealer_controller $SelectEmpCon)
	{
		$referemp=$SelectEmpCon->getReferUser();
		$SelectEmpMod=mysql_query("select * from dealer where ReferUser='$referemp'");	
		return $SelectEmpMod;
	}
	
	function SelectDealerByCity(dealer_controller $SelectCityCon)
	{
		$city=$SelectCityCon->getCity();
		$SelectCityMod=mysql_query("select * from dealer where City='$city'");	
		return $SelectCityMod;
	}
}
?>