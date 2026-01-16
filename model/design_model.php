<?php
include("config.php");
include("../controller/design_controller.php");

class design_model
{
	function Insert(design_controller $InsertCon)
	{
		$designname=$InsertCon->getDesignName();
		$series=$InsertCon->getSeries();
		$code=$InsertCon->getCode();
		$color=$InsertCon->getColor();
		$grade=$InsertCon->getGrade();
		$size=$InsertCon->getSize();
		
		$InsertMod=mysql_query("insert into design values('$designname','$series','$code','$color','$grade','$size')");
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
	
	function Update(design_controller $UpdateCon)
	{
		$id=$UpdateCon->getDesignId();
		$designname=$UpdateCon->getDesignName();
		$series=$UpdateCon->getSeries();
		$code=$UpdateCon->getCode();
		$color=$UpdateCon->getColor();
		$grade=$UpdateCon->getGrade();
		$size=$UpdateCon->getSize();
		
		$UpdateMod=mysql_query("update design set DesignName='$designname',Series='$series',Code='$code',Color='$color',Grade='$grade',Size='$size' where Design_Id='$id'");	
		
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
	
	function Delete(design_controller $DeleteCon)
	{
		$id=$DeleteCon->getDesignId();
		$DeleteMod=mysql_query("delete from design where Design_Id='$id'");	
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
	
	function Select(design_controller $SelectCon)
	{
		$id=$SelectCon->getDesignId();
		$SelectMod=mysql_query("select * from design where Design_Id='$id'");	
		return $SelectMod;
	}
	
	function SelectAll()
	{
		$Select=mysql_query("select * from design");	
	}
}
?>