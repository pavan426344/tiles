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
         
       <br/>
         <?php
         if($usertype!=1)
         {   
         ?>
           <div class="powerwidget" id="datatable-basic-init" data-widget-editbutton="false">
                 <header>
                <h2>Pending Order<small>For Approve</small></h2>
              </header>
              <div class="inner-spacer">
                  <div class="table-responsive">
                <div class="table-responsive">
                    <table class="display table table-striped table-hover" id="table-1">
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
     
			 $select_do=mysqli_query($con,"select * from finalsales where NextConfirm='$username' and Confirm=0");
			 $total_amount=0;
		   $total_box=0;
			while($select_do_row=mysqli_fetch_array($select_do))
			{
			?>
                        <tr>
                       
                        <td>
                            
                            <a href="poview-gst.php?dono=<?php echo $select_do_row['doid']; ?>" target="_blank"><?php echo $select_do_row['doid']; ?></a></td>
             
       
                          <td><?php echo $select_do_row['dodate']; ?></td>
                          <td><?php echo $select_do_row['Dealer_Name']; ?></td>
                          <?php $dealer=mysqli_query($con,"select * from dealer where Dealer_id='$select_do_row[dealer_id]'"); 
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
                      
                    </table>
                  </div>
                  </div>
              </div>
            </div>
            <!-- End .powerwidget --> 
            
            <!-- New widget -->
            <div class="powerwidget" id="datatable-filter-column" data-widget-editbutton="false">
              <header>
                <h2> Approved<small>Order</small></h2>
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
     
			 $select_do=mysqli_query($con,"select * from approvesales where confirm=0");
			 $total_amount=0;
		   $total_box=0;
			while($select_do_row=mysqli_fetch_array($select_do))
			{
			?>
                        <tr>
                       
                        <td>
                            
                            <a href="doview-gst.php?dono=<?php echo $select_do_row['doid']; ?>" target="_blank"><?php echo $select_do_row['doid']; ?></a></td>
             
       
                          <td><?php echo $select_do_row['dodate']; ?></td>
                          <td><?php echo $select_do_row['Dealer_Name']; ?></td>
                          <?php $dealer=mysqli_query($con,"select * from dealer where Dealer_id='$select_do_row[dealer_id]'"); 
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
                      
                    </table>
                  </div>    
              </div>
            </div>
            <!-- End .powerwidget -->
            <div class="powerwidget" id="datatable-basic-init" data-widget-editbutton="false">
                 <header>
                <h2>Rejected Order<small></small></h2>
              </header>
              <div class="inner-spacer">
                  <div class="table-responsive">
                <div class="table-responsive">
                    <table class="display table table-striped table-hover" id="table-3">
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
     
			 $select_do=mysqli_query($con,"select * from finalsales where confirm=0 and status='0'");
			 $total_amount=0;
		   $total_box=0;
			while($select_do_row=mysqli_fetch_array($select_do))
			{
			?>
                        <tr>
                       
                        <td>
                            
                            <a href="rejected-order.php?dono=<?php echo $select_do_row['doid']; ?>" target="_blank"><?php echo $select_do_row['doid']; ?></a></td>
             
       
                          <td><?php echo $select_do_row['dodate']; ?></td>
                          <td><?php echo $select_do_row['Dealer_Name']; ?></td>
                          <?php $dealer=mysqli_query($con,"select * from dealer where Dealer_id='$select_do_row[dealer_id]'"); 
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
                      
                    </table>
                  </div>
                  </div>
              </div>
            </div>
            
      <?php
         }
      ?>
             <?php
         if($usertype==1)
         {   
         ?>
           <div class="powerwidget" id="datatable-basic-init" data-widget-editbutton="false">
                 <header>
                <h2>Pending Order<small>For Approve</small></h2>
              </header>
              <div class="inner-spacer">
                  <div class="table-responsive">
                <div class="table-responsive">
                    <table class="display table table-striped table-hover" id="table-1">
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
     
			 $select_do=mysqli_query($con,"select * from finalsales where User_id='$username' and confirm=0 and status='1'");
			 $total_amount=0;
		   $total_box=0;
			while($select_do_row=mysqli_fetch_array($select_do))
			{
			?>
                        <tr>
                       
                        <td>
                            
                            <a href="poview-gst.php?dono=<?php echo $select_do_row['doid']; ?>" target="_blank"><?php echo $select_do_row['doid']; ?></a></td>
             
       
                          <td><?php echo $select_do_row['dodate']; ?></td>
                          <td><?php echo $select_do_row['Dealer_Name']; ?></td>
                          <?php $dealer=mysqli_query($con,"select * from dealer where Dealer_id='$select_do_row[dealer_id]'"); 
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
                      
                    </table>
                  </div>
                  </div>
              </div>
            </div>
            <!-- End .powerwidget --> 
            
            <!-- New widget -->
            <div class="powerwidget" id="datatable-filter-column" data-widget-editbutton="false">
              <header>
                <h2> Approved<small>Order</small></h2>
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
     
			 $select_do=mysqli_query($con,"select * from approvesales where User_id='$username' and confirm=0");
			 $total_amount=0;
		   $total_box=0;
			while($select_do_row=mysqli_fetch_array($select_do))
			{
			?>
                        <tr>
                       
                        <td>
                            
                            <a href="doview-gst.php?dono=<?php echo $select_do_row['doid']; ?>" target="_blank"><?php echo $select_do_row['doid']; ?></a></td>
             
       
                          <td><?php echo $select_do_row['dodate']; ?></td>
                          <td><?php echo $select_do_row['Dealer_Name']; ?></td>
                          <?php $dealer=mysqli_query($con,"select * from dealer where Dealer_id='$select_do_row[dealer_id]'"); 
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
                      
                    </table>
                  </div>    
              </div>
            </div>
            <!-- End .powerwidget --> 
            <div class="powerwidget" id="datatable-basic-init" data-widget-editbutton="false">
                 <header>
                <h2>Rejected Order<small></small></h2>
              </header>
              <div class="inner-spacer">
                  <div class="table-responsive">
                <div class="table-responsive">
                    <table class="display table table-striped table-hover" id="table-3">
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
     
			 $select_do=mysqli_query($con,"select * from finalsales where User_id='$username' and confirm=0 and status='0'");
			 $total_amount=0;
		   $total_box=0;
			while($select_do_row=mysqli_fetch_array($select_do))
			{
			?>
                        <tr>
                       
                        <td>
                            
                            <a href="poview-gst.php?dono=<?php echo $select_do_row['doid']; ?>" target="_blank"><?php echo $select_do_row['doid']; ?></a></td>
             
       
                          <td><?php echo $select_do_row['dodate']; ?></td>
                          <td><?php echo $select_do_row['Dealer_Name']; ?></td>
                          <?php $dealer=mysqli_query($con,"select * from dealer where Dealer_id='$select_do_row[dealer_id]'"); 
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
                      
                    </table>
                  </div>
                  </div>
              </div>
            </div>
        
      <?php
         }
      ?>
            <?php
         if($usertype==7)
         {   
         ?>
         
            <div class="powerwidget" id="datatable-filter-column" data-widget-editbutton="false">
              <header>
                <h2>Sales<small>Order</small></h2>
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
     
			 $select_do=mysqli_query($con,"select * from approvesales where confirm=1");
			 $total_amount=0;
		   $total_box=0;
			while($select_do_row=mysqli_fetch_array($select_do))
			{
			?>
                        <tr>
                       
                        <td>
                            
                            <a href="doview-gst.php?dono=<?php echo $select_do_row['doid']; ?>" target="_blank"><?php echo $select_do_row['doid']; ?></a></td>
             
       
                          <td><?php echo $select_do_row['dodate']; ?></td>
                          <td><?php echo $select_do_row['Dealer_Name']; ?></td>
                          <?php $dealer=mysqli_query($con,"select * from dealer where Dealer_id='$select_do_row[dealer_id]'"); 
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
                      
                    </table>
                  </div>    
              </div>
            </div>
           
        
      <?php
         }
      ?>
            <?php
         if($usertype==8)
         {   
         ?>
          <div class="powerwidget" id="datatable-basic-init" data-widget-editbutton="false">
                 <header>
                <h2>Pending Order<small>For Approve</small></h2>
              </header>
              <div class="inner-spacer">
                  <div class="table-responsive">
                <div class="table-responsive">
                    <table class="display table table-striped table-hover" id="table-1">
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
     
			 $select_do=mysqli_query($con,"select * from finalsales where confirm=0 and status='1'");
			 $total_amount=0;
		   $total_box=0;
			while($select_do_row=mysqli_fetch_array($select_do))
			{
			?>
                        <tr>
                       
                        <td>
                            
                            <a href="poview-gst.php?dono=<?php echo $select_do_row['doid']; ?>" target="_blank"><?php echo $select_do_row['doid']; ?></a></td>
             
       
                          <td><?php echo $select_do_row['dodate']; ?></td>
                          <td><?php echo $select_do_row['Dealer_Name']; ?></td>
                          <?php $dealer=mysqli_query($con,"select * from dealer where Dealer_id='$select_do_row[dealer_id]'"); 
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
                      
                    </table>
                  </div>
                  </div>
              </div>
            </div>
            <div class="powerwidget" id="datatable-filter-column" data-widget-editbutton="false">
              <header>
                <h2>Sales<small>Order</small></h2>
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
     
			 $select_do=mysqli_query($con,"select * from approvesales where confirm=1");
			 $total_amount=0;
		   $total_box=0;
			while($select_do_row=mysqli_fetch_array($select_do))
			{
			?>
                        <tr>
                       
                        <td>
                            
                            <a href="doview-gst.php?dono=<?php echo $select_do_row['doid']; ?>" target="_blank"><?php echo $select_do_row['doid']; ?></a></td>
             
       
                          <td><?php echo $select_do_row['dodate']; ?></td>
                          <td><?php echo $select_do_row['Dealer_Name']; ?></td>
                          <?php $dealer=mysqli_query($con,"select * from dealer where Dealer_id='$select_do_row[dealer_id]'"); 
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
                      
                    </table>
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