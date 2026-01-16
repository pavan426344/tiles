<?php
include('config.php');
if($_POST['design'])

{

$id=$_POST['design'];

$sql=mysqli_query($con,"select * from design where DesignName='$id'");
while($row=mysqli_fetch_array($sql))
{
echo " <input type='text' name='boxtiles' id='boxtiles' readonly='readonly' value='$row[Tiles]'/>";
}

}



?>