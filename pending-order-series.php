<?php
if(isset($_REQUEST['submit']))
{
include("config.php");
@session_start();
$username='';
$usertype='';
$qty1='';
$rowcount='';

$design1=array();
if(isset($_SESSION['username']))
{
	include("config.php");
	$usertype=$_SESSION['usertype'];
	$username=$_SESSION['username'];
	
	$CheckStatus=mysqli_query($con,"select * from userlogin where User_Name='$username' and UserType='$usertype'");
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
<html>
<head>
<title>Series Wise Pending Order</title>
<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
}

</style>
<script src="jquery-3.1.0.min.js"></script>
</head>
<body>
<p align="center" style="font-size:18px;"><strong>Entire Ceramics Limited</strong></p>
         <p align="center" style="font:Verdana, Geneva, sans-serif; font-size:14px;margin-top:-8px;" >Survey No: 25/4 & 25/5, N.H. No: 4, Vill: Maradihally, Tal: Hiriyur, Dist: Chitradurga, Karnataka-577532.<br />E.C.C. No.: AADCE0596R EM001  |  VAT NO.: 29811117249  |  C.S.T. NO.: 29811117249</p>
         
  <table id="mytable" align="center">
      <tr>
          <th><b>DO. No.</b></th>
          <?php
          $column=1;
          $select_do_display=mysqli_query($con,"select * from finalsales where Confirm='0'");
          while($select_do_display_row=mysqli_fetch_array($select_do_display))
          {
            
            
            echo "<th><b>".$select_do_display_row['doid']."</b></th>"; 
            $column++;
          }
          ?>
          <th><b>Total</b></th>
      </tr>   
      <?php
         
         $total_qty_column=0;
         $design1=array();
         $select_design=mysqli_query($con,"select * from design where Series='$_REQUEST[Series]' order by DesignName ASC");
         while($select_design_row=mysqli_fetch_array($select_design))
         {
          $total_qty_row=0;   
          $d_name=$select_design_row['DesignName'];   
          echo "<tr><td>".$d_name."</td>";
          
         // $select_design_data=mysqli_query($con,"select * from finalsales_product where DesignName='$d_name'");
          $select_do_confirm=mysqli_query($con,"select * from finalsales where Confirm='0'"); 
          while($select_do_confirm_row=mysqli_fetch_array($select_do_confirm))
          {
            $select_design_data=mysqli_query($con,"select * from finalsales_product where doid='$select_do_confirm_row[doid]' and DesignName='$d_name'");
            if(mysqli_num_rows($select_design_data)<1)
            {
              echo "<td></td>";  
             // $count++;
            }
              while($select_design_data_row=mysqli_fetch_array($select_design_data))
             {
               $qty= $select_design_data_row['Quantity'];  
               echo "<td align='center'>".$qty."</td>";      
               $total_qty_row=$total_qty_row+$qty;
               //$design1[$count]=$design1[$count]+$qty;
              // $count++;
             } 
                 
          }
          echo "<td align='center'>".$total_qty_row."</td>";
          $total_qty_column=$total_qty_column+$total_qty_row;
          echo "</tr>";
          
         }
         echo "<tr><td>Total</td>";
         
         for($i=1;$i<$column;$i++)
         {
             echo "<td></td>";
         }
         echo "<td>".$total_qty_column."</td></tr>";
      ?>
      
  </table>
      
  <script>
$('#mytable th').each(function(i) {
  var remove = 0;

  var tds = $(this).parents('table').find('tr td:nth-child(' + (i + 1) + ')')
  tds.each(function(j) {
    if (this.innerHTML == '') remove++;
  });

  if (remove == ($('#mytable tr').length - 1)) {
    $(this).hide();
    tds.hide();
  }
});
</script>
  </body>
  </html>
  <?php
}
else
{
 echo "<script>document.location='pending-order.php';</script>";	
}
  ?>