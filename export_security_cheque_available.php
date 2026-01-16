<?php
include 'config.php';
	//$data = array();
        $select_dealer_value1=mysqli_query($con,"select * from dealer_security_cheque where AccNo!='' and cheque_no!=''");
        while($select_dealer_value_row1=mysqli_fetch_array($select_dealer_value1))
        {
            $cheque_s="";
            if($select_dealer_value_row1['status']==1)
            {
                $cheque_s="Unused";
                
            }
           else 
            {
               $cheque_s="Used";
            }
           $add="";
         //  $data=array();
           if($_REQUEST['state']!="" && $_REQUEST['executive']=="")
           {   
            $select_dealer_value=mysqli_query($con,"select *  from dealer where Dealer_id='$select_dealer_value_row1[dealer_id]' and State='$_REQUEST[state]'");
            
            while($select_dealer_value_row=mysqli_fetch_array($select_dealer_value))
            {
            $add=$select_dealer_value_row['Address'].",".$select_dealer_value_row['City'].",".$select_dealer_value_row['State'].",".$select_dealer_value_row['Country'].",Pincode-".$select_dealer_value_row['Pincode'];    
            $data[]=array("Company Name" => "$select_dealer_value_row[CompanyName]","Center" => "$select_dealer_value_row[centre]","Contact Person" => "$select_dealer_value_row[Name]","Address" => "$add","Phone No." => "$select_dealer_value_row[Phone]","Mobile No." => "$select_dealer_value_row[Mobile]","Email" => "$select_dealer_value_row[Email]","TIN No." => "$select_dealer_value_row[TIN]","CST No." => "$select_dealer_value_row[CST]","Account Name" => "$select_dealer_value_row1[NameOfAcc]","Bank Name" => "$select_dealer_value_row1[BankName]","Account No." => "$select_dealer_value_row1[AccNo]","Branch" => "$select_dealer_value_row1[Branch]","Cheque No." => "$select_dealer_value_row1[cheque_no]","Sign Authority" => "$select_dealer_value_row1[SignAuth]","Cheque Status" => "$cheque_s",);
            }
            
           }
            if($_REQUEST['state']!="" && $_REQUEST['executive']!="")
           {   
             $ex= explode('-',$_REQUEST['executive']);    
             $select_dealer_value=mysqli_query($con,"select *  from dealer where Dealer_id='$select_dealer_value_row1[dealer_id]' and State='$_REQUEST[state]' and executiveusername='$ex[0]'");
           
             
            while($select_dealer_value_row=mysqli_fetch_array($select_dealer_value))
            {
            $add=$select_dealer_value_row['Address'].",".$select_dealer_value_row['City'].",".$select_dealer_value_row['State'].",".$select_dealer_value_row['Country'].",Pincode-".$select_dealer_value_row['Pincode'];    
            $data[]=array("Company Name" => "$select_dealer_value_row[CompanyName]","Center" => "$select_dealer_value_row[centre]","Contact Person" => "$select_dealer_value_row[Name]","Address" => "$add","Phone No." => "$select_dealer_value_row[Phone]","Mobile No." => "$select_dealer_value_row[Mobile]","Email" => "$select_dealer_value_row[Email]","TIN No." => "$select_dealer_value_row[TIN]","CST No." => "$select_dealer_value_row[CST]","Account Name" => "$select_dealer_value_row1[NameOfAcc]","Bank Name" => "$select_dealer_value_row1[BankName]","Account No." => "$select_dealer_value_row1[AccNo]","Branch" => "$select_dealer_value_row1[Branch]","Cheque No." => "$select_dealer_value_row1[cheque_no]","Sign Authority" => "$select_dealer_value_row1[SignAuth]","Cheque Status" => "$cheque_s","Executive Name" => "$ex[1]",);
            }
           }
           
           if(isset($_REQUEST['all'])!="")
           {   
             //$ex= explode('-',$_REQUEST['executive']);    
             $select_dealer_value=mysqli_query($con,"select *  from dealer where Dealer_id='$select_dealer_value_row1[dealer_id]'");
           
             
            while($select_dealer_value_row=mysqli_fetch_array($select_dealer_value))
            {
            $add=$select_dealer_value_row['Address'].",".$select_dealer_value_row['City'].",".$select_dealer_value_row['State'].",".$select_dealer_value_row['Country'].",Pincode-".$select_dealer_value_row['Pincode'];    
            $data[]=array("Company Name" => "$select_dealer_value_row[CompanyName]","Center" => "$select_dealer_value_row[centre]","Contact Person" => "$select_dealer_value_row[Name]","Address" => "$add","Phone No." => "$select_dealer_value_row[Phone]","Mobile No." => "$select_dealer_value_row[Mobile]","Email" => "$select_dealer_value_row[Email]","TIN No." => "$select_dealer_value_row[TIN]","CST No." => "$select_dealer_value_row[CST]","Account Name" => "$select_dealer_value_row1[NameOfAcc]","Bank Name" => "$select_dealer_value_row1[BankName]","Account No." => "$select_dealer_value_row1[AccNo]","Branch" => "$select_dealer_value_row1[Branch]","Cheque No." => "$select_dealer_value_row1[cheque_no]","Sign Authority" => "$select_dealer_value_row1[SignAuth]","Cheque Status" => "$cheque_s",);
            }
           }
        }
                
	
        
	function filterData(&$str)
	{
		$str = preg_replace("/\t/", "\\t", $str);
		$str = preg_replace("/\r?\n/", "\\n", $str);
		if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
	}
	
	// file name for download
	$fileName = "dealer_security_cheque_available_data_" . date('Ymd') . ".xls";
	
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