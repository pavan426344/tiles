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
				echo "<script>document.location='index.php?ses=frr';</script>";			
			}
		}
	}
	else
	{
		echo "<script>document.location='index.php?ses=frr';</script>";	
	}
}
else
{
	echo "<script>document.location='index.php?ses=frr';</script>";
}
?>
<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="keywords" content="admin template, admin dashboard, inbox templte, calendar template, form validation">
<meta name="author" content="DazeinCreative">
<meta name="description" content="ORB - Powerfull and Massive Admin Dashboard Template with tonns of useful features">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ERP | Sales Reports</title>
<link href="css/styles.css" rel="stylesheet" type="text/css">

<!--<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />-->
<script type="text/javascript" src="js/vendors/modernizr/modernizr.custom.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type='text/javascript' src='js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css" />
<script type="text/javascript">
$().ready(function() {
    $("#executive").autocomplete("ajax_executive.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<script type="text/javascript">
$().ready(function() {
    $("#dealer").autocomplete("ajax_dealer.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<script language="JavaScript">

   function toggle(rowtoshow,totalrows)
     {
         //first hide all rows
         for (i=1;i<totalrows+1;i++)
         {
        eval("document.getElementById(\"therow"+i+"\").style.display='none'");
        }
         //now see which row to show
         if (rowtoshow!="") {     
             obj=document.getElementById("therow"+rowtoshow);
             obj.style.display='';
             }
     }
    </script>
</head>

<body>

<!--Smooth Scroll-->
<div class="smooth-overflow">
<!--Navigation-->
    <nav class="main-header clearfix" role="navigation"> <a class="navbar-brand" href="index.html"><span class="text-blue">ERP</span></a> 
      
     
      
      
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
              <div class="list-group">   
                
                  
                
                 <a data-toggle="modal" href="logout.php" class="list-group-item goaway"><i class="fa fa-power-off"></i> Sign Out</a> </div>
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
            <li><a href="home.php">Dashboard</a></li>
            <li class="active">Sales Reports</li>
          </ul>
        </div>
        <!--/Breadcrumb-->
        
        <div class="page-header">
          <h1>Sales<small>Reports  
</small></h1>
        </div>
        
        <!-- Widget Row Start grid -->
        <div class="row" id="powerwidgets">
          <div class="col-md-12 bootstrap-grid"> 
            
            <!-- New widget -->
            
            <form action="sales-reports.php" method="post">
            <!-- End .powerwidget --> 
            <table align="center" border="0" class="table table-striped">
    <tr>
    	<td colspan="2"><font size="+1">Search Type :- </font>
        <select name="sel1" onchange="toggle(this.value,7)">
<option value="">--Select Your Choice--</option>
<option value="1">Select All</option>
<option value="2">By State</option>
<option value="3">By Sales Order No</option>
<option value="4">By Date</option>
<option value="5">By Dealer</option>
<option value="6">By Executive</option>
<option value="7">By TIN</option>
</select></td>
    </tr>
    
    <tr id="therow1" colspan="2" style="display:none"><td>Select ALL &nbsp;&nbsp;<input type="checkbox" name="all"  /></td></tr>
    <tr id="therow2" style="display:none">
    	<td colspan="2">By State &nbsp;&nbsp;<select name="state"><option value="">Select</option><option value="Karnataka">Karnataka</option><option value="Andhra Pradesh">Andhra Pradesh</option><option value="Kerala">Kerala</option><option value="Tamil Nadu">Tamil Nadu</option></select></td>
    </tr>
    <tr id="therow3" style="display:none">
    <td colspan="2">By Sales Order No&nbsp;&nbsp;<input type="text" name="sono" /></td>
    </tr>
    <tr id="therow4" style="display:none">
    <td colspan="2">By Date&nbsp;&nbsp;<input type="text" name="date" />YYYY-MM-DD <input type="text" name="date1" />YYYY-MM-DD</td>
    </tr>
    <tr id="therow5" style="display:none">
    <td colspan="2">By Dealer &nbsp;&nbsp;<input type="text" name="dealer" id="dealer" class="dealer"  /></td>
    </tr>
    <tr id="therow6" style="display:none"><td colspan="2">By Executive &nbsp;&nbsp;<input type="text" name="executive" id="executive" class="executive" /></td>
    </tr>
   	 <tr id="therow7" style="display:none" ><td colspan="2">By TIN &nbsp;&nbsp;<input type="text" name="tin" id="tin" class="tin" /></td>
    </tr>
    <tr><td  colspan="2"><input type="submit" name="Search" value="Find" /></td></tr>
    </table>
            </form>
            <!-- New widget -->
             <?php if(isset($_REQUEST['Search'])) 
   				{
	   		 ?>
              
            <div class="powerwidget" id="datatable-filter-column" data-widget-editbutton="false">
             
              <div class="inner-spacer">
              <div class="table-responsive">
                <table class="display table table-striped table-hover" id="table-2">
                  <thead>
                    <tr>
                      <th>Sr.No</th>  
                      <th>SO NO.</th>
                      <th>DO Date</th>
                      <th>Name of Dealer</th>
                      <th>Party Centre</th>
                      
                      <th>Contact Person</th>
                      <th>Contact No</th>
                      <th>Total Box</th>
                      <th>Total Amount</th>
                      <th>Executive</th>
                      <th>So Date</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
		   $sr=1;
                   $total_box1=0;
                   $total_am=0;
		   if($_REQUEST['state']!="")
		  { 
		    // echo "select * from finalsales where Confirm='1' and State='$_REQUEST[state]' ORDER BY FinalSales_id DESC";
			  $selectpo=mysqli_query($con,"select * from finalsales where Confirm='1' and State='$_REQUEST[state]' ORDER BY FinalSales_id DESC"); 
		  }
		  else if($_REQUEST['sono']!="")
		  {
			//  echo "select * from finalsales where Confirm='1' and doid='$_REQUEST[sono]' ORDER BY FinalSales_id DESC";
			  $selectpo=mysqli_query($con,"select * from finalsales where Confirm='1' and doid='$_REQUEST[sono]' ORDER BY FinalSales_id DESC"); 
		  }
		  else if($_REQUEST['date']!=""&&$_REQUEST['date1']!="")
		  {
                       echo "<b>Data Display From SO Date ".$_REQUEST['date']." To SO Date ".$_REQUEST['date1']."<b><br/>";
                       
			//  echo "select * from finalsales where Confirm='1' and dodate between '$_REQUEST[date]' and '$_REQUEST[date1]' ORDER BY FinalSales_id DESC";
			  $selectpo=mysqli_query($con,"select * from finalsales where Confirm='1' and sodate>='$_REQUEST[date]' and sodate<='$_REQUEST[date1]'"); 
		  }
		   else if($_REQUEST['dealer']!="")
		  {
			//  echo "select * from finalsales where Confirm='1' and Dealer_Name='$_REQUEST[dealer]' ORDER BY FinalSales_id DESC";
			  $selectpo=mysqli_query($con,"select * from finalsales where Confirm='1' and Dealer_Name='$_REQUEST[dealer]' ORDER BY FinalSales_id DESC"); 
		  }
		   else if($_REQUEST['executive']!="")
		  {   
		     // echo "select * from finalsales where Confirm='1' and executive='$_REQUEST[executive]' ORDER BY FinalSales_id DESC";
			  $selectpo=mysqli_query($con,"select * from finalsales where Confirm='1' and executive='$_REQUEST[executive]' ORDER BY FinalSales_id DESC"); 
		  }
		   else if($_REQUEST['tin']!="")
		  {
			//  echo "select * from finalsales where Confirm='1' and Dealer_Tin='$_REQUEST[tin]' ORDER BY FinalSales_id DESC";
			  $selectpo=mysqli_query($con,"select * from finalsales where Confirm='1' and Dealer_Tin='$_REQUEST[tin]' ORDER BY FinalSales_id DESC"); 
		  }
		  else
		  {
			 
             	$selectpo=mysqli_query($con,"select * from finalsales where Confirm='1' ORDER BY FinalSales_id DESC"); 
		  }
		  
		 
			while($rowdo=mysqli_fetch_array($selectpo))
			{
		?>
        <tr>
            <td><?php echo $sr;?></td>
            <?php 
                         $today1 = date('d-m-Y',time()); 
                         $today = $rowdo['Date']; 
       $exp = date('d-m-Y',strtotime('15-11-2017')); //query result form database
       $expDate =  date_create($exp);
       $todayDate = date_create($today);
       $diff =  date_diff($todayDate, $expDate);
       if($diff->format("%R%a")>0){
             ?>
        	<td><a href="dosales.php?dono=<?php echo $rowdo['doid']; ?>" target="_blank"><?php echo $rowdo['doid']; ?></a></td>
            <?php
       }
       else
       {    
            ?>
               <td><a href="dosales-gst.php?dono=<?php echo $rowdo['doid']; ?>" target="_blank"><?php echo $rowdo['doid']; ?></a></td> 
          <?php
       }
          ?>
            <td><?php echo $rowdo['Date']; ?></td>
            <td><?php echo $rowdo['Dealer_Name']; ?></td>
            <?php $dealer=mysqli_query($con,"select * from dealer where TIN='$rowdo[Dealer_Tin]' limit 0,1"); 
				while($rowdealer=mysqli_fetch_array($dealer))
				{
                                
     
			?>
                <td><?php echo $rowdealer['centre'];  ?></td>
                <td><?php echo $rowdealer['Name']; ?></td>
                <td align="center"><?php echo $rowdealer['Mobile']; ?></td>
    <?php 
    
    } ?>
             <?php
             $total_box1=$total_box1+$rowdo['Totalbox'];
              
             ?>
            <td align="center"><?php echo $rowdo['Totalbox']; ?></td>
            <?php
            $total_am=$total_am+$rowdo['roundoff'];
            ?>
            <td align="right"><?php echo $rowdo['roundoff']; ?></td>
            <td><?php echo $rowdo['User_id']; ?></td>
            <td><?php echo $rowdo['sodate']; ?></td>
        </tr>
             <?php 
               $sr++;
		  }
		  
			
		  
		?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Total</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th><?php echo $total_box1." Boxes";?></th>
                      <th><?php echo "Rs. ".$total_am;?></th>
                      <th></th>
                      <th></th>
                      
                    </tr>
                  </tfoot>
                </table>
                </div>
              </div>
            </div>
          	
			<?php
   				}
		  	?>  
            <!-- End .powerwidget --> 
            
            <!-- New widget -->
            
            <!-- End .powerwidget --> 
            
          </div>
          <!-- /Inner Row Col-md-12 --> 
        </div>
        <!-- /Widgets Row End Grid--> 
      </div>
      <!-- / Content Wrapper --> 
    </div>
    <!--/MainWrapper--> 
  </div>
<!--/Smooth Scroll--> 


<!-- scroll top -->
<div class="scroll-top-wrapper hidden-xs">
    <i class="fa fa-angle-up"></i>
</div>
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
</html>
<?php
ob_flush();
?>