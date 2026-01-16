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
<title>Design | Forms</title>
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
            <li class="active">New Design</li>
          </ul>
        </div>
        <!--/Breadcrumb-->
        
        <div class="page-header">
          <h1>Design<small>form</small></h1>
        </div>
        
        <!-- Widget Row Start grid -->
        <div class="row" id="powerwidgets">
          
          
          <!-- New widget -->
          <div class="col-md-6  bootstrap-grid">
            <div class="powerwidget green" id="most-form-elements" data-widget-editbutton="false">
              
              <div class="inner-spacer">
                <form action="" class="orb-form">
                  <fieldset>
                    <section>
                      <label class="label">Text input</label>
                      <label class="input">
                        <input type="text">
                      </label>
                    </section>
                    <section>
                      <label class="label">File input</label>
                      <label for="file" class="input input-file">
                      <div class="button">
                        <input type="file" id="file">
                        Browse</div>
                      <input type="text" readonly>
                      </label>
                    </section>
                    <section>
                      <label class="label">Input with autocomlete</label>
                      <label class="input">
                        <input type="text" list="list">
                        <datalist id="list">
                          <option value="Alexandra"></option>
                          <option value="Alice"></option>
                          <option value="Anastasia"></option>
                          <option value="Avelina"></option>
                          <option value="Basilia"></option>
                          <option value="Beatrice"></option>
                          <option value="Cassandra"></option>
                          <option value="Cecil"></option>
                          <option value="Clemencia"></option>
                          <option value="Desiderata"></option>
                          <option value="Dionisia"></option>
                          <option value="Edith"></option>
                          <option value="Eleanora"></option>
                          <option value="Elizabeth"></option>
                          <option value="Emma"></option>
                          <option value="Felicia"></option>
                          <option value="Florence"></option>
                          <option value="Galiana"></option>
                          <option value="Grecia"></option>
                          <option value="Helen"></option>
                          <option value="Helewisa"></option>
                          <option value="Idonea"></option>
                          <option value="Isabel"></option>
                          <option value="Joan"></option>
                          <option value="Juliana"></option>
                          <option value="Karla"></option>
                          <option value="Karyn"></option>
                          <option value="Kate"></option>
                          <option value="Lakisha"></option>
                          <option value="Lana"></option>
                          <option value="Laura"></option>
                          <option value="Leona"></option>
                          <option value="Mandy"></option>
                          <option value="Margaret"></option>
                          <option value="Maria"></option>
                          <option value="Nanacy"></option>
                          <option value="Nicole"></option>
                          <option value="Olga"></option>
                          <option value="Pamela"></option>
                          <option value="Patricia"></option>
                          <option value="Qiana"></option>
                          <option value="Rachel"></option>
                          <option value="Ramona"></option>
                          <option value="Samantha"></option>
                          <option value="Sandra"></option>
                          <option value="Tanya"></option>
                          <option value="Teresa"></option>
                          <option value="Ursula"></option>
                          <option value="Valerie"></option>
                          <option value="Veronica"></option>
                          <option value="Wilma"></option>
                          <option value="Yasmin"></option>
                          <option value="Zelma"></option>
                        </datalist>
                      </label>
                      <div class="note"><strong>Note:</strong> works in Chrome, Firefox, Opera and IE10.</div>
                    </section>
                  </fieldset>
                  <fieldset>
                    <section>
                      <label class="label">Select</label>
                      <label class="select">
                        <select>
                          <option value="0">Choose name</option>
                          <option value="1">Alexandra</option>
                          <option value="2">Alice</option>
                          <option value="3">Anastasia</option>
                          <option value="4">Avelina</option>
                        </select>
                        <i></i> </label>
                    </section>
                    <section>
                      <label class="label">Multiple select</label>
                      <label class="select select-multiple">
                        <select multiple>
                          <option value="1">Alexandra</option>
                          <option value="2">Alice</option>
                          <option value="3">Anastasia</option>
                          <option value="4">Avelina</option>
                          <option value="5">Basilia</option>
                          <option value="6">Beatrice</option>
                          <option value="7">Cassandra</option>
                          <option value="8">Clemencia</option>
                          <option value="9">Desiderata</option>
                        </select>
                      </label>
                      <div class="note"><strong>Note:</strong> hold down the ctrl/cmd button to select multiple options.</div>
                    </section>
                  </fieldset>
                  <fieldset>
                    <section>
                      <label class="label">Textarea</label>
                      <label class="textarea">
                        <textarea rows="3"></textarea>
                      </label>
                      <div class="note"><strong>Note:</strong> height of the textarea depends on the rows attribute.</div>
                    </section>
                    <section>
                      <label class="label">Textarea resizable</label>
                      <label class="textarea textarea-resizable">
                        <textarea rows="3"></textarea>
                      </label>
                    </section>
                    <section>
                      <label class="label">Textarea expandable</label>
                      <label class="textarea textarea-expandable">
                        <textarea rows="3"></textarea>
                      </label>
                      <div class="note"><strong>Note:</strong> expands on focus.</div>
                    </section>
                  </fieldset>
                  <fieldset>
                    <section>
                      <label class="label">Columned radios</label>
                      <div class="row">
                        <div class="col col-4">
                          <label class="radio">
                            <input type="radio" name="radio" checked>
                            <i></i>Alexandra</label>
                          <label class="radio">
                            <input type="radio" name="radio">
                            <i></i>Alice</label>
                          <label class="radio">
                            <input type="radio" name="radio">
                            <i></i>Anastasia</label>
                        </div>
                        <div class="col col-4">
                          <label class="radio">
                            <input type="radio" name="radio">
                            <i></i>Avelina</label>
                          <label class="radio">
                            <input type="radio" name="radio">
                            <i></i>Basilia</label>
                          <label class="radio">
                            <input type="radio" name="radio">
                            <i></i>Beatrice</label>
                        </div>
                        <div class="col col-4">
                          <label class="radio">
                            <input type="radio" name="radio">
                            <i></i>Cassandra</label>
                          <label class="radio">
                            <input type="radio" name="radio">
                            <i></i>Clemencia</label>
                          <label class="radio">
                            <input type="radio" name="radio">
                            <i></i>Desiderata</label>
                        </div>
                      </div>
                    </section>
                    <section>
                      <label class="label">Inline radios</label>
                      <div class="inline-group">
                        <label class="radio">
                          <input type="radio" name="radio-inline" checked>
                          <i></i>Alexandra</label>
                        <label class="radio">
                          <input type="radio" name="radio-inline">
                          <i></i>Alice</label>
                        <label class="radio">
                          <input type="radio" name="radio-inline">
                          <i></i>Anastasia</label>
                        <label class="radio">
                          <input type="radio" name="radio-inline">
                          <i></i>Avelina</label>
                        <label class="radio">
                          <input type="radio" name="radio-inline">
                          <i></i>Beatrice</label>
                      </div>
                    </section>
                  </fieldset>
                  <fieldset>
                    <section>
                      <label class="label">Columned checkboxes</label>
                      <div class="row">
                        <div class="col col-4">
                          <label class="checkbox">
                            <input type="checkbox" name="checkbox" checked>
                            <i></i>Alexandra</label>
                          <label class="checkbox">
                            <input type="checkbox" name="checkbox">
                            <i></i>Alice</label>
                          <label class="checkbox">
                            <input type="checkbox" name="checkbox">
                            <i></i>Anastasia</label>
                        </div>
                        <div class="col col-4">
                          <label class="checkbox">
                            <input type="checkbox" name="checkbox">
                            <i></i>Avelina</label>
                          <label class="checkbox">
                            <input type="checkbox" name="checkbox">
                            <i></i>Basilia</label>
                          <label class="checkbox">
                            <input type="checkbox" name="checkbox">
                            <i></i>Beatrice</label>
                        </div>
                        <div class="col col-4">
                          <label class="checkbox">
                            <input type="checkbox" name="checkbox">
                            <i></i>Cassandra</label>
                          <label class="checkbox">
                            <input type="checkbox" name="checkbox">
                            <i></i>Clemencia</label>
                          <label class="checkbox">
                            <input type="checkbox" name="checkbox">
                            <i></i>Desiderata</label>
                        </div>
                      </div>
                    </section>
                    <section>
                      <label class="label">Inline checkboxes</label>
                      <div class="inline-group">
                        <label class="checkbox">
                          <input type="checkbox" name="checkbox-inline" checked>
                          <i></i>Alexandra</label>
                        <label class="checkbox">
                          <input type="checkbox" name="checkbox-inline">
                          <i></i>Alice</label>
                        <label class="checkbox">
                          <input type="checkbox" name="checkbox-inline">
                          <i></i>Anastasia</label>
                        <label class="checkbox">
                          <input type="checkbox" name="checkbox-inline">
                          <i></i>Avelina</label>
                        <label class="checkbox">
                          <input type="checkbox" name="checkbox-inline">
                          <i></i>Beatrice</label>
                      </div>
                    </section>
                  </fieldset>
                  <fieldset>
                    <div class="row">
                      <section class="col col-5">
                        <label class="label">Toggles based on radios</label>
                        <label class="toggle">
                          <input type="radio" name="radio-toggle" checked>
                          <i></i>Alexandra</label>
                        <label class="toggle">
                          <input type="radio" name="radio-toggle">
                          <i></i>Anastasia</label>
                        <label class="toggle">
                          <input type="radio" name="radio-toggle">
                          <i></i>Avelina</label>
                      </section>
                      <div class="col col-2"></div>
                      <section class="col col-5">
                        <label class="label">Toggles based on checkboxes</label>
                        <label class="toggle">
                          <input type="checkbox" name="checkbox-toggle" checked>
                          <i></i>Cassandra</label>
                        <label class="toggle">
                          <input type="checkbox" name="checkbox-toggle">
                          <i></i>Clemencia</label>
                        <label class="toggle">
                          <input type="checkbox" name="checkbox-toggle">
                          <i></i>Desiderata</label>
                      </section>
                    </div>
                  </fieldset>
                  <fieldset>
                    <section>
                      <label class="label">Ratings with different icons</label>
                      <div class="rating">
                        <input type="radio" name="stars-rating" id="stars-rating-5">
                        <label for="stars-rating-5"><i class="fa fa-star"></i></label>
                        <input type="radio" name="stars-rating" id="stars-rating-4">
                        <label for="stars-rating-4"><i class="fa fa-star"></i></label>
                        <input type="radio" name="stars-rating" id="stars-rating-3">
                        <label for="stars-rating-3"><i class="fa fa-star"></i></label>
                        <input type="radio" name="stars-rating" id="stars-rating-2">
                        <label for="stars-rating-2"><i class="fa fa-star"></i></label>
                        <input type="radio" name="stars-rating" id="stars-rating-1">
                        <label for="stars-rating-1"><i class="fa fa-star"></i></label>
                        Stars </div>
                      <div class="rating">
                        <input type="radio" name="trophies-rating" id="trophies-rating-7">
                        <label for="trophies-rating-7"><i class="fa fa-trophy"></i></label>
                        <input type="radio" name="trophies-rating" id="trophies-rating-6">
                        <label for="trophies-rating-6"><i class="fa fa-trophy"></i></label>
                        <input type="radio" name="trophies-rating" id="trophies-rating-5">
                        <label for="trophies-rating-5"><i class="fa fa-trophy"></i></label>
                        <input type="radio" name="trophies-rating" id="trophies-rating-4">
                        <label for="trophies-rating-4"><i class="fa fa-trophy"></i></label>
                        <input type="radio" name="trophies-rating" id="trophies-rating-3">
                        <label for="trophies-rating-3"><i class="fa fa-trophy"></i></label>
                        <input type="radio" name="trophies-rating" id="trophies-rating-2">
                        <label for="trophies-rating-2"><i class="fa fa-trophy"></i></label>
                        <input type="radio" name="trophies-rating" id="trophies-rating-1">
                        <label for="trophies-rating-1"><i class="fa fa-trophy"></i></label>
                        Trophies </div>
                      <div class="rating">
                        <input type="radio" name="asterisks-rating" id="asterisks-rating-10">
                        <label for="asterisks-rating-10"><i class="fa fa-asterisk"></i></label>
                        <input type="radio" name="asterisks-rating" id="asterisks-rating-9">
                        <label for="asterisks-rating-9"><i class="fa fa-asterisk"></i></label>
                        <input type="radio" name="asterisks-rating" id="asterisks-rating-8">
                        <label for="asterisks-rating-8"><i class="fa fa-asterisk"></i></label>
                        <input type="radio" name="asterisks-rating" id="asterisks-rating-7">
                        <label for="asterisks-rating-7"><i class="fa fa-asterisk"></i></label>
                        <input type="radio" name="asterisks-rating" id="asterisks-rating-6">
                        <label for="asterisks-rating-6"><i class="fa fa-asterisk"></i></label>
                        <input type="radio" name="asterisks-rating" id="asterisks-rating-5">
                        <label for="asterisks-rating-5"><i class="fa fa-asterisk"></i></label>
                        <input type="radio" name="asterisks-rating" id="asterisks-rating-4">
                        <label for="asterisks-rating-4"><i class="fa fa-asterisk"></i></label>
                        <input type="radio" name="asterisks-rating" id="asterisks-rating-3">
                        <label for="asterisks-rating-3"><i class="fa fa-asterisk"></i></label>
                        <input type="radio" name="asterisks-rating" id="asterisks-rating-2">
                        <label for="asterisks-rating-2"><i class="fa fa-asterisk"></i></label>
                        <input type="radio" name="asterisks-rating" id="asterisks-rating-1">
                        <label for="asterisks-rating-1"><i class="fa fa-asterisk"></i></label>
                        Asterisks </div>
                      <div class="note"><strong>Note:</strong> you can use more than 300 vector icons for rating.</div>
                    </section>
                  </fieldset>
                  <footer>
                    <button type="submit" class="btn btn-default">Submit</button>
                  </footer>
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