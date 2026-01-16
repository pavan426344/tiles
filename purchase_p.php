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
<title>Sales Order | Forms</title>
<link href="css/styles.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/vendors/modernizr/modernizr.custom.js"></script>
<script src="js/toword.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.js"></script>

<!--<script type="text/javascript" src="js/vendors/jquery/jquery.min.js"></script> 
<script type="text/javascript" src="js/vendors/jquery/jquery-ui.min.js"></script>-->

<?php include('purchase_script.php');?>
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
            <div class="list-group"> <a data-toggle="modal" href="logout.php" target="_self" class="list-group-item goaway"><i class="fa fa-power-off"></i> Sign Out</a> </div>
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
          <li class="active">Dispatch Order</li>
        </ul>
      </div>
      <!--/Breadcrumb-->
      
      <div class="page-header">
        <h1>DO<small>form</small></h1>
      </div>
      
      <!-- Widget Row Start grid -->
      <div class="row" id="powerwidgets">
        <div class="col-md-12 bootstrap-grid"> 
          
          <!-- New widget -->
          <div class="powerwidget" id="forms-9" data-widget-editbutton="false">
            <div class="inner-spacer">
              <div class="invoice-block">
                <div class="page-header">
                  <div class="logo-block"><img src="images/logo.png" alt="Logo" /></div>
                  <h1>DO Date :- <?php echo date('d-m-Y');?> </h1>
                </div>
                <form action="invoice.php" method="post" name="salesorder" enctype="multipart/form-data"  > 
                <div class="well">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive"> 
                      <table class="table table-striped">
                        <tr>
            <td width=""  align="left" valign="top" colspan="2">Order Date:<input type="text" name="date" value="<?php echo date('d-m-Y');?>"/></td>
            <td width="" align="right" valign="top" colspan="2"></td>
	    </tr>
        <tr><td colspan="4" height="40"></td></tr>
                        <tr>
                          <td height="30">Dealer:<input type="text" name="dealer" value="" id="dealer" class="dealer" style="width:200px !important" onkeydown="return tabOnEnter(this,event)"/></td>
                          <td id="centre" colspan="3" class="centre" align="center"></td>
                        </tr>
                        <tr>
                          <td height="30"  align="left" >Address: </td>
                          <td align="left" class="address" id="address"></td>
                          <td align="left"> Same As Billing
                            <input type="checkbox" name="deladdress1" onclick="address()"  /></td>
                          <td align="left">Delievery Address :
                            <textarea name="deladd" id="deladd" style="width:300px !important" ></textarea></td>
                        </tr>
                        <tr>
                          <td height="30" width="25">Tin :</td>
                          <td class="tin" id="tin"></td>
                          <td align="left">Company :</td>
                          <td align="left"><select name="company">
                              <option>Select</option>
                              <option value="ENTIRE">ENTIRE</option>
                              <option value="RELAX">RELAX</option>
                            </select></td>
                        </tr>
                        <tr>
                          <td height="30">CST:</td>
                          <td class="cst" id="cst"></td>
                          <td align="left"></td>
                          <td align="left"  class="city"></td>
                        </tr>
                        <tr>
                          <td height="30" colspan="2">Tax Type :<select name="taxtype" id="taxtype">
                              <option>Select</option>
                              <option value="LOCAL SALES">LOCAL SALES</option>
                              <option value="C FORM">C FORM</option>
                              <option value="FULL TAX">FULL TAX</option>
                            </select></td>
                          <td>Sales Executive :</td>
                          <td id="transport" class="transport"></td>
                        </tr>
                      </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-responsive"> 
                  <!--<h5>Invoice for Design Services Under Contract #923 from 03.03.2013</h5>-->
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Design</th>
                        <th>Grade</th>
                        <th>Pack</th>
                        <th>Qty Boxes</th>
                        <th>MRP</th>
                        <th>Rate</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input name="design1" type="text" class="series1" id="series1" style="width:105px;"/></td>
                        <td><select name="grade1" class="grade1" id="grade1">
                            <option value="">select</option>
                            <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                            <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                            <?php } ?>
                          </select></td>
                        <td  class="pack1"></td>
                        <td><input type="text" name="totalbox1" id="totalbox1" class="totalbox1" onchange="boxcheck1()" onblur="boxcheck1()" onmouseout="boxcheck1()" onclick="boxcheck1()" onselect="boxcheck1()" style="width:105px;"/>
                          <span id="box1"></span></td>
                        <td class="mrp1"></td>
                        <td width="48"><input type="text" name="rate1" id="rate1" onchange="totalamount('mrp1');" onselect="totalamount('mrp1');"  onkeyup="totalamount('mrp1');" class="input2" style="width:105px;" /></td>
                        <td width="48"><input type="text" name="amount1" id="amount1" class="input2" readonly style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design2" type="text" class="series2" id="series2"  style="width:105px;"/></td>
                        <td><select name="grade2" class="grade2" id="grade2">
                            <option value="">select</option>
                            <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                            <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                            <?php } ?>
                          </select></td>
                        <td  class="pack2"></td>
                        <td><input type="text" name="totalbox2" id="totalbox2" class="totalbox2" onchange="boxcheck2()" onblur="boxcheck2()" onmouseout="boxcheck2()" onclick="boxcheck2()" onselect="boxcheck2()" style="width:105px;"/>
                          <span id="box2"></span></td>
                        <td class="mrp2"></td>
                        <td width="48"><input type="text" name="rate2" id="rate2" onchange="totalamount('mrp2');" onselect="totalamount('mrp2');"  onkeyup="totalamount('mrp2');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount2" id="amount2" class="input2" readonly style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design3" type="text" class="series3" id="series3"  style="width:105px;"/></td>
                        <td><select name="grade3" class="grade3" id="grade3">
                            <option value="">select</option>
                            <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                            <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                            <?php } ?>
                          </select></td>
                        <td  class="pack3"></td>
                        <td><input type="text" name="totalbox3" id="totalbox3" class="input2" onchange="boxcheck3()" onblur="boxcheck3()" onmouseout="boxcheck3()" onclick="boxcheck3()" onselect="boxcheck3()" style="width:105px;"/>
                          <span id="box3"></span></td>
                        <td class="mrp3"></td>
                        <td width="48"><input type="text" name="rate3" id="rate3" onchange="totalamount('mrp3');" onselect="totalamount('mrp3');"  onkeyup="totalamount('mrp3');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount3" id="amount3" class="input2" readonly style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design4" type="text" class="series4" id="series4" style="width:105px;" /></td>
                        <td><select name="grade4" class="grade4" id="grade4">
                            <option value="">select</option>
                            <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                            <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                            <?php } ?>
                          </select></td>
                        <td  class="pack4"></td>
                        <td><input type="text" name="totalbox4" id="totalbox4" class="input2" onchange="boxcheck4()" onblur="boxcheck4()" onmouseout="boxcheck4()" onclick="boxcheck4()" onselect="boxcheck4()" style="width:105px;"/>
                          <span id="box4"></span></td>
                        <td class="mrp4"></td>
                        <td width="48"><input type="text" name="rate4" id="rate4" onchange="totalamount('mrp4');" onselect="totalamount('mrp4');"  onkeyup="totalamount('mrp4');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount4" id="amount4" class="input2" readonly style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design5" type="text" class="series5" id="series5" style="width:105px;"/></td>
                        <td><select name="grade5" class="grade5" id="grade5">
                            <option value="">select</option>
                            <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                            <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                            <?php } ?>
                          </select></td>
                        <td  class="pack5"></td>
                        <td><input type="text" name="totalbox5" id="totalbox5" class="input2" onchange="boxcheck5()" onblur="boxcheck5()" onmouseout="boxcheck5()" onclick="boxcheck5()" onselect="boxcheck5()" style="width:105px;"/>
                          <span id="box5"></span></td>
                        <td class="mrp5"></td>
                        <td width="48"><input type="text" name="rate5" id="rate5" onchange="totalamount('mrp5');" onselect="totalamount('mrp5');"  onkeyup="totalamount('mrp5');" class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount5" id="amount5" class="input2" readonly style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design6" type="text" class="series6" id="series6"  style="width:105px;"/></td>
                        <td><select name="grade6" class="grade6" id="grade6">
                            <option value="">select</option>
                            <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                            <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                            <?php } ?>
                          </select></td>
                        <td  class="pack6"></td>
                        <td><input type="text" name="totalbox6" id="totalbox6" class="input2" onchange="boxcheck6()" onblur="boxcheck6()" onmouseout="boxcheck6()" onclick="boxcheck6()" onselect="boxcheck6()" style="width:105px;"/>
                          <span id="box6"></span></td>
                        <td class="mrp6"></td>
                        <td width="48"><input type="text" name="rate6" id="rate6" onchange="totalamount('mrp6');" onselect="totalamount('mrp6');"  onkeyup="totalamount('mrp6');" class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount6" id="amount6" class="input2" readonly style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design7" type="text" class="series7" id="series7" style="width:105px;" /></td>
                        <td><select name="grade7" class="grade7" id="grade7">
                            <option value="">select</option>
                            <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                            <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                            <?php } ?>
                          </select></td>
                        <td  class="pack7"></td>
                        <td><input type="text" name="totalbox7" id="totalbox7" class="input2" onchange="boxcheck7()" onblur="boxcheck7()" onmouseout="boxcheck7()" onclick="boxcheck7()" onselect="boxcheck7()" style="width:105px;"/>
                          <span id="box7"></span></td>
                        <td class="mrp7"></td>
                        <td width="48"><input type="text" name="rate7" id="rate7" onchange="totalamount('mrp7');" onselect="totalamount('mrp7');"  onkeyup="totalamount('mrp7');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount7" id="amount7" class="input2" readonly style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design8" type="text" class="series8" id="series8" value="" style="width:105px;"/></td>
                        <td><select name="grade8" class="grade8" id="grade8">
                            <option value="">select</option>
                            <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                            <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                            <?php } ?>
                          </select></td>
                        <td  class="pack8"></td>
                        <td><input type="text" name="totalbox8" id="totalbox8" class="input2" onchange="boxcheck8()" onblur="boxcheck8()" onmouseout="boxcheck8()" onclick="boxcheck8()" onselect="boxcheck8()" style="width:105px;"/>
                          <span id="box8"></span></td>
                        <td class="mrp8"></td>
                        <td width="48"><input type="text" name="rate8" id="rate8" onchange="totalamount('mrp8');" onselect="totalamount('mrp8');"  onkeyup="totalamount('mrp8');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount8" id="amount8" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design9" type="text" class="series9" id="series9" value="" style="width:105px;"/></td>
                        <td><select name="grade9" class="grade9" id="grade9">
                            <option value="">select</option>
                            <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                            <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                            <?php } ?>
                          </select></td>
                        <td  class="pack9"></td>
                        <td><input type="text" name="totalbox9" id="totalbox9" class="input2" onchange="boxcheck9()" onblur="boxcheck9()" onmouseout="boxcheck9()" onclick="boxcheck9()" onselect="boxcheck9()" style="width:105px;"/>
                          <span id="box9"></span></td>
                        <td class="mrp9"></td>
                        <td width="48"><input type="text" name="rate9" id="rate9" onchange="totalamount('mrp9');" onselect="totalamount('mrp9');"  onkeyup="totalamount('mrp9');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount9" id="amount9" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design10" type="text" class="series10" id="series10" value="" style="width:105px;"/></td>
                        <td><select name="grade10" class="grade10" id="grade10">
                            <option value="">select</option>
                            <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                            <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                            <?php } ?>
                          </select></td>
                        <td  class="pack10"></td>
                        <td><input type="text" name="totalbox10" id="totalbox10" class="input2" onchange="boxcheck10()" onblur="boxcheck10()" onmouseout="boxcheck10()" onclick="boxcheck10()" onselect="boxcheck10()" style="width:105px;"/>
                          <span id="box10"></span></td>
                        <td class="mrp10"></td>
                        <td width="48"><input type="text" name="rate10" id="rate10" onchange="totalamount('mrp10');" onselect="totalamount('mrp10');"  onkeyup="totalamount('mrp10');"  class="input2" style="width:105px;" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount10" id="amount10" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design11" type="text" class="series11" id="series11" value="" style="width:105px;"/></td>
                        <td><select name="grade11" class="grade11" id="grade11">
                            <option value="">select</option>
                            <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                            <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                            <?php } ?>
                          </select></td>
                        <td  class="pack11"></td>
                        <td><input type="text" name="totalbox11" id="totalbox11" class="input2" onchange="boxcheck11()" onblur="boxcheck11()" onmouseout="boxcheck11()" onclick="boxcheck11()" onselect="boxcheck11()" style="width:105px;"/>
                          <span id="box11"></span></td>
                        <td class="mrp11"></td>
                        <td width="48"><input type="text" name="rate11" id="rate11" onchange="totalamount('mrp11');" onselect="totalamount('mrp11');"  onkeyup="totalamount('mrp11');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount11" id="amount11" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design12" type="text" class="series12" id="series12" value="" style="width:105px;"/></td>
                        <td><select name="grade12" class="grade12" id="grade12">
                            <option value="">select</option>
                            <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                            <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                            <?php } ?>
                          </select></td>
                        <td  class="pack12"></td>
                        <td><input type="text" name="totalbox12" id="totalbox12" class="input2" onchange="boxcheck12()" onblur="boxcheck12()" onmouseout="boxcheck12()" onclick="boxcheck12()" onselect="boxcheck12()" style="width:105px;"/>
                          <span id="box12"></span></td>
                        <td class="mrp12"></td>
                        <td width="48"><input type="text" name="rate12" id="rate12" onchange="totalamount('mrp12');" onselect="totalamount('mrp12');"  onkeyup="totalamount('mrp12');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount12" id="amount12" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design13" type="text" class="series13" id="series13" value="" style="width:105px;"/></td>
                        <td><select name="grade13" class="grade13" id="grade13">
                            <option value="">select</option>
                            <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                            <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                            <?php } ?>
                          </select></td>
                        <td  class="pack13"></td>
                        <td><input type="text" name="totalbox13" id="totalbox13" class="input2" onchange="boxcheck13()" onblur="boxcheck13()" onmouseout="boxcheck13()" onclick="boxcheck13()" onselect="boxcheck13()" style="width:105px;"/>
                          <span id="box13"></span></td>
                        <td class="mrp13"></td>
                        <td width="48"><input type="text" name="rate13" id="rate13" onchange="totalamount('mrp13');" onselect="totalamount('mrp13');"  onkeyup="totalamount('mrp13');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount13" id="amount13" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design14" type="text" class="series14" id="series14" value="" style="width:105px;"/></td>
                        <td><select name="grade14" class="grade14" id="grade14">
                            <option value="">select</option>
                            <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                            <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                            <?php } ?>
                          </select></td>
                        <td  class="pack14"></td>
                        <td><input type="text" name="totalbox14" id="totalbox14" class="input2" onchange="boxcheck14()" onblur="boxcheck14()" onmouseout="boxcheck14()" onclick="boxcheck14()" onselect="boxcheck14()" style="width:105px;"/>
                          <span id="box14"></span></td>
                        <td class="mrp14"></td>
                        <td width="48"><input type="text" name="rate14" id="rate14" onchange="totalamount('mrp14');" onselect="totalamount('mrp14');"  onkeyup="totalamount('mrp14');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount14" id="amount14" readonly class="input2" style="width:105px;" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design15" type="text" class="series15" id="series15" value="" style="width:105px;"/></td>
                        <td><select name="grade15" class="grade15" id="grade15">
                            <option value="">select</option>
                            <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                            <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                            <?php } ?>
                          </select></td>
                        <td  class="pack15"></td>
                        <td><input type="text" name="totalbox15" id="totalbox15" class="input2" onchange="boxcheck15()" onblur="boxcheck15()" onmouseout="boxcheck15()" onclick="boxcheck15()" onselect="boxcheck15()" style="width:105px;"/>
                          <span id="box15"></span></td>
                        <td class="mrp15"></td>
                        <td width="48"><input type="text" name="rate15" id="rate15" onchange="totalamount('mrp15');" onselect="totalamount('mrp15');"  onkeyup="totalamount('mrp15');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount15" id="amount15" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design16" type="text" class="series16" id="series16" value="" style="width:105px;"/></td>
                        <td><select name="grade16" class="grade16" id="grade16">
                            <option value="">select</option>
                            <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                            <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                            <?php } ?>
                          </select></td>
                        <td  class="pack16"></td>
                        <td><input type="text" name="totalbox16" id="totalbox16" class="input2" onchange="boxcheck16()" onblur="boxcheck16()" onmouseout="boxcheck16()" onclick="boxcheck16()" onselect="boxcheck16()" style="width:105px;"/>
                          <span id="box16"></span></td>
                        <td class="mrp16"></td>
                        <td width="48"><input type="text" name="rate16" id="rate16" onchange="totalamount('mrp16');" onselect="totalamount('mrp16');"  onkeyup="totalamount('mrp16');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount16" id="amount16" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design17" type="text" class="series17" id="series17" value="" style="width:105px;"/></td>
                        <td><select name="grade17" class="grade17" id="grade17">
                            <option value="">select</option>
                            <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                            <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                            <?php } ?>
                          </select></td>
                        <td  class="pack17"></td>
                        <td><input type="text" name="totalbox17" id="totalbox17" class="input2" onchange="boxcheck17()" onblur="boxcheck17()" onmouseout="boxcheck17()" onclick="boxcheck17()" onselect="boxcheck17()" style="width:105px;"/>
                          <span id="box17"></span></td>
                        <td class="mrp17"></td>
                        <td width="48"><input type="text" name="rate17" id="rate17" onchange="totalamount('mrp17');" onselect="totalamount('mrp17');"  onkeyup="totalamount('mrp17');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount17" id="amount17" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design18" type="text" class="series18" id="series18" value="" style="width:105px;"/></td>
                        <td><select name="grade18" class="grade18" id="grade18">
                            <option value="">select</option>
                            <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                            <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                            <?php } ?>
                          </select></td>
                        <td  class="pack18"></td>
                        <td><input type="text" name="totalbox18" id="totalbox18" class="input2" onchange="boxcheck18()" onblur="boxcheck18()" onmouseout="boxcheck18()" onclick="boxcheck18()" onselect="boxcheck18()" style="width:105px;"/>
                          <span id="box18"></span></td>
                        <td class="mrp18"></td>
                        <td width="48"><input type="text" name="rate18" id="rate18" onchange="totalamount('mrp18');" onselect="totalamount('mrp18');"  onkeyup="totalamount('mrp18');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount18" id="amount18" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design19" type="text" class="series19" id="series19" value="" style="width:105px;"/></td>
                        <td><select name="grade19" class="grade19" id="grade19">
                            <option value="">select</option>
                            <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                            <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                            <?php } ?>
                          </select></td>
                        <td  class="pack19"></td>
                        <td><input type="text" name="totalbox19" id="totalbox19" class="input2" onchange="boxcheck19()" onblur="boxcheck19()" onmouseout="boxcheck19()" onclick="boxcheck19()" onselect="boxcheck19()" style="width:105px;"/>
                          <span id="box19"></span></td>
                        <td class="mrp19"></td>
                        <td width="48"><input type="text" name="rate19" id="rate19" onchange="totalamount('mrp19');" onselect="totalamount('mrp19');"  onkeyup="totalamount('mrp19');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount19" id="amount19" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design20" type="text" class="series20" id="series20" value="" style="width:105px;"/></td>
                        <td><select name="grade20" class="grade20" id="grade20">
                            <option value="">select</option>
                            <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                            <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                            <?php } ?>
                          </select></td>
                        <td  class="pack20"></td>
                        <td><input type="text" name="totalbox20" id="totalbox20" class="input2" onchange="boxcheck20()" onblur="boxcheck20()" onmouseout="boxcheck20()" onclick="boxcheck20()" onselect="boxcheck20()" style="width:105px;"/>
                          <span id="box20"></span></td>
                        <td class="mrp20"></td>
                        <td width="48"><input type="text" name="rate20" id="rate20" onchange="totalamount('mrp20');" onselect="totalamount('mrp20');"  onkeyup="totalamount('mrp20');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount20" id="amount20" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td>Total</td>
                        <td></td>
                        <td></td>
                        <td><input type="text" readonly name="box" id="box" style="width:105px;"/></td>
                        <td></td>
                        <td></td>
                        <td><input type="text" readonly name="subtotal" id="subtotal" style="width:105px;"/></td>
                      </tr>
                    </tbody>
                    
                    
                  </table>
                  <table class="table table-striped">
  <tr>
  	<td colspan="2">PDC Information</td>
    <td>Discount %: <input type="text" name="discount" id="discount"  onchange="discount1()" onselect="discount1()" style="width:20px;" value="0" /></td><td> <input type="text" name="discountam" id="discountam"  readonly="readonly" /></td>
  </tr>
  <tr>
  <td>Cheque No.</td><td><span id="">
    <input type="text" name="checkno" id="checkno" required />
    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    <td>Execise Duty@12.5%:</td><td> <input type="text" name="excise" id="excise" readonly /></td>
  </tr>
  <tr>
  <td>Cheque Date</td><td><span id="">
    <input type="text" name="checkdate" id="checkdate" required/>
    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    <td>Sub Total :</td><td><input type="text" readonly name="subtotalexcise" id="excisesub" /></td>
  </tr>
  <tr>
  <td>Cheque Amount</td><td><span id="">
    <input type="text" name="checkamount" id="checkamt" required/>
    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    <td>VAT @ 14.50%/CST @ 2%</td><td><input type="text" name="vat" id="vat" readonly /></td>
  </tr>
  
  <tr>
  	<td>Bank Name</td><td><span id="">
  	  <input type="text" name="bankname" id="bankname" required/>
  	  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    <td> Total Amount Rs:</td><td><input type="text" name="totalam" id="roundoff" readonly  /></td>
  </tr>
  <tr>
  <td>Bank Branch </td><td><span id="">
    <input type="text" name="bankbranch" id="bankbranch" required/>
    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
   <td>Round Amount Rs</td>
  <td>  <input type="text" name="totalamount1" readonly style="font:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:16px; color:#03F" id="totalamount1"/> </td> 
  </tr>
  <tr>
  <td>Cheque Copy</td><td>
    <span id="">
    <input type="file" name="check" required/>
    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    <td>Rs in Word:-</td><td><textarea name="rswords" id="rswords"></textarea></td>
  </tr>
  
  <tr>
  	<td >Remarks:</td><td> <textarea name="remarks" style="width:300px !important"></textarea></td>
    <td >Outstanding:</td><td> <textarea name="outstanding" style="width:300px !important"></textarea></td>
  </tr>
  <tr>
  	
  </tr>
  <tr><td colspan="3" align="center"> <input type="submit" name="purchase" value="Submit"  /></td><td><a href="home.php" target="_self">Back</a></td></tr>
     </table>
     
                  <!--<div class="row">
                    <div class="col-lg-12 remittance">
                      <h5>Please remit payment to:</h5>
                      <ul>
                        <li>HSBC Trinkaus & Burkhardt</li>
                        <li>Konto: 11 71 60 08</li>
                        <li>IBAN: DE04 3003 0880 0011 7160 08</li>
                        <li>BIC (Swift): TUBDDEDD</li>
                        <li>BLZ 300 308 80</li>
                      </ul>
                    </div>
                  </div>-->
                </div>
                </form>
              </div>
            </div>
          </div>
          <!-- /End Widget --> 
          
        </div>
        <!-- /Inner Row Col-md-12 --> 
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