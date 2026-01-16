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
<title>Executive | Forms</title>
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
             <?php
		  if(isset($_REQUEST['eid']))
		  {
			  ?>
             <li class="active">Update Executive</li>
              <?php
		  }
		  else
		  {
			  ?>
             <li class="active">New Executive</li>
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
              <h1>Executive<small>Update</small></h1>
              <?php
		  }
		  else
		  {
			  ?>
              <h1>Executive<small>Form</small></h1>
              <?php
			  
		  }
		  ?>
        </div>
        
        <!-- Widget Row Start grid -->
        <div class="row" id="powerwidgets">
          
          <?php
	if(isset($_REQUEST['submit']))
	{
	    if($_REQUEST['replace_executive']!=null)
		{
		
		$replace_executive= split('\-',$_REQUEST['replace_executive']);
		
		$replace_id=0;
		$user_replace_name="";
		$select_executive=mysqli_query($con,"select * from userregistration where username='$replace_executive[0]'");
		while($select_executive_row=mysqli_fetch_array($select_executive))
		{
		  $replace_id=$select_executive_row['UserRegistration_id'];
		  $user_replace_name=$select_executive_row['username'];
		}
		
		$name=$_REQUEST['Name'];
		$address=$_REQUEST['Address'];
		$city=$_REQUEST['City'];
		$state=$_REQUEST['State'];
		$country=$_REQUEST['Country'];
		$pincode=$_REQUEST['Pincode'];
		$email=$_REQUEST['Email'];
		$phone=$_REQUEST['Phone'];
		$phone1=$_REQUEST['Phone1'];
		$designation=$_REQUEST['Designation'];
		$dob=$_REQUEST['dob'];
		$religious=$_REQUEST['Religious'];
		$Idproofname1=$_REQUEST['Idproofname1'];
		$Idproofpath1=$_REQUEST['Idproofpath1'];
		$Idproof1=$_REQUEST['Idproof1'];
		$Idproofname2=$_REQUEST['Idproofname2'];
		$Idproofpath2=$_REQUEST['Idproofpath2'];
		$Idproof2=$_REQUEST['Idproof2'];
		$previousCompany=$_REQUEST['PreviousCompany'];
		$salary=$_REQUEST['Salary'];
		$HQ=$_REQUEST['HQ'];
		$MobileBill=$_REQUEST['MobileBill'];
		$ta=$_REQUEST['TA'];
		$da=$_REQUEST['DA'];
		$workaddress=$_REQUEST['WorkAddress'];
		$workbranch=$_REQUEST['WorkBranch'];
		$workcity=$_REQUEST['WorkCity'];
		$workstate=$_REQUEST['WorkState'];
		$workcountry=$_REQUEST['WorkCountry'];
		$workpincode=$_REQUEST['WorkPincode'];
		$workphone=$_REQUEST['WorkPhone'];
		$workemail=$_REQUEST['WorkEmail'];
		$bankname=$_REQUEST['BankName'];
		$accno=$_REQUEST['AccNo'];
		$branch=$_REQUEST['BankBranch'];
		$ifci=$_REQUEST['IFCI'];
		$empcode=substr($username,0,2).rand(1,4);
		$underemp=$_REQUEST['underexecutive'];
		$date=date("Y-m-d");
		$RegisterationDate=$date;
		$registeras=$_REQUEST['RegisterAs'];
		$Username=$_REQUEST['UserName'];
		$empcode=substr($_REQUEST['UserName'],0,2).rand(1,4);
		
		if ($_FILES['appoint']['error'] > 0)
		  {
			  echo "Error: " . $_FILES['appoint']['error'] . "<br>";
		  }
		else
		  {
		  $files=$_FILES['appoint']['name'];
		   if (file_exists("exe/appoint/" . $_FILES['appoint']['name']))
     		 {
     		 echo $_FILES['appoint']['name']." already exists. ";
		  }
		else
		  {
		  move_uploaded_file($_FILES['appoint']['tmp_name'],
		  "exe/appoint/".$_FILES['appoint']['name']);
		 	 $files=$_FILES['appoint']['name'];
		  }
	  }
		$under_ex= split('\-',$_REQUEST['underexecutive']);
		
		$Registercon=mysqli_query($con,"UPDATE userregistration SET Name='$name',Address='$address',City='$city',State='$state',Country='$country',Pincode='$pincode',Email='$email',Phone='$phone',Phone1='$phone1',DOB='$dob',Religious='$religious',Idproofname1='$_REQUEST[Idproofname1]',Idproofpath1='$_REQUEST[Idproofpath1]',Idproof1='$_REQUEST[Idproof1]',Idproofname2='$_REQUEST[IdProofname2]',Idproofpath2='$_REQUEST[Idproofpath2]',Idproof2='$_REQUEST[Idproof2]',Designation='$designation',PreviousCompany='$previousCompany',Salary=$salary,HQ='$HQ',MobileBill='$MobileBill',TA='$ta',DA='$da',WorkAddress='$workaddress',WorkBranch='$workbranch',WorkCity='$workcity',WorkState='$workstate',WorkCountry='$workcountry',WorkPincode=$workpincode,WorkPhone='$workphone',WorkEmail='$workemail',EmpCode='$empcode',RefEmpUsername='$refempcode',letter='$files',remarks='$_REQUEST[remarks]',BankName='$bankname',AccName='$_REQUEST[AccName]',AccNo='$accno',Branch='$branch',IFCI='$ifci',RegistrationDate='$date',uexecutive='$under_ex[0]',UserType=$registeras,username='$Username' WHERE UserRegistration_id='$replace_id'");
		$loginmod1=mysqli_query($con,"UPDATE userlogin SET User_Name='$Username',Pass_Word='$_REQUEST[Password]',UserType='$registeras' WHERE User_Name='$user_replace_name'");	
		$update_dealer=mysqli_query($con,"update dealer set executive='$name',executivecontact='$phone',executiveusername='$Username' where executiveusername='$user_replace_name'");  
		
		
		}
		else
		{
		$name=$_REQUEST['Name'];
		$address=$_REQUEST['Address'];
		$city=$_REQUEST['City'];
		$state=$_REQUEST['State'];
		$country=$_REQUEST['Country'];
		$pincode=$_REQUEST['Pincode'];
		$email=$_REQUEST['Email'];
		$phone=$_REQUEST['Phone'];
		$phone1=$_REQUEST['Phone1'];
		$designation=$_REQUEST['Designation'];
		$dob=$_REQUEST['dob'];
		$religious=$_REQUEST['Religious'];
		$Idproofname1=$_REQUEST['Idproofname1'];
		//$Idproofpath1=$_REQUEST['Idproofpath1'];
		$Idproof1=$_REQUEST['Idproof1'];
		$Idproofname2=$_REQUEST['Idproofname2'];
		//$Idproofpath2=$_REQUEST['Idproofpath2'];
		$Idproof2=$_REQUEST['Idproof2'];
		$previousCompany=$_REQUEST['PreviousCompany'];
		$salary=$_REQUEST['Salary'];
		$HQ=$_REQUEST['HQ'];
		$MobileBill=$_REQUEST['MobileBill'];
		$ta=$_REQUEST['TA'];
		$da=$_REQUEST['DA'];
		$workaddress=$_REQUEST['WorkAddress'];
		$workbranch=$_REQUEST['WorkBranch'];
		$workcity=$_REQUEST['WorkCity'];
		$workstate=$_REQUEST['WorkState'];
		$workcountry=$_REQUEST['WorkCountry'];
		$workpincode=$_REQUEST['WorkPincode'];
		$workphone=$_REQUEST['WorkPhone'];
		$workemail=$_REQUEST['WorkEmail'];
		$bankname=$_REQUEST['BankName'];
		$accno=$_REQUEST['AccNo'];
		$branch=$_REQUEST['BankBranch'];
		$ifci=$_REQUEST['IFCI'];
		$empcode=substr($username,0,2).rand(1,4);
		$underemp=$_REQUEST['underexecutive'];
		$date=date("Y-m-d");
		$RegisterationDate=$date;
		$registeras=$_REQUEST['RegisterAs'];
		$Username=$_REQUEST['UserName'];
		$empcode=substr($_REQUEST['UserName'],0,2).rand(1,4);
		
		if ($_FILES['appoint']['error'] > 0)
		  {
			  echo "Error: " . $_FILES['appoint']['error'] . "<br>";
		  }
		else
		  {
		  $files=$_FILES['appoint']['name'];
		   if (file_exists("exe/appoint/" . $_FILES['appoint']['name']))
     		 {
     		 echo $_FILES['appoint']['name']." already exists. ";
		  }
		else
		  {
		  move_uploaded_file($_FILES['appoint']['tmp_name'],
		  "exe/appoint/".$_FILES['appoint']['name']);
		 	 $files=$_FILES['appoint']['name'];
		  }
	  }
		$under_ex= explode('-',$_REQUEST['underexecutive']);
		$Registercon=mysqli_query($con,"insert into userregistration(Name,Address,City,State,Country,Pincode,Email,Phone,Phone1,DOB,Religious,Idproofname1,Idproofpath1,Idproof1,Idproofname2,Idproofpath2,Idproof2,Designation,PreviousCompany,Salary,HQ,MobileBill,TA,DA,WorkAddress,WorkBranch,WorkCity,WorkState,WorkCountry,WorkPincode,WorkPhone,WorkEmail,EmpCode,RefEmpUsername,letter,remarks,BankName,AccName,AccNo,Branch,IFCI,RegistrationDate,uexecutive,UserType,username) values('$name','$address','$city','$state','$country',$pincode,'$email','$phone','$phone1','$dob','$religious','$_REQUEST[Idproofname1]','null','$_REQUEST[Idproof1]','$_REQUEST[Idproofname2]','null','$_REQUEST[Idproof2]','$designation','$previousCompany',$salary,'$HQ','$MobileBill','$ta','$da','$workaddress','$workbranch','$workcity','$workstate','$workcountry',$workpincode,'$workphone','$workemail','$empcode','null','$files','$_REQUEST[remarks]','$bankname','$_REQUEST[AccName]','$accno','$branch','$ifci','$date','$under_ex[0]',$registeras,'$Username')");	
		//login Set
		if($Registercon==1)
		{
			$loginmod=mysqli_query($con,"insert into userlogin(User_Name,Pass_Word,UserType) values('$Username','$_REQUEST[Password]',$registeras)");
			
			$insertprofile=mysqli_query($con,"");
			if($loginmod==1)
			{
				
			}
			else
			{
				echo "<script>alert('Error In Registration. Tray Again');document.location='new-executive.php';</script>";
			}
		}
		else
		{
			echo "<script>alert('Error In Registration. Tray Again');document.location='new-executive.php';</script>";	
		}
		}
	}
	
	if(isset($_REQUEST['update']))
	{   $under_ex= explode('-',$_REQUEST['underexecutive']);
		$exeupdate=mysqli_query($con,"update userregistration set Name='$_REQUEST[Name]',Address='$_REQUEST[Address]',City='$_REQUEST[City]',State='$_REQUEST[State]',Country='$_REQUEST[Country]',Pincode='$_REQUEST[Pincode]',Email='$_REQUEST[Email]',Phone='$_REQUEST[Phone]',Phone1='$_REQUEST[Phone1]',DOB='$_REQUEST[dob]',Religious='$_REQUEST[Religious]',Designation='$_REQUEST[Designation]',PreviousCompany='$_REQUEST[PreviousCompany]',Salary='$_REQUEST[Salary]',HQ='$_REQUEST[HQ]',MobileBill='$_REQUEST[MobileBill]',TA='$_REQUEST[TA]',DA='$_REQUEST[DA]',WorkAddress='$_REQUEST[WorkAddress]',WorkBranch='$_REQUEST[WorkBranch]',WorkCity='$_REQUEST[WorkCity]',WorkState='$_REQUEST[WorkState]',WorkCountry='$_REQUEST[WorkCountry]',WorkPincode='$_REQUEST[WorkPincode]',WorkPhone='$_REQUEST[WorkPhone]',WorkEmail='$_REQUEST[WorkEmail]',remarks='$_REQUEST[remarks]',BankName='$_REQUEST[BankName]',AccName='$_REQUEST[AccName]',AccNo='$_REQUEST[AccNo]',Branch='$_REQUEST[BankBranch]',IFCI='$_REQUEST[IFCI]',uexecutive='$under_ex[0]',UserType='$_REQUEST[RegisterAs]',username='$_REQUEST[UserName]' where username='$_REQUEST[updateid]'");
		
		if($exeupdate==1)
		{
			$exelogin=mysqli_query($con,"update userlogin set User_Name='$_REQUEST[UserName]',Pass_Word='$_REQUEST[Password]',UserType='$_REQUEST[RegisterAs]' where User_Name='$_REQUEST[updateid]'");
			$update_dealer=mysqli_query($con,"update dealer set executive='$_REQUEST[Name]',executivecontact='$_REQUEST[Phone]',executiveusername='$_REQUEST[UserName]' where executiveusername='$_REQUEST[updateid]'");
			echo "<script>alert('Successfully Updated!');document.location='executive-list.php?suc=succ';</script>";	
		}
		else
		{
			echo "<script>alert('Try Again');document.location='executive-list.php?suc='fail';</script>";	
		}
	}
