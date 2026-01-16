<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select * from userregistration where Name LIKE '%$q%'";
$rsd = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($rsd)) {
	$subCategoryName = $rs['Name'];
	echo "$subCategoryName\n";
}
?>