<?php
include 'config.php';
	//$data = array();
        $select_dealer_value=mysqli_query($con,"select * from dealer");
        while($select_dealer_value_row=mysqli_fetch_array($select_dealer_value))
        {
            $data[]=array("Company Name" => "$select_dealer_value_row[CompanyName]","Center" => "$select_dealer_value_row[centre]","Contact Person" => "$select_dealer_value_row[Name]","Address" => "$select_dealer_value_row[Address]","City" => "$select_dealer_value_row[City]","State" => "$select_dealer_value_row[State]","Country" => "$select_dealer_value_row[Country]","Pincode" => "$select_dealer_value_row[Pincode]","Phone No." => "$select_dealer_value_row[Phone]","Mobile No." => "$select_dealer_value_row[Mobile]","Email" => "$select_dealer_value_row[Email]","TIN No." => "$select_dealer_value_row[TIN]","CST No." => "$select_dealer_value_row[CST]","PAN No." => "$select_dealer_value_row[PAN]","Annual Turnover" => "$select_dealer_value_row[AnnualTurnover]","Having Dealership" => "$select_dealer_value_row[Dealership]","Executive Name" => "$select_dealer_value_row[executive]","Executive Contact No." => "$select_dealer_value_row[executivecontact]","Executive User Name" => "$select_dealer_value_row[executiveusername]",);
        }
                
	
        
	function filterData(&$str)
	{
		$str = preg_replace("/\t/", "\\t", $str);
		$str = preg_replace("/\r?\n/", "\\n", $str);
		if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
	}
	
	// file name for download
	$fileName = "dealer_data_" . date('Ymd') . ".xls";
	
	// headers for download
	header("Content-Disposition: attachment; filename=\"$fileName\"");
	header("Content-Type: application/vnd.ms-excel");
	
	$flag = false;
	foreach($data as $row) {
		if(!$flag) {
			// display column names as first row
			echo implode("\t", array_keys($row)) . "\n";
			$flag = true;
		}
		// filter data
		array_walk($row, 'filterData');
		echo implode("\t", array_values($row)) . "\n";
	}
	
	exit;
?>