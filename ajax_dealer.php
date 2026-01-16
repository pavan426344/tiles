<?php
include('config.php');

$q = strtolower($_GET['q']);
if (!$q) return;

$sql = "select * from dealer where CompanyName LIKE '%$q%'";
$rsd = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($rsd)) {
	$subCategoryName = $rs['CompanyName'];
	echo "$subCategoryName-$rs[centre]\n";
}
?>