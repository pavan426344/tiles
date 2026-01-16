<?php
session_start();
$username='';
$usertype='';
include('config.php');
if(isset($_SESSION['username']))
{
	
	$usertype=$_SESSION['usertype'];
	$username=$_SESSION['username'];
	
	$CheckStatus=mysql_query("select * from userlogin where User_Name='$username' and UserType=$usertype");
	if(mysql_num_rows($CheckStatus)>0)
	{
		while($Checkrow=mysql_fetch_array($CheckStatus))
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
<title>Add Item | Forms</title>
<link href="css/styles.css" rel="stylesheet" type="text/css">

<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<script type="text/javascript" src="js/vendors/modernizr/modernizr.custom.js"></script>
<script type='text/javascript' src='js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css" />
<script type="text/javascript">
$(document).ready(function()
{
$(".chksize").change(function()
{
var dataString = 'csize='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_getsizedata.php",
data: dataString,
cache: false,
success: function(html)
{
$(".sizesqft").html(html);
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
            <li class="active">Add Item</li>
          </ul>
        </div>
        <!--/Breadcrumb-->
        
        <div class="page-header">
          <h1>Add<small>Item</small></h1>
        </div>
        
        <!-- Widget Row Start grid -->
        <div class="row" id="powerwidgets">
          
          
          <!-- New widget -->
          <div class="col-md-6  bootstrap-grid">
            <div class="powerwidget green" id="most-form-elements" data-widget-editbutton="false">
               <?php 
  if(isset($_REQUEST['additem']))
      {
  
                        $d=date('Y-m-d');
                        $InsertItem=0;
                        $d_name="";
                        $select_design=mysql_query("select * from t_design where T_Design_Id='$_REQUEST[design]'");
                        while($rowselect_design=mysql_fetch_array($select_design))
                        {
                            $d_name=$rowselect_design['T_Design_Name'];
                        }
		        $select_grade=mysql_query("select * from t_grade where Status='1' order by T_Grade_Seq_No ASC");
                        while($rowselect_grade=mysql_fetch_array($select_grade))
                        {
                        $grade_id=$rowselect_grade['T_Grade_Id'];    
                        //$grade_name=substr($rowselect_grade['T_Grade_Name'],0,4);
                        $grade_name=$rowselect_grade['T_Grade_Name'];
                        $item_name=$d_name." ".$grade_name;
                        //$print_n=$_REQUEST['series']." ".$_REQUEST['design'];
                        $stk_n=$_REQUEST['series']." ".$_REQUEST['design']." ".$_REQUEST['size']." ".$_REQUEST['pack_qty']." ".$_REQUEST['pack_unit']." ".$grade_name;
	  		$InsertItem=mysql_query("insert into t_item(T_Brand,T_Product_Type,T_Main_Series,T_Series,T_Design,"
                                . "T_Size,T_Grade,T_Print_Name,T_Item_Stk_Name,T_Item_Pack_Unit,T_Item_Pack_Qty,"
                                . "T_Item_Size_Ft,T_Item_Weight,T_Item_T_Size_Ft,T_Item_T_Size_Mtr,T_Plant,T_Punch, "
                                . "T_Glaz,T_HSN_Code,T_SGST,T_CGST,T_IGST,T_CESS,T_R_Stock,T_M_Production,C_Date) "
                                . "values('$_REQUEST[brand]','$_REQUEST[product_type]','$_REQUEST[main_series]','$_REQUEST[series]','$_REQUEST[design]',"
                                . "'$_REQUEST[size]','$grade_name','$_REQUEST[print_item_name]','$stk_n','$_REQUEST[pack_unit]',"
                                . "'$_REQUEST[pack_qty]','$_REQUEST[size_sqft]','$_REQUEST[weight]','$_REQUEST[size_t_sqft]',"
                                . "'$_REQUEST[size_t_sqmtr]','$_REQUEST[plant]','$_REQUEST[punch]','$_REQUEST[glaz]','$_REQUEST[hsn_code]',"
                                . "'$_REQUEST[sgst]','$_REQUEST[cgst]','$_REQUEST[igst]','$_REQUEST[cess]','$_REQUEST[r_stock]','$_REQUEST[m_production]','$d')") or mysql_error();
                        
                        }
                        
			if($InsertItem==1)
			{
				echo "<script>alert('Successfully Insert Item');document.location='view-item.php';</script>";	
			}
			else
			{
				echo "<script>alert('try again');document.location='add-item.php';</script>";	
			}
		
	  }
	  
	if(isset($_REQUEST['Update'])){
  
$d=date('d-m-Y');

	  		$InsertDesign=mysql_query("UPDATE mrp SET series='$_REQUEST[series]',state='$_REQUEST[state]',mrp='$_REQUEST[mrp]',Rate='$_REQUEST[rate]',grade='$_REQUEST[grade]',date='$d' WHERE id=$_REQUEST[updid]") or mysql_error();
			
			if($InsertDesign==1)
			{
				echo "<script>alert('Successfully Update MRP ');document.location='mrp-table.php';</script>";	
			}
			else
			{
				echo "<script>alert('try again');document.location='mrp-table.php';</script>";	
			}
		
	  }
	    
	  	if(isset($_REQUEST['editid']))
	  {
		  $updatedesign=mysql_query("select * from mrp where id=$_REQUEST[editid]");
		  while($rowupdate=mysql_fetch_array($updatedesign))
		  {
	   ?>
          <div class="inner-spacer">
                <form action="add-mrp.php" method="get" class="orb-form">
                  <fieldset>
                    
                    
                    <section>
                      <label class="label">Series</label>
                      <label class="select">
                        <select name="series">
                        <option value="<?php echo $rowupdate['series']; ?>" selected="selected"><?php echo $rowupdate['series']; ?></option>
                          <?php $selectseries=mysql_query("select * from series"); 
									while($rowseries=mysql_fetch_array($selectseries))
									{
								?>
                                	   <option value="<?php echo $rowseries['series']; ?>"><?php echo $rowseries['series']; ?></option>
                                	<?php		
									}
								 ?>
                        </select>
                        <i></i> </label>
                    </section>
                    <section>
                      <label class="label">State</label>
                      <label class="select">
                        <select name="state" required> 
                        	<option value="<?php echo $rowupdate['state']; ?>" selected="selected"><?php echo $rowupdate['state']; ?></option>
                        	<option value="Karnataka" >Karnataka</option>
                            <option value="Pondicherry">Pondicherry</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                         </select>
                        <i></i> </label>
                    </section>
                    <section>
                      <label class="label">MRP</label>
                      <label class="input">
                        <input type="text" name="mrp" value="<?php echo $rowupdate['mrp']; ?>">
                      </label>
                    </section>
                    <section>
                      <label class="label">Rate</label>
                      <label class="input">
                        <input type="text" name="rate" value="<?php echo $rowupdate['Rate']; ?>">
                      </label>
                    </section>
                    <section>
                      <label class="label">Grade</label>
                      <label class="select">
                        <select name="grade" >
                        <option value="<?php echo $rowupdate['grade']; ?>" selected="selected"><?php echo $rowupdate['grade']; ?></option>
                         <?php $selectcolor=mysql_query("select * from grade"); 
									while($rowcolor=mysql_fetch_array($selectcolor))
									{
								?>
                                		<option value="<?php echo $rowcolor['grade']; ?>"><?php echo $rowcolor['grade']; ?></option>
                        		
                                <?php
									}
								?>
                                </select>
                        <i></i> </label>
                    </section>
                    
                    
                  </fieldset>
                
                  <footer>
                  <input type="hidden" name="updid" value="<?php echo $_REQUEST['editid']; ?>" />
                    <button type="submit" class="btn btn-default" name="Update">Submit</button>
                  </footer>
                </form>
              </div>
       <?php } } else {?>
              <div class="inner-spacer">
                <form action="add-item.php" method="post" class="orb-form">
                  <fieldset>
                    
                    <section>
                      <label class="label">Brand</label>
                      <label class="select">
                        <select name="brand">
                          <?php $selectbrand=mysql_query("select * from t_brand where Status='1'"); 
									while($rowbrand=mysql_fetch_array($selectbrand))
									{
								?>
                                	   <option value="<?php echo $rowbrand['T_Brand_Name']; ?>"><?php echo $rowbrand['T_Brand_Name']; ?></option>
                                	<?php		
									}
								 ?>
                        </select>
                        <i></i> </label>
                    </section>
                    <section>
                      <label class="label">Product Type</label>
                      <label class="select">
                        <select name="product_type">
                          <?php $selectproducttype=mysql_query("select * from t_product_type where status='1'"); 
									while($rowproducttype=mysql_fetch_array($selectproducttype))
									{
								?>
                                	   <option value="<?php echo $rowproducttype['Product_Type_Name']; ?>"><?php echo $rowproducttype['Product_Type_Name']; ?></option>
                                	<?php		
									}
								 ?>
                        </select>
                        <i></i> </label>
                    </section>
                    <section>
                      <label class="label">Main Series</label>
                      <label class="select">
                        <select name="main_series">
                          <?php $selectmainseries=mysql_query("select * from t_main_series where status='1'"); 
									while($rowmainseries=mysql_fetch_array($selectmainseries))
									{
								?>
                                	   <option value="<?php echo $rowmainseries['T_Main_Series_Name']; ?>"><?php echo $rowmainseries['T_Main_Series_Name']; ?></option>
                                	<?php		
									}
								 ?>
                        </select>
                        <i></i> </label>
                    </section>
                    <section>
                      <label class="label">Series</label>
                      <label class="select">
                        <select name="series">
                          <?php $selectseries=mysql_query("select * from t_series where status='1'"); 
									while($rowseries=mysql_fetch_array($selectseries))
									{
								?>
                                	   <option value="<?php echo $rowseries['T_Series_Name']; ?>"><?php echo $rowseries['T_Series_Name']; ?></option>
                                	<?php		
									}
								 ?>
                        </select>
                        <i></i> </label>
                    </section>
                    <section>
                      <label class="label">Size</label>
                      <label class="select">
                          <select name="size" class="grade4" id="grade4">
                            <option value=""> --- Select Size ---</option>   
                          <?php $selectsize=mysql_query("select * from t_size where status='1'"); 
									while($rowsize=mysql_fetch_array($selectsize))
									{
								?>
                                	   <option value="<?php echo $rowsize['T_Size_Name']; ?>"><?php echo $rowsize['T_Size_Name']; ?></option>
                                	<?php		
									}
								 ?>
                        </select>
                        <i></i> </label>
                    </section>
                      <section>
                      <label class="label">Design</label>
                      <label class="select">
                        <select name="design">
                          <?php $selectdesign=mysql_query("select * from t_design where status='1'"); 
									while($rowdesign=mysql_fetch_array($selectdesign))
									{
								?>
                                	   <option value="<?php echo $rowdesign['T_Design_Name']; ?>"><?php echo $rowdesign['T_Design_Name']; ?></option>
                                	<?php		
									}
								 ?>
                        </select>
                        <i></i> </label>
                    </section>
                      
                      <section>
                      <label class="label">Pack Qty</label>
                      <label class="input">
                        <input type="text" name="pack_qty" required>
                      </label>
                    </section>
                      <section>
                      <label class="label">Pack Unit</label>
                      <label class="select">
                        <select name="pack_unit">
                        <option value="Box">Box</option>
                        <option value="Nos">Nos</option>
                        </select>
                        <i></i> </label>
                    </section>
                      <section>
                      <label class="label">Print Item Name</label>
                      <label class="input">
                        <input type="text" name="print_item_name" required>
                      </label>
                    </section>
                      <section>
                      <label class="label">Size (Sqft Per Piece)</label>
                      <label class="input" id="sizesqft">
                          
                          <input type="text" name="size_sqft" required>
                      </label>
                    </section>
                      <section>
                      <label class="label">Weight</label>
                      <label class="input">
                        <input type="text" name="weight" required>
                      </label>
                    </section>
                      <section>
                      <label class="label">Size (Total Sqft)</label>
                      <label class="input">
                        <input type="text" name="size_t_sqft" required>
                      </label>
                    </section>
                      <section>
                      <label class="label">Size (Total SqMtr)</label>
                      <label class="input">
                        <input type="text" name="size_t_sqmtr" required>
                      </label>
                    </section>
                      <section>
                      <label class="label">Plant</label>
                      <label class="select">
                        <select name="plant">
                          <?php $selectplant=mysql_query("select * from t_plant where Status='1'"); 
									while($rowplant=mysql_fetch_array($selectplant))
									{
								?>
                                	   <option value="<?php echo $rowplant['T_Plant_Name']; ?>"><?php echo $rowplant['T_Plant_Name']; ?></option>
                                	<?php		
									}
								 ?>
                        </select>
                        <i></i> </label>
                    </section>
                       <section>
                      <label class="label">Punch</label>
                      <label class="select">
                        <select name="punch">
                          <?php $selectpunch=mysql_query("select * from t_punch where Status='1'"); 
									while($rowpunch=mysql_fetch_array($selectpunch))
									{
								?>
                                	   <option value="<?php echo $rowpunch['T_Punch_Name']; ?>"><?php echo $rowpunch['T_Punch_Name']; ?></option>
                                	<?php		
									}
								 ?>
                        </select>
                        <i></i> </label>
                    </section>
                       <section>
                      <label class="label">Glaz</label>
                      <label class="select">
                        <select name="glaz">
                          <?php $selectglaz=mysql_query("select * from t_glaz where Status='1'"); 
									while($rowglaz=mysql_fetch_array($selectglaz))
									{
								?>
                                	   <option value="<?php echo $rowglaz['T_Glaz_Name']; ?>"><?php echo $rowglaz['T_Glaz_Name']; ?></option>
                                	<?php		
									}
								 ?>
                        </select>
                        <i></i> </label>
                    </section>
                      <section>
                      <label class="label">HSN Code</label>
                      <label class="input">
                        <input type="text" name="hsn_code" required>
                      </label>
                    </section>
                      <section>
                      <label class="label">SGST</label>
                      <label class="input">
                        <input type="text" name="sgst" required>
                      </label>
                    </section>
                      <section>
                      <label class="label">cgst</label>
                      <label class="input">
                        <input type="text" name="cgst" required>
                      </label>
                    </section>
                      <section>
                      <label class="label">igst</label>
                      <label class="input">
                        <input type="text" name="igst" required>
                      </label>
                    </section>
                      <section>
                      <label class="label">Cess</label>
                      <label class="input">
                        <input type="text" name="cess">
                      </label>
                    </section>
                      <section>
                      <label class="label">Reserve Stock</label>
                      <label class="input">
                        <input type="text" name="r_stock" required>
                      </label>
                    </section>
                      <section>
                      <label class="label">Min. Production</label>
                      <label class="input">
                        <input type="text" name="m_production" required>
                      </label>
                    </section>
                  </fieldset>
                
                  <footer>
                    <button type="submit" class="btn btn-default" name="additem">Submit</button>
                  </footer>
                </form>
              </div>
        <?php }?>      
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