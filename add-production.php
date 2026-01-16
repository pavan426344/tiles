<?php
session_start();
$username='';
$usertype='';
include('config.php');
if(isset($_SESSION['username']))
{
	
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
<title>Product Entry | Forms</title>
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
            <li class="active">Production Entry</li>
          </ul>
        </div>
        <!--/Breadcrumb-->
        
        <div class="page-header">
          <h1>Production<small>Entry</small></h1>
        </div>
        
        <!-- Widget Row Start grid -->
        <div class="row" id="powerwidgets">
          
          
          <!-- New widget -->
          
               <?php 
  if(isset($_REQUEST['production1'])){
  
           $d=date('Y-m-d');
		   $stk_n="";
                   $select_stk=mysqli_query($con,"select * from t_item where T_Item_Id='$_REQUEST[stk_name]'");
                   while($rowselect_stk=mysqli_fetch_array($select_stk))
                   {
                       $stk_n=$rowselect_stk['T_Item_Stk_Name'];
                   }    
  
	           $InsertDesign=mysqli_query($con,"insert into t_production(T_Production_Date,T_Item_Id,T_Item_Total) values('$d','$_REQUEST[stk_name]','$_REQUEST[batch_qty]')") or mysqli_error();
		   if($InsertDesign==1)
		   {
                     $pro_id='';  
                     $select_pro_i=mysqli_query($con,"select * from t_production where T_Item_Id='$_REQUEST[stk_name]' order by T_Production_Id DESC limit 0,1"); 
                     while($rowselect_pro_i=mysqli_fetch_array($select_pro_i))
                     {
                         $pro_id=$rowselect_pro_i['T_Production_Id'];
                     }
                     $insert_batch=mysqli_query($con,"insert into t_batch_detail(T_Production_Id,T_Batch_Location,T_Batch_No,T_Batch_Qty) "
                             . "values('$pro_id','$_REQUEST[location]','$_REQUEST[batch_no]','$_REQUEST[batch_qty]')");
                     if($insert_batch==1)
                     {    
		     echo "<script>alert('Successfully Insert Production Entry');document.location='view-production.php';</script>";	
                     }
                    
                     
                     }
		   else
		   {
		     echo "<script>alert('try again');document.location='add-production.php';</script>";	
		   }
		
	  }
          if(isset($_REQUEST['finalSubmit'])){
  
                   $d=date('Y-m-d');
                   $production_date="";
		   $stk_n="";
                   $select_it=mysqli_query($con,"select * from t_item where T_Design='$_REQUEST[design]' and T_Size='$_REQUEST[size]' order by T_Item_Id ASC");
                   while($select_it_row=mysqli_fetch_array($select_it))
                   {
                   $naml="batch_qty_".$select_it_row['T_Item_Id'];
                  // $p_date="stock_date_".$select_it_row['T_Item_Id'];
                   $production_date=$_REQUEST['stock_date'];
                   $b_q=$_REQUEST[$naml];    
                   $Insertproduction=mysqli_query($con,"insert into t_production(T_Production_Date,T_Item_Id,T_Item_Stk_Name,T_Location,"
                           . "T_Batch_No,T_Batch_Qty,T_Remain_Qty) values('$production_date','$select_it_row[T_Item_Id]','$select_it_row[T_Item_Stk_Name]','$_REQUEST[location]','$_REQUEST[batch_no]','$b_q','$b_q')") or mysqli_error();
		   if($Insertproduction==1)
		   {
                         
		     echo "<script>alert('Successfully Insert Production Entry');document.location='view-production.php';</script>";	
                     
                    }
		   else
		   {
		     echo "<script>alert('try again');document.location='add-production.php';</script>";	
		   }
                   }
		
	  }
	  if(isset($_REQUEST['FileProduction']))
            {
            $i=0;
            $target=0;
            if($_FILES['fileproduction']['name'])
                {
                    $c_date=date('Y-m-d');
                    $arrFileName = explode('.',$_FILES['fileproduction']['name']);
                    if($arrFileName[1] == 'csv')
                    {
                    $handle = fopen($_FILES['fileproduction']['tmp_name'], "r");
                    while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) 
                    {
                        if($i==0)
                        {
                            
                        }
                        else
                        {
                        $item1 =$data[0];//Design Name
                        $item2 =$data[1];//Size 
                        $item3 =$data[2];//Grade
                        $item4 =$data[3];//Location
                        $item5 =$data[4];//Batch No
                        $item6 =$data[5];//Batch Qty
                        $item7 =$data[6];//production Date
                        $stk_name="";
                        $i_id=0;
                        $select_i=mysqli_query($con,"select * from t_item where T_Design='$item1' and T_Size='$item2' and T_Grade='$item3'");
                        while($select_i_row=mysqli_fetch_array($select_i))
                        {
                            $i_id=$select_i_row['T_Item_Id'];
                            $stk_name=$select_i_row['T_Item_Stk_Name'];
                            $target=mysqli_query($con,"insert into t_production(T_Production_Date,T_Item_Id,T_Item_Stk_Name,T_Location,"
                           . "T_Batch_No,T_Batch_Qty,T_Remain_Qty) values('$item7','$i_id','$stk_name','$item4','$item5','$item6','$item6')") or mysqli_error();
                        }
                        
                        }
                     $i++;   
                    }
                    fclose($handle);
                    if($target==1)
                    {    
                     echo "<script type=\"text/javascript\">
    						alert(\"CSV File has been successfully Imported.\");
    						window.location = \"view-production.php\"
    					</script>";
                    }
                    }
                    else
                    {
                      echo "<script>alert('Only CSV File Allowed. Try Again?');document.location='add-production.php';</script>";	  
                    }    
                }
            }
	  
	if(isset($_REQUEST['Update'])){
  
                $d=date('d-m-Y');
                $stk_n="";
                   
                   $select_stk=mysqli_query($con,"select * from t_item where T_Item_Id='$_REQUEST[stk_name]'");
                   while($rowselect_stk=mysqli_fetch_array($select_stk))
                   {
                       $stk_n=$rowselect_stk['T_Item_Stk_Name'];
                   }
       
	  		$InsertDesign=mysqli_query($con,"UPDATE t_mrp SET T_Item_Id='$_REQUEST[stk_name]',T_Stk_Name='$stk_n',state='$_REQUEST[state]',mrp='$_REQUEST[mrp]',Rate='$_REQUEST[rate]',date='$d' WHERE id=$_REQUEST[updid]") or mysqli_error();
			
			if($InsertDesign==1)
			{
				echo "<script>alert('Successfully Update MRP ');document.location='view-mrp.php';</script>";	
			}
			else
			{
				echo "<script>alert('try again');document.location='view-mrp.php';</script>";	
			}
		
	  }
          	    
	  	
                if(isset($_REQUEST['production']))
                {
                    
                    
                    $select_g=mysqli_query($con,"select * from t_item where  T_Design='$_REQUEST[design]' and T_Size='$_REQUEST[size]' order by T_Item_Id ASC");
                    if(mysqli_num_rows($select_g)<=0)
                    {
                        echo "<script>alert('No Record Found ! Please Try Again.');document.location='add-production.php';</script>";	
                    }    
                    
                    	   ?>
          <div class="col-md-12 bootstrap-grid"> 
          <div class="powerwidget" id="datatable-filter-column" data-widget-editbutton="false">
          <div class="inner-spacer">
              <form action="add-production.php" method="post" class="orb-form">
               <table class="display table table-striped table-hover" id="table-2">
                  <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Product Name</th>
                      
                      <th>Qty</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                   $i=1;
                   while($select_g_row=mysqli_fetch_array($select_g))
                    {
	 ?>
    	<tr>
        	
            <td><?php echo $i;?></td>
            <td><?php echo $select_g_row['T_Item_Stk_Name'];?></td>
            
            <td>
                <section>
                      <label class="input">
                          <input type="text" name="batch_qty_<?php echo $select_g_row['T_Item_Id']; ?>"  required>
                      </label>
                    </section>
            </td>
            
        </tr>
        <?php
        $i++;
	   }
		?>
                    
                  </tbody>
                  <tfoot>
                     
                  </tfoot> 
                </table>
                  <br/>
                  <center>
                      <input type="hidden" name="location" value="<?php echo $_REQUEST['location'];?>">
                      <input type="hidden" name="batch_no" value="<?php echo $_REQUEST['batch_no'];?>">
                      <input type="hidden" name="design" value="<?php echo $_REQUEST['design'];?>">
                      <input type="hidden" name="size" value="<?php echo $_REQUEST['size'];?>">
                      <input type="hidden" name="stock_date" value="<?php echo $_REQUEST['stock_date'];?>">
                  <input type="submit" class="btn btn-default" name="finalSubmit" >
                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="add-production.php">Back</a></center>
              </form>
                
              </div>
               </div>
               </div>
       <?php  } else {?>
          <div class="col-md-6  bootstrap-grid">
            <div class="powerwidget green" id="most-form-elements" data-widget-editbutton="false">
              <div class="inner-spacer">
                <form action="add-production.php" method="post" class="orb-form">
                  <fieldset>
                    <legend>Production Form</legend> 
                    <section>
                      <label class="label">Design</label>
                      <label class="select">
                          <select name="design" required>
                            <option value="">-- Select Design --</option>
                          <?php $selectdesign=mysqli_query($con,"select * from t_design where status='1'"); 
									while($rowdesign=mysqli_fetch_array($selectdesign))
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
                      <label class="label">Size</label>
                      <label class="select">
                          <select name="size" class="grade4" id="grade4" required>
                            <option value=""> --- Select Size ---</option>   
                          <?php $selectsize=mysqli_query($con,"select * from t_size where status='1'"); 
									while($rowsize=mysqli_fetch_array($selectsize))
									{
								?>
                                	   <option value="<?php echo $rowsize['T_Size_Name']; ?>"><?php echo $rowsize['T_Size_Name']; ?></option>
                                	<?php		
									}
								 ?>
                        </select>
                        </label>
                    </section>
                    <section>
                      <label class="label">Location/Godown</label>  
                      <label class="select">
                          <select name="location" required>
                            <option value=""> -- Location --</option>  
                          <?php $selectitem=mysqli_query($con,"select * from t_godown"); 
			while($rowitem=mysqli_fetch_array($selectitem))
			{
			?>
                         <option value="<?php echo $rowitem['T_Godown_Name']; ?>"><?php echo $rowitem['T_Godown_Name']; ?></option>
                         <?php		
			}
			?>
                        </select>
                       </label>
                    </section>
                      <section>
                      <label class="label">Batch No.</label>    
                      <label class="input">
                          <input type="text" name="batch_no" required>
                      </label>
                    </section>
                       <section>
                       <label class="label">Production Date</label>     
                      <label class="input">
                          <input type="text" name="stock_date" value="<?php echo date('Y-m-d');?>" required>
                      </label>
                    </section>
                  </fieldset>
                
                  <footer>
                    <button type="submit" class="btn btn-default" name="production">Submit</button>
                    
                  </footer>
                </form>
                <br/>
                <br/>  
                <form action="add-production.php" method="post" class="orb-form" enctype="multipart/form-data">
                  <fieldset>
                    <legend>Upload Production</legend>  
                  <section>
                      <label class="label">Upload Production(CSV Format Only)</label>
                      <label for="file" class="input input-file">
                      <div class="button">
                        <input type="file" id="file" name="fileproduction" required>
                        Browse</div>
                      <input type="text" readonly>
                      <i><b>Note</b>:Only CSV File Allowed And Don't Use Any Special Keyword(like ',@?). </i></label>
                    </section>
                  </fieldset>
                  <footer>
                    <button type="submit" class="btn btn-default" name="FileProduction">Submit</button>
                  </footer>
                </form>  
              </div>
                </div>
          </div>
        <?php }?>
                
            
          
         
          
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