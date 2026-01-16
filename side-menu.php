<?php
if($usertype==4){ ?>
<ul id="menu">
<li><a  href="#" title="User" ><span style="color:#5BC0DE"> Hi,<?php echo $_SESSION['username'];?></span></a> </li>

  <li><a class="active" href="home.php" title="Dashboard" data-id="dash-sub"><i class="entypo-briefcase"></i><span> Dashboard</span></a> </li>

  <li><a href="#" title="Group Master" class="submenu" data-id="group"><i class="entypo-icq"></i><span> Group Master <!--<span class="badge">32</span>--></span></a>
   <ul id="group">
     
      <li><a href="view-company-group.php" title="Company Group"><i class="fa fa-square"></i><span>Company Group</span></a></li> 
      <li><a href="view-company.php" title="Company"><i class="fa fa-square"></i><span>Company</span></a></li>
      <li><a href="view-brand.php" title="Brand"><i class="fa fa-square"></i><span>Brand</span></a></li>
      <li><a href="view-product-type.php" title="Product Type"><i class="fa fa-square"></i><span> Product Type</span></a></li>
      <li><a href="view-main-series.php" title="Main Series"><i class="fa fa-square"></i><span>Main Series</span></a></li>
      <li><a href="view-series.php" title="Series"><i class="fa fa-square"></i><span>Series</span></a></li>
      <li><a href="view-size.php" title="Size"><i class="fa fa-square"></i><span>Size</span></a></li>
      <li><a href="view-grade.php" title="Grade"><i class="fa fa-square"></i><span>Grade</span></a></li>
      <li><a href="view-design.php" title="Design"><i class="fa fa-square"></i><span>Design</span></a></li>
      <li><a href="view-plant.php" title="Plant"><i class="fa fa-square"></i><span>Plant/Unit</span></a></li>
      <li><a href="view-punch.php" title="Punch"><i class="fa fa-square"></i><span>Punch</span></a></li>
      <li><a href="view-glaz.php" title="Glaz"><i class="fa fa-square"></i><span>Glaz</span></a></li>
      <li><a href="view-godown.php" title="Godown"><i class="fa fa-square"></i><span>Godown</span></a></li>
      
    </ul>
  </li>
 
  
  <li><a  href="view-item.php" title="Item" data-id="dash-sub"><i class="entypo-icq"></i><span>Item</span></a> 
  </li>

  <li><a  href="view-production.php" title="Production" data-id="dash-sub"><i class="entypo-icq"></i><span>Production</span></a> 
  </li>
 
  <li><a  href="view-state.php" title="State" data-id="dash-sub"><i class="entypo-icq"></i><span>State Master</span></a> 
  </li>
 
  <li><a  href="view-mrp.php" title="MRP" data-id="dash-sub"><i class="entypo-icq"></i><span>MRP</span></a> 
  </li>

  <li><a class="submenu" href="#" title="Executive" data-id="widgets-sub"><i class="entypo-user"></i><span>Executive</span></a>
  
    <ul id="widgets-sub">
      <li><a href="new-executive.php" title="Executive"><i class="fa fa-square"></i><span>New Executive</span></a></li>
      <li><a href="executive-list.php" title="Executive List"><i class="fa fa-square"></i><span>Executive List</span></a></li>
      <li><a href="profile-setting.php" title="Executive Profile Setting"><i class="fa fa-square"></i><span>Profile Setting</span></a></li>
    </ul>
  </li>

  <li><a href="#" class="submenu" data-id="tables-sub" title="Dealer"><i class="entypo-user"></i><span>Dealer</span></a> 
    <ul id="tables-sub" class="accordion">
    
      <li><a href="new-dealer.php" title="Dealer"><i class="fa fa-square"></i><span>New Dealer</span></a></li>
      
      <li><a href="dealer-executive.php" title="Dealer Assign Executive"><i class="fa fa-square"></i><span>Dealer Assign Executive</span></a></li>
      
      <li><a href="dealer-list.php" title="Dealer List"><i class="fa fa-square"></i><span>Dealer List</span></a></li>
      
    </ul>
  </li>
 
  
  <li><a  href="purchase.php"  title="DO"><i class="fa fa-th"></i><span>New DO</span></a> </li>

  <li><a href="#" class="submenu" data-id="tables-sub1" title="Order"><i class="fa fa-th"></i><span>Order</span></a> 
    <ul id="tables-sub1" class="accordion">
    
      <li><a href="pending-order-list.php" title="Pending Order"><i class="fa fa-square"></i><span>Pending Order</span></a></li>
      
      <li><a href="dispatch-order-list.php" title="Dispatch Order"><i class="fa fa-square"></i><span>Dispatch Order</span></a></li>
      
      <li><a href="sales-order-list.php" title="Sales Order"><i class="fa fa-square"></i><span>Sales Order</span></a></li>
      <li><a href="reject-order-list.php" title="Reject Order"><i class="fa fa-square"></i><span>Rejected Order</span></a></li>
      
    </ul>
  </li>

  
  <li> <a class="submenu" href="#" title="Reports" data-id="graph-sub"><i class="entypo-chart-area"></i><span> Reports</span></a> 
    <!-- Graph and Charts Menu -->
    <ul id="graph-sub" class="accordion">
    
      <li><a href="pending-order.php" title="pending-order.php"><i class="entypo-chart-bar"></i><span>Pending Order</span></a></li>
    
      <li><a href="sales-reports.php" title="sales-reports.php"><i class="entypo-chart-pie"></i><span>Sales Reports</span></a></li>
      <li><a href="export_dealer.php" title="Export "><i class="entypo-chart-pie"></i><span>Dealer Export</span></a></li>
      <li><a href="export-statewise_available_security_cheque.php" title="Export Dealer Security Cheque"><i class="entypo-chart-pie"></i><span>Security Cheque</span></a></li>
      <li><a href="export-statewise_notavailable_security_cheque.php" title="Export Dealer Without Security Cheque"><i class="entypo-chart-pie"></i><span>Without Security Cheque</span></a></li>
      
    </ul>
   
   </li> 
  

  
  
<li><a  href="logout.php"  title="Logout User"><i class="fa fa-power-off"></i><span>logout</span></a> </li>
</ul>

<?php }else{ ?>
<ul id="menu">
<li><a  href="#" title="User" ><span style="color:#5BC0DE"> Hi,<?php echo $_SESSION['username'];?></span></a> </li>

  <li><a class="active" href="home.php" title="Dashboard" data-id="dash-sub"><i class="entypo-briefcase"></i><span> Dashboard</span></a> </li>
   <?php 
$select=mysqli_query($con,"select * from profilesetting where User_id='$username'");
while($rowprofile=mysqli_fetch_array($select))
{
 if($rowprofile['group_master']==1) {
?>
  <li><a href="#" title="Group Master" class="submenu" data-id="group"><i class="entypo-icq"></i><span> Group Master <!--<span class="badge">32</span>--></span></a>
   <ul id="group">
     <?php
     if($usertype==5)
     {    
     ?>
      <li><a href="view-company-group.php" title="Company Group"><i class="fa fa-square"></i><span>Company Group</span></a></li> 
      <li><a href="view-company.php" title="Company"><i class="fa fa-square"></i><span>Company</span></a></li>
     <?php
     }
     ?>
      <li><a href="view-brand.php" title="Size"><i class="fa fa-square"></i><span>Brand</span></a></li>
      <li><a href="view-product-type.php" title="Product Type"><i class="fa fa-square"></i><span> Product Type</span></a></li>
      <li><a href="view-main-series.php" title="Main Series"><i class="fa fa-square"></i><span>Main Series</span></a></li>
      <li><a href="view-series.php" title="Series"><i class="fa fa-square"></i><span>Series</span></a></li>
      <li><a href="view-size.php" title="Size"><i class="fa fa-square"></i><span>Size</span></a></li>
      <li><a href="view-grade.php" title="Grade"><i class="fa fa-square"></i><span>Grade</span></a></li>
      <li><a href="view-design.php" title="Design"><i class="fa fa-square"></i><span>Design</span></a></li>
      <li><a href="view-plant.php" title="Plant"><i class="fa fa-square"></i><span>Plant/Unit</span></a></li>
      <li><a href="view-punch.php" title="Punch"><i class="fa fa-square"></i><span>Punch</span></a></li>
      <li><a href="view-glaz.php" title="Glaz"><i class="fa fa-square"></i><span>Glaz</span></a></li>
      <li><a href="view-godown.php" title="Godown"><i class="fa fa-square"></i><span>Godown</span></a></li>
      
    </ul>
  </li>
 <?php
}
if($rowprofile['item_master']==1) {
?> 
  
  <li><a  href="view-item.php" title="Item" data-id="dash-sub"><i class="entypo-icq"></i><span>Item</span></a> 
  </li>
<?php
}
if($rowprofile['pro_master']==1) {
?>
  <li><a  href="view-production.php" title="Production" data-id="dash-sub"><i class="entypo-icq"></i><span>Production</span></a> 
  </li>
 <?php
}
if($rowprofile['state_master']==1) {
?> 
  <li><a  href="view-state.php" title="State" data-id="dash-sub"><i class="entypo-icq"></i><span>State Master</span></a> 
  </li>
<?php
}
if($rowprofile['mrp_master']==1) {
?>  
  <li><a  href="view-mrp.php" title="MRP" data-id="dash-sub"><i class="entypo-icq"></i><span>MRP</span></a> 
  </li>
 <?php
}
if($rowprofile['exe_master']==1) {
?> 
  <li><a class="submenu" href="#" title="Executive" data-id="widgets-sub"><i class="entypo-user"></i><span>Executive</span></a>
  
    <ul id="widgets-sub">
      <li><a href="new-executive.php" title="Executive"><i class="fa fa-square"></i><span>New Executive</span></a></li>
      <li><a href="executive-list.php" title="Executive List"><i class="fa fa-square"></i><span>Executive List</span></a></li>
      <li><a href="profile-setting.php" title="Executive Profile Setting"><i class="fa fa-square"></i><span>Profile Setting</span></a></li>
    </ul>
  </li>
  <?php
}
if($rowprofile['dealer_master']==1) {
?>
  <li><a href="#" class="submenu" data-id="tables-sub" title="Dealer"><i class="entypo-user"></i><span>Dealer</span></a> 
    <ul id="tables-sub" class="accordion">
    
      <li><a href="new-dealer.php" title="Dealer"><i class="fa fa-square"></i><span>New Dealer</span></a></li>
      
      <li><a href="dealer-executive.php" title="Dealer Assign Executive"><i class="fa fa-square"></i><span>Dealer Assign Executive</span></a></li>
      
      <li><a href="dealer-list.php" title="Dealer List"><i class="fa fa-square"></i><span>Dealer List</span></a></li>
      
    </ul>
  </li>
 <?php
}
if($rowprofile['new_order']==1)
{    
?> 
  
  <li><a  href="purchase.php"  title="DO"><i class="fa fa-th"></i><span>New DO</span></a> </li>
  <?php
}  
if($rowprofile['view_order']==1) {
?>
  <li><a href="#" class="submenu" data-id="tables-sub1" title="Order"><i class="fa fa-th"></i><span>Order</span></a> 
    <ul id="tables-sub1" class="accordion">
    
      <li><a href="pending-order-list.php" title="Pending Order"><i class="fa fa-square"></i><span>Pending Order</span></a></li>
      
      <li><a href="dispatch-order-list.php" title="Dispatch Order"><i class="fa fa-square"></i><span>Dispatch Order</span></a></li>
      
      <li><a href="sales-order-list.php" title="Sales Order"><i class="fa fa-square"></i><span>Sales Order</span></a></li>
      <li><a href="reject-order-list.php" title="Reject Order"><i class="fa fa-square"></i><span>Rejected Order</span></a></li>
      
    </ul>
  </li>
<?php
}
if($rowprofile['report_master']==1) {
?>  
  
  <li> <a class="submenu" href="#" title="Reports" data-id="graph-sub"><i class="entypo-chart-area"></i><span> Reports</span></a> 
    <!-- Graph and Charts Menu -->
    <ul id="graph-sub" class="accordion">
    
      <li><a href="" title="pending-order.php"><i class="entypo-chart-bar"></i><span>Pending Order</span></a></li>
    
      <li><a href="" title="sales-reports.php"><i class="entypo-chart-pie"></i><span>Sales Reports</span></a></li>
      <li><a href="export_dealer.php" title="Export "><i class="entypo-chart-pie"></i><span>Dealer Export</span></a></li>
      <li><a href="export-statewise_available_security_cheque.php" title="Export Dealer Security Cheque"><i class="entypo-chart-pie"></i><span>Security Cheque</span></a></li>
      <li><a href="export-statewise_notavailable_security_cheque.php" title="Export Dealer Without Security Cheque"><i class="entypo-chart-pie"></i><span>Without Security Cheque</span></a></li>
      
    </ul>
   
   </li> 
  
   <?php
}
}
?>
  
  
<li><a  href="logout.php"  title="Logout User"><i class="fa fa-power-off"></i><span>logout</span></a> </li>
</ul>
<?php } ?>