<?php ob_start(); ?>
<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin | Login</title>
<link href="css/styles.css" rel="stylesheet" type="text/css">

<!--<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />-->
<script type="text/javascript" src="js/vendors/horisontal/modernizr.custom.js"></script>
</head>

<body onLoad="document.forms.MyForm.user_name.focus()">
<div class="colorful-page-wrapper">
  <div class="center-block">
    <div class="login-block">
      <form action="index.php" NAME="MyForm" method="post" id="login-form" class="orb-form">
        <header>
          <div class="image-block"></div>
          Login to ERP </header>
          <?php

if(isset($_REQUEST['submit']))
{
include("config.php");
$username=$_REQUEST['user_name'];
$password=$_REQUEST['pass_word'];
$usertype=$_REQUEST['logintype'];
$checlogin=mysqli_query($con,"select * from userlogin where User_Name='$username' and Pass_Word='$password' and UserType='$usertype' and Status='1'");

if(mysqli_num_rows($checlogin)>0)
{
	@session_start();
	$_SESSION['username']=$username;
	$_SESSION['usertype']=$usertype;
        while($checlogin_row=mysqli_fetch_array($checlogin))
        {
           $_SESSION['company']=$checlogin_row['companyName']; 
        }        
	
	echo "<script>alert('login succesfully');document.location='home.php';</script>";
}
else
{
	echo "Invalid User Name And Password or Your Login Cant Confirm From Admin ";
}
}
?>
        <fieldset>
          <section>
            <div class="row">
              <label class="label col col-4">User Name</label>
              <div class="col col-8">
                <label class="input"> <i class="icon-append fa fa-user"></i>
                  <input type="text" name="user_name" required>
                </label>
              </div>
            </div>
          </section>
          <section>
            <div class="row">
              <label class="label col col-4">Password</label>
              <div class="col col-8">
                <label class="input"> <i class="icon-append fa fa-lock"></i>
                  <input type="password" name="pass_word" required>
                </label>
                
              </div>
            </div>
          </section>

<section>
            <div class="row">
              <label class="label col col-4">Login As</label>
              <div class="col col-8">
                <label class="select">
                        <select name="logintype">
                        <option value="1">Sub Executive</option>
                        <option value="2">Executive</option>
                        <option value="3">Zonal Head</option>
                        <option value="6">Dispatch Dept.</option>
                        <option value="4">Admin</option>
                        <option value="7">Account Dept.</option>
                        <option value="8">Director</option>
                        <option value="5">Super Admin</option>
                        </select>
                        <i></i> </label>
                
              </div>
            </div>
          </section>    
                <!--<section>
            <div class="row">
              <div class="col col-4"></div>
              <div class="col col-8">
                <label class="checkbox">
                  <input type="checkbox" name="remember" checked>
                  <i></i>Keep me logged in</label>
              </div>
            </div>
          </section>-->
        </fieldset>
        <footer>
          <button type="submit" name="submit" class="btn btn-default">Log in</button>
        </footer>
      </form>
    </div>
    
    <div class="copyrights"> ABC COMPANY <br>
      Created by <a href="https://www.mpsoftechnology.com">M&P Soft Technology & Solutions Pvt Ltd</a> &copy; <?php echo date('Y');?> </div>
  </div>
</div>

<!--Scripts--> 
<!--JQuery--> 
<script type="text/javascript" src="js/vendors/jquery/jquery.min.js"></script> 
<script type="text/javascript" src="js/vendors/jquery/jquery-ui.min.js"></script> 

<!--Forms--> 
<script type="text/javascript" src="js/vendors/forms/jquery.form.min.js"></script> 
<script type="text/javascript" src="js/vendors/forms/jquery.validate.min.js"></script> 
<script type="text/javascript" src="js/vendors/forms/jquery.maskedinput.min.js"></script> 
<script type="text/javascript" src="js/vendors/jquery-steps/jquery.steps.min.js"></script> 

<!--NanoScroller--> 
<script type="text/javascript" src="js/vendors/nanoscroller/jquery.nanoscroller.min.js"></script> 

<!--Sparkline--> 
<script type="text/javascript" src="js/vendors/sparkline/jquery.sparkline.min.js"></script> 

<!--Main App--> 
<script type="text/javascript" src="js/scripts.js"></script>



<!--/Scripts-->

</body>
</html>
<?php
ob_flush();
?>