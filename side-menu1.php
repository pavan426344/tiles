<?php 
$select=mysqli_query($con,"select * from profilesetting where User_id='$username'");
while($rowprofile=mysqli_fetch_array($select))
{
?>
<ul id="menu1">
  <li><a class="active" href="#" title="Dashboard" data-id="dash-sub"><i class="entypo-briefcase"></i><span> Dashboard</span></a> </li>
   
  <li><a href="#" title="Design" class="submenu" data-id="design"><i class="entypo-icq"></i><span> Design <!--<span class="badge">32</span>--></span></a>
   
   <ul id="design">
   <?php if($rowprofile['newdesign']==1) {?>
      <li><a href="add-design.php" title="Power Widgets"><i class="fa fa-square"></i><span> Add Design</span></a></li>
      <?php } 
   if($rowprofile['editdesign']==1){ ?>
      <li><a href="design-table.php" title="Portlets"><i class="fa fa-square"></i><span> View Design</span></a></li>
      <li><a href="add-series.php" title="Portlets"><i class="fa fa-square"></i><span> Add Series</span></a></li>
      <li><a href="series-table.php" title="Portlets"><i class="fa fa-square"></i><span> View Series</span></a></li>
      <li><a href="add-color.php" title="Portlets"><i class="fa fa-square"></i><span> Add Color</span></a></li>
      <li><a href="color-table.php" title="Portlets"><i class="fa fa-square"></i><span> View Color</span></a></li>
      <li><a href="add-size.php" title="Portlets"><i class="fa fa-square"></i><span> Add Size</span></a></li>
      <li><a href="size-table.php" title="Portlets"><i class="fa fa-square"></i><span> View Size</span></a></li>
      <li><a href="add-grade.php" title="Portlets"><i class="fa fa-square"></i><span> Add Grade</span></a></li>
      <li><a href="grade-table.php" title="Portlets"><i class="fa fa-square"></i><span> View Grade</span></a></li>
     <?php
   }
  ?> 
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
      <li><a href="new-dealer.php" title="Timeline"><i class="fa fa-square"></i><span>New Dealer</span></a></li>
      <?php } ?>
      <?php if($rowprofile['editdealers']==1) { ?>
      <li><a href="dealer-list.php" title="Profile"><i class="fa fa-square"></i><span>Dealer List</span></a></li>
      <?php } ?>

            <?php if($rowprofile['dealeraccount']==1) {?>
       <li><a href="dealer-account.php" title="Profile"><i class="fa fa-square"></i><span>Dealer Accounts</span></a></li>
        <?php } ?>

            <?php if($usertype==1){ ?>
        <li><a href="dealer-limit.html" title="Profile"><i class="fa fa-square"></i><span>Dealer Limit</span></a></li>
         <?php } ?>
    </ul>
  </li>
  <?php if($rowprofile['newdo']==1) {?>
  <li><a  href="purchase.php"  title="Other Contents"><i class="fa fa-th"></i><span>New DO</span></a> </li>
  <?php
  }
  ?>
  <?php if($rowprofile['newdeposit']==1) {?>
  <li><a  href="deposit.php"  title="Other Contents"><i class="fa fa-th"></i><span>Deposit</span></a> </li>
  <?php
  }
  ?>
  <li> <a class="submenu" href="#" title="Graph &amp; Charts" data-id="graph-sub"><i class="entypo-chart-area"></i><span> Reports</span></a> 
    <!-- Graph and Charts Menu -->
    <ul id="graph-sub" class="accordion">
    <?php if($usertype==1 || $usertype==0) { ?>
      <li><a href="pending-order.php" title="Video Gallery"><i class="entypo-chart-bar"></i><span>Pending Order</span></a></li>
      <?php  } ?>

           

            <?php if($usertype==1 || $usertype==0) { ?>
      <li><a href="sales-reports.php" title="Photo Gallery"><i class="entypo-chart-pie"></i><span>Sales Reports</span></a></li>
      <?php }?>
    </ul>
   </li> 
  
  

</ul>
<?php

}
?>