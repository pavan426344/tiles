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
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ERP | Grade Table</title>
<link href="css/styles.css" rel="stylesheet" type="text/css">

<!--<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />-->
<script type="text/javascript" src="js/vendors/modernizr/modernizr.custom.js"></script>
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
                <h1><?php echo $_SESSION['username']; ?><small></small></h1>
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
            <li><a href="#">Dashboard</a></li>
            <li class="active">Grade Table</li>
          </ul>
        </div>
        <!--/Breadcrumb-->
        
        <div class="page-header">
          <h1>Grade<small>Table  
</small></h1>
        </div>
       <?php  
		if(isset($_REQUEST['updid']))
		{       
                        $data_value="";  
                        $get_data_t=mysqli_query($con,"select * from t_grade where T_Grade_Id=$_REQUEST[updid]");
                        while($get_data_t_row=mysqli_fetch_array($get_data_t))
                        {
                            $data_value=$get_data_t_row['T_Grade_Name'];
                        }
                        $check_result_item=mysqli_query($con,"select * from t_item where T_Grade='$data_value'");
                        if(mysqli_num_rows($check_result_item)>0)
                        {
                             echo "<script>alert('Error In Update.Used In Another Table.');document.location='view-grade.php';</script>";
                        }
                        else 
                        {
                        $check_result_item=mysqli_query($con,"select * from t_grade where T_Grade_Seq_No='$_REQUEST[seq_no]'");
                        if(mysqli_num_rows($check_result_item)>0)
                        {
                             echo "<script>alert('Sequence No Is Present.Try Another.');document.location='add-grade.php?editid=".$_REQUEST['updid']."';</script>";
                        }
                        else 
                        {
			$updatedesign=mysqli_query($con,"update t_grade set T_Grade_Name='$_REQUEST[grade]',T_Grade_Seq_No='$_REQUEST[seq_no]' where T_Grade_Id=$_REQUEST[updid]");
			
			if($updatedesign==1)	
			{
				echo "<script>alert('Successfully Update');document.location='view-grade.php';</script>";	
			}
                        }
                        }
		}
		if(isset($_REQUEST['delid'])){
                       $data_value="";  
                        $get_data_t=mysqli_query($con,"select * from t_grade where T_Grade_Id=$_REQUEST[delid]");
                        while($get_data_t_row=mysqli_fetch_array($get_data_t))
                        {
                            $data_value=$get_data_t_row['T_Grade_Name'];
                        }
                        $check_result_item=mysqli_query($con,"select * from t_item where T_Grade='$data_value'");
                        if(mysqli_num_rows($check_result_item)>0)
                        {
                             echo "<script>alert('Error In Delete.Used In Another Table.');document.location='view-grade.php';</script>";
                        }
                        else 
                        {
			$delete=mysqli_query($con,"delete from t_grade where T_Grade_Id=$_REQUEST[delid]");
			if($delete==1)
			{
				echo "<script>alert('Successfully Delete');document.location='view-grade.php';</script>";	
			}
                        }
			} ?>

        
        <!-- Widget Row Start grid -->
        <div class="row" id="powerwidgets">
          <div class="col-md-12 bootstrap-grid"> 
            
            <!-- New widget -->
            
            
            <!-- End .powerwidget --> 
            
            <!-- New widget -->
            <div class="powerwidget" id="datatable-filter-column" data-widget-editbutton="false">
             
              <div class="inner-spacer">
                <table class="display table table-striped table-hover" id="table-2">
                  <thead>
                    <tr>
                      <th>Company Name</th>  
                      <th>Grade Name</th>
                      <th>Sequence No.</th>
                      <th>Edit</th>
                      <th>Delete</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php $select=mysqli_query($con,"select * from t_grade where status='1'");
	   while($rowselect=mysqli_fetch_array($select))
	   {
	 ?>
    	<tr>
            <td><?php echo $rowselect['T_Company_Name']; ?></td>	
            <td><?php echo $rowselect['T_Grade_Name']; ?></td>
            <td><?php echo $rowselect['T_Grade_Seq_No']; ?></td>
           
            <td width="20"><a href="add-grade.php?editid=<?php echo $rowselect['T_Grade_Id']; ?>">EDIT</a></td>
            <td width="20" align="center" valign="middle"><a href="view-grade.php?delid=<?php echo $rowselect['T_Grade_Id']; ?>" class="ask">DELETE</a></td>
        </tr>
        <?php
	   }
		?>

                    
                  </tbody>
                  <tfoot>
                  <td colspan="3"><a href="add-grade.php"><b>Add New</b></a></td>    
                  </tfoot>
                </table>
              </div>
            </div>
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