<?php
session_start();
$username='';
$usertype='';
if(isset($_SESSION['username']))
{
	include('config.php');
	$usertype=$_SESSION['usertype'];
	$username=$_SESSION['username'];
	
	$CheckStatus=mysqli_query($con,"select * from userlogin where User_Name='$username' and UserType=$usertype");
	if(mysqli_num_rows($CheckStatus)>0)
	{
		while($Checkrow=mysqli_fetch_array($CheckStatus))
		{
			if($Checkrow['Status']=='0')	
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
<meta name="author" content="M&P Soft Technology & Solutions Pvt Ltd">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Profile Setting | Forms</title>
<link href="css/styles.css" rel="stylesheet" type="text/css">


<script type="text/javascript" src="js/vendors/modernizr/modernizr.custom.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<!--ajax to chech user avaibility-->
<script type='text/javascript' src='js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css" />
<script type="text/javascript">
$(document).ready(function()
{
$(".username").change(function()
{
var dataString = 'tin='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_checkexe.php",
data: dataString,
cache: false,
success: function(html)
{
$(".tincheck").html(html);
}
});
});
});
</script>
<!--End ajax to chech user avaibility-->
</head>

<body>

<!--Smooth Scroll-->
<div class="smooth-overflow">
<!--Navigation-->
    <nav class="main-header clearfix" role="navigation"> <a class="navbar-brand" href="home.php"><span class="text-blue">ERP</span></a> 
      
      <!--Search-->
      
      
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
              <div class="list-group">  <a data-toggle="modal" href="logout.php" class="list-group-item goaway"><i class="fa fa-power-off"></i> Sign Out</a> </div>
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
      <?php
	  include('side-menu.php');
	  ?>
      </div>
      <!--/MainMenu-->
      
      <!--Content Wrapper-->
      <div class="content-wrapper"> 
        <!--Horisontal Dropdown-->
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
            <li class="active">Profile Setting</li>
          </ul>
        </div>
        <!--/Breadcrumb-->
        
        <div class="page-header">
          <h1>Profile Setting<small>form</small></h1>
        </div>
        
        <!-- Widget Row Start grid -->
        <div class="row" id="powerwidgets">
          
          <?php if(isset($_REQUEST['save'])) {
		
		    //$_REQUEST['executive']
			$executive=explode('-',$_REQUEST['executive']);
		
			$selectp=mysqli_query($con,"select * from profilesetting where User_id='$executive[0]'");
			if(mysqli_fetch_row($selectp)>0)
			{
				$updatep=mysqli_query($con,"update profilesetting set group_master='$_REQUEST[group_m]',"
                                        . "item_master='$_REQUEST[item_m]',pro_master='$_REQUEST[production_m]',"
                                        . "state_master='$_REQUEST[state_m]',mrp_master='$_REQUEST[mrp_m]',exe_master='$_REQUEST[executive_m]',"
                                        . "dealer_master='$_REQUEST[dealer_m]',new_order='$_REQUEST[new_order]',report_master='$_REQUEST[report_m]',edit_po='$_REQUEST[edit_po]',"
                                        . "approve_po='$_REQUEST[approve_po]',reject_po='$_REQUEST[reject_po]',delete_po='$_REQUEST[delete_po]',confirm_po='$_REQUEST[confirm_po]',"
                                        . "packing_list='$_REQUEST[packinglist_po]',edit_approve_order='$_REQUEST[edit_approve_do]',view_order='$_REQUEST[view_oreder]' where User_id='$executive[0]'");	
					if($updatep==1)
					{
						echo "<script>alert('Successfully Update');document.location='profile-setting.php';</script>";	
					}
					else
					{
						echo "<script>alert('Not Update. Try Again');document.location='profile-setting.php';</script>";		
					}
			}
			else
			{
                                
				$insertp=mysqli_query($con,"insert into profilesetting(User_id,group_master,item_master,pro_master,"
                                        . "state_master,mrp_master,exe_master,dealer_master,new_order,report_master,edit_po,approve_po,reject_po,delete_po,"
                                        . "confirm_po,packing_list,edit_approve_order,view_order) values('$executive[0]','$_REQUEST[group_m]','$_REQUEST[item_m]',"
                                        . "'$_REQUEST[production_m]','$_REQUEST[state_m]','$_REQUEST[mrp_m]','$_REQUEST[executive_m]',"
                                        . "'$_REQUEST[dealer_m]','$_REQUEST[new_order]','$_REQUEST[report_m]','$_REQUEST[edit_po]','$_REQUEST[approve_po]','$_REQUEST[reject_po]',"
                                        . "'$_REQUEST[delete_po]','$_REQUEST[confirm_po]','$_REQUEST[packinglist_po]','$_REQUEST[edit_approve_do]','$_REQUEST[view_oreder]')");
				
				if($insertp==1)
				{
					echo "<script>alert('Successfully Set Profile Setting');document.location='profile-setting.php';</script>";		
				}
				else
				{
					echo "<script>alert('Try Again');document.location='profile-setting.php';</script>";		
				}
			}
	}
	?>
          <!-- New widget -->
          <div class="col-md-6  bootstrap-grid">
            <div class="powerwidget green" id="most-form-elements" data-widget-editbutton="false">
              
              <div class="inner-spacer">
                <form action="profile-setting.php" method="post">
        <table class="table table-striped">
        	<tr><td>Select Executive</td><td>
            <section>
                      
                      <label class="input">
                        <input type="text" list="list" name="executive">
                        <datalist id="list">
                          <?php
						$select_executive_repl=mysqli_query($con,"select * from userregistration where UserType !='5'");
						while($select_executive_repl_row=mysqli_fetch_array($select_executive_repl))
						{
						?>
                          <option value="<?php echo $select_executive_repl_row['username']." - ".$select_executive_repl_row['Name'];?>"></option>
                          <?php
						  }
						  ?>
                        </datalist>
                      </label>
                      <div class="note"><strong>Note:</strong> works in Chrome, Firefox, Opera and IE10.</div>
                    </section>
            </td></tr>
            <tr><td>Group Master</td><td><input type="radio" name="group_m" value="1" />&nbsp;&nbsp;Yes &nbsp;&nbsp;<input type="radio" name="group_m" value="0" checked/>&nbsp;&nbsp;No</td></tr>
            <tr><td>Item Master</td><td><input type="radio" name="item_m" value="1" />&nbsp;&nbsp;Yes &nbsp;&nbsp;<input type="radio" name="item_m" value="0" checked/>&nbsp;&nbsp;No</td></tr>
            <tr><td>Production Master</td><td><input type="radio" name="production_m" value="1" />&nbsp;&nbsp;Yes &nbsp;&nbsp;<input type="radio" name="production_m" value="0" checked/>&nbsp;&nbsp;No</td></tr>
            <tr><td>State Master</td><td><input type="radio" name="state_m" value="1" />&nbsp;&nbsp;Yes &nbsp;&nbsp;<input type="radio" name="state_m" value="0" checked/>&nbsp;&nbsp;No</td></tr>
            <tr><td>MRP Master</td><td><input type="radio" name="mrp_m" value="1" />&nbsp;&nbsp;Yes &nbsp;&nbsp;<input type="radio" name="mrp_m" value="0" checked/>&nbsp;&nbsp;No</td></tr>
            <tr><td>Executive Master</td><td><input type="radio" name="executive_m" value="1" />&nbsp;&nbsp;Yes &nbsp;&nbsp;<input type="radio" name="executive_m" value="0" checked/>&nbsp;&nbsp;No</tr>
            <tr><td>Dealer Master</td><td><input type="radio" name="dealer_m" value="1" />&nbsp;&nbsp;Yes &nbsp;&nbsp;<input type="radio" name="dealer_m" value="0" checked/>&nbsp;&nbsp;No</td></tr>
            <tr><td>Order Entry Master</td><td><input type="radio" name="new_order" value="1" />&nbsp;&nbsp;Yes &nbsp;&nbsp;<input type="radio" name="new_order" value="0" checked/>&nbsp;&nbsp;No</td></tr>
            <tr><td>Report Master</td><td><input type="radio" name="report_m" value="1" />&nbsp;&nbsp;Yes &nbsp;&nbsp;<input type="radio" name="report_m" value="0" checked/>&nbsp;&nbsp;No</td></tr>
            <tr><td>Order Setting</td><td>Edit Pending Order &nbsp;&nbsp<input type="radio" name="edit_po" value="1" />&nbsp;&nbsp;Yes &nbsp;&nbsp;<input type="radio" name="edit_po" value="0" checked/>&nbsp;&nbsp;No<br />
                    Approve Pending Order&nbsp;&nbsp<input type="radio" name="approve_po" value="1" />&nbsp;&nbsp;Yes &nbsp;&nbsp;<input type="radio" name="approve_po" value="0" checked/>&nbsp;&nbsp;No<br />
                    Reject Pending Order&nbsp;&nbsp<input type="radio" name="reject_po" value="1" />&nbsp;&nbsp;Yes &nbsp;&nbsp;<input type="radio" name="reject_po" value="0" checked/>&nbsp;&nbsp;No<br />
                    Delete Pending Order&nbsp;&nbsp<input type="radio" name="delete_po" value="1" />&nbsp;&nbsp;Yes &nbsp;&nbsp;<input type="radio" name="delete_po" value="0" checked/>&nbsp;&nbsp;No<br />
                    Confirm Pending Order&nbsp;&nbsp<input type="radio" name="confirm_po" value="1" />&nbsp;&nbsp;Yes &nbsp;&nbsp;<input type="radio" name="confirm_po" value="0" checked/>&nbsp;&nbsp;No<br />
                    Packing List&nbsp;&nbsp<input type="radio" name="packinglist_po" value="1" />&nbsp;&nbsp;Yes &nbsp;&nbsp;<input type="radio" name="packinglist_po" value="0" checked/>&nbsp;&nbsp;No<br/>
                    Edit Approve Order&nbsp;&nbsp<input type="radio" name="edit_approve_do" value="1" />&nbsp;&nbsp;Yes &nbsp;&nbsp;<input type="radio" name="edit_approve_do" value="0" checked/>&nbsp;&nbsp;No</td>
        </tr>
        <tr><td>Order List</td><td><input type="radio" name="view_oreder" value="1" />&nbsp;&nbsp;Yes &nbsp;&nbsp;<input type="radio" name="view_oreder" value="0" checked/>&nbsp;&nbsp;No</td></tr>
            <tr><td><input type="submit" name="save" value="Profile" /></td><td><a href="home.php">Back</a></td></tr>
            <div id="execon" class="execon"></div>
        </table>
        </form>
              </div>
            </div>
          </div>
          
         
          
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

<!--Demo Script for File Input Fields.-->
<script>
    $(function() {
        $('input[type="file"]').change(function() {
            $(this).parent().next().val($(this).val());
        });
    });
</script>

<!--Fullscreen--> 
<script type="text/javascript" src="js/vendors/fullscreen/screenfull.min.js"></script> 

<!--Forms--> 
<script type="text/javascript" src="js/vendors/forms/jquery.form.min.js"></script> 
<script type="text/javascript" src="js/vendors/forms/jquery.validate.min.js"></script> 
<script type="text/javascript" src="js/vendors/forms/jquery.maskedinput.min.js"></script> 

<!--NanoScroller--> 
<script type="text/javascript" src="js/vendors/nanoscroller/jquery.nanoscroller.min.js"></script> 

<!--Sparkline--> 
<script type="text/javascript" src="js/vendors/sparkline/jquery.sparkline.min.js"></script> 

<!--Horizontal Dropdown--> 
<script type="text/javascript" src="js/vendors/horisontal/cbpHorizontalSlideOutMenu.js"></script> 
<script type="text/javascript" src="js/vendors/classie/classie.js"></script> 

<!--PowerWidgets--> 
<script type="text/javascript" src="js/vendors/powerwidgets/powerwidgets.min.js"></script> 

<!--Bootstrap--> 
<script type="text/javascript" src="js/vendors/bootstrap/bootstrap.min.js"></script> 

<!--ToDo--> 
<script type="text/javascript" src="js/vendors/todos/todos.js"></script> 

<!--Main App--> 
<script type="text/javascript" src="js/scripts.js"></script>



<!--/Scripts-->

</body>
</html>