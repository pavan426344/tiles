
<ul id="menu">
<li><a  href="#" title="User" ><span style="color:#5BC0DE"> Hi,<?php echo $_SESSION['username'];?></span></a> </li>
<?php 
$select=mysql_query("select * from profilesetting where User_id='$username'");
while($rowprofile=mysql_fetch_array($select))
{
?>
  <li><a class="active" href="home.php" title="Dashboard" data-id="dash-sub"><i class="entypo-briefcase"></i><span> Dashboard</span></a> </li>
   
  <li><a href="#" title="Design" class="submenu" data-id="design"><i class="entypo-icq"></i><span> Product <!--<span class="badge">32</span>--></span></a>
   
   <ul id="design">
   
      <li><a href="view-brand.php" title="Add Size"><i class="fa fa-square"></i><span>Brand</span></a></li>
      <li><a href="view-product-type.php" title="View Product Type"><i class="fa fa-square"></i><span> Product Type</span></a></li>
      <li><a href="view-main-series.php" title="View Main Series"><i class="fa fa-square"></i><span>Main Series</span></a></li>
      <li><a href="view-series.php" title="Main Series"><i class="fa fa-square"></i><span>Series</span></a></li>
      <li><a href="view-size.php" title="View Size"><i class="fa fa-square"></i><span>Size</span></a></li>
      <li><a href="view-grade.php" title="View Grade"><i class="fa fa-square"></i><span>Grade</span></a></li>
      <li><a href="view-design.php" title="View Design"><i class="fa fa-square"></i><span>Design</span></a></li>
      <li><a href="view-plant.php" title="View Plant"><i class="fa fa-square"></i><span>Plant</span></a></li>
      <li><a href="view-punch.php" title="View Punch"><i class="fa fa-square"></i><span>Punch</span></a></li>
      <li><a href="view-glaz.php" title="View Glaz"><i class="fa fa-square"></i><span>Glaz</span></a></li>
      <li><a href="view-item.php" title="View Item"><i class="fa fa-square"></i><span>Item</span></a></li>
      
     
    </ul>
    
  </li>
  
  <li><a class="submenu" href="#" title="Widgets" data-id="widgets-sub"><i class="entypo-user"></i><span>Executive</span></a>
  
    <ul id="widgets-sub">
    <?php if($rowprofile['newexecutive']==1) {?>
      <li><a href="new-executive.php" title="Power Widgets"><i class="fa fa-square"></i><span>New Executive</span></a></li>
      <?php }  ?>
        <?php if($rowprofile['editexecutive']==1) {?>
      <li><a href="executive-list.php" title="Portlets"><i class="fa fa-square"></i><span>Executive List</span></a></li>
      <?php }if($rowprofile['target']==1){ ?>
      <li><a href="executive-target.php" title="Portlets"><i class="fa fa-square"></i><span>Executive Target</span></a></li>
       <?php } ?>
      
    </ul>
  </li>
  <li><a href="#" class="submenu" data-id="tables-sub" title="Tables"><i class="entypo-user"></i><span>Dealer</span></a> 
    <!-- Tables Sub-Menu -->
    <ul id="tables-sub" class="accordion">
    <?php if($rowprofile['newdealer']==1) {?>
      <li><a href="new-dealer.php" title="Dealer Create"><i class="fa fa-square"></i><span>New Dealer</span></a></li>
      <li><a href="new-cheque.php" title="Security Cheque"><i class="fa fa-square"></i><span>Security Cheque</span></a></li>
      <li><a href="dealer-executive.php" title="Dealer Assign Executive"><i class="fa fa-square"></i><span>Dealer Assign Executive</span></a></li>
      <?php } ?>
      <?php if($rowprofile['editdealers']==1) { ?>
      <li><a href="dealer-list.php" title="Profile"><i class="fa fa-square"></i><span>Dealer List</span></a></li>
      
      <?php } ?>

            <?php if($usertype==1) {?>
       <li><a href="#" title="Profile"><i class="fa fa-square"></i><span>Dealer Accounts</span></a></li>
        <?php } ?>

            <?php if($usertype==1){ ?>
        <li><a href="#" title="Profile"><i class="fa fa-square"></i><span>Dealer Limit</span></a></li>
         <?php } ?>
    </ul>
  </li>
  <?php if($rowprofile['newdo']==1) {?>
  <li><a  href="purchase.php"  title="Other Contents"><i class="fa fa-th"></i><span>New DO</span></a> </li>
  <?php
  }
  ?>
  <?php if($rowprofile['newdeposit']==4) {?>
  <li><a  href="deposit.php"  title="Other Contents"><i class="fa fa-th"></i><span>Deposit</span></a> </li>
  <?php
  }
  ?>
  <li> <a class="submenu" href="#" title="Graph &amp; Charts" data-id="graph-sub"><i class="entypo-chart-area"></i><span> Reports</span></a> 
    <!-- Graph and Charts Menu -->
    <ul id="graph-sub" class="accordion">
    <?php if($usertype==1 || $usertype==0) { ?>
      <li><a href="pending-order.php" title="Pending Order"><i class="entypo-chart-bar"></i><span>Pending Order</span></a></li>
      <?php  } ?>

           

            <?php if($usertype==1 || $usertype==0) { ?>
      <li><a href="sales-reports.php" title="Sales Reports"><i class="entypo-chart-pie"></i><span>Sales Reports</span></a></li>
      <li><a href="export_dealer.php" title="Export "><i class="entypo-chart-pie"></i><span>Dealer Export</span></a></li>
      <li><a href="export-statewise_available_security_cheque.php" title="Export Dealer Security Cheque"><i class="entypo-chart-pie"></i><span>Security Cheque</span></a></li>
      <li><a href="export-statewise_notavailable_security_cheque.php" title="Export Dealer Without Security Cheque"><i class="entypo-chart-pie"></i><span>Without Security Cheque</span></a></li>
      <?php }?>
    </ul>
   
   </li> 
  
   <?php if($usertype=='1') {?>
  <li><a  href="profile-setting.php"  title="Other Contents"><i class="fa fa-th"></i><span>Profile Setting</span></a> </li>
  <?php
  }
  
}
?>
<li><a  href="logout.php"  title="Logout User"><i class="fa fa-power-off"></i><span>logout</span></a> </li>
</ul>
