<?php
include("config.php");
$select_do_so=mysqli_query($con,"select * from finalsales");
while($select_do_so_row=mysqli_fetch_array($select_do_so))
{
 $id=$select_do_so_row['FinalSales_id'];
 $dealern=explode("-",$select_do_so_row['sodate']);
 $so_date=$dealern[2]."-".$dealern[1]."-".$dealern[0];
 echo $so_date."<br/>";
 $update_do=mysqli_query($con,"update finalsales set sodate1='$so_date' where FinalSales_id='$id'");    
    
}    
?>