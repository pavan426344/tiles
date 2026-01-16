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
<title>Dealer Security Cheque| Forms</title>
<link href="css/styles.css" rel="stylesheet" type="text/css">


<script type="text/javascript" src="js/vendors/modernizr/modernizr.custom.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type='text/javascript' src='js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css" />
<script type="text/javascript">
$(document).ready(function()
{
$(".TIN").change(function()
{
var dataString = 'tin='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_deltincheck.php",
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
            <?php
			if(isset($_REQUEST['eid']))
		  {
			?>
            <li class="active">Update Dealer</li>
            <?php
		  }
		  else
		  {
			?>
            <li class="active">New Dealer Security Cheque</li>
            <?php
		  }
			?>
          </ul>
        </div>
        <!--/Breadcrumb-->
        
        <div class="page-header">
         
          <?php
			if(isset($_REQUEST['eid']))
		  {
			?>
            <h1>Dealer<small>Update</small></h1>
            <?php
		  }
		  else
		  {
			?>
             <h1>Dealer Security Cheque Detail<small>form</small></h1>
            <?php
		  }
			?>
        </div>
        
        <!-- Widget Row Start grid -->
        <div class="row" id="powerwidgets">
          
          <?php
  	if(isset($_REQUEST['submit']))
	{
		$date=date("Y-m-d");
		$ex= explode('-',$_REQUEST['dealer']);
		$dealer_name=$ex[0];
                $dealer_id=$ex[1];
                $centre=$ex[2];
		//$dealer=mysqli_query($con,"insert into dealer_security_cheque(dealer_id,dealer_name,NameOfAcc,BankName,AccNo,Branch,cheque_no,SignAuth,addate) values('$dealer_id','$dealer_name','$_REQUEST[NameOfAcc]','$_REQUEST[BankName]','$_REQUEST[AccNo]','$_REQUEST[Branch]','$_REQUEST[SignAuth]','$date')");
		$dealer_cheque=mysqli_query($con,"INSERT INTO dealer_security_cheque(dealer_id,dealer_name,centre,NameOfAcc,BankName,AccNo,Branch,cheque_no,SignAuth,addate) VALUES ('$dealer_id','$dealer_name','$centre','$_REQUEST[NameOfAcc]','$_REQUEST[BankName]','$_REQUEST[AccNo]','$_REQUEST[Branch]','$_REQUEST[cheque_no]','$_REQUEST[SignAuth]','$date');");
		if($dealer_cheque==1)
		{
			$file='';
			echo "<script>alert('Successfully Submit');document.location='dealer-list.php';</script>";	
		}
		else
		{
			echo "<script>alert('Try Again');document.location='new-cheque.php';</script>";		
		}
	}
	if(isset($_REQUEST['eid']))
        {
                $date=date("Y-m-d");
		$ex= explode('-',$_REQUEST['dealer']);
		$dealer_name=$ex[0];
                $dealer_id=$ex[1];
                $centre=$ex[2];
		//$dealer=mysqli_query($con,"insert into dealer_security_cheque(dealer_id,dealer_name,NameOfAcc,BankName,AccNo,Branch,cheque_no,SignAuth,addate) values('$dealer_id','$dealer_name','$_REQUEST[NameOfAcc]','$_REQUEST[BankName]','$_REQUEST[AccNo]','$_REQUEST[Branch]','$_REQUEST[SignAuth]','$date')");
		$dealer_cheque_u=mysqli_query($con,"update dealer_security_cheque set dealer_id='$dealer_id'"
                        . ",dealer_name='$dealer_name',"
                        . "centre='$centre',"
                        . "NameOfAcc='$_REQUEST[NameOfAcc]',"
                        . "BankName='$_REQUEST[BankName]',"
                        . "AccNo='$_REQUEST[AccNo]',"
                        . "Branch='$_REQUEST[Branch]',"
                        . "cheque_no='$_REQUEST[cheque_no]',"
                        . "SignAuth='$_REQUEST[SignAuth]',"
                        . "addate='$date' where dealer_security_cheque_id='$_REQUEST[eid]'");
		if($dealer_cheque_u==1)
		{
			$file='';
			echo "<script>alert('Successfully Submit');document.location='dealer-detail.php?did=".$dealer_id."';</script>";	
		}
		else
		{
			echo "<script>alert('Try Again');document.location='dealer-detail.php?did=".$dealer_id."';</script>";		
		}
        }
	
  ?>
          <!-- New widget -->
           <?php
           if(isset($_REQUEST['sc_eid']))
           {
           ?>
          <?php 
                          
                             $select_dealer_name=mysqli_query($con,"select * from dealer_security_cheque where dealer_security_cheque_id=$_REQUEST[sc_eid]");
                             while($select_dealer_name_row=mysqli_fetch_array($select_dealer_name))
                             {
                                 ?>
          <div class="col-md-6  bootstrap-grid">
            <div class="powerwidget green" id="most-form-elements" data-widget-editbutton="false">
              
              <div class="inner-spacer">
                  <form action="new-cheque.php" method="get" enctype="multipart/form-data" class="orb-form">
                  
                  
                  <fieldset>
                  <legend>Security Cheque Detail</legend>
                 
                   <section>
                      <label class="label">Dealer</label>
                      <label class="input">
                          <input type="text" list="list1" name="dealer" required 
                            <?php  
                            echo "value='";
                            echo $select_dealer_name_row['dealer_name']."-".$select_dealer_name_row['dealer_id']."-".$select_dealer_name_row['centre'];
                            echo "'";
                            ?>
                          >
                        <datalist id="list1">
                        <?php
                              
						$select_executive_repl=mysqli_query($con,"select * from dealer");
						while($select_executive_repl_row=mysqli_fetch_array($select_executive_repl))
						{
						?>
                          <option value="<?php echo $select_executive_repl_row['CompanyName']."-".$select_executive_repl_row['Dealer_id']."-".$select_executive_repl_row['centre'];?>"></option>
                          <?php
						  }
						  ?>
                        </datalist>
                      </label>
                      <div class="note"><strong>Note:</strong> works in Chrome, Firefox, Opera and IE10.</div>
                    </section>
                    <section>
                      <label class="label">Account Name</label>
                      <label class="input">
                        <input type="text" name="NameOfAcc" value="<?php echo $select_dealer_name_row['NameOfAcc'];?>" size="200" required>
                      </label>
                    </section>
                  <section>
                      <label class="label">Bank Name</label>
                      <label class="input">
                          <input type="text" name="BankName" value="<?php echo $select_dealer_name_row['BankName'];?>" size="200" required >
                      </label>
                    </section>
                    <section>
                      <label class="label">Account No</label>
                      <label class="input">
                          <input type="text" pattern="[0-9]{05,20}" value="<?php echo $select_dealer_name_row['AccNo'];?>" name="AccNo" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Branch</label>
                      <label class="input">
                        <input type="text" name="Branch" value="<?php echo $select_dealer_name_row['Branch'];?>" size="100" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Cheque No.</label>
                      <label class="input">
                        <input type="text" name="cheque_no" value="<?php echo $select_dealer_name_row['cheque_no'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Signing Authority</label>
                      <label class="input">
                          <input type="text" name="SignAuth" value="<?php echo $select_dealer_name_row['SignAuth'];?>" pattern="{6,50}" required>
                      </label>
                    </section>
                    
                  <input type="hidden" name="eid" value="<?php echo $_REQUEST['sc_eid'];?>">
                    <!--<section>
                      <label class="label">Appointment Letter</label>
                      <label for="file" class="input input-file">
                      <div class="button">
                        <input type="file" id="file" name="appoint" required>
                        Browse</div>
                      <input type="text" readonly>
                      </label>
                    </section>-->
                  </fieldset>
                  
                  
                  
                  <footer>
                    <button type="submit" class="btn btn-default" name="update">Submit</button>
                  </footer>
                </form>
              </div>
            </div>
          </div>
          
          <?php
          }        
                          
                      
           }
           else
           {
           ?>
           <div class="col-md-6  bootstrap-grid">
            <div class="powerwidget green" id="most-form-elements" data-widget-editbutton="false">
              
              <div class="inner-spacer">
                  <form action="new-cheque.php" method="post" enctype="multipart/form-data" class="orb-form">
                  
                  
                  <fieldset>
                  <legend>Security Cheque Detail</legend>
                 
                   <section>
                      <label class="label">Dealer</label>
                      <label class="input">
                          <input type="text" list="list1" name="dealer" required 
                              <?php 
                          if(isset($_REQUEST['did']))
                          {
                             $select_dealer_name=mysqli_query($con,"select * from dealer where Dealer_id=$_REQUEST[did]");
                             while($select_dealer_name_row=mysqli_fetch_array($select_dealer_name))
                             {
                            echo "value='";
                            echo $select_dealer_name_row['CompanyName']."-".$select_dealer_name_row['Dealer_id']."-".$select_dealer_name_row['centre'];
                            echo "'";
                            }        
                          }
                          ?> 
                          >
                        <datalist id="list1">
                        <?php
                              
						$select_executive_repl=mysqli_query($con,"select * from dealer");
						while($select_executive_repl_row=mysqli_fetch_array($select_executive_repl))
						{
						?>
                          <option value="<?php echo $select_executive_repl_row['CompanyName']."-".$select_executive_repl_row['Dealer_id']."-".$select_executive_repl_row['centre'];?>"></option>
                          <?php
						  }
						  ?>
                        </datalist>
                      </label>
                      <div class="note"><strong>Note:</strong> works in Chrome, Firefox, Opera and IE10.</div>
                    </section>
                  <section>
                      <label class="label">Bank Name</label>
                      <label class="input">
                        <input type="text" name="BankName" size="200" required >
                      </label>
                    </section>
                    <section>
                      <label class="label">Account Name</label>
                      <label class="input">
                        <input type="text" name="NameOfAcc" size="200" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Account No</label>
                      <label class="input">
                          <input type="text" pattern="[0-9]{05,20}" name="AccNo" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Branch</label>
                      <label class="input">
                        <input type="text" name="Branch" size="100" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Cheque No.</label>
                      <label class="input">
                        <input type="text" name="cheque_no" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Signing Authority</label>
                      <label class="input">
                          <input type="text" name="SignAuth" pattern="{6,50}" required>
                      </label>
                    </section>
                    
                   
                    <!--<section>
                      <label class="label">Appointment Letter</label>
                      <label for="file" class="input input-file">
                      <div class="button">
                        <input type="file" id="file" name="appoint" required>
                        Browse</div>
                      <input type="text" readonly>
                      </label>
                    </section>-->
                  </fieldset>
                  
                  
                  
                  <footer>
                    <button type="submit" class="btn btn-default" name="submit">Submit</button>
                  </footer>
                </form>
              </div>
            </div>
          </div>
          <?php
           }
          ?>
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