?>
          <!-- New widget -->
          <?php
		  if(isset($_REQUEST['eid']))
		{
		 $select_user=mysqli_query($con,"select * from userregistration where username='$_REQUEST[eid]'");
		 while($select_user_row=mysqli_fetch_array($select_user))
		 {	
	  	 ?>
         <div class="col-md-6  bootstrap-grid">
            <div class="powerwidget green" id="most-form-elements" data-widget-editbutton="false">
              
              <div class="inner-spacer">
                <form action="new-executive.php" method="post" enctype="multipart/form-data" class="orb-form">
                  <fieldset >
                   <legend>Personal Detail</legend>
                    <section>
                      <label class="label">Executive Name</label>
                      <label class="input">
                        <input type="text" name="Name" value="<?php echo $select_user_row['Name'];?>" required />
                      </label>
                    </section>
                    <section>
                      <label class="label">Address</label>
                      <label class="textarea">
                        <textarea rows="3" name="Address"  required><?php echo $select_user_row['Address'];?></textarea>
                      </label>
                      
                    </section>
                    <section>
                      <label class="label">City</label>
                      <label class="input">
                        <input type="text" name="City" size="54" value="<?php echo $select_user_row['City'];?>" required />
                      </label>
                    </section>
                    <section>
                      <label class="label">State</label>
                      <label class="select">
                        <select name="State" required> 
                            <option value="<?php echo $select_user_row['State'];?>" selected><?php echo $select_user_row['State'];?></option>
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
                        <input type="text" name="Country" size="54" value="<?php echo $select_user_row['Country'];?>" required />
                      </label>
                    </section>
                    <section>
                      <label class="label">Pin Code</label>
                      <label class="input">
                        <input type="text" name="Pincode" pattern="[0-9]{6}" size="54" value="<?php echo $select_user_row['Pincode'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Email</label>
                      <label class="input">
                        <input type="text" name="Email"  size="54" value="<?php echo $select_user_row['Email'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Phone No.</label>
                      <label class="input">
                        <input type="text" name="Phone" pattern="[0-9]{10,12}" value="<?php echo $select_user_row['Phone'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Alternative Phone No.</label>
                      <label class="input">
                        <input type="text" name="Phone1" pattern="[0-9]{10,12}" value="<?php echo $select_user_row['Phone1'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Date Of Birth(YYYY-MM-DD)</label>
                      <label class="input">
                        <input type="text" name="dob" value="<?php echo $select_user_row['DOB'];?>">
                      </label>
                      <div class="note"><strong>Note:</strong> Please Enter Birthday in this format Ex. 1990-02-13,1965-12-28</div>
                    </section>
                    <section>
                      <label class="label">Religious</label>
                      <label class="input">
                        <input type="text" name="Religious" value="<?php echo $select_user_row['Religious'];?>">
                      </label>
                    </section>
                    <section>
                      <label class="label">Id Proof Name</label>
                      <label class="input">
                        <input type="text" name="Idproofname1" value="<?php echo $select_user_row['Idproofname1'];?>">
                      </label>
                    </section>
                    <section>
                      <label class="label">Id Proof No.</label>
                      <label class="input">
                        <input type="text" name="Idproof1" value="<?php echo $select_user_row['Idproof1'];?>">
                      </label>
                    </section>
                    <!--<section>
                      <label class="label">Id Upload</label>
                      <label for="file" class="input input-file">
                      <div class="button">
                        <input type="file" id="file" name="Idproofpath1">
                        Browse</div>
                      <input type="text" readonly>
                      </label>
                    </section>-->
                    <section>
                      <label class="label">Id Proof Name</label>
                      <label class="input">
                        <input type="text" name="Idproofname2" value="<?php echo $select_user_row['Idproofname2'];?>">
                      </label>
                    </section>
                    <section>
                      <label class="label">Id Proof No.</label>
                      <label class="input">
                        <input type="text" name="Idproof2" value="<?php echo $select_user_row['Idproof2'];?>">
                      </label>
                    </section>
                    <!--<section>
                      <label class="label">Id Upload</label>
                      <label for="file" class="input input-file">
                      <div class="button">
                        <input type="file" id="file" name="Idproofpath2">
                        Browse</div>
                      <input type="text" readonly>
                      </label>
                    </section>-->
                    <section>
                      <label class="label">Designation</label>
                      <label class="input">
                        <input type="text" name="Designation" value="<?php echo $select_user_row['Designation'];?>">
                      </label>
                    </section>
                    <section>
                      <label class="label">Head</label>
                      <label class="input">
                        <input type="text" list="list" name="underexecutive" value="<?php echo $select_user_row['uexecutive'];?>">
                        
                        <datalist id="list">
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
                  
                    <section>
                      <label class="label">Register As</label>
                      <label class="select">
                        <select name="RegisterAs">
                        	<option value="<?php echo $select_user_row['UserType']; ?>" selected="selected"><?php if($select_user_row['UserType']==0){ echo "Admin 2";} if($select_user_row['UserType']==1){ echo "Admin 1";}if($select_user_row['UserType']==2){echo "Office";}if($select_user_row['UserType']==3){echo "GM";}if($select_user_row['UserType']==4){echo "RSM";}if($select_user_row['UserType']==5){echo "ASM";}if($select_user_row['UserType']==6){echo "Sr.Marketing Executive";}if($select_user_row['UserType']==7){echo "Marketing Executive";}if($select_user_row['UserType']==8){echo "Liaison Officer";} ?></option>
                            <option value="7" >Marketing Executive</option>
                            <option value="6" >Sr. Marketing Executive</option>
                            <option value="5">ASM</option>
                            <option value="4">RSM</option>
                            <option value="3">GM</option>
                            <option value="2">Office</option>
                            <option value="1">Admin 1</option>
                            <option value="0">Admin 2</option>
                            <option value="8">Liaison Officer</option>
                        </select>
                        <i></i> </label>
                    </section>
                    
                  </fieldset>
                  <fieldset>
                  <legend>Company Detail</legend>
                    <section>
                      <label class="label">Previous Company</label>
                      <label class="input">
                        <input type="text" name="PreviousCompany" value="<?php echo $select_user_row['PreviousCompany'];?>">
                      </label>
                    </section>
                    
                    <section>
                      <label class="label">Salary</label>
                      <label class="input">
                        <input type="text" name="Salary" pattern="[0-9]{4,6}" size="" value="<?php echo $select_user_row['Salary'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">HQ</label>
                      <label class="input">
                        <input type="text" name="HQ" size="54" value="<?php echo $select_user_row['HQ'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">TA</label>
                      <label class="input">
                        <input type="text" name="TA" size="54" value="<?php echo $select_user_row['TA'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">DA</label>
                      <label class="input">
                        <input type="text" name="DA" size="54" value="<?php echo $select_user_row['DA'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Mobile Bill</label>
                      <label class="input">
                        <input type="text" name="MobileBill" size="54" value="<?php echo $select_user_row['MobileBill'];?>" required>
                      </label>
                    </section>
                    
                    <section>
                      <label class="label">Work Address</label>
                      <label class="textarea textarea-resizable">
                        <textarea rows="3" name="WorkAddress" size="54" required><?php echo $select_user_row['WorkAddress'];?></textarea>
                      </label>
                    </section>
                    <section>
                      <label class="label">Work Branch</label>
                      <label class="input">
                        <input type="text" name="WorkBranch"  size="54" value="<?php echo $select_user_row['WorkBranch'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Work City</label>
                      <label class="input">
                        <input type="text" name="WorkCity"  size="54" value="<?php echo $select_user_row['WorkCity'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Work State</label>
                      <label class="input">
                        <input type="text" name="WorkState"  size="54" value="<?php echo $select_user_row['WorkState'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Work Country</label>
                      <label class="input">
                        <input type="text" name="WorkCountry"  size="54" value="<?php echo $select_user_row['WorkCountry'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">work pincode</label>
                      <label class="input">
                        <input type="text" name="WorkPincode" pattern="[0-9]{6}" size="6" value="<?php echo $select_user_row['WorkPincode'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Work Email</label>
                      <label class="input">
                        <input type="text" name="WorkEmail"  size="54" value="<?php echo $select_user_row['WorkEmail'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Work Phone</label>
                      <label class="input">
                        <input type="text" name="WorkPhone" pattern="[0-9]{10,12}" title="12345 67890" value="<?php echo $select_user_row['WorkPhone'];?>" required >
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
                  <fieldset>
                  <legend>Bank Detail</legend>
                  <section>
                      <label class="label">Bank Name</label>
                      <label class="input">
                        <input type="text" name="BankName" size="54" value="<?php echo $select_user_row['BankName'];?>"required >
                      </label>
                    </section>
                    <section>
                      <label class="label">Account Name</label>
                      <label class="input">
                        <input type="text" name="AccName" size="54" value="<?php echo $select_user_row['AccName'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Account No</label>
                      <label class="input">
                        <input type="text" pattern="[0-9]{05,20}" value="<?php echo $select_user_row['AccNo'];?>" name="AccNo">
                      </label>
                    </section>
                    <section>
                      <label class="label">Branch</label>
                      <label class="input">
                        <input type="text" name="BankBranch" size="54" value="<?php echo $select_user_row['Branch'];?>" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">IFSC Code</label>
                      <label class="input">
                        <input type="text" name="IFCI" pattern="{7,12}" value="<?php echo $select_user_row['IFCI'];?>">
                      </label>
                    </section>
                    
                    
                  </fieldset>
                  <fieldset>
                  <legend>Login Detail</legend>
                  <section>
                      <label class="label">User Name *</label>
                      <label class="input">
                        <input type="text" value="<?php echo $select_user_row['username'];?>" name="UserName" id="username"  class="username" required /><span id="tincheck" class="tincheck"></span>
                      </label>
                    </section>
                    
                    <section>
                      <label class="label">Password *</label>
                      <label class="input">
                      <?php
					  $select_user_pass=mysqli_query($con,"select * from userlogin where User_Name='$select_user_row[username]'");
					  while($select_user_pass_row=mysqli_fetch_array($select_user_pass))
					  {
					  ?>
                        <input type="password" name="Password" value="<?php echo $select_user_pass_row['Pass_Word'];?>" required>
                        <?php
					  }
					  ?>
                      </label>
                    </section>
                    <section>
                      <label class="label">Remark *</label>
                      <label class="input">
                        <input type="text" name="remarks" required value="<?php echo $select_user_row['remarks'];?>">
                      </label>
                    </section>
                    
                    
                  </fieldset>
                  
                  <input type="hidden" name="updateid" value="<?php echo $_REQUEST['eid'];?>">
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
                <form action="new-executive.php" method="post" enctype="multipart/form-data" class="orb-form">
                  <fieldset >
                   <legend>Personal Detail</legend>
                    <section>
                      <label class="label">Executive Name</label>
                      <label class="input">
                        <input type="text" name="Name" required />
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
                      <label class="label">Alternative Phone No.</label>
                      <label class="input">
                        <input type="text" name="Phone1" pattern="[0-9]{10,12}" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Date Of Birth(YYYY-MM-DD)</label>
                      <label class="input">
                        <input type="text" name="dob">
                      </label>
                    </section>
                    <section>
                      <label class="label">Religious</label>
                      <label class="input">
                        <input type="text" name="Religious">
                      </label>
                    </section>
                    <section>
                      <label class="label">Id Proof Name</label>
                      <label class="input">
                        <input type="text" name="Idproofname1">
                      </label>
                    </section>
                    <section>
                      <label class="label">Id Proof No.</label>
                      <label class="input">
                        <input type="text" name="Idproof1">
                      </label>
                    </section>
                    <!--<section>
                      <label class="label">Id Upload</label>
                      <label for="file" class="input input-file">
                      <div class="button">
                        <input type="file" id="file" name="Idproofpath1">
                        Browse</div>
                      <input type="text" readonly>
                      </label>
                    </section>-->
                    <section>
                      <label class="label">Id Proof Name</label>
                      <label class="input">
                        <input type="text" name="Idproofname2">
                      </label>
                    </section>
                    <section>
                      <label class="label">Id Proof No.</label>
                      <label class="input">
                        <input type="text" name="Idproof2">
                      </label>
                    </section>
                    <!--<section>
                      <label class="label">Id Upload</label>
                      <label for="file" class="input input-file">
                      <div class="button">
                        <input type="file" id="file" name="Idproofpath2">
                        Browse</div>
                      <input type="text" readonly>
                      </label>
                    </section>-->
                    <section>
                      <label class="label">Designation</label>
                      <label class="input">
                        <input type="text" name="Designation">
                      </label>
                    </section>
                    <section>
                      <label class="label">Head</label>
                      <label class="input">
                        <input type="text" list="list" name="underexecutive">
                        <datalist id="list">
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
                  
                    <section>
                      <label class="label">Register As</label>
                      <label class="select">
                        <select name="RegisterAs">
                        <option value="1">Sub Executive</option>
                        <option value="2">Executive</option>
                        <option value="3">Zonal Head</option>
                        <option value="4">Admin</option>
                        </select>
                        <i></i> </label>
                    </section>
                    <section>
                      <label class="label">If You Want Replace With Any Executive</label>
                      <label class="input">
                        <input type="text" list="list1" name="replace_executive">
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
                    
                  </fieldset>
                  <fieldset>
                  <legend>Company Detail</legend>
                    <section>
                      <label class="label">Previous Company</label>
                      <label class="input">
                        <input type="text" name="PreviousCompany">
                      </label>
                    </section>
                    <section>
                      <label class="label">Id Proof Upload</label>
                      <label for="file" class="input input-file">
                      <div class="button">
                        <input type="file" id="file" name="Idproof">
                        Browse</div>
                      <input type="text" readonly>
                      </label>
                    </section>
                    <section>
                      <label class="label">Salary</label>
                      <label class="input">
                        <input type="text" name="Salary" pattern="[0-9]{4,6}" size="" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">HQ</label>
                      <label class="input">
                        <input type="text" name="HQ" size="54" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">TA</label>
                      <label class="input">
                        <input type="text" name="TA" size="54" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">DA</label>
                      <label class="input">
                        <input type="text" name="DA" size="54" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Mobile Bill</label>
                      <label class="input">
                        <input type="text" name="MobileBill" size="54" required>
                      </label>
                    </section>
                    
                    <section>
                      <label class="label">Work Address</label>
                      <label class="textarea textarea-resizable">
                        <textarea rows="3" name="WorkAddress" size="54" required></textarea>
                      </label>
                    </section>
                    <section>
                      <label class="label">Work Branch</label>
                      <label class="input">
                        <input type="text" name="WorkBranch"  size="54" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Work City</label>
                      <label class="input">
                        <input type="text" name="WorkCity"  size="54" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Work State</label>
                      <label class="input">
                        <input type="text" name="WorkState"  size="54" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Work Country</label>
                      <label class="input">
                        <input type="text" name="WorkCountry"  size="54" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">work pincode</label>
                      <label class="input">
                        <input type="text" name="WorkPincode" pattern="[0-9]{6}" size="6" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Work Email</label>
                      <label class="input">
                        <input type="text" name="WorkEmail"  size="54" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Work Phone</label>
                      <label class="input">
                        <input type="text" name="WorkPhone" pattern="[0-9]{10,12}" title="12345 67890"  required >
                      </label>
                    </section>
                    <section>
                      <label class="label">Appointment Letter</label>
                      <label for="file" class="input input-file">
                      <div class="button">
                        <input type="file" id="file" name="appoint" required>
                        Browse</div>
                      <input type="text" readonly>
                      </label>
                    </section>
                    
                    
                  </fieldset>
                  <fieldset>
                  <legend>Bank Detail</legend>
                  <section>
                      <label class="label">Bank Name</label>
                      <label class="input">
                        <input type="text" name="BankName" size="54" required >
                      </label>
                    </section>
                    <section>
                      <label class="label">Account Name</label>
                      <label class="input">
                        <input type="text" name="AccName" size="54" required>
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
                        <input type="text" name="BankBranch" size="54" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">IFSC Code</label>
                      <label class="input">
                        <input type="text" name="IFCI" pattern="{7,12}">
                      </label>
                    </section>
                    
                    
                  </fieldset>
                  <fieldset>
                  <legend>Login Detail</legend>
                  <section>
                      <label class="label">User Name *</label>
                      <label class="input">
                        <input type="text" value="" name="UserName" id="username"  class="username" required /><span id="tincheck" class="tincheck"></span>
                      </label>
                    </section>
                    <section>
                      <label class="label">Password *</label>
                      <label class="input">
                        <input type="text" name="Password" required>
                      </label>
                    </section>
                    <section>
                      <label class="label">Remark *</label>
                      <label class="input">
                        <input type="text" name="remarks" required>
                      </label>
                    </section>
                    
                    
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