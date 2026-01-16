<?php
include("config.php");
session_start();
$cm=$_SESSION['company'];
$sql='';
$q = strtolower($_GET["q"]);
if (!$q) return;
if(!$cm)
{
    $sql = "select * from t_item where T_Item_Stk_Name LIKE '%$q%'";  
}
 else {
  $sql = "select * from t_item where T_Company_Name='$cm' and T_Item_Stk_Name LIKE '%$q%'";  
}

$rsd = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($rsd)) {
	$subCategoryName = $rs['T_Item_Stk_Name'];
	echo "$subCategoryName\n";
}
?>