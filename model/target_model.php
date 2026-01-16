<?php
include("config.php");
include("../controller/target_controller.php");

class target_model
{
	function InsertTarget(target_controller $InsertCon)
	{
		$user=$InsertCon->getUserId();
		$targetsales=$InsertCon->getTargetSales();
		$targetamount=$InsertCon->getTargetAmount();
		$targetdate=$InsertCon->getTargetDate();
		
		$InsertMod=mysql_query("insert into target values('$user','$targetsales','$targetamount','$targetdate')");
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
	
	function UpdateTarget(target_controller $UpdateCon)
	{
		$id=$UpdateCon->getId();
		$user=$UpdateCon->getUserId();
		$targetsales=$UpdateCon->getTargetSales();
		$targetamount=$UpdateCon->getTargetAmount();
		$targetdate=$UpdateCon->getTargetDate();
		
		$UpdateMod=mysql_query("update target set User_id='$user',Target_Sales='$targetsales',Target_Amount='$targetamount',Target_Date='$targetdate' where Target_id='$id'");
		
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
	
	function DeleteTarget(target_controller $DeleteCon)
	{
		$id=$DeleteCon->getId();
		$DeleteMod=mysql_query("delete from target where Target_Id='$id'");
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
	
	function SelectTarget(target_controller $SelectCon)
	{
		$id=$SelectCon->getId();
		$SelectMod=mysql_query("select * from target where Target_Id='$id'");
		return $SelectMod;
	}
	
	function SelectOne()
	{
		$SelectMod=mysql_query("select * from target");
		return $SelectMod;
	}
	
}
?>