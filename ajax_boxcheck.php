<?php
include('config.php');
if($_POST['series'])
{
$id=$_POST['series'];
$grade=$_POST['grade'];
$box=$_POST['box'];
 $qunty=0; $quantity=0;
				$check=mysqli_query($con,"select * from production where Design_id='$id' and Grade='$grade'"); 
				$sell=mysqli_query($con,"select * from finalsales_product where DesignName='$id' and Grade='$grade'");
				while($sellrow=mysqli_fetch_array($sell))
				{
					$qunty=$qunty+$sellrow['Quantity'];	
				}
				while($checkrow=mysqli_fetch_array($check))
				{
					$quantity=$quantity+$checkrow['TotalBox'];
				}
					$remain=$quantity-$qunty;
					if($remain > $box || $remain == $box)
					{
						echo "<font color='#0000FF'>Available</font>";	
					}
					else
					{
						echo "<font color='#FF0000'>Not Available</font>";
					}
}
?>