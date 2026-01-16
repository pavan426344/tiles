<?php
include("../model/design_model.php");

class design_controller
{
	function getDesignId()
	{
		return $this->_DesignId;	
	}
	function setDesignId($_DesignId)
	{
		$this->_DesignId=$_DesignId;	
	}
	function getDesignName()
	{
		return $this->_DesignName;	
	}
	function setDesignName($_DesignName)
	{
		$this->_DesignName=$_DesignName;
	}
	function getSeries()
	{
		return $this->_Series;
	}
	function setSeries($_Series)
	{
		$this->_Series=$_Series;	
	}
	
	function getCode()
	{
		return $this->_Code;
	}
	function setCode($_Code)
	{
		$this->_Code=$_Code;	
	}
	
	function getColor()
	{
		return $this->_Color;	
	}
	function setColor($_Color)
	{
		$this->_Color=$_Color;
	}
	
	function getGrade()
	{
		return $this->_Grade;	
	}
	function setGrade($_Grade)
	{
		$this->_Grade=$_Grade;	
	}
	
	function getSize()
	{
		return $this->_Size;	
	}
	function setSize($_Size)
	{
		$this->_Size=$_Size;	
	}
	
	function design_controller()
	{
		
	}
	
	function Insert(design_controller $InsertCon)
	{
		$InsertMod=new design_model();
		return $InsertMod->Insert($InsertCon);
		
	}
	function Update(design_controller $UpdateCon)
	{
		$UpdateMod=new design_model();
		return $UpdateMod->Update($UpdateCon);
	}
	function Delete(design_controller $DeleteCon)
	{
		$DeleteMod=new design_model();
		return $DeleteCon->Delete($DeleteMod);
	}
	function Select(design_controller $SelectCon)
	{
		$SelectMod=new design_model();
		return $SelectMod->Select($SelectCon);
	}
	function SelectAll()
	{
		$Select=new design_model();
		return $Select->SelectAll()
	}
}
?>