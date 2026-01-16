<?php
include("../model/production_model.php");
	
class production_controller
{
	function getId()
	{
		return $this->_Id;	
	}
	function setId($_Id)
	{
		$this->_Id=$_Id;
	}
	
	function getDesignId()
	{
		return $this->_DesignId;	
	}
	function setDesignId($_DesignId)
	{
		$this->_DesignId=$_DesignId;	
	}
	
	function getTotalTiles()
	{
		return $this->_TotalTiles;	
	}
	function setTotalTiles($_TotalTiles)
	{
		$this->_TotalTiles=$_TotalTiles;	
	}
	
	function getTotalBox()
	{
		return $this->_TotalBox;	
	}
	function setTotalBox($_TotalBox)
	{
		$this->_TotalBox=$_TotalBox;	
	}
	
	function getBoxTiles()
	{
		return $this->_BoxTiles;	
	}
	function setBoxTiles($_BoxTiles)
	{
		$this->_BoxTiles=$_BoxTiles;	
	}
	
	function getGodawn()
	{
		return $this->_Godawn;	
	}
	function setGodawn($_Godawn)
	{
		$this->_Godawn=$_Godawn;	
	}
	
	function Insert(production_controller $InsertCon)
	{
		
	}
	
	function Update(production_controller $UpdateCon)
	{
		
	}
	
	function Delete(production_controller $DeleteCon)
	{
		
	}
	
	function SelectAll()
	{
			
	}
	
	function Select(production_controller $SelectCon)
	{
		
	}
}	
?>