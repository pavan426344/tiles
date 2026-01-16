<?php
ob_start();
@session_start();
$username='';
$usertype='';
if(isset($_SESSION['username']))
{
	include("config.php");
	$usertype=$_SESSION['usertype'];
	$username=$_SESSION['username'];
	$CheckStatus=mysqli_query($con,"select * from userlogin where User_Name='$username' and UserType=$usertype");
	if(mysqli_num_rows($CheckStatus)>0)
	{
		while($Checkrow=mysqli_fetch_array($CheckStatus))
		{
			if($Checkrow['Status']==0)	
			{
				echo "alert('Please Contact Admin');<script>document.location='index.php?ses=frr';</script>";			
			}
		}
	}
	else
	{
		echo "alert('Please Contact Admin Your Login Credential Wrong');<script>document.location='index.php?ses=frr';</script>";	
	}
}
else
{
	echo "alert('Please Login');<script>document.location='index.php?ses=frr';</script>";
}
?>
<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ERP | Dashboard</title>
<link href="css/styles.css" rel="stylesheet" type="text/css">

<!--<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />-->
<script type="text/javascript" src="js/vendors/modernizr/modernizr.custom.js"></script>
<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
</head>

<body onload="startTime()">

<!--Smooth Scroll-->
<div class="smooth-overflow"> 
  <!--Navigation-->
  <nav class="main-header clearfix" role="navigation"> <a class="navbar-brand" href="home.php"><span class="text-blue">ERP</span></a> 
    
    <!--Navigation Itself-->
    
    <div class="navbar-content"> 
      
      <!--Sidebar Toggler--> 
      <a href="#" class="btn btn-default left-toggler"><i class="fa fa-bars"></i></a> 
      <!--Right Userbar Toggler--> 
      <a href="#" class="btn btn-user right-toggler pull-right"><i class="entypo-vcard"></i> <span class="logged-as hidden-xs">Logged as</span><span class="logged-as-name hidden-xs"><?php echo $_SESSION['username']; ?></span></a> 
      <!--Fullscreen Trigger-->
      <button type="button" class="btn btn-default hidden-xs pull-right" id="toggle-fullscreen"> <i class=" entypo-popup"></i> </button>
    </div>
  </nav>
  
  <!--/Navigation--> 
  
  <!--MainWrapper-->
  <div class="main-wrap"> 
    
    <!--OffCanvas Menu -->
    <aside class="user-menu"> 
      
      <!-- Tabs -->
      <div class="tabs-offcanvas">
        <ul class="nav nav-tabs nav-justified">
          <li class="active"><a href="#userbar-one" data-toggle="tab">Main</a></li>
        </ul>
        <div class="tab-content"> 
          
          <!--User Primary Panel-->
          <div class="tab-pane active" id="userbar-one">
            <div class="main-info">
              <div class="user-img"><img src="http://placehold.it/150x150" alt="User Picture" /></div>
              <h1><?php echo $_SESSION['username']; ?> <small></small></h1>
            </div>
            <div class="list-group"> <a data-toggle="modal" href="logout.php" class="list-group-item goaway"><i class="fa fa-power-off"></i> Sign Out</a> </div>
          </div>
        </div>
      </div>
      
      <!-- /tabs --> 
      
    </aside>
    <!-- /Offcanvas user menu--> 
    
    <!--Main Menu-->
    <div class="responsive-admin-menu">
      <div class="responsive-menu">ERP
        <div class="menuicon"><i class="fa fa-angle-down"></i></div>
      </div>
      <?php include('side-menu.php');?>
    </div>
    <!--/MainMenu-->
    
    <div class="content-wrapper"> 
      <!--Content Wrapper--><!--Horisontal Dropdown-->
      
      <nav class="cbp-hsmenu-wrapper" id="cbp-hsmenu-wrapper">
        <div class="cbp-hsinner">
          <ul class="cbp-hsmenu">
            <li> <a href="#"></a>
              <ul class="cbp-hssubmenu">
                <li><a href="#">
                  <div class="sparkle-dropdown"><span class="inlinebar">10,8,8,7,8,9,7,8,10,9,7,5</span>
                    <p class="sparkle-name">project income</p>
                    <p class="sparkle-amount">$23989 <i class="fa fa-chevron-circle-up"></i></p>
                  </div>
                  </a></li>
                <li><a href="#">
                  <div class="sparkle-dropdown"><span class="linechart">5,6,7,9,9,5,3,2,9,4,6,7</span>
                    <p class="sparkle-name">site traffic</p>
                    <p class="sparkle-amount">122541 <i class="fa fa-chevron-circle-down"></i></p>
                  </div>
                  </a></li>
                <li><a href="#">
                  <div class="sparkle-dropdown"><span class="simpleline">9,6,7,9,3,5,7,2,1,8,6,7</span>
                    <p class="sparkle-name">Processes</p>
                    <p class="sparkle-amount">890 <i class="fa fa-plus-circle"></i></p>
                  </div>
                  </a></li>
                <li><a href="#">
                  <div class="sparkle-dropdown"><span class="inlinebar">10,8,8,7,8,9,7,8,10,9,7,5</span>
                    <p class="sparkle-name">orders</p>
                    <p class="sparkle-amount">$23989 <i class="fa fa-chevron-circle-up"></i></p>
                  </div>
                  </a></li>
                <li><a href="#">
                  <div class="sparkle-dropdown"><span class="piechart">1,2,3</span>
                    <p class="sparkle-name">active/new</p>
                    <p class="sparkle-amount">500/200 <i class="fa fa-chevron-circle-up"></i></p>
                  </div>
                  </a></li>
                <li><a href="#">
                  <div class="sparkle-dropdown"><span class="stackedbar">3:6,2:8,8:4,5:8,3:6,9:4,8:1,5:7,4:8,9:5,3:5</span>
                    <p class="sparkle-name">fault/success</p>
                    <p class="sparkle-amount">$23989 <i class="fa fa-chevron-circle-up"></i></p>
                  </div>
                  </a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <!--Breadcrumb-->
      <div class="breadcrumb clearfix">
        <ul>
          <li><a href="home.php"><i class="fa fa-home"></i></a></li>
          <li><a href="#">Dashboard</a></li>
          <li class="active">Data</li>
        </ul>
      </div>
      <?php
	  $today_date=date('d-m-Y');
          $today_date1=date('Y-m-d');
	  $y_date=date("d-m-Y", time() - 60 * 60 * 24);
	  $y1_date=date("d-m-Y", time() - 2*60 * 60 * 24);
	  
	  echo "<br/><h2>Order Summary</h2>";
	  echo "<b>Date</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>TotalBox</b><br/>";
	    $select_today_order=mysqli_query($con,"SELECT SUM( Totalbox ) AS box
FROM finalsales
WHERE Date = '$today_date'");
       while($select_today_order_row=mysqli_fetch_array($select_today_order))
	   {   
	       $box=$select_today_order_row['box'];
		   if($box=='')
		   {
			  $box=0; 
		   }
		   echo $today_date."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$box."&nbsp;&nbsp;Boxes<br/>";
		   //echo $select_today_order_row['box'];
	   }
	   $select_today_order=mysqli_query($con,"SELECT SUM( Totalbox ) AS box
FROM finalsales
WHERE Date = '$y_date'");
       while($select_today_order_row=mysqli_fetch_array($select_today_order))
	   {   
	       $box=$select_today_order_row['box'];
		   if($box=='')
		   {
			  $box=0; 
		   }
		   echo $y_date."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$box."&nbsp;&nbsp;Boxes<br/>";
		   //echo $select_today_order_row['box'];
	   }
	   $select_today_order=mysqli_query($con,"SELECT SUM( Totalbox ) AS box
FROM finalsales
WHERE Date = '$y1_date'");
       while($select_today_order_row=mysqli_fetch_array($select_today_order))
	   {   
	       $box=$select_today_order_row['box'];
		   if($box=='')
		   {
			  $box=0; 
		   }
		   echo $y1_date."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$box."&nbsp;&nbsp;Boxes";
		   //echo $select_today_order_row['box'];
	   }
           
                      
                      
	  ?>
      <br/>
      <br/>
      <table border="1" width="45%" cellpadding="10">
          <tr>
              <td>Date : <?php echo $today_date;?></td>
              <td>Time : <span id="txt"></span> </td>
          </tr>
      </table>
      <br/>
      <?php 
//       $today = date('d-m-Y',time()); 
//       $exp = date('d-m-Y',strtotime('14-11-2017')); 
//       $expDate =  date_create($exp);
//       $todayDate = date_create($today);
//       $diff =  date_diff($todayDate, $expDate);
//       if($diff->format("%R%a")>0){
//             echo "active";
//       }else{
//           echo "inactive";
//       }
//       echo "Remaining Days ".$diff->format("%R%a days");
    ?>

      <div class="table-responsive">
      <table border="1"  width="90%" cellpadding="10" >
          
          <tbody >
               <tr align="center">
              <td>
                  <b>A</b>
              </td>
              <td>
                 <b> B</b>
              </td>
              <td>
                  <b>C = (A+B)</b>
              </td>
              <td>
                  <b>D</b>
              </td>
              <td>
                  <b> E = (C-D)</b>
              </td>
              <td><b><?php echo date('F Y');?></b></td>
              </tr>
          <tr align="center">
              <td>Opening Pending Order</td>
              <td><b>Today's Order</b></td>
              <td>Total Pending Order for Dispatch</td>
              <td>Today's Dispatched</td>
              <td><b>Pending for Dispatch</b></td>
              <td><b>Total Dispatch Of Month</b></td>
          </tr>
          <tr align="center">
              <td>
                  
                  <?php
                  $earlier_box=0;
                  $earlier_box_1=0;
                  $earlier_box_total=0;
                  $today_box=0;
                  $total_pending_box=0;
                  $today_dispatched_box=0;
                  $pending_dispatch_box=0;
                  $select_earlier_order1=mysqli_query($con,"SELECT SUM( Totalbox ) AS box
FROM finalsales
WHERE Date !='$today_date' and sodate = '$today_date1'");
                  while($select_earlier_order_row1=mysqli_fetch_array($select_earlier_order1))
                  {
                     $earlier_box_1 =$select_earlier_order_row1['box'];
                     if($earlier_box_1=='')
		   {
			  $earlier_box_1=0; 
		   }
                     //echo $earlier_box." Boxes";
                  }
                  $select_earlier_order=mysqli_query($con,"SELECT SUM( Totalbox ) AS box
FROM finalsales
WHERE Date !='$today_date' and Confirm = '0'");
                  while($select_earlier_order_row=mysqli_fetch_array($select_earlier_order))
                  {
                     $earlier_box =$select_earlier_order_row['box'];
                     if($earlier_box=='')
		   {
			  $earlier_box=0; 
		   }
                     
                  }
                  $earlier_box_total=$earlier_box+$earlier_box_1;
                  echo $earlier_box_total." Boxes";
                  ?>
              </td>
              <td>
                  <?php
                 
                  $select_todays_order=mysqli_query($con,"SELECT SUM( Totalbox ) AS box
FROM finalsales
WHERE Date = '$today_date'
");
                  while($select_todays_order_row=mysqli_fetch_array($select_todays_order))
                  {
                     $today_box= $select_todays_order_row['box'];
                      if($today_box=='')
		   {
			  $today_box=0; 
		   }
                     echo $today_box." Boxes";
                  }
                  ?>
              </td>
              <td>
                 <?php
                 $total_pending_box= $earlier_box_total+$today_box;
                  if($total_pending_box=='')
		   {
			  $total_pending_box=0; 
		   }
                 echo $total_pending_box." Boxes";
                 ?>
              </td>
              <td>
                   <?php
                 $today_amount=0;  
                 $today_dispatch_box_amount=mysqli_query($con,"SELECT SUM( roundoff ) AS amt
FROM finalsales
WHERE sodate = '$today_date1'
AND Confirm = '1'");
                 while($today_dispatch_box_amount_row=mysqli_fetch_array($today_dispatch_box_amount))
                 {
                   $today_amount=$today_dispatch_box_amount_row['amt'];   
                      if($today_amount=='')
		   {
			  $today_amount=0; 
		   }
                 }
                  $select_todaysd_order=mysqli_query($con,"SELECT SUM( Totalbox ) AS box
FROM finalsales
WHERE sodate = '$today_date1'
AND Confirm = '1'");
                  while($select_todaysd_order_row=mysqli_fetch_array($select_todaysd_order))
                  {
                     $today_dispatched_box= $select_todaysd_order_row['box'];
                      if($today_dispatched_box=='')
		   {
			  $today_dispatched_box=0; 
		   }
                     echo $today_dispatched_box." Boxes<br/>";
                     echo "Rs.".round($today_amount).".00";
                  }
                  ?>
              </td>
              <td>
                  <?php
                  $pending_dispatch_box=$total_pending_box-$today_dispatched_box;
                  if($pending_dispatch_box=='')
		   {
			  $pending_dispatch_box=0; 
		   }
                  echo $pending_dispatch_box." Boxes";?>
              </td>
              <td>
                  <?php
                  $total_m_box=0;
                  $so_m="";
                  $select_total_m_order=mysqli_query($con,"SELECT * FROM finalsales WHERE Confirm = '1' and sodate!=''");
                  while($select_total_m_order_row=mysqli_fetch_array($select_total_m_order))
                  {
                     $cmonth=date('Y-m');
                     $omonth= explode("-", $select_total_m_order_row['sodate']);
                     $so_m=$omonth[0]."-".$omonth[1];
                      if(strcmp($cmonth,$so_m)==0)
		   {
			  $total_m_box=$total_m_box+$select_total_m_order_row['Totalbox'];
		   }
                     
                    
                  }
                  echo $total_m_box." Boxes<br/>";
                  ?>
              </td>
          </tr>
          </tbody>
      </table>
      </div>
          <?php
          
        echo "<br/>";
        if($usertype==0)// dispatch dashboard
        {
      ?>
      
        <div class="powerwidget" id="datatable-basic-init" data-widget-editbutton="false">
              <header>
                <h2>HOD Approved<small>Order</small></h2>
              </header>
              <div class="inner-spacer">
                  <div class="table-responsive">
                <table class="table table-striped table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th>DO No.</th>
                      <th>Date</th>
                      <th>Dealer Name</th>
                      <th>Party Center</th>
                      <th>Contact Person</th>
                      <th>Contact No.</th>
                      <th>Total Box</th>
                      <th>Total Amount</th>
                      <th>Executive Name</th>
                      <th>Brand</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
					$getdo_hod=mysqli_query($con,"select * from finalsales where confirm='0' ");
					
					while($getdo_hod_row=mysqli_fetch_array($getdo_hod))
					{
			    		 $do_id=$getdo_hod_row['doid'];
						 $getdo_remark=mysqli_query($con,"select * from remarks_do where doid='$do_id' order by id DESC limit 0,1 "); // get Gm Remarks doid
						 while($getdo_remark_row=mysqli_fetch_array($getdo_remark))
						 {
							$remark_user_name=$getdo_remark_row['username']; 
						    $getdo_user=mysqli_query($con,"select * from userregistration where UserType=1 and username='$remark_user_name'");
                            
	  
		   $total_amount=0;
		   $total_box=0;
		   while($getdo_user_row=mysqli_fetch_array($getdo_user))
			
			{
			?>
                    <tr>
                      <?php 
                         $today1 = date('d-m-Y',time()); 
                         $today = $getdo_hod_row['Date']; 
       $exp = date('d-m-Y',strtotime('15-11-2017')); //query result form database
       $expDate =  date_create($exp);
       $todayDate = date_create($today);
       $diff =  date_diff($todayDate, $expDate);
       if($diff->format("%R%a")>0){
             ?>
                        <td><a href="doview.php?dono=<?php echo $do_id; ?>" target="_blank"><?php echo $do_id; ?></a></td>
                        <?php
       }else{
           ?>
                        <td>
                            
                            <a href="doview-gst.php?dono=<?php echo $do_id; ?>" target="_blank"><?php echo $do_id; ?></a></td>
                        <?php
       }
       //echo "Remaining Days ".$diff->format("%R%a days");
    ?>
                      
                      <td><?php echo $getdo_hod_row['dodate']; ?></td>
                      <td><?php echo $getdo_hod_row['Dealer_Name']; ?></td>
                      <?php $dealer=mysqli_query($con,"select * from dealer where Dealer_id='$getdo_hod_row[dealer_id]'"); 
                                $row_count=mysqli_num_rows($dealer);
                                if($row_count !=0)
								{
								while($rowdealer=mysqli_fetch_array($dealer))

                                {

                            ?>
                      <td><?php echo $rowdealer['centre'];  ?></td>
                      <td><?php echo $rowdealer['Name']; ?></td>
                      <td align="center"><?php echo $rowdealer['Mobile']; break;?></td>
                      <?php }
								}
								else
								{
								 echo "<td></td><td></td><td></td>";	
								}
							
							 ?>
                      <td align="center"><?php echo $getdo_hod_row['Totalbox']; $total_box=$total_box+$getdo_hod_row['Totalbox']; ?></td>
                      <td align="right"><?php echo $getdo_hod_row['roundoff']; $total_amount=$total_amount+$getdo_hod_row['roundoff']; ?></td>
                      <td><?php echo $getdo_hod_row['executive']; ?></td>
                      <td><?php echo $getdo_hod_row['CompanyName']; ?></td>
                    </tr>
                    <?php	}
			 $getdo_user=mysqli_query($con,"select * from userregistration where UserType=0 and username='$remark_user_name'");
                            
	  
		   $total_amount=0;
		   $total_box=0;
		   while($getdo_user_row=mysqli_fetch_array($getdo_user))
			
			{
			?>
                    <tr>
                      <?php 
                         $today1 = date('d-m-Y',time()); 
                         $today = $getdo_hod_row['Date']; 
       $exp = date('d-m-Y',strtotime('15-11-2017')); //query result form database
       $expDate =  date_create($exp);
       $todayDate = date_create($today);
       $diff =  date_diff($todayDate, $expDate);
       if($diff->format("%R%a")>0){
             ?>
                        <td><a href="doview.php?dono=<?php echo $do_id; ?>" target="_blank"><?php echo $do_id; ?></a></td>
                        <?php
       }else{
           ?>
                        <td>
                            
                            <a href="doview-gst.php?dono=<?php echo $do_id; ?>" target="_blank"><?php echo $do_id; ?></a></td>
                        <?php
       }
       //echo "Remaining Days ".$diff->format("%R%a days");
    ?>
                      <td><?php echo $getdo_hod_row['dodate']; ?></td>
                      <td><?php echo $getdo_hod_row['Dealer_Name']; ?></td>
                      <?php $dealer=mysqli_query($con,"select * from dealer where Dealer_id='$getdo_hod_row[dealer_id]'"); 
                                $row_count=mysqli_num_rows($dealer);
                                if($row_count !=0)
								{
								while($rowdealer=mysqli_fetch_array($dealer))

                                {

                            ?>
                      <td><?php echo $rowdealer['centre'];  ?></td>
                      <td><?php echo $rowdealer['Name']; ?></td>
                      <td align="center"><?php echo $rowdealer['Mobile']; break;?></td>
                      <?php }
								}
								else
								{
								 echo "<td></td><td></td><td></td>";	
								}
							
							 ?>
                      <td align="center"><?php echo $getdo_hod_row['Totalbox']; $total_box=$total_box+$getdo_hod_row['Totalbox']; ?></td>
                      <td align="right"><?php echo $getdo_hod_row['roundoff']; $total_amount=$total_amount+$getdo_hod_row['roundoff']; ?></td>
                      <td><?php echo $getdo_hod_row['executive']; ?></td>
                      <td><?php echo $getdo_hod_row['CompanyName']; ?></td>
                    </tr>
                    <?php	}			  
						 }
						  	
					}
				?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>DO No.</th>
                      <th>Date</th>
                      <th>Dealer Name</th>
                      <th>Party Center</th>
                      <th>Contact Person</th>
                      <th>Contact No.</th>
                      <th>Total Box</th>
                      <th>Total Amount</th>
                      <th>Executive Name</th>
                      <th>Brand</th>
                    </tr>
                  </tfoot>
                </table>
                  </div>
              </div>
            </div>
            <!-- End .powerwidget --> 
            
            <!-- New widget -->
            <div class="powerwidget" id="datatable-filter-column" data-widget-editbutton="false">
              <header>
                <h2>Pending For Approval<small>Order</small></h2>
              </header>
              <div class="inner-spacer">
                <div class="table-responsive">
                    <div class="table-responsive">
                    <table class="display table table-striped table-hover" id="table-2">
                      <thead>
                        <tr>
                          <th>DO No.</th>
                          <th>Date</th>
                          <th>Dealer Name</th>
                          <th>Party Center</th>
                          <th>Contact Person</th>
                          <th>Contact No.</th>
                          <th>Total Box</th>
                          <th>Total Amount</th>
                          <th>Executive Name</th>
                          <th>Brand</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                  
					$getdo_hod=mysqli_query($con,"select * from finalsales where confirm='0'");
					
					while($getdo_hod_row=mysqli_fetch_array($getdo_hod))
					{
			    		$do_id=$getdo_hod_row['doid'];
						 $getdo_remark=mysqli_query($con,"select * from remarks_do where doid='$do_id' order by id DESC limit 0,1 ");
						 while($getdo_remark_row=mysqli_fetch_array($getdo_remark))
						 {
						  $remark_user_name=$getdo_remark_row['username']; 
						  
						   $getdo_user=mysqli_query($con,"select * from userregistration where UserType=1 and username='$remark_user_name'");// get GM username 
     
	  
		   $total_amount=0;
		   $total_box=0;
			if(mysqli_num_rows($getdo_user)>0)
			{
			}
			else
			{
                            $getdo_user=mysqli_query($con,"select * from userregistration where UserType=0 and username='$remark_user_name'");// get GM username 
     
	  
		   $total_amount=0;
		   $total_box=0;
			if(mysqli_num_rows($getdo_user)>0)
			{
			}
			else
			{
			?>
                        <tr>
                         <?php 
                         $today1 = date('d-m-Y',time()); 
                         $today = $getdo_hod_row['Date']; 
       $exp = date('d-m-Y',strtotime('15-11-2017')); //query result form database
       $expDate =  date_create($exp);
       $todayDate = date_create($today);
       $diff =  date_diff($todayDate, $expDate);
       if($diff->format("%R%a")>0){
             ?>
                        <td><a href="doview.php?dono=<?php echo $do_id; ?>" target="_blank"><?php echo $do_id; ?></a></td>
                        <?php
       }else{
           ?>
                        <td>
                            
                            <a href="doview-gst.php?dono=<?php echo $do_id; ?>" target="_blank"><?php echo $do_id; ?></a></td>
                        <?php
       }
       //echo "Remaining Days ".$diff->format("%R%a days");
    ?>
                          <td><?php echo $getdo_hod_row['dodate']; ?></td>
                          <td><?php echo $getdo_hod_row['Dealer_Name']; ?></td>
                          <?php $dealer=mysqli_query($con,"select * from dealer where Dealer_id='$getdo_hod_row[dealer_id]'"); 
                                $row_count=mysqli_num_rows($dealer);
                                if($row_count !=0)
								{
								while($rowdealer=mysqli_fetch_array($dealer))

                                {

                            ?>
                          <td><?php echo $rowdealer['centre'];  ?></td>
                          <td><?php echo $rowdealer['Name']; ?></td>
                          <td align="center"><?php echo $rowdealer['Mobile']; break;?></td>
                          <?php }
								}
								else
								{
								 echo "<td></td><td></td><td></td>";	
								}
							
							 ?>
                          <td align="center"><?php echo $getdo_hod_row['Totalbox']; $total_box=$total_box+$getdo_hod_row['Totalbox']; ?></td>
                          <td align="right"><?php echo $getdo_hod_row['roundoff']; $total_amount=$total_amount+$getdo_hod_row['roundoff']; ?></td>
                          <td><?php echo $getdo_hod_row['executive']; ?></td>
                          <td><?php echo $getdo_hod_row['CompanyName']; ?></td>
                        </tr>
                        <?php	
                        }		  
						 }
						  	
					}
				}
				
                  
			 
			 ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th><input type="text" name="filter_game_name" placeholder="Filter By DO" class="search_init" /></th>
                          <th><input type="text" name="filter_publisher" placeholder="Filter By Date" class="search_init" /></th>
                          <th><input type="text" name="filter_platform" placeholder="Filter By Dealer" class="search_init" /></th>
                          <th><input type="text" name="filter_genre" placeholder="Filter By Party" class="search_init" /></th>
                          <th><input type="text" name="filter_sales" placeholder="Filter By Person" class="search_init" /></th>
                          <th><input type="text" name="filter_game_name" placeholder="Filter By Contact" class="search_init" /></th>
                          <th><input type="text" name="filter_publisher" placeholder="Filter By Box" class="search_init" /></th>
                          <th><input type="text" name="filter_platform" placeholder="Filter By Amount" class="search_init" /></th>
                          <th><input type="text" name="filter_genre" placeholder="Filter By Executive" class="search_init" /></th>
                          <th><input type="text" name="filter_sales" placeholder="Filter By Brand" class="search_init" /></th>
                        </tr>
                      </tfoot>
                    </table>
                    </div>
                  </div>
              </div>
            </div>
            <!-- End .powerwidget --> 
           
       <?php
        }
        if($usertype==1)// Hod Dashboard
        {
        ?>
             <div class="powerwidget" id="datatable-basic-init" data-widget-editbutton="false">
                 <header>
                <h2>Pending Order<small>For Approve</small></h2>
              </header>
              <div class="inner-spacer">
                  <div class="table-responsive">
                <table class="table table-striped table-hover" id="table-1">
                  <thead>
                    <tr>
                          <th>DO No.</th>
                          <th>Date</th>
                          <th>Dealer Name</th>
                          <th>Party Center</th>
                          <th>Total Box</th>
                          <th>Total Amount</th>
                          <th>Executive Name</th>
                          <th>Brand</th>
                          <th>Remark</th>
                          
                    </tr>
                  </thead>
                  <tbody>
                        <?php 
                    $total_amount=0;
		   $total_box=0;
	           $remarks_last="";
                   $remark_by="";
		   $getdo_hod=mysqli_query($con,"select * from finalsales where confirm='0' ");
		   while($getdo_hod_row=mysqli_fetch_array($getdo_hod))
		   {
	            $do_id=$getdo_hod_row['doid'];
		    $getdo_remark=mysqli_query($con,"select * from remarks_do where doid='$do_id' order by id DESC limit 0,1 "); // get Gm Remarks doid
		    while($getdo_remark_row=mysqli_fetch_array($getdo_remark))
		    {
		     $remark_user_name=$getdo_remark_row['username']; 
                     $remarks_last=$getdo_remark_row['remarks'];
                     $remark_by=$getdo_remark_row['username'];
                     $getdo_user=mysqli_query($con,"select * from userregistration where UserType=1  and username='$remark_user_name'");
                     
		  if(mysqli_num_rows($getdo_user)>0)
			{
                         
			}
			else
			{
                         $getdo_user=mysqli_query($con,"select * from userregistration where UserType=8 and username='$remark_user_name'");   
                         if(mysqli_num_rows($getdo_user)>0)
                         {}
                         else
                             {
                          $getdo_user=mysqli_query($con,"select * from userregistration where UserType=0 and username='$remark_user_name'");   
                         if(mysqli_num_rows($getdo_user)>0)
                         { 
                             
                         }  
                         else
                         {
			?>
                        <tr>
                          <?php 
                         $today1 = date('d-m-Y',time()); 
                         $today = $getdo_hod_row['Date']; 
       $exp = date('d-m-Y',strtotime('15-11-2017')); //query result form database
       $expDate =  date_create($exp);
       $todayDate = date_create($today);
       $diff =  date_diff($todayDate, $expDate);
       if($diff->format("%R%a")>0){
             ?>
                        <td><a href="doview.php?dono=<?php echo $do_id; ?>" target="_blank"><?php echo $do_id; ?></a></td>
                        <?php
       }else{
           ?>
                        <td>
                            
                            <a href="doview-gst.php?dono=<?php echo $do_id; ?>" target="_blank"><?php echo $do_id; ?></a></td>
                        <?php
       }
       //echo "Remaining Days ".$diff->format("%R%a days");
    ?>
                          <td><?php echo $getdo_hod_row['dodate']; ?></td>
                          <td><?php echo $getdo_hod_row['Dealer_Name']; ?></td>
                          <?php $dealer=mysqli_query($con,"select * from dealer where Dealer_id='$getdo_hod_row[dealer_id]'"); 
                                $row_count=mysqli_num_rows($dealer);
                                if($row_count !=0)
								{
								while($rowdealer=mysqli_fetch_array($dealer))

                                {

                            ?>
                          <td><?php echo $rowdealer['centre'];  ?></td>
                          
                          <?php }
								}
								else
								{
								 echo "<td></td><td></td><td></td>";	
								}
							
							 ?>
                          <td align="center"><?php echo $getdo_hod_row['Totalbox']; $total_box=$total_box+$getdo_hod_row['Totalbox']; ?></td>
                          <td align="right"><?php echo $getdo_hod_row['roundoff']; $total_amount=$total_amount+$getdo_hod_row['roundoff']; ?></td>
                          <td><?php echo $getdo_hod_row['executive']; ?></td>
                          <td><?php echo $getdo_hod_row['CompanyName']; ?></td>
                          <td><?php if(strcmp($remark_by,"karthik")!=0){echo $remarks_last;}?></td>
                          <td><?php if(strcmp($remark_by,"karthik")==0){echo $remarks_last;}?></td>
                              
                          </td>
                        </tr>
                             <?php	
                             
                          }
                          
                          }
						  
						 }
						  	
					}
			 
                                        }
			 ?>
                      </tbody>
                  <tfoot>
                    <tr>
                     <th>Total</th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th><?php echo $total_box." Boxes";?></th>
                          <th><?php echo "Rs. ".$total_amount.".00";?></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                    </tr>
                  </tfoot>
                </table>
                  </div>
              </div>
            </div>
            <!-- End .powerwidget --> 
            
            <!-- New widget -->
            <div class="powerwidget" id="datatable-filter-column" data-widget-editbutton="false">
              <header>
                <h2>Liaison Officer Approved<small>Order</small></h2>
              </header>
              <div class="inner-spacer">
                  <div class="table-responsive">
                <table class="display table table-striped table-hover" id="table-2">
                  <thead>
                    <tr>
                      <th>DO No.</th>
                      <th>Date</th>
                      <th>Dealer Name</th>
                      <th>Party Center</th>
                      <th>Contact Person</th>
                      <th>Contact No.</th>
                      <th>Total Box</th>
                      <th>Total Amount</th>
                      <th>Executive Name</th>
                      <th>Brand</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    
		   $total_amount=0;
		   $total_box=0;
					$getdo_hod=mysqli_query($con,"select * from finalsales where confirm='0' ");
					
					while($getdo_hod_row=mysqli_fetch_array($getdo_hod))
					{
			    		 $do_id=$getdo_hod_row['doid'];
						 $getdo_remark=mysqli_query($con,"select * from remarks_do where doid='$do_id' order by id DESC limit 0,1 "); // get Gm Remarks doid
						 while($getdo_remark_row=mysqli_fetch_array($getdo_remark))
						 {
						   $remark_user_name=$getdo_remark_row['username']; 
						    $getdo_user=mysqli_query($con,"select * from userregistration where UserType=8 and username='$remark_user_name'");
                            
	  
		   while($getdo_user_row=mysqli_fetch_array($getdo_user))
			
			{
			?>
                    <tr>
                      <?php 
                         $today1 = date('d-m-Y',time()); 
                         $today = $getdo_hod_row['Date']; 
       $exp = date('d-m-Y',strtotime('15-11-2017')); //query result form database
       $expDate =  date_create($exp);
       $todayDate = date_create($today);
       $diff =  date_diff($todayDate, $expDate);
       if($diff->format("%R%a")>0){
             ?>
                        <td><a href="doview.php?dono=<?php echo $do_id; ?>" target="_blank"><?php echo $do_id; ?></a></td>
                        <?php
       }else{
           ?>
                        <td>
                            
                            <a href="doview-gst.php?dono=<?php echo $do_id; ?>" target="_blank"><?php echo $do_id; ?></a></td>
                        <?php
       }
       //echo "Remaining Days ".$diff->format("%R%a days");
    ?>
                      <td><?php echo $getdo_hod_row['dodate']; ?></td>
                      <td><?php echo $getdo_hod_row['Dealer_Name']; ?></td>
                      <?php $dealer=mysqli_query($con,"select * from dealer where Dealer_id='$getdo_hod_row[dealer_id]'"); 
                                $row_count=mysqli_num_rows($dealer);
                                if($row_count !=0)
								{
								while($rowdealer=mysqli_fetch_array($dealer))

                                {

                            ?>
                      <td><?php echo $rowdealer['centre'];  ?></td>
                      <td><?php echo $rowdealer['Name']; ?></td>
                      <td align="center"><?php echo $rowdealer['Mobile']; break;?></td>
                      <?php }
								}
								else
								{
								 echo "<td></td><td></td><td></td>";	
								}
							
							 ?>
                      <td align="center"><?php echo $getdo_hod_row['Totalbox']; $total_box=$total_box+$getdo_hod_row['Totalbox']; ?></td>
                      <td align="right"><?php echo $getdo_hod_row['roundoff']; $total_amount=$total_amount+$getdo_hod_row['roundoff']; ?></td>
                      <td><?php echo $getdo_hod_row['executive']; ?></td>
                      <td><?php echo $getdo_hod_row['CompanyName']; ?></td>
                    </tr>
                    <?php	}
						  
						 }
						  	
					}
				
                                ?>
                    
                  </tbody>
                  <tfoot>
                    <tr class="table table-striped table-bordered">
                     <th>Total</th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th><?php echo $total_box." Boxes";?></th>
                          <th><?php echo "Rs. ".$total_amount.".00";?></th>
                          
                          <th></th>
                          <th></th>
                    </tr>
                  </tfoot>
                </table>
                  </div>    
              </div>
            </div>
            <!-- End .powerwidget --> 
            
            <!-- New widget -->
            <div class="powerwidget" id="datatable-with-colvis" data-widget-editbutton="false">
              <header>
                <h2>HOD Approved<small>Order</small></h2>
              </header>
              <div class="inner-spacer">
                <div class="table-responsive">
                <table class="table table-striped table-hover" id="table-3">
                  <thead>
                  <th>DO No.</th>
                    <th>Date</th>
                    <th>Dealer Name</th>
                    <th>Party Center</th>
                    <th>Contact Person</th>
                    <th>Contact No.</th>
                    <th>Total Box</th>
                    <th>Total Amount</th>
                    <th>Executive Name</th>
                    <th>Brand</th>
                      </thead>
                  <tbody>
                    <?php
				  if($usertype==1)   
	              {
                                      {
                          $total_amount=0;
		   $total_box=0;
					$getdo_hod=mysqli_query($con,"select * from finalsales where confirm='0' ");
					
					while($getdo_hod_row=mysqli_fetch_array($getdo_hod))
					{
			    		$do_id=$getdo_hod_row['doid'];
						 $getdo_remark=mysqli_query($con,"select * from remarks_do where doid='$do_id' order by id DESC limit 0,1 ");
						 while($getdo_remark_row=mysqli_fetch_array($getdo_remark))
						 {
						  $remark_user_name=$getdo_remark_row['username']; 
						  
						   $getdo_user=mysqli_query($con,"select * from userregistration where UserType=1 and username='$remark_user_name'");// get GM username 
     
	  
		   
			while($getdo_user_row=mysqli_fetch_array($getdo_user))
			{
			?>
                    <tr>
                      <?php 
                        $today1 = date('d-m-Y',time());
                        $today = $getdo_hod_row['Date']; 
       $exp = date('d-m-Y',strtotime('15-11-2017')); //query result form database
       $expDate =  date_create($exp);
       $todayDate = date_create($today);
       $diff =  date_diff($todayDate, $expDate);
       if($diff->format("%R%a")>0){
             ?>
                        <td><a href="doview.php?dono=<?php echo $do_id; ?>" target="_blank"><?php echo $do_id; ?></a></td>
                        <?php
       }else{
           ?>
                        <td>
                            
                            <a href="doview-gst.php?dono=<?php echo $do_id; ?>" target="_blank"><?php echo $do_id; ?></a></td>
                        <?php
       }
      // echo "Remaining Days ".$diff->format("%R%a days");
    ?>
                      
                      <td><?php echo $getdo_hod_row['dodate']; ?></td>
                      <td><?php echo $getdo_hod_row['Dealer_Name']; ?></td>
                      <?php $dealer=mysqli_query($con,"select * from dealer where Dealer_id='$getdo_hod_row[dealer_id]'"); 
                                $row_count=mysqli_num_rows($dealer);
                                if($row_count !=0)
								{
								while($rowdealer=mysqli_fetch_array($dealer))

                                {

                            ?>
                      <td><?php echo $rowdealer['centre'];  ?></td>
                      <td><?php echo $rowdealer['Name']; ?></td>
                      <td align="center"><?php echo $rowdealer['Mobile']; break;?></td>
                      <?php }
								}
								else
								{
								 echo "<td></td><td></td><td></td>";	
								}
							
							 ?>
                      <td align="center"><?php echo $getdo_hod_row['Totalbox']; $total_box=$total_box+$getdo_hod_row['Totalbox']; ?></td>
                      <td align="right"><?php echo $getdo_hod_row['roundoff']; $total_amount=$total_amount+$getdo_hod_row['roundoff']; ?></td>
                      <td><?php echo $getdo_hod_row['executive']; ?></td>
                      <td><?php echo $getdo_hod_row['CompanyName']; ?></td>
                    </tr>
                    <?php	
                    
                        }
                         $getdo_user=mysqli_query($con,"select * from userregistration where UserType=0 and username='$remark_user_name'");// get GM username 
     
	  
		   
			while($getdo_user_row=mysqli_fetch_array($getdo_user))
			{
			?>
                    <tr>
                     
                        <?php 
                         $today1 = date('d-m-Y',time()); 
                         $today = $getdo_hod_row['Date']; 
       $exp = date('d-m-Y',strtotime('15-11-2017')); //query result form database
       $expDate =  date_create($exp);
       $todayDate = date_create($today);
       $diff =  date_diff($todayDate, $expDate);
       if($diff->format("%R%a")>0){
             ?>
                        <td><a href="doview.php?dono=<?php echo $do_id; ?>" target="_blank"><?php echo $do_id; ?></a></td>
                        <?php
       }else{
           ?>
                        <td>
                            
                            <a href="doview-gst.php?dono=<?php echo $do_id; ?>" target="_blank"><?php echo $do_id; ?></a></td>
                        <?php
       }
       //echo "Remaining Days ".$diff->format("%R%a days");
    ?>
                      
                      <td><?php echo $getdo_hod_row['dodate']; ?></td>
                      <td><?php echo $getdo_hod_row['Dealer_Name']; ?></td>
                      <?php $dealer=mysqli_query($con,"select * from dealer where Dealer_id='$getdo_hod_row[dealer_id]'"); 
                                $row_count=mysqli_num_rows($dealer);
                                if($row_count !=0)
								{
								while($rowdealer=mysqli_fetch_array($dealer))

                                {

                            ?>
                      <td><?php echo $rowdealer['centre'];  ?></td>
                      <td><?php echo $rowdealer['Name']; ?></td>
                      <td align="center"><?php echo $rowdealer['Mobile']; break;?></td>
                      <?php }
								}
								else
								{
								 echo "<td></td><td></td><td></td>";	
								}
							
							 ?>
                      <td align="center"><?php echo $getdo_hod_row['Totalbox']; $total_box=$total_box+$getdo_hod_row['Totalbox']; ?></td>
                      <td align="right"><?php echo $getdo_hod_row['roundoff']; $total_amount=$total_amount+$getdo_hod_row['roundoff']; ?></td>
                      <td><?php echo $getdo_hod_row['executive']; ?></td>
                      <td><?php echo $getdo_hod_row['CompanyName']; ?></td>
                    </tr>
                    <?php	
                    
                        }	  
						 }
						  	
					}
				} 
				  }
				  
				  
				  ?>
                  </tbody>
                  <tfoot>
                    <tr class="table table-striped table-bordered">
                     <th>Total</th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th><?php echo $total_box." Boxes";?></th>
                          <th><?php echo "Rs. ".$total_amount.".00";?></th>
                          
                          <th></th>
                          <th></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              </div>
            </div>
            <!-- End .powerwidget --> 
         <?php
            
        }
        if($usertype==8)
        {
        ?>
              <div class="powerwidget" id="datatable-basic-init" data-widget-editbutton="false">
              <header>
                <h2>Pending for Approval<small>Order </small></h2>
              </header>
              <div class="inner-spacer">
                  <div class="table-responsive">
                <table class="table table-striped table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th>DO No.</th>
                          <th>Date</th>
                          <th>Dealer Name</th>
                          <th>Party Center</th>
                          <th>Contact Person</th>
                          <th>Contact No.</th>
                          <th>Total Box</th>
                          <th>Total Amount</th>
                          <th>Executive Name</th>
                          <th>Brand</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php
                  
					$getdo_pending=mysqli_query($con,"select * from finalsales where confirm='0'");
					
					while($getdo_hod_row=mysqli_fetch_array($getdo_pending))
					{
			    		$do_id=$getdo_hod_row['doid'];
						 $getdo_remark=mysqli_query($con,"select * from remarks_do where doid='$do_id' order by id DESC limit 0,1 ");
						 while($getdo_remark_row=mysqli_fetch_array($getdo_remark))
						 {
						  $remark_user_name=$getdo_remark_row['username']; 
						  
						   $getdo_user=mysqli_query($con,"select * from userregistration where UserType=8 and username='$remark_user_name'");
     
	  
		   $total_amount=0;
		   $total_box=0;
			if(mysqli_num_rows($getdo_user)>0)
			{
                        }
                        else
                        {
                         $getdo_user=mysqli_query($con,"select * from userregistration where UserType=1 and username='$remark_user_name'");
                         
                         if(mysqli_num_rows($getdo_user)>0)
			{
                        }
                        else
                        {
                        
			?>
                        <tr>
                          <?php 
                         $today1 = date('d-m-Y',time()); 
                         $today = $getdo_hod_row['Date']; 
       $exp = date('d-m-Y',strtotime('15-11-2017')); //query result form database
       $expDate =  date_create($exp);
       $todayDate = date_create($today);
       $diff =  date_diff($todayDate, $expDate);
       if($diff->format("%R%a")>0){
             ?>
                        <td><a href="doview.php?dono=<?php echo $do_id; ?>" target="_blank"><?php echo $do_id; ?></a></td>
                        <?php
       }else{
           ?>
                        <td>
                            
                            <a href="doview-gst.php?dono=<?php echo $do_id; ?>" target="_blank"><?php echo $do_id; ?></a></td>
                        <?php
       }
       //echo "Remaining Days ".$diff->format("%R%a days");
    ?>
                          <td><?php echo $getdo_hod_row['dodate']; ?></td>
                          <td><?php echo $getdo_hod_row['Dealer_Name']; ?></td>
                          <?php $dealer=mysqli_query($con,"select * from dealer where Dealer_id='$getdo_hod_row[dealer_id]'"); 
                                $row_count=mysqli_num_rows($dealer);
                                if($row_count !=0)
								{
								while($rowdealer=mysqli_fetch_array($dealer))

                                {

                            ?>
                          <td><?php echo $rowdealer['centre'];  ?></td>
                          <td><?php echo $rowdealer['Name']; ?></td>
                          <td align="center"><?php echo $rowdealer['Mobile']; break;?></td>
                          <?php }
								}
								else
								{
								 echo "<td></td><td></td><td></td>";	
								}
							
							 ?>
                          <td align="center"><?php echo $getdo_hod_row['Totalbox']; $total_box=$total_box+$getdo_hod_row['Totalbox']; ?></td>
                          <td align="right"><?php echo $getdo_hod_row['roundoff']; $total_amount=$total_amount+$getdo_hod_row['roundoff']; ?></td>
                          <td><?php echo $getdo_hod_row['executive']; ?></td>
                          <td><?php echo $getdo_hod_row['CompanyName']; ?></td>
                        </tr>
                        <?php	
                        }		  
						 }
						  	
					}
				}
				
                  
			 
			 ?>
                      </tbody>
                  <tfoot>
                    <tr>
                      <th>DO No.</th>
                          <th>Date</th>
                          <th>Dealer Name</th>
                          <th>Party Center</th>
                          <th>Contact Person</th>
                          <th>Contact No.</th>
                          <th>Total Box</th>
                          <th>Total Amount</th>
                          <th>Executive Name</th>
                          <th>Brand</th>
                    </tr>
                  </tfoot>
                </table>
                  </div>
              </div>
            </div>
            <!-- End .powerwidget --> 
            
            <!-- New widget -->
            <div class="powerwidget" id="datatable-filter-column" data-widget-editbutton="false">
              <header>
                <h2>Liaison Officer Approved<small>Order </small></h2>
              </header>
              <div class="inner-spacer">
                  <div class="table-responsive">
                <table class="display table table-striped table-hover" id="table-2">
                  <thead>
                    <tr>
                      <th>DO No.</th>
                      <th>Date</th>
                      <th>Dealer Name</th>
                      <th>Party Center</th>
                      <th>Contact Person</th>
                      <th>Contact No.</th>
                      <th>Total Box</th>
                      <th>Total Amount</th>
                      <th>Executive Name</th>
                      <th>Brand</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php
                $getdo_hod=mysqli_query($con,"select * from finalsales where confirm='0' ");
					
					while($getdo_hod_row=mysqli_fetch_array($getdo_hod))
					{
			    		 $do_id=$getdo_hod_row['doid'];
						 $getdo_remark=mysqli_query($con,"select * from remarks_do where doid='$do_id' order by id DESC limit 0,1 "); // get Gm Remarks doid
						 while($getdo_remark_row=mysqli_fetch_array($getdo_remark))
						 {
							$remark_user_name=$getdo_remark_row['username']; 
						    $getdo_user=mysqli_query($con,"select * from userregistration where UserType=8 and username='$remark_user_name'");
                            
	  
		   $total_amount=0;
		   $total_box=0;
		   while($getdo_user_row=mysqli_fetch_array($getdo_user))
			
			{
			?>
                    <tr>
                      <?php 
                         $today1 = date('d-m-Y',time()); 
                         $today = $getdo_hod_row['Date']; 
       $exp = date('d-m-Y',strtotime('15-11-2017')); //query result form database
       $expDate =  date_create($exp);
       $todayDate = date_create($today);
       $diff =  date_diff($todayDate, $expDate);
       if($diff->format("%R%a")>0){
             ?>
                        <td><a href="doview.php?dono=<?php echo $do_id; ?>" target="_blank"><?php echo $do_id; ?></a></td>
                        <?php
       }else{
           ?>
                        <td>
                            
                            <a href="doview-gst.php?dono=<?php echo $do_id; ?>" target="_blank"><?php echo $do_id; ?></a></td>
                        <?php
       }
       //echo "Remaining Days ".$diff->format("%R%a days");
    ?>
                      <td><?php echo $getdo_hod_row['dodate']; ?></td>
                      <td><?php echo $getdo_hod_row['Dealer_Name']; ?></td>
                      <?php $dealer=mysqli_query($con,"select * from dealer where Dealer_id='$getdo_hod_row[dealer_id]'"); 
                                $row_count=mysqli_num_rows($dealer);
                                if($row_count !=0)
								{
								while($rowdealer=mysqli_fetch_array($dealer))

                                {

                            ?>
                      <td><?php echo $rowdealer['centre'];  ?></td>
                      <td><?php echo $rowdealer['Name']; ?></td>
                      <td align="center"><?php echo $rowdealer['Mobile']; break;?></td>
                      <?php }
								}
								else
								{
								 echo "<td></td><td></td><td></td>";	
								}
							
							 ?>
                      <td align="center"><?php echo $getdo_hod_row['Totalbox']; $total_box=$total_box+$getdo_hod_row['Totalbox']; ?></td>
                      <td align="right"><?php echo $getdo_hod_row['roundoff']; $total_amount=$total_amount+$getdo_hod_row['roundoff']; ?></td>
                      <td><?php echo $getdo_hod_row['executive']; ?></td>
                      <td><?php echo $getdo_hod_row['CompanyName']; ?></td>
                    </tr>
                    <?php	}
						  
						 }
						  	
					}
				
                        ?>        
                  </tbody>
                  <tfoot>
                    <tr>
                      <th><input type="text" name="filter_do_no" placeholder="Filter DO No" class="search_init" /></th>
                      <th><input type="text" name="filter_date" placeholder="Filter Date" class="search_init" /></th>
                      <th><input type="text" name="filter_dealer_name" placeholder="Filter Dealer Name" class="search_init" /></th>
                      <th><input type="text" name="filter_party_center" placeholder="Filter Party Center" class="search_init" /></th>
                      <th><input type="text" name="filter_contact_person" placeholder="Filter Contact Person" class="search_init" /></th>
                      <th><input type="text" name="filter_contact_no" placeholder="Filter Contact No" class="search_init" /></th>
                      <th><input type="text" name="filter_total_box" placeholder="Filter Total Box" class="search_init" /></th>
                      <th><input type="text" name="filter_total_amount" placeholder="Filter Total Amount" class="search_init" /></th>
                      <th><input type="text" name="filter_executive_name" placeholder="Filter Executive Name" class="search_init" /></th>
                      <th><input type="text" name="filter_brand" placeholder="Filter Brand" class="search_init" /></th>
                    </tr>
                  </tfoot>
                </table>
                  </div>
              </div>
            </div>
            <!-- End .powerwidget --> 
            
            <?php
        }
        if($usertype==7)
        {
        ?>
            <div class="row" id="powerwidgets">
        <div class="col-md-12 bootstrap-grid">
          <div class="page-header">
            <h2>Pending for Approval<small>Order </small></h2>
          </div>
          <div class="row" id="powerwidgets">
            <div class="col-md-12 bootstrap-grid"> 
              <!-- New widget -->
              <div class="powerwidget" id="datatable-filter-column" data-widget-editbutton="false">
                <div class="inner-spacer">
             
                  <div class="table-responsive">
                    <table class="display table table-striped table-hover" id="table-2">
                      <thead>
                        <tr>
                          <th>DO No.</th>
                          <th>Date</th>
                          <th>Dealer Name</th>
                          <th>Party Center</th>
                          <th>Contact Person</th>
                          <th>Contact No.</th>
                          <th>Total Box</th>
                          <th>Total Amount</th>
                          <th>Executive Name</th>
                          <th>Brand</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
     
			 $select_do=mysqli_query($con,"select * from finalsales where User_id='$username' and confirm=0");
			 $total_amount=0;
		   $total_box=0;
			while($select_do_row=mysqli_fetch_array($select_do))
			{
			?>
                        <tr>
                          <?php
                         $do_id=$select_do_row['doid']; 
                         $today1 = date('d-m-Y',time()); 
                         $today = $getdo_do_row['Date']; 
       $exp = date('d-m-Y',strtotime('15-11-2017')); //query result form database
       $expDate =  date_create($exp);
       $todayDate = date_create($today);
       $diff =  date_diff($todayDate, $expDate);
       if($diff->format("%R%a")>0){
             ?>
                        <td><a href="doview.php?dono=<?php echo $do_id; ?>" target="_blank"><?php echo $do_id; ?></a></td>
                        <?php
       }else{
           ?>
                        <td>
                            
                            <a href="doview-gst.php?dono=<?php echo $do_id; ?>" target="_blank"><?php echo $do_id; ?></a></td>
                        <?php
       }
       //echo "Remaining Days ".$diff->format("%R%a days");
    ?>
                          <td><?php echo $select_do_row['dodate']; ?></td>
                          <td><?php echo $select_do_row['Dealer_Name']; ?></td>
                          <?php $dealer=mysqli_query($con,"select * from dealer where TIN='$select_do_row[Dealer_Tin]'"); 
                                $row_count=mysqli_num_rows($dealer);
                                if($row_count !=0)
								{
								while($rowdealer=mysqli_fetch_array($dealer))

                                {

                            ?>
                          <td><?php echo $rowdealer['centre'];  ?></td>
                          <td><?php echo $rowdealer['Name']; ?></td>
                          <td align="center"><?php echo $rowdealer['Mobile']; break;?></td>
                          <?php }
								}
								else
								{
								 echo "<td></td><td></td><td></td>";	
								}
							
							 ?>
                          <td align="center"><?php echo $select_do_row['Totalbox']; $total_box=$total_box+$select_do_row['Totalbox']; ?></td>
                          <td align="right"><?php echo $select_do_row['roundoff']; $total_amount=$total_amount+$select_do_row['roundoff']; ?></td>
                          <td><?php echo $select_do_row['executive']; ?></td>
                          <td><?php echo $select_do_row['CompanyName']; ?></td>
                        </tr>
                        <?php
			}
			 ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th><input type="text" name="filter_game_name" placeholder="Filter By DO" class="search_init" /></th>
                          <th><input type="text" name="filter_publisher" placeholder="Filter By Date" class="search_init" /></th>
                          <th><input type="text" name="filter_platform" placeholder="Filter By Dealer" class="search_init" /></th>
                          <th><input type="text" name="filter_genre" placeholder="Filter By Party" class="search_init" /></th>
                          <th><input type="text" name="filter_sales" placeholder="Filter By Person" class="search_init" /></th>
                          <th><input type="text" name="filter_game_name" placeholder="Filter By Contact" class="search_init" /></th>
                          <th><input type="text" name="filter_publisher" placeholder="Filter By Box" class="search_init" /></th>
                          <th><input type="text" name="filter_platform" placeholder="Filter By Amount" class="search_init" /></th>
                          <th><input type="text" name="filter_genre" placeholder="Filter By Executive" class="search_init" /></th>
                          <th><input type="text" name="filter_sales" placeholder="Filter By Brand" class="search_init" /></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <?php
        }
       ?>
    </div>
    <!-- /Inner Row Col-md-12 --> 
    
    <!-- / Content Wrapper --> 
  </div>
  <!--/MainWrapper--> 
</div>
<!--/Smooth Scroll--> 

<!-- scroll top -->
<div class="scroll-top-wrapper hidden-xs"> <i class="fa fa-angle-up"></i> </div>
<!-- /scroll top --> 

<!--Modals--> 

<!--Power Widgets Modal-->
<div class="modal" id="delete-widget">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <i class="fa fa-lock"></i> </div>
      <div class="modal-body text-center">
        <p>Are you sure to delete this widget?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="trigger-deletewidget-reset">Cancel</button>
        <button type="button" class="btn btn-primary" id="trigger-deletewidget">Delete</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
<!-- /.modal --> 

<!--Sign Out Dialog Modal-->
<div class="modal" id="signout">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <i class="fa fa-lock"></i> </div>
      <div class="modal-body text-center">Are You Sure Want To Sign Out?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="yesigo">Ok</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
<!-- /.modal --> 

<!--Lock Screen Dialog Modal-->
<div class="modal" id="lockscreen">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <i class="fa fa-lock"></i> </div>
      <div class="modal-body text-center">Are You Sure Want To Lock Screen?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="yesilock">Ok</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
<!-- /.modal --> 

<!--Scripts--> 
<!--JQuery--> 
<script type="text/javascript" src="js/vendors/jquery/jquery.min.js"></script> 
<script type="text/javascript" src="js/vendors/jquery/jquery-ui.min.js"></script> 

<!--Fullscreen--> 
<script type="text/javascript" src="js/vendors/fullscreen/screenfull.min.js"></script> 

<!--NanoScroller--> 
<script type="text/javascript" src="js/vendors/nanoscroller/jquery.nanoscroller.min.js"></script> 

<!--Sparkline--> 
<script type="text/javascript" src="js/vendors/sparkline/jquery.sparkline.min.js"></script> 

<!--Horizontal Dropdown--> 
<script type="text/javascript" src="js/vendors/horisontal/cbpHorizontalSlideOutMenu.js"></script> 
<script type="text/javascript" src="js/vendors/classie/classie.js"></script> 

<!--Datatables--> 
<script type="text/javascript" src="js/vendors/datatables/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="js/vendors/datatables/jquery.dataTables-bootstrap.js"></script> 
<script type="text/javascript" src="js/vendors/datatables/dataTables.colVis.js"></script> 
<script type="text/javascript" src="js/vendors/datatables/colvis.extras.js"></script> 

<!--PowerWidgets--> 
<script type="text/javascript" src="js/vendors/powerwidgets/powerwidgets.min.js"></script> 

<!--Bootstrap--> 
<script type="text/javascript" src="js/vendors/bootstrap/bootstrap.min.js"></script> 

<!--Chat--> 
<script type="text/javascript" src="js/vendors/todos/todos.js"></script> 

<!--Main App--> 
<script type="text/javascript" src="js/scripts.js"></script> 

<!--/Scripts-->

</body>
</html><?php
ob_flush();
?>