<?php
session_start();
$username='';
$usertype='';
$company='';
include('config.php');
if(isset($_SESSION['username']))
{
	
	$usertype=$_SESSION['usertype'];
	$username=$_SESSION['username'];
	$company=$_SESSION['company'];
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
<title>Do Detail | Forms</title>
<link href="css/styles.css" rel="stylesheet" type="text/css">


<script type="text/javascript" src="js/vendors/modernizr/modernizr.custom.js"></script>
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
            <li class="active">DO Detail</li>
          </ul>
        </div>
        <!--/Breadcrumb-->
        
        <div class="page-header">
          <h1>Do Detail<small>form</small></h1>
        </div>
        
        <!-- Widget Row Start grid -->
        <div class="row" id="powerwidgets">
          
          
          <!-- New widget -->
          <div class="col-md-6  bootstrap-grid">
            <div class="powerwidget green" id="most-form-elements" data-widget-editbutton="false">
                <?php  if(isset($_REQUEST['Confirm']))
	{
                if(isset($_REQUEST['confirm_doid']))  
                {    
		$insert_transport=mysqli_query($con,"insert into approvesales_transport(txn_id,User_id,doid,transportname,drivername,drivercontact,licence,vehicleno,lrno,lrdate) values('$_REQUEST[txn_id]','$username','$_REQUEST[confirm_doid]','$_REQUEST[transportname]','$_REQUEST[drivername]','$_REQUEST[drivercontact]','$_REQUEST[licence]','$_REQUEST[vehicleno]','$_REQUEST[lrno]','$_REQUEST[lrdate]')");
		if($insert_transport==1)
		{
			$sodate=$_REQUEST['dispatch_date'];
			$update=mysqli_query($con,"update approvesales set Confirm='1',sodate='$sodate' where doid='$_REQUEST[confirm_doid]' and txn_id='$_REQUEST[txn_id]'");
			if($update==1)
			{
				//$inserttally=mysqli_query($con,"insert into sales(InvoiceNo,InvoiceDate,InvoiceType,PartyName,PartyAddress,SalesAccount,SalesAmount,StockName,StockQty,StockRate,ItemMRP,StockAmount,)");
				echo "<script>alert('Successfully Complete DO To SO');document.location='dosales-gst.php?sono=$_REQUEST[confirm_doid]&txn_id=$_REQUEST[txn_id]';</script>";	
			}
		}
                }
	}
	
	if(isset($_REQUEST['approve1']))
	{ 
                $plant_id=0;$update_sale_pro=0;$update_s=0;$plant_name="";
                $date_i=date('d-m-y');$date_f=date('Y-m-d');
                $select_plant=mysqli_query($con,"select * from t_plant where T_Company_Name='$company'"); // select Plant
                while($select_plant_row=mysqli_fetch_array($select_plant))
                {
                   $update_s=0;$total_box=0;$total_amount=0;
                   $plant_id=$select_plant_row['T_Plant_Id'];$new_doid=$_REQUEST['approveid']."/U".$plant_id; // new doid
                   $plant_name=$select_plant_row['T_Plant_Name'];
                   $select_item=mysqli_query($con,"select * from t_item where T_Plant='$select_plant_row[T_Plant_Name]'");
                   while($select_item_row=mysqli_fetch_array($select_item))
                   { 
                        
                        $select_sale_product=mysqli_query($con,"select * from finalsales_product where txn_id='$_REQUEST[txn_id]' and DesignName='$select_item_row[T_Item_Stk_Name]'");
                        while($select_sale_product_row=mysqli_fetch_array($select_sale_product))
                        {
                            $insert_approvesale=mysqli_query($con,"insert into approvesales_product(txn_id,doid,DesignName,batch_no,"
                              . "Quantity,weight,Rate,MRP,Amount) values('$_REQUEST[txn_id]','$new_doid','$select_sale_product_row[DesignName]',"
                              . "'$select_sale_product_row[batch_no]','$select_sale_product_row[Quantity]','$select_sale_product_row[weight]',"
                              . "'$select_sale_product_row[Rate]','$select_sale_product_row[MRP]','$select_sale_product_row[Amount]')");  
                            $total_box=$total_box+$select_sale_product_row['Quantity'];
                            $total_amount=$total_amount+$select_sale_product_row['Amount'];
                            if($insert_approvesale==1)
                            {    
                                $update_s=1;
                            }
                        }
                        
                   }
                   $insert_into_approve_o=0;
                   if($update_s==1)
                   {
                       
                       $select_old_order=mysqli_query($con,"select *  from finalsales where txn_id='$_REQUEST[txn_id]'");
                       while($select_old_order_row=mysqli_fetch_array($select_old_order))
                       {
                       $discount=0;$igst=0;$cgst=0;$sgst=0;
                       $discount_rate=0;
                       if($select_old_order_row['Discount']!=0)
                       {
                           if($select_old_order_row['discountp']!=0)
                           {
                              $discount_rate=$select_old_order_row['discountp'];
                              $discount=($total_amount*$discount_rate)/100;
                           }
                            else 
                            {
                                $discount_rate=0;
                                $discount=$select_old_order_row['Discount'];
                            }
                       }
                       if($select_old_order_row['cgst']!=0)
                       {
                        $cgst=($total_amount*9)/100;   
                       }
                       if($select_old_order_row['sgst']!=0)
                       {
                           $sgst=($total_amount*9)/100;   
                       }
                       if($select_old_order_row['igst']!=0)
                       {
                           $igst=($total_amount*18)/100;   
                       } 
                       $nextuser='';
				$findu=mysqli_query($con,"select * from userregistration where username='$username'");					
				while($rowfind=mysqli_fetch_array($findu))
				{
					$nextuser=$rowfind['uexecutive'];	
				}
                       $insert_into_approve_o=mysqli_query($con,"insert into approvesales(User_id,txn_id,unit_name,doid,dealer_id,"
                               . "Dealer_Name,Dealer_Address,Delivery_Address,State,"
                               . "gstin_uin,Date,dodate,Discount,cgst,sgst,igst,Total,Totalbox,roundoff,"
                               . "discountp,rsamount,executive,executivecontact,CompanyName,outstanding,"
                               . "OrderStatus,NextConfirm,sodate2,sodate) values('$select_old_order_row[User_id]','$_REQUEST[txn_id]','$plant_name','$new_doid','$select_old_order_row[dealer_id]',"
                               . "'$select_old_order_row[Dealer_Name]','$select_old_order_row[Dealer_Address]','$select_old_order_row[Delivery_Address]','$select_old_order_row[State]',"
                               . "'$select_old_order_row[gstin_uin]','$select_old_order_row[Date]','$select_old_order_row[dodate]','$discount',"
                               . "'$cgst','$sgst','$igst','$total_amount',"
                               . "'$total_box','$total_amount','$discount_rate',"
                               . "'','$select_old_order_row[executive]','$select_old_order_row[executivecontact]','$select_old_order_row[CompanyName]',"
                               . "'','','$nextuser','$date_i','$date_f')");
                       }
                       $insert_pdc_new=0;$insert_remark_new=0;
                       if($insert_into_approve_o==1)
                       {  
                           $update=mysqli_query($con,"update finalsales set Confirm='1',sodate2='$date_i',sodate='$date_f' where txn_id='$_REQUEST[txn_id]'");
                           $select_pdc_old=mysqli_query($con,"select * from pdccheck where txn_id='$_REQUEST[txn_id]'");
                           while($select_pdc_old_row=mysqli_fetch_array($select_pdc_old))
                           {
                              
                               $insert_pdcchk_new=mysqli_query($con,"insert into approvesales_pdccheck(User,Doid,txn_id,Checkno,acc_no,Bankname,"
                                       . "BankBranch) values('$select_pdc_old_row[User]','$new_doid',"
                                       . "'$_REQUEST[txn_id]','$select_pdc_old_row[Checkno]','$select_pdc_old_row[acc_no]',"
                                       . "'$select_pdc_old_row[Bankname]','$select_pdc_old_row[BankBranch]')");
                           }
                           $select_remark_old=mysqli_query($con,"select * from remarks_do where txn_id='$_REQUEST[txn_id]'");
                           while($select_remark_old_row=mysqli_fetch_array($select_remark_old))
                           {
                               $insert_remark_oldnew=mysqli_query($con,"insert into approvesales_remarks_do(remarks,username,date,doid,txn_id) "
                                       . "values('$select_remark_old_row[remarks]','$select_remark_old_row[username]','$select_remark_old_row[date]',"
                                       . "'$new_doid','$_REQUEST[txn_id]')");
                           }
                           $insert_remark_new=mysqli_query($con,"insert into approvesales_remarks_do(remarks,username,date,doid,txn_id) "
                                       . "values('$_REQUEST[remarks]','$username','$date_i',"
                                       . "'$new_doid','$_REQUEST[txn_id]')");
                           if($insert_remark_new==1)
                           {
                              echo "<script>alert('Your Pending Order Successfully Approve');document.location='home.php';</script>";
                           }    
                       }   
                   }    
                }
        }
	 ?>
	  	
      
          
       
              <div class="inner-spacer">
              <div class="table-responsive">
              <?php if(isset($_REQUEST['confirm_doid'])){ ?>
                  
    <h2>Transport Details</h2>
    <form action="do-details.php" method="post">
    <table class="table table-striped">
    <tr>
    <td>Dispatch Date</td>
    <td><input type="text" name="dispatch_date"  value="<?php echo date('Y-m-d');?>" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))"/><br/>Note:- Date format i.e 2018-02-13(YYYY-MM-DD)</td>
    </tr>    
    <tr>
    <td>LR No</td>
    <td><input type="text" name="lrno"   /></td>
    </tr>
    <tr>
    <td>LR Date</td>
    <td><input type="text" name="lrdate"  /><br/>Note:- Date format i.e 2018-02-13(YYYY-MM-DD)</td>
    </tr>
    <tr>
    <td>Transport Name</td>
    <td><input type="text" name="transportname" /></td>
    </tr>
    <tr>
    <td>Driver Name</td>
    <td><input type="text" name="drivername"  /></td>
    </tr>
    <tr>
    <td>Driver Contact</td>
    <td><input type="text" name="drivercontact" /></td>
    </tr>
    <tr>
    <td>Licence</td>
    <td><input type="text" name="licence" /></td>
    </tr>
    <tr>
    <td>Vehicle No</td>
    <td><input type="text" name="vehicleno" required/></td>
    </tr>
    
    <tr><td align="right">
    <input type="hidden" name="confirm_doid" value="<?php  echo $_REQUEST['confirm_doid']; ?>" />
    <input type="hidden" name="txn_id" value="<?php echo $_REQUEST['txn_id']; ?>"  />
    <input type="submit" name="Confirm" value="Confirm" /></td><td align="left"><input type="button" name="close" value="Close" onclick="window.close()" /></td></tr>
    </table>
    </form>
    <?php } ?>
    
    <?php if(isset($_REQUEST['appid'])) { ?>
    	<h2>Enter Remarks</h2>
    	<form action="do-details.php" method="post">
        <table class="table table-striped">
        <tr><td>Remarks</td><td><textarea name="remarks"></textarea></td></tr>
        <tr>
        <td></td>
        <td ><input type="hidden" name="approveid" value="<?php echo $_REQUEST['appid']; ?>"  /><input type="hidden" name="txn_id" value="<?php echo $_REQUEST['txn_id']; ?>"  /><input type="submit" name="approve1" value="Approve" />&nbsp &nbsp <a href="doview.php?dono=<?php echo $_REQUEST['appid']; ?>">Back</a></td></tr>
        </table>
        </form>
    <?php } ?>
               <!-- <form action="add-color.php" method="post" class="orb-form">
                  <fieldset>
                    <section>
                      <label class="label">Color Name</label>
                      <label class="input">
                        <input type="text" name="color">
                      </label>
                    </section>
                    
                  </fieldset>
                
                  <footer>
                    <button type="submit" class="btn btn-default" name="Color">Submit</button>
                  </footer>
                </form>-->
                </div>
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