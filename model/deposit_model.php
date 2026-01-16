<?php
include("config.php");
include("../controller/deposit_controller.php");

class deposit_model
{
	function Insert(deposit_controller $InsertCon)
	{
		$dealerid=$InsertCon->getDealerId();
		$referuser=$InsertCon->getReferUser();
		$bank=$InsertCon->getBank();
		$chequeno=$InsertCon->getChequeNo();
		$chequeamount=$InsertCon->getChequeAmount();
		$cash=$InsertCon->getCash();
		$date=$InsertCon->getDate();
		$status=$InsertCon->getStatus();
		$nextconfirm=$InsertCon->getNextConfirm();
		$InsertMod=mysql_query("insert into deposit(Dealer_id,ReferUser,ChequeBank,ChequeNo,ChequeAmount,Cash,Date,Status,NextConfirm) values('$dealerid','$referuser','$bank','$chequeno','$chequeamount','$cash','$date','$status','$nextconfirm')");
		
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
	
	function Update(deposit_controller $UpdateCon)
	{
		$bank=$UpdateCon->getBank();
		$chequeno=$UpdateCon->getChequeNo();
		$chequeamount=$UpdateCon->getChequeAmount();
		$cash=$UpdateCon->getCash();
		$status=$UpdateCon->getStatus();
		$condate=$UpdateCon->getConfirmDate();
		$id=$UpdateCon->getId();
		
		$UpdateMod=mysql_query("update deposit set ChequeBank='$bank',ChequeNo='$chequeno',ChequeAmount='$chequeamount',Cash='$cash',ConfirmDate='$condate' where Deposit_Id='$id'");
		
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
	
	function UpdateStatus(deposit_controller $UpdateCon)
	{
		$id=$UpdateCon->getId();
		$status=$UpdateCon->getStatus();
		
		$UpdateMod=mysql_query("update deposite set Status='$status' where Deposit_Id='$id'");
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
	
	function UpdateConfirm(deposit_controller $UpdateCon)
	{
		$confirm=$UpdateCon->getNextConfirm();
		$id=$UpdateCon->getId();
		
		$UpdateMod=mysql_query("update deposit set NextConfirm='$confirm' where Deposit_Id='$id'");
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
	
	function Delete(deposit_controller $DeleteCon)
	{
		$id=$DeleteCon->getId();
		$DeleteMod=mysql_query("delete from deposit where Deposit_Id='$id'");
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
		$Select=mysql_query("select * from deposit");
		return $Select;
	}
	
	function Select(deposit_controller $SelectCon)
	{
		$dealerid=$SelectCon->getDealerId();
		$SelectMod=mysql_query("select * from deposit where Dealer_Id='$dealerid'");
		return $SelectMod;
	}
}
?>