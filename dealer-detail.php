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
if(isset($_REQUEST['did']))
        { 
 }
 else {
     echo "<script>document.location='home.php';</script>";
 }
if(isset($_REQUEST['cid']))
{
   
   $update_cheque=mysqli_query($con,"update dealer_security_cheque set status=$_REQUEST[u] where dealer_security_cheque_id=$_REQUEST[cid]"); 
    
}
if(isset($_REQUEST['sc_did']))
{
 $delete_security_cheque=mysqli_query($con,"delete from dealer_security_cheque where dealer_security_cheque_id=$_REQUEST[sc_did]");   
}

?>

<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ERP | Dealer Detail</title>
<link href="css/styles.css" rel="stylesheet" type="text/css">

<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<script type="text/javascript" src="js/vendors/modernizr/modernizr.custom.js"></script>
</head>

<body>

<!--Smooth Scroll-->
<div class="smooth-overflow">
<!--Navigation-->
    <nav class="main-header clearfix" role="navigation"> <a class="navbar-brand" href="home.php"><span class="text-blue">ERP</span></a> 
      
      <!--Search-->
      
      
      <!--Navigation Itself-->
      
      
    </nav>
    
    <!--/Navigation--> 
    
    <!--MainWrapper-->
    <div class="main-wrap"> 
      
      <!--OffCanvas Menu -->
      
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
            <li class="active">Data</li>
          </ul>
        </div>
        <!--/Breadcrumb-->
        
        <div class="page-header">
          <h1>Dealer<small>Detail</small></h1>
        </div>
        
        <!-- Widget Row Start grid -->
        <?php
           
        $select_dealer=mysqli_query($con,"select * from dealer where Dealer_id='$_REQUEST[did]'");
        while($select_dealer_row=mysqli_fetch_array($select_dealer))
        {
        ?>
        <div class="row" id="powerwidgets">
          <div class="col-md-12 bootstrap-grid"> 
            
            <!-- New widget -->
            
            <div class="powerwidget cold-grey" id="profile" data-widget-editbutton="false">
              
              <div class="inner-spacer"> 
                
                <!--Profile-->
                <div class="user-profile">
                  <div class="main-info">
                    <br/><br/><br/><br/>
                    <h1><?php echo $select_dealer_row['CompanyName'];?></h1>
                    </div>
                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="item item1 active"> </div>
                      <div class="item item2"></div>
                      <div class="item item3"></div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a> </div>
                  <div class="user-profile-info">
                    <div class="tabs-white">
                      <ul id="myTab" class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#home" data-toggle="tab">Detail</a></li>
                        <li><a href="#followers" data-toggle="tab">Security Cheque Detail</a></li>
                        
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div class="tab-pane in active" id="home">
                          
                          <table class="table">
                            <tr>
                              <td><strong>Center:</strong></td>
                              <td><?php echo $select_dealer_row['centre'];?></td>
                              <td><strong>Name:</strong></td>
                              <td><?php echo $select_dealer_row['Name'];?></td>
                            </tr>
                            <tr>
                              <td><strong>Aadhar No.:</strong></td>
                              <td><?php echo $select_dealer_row['Aadhar_no'];?></td>
                              <td><strong>Aadhar Address:</strong></td>
                              <td><?php echo $select_dealer_row['Aadhar_address'];?></td>
                            </tr>
                            <tr>
                              <td><strong>Address:</strong></td>
                              <td><?php echo $select_dealer_row['Address'];?></td>
                              <td><strong>City:</strong></td>
                              <td><?php echo $select_dealer_row['City'];?></td>
                            </tr>
                            <tr>
                              <td><strong>State:</strong></td>
                              <td><?php echo $select_dealer_row['State'];?></td>
                              <td><strong>Country:</strong></td>
                              <td><?php echo $select_dealer_row['Country'];?></td>
                            </tr>
                            <tr>
                              <td><strong>Pincode:</strong></td>
                              <td><?php echo $select_dealer_row['Pincode'];?></td>
                              <td><strong>Phone:</strong></td>
                              <td><?php echo $select_dealer_row['Phone'];?></td>
                            </tr>
                            <tr>
                              <td><strong>Mobile:</strong></td>
                              <td><?php echo $select_dealer_row['Mobile'];?></td>
                              <td><strong>Fax:</strong></td>
                              <td><?php echo $select_dealer_row['Fax'];?></td>
                            </tr>
                            <tr>
                              <td><strong>TIN:</strong></td>
                              <td><?php echo $select_dealer_row['TIN'];?></td>
                              <td><strong>CST:</strong></td>
                              <td><?php echo $select_dealer_row['CST'];?></td>
                            </tr>
                            <tr>
                              <td><strong>GSTIN / UIN No.:</strong></td>
                              <td><?php echo $select_dealer_row['gstin_uin'];?></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td><strong>PAN:</strong></td>
                              <td><?php echo $select_dealer_row['PAN'];?></td>
                              <td><strong>Annual Turnover:</strong></td>
                              <td><?php echo $select_dealer_row['AnnualTurnover'];?></td>
                            </tr>
                             <tr>
                              <td><strong>Executive Name:</strong></td>
                              <td><?php echo $select_dealer_row['executive'];?></td>
                              <td><strong>Executive Mobile No:</strong></td>
                              <td><?php echo $select_dealer_row['executivecontact'];?></td>
                            </tr>
                          </table>
                        </div>
                        <div class="tab-pane" id="followers">
                         <div class="tab-pane in active" id="home">
                          
                          <table class="table">
                              <tr>
                                  <td><strong>Sr No.</strong></td>
                                  <td><strong>Account Name</strong></td>
                                  <td><strong>Bank Name</strong></td>
                                  <td><strong>Account No</strong></td>
                                  <td><strong>Branch</strong></td>
                                  <td><strong>Cheque No</strong></td>
                                  <td><strong>Signing Authority</strong></td>
                                  <td><strong>Date</strong></td>
                                  <td><strong>Status</strong></td>
                                  <td><strong>Action</strong></td>
                              </tr>
                              
                              <?php
                              $sr_no=1;
                              $select_cheque=mysqli_query($con,"select * from dealer_security_cheque where dealer_id=$_REQUEST[did]");
                              while($select_cheque_row=mysqli_fetch_array($select_cheque))
                              {
                              ?>
                              <tr>
                                  <td><?php echo $sr_no;?></td>
                                  <td><?php echo $select_cheque_row['NameOfAcc'];?></td>
                                  <td><?php echo $select_cheque_row['BankName'];?></td>
                                  <td><?php echo $select_cheque_row['AccNo'];?></td>
                                  <td><?php echo $select_cheque_row['Branch'];?></td>
                                  <td><?php echo $select_cheque_row['cheque_no'];?></td>
                                  <td><?php echo $select_cheque_row['SignAuth'];?></td>
                                  <td><?php echo $select_cheque_row['addate'];?></td>
                                  <td><?php if($select_cheque_row['status']==1)
                                      {
                                      echo "<a href='dealer-detail.php?cid=".$select_cheque_row['dealer_security_cheque_id']."&u=0&did=".$_REQUEST['did']."'>Unused</a>";
                                              
                                      }
                                      else
                                      {
                                          echo "<a href='dealer-detail.php?cid=".$select_cheque_row['dealer_security_cheque_id']."&u=1&did=".$_REQUEST['did']."'>Used</a>";
                                          
                                      }?></td>
                                  <td><a href="new-cheque.php?sc_eid=<?php echo $select_cheque_row['dealer_security_cheque_id'];?>">Edit</a>&nbsp;&nbsp;<a href="dealer-detail.php?sc_did=<?php echo $select_cheque_row['dealer_security_cheque_id'];?>&did=<?php echo $_REQUEST['did']; ?>">Delete</a></td>
                              </tr>   
                              <?php
                              $sr_no++;
                              }
                              ?>
                              <tr>
                                  <td colspan="9"><a href="new-cheque.php?did=<?php echo $_REQUEST['did'];?>">Add Cheque</a></td>
                              </tr>
                          </table>
                        </div>
                        </div>
                       
                      </div>
                      
                      <!--/Chat Tab-->
                      
                      
                    </div>
                  </div>
                </div>
              </div>
              
              <!--/Profile--> 
            </div>
          </div>
          <!-- End .powerwidget --> 
          
        </div>
        <?php
        }
        
        ?>
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