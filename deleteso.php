<?php
	include("config.php");
	
	$checkdo=mysqli_query($con,"select * from finalsales where  Confirm=1");	
		while($rowcheck=mysqli_fetch_array($checkdo))
		{
			$deletedo=mysqli_query($con,"delete from finalsales where doid='$rowcheck[doid]'");
			if($deletedo==1)
			{
				$deletepro=mysqli_query($con,"delete from finalsales_product where doid='$rowcheck[doid]'");		
				if($deletepro==1)
				{
					$deleteremarks=mysqli_query($con,"delete from remarks_do where doid='$rowcheck[doid]'");	
					if($deleteremarks==1)
					{
						$deletepdc=mysqli_query($con,"delete from pdccheck where Doid='$rowcheck[doid]'");
						echo "<script>alert('Successfully Delete DO');document.location='home.php';</script>";
					}
					else
					{
						echo "<script>alert('Error In Delete DO');document.location='home.php';</script>";
					}
				}
				else
				{
					echo "<script>alert('Error In Delete DO');document.location='home.php';</script>";
				}
			}
		}
			?>