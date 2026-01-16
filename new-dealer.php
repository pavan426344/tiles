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
<title>Dealer | Forms</title>
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
<script type="text/javascript">
$(document).ready(function()
{
$(".GST").change(function()
{
var dataString = 'gst='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_delgstcheck.php",
data: dataString,
cache: false,
success: function(html)
{
$(".gstcheck").html(html);
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
            <li class="active">New Dealer</li>
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
             <h1>Dealer<small>form</small></h1>
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
		$files='';$appoint='';
		/*if ($_FILES['tincert']['error'] > 0)
		  {
			  echo "Error: " . $_FILES['tincert']['error']."<br>";
		  }
		else
		  {
		  $files=$_FILES['tincert']['name'];
		   if (file_exists("dealer/tin/".$_FILES['tincert']['name']))
     		 {
     		 echo $_FILES['tincert']['name']. " already exists. ";
		  	}
			else
		  	{
		  	move_uploaded_file($_FILES['tincert']['tmp_name'],
		  	"dealer/tin/". $_FILES['tincert']['name']);
		 		$files=$_FILES['tincert']['name'];
		  	}
	  }
	  if ($_FILES['appoint']['error'] > 0)
		  {
			  echo "Error: " . $_FILES['appoint']['error'] . "<br>";
		  }
		else
		  {
		  $appoint=$_FILES['appoint']['name'];
		   if (file_exists("dealer/appoint/" .$_FILES['appoint']['name']))
     		 {
     		 echo $_FILES['appoint']['name']. " already exists. ";
		  }
		else
		  {
		  move_uploaded_file($_FILES["appoint"]["tmp_name"],
		  "dealer/appoint/" .$_FILES['appoint']['name']);
		 $appoint=$_FILES['appoint']['name'];
		  }
	  }*/
	  
	    $ex= explode('-',$_REQUEST['executive']);
		
		$executive_name="";
		$executive_contact="";
		$executive_uname="";
		$select_executive=mysqli_query($con,"select * from userregistration where username='$ex[0]'");
		while($select_executive_row=mysqli_fetch_array($select_executive))
		{
		   $executive_name=$select_executive_row['Name'];	 
		   $executive_contact=$select_executive_row['Phone'];
		   $executive_uname=$select_executive_row['username'];
		}
		$dealer=mysqli_query($con,"insert into dealer(CompanyName,centre,Name,Aadhar_no,Aadhar_address,Address,City,State,Country,Pincode,Phone,Mobile,Fax,Email,TIN,CST,gstin_uin,PAN,AnnualTurnover,letter,NameOfAcc,BankName,AccNo,Branch,cheque_no,SignAuth,Dealership,DateOfRegistration,executive,executivecontact,executiveusername,remarks,ReferUser_id,Status) values('$_REQUEST[CompanyName]','$_REQUEST[centre]','$_REQUEST[Name]','$_REQUEST[Aadhar_no]','$_REQUEST[Aadhar_address]','$_REQUEST[Address]','$_REQUEST[City]','$_REQUEST[State]','$_REQUEST[Country]','$_REQUEST[Pincode]','$_REQUEST[Phone]','$_REQUEST[Mobile]','','$_REQUEST[Email]','$_REQUEST[TIN]','$_REQUEST[CST]','$_REQUEST[GST]','$_REQUEST[PAN]','$_REQUEST[AnnualTurnover]','$appoint','$_REQUEST[NameOfAcc]','$_REQUEST[BankName]','$_REQUEST[AccNo]','$_REQUEST[Branch]','$_REQUEST[IFCI]','$_REQUEST[SignAuth]','$_REQUEST[Dealership]','$date','$executive_name','$executive_contact','$executive_uname','','$username',0)");
		
		if($dealer==1)
		{
                        $date=date("Y-m-d");
                        $dealer_id="";
                        $dealer_name="";
                        $centre="";
                        $select_dealer=mysqli_query($con,"select * from dealer where CompanyName='$_REQUEST[CompanyName]' and centre='$_REQUEST[centre]'");
                        while($select_dealer_row=mysqli_fetch_array($select_dealer))
                        {
                            $dealer_id=$select_dealer_row['Dealer_id'];
                            $dealer_name=$select_dealer_row['CompanyName'];
                            $centre=$select_dealer_row['centre'];
                        }
                        $dealer_cheque=mysqli_query($con,"INSERT INTO dealer_security_cheque(dealer_id,dealer_name,centre,NameOfAcc,BankName,AccNo,Branch,cheque_no,SignAuth,addate) VALUES ('$dealer_id','$dealer_name','$centre','$_REQUEST[NameOfAcc]','$_REQUEST[BankName]','$_REQUEST[AccNo]','$_REQUEST[Branch]','$_REQUEST[IFCI]','$_REQUEST[SignAuth]','$date');");
			$file='';
			echo "<script>alert('Successfully Submit');document.location='dealer-list.php';</script>";	
		}
		else
		{
			echo "<script>alert('Try Again');document.location='new-dealer.php';</script>";		
		}
	}
	
	
  ?>
          <!-- New widget -->
          <?php
		  if(isset($_REQUEST['eid']))
		  {
			$select_dealer=mysqli_query($con,"select * from dealer where Dealer_id='$_REQUEST[eid]'");
			while($select_dealer_row=mysqli_fetch_array($select_dealer))
			{  
		  ?>
           <div class="col-md-6  bootstrap-grid">
            <div class="powerwidget green" id="most-form-elements" data-widget-editbutton="false">
              
              <div class="inner-spacer">
                <form action="dealer-list.php" method="post" enctype="multipart/form-data" class="orb-form">
                  <fieldset >
                   
                    <section>
                      <label class="label">Company Name</label>
                      <label class="input">
                        <input type="text" name="CompanyName" value="<?php echo $select_dealer_row['CompanyName'];?>" required/>
                      </label>
                      
                    </section>
                    <section>
                      <label class="label">Centre</label>
                      <label class="input">
                        <input type="text" name="centre" value="<?php echo $select_dealer_row['centre'];?>" required />
                      </label>
                      
                    </section>
                    <section>
                      <label class="label">Contact Person</label>
                      <label class="input">
                        <input type="text" name="Name" value="<?php echo $select_dealer_row['Name'];?>" required />
                      </label>
                      
                    </section>
                    <section>
                      <label class="label">Aadhar No.</label>
                      <label class="input">
                        <input type="text" name="Aadhar_no" pattern="[0-9]{12}" value="<?php echo $select_dealer_row['Aadhar_no'];?>" required />
                      </label>
                      
                    </section> 
                      <section>
                      <label class="label">Aadhar Address</label>
                      <label class="textarea">
                        <textarea rows="3" name="Aadhar_address" required><?php echo $select_dealer_row['Aadhar_address'];?></textarea>
                      </label>
                      
                    </section>
                    <section>
                      <label class="label">Address</label>
                      <label class="textarea">
                        <textarea rows="3" name="Address" required><?php echo $select_dealer_row['Address'];?></textarea>
                      </label>
                      
                    </section>
                    <section>
                      <label class="label">City</label>
                      <label class="input">
                        <input type="text" name="City" size="54" value="<?php echo $select_dealer_row['City'];?>" required />
                      </label>
                    </section>
                    <section>
                      <label class="label">State</label>
                      <label class="select">
                        <select name="State" required> 
                        	<option value="<?php echo $select_dealer_row['State'];?>" selected><?php echo $select_dealer_row['State'];?></option>
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
                      <label class="label">Country</label>
                      <label class="input">
                        <input type="text" name="Country" size="54" value="<?php echo $select_dealer_row['Country'];?>" required />
                      </label>
                    </section>
                    <section>
                      <label class="label">Pin Code</label>
                      <label class="input">
                        <input type="text" name="Pincode" pattern="[0-9]{6}" size="54" value="<?php echo $select_dealer_row['Pincode'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Email</label>
                      <label class="input">
                        <input type="text" name="Email"  size="54" value="<?php echo $select_dealer_row['Email'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Phone No.</label>
                      <label class="input">
                        <input type="text" name="Phone" pattern="[0-9]{10,12}" value="<?php echo $select_dealer_row['Phone'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Mobile No.</label>
                      <label class="input">
                        <input type="text" name="Mobile" pattern="[0-9]{10,12}" value="<?php echo $select_dealer_row['Mobile'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">TIN</label>
                      <label class="input">
                        <input type="text" name="TIN" id="TIN" size="54" class="TIN" onkeyup="" value="<?php echo $select_dealer_row['TIN'];?>" required>
                        <span id="tincheck" class="tincheck"></span>
                      </label>
                    </section>
                    <!--<section>
                      <label class="label">TIN Certificate</label>
                      <label for="file" class="input input-file">
                      <div class="button">
                        <input type="file" id="file" name="tincer" required>
                        Browse</div>
                      <input type="text" readonly>
                      </label>
                    </section>-->
                    <section>
                      <label class="label">CST</label>
                      <label class="input">
                        <input type="text" name="CST" value="<?php echo $select_dealer_row['CST'];?>" required>
                      </label>
                    </section>
                      <section>
                      <label class="label">GSTIN / UIN No.</label>
                      <label class="input">
                          <input type="text" name="GST" id="GST" class="GST" value="<?php echo $select_dealer_row['gstin_uin'];?>" required>
                          <span id="gstcheck" class="gstcheck"></span>
                      </label>
                    </section>
                    <section>
                      <label class="label">PAN</label>
                      <label class="input">
                        <input type="text" name="PAN" value="<?php echo $select_dealer_row['PAN'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Annual Turnover</label>
                      <label class="input">
                        <input type="text" name="AnnualTurnover" value="<?php echo $select_dealer_row['AnnualTurnover'];?>">
                      </label>
                    </section>
                    <section>
                      <label class="label">Having Dealership</label>
                      <label class="input">
                        <input type="text" name="Dealership" pattern="{7,12}" value="<?php echo $select_dealer_row['Dealership'];?>">
                      </label>
                    </section>
                    <section>
                      <label class="label">Executive</label>
                      <label class="input">
                     
                        <input type="text" list="list1" name="executive" value="<?php echo $select_dealer_row['executiveusername'];?>">
                        <datalist id="list1">
                        <?php
						$select_executive_repl=mysqli_query($con,"select * from userregistration");
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
                  
                  <input type="hidden" name="updid" value="<?php echo $_REQUEST['eid'];?>">
                  
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
                <form action="new-dealer.php" method="post" enctype="multipart/form-data" class="orb-form">
                  <fieldset >
                   
                    <section>
                      <label class="label">Company Name</label>
                      <label class="input">
                          <input type="text" name="CompanyName" required pattern="[a-zA-Z][a-zA-Z0-9\s]*" />
                      </label>
                      
                    </section>
                    <section>
                      <label class="label">Centre</label>
                      <label class="input">
                        <input type="text" name="centre" required />
                      </label>
                      
                    </section>
                    <section>
                      <label class="label">Contact Person</label>
                      <label class="input">
                        <input type="text" name="Name" required />
                      </label>
                      
                    </section>
                    <section>
                      <label class="label">Aadhar No.</label>
                      <label class="input">
                        <input type="text" name="Aadhar_no"  required />
                      </label>
                      
                    </section> 
                      <section>
                      <label class="label">Aadhar Address</label>
                      <label class="textarea">
                        <textarea rows="3" name="Aadhar_address" required></textarea>
                      </label>
                      
                    </section>  
                    <section>
                      <label class="label">Address</label>
                      <label class="textarea">
                        <textarea rows="3" name="Address" required></textarea>
                      </label>
                      
                    </section>
                    <section>
                      <label class="label">City</label>
                      <label class="input">
                        <input type="text" name="City" size="54" required />
                      </label>
                    </section>
                    <section>
                      <label class="label">State</label>
                      <label class="select">
                        <select name="State" required> 
                        	<option value="" selected>Select</option>
                        	<?php
                            $select_state=mysqli_query($con,"select * from t_state");
                            while($row_state=mysqli_fetch_array($select_state))
                            {        
                            ?>
                            <option value="<?php echo $row_state['T_State_Name'];?>" ><?php echo $row_state['T_State_Name'];?></option>
                            <?php
                            }
                            ?>
                         </select>
                        <i></i> </label>
                    </section>
                    <section>
                      <label class="label">Country</label>
                      <label class="input">
                        <input type="text" name="Country" size="54" required />
                      </label>
                    </section>
                    <section>
                      <label class="label">Pin Code</label>
                      <label class="input">
                        <input type="text" name="Pincode" pattern="[0-9]{6}" size="54" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Email</label>
                      <label class="input">
                        <input type="text" name="Email"  size="54" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Phone No.</label>
                      <label class="input">
                        <input type="text" name="Phone" pattern="[0-9]{10,12}" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Mobile No.</label>
                      <label class="input">
                        <input type="text" name="Mobile" pattern="[0-9]{10,12}" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">TIN</label>
                      <label class="input">
                        <input type="text" name="TIN" id="TIN" size="54" class="TIN" onkeyup="" required>
                        <span id="tincheck" class="tincheck"></span>
                      </label>
                    </section>
                    <!--<section>
                      <label class="label">TIN Certificate</label>
                      <label for="file" class="input input-file">
                      <div class="button">
                        <input type="file" id="file" name="tincer" required>
                        Browse</div>
                      <input type="text" readonly>
                      </label>
                    </section>-->
                    <section>
                      <label class="label">CST</label>
                      <label class="input">
                        <input type="text" name="CST" required>
                      </label>
                    </section>
                      <section>
                      <label class="label">GSTIN / UIN No.</label>
                      <label class="input">
                          <input type="text" name="GST" id="GST" class="GST" required>
                          <span id="gstcheck" class="gstcheck"></span>
                      </label>
                    </section>
                    <section>
                      <label class="label">PAN</label>
                      <label class="input">
                        <input type="text" name="PAN" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Annual Turnover</label>
                      <label class="input">
                        <input type="text" name="AnnualTurnover">
                      </label>
                    </section>
                    
                    
                  </fieldset>
                  
                  <fieldset>
                  <legend>Security Cheque Detail</legend>
                  <section>
                      <label class="label">Bank Name</label>
                      <label class="input">
                        <input type="text" name="BankName" size="54" required >
                      </label>
                    </section>
                    <section>
                      <label class="label">Account Name</label>
                      <label class="input">
                        <input type="text" name="NameOfAcc" size="54" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Account No</label>
                      <label class="input">
                        <input type="text" pattern="[0-9]{05,20}" name="AccNo">
                      </label>
                    </section>
                    <section>
                      <label class="label">Branch</label>
                      <label class="input">
                        <input type="text" name="Branch" size="54" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Cheque No.</label>
                      <label class="input">
                        <input type="text" name="IFCI" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Signing Authority</label>
                      <label class="input">
                        <input type="text" name="SignAuth" pattern="{7,12}">
                      </label>
                    </section>
                    <section>
                      <label class="label">Having Dealership</label>
                      <label class="input">
                        <input type="text" name="Dealership" pattern="{7,12}">
                      </label>
                    </section>
                    <section>
                      <label class="label">Executive</label>
                      <label class="input">
                        <input type="text" list="list1" name="executive">
                        <datalist id="list1">
                        <?php
						$select_executive_repl=mysqli_query($con,"select * from userregistration");
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