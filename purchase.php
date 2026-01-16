<?php
session_start();
$username='';
$usertype='';
$company='';
include('config.php');
if(isset($_SESSION['username']))
{
	
	$usertype=$_SESSION['usertype'];
	$username=$_SESSION['username'];
	$company=$_SESSION['company'];
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

<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
<style>
input:focus,select:focus,textarea:focus{
    background-color: yellow;
}
</style>
<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css" />
<script type="text/javascript">
$().ready(function() {
	$("#dealer").autocomplete("ajax_dealer.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<script type="text/javascript">
$().ready(function() {
    $("#series1").autocomplete("ajax_design.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<script type="text/javascript">
$().ready(function() {
    $("#series2").autocomplete("ajax_design.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<script type="text/javascript">
$().ready(function() {
    $("#series3").autocomplete("ajax_design.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<script type="text/javascript">
$().ready(function() {
    $("#series4").autocomplete("ajax_design.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<script type="text/javascript">
$().ready(function() {
    $("#series5").autocomplete("ajax_design.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<script type="text/javascript">
$().ready(function() {
    $("#series6").autocomplete("ajax_design.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<script type="text/javascript">
$().ready(function() {
    $("#series7").autocomplete("ajax_design.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<!--8-->
<script type="text/javascript">
$().ready(function() {
    $("#series8").autocomplete("ajax_design.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<!--9-->
<script type="text/javascript">
$().ready(function() {
    $("#series9").autocomplete("ajax_design.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<!--10-->
<script type="text/javascript">
$().ready(function() {
    $("#series10").autocomplete("ajax_design.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<!--11-->
<script type="text/javascript">
$().ready(function() {
    $("#series11").autocomplete("ajax_design.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<!--12-->
<script type="text/javascript">
$().ready(function() {
    $("#series12").autocomplete("ajax_design.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<!--13-->
<script type="text/javascript">
$().ready(function() {
    $("#series13").autocomplete("ajax_design.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<!--14-->
<script type="text/javascript">
$().ready(function() {
    $("#series14").autocomplete("ajax_design.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<!--15-->
<script type="text/javascript">
$().ready(function() {
    $("#series15").autocomplete("ajax_design.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<!--16-->
<script type="text/javascript">
$().ready(function() {
    $("#series16").autocomplete("ajax_design.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<!--17-->
<script type="text/javascript">
$().ready(function() {
    $("#series17").autocomplete("ajax_design.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<!--18-->
<script type="text/javascript">
$().ready(function() {
    $("#series18").autocomplete("ajax_design.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<!--19-->
<script type="text/javascript">
$().ready(function() {
    $("#series19").autocomplete("ajax_design.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
 <!--20-->
<script type="text/javascript">
$().ready(function() {
    $("#series20").autocomplete("ajax_design.php", {
        matchContains: true,
        selectFirst: false
    });
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".dealer").change(function()
{
var dataString = 'add='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_dealeradd.php",
data: dataString,
cache: false,
success: function(html)
{
$(".address").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".dealer").change(function()
{
var dataString = 'tin='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_dealertin.php",
data: dataString,
cache: false,
success: function(html)
{
$(".tin").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".dealer").change(function()
{
var dataString = 'cst='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_dealercst.php",
data: dataString,
cache: false,
success: function(html)
{
$(".cst").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".dealer").change(function()
{
var dataString = 'gst='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_dealergst.php",
data: dataString,
cache: false,
success: function(html)
{
$(".gst").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".dealer").change(function()
{
var dataString = 'exe='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_delexe.php",
data: dataString,
cache: false,
success: function(html)
{
$(".transport").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".dealer").change(function()
{
var dataString = 'city='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_dealercity.php",
data: dataString,
cache: false,
success: function(html)
{
$(".city").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".dealer").change(function()
{
var dataString = 'add='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_centre.php",
data: dataString,
cache: false,
success: function(html)
{
$(".centre").html(html);
}
});
});
});

</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".dealer").change(function()
{
var dataString = 'del='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_dellimit.php",
data: dataString,
cache: false,
success: function(html)
{
$(".dealerlimit").html(html);
}
});
});
});

</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".dealer").change(function()
{
var dataString = 'chk='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_s_cheque.php",
data: dataString,
cache: false,
success: function(html)
{
$(".checkno").html(html);
}
});
});
});

</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".dealer").change(function()
{
var dataString = 'acc='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_s_acc.php",
data: dataString,
cache: false,
success: function(html)
{
$(".checkdate").html(html);
}
});
});
});

</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".dealer").change(function()
{
var dataString = 'bname='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_s_bname.php",
data: dataString,
cache: false,
success: function(html)
{
$(".bankname").html(html);
}
});
});
});

</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".dealer").change(function()
{
var dataString = 'bnc='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_s_bbranch.php",
data: dataString,
cache: false,
success: function(html)
{
$(".bankbranch").html(html);
}
});
});
});

</script>

<!--1-->
<script type="application/javascript">
$(document).ready(function()
{
$("#series1").change(function()
{
var dataString = 'design1='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_price.php",
data: dataString,
cache: false,
success: function(html)
{
$(".mrp1").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".totalbox1").change(function()
{
var dataString = 'totalbox='+ $(this).val()+'&design1='+document.getElementById('series1').value;
$.ajax
({
type: "POST",
url: "ajax_pack.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pack1").html(html);
} 
});
});
});
</script>

<!--2-->
<script type="application/javascript">
$(document).ready(function()
{
$("#series2").change(function()
{
var dataString = 'design2='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_price.php",
data: dataString,
cache: false,
success: function(html)
{
$(".mrp2").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".totalbox2").change(function()
{
var dataString = 'totalbox='+ $(this).val()+'&design2='+document.getElementById('series2').value;
$.ajax
({
type: "POST",
url: "ajax_pack.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pack2").html(html);
} 
});
});
});
</script>

<!--3-->
<script type="application/javascript">
$(document).ready(function()
{
$("#series3").change(function()
{
var dataString = 'design3='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_price.php",
data: dataString,
cache: false,
success: function(html)
{
$(".mrp3").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".totalbox3").change(function()
{
var dataString = 'totalbox='+ $(this).val()+'&design3='+document.getElementById('series3').value;
$.ajax
({
type: "POST",
url: "ajax_pack.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pack3").html(html);
} 
});
});
});
</script>

<!--4-->
<script type="application/javascript">
$(document).ready(function()
{
$("#series4").change(function()
{
var dataString = 'design4='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_price.php",
data: dataString,
cache: false,
success: function(html)
{
$(".mrp4").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".totalbox4").change(function()
{
var dataString = 'totalbox='+ $(this).val()+'&design4='+document.getElementById('series4').value;
$.ajax
({
type: "POST",
url: "ajax_pack.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pack4").html(html);
} 
});
});
});
</script>

<!--5-->
<script type="application/javascript">
$(document).ready(function()
{
$("#series5").change(function()
{
var dataString = 'design5='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_price.php",
data: dataString,
cache: false,
success: function(html)
{
$(".mrp5").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".totalbox5").change(function()
{
var dataString = 'totalbox='+ $(this).val()+'&design5='+document.getElementById('series5').value;
$.ajax
({
type: "POST",
url: "ajax_pack.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pack5").html(html);
} 
});
});
});
</script>

<!--6-->
<script type="application/javascript">
$(document).ready(function()
{
$("#series6").change(function()
{
var dataString = 'design6='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_price.php",
data: dataString,
cache: false,
success: function(html)
{
$(".mrp6").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".totalbox6").change(function()
{
var dataString = 'totalbox='+ $(this).val()+'&design6='+document.getElementById('series6').value;
$.ajax
({
type: "POST",
url: "ajax_pack.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pack6").html(html);
} 
});
});
});
</script>

<!--7-->
<script type="application/javascript">
$(document).ready(function()
{
$("#series7").change(function()
{
var dataString = 'design7='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_price.php",
data: dataString,
cache: false,
success: function(html)
{
$(".mrp7").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".totalbox7").change(function()
{
var dataString = 'totalbox='+ $(this).val()+'&design7='+document.getElementById('series7').value;
$.ajax
({
type: "POST",
url: "ajax_pack.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pack7").html(html);
} 
});
});
});
</script>
<!--8-->
<script type="application/javascript">
$(document).ready(function()
{
$("#series8").change(function()
{
var dataString = 'design8='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_price.php",
data: dataString,
cache: false,
success: function(html)
{
$(".mrp8").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".totalbox8").change(function()
{
var dataString = 'totalbox='+ $(this).val()+'&design8='+document.getElementById('series8').value;
$.ajax
({
type: "POST",
url: "ajax_pack.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pack8").html(html);
}
});
});
});
</script>

<!--9-->
<script type="application/javascript">
$(document).ready(function()
{
$("#series9").change(function()
{
var dataString = 'design9='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_price.php",
data: dataString,
cache: false,
success: function(html)
{
$(".mrp9").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".totalbox9").change(function()
{
var dataString = 'totalbox='+ $(this).val()+'&design9='+document.getElementById('series9').value;
$.ajax
({
type: "POST",
url: "ajax_pack.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pack9").html(html);
}
});
});
});
</script>

<!--10-->
<script type="application/javascript">
$(document).ready(function()
{
$("#series10").change(function()
{
var dataString = 'design10='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_price.php",
data: dataString,
cache: false,
success: function(html)
{
$(".mrp10").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".totalbox10").change(function()
{
var dataString = 'totalbox='+ $(this).val()+'&design10='+document.getElementById('series10').value;
$.ajax
({
type: "POST",
url: "ajax_pack.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pack10").html(html);
}
});
});
});
</script>

<!--11-->
<script type="application/javascript">
$(document).ready(function()
{
$("#series11").change(function()
{
var dataString = 'design11='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_price.php",
data: dataString,
cache: false,
success: function(html)
{
$(".mrp11").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".totalbox11").change(function()
{
var dataString = 'totalbox='+ $(this).val()+'&design11='+document.getElementById('series11').value;
$.ajax
({
type: "POST",
url: "ajax_pack.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pack11").html(html);
}
});
});
});
</script>

<!--12-->
<script type="application/javascript">
$(document).ready(function()
{
$("#series12").change(function()
{
var dataString = 'design12='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_price.php",
data: dataString,
cache: false,
success: function(html)
{
$(".mrp12").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".totalbox12").change(function()
{
var dataString = 'totalbox='+ $(this).val()+'&design12='+document.getElementById('series12').value;
$.ajax
({
type: "POST",
url: "ajax_pack.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pack12").html(html);
}
});
});
});
</script>

<!--13-->
<script type="application/javascript">
$(document).ready(function()
{
$("#series13").change(function()
{
var dataString = 'design13='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_price.php",
data: dataString,
cache: false,
success: function(html)
{
$(".mrp13").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".totalbox13").change(function()
{
var dataString = 'totalbox='+ $(this).val()+'&design13='+document.getElementById('series13').value;
$.ajax
({
type: "POST",
url: "ajax_pack.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pack13").html(html);
}
});
});
});
</script>

<!--14-->
<script type="application/javascript">
$(document).ready(function()
{
$("#series14").change(function()
{
var dataString = 'design14='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_price.php",
data: dataString,
cache: false,
success: function(html)
{
$(".mrp14").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".totalbox14").change(function()
{
var dataString = 'totalbox='+ $(this).val()+'&design14='+document.getElementById('series14').value;
$.ajax
({
type: "POST",
url: "ajax_pack.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pack14").html(html);
}
});
});
});
</script>

<!--15-->
<script type="application/javascript">
$(document).ready(function()
{
$("#series15").change(function()
{
var dataString = 'design15='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_price.php",
data: dataString,
cache: false,
success: function(html)
{
$(".mrp15").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".totalbox15").change(function()
{
var dataString = 'totalbox='+ $(this).val()+'&design15='+document.getElementById('series15').value;
$.ajax
({
type: "POST",
url: "ajax_pack.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pack15").html(html);
}
});
});
});
</script>

<!--16-->
<script type="application/javascript">
$(document).ready(function()
{
$("#series16").change(function()
{
var dataString = 'design16='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_price.php",
data: dataString,
cache: false,
success: function(html)
{
$(".mrp16").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".totalbox16").change(function()
{
var dataString = 'totalbox='+ $(this).val()+'&design16='+document.getElementById('series16').value;
$.ajax
({
type: "POST",
url: "ajax_pack.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pack16").html(html);
}
});
});
});
</script>

<!--17-->
<script type="application/javascript">
$(document).ready(function()
{
$("#series17").change(function()
{
var dataString = 'design17='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_price.php",
data: dataString,
cache: false,
success: function(html)
{
$(".mrp17").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".totalbox17").change(function()
{
var dataString = 'totalbox='+ $(this).val()+'&design17='+document.getElementById('series17').value;
$.ajax
({
type: "POST",
url: "ajax_pack.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pack17").html(html);
}
});
});
});
</script>

<!--18-->
<script type="application/javascript">
$(document).ready(function()
{
$("#series18").change(function()
{
var dataString = 'design18='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_price.php",
data: dataString,
cache: false,
success: function(html)
{
$(".mrp18").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".totalbox18").change(function()
{
var dataString = 'totalbox='+ $(this).val()+'&design18='+document.getElementById('series18').value;
$.ajax
({
type: "POST",
url: "ajax_pack.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pack18").html(html);
}
});
});
});
</script>

<!--19-->
<script type="application/javascript">
$(document).ready(function()
{
$("#series19").change(function()
{
var dataString = 'design19='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_price.php",
data: dataString,
cache: false,
success: function(html)
{
$(".mrp19").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".totalbox19").change(function()
{
var dataString = 'totalbox='+ $(this).val()+'&design19='+document.getElementById('series19').value;
$.ajax
({
type: "POST",
url: "ajax_pack.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pack19").html(html);
}
});
});
});
</script>

<!--20-->
<script type="application/javascript">
$(document).ready(function()
{
$("#series20").change(function()
{
var dataString = 'design20='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_price.php",
data: dataString,
cache: false,
success: function(html)
{
$(".mrp20").html(html);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".totalbox20").change(function()
{
var dataString = 'totalbox='+ $(this).val()+'&design20='+document.getElementById('series20').value;
$.ajax
({
type: "POST",
url: "ajax_pack.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pack20").html(html);
}
});
});
});
</script>
<script type="application/javascript">
function boxcheck1()
{
var dataString = 'series='+document.getElementById('series1').value+'&grade='+document.getElementById('grade1').value+'&box='+document.getElementById('totalbox1').value;
$.ajax
({
type: "POST",
url: "ajax_boxcheck.php",
data: dataString,
cache: false,
success: function(html)
{
$("#box1").html(html);
} 
})};
</script>
<script type="application/javascript">
function boxcheck2()
{
var dataString = 'series='+document.getElementById('series2').value+'&grade='+document.getElementById('grade2').value+'&box='+document.getElementById('totalbox2').value;
$.ajax
({
type: "POST",
url: "ajax_boxcheck.php",
data: dataString,
cache: false,
success: function(html)
{
$("#box2").html(html);
} 
})};
</script>
<script type="application/javascript">
function boxcheck3()
{
var dataString = 'series='+document.getElementById('series3').value+'&grade='+document.getElementById('grade3').value+'&box='+document.getElementById('totalbox3').value;
$.ajax
({
type: "POST",
url: "ajax_boxcheck.php",
data: dataString,
cache: false,
success: function(html)
{
$("#box3").html(html);
} 
})};
</script>
<script type="application/javascript">
function boxcheck4()
{
var dataString = 'series='+document.getElementById('series4').value+'&grade='+document.getElementById('grade4').value+'&box='+document.getElementById('totalbox4').value;
$.ajax
({
type: "POST",
url: "ajax_boxcheck.php",
data: dataString,
cache: false,
success: function(html)
{
$("#box4").html(html);
} 
})};
</script>
<script type="application/javascript">
function boxcheck5()
{
var dataString = 'series='+document.getElementById('series5').value+'&grade='+document.getElementById('grade5').value+'&box='+document.getElementById('totalbox5').value;
$.ajax
({
type: "POST",
url: "ajax_boxcheck.php",
data: dataString,
cache: false,
success: function(html)
{
$("#box5").html(html);
} 
})};
</script>
<script type="application/javascript">
function boxcheck6()
{
var dataString = 'series='+document.getElementById('series6').value+'&grade='+document.getElementById('grade6').value+'&box='+document.getElementById('totalbox6').value;
$.ajax
({
type: "POST",
url: "ajax_boxcheck.php",
data: dataString,
cache: false,
success: function(html)
{
$("#box6").html(html);
} 
})};
</script>
<script type="application/javascript">
function boxcheck7()
{
var dataString = 'series='+document.getElementById('series7').value+'&grade='+document.getElementById('grade7').value+'&box='+document.getElementById('totalbox7').value;
$.ajax
({
type: "POST",
url: "ajax_boxcheck.php",
data: dataString,
cache: false,
success: function(html)
{
$("#box7").html(html);
} 
})};
</script>
<script type="application/javascript">
function boxcheck8()
{
var dataString = 'series='+document.getElementById('series8').value+'&grade='+document.getElementById('grade8').value+'&box='+document.getElementById('totalbox8').value;
$.ajax
({
type: "POST",
url: "ajax_boxcheck.php",
data: dataString,
cache: false,
success: function(html)
{
$("#box8").html(html);
} 
})};
</script>
<script type="application/javascript">
function boxcheck9()
{
var dataString = 'series='+document.getElementById('series9').value+'&grade='+document.getElementById('grade9').value+'&box='+document.getElementById('totalbox9').value;
$.ajax
({
type: "POST",
url: "ajax_boxcheck.php",
data: dataString,
cache: false,
success: function(html)
{
$("#box9").html(html);
} 
})};
</script>
<script type="application/javascript">
function boxcheck10()
{
var dataString = 'series='+document.getElementById('series10').value+'&grade='+document.getElementById('grade10').value+'&box='+document.getElementById('totalbox10').value;
$.ajax
({
type: "POST",
url: "ajax_boxcheck.php",
data: dataString,
cache: false,
success: function(html)
{
$("#box10").html(html);
} 
})};
</script>
<script type="application/javascript">
function boxcheck11()
{
var dataString = 'series='+document.getElementById('series11').value+'&grade='+document.getElementById('grade11').value+'&box='+document.getElementById('totalbox11').value;
$.ajax
({
type: "POST",
url: "ajax_boxcheck.php",
data: dataString,
cache: false,
success: function(html)
{
$("#box11").html(html);
} 
})};
</script>
<script type="application/javascript">
function boxcheck12()
{
var dataString = 'series='+document.getElementById('series12').value+'&grade='+document.getElementById('grade12').value+'&box='+document.getElementById('totalbox12').value;
$.ajax
({
type: "POST",
url: "ajax_boxcheck.php",
data: dataString,
cache: false,
success: function(html)
{
$("#box12").html(html);
} 
})};
</script>
<script type="application/javascript">
function boxcheck13()
{
var dataString = 'series='+document.getElementById('series13').value+'&grade='+document.getElementById('grade13').value+'&box='+document.getElementById('totalbox13').value;
$.ajax
({
type: "POST",
url: "ajax_boxcheck.php",
data: dataString,
cache: false,
success: function(html)
{
$("#box13").html(html);
} 
})};
</script>
<script type="application/javascript">
function boxcheck14()
{
var dataString = 'series='+document.getElementById('series14').value+'&grade='+document.getElementById('grade14').value+'&box='+document.getElementById('totalbox14').value;
$.ajax
({
type: "POST",
url: "ajax_boxcheck.php",
data: dataString,
cache: false,
success: function(html)
{
$("#box14").html(html);
} 
})};
</script>
<script type="application/javascript">
function boxcheck15()
{
var dataString = 'series='+document.getElementById('series15').value+'&grade='+document.getElementById('grade15').value+'&box='+document.getElementById('totalbox15').value;
$.ajax
({
type: "POST",
url: "ajax_boxcheck.php",
data: dataString,
cache: false,
success: function(html)
{
$("#box15").html(html);
} 
})};
</script>
<script type="application/javascript">
function boxcheck16()
{
var dataString = 'series='+document.getElementById('series16').value+'&grade='+document.getElementById('grade16').value+'&box='+document.getElementById('totalbox16').value;
$.ajax
({
type: "POST",
url: "ajax_boxcheck.php",
data: dataString,
cache: false,
success: function(html)
{
$("#box16").html(html);
} 
})};
</script>
<script type="application/javascript">
function boxcheck17()
{
var dataString = 'series='+document.getElementById('series17').value+'&grade='+document.getElementById('grade17').value+'&box='+document.getElementById('totalbox17').value;
$.ajax
({
type: "POST",
url: "ajax_boxcheck.php",
data: dataString,
cache: false,
success: function(html)
{
$("#box17").html(html);
} 
})};
</script>
<script type="application/javascript">
function boxcheck18()
{
var dataString = 'series='+document.getElementById('series18').value+'&grade='+document.getElementById('grade18').value+'&box='+document.getElementById('totalbox18').value;
$.ajax
({
type: "POST",
url: "ajax_boxcheck.php",
data: dataString,
cache: false,
success: function(html)
{
$("#box18").html(html);
} 
})};
</script>
<script type="application/javascript">
function boxcheck19()
{
var dataString = 'series='+document.getElementById('series19').value+'&grade='+document.getElementById('grade19').value+'&box='+document.getElementById('totalbox19').value;
$.ajax
({
type: "POST",
url: "ajax_boxcheck.php",
data: dataString,
cache: false,
success: function(html)
{
$("#box19").html(html);
} 
})};
</script>
<script type="application/javascript">
function boxcheck20()
{
var dataString = 'series='+document.getElementById('series20').value+'&grade='+document.getElementById('grade20').value+'&box='+document.getElementById('totalbox20').value;
$.ajax
({
type: "POST",
url: "ajax_boxcheck.php",
data: dataString,
cache: false,
success: function(html)
{
$("#box20").html(html);
} 
})};
</script>
<script type="application/javascript">
function address()
{
	var deladd=document.getElementById('addr').value;
	document.getElementById('deladd').value=deladd;
	
}
</script>
<script type="application/javascript">
function totalamount(value)
{
	var mrp1=0;var mrp2=0;var mrp3=0; var mrp4=0; var mrp5=0; var mrp6=0; var mrp7=0; var mrp8=0;var mrp9=0;var mrp10=0;var mrp11=0;var mrp12=0;var mrp13=0;var mrp14=0;var mrp15=0;var mrp16=0;var mrp17=0;var mrp18=0;var mrp19=0;var mrp20=0;
	
	var amount1=0; var amount2=0; var amount3=0; var amount4=0; var amount5=0; var amount6=0; var amount7=0; var amount8=0;var amount9=0;var amount10=0;var amount11=0;var amount12=0;var amount13=0;var amount14=0;var amount15=0;var amount16=0;var amount17=0;var amount18=0;var amount19=0;var amount20=0;
	
        var box1=0; var box2=0; var box3=0; var box4=0; var box5=0; var box6=0; var box7=0; var box8=0;var box9=0;var box10=0;var box11=0;var box12=0;var box13=0;var box14=0;var box15=0;var box16=0;var box17=0;var box18=0;var box19=0;var box20=0;
	
	var rate1=document.getElementById('rate1').value;	
	var box1=document.getElementById('totalbox1').value;
	
	var rate2=document.getElementById('rate2').value;	
	var box2=document.getElementById('totalbox2').value;
	
	var rate3=document.getElementById('rate3').value;	
	var box3=document.getElementById('totalbox3').value;
	
	var rate4=document.getElementById('rate4').value;	
	var box4=document.getElementById('totalbox4').value;
	
	var rate5=document.getElementById('rate5').value;	
	var box5=document.getElementById('totalbox5').value;
	
	var rate6=document.getElementById('rate6').value;	
	var box6=document.getElementById('totalbox6').value;
	
	var rate7=document.getElementById('rate7').value;	
	var box7=document.getElementById('totalbox7').value;
	
	var rate8=document.getElementById('rate8').value;	
	var box8=document.getElementById('totalbox8').value;
	
        var rate9=document.getElementById('rate9').value;	
	var box9=document.getElementById('totalbox9').value;
	
	var rate10=document.getElementById('rate10').value;	
	var box10=document.getElementById('totalbox10').value;
	
	var rate11=document.getElementById('rate11').value;	
	var box11=document.getElementById('totalbox11').value;
	
	var rate12=document.getElementById('rate12').value;	
	var box12=document.getElementById('totalbox12').value;
	
	var rate13=document.getElementById('rate13').value;	
	var box13=document.getElementById('totalbox13').value;
	
	var rate14=document.getElementById('rate14').value;	
	var box14=document.getElementById('totalbox14').value;
	
	var rate15=document.getElementById('rate15').value;	
	var box15=document.getElementById('totalbox15').value;
	
	var rate16=document.getElementById('rate16').value;	
	var box16=document.getElementById('totalbox16').value;
	
	var rate17=document.getElementById('rate17').value;	
	var box17=document.getElementById('totalbox17').value;
	
	var rate18=document.getElementById('rate18').value;	
	var box18=document.getElementById('totalbox18').value;
	
	var rate19=document.getElementById('rate19').value;	
	var box19=document.getElementById('totalbox19').value;
	
	var rate20=document.getElementById('rate20').value;	
	var box20=document.getElementById('totalbox20').value;
	
	var amount1=rate1*box1;
	var amount2=rate2*box2;
	var amount3=rate3*box3;
	var amount4=rate4*box4;
	var amount5=rate5*box5;
	var amount6=rate6*box6;
	var amount7=rate7*box7;
	var amount8=rate8*box8;
	var amount9=rate9*box9;
	var amount10=rate10*box10;
	var amount11=rate11*box11;
	var amount12=rate12*box12;
	var amount13=rate13*box13;
	var amount14=rate14*box14;
	var amount15=rate15*box15;
	var amount16=rate16*box16;
	var amount17=rate17*box17;
	var amount18=rate18*box18;
	var amount19=rate19*box19;
	var amount20=rate20*box20;

	
	
	document.getElementById('amount1').value=amount1;
	document.getElementById('amount2').value=amount2;	
	document.getElementById('amount3').value=amount3;
	document.getElementById('amount4').value=amount4;
	document.getElementById('amount5').value=amount5;
	document.getElementById('amount6').value=amount6;
	document.getElementById('amount7').value=amount7;
	document.getElementById('amount8').value=amount8;
	document.getElementById('amount9').value=amount9;
	document.getElementById('amount10').value=amount10;
	document.getElementById('amount11').value=amount11;
	document.getElementById('amount12').value=amount12;
	document.getElementById('amount13').value=amount13;
	document.getElementById('amount14').value=amount14;
	document.getElementById('amount15').value=amount15;
	document.getElementById('amount16').value=amount16;
	document.getElementById('amount17').value=amount17;
	document.getElementById('amount18').value=amount18;
	document.getElementById('amount19').value=amount19;
	document.getElementById('amount20').value=amount20;
	
	
	var mrp1=document.getElementById('mrp1').value;
	if(value)
	{
	if(value=='mrp2')
	{
	var mrp2=document.getElementById('mrp2').value;
	}
	if(value=='mrp3')
	{
	var mrp2=document.getElementById('mrp2').value;
	var mrp3=document.getElementById('mrp3').value;
	}
	if(value=='mrp4')
	{
	var mrp2=document.getElementById('mrp2').value;
	var mrp3=document.getElementById('mrp3').value;
	var mrp4=document.getElementById('mrp4').value;
	}
	if(value=='mrp5')
	{
	var mrp2=document.getElementById('mrp2').value;
	var mrp3=document.getElementById('mrp3').value;
	var mrp4=document.getElementById('mrp4').value;
	var mrp5=document.getElementById('mrp5').value;
	}
	if(value=='mrp6')
	{
	var mrp2=document.getElementById('mrp2').value;
	var mrp3=document.getElementById('mrp3').value;
	var mrp4=document.getElementById('mrp4').value;
	var mrp5=document.getElementById('mrp5').value;
	var mrp6=document.getElementById('mrp6').value;
	}
	if(value=='mrp7')
	{
	var mrp2=document.getElementById('mrp2').value;
	var mrp3=document.getElementById('mrp3').value;
	var mrp4=document.getElementById('mrp4').value;
	var mrp5=document.getElementById('mrp5').value;
	var mrp6=document.getElementById('mrp6').value;
	var mrp7=document.getElementById('mrp7').value;
	}
	if(value=='mrp8')
	{
	var mrp2=document.getElementById('mrp2').value;
	var mrp3=document.getElementById('mrp3').value;
	var mrp4=document.getElementById('mrp4').value;
	var mrp5=document.getElementById('mrp5').value;
	var mrp6=document.getElementById('mrp6').value;
	var mrp7=document.getElementById('mrp7').value;
	var mrp8=document.getElementById('mrp8').value;
	}
	
		if(value=='mrp9')
	{
	var mrp2=document.getElementById('mrp2').value;
	var mrp3=document.getElementById('mrp3').value;
	var mrp4=document.getElementById('mrp4').value;
	var mrp5=document.getElementById('mrp5').value;
	var mrp6=document.getElementById('mrp6').value;
	var mrp7=document.getElementById('mrp7').value;
	var mrp8=document.getElementById('mrp8').value;
	var mrp9=document.getElementById('mrp9').value;
	}	
	if(value=='mrp10')
	{
	var mrp2=document.getElementById('mrp2').value;
	var mrp3=document.getElementById('mrp3').value;
	var mrp4=document.getElementById('mrp4').value;
	var mrp5=document.getElementById('mrp5').value;
	var mrp6=document.getElementById('mrp6').value;
	var mrp7=document.getElementById('mrp7').value;
	var mrp8=document.getElementById('mrp8').value;
	var mrp9=document.getElementById('mrp9').value;
	var mrp10=document.getElementById('mrp10').value;	
	}
	if(value=='mrp11')
	{
	var mrp2=document.getElementById('mrp2').value;
	var mrp3=document.getElementById('mrp3').value;
	var mrp4=document.getElementById('mrp4').value;
	var mrp5=document.getElementById('mrp5').value;
	var mrp6=document.getElementById('mrp6').value;
	var mrp7=document.getElementById('mrp7').value;
	var mrp8=document.getElementById('mrp8').value;
	var mrp9=document.getElementById('mrp9').value;
	var mrp10=document.getElementById('mrp10').value;
	var mrp11=document.getElementById('mrp11').value;
	}
	if(value=='mrp12')
	{
		var mrp2=document.getElementById('mrp2').value;
	var mrp3=document.getElementById('mrp3').value;
	var mrp4=document.getElementById('mrp4').value;
	var mrp5=document.getElementById('mrp5').value;
	var mrp6=document.getElementById('mrp6').value;
	var mrp7=document.getElementById('mrp7').value;
	var mrp8=document.getElementById('mrp8').value;
	var mrp9=document.getElementById('mrp9').value;
	var mrp10=document.getElementById('mrp10').value;
	var mrp11=document.getElementById('mrp11').value;
	var mrp12=document.getElementById('mrp12').value;	
	}
	if(value=='mrp13')
	{
		var mrp2=document.getElementById('mrp2').value;
	var mrp3=document.getElementById('mrp3').value;
	var mrp4=document.getElementById('mrp4').value;
	var mrp5=document.getElementById('mrp5').value;
	var mrp6=document.getElementById('mrp6').value;
	var mrp7=document.getElementById('mrp7').value;
	var mrp8=document.getElementById('mrp8').value;
	var mrp9=document.getElementById('mrp9').value;
	var mrp10=document.getElementById('mrp10').value;
	var mrp11=document.getElementById('mrp11').value;
	var mrp12=document.getElementById('mrp12').value;
	var mrp13=document.getElementById('mrp13').value;
	}
	if(value=='mrp14')
	{
	var mrp2=document.getElementById('mrp2').value;
	var mrp3=document.getElementById('mrp3').value;
	var mrp4=document.getElementById('mrp4').value;
	var mrp5=document.getElementById('mrp5').value;
	var mrp6=document.getElementById('mrp6').value;
	var mrp7=document.getElementById('mrp7').value;
	var mrp8=document.getElementById('mrp8').value;
	var mrp9=document.getElementById('mrp9').value;
	var mrp10=document.getElementById('mrp10').value;
	var mrp11=document.getElementById('mrp11').value;
	var mrp12=document.getElementById('mrp12').value;
	var mrp13=document.getElementById('mrp13').value;	
	var mrp14=document.getElementById('mrp14').value;	
	}
	if(value=='mrp15')
	{
		var mrp2=document.getElementById('mrp2').value;
	var mrp3=document.getElementById('mrp3').value;
	var mrp4=document.getElementById('mrp4').value;
	var mrp5=document.getElementById('mrp5').value;
	var mrp6=document.getElementById('mrp6').value;
	var mrp7=document.getElementById('mrp7').value;
	var mrp8=document.getElementById('mrp8').value;
	var mrp9=document.getElementById('mrp9').value;
	var mrp10=document.getElementById('mrp10').value;
	var mrp11=document.getElementById('mrp11').value;
	var mrp12=document.getElementById('mrp12').value;
	var mrp13=document.getElementById('mrp13').value;	
	var mrp14=document.getElementById('mrp14').value;
	var mrp15=document.getElementById('mrp15').value;	
	}
	if(value=='mrp16')
	{
	var mrp2=document.getElementById('mrp2').value;
	var mrp3=document.getElementById('mrp3').value;
	var mrp4=document.getElementById('mrp4').value;
	var mrp5=document.getElementById('mrp5').value;
	var mrp6=document.getElementById('mrp6').value;
	var mrp7=document.getElementById('mrp7').value;
	var mrp8=document.getElementById('mrp8').value;
	var mrp9=document.getElementById('mrp9').value;
	var mrp10=document.getElementById('mrp10').value;
	var mrp11=document.getElementById('mrp11').value;
	var mrp12=document.getElementById('mrp12').value;
	var mrp13=document.getElementById('mrp13').value;	
	var mrp14=document.getElementById('mrp14').value;
	var mrp15=document.getElementById('mrp15').value;
	var mrp16=document.getElementById('mrp16').value;
	}
	if(value=='mrp17')
	{
	var mrp2=document.getElementById('mrp2').value;
	var mrp3=document.getElementById('mrp3').value;
	var mrp4=document.getElementById('mrp4').value;
	var mrp5=document.getElementById('mrp5').value;
	var mrp6=document.getElementById('mrp6').value;
	var mrp7=document.getElementById('mrp7').value;
	var mrp8=document.getElementById('mrp8').value;
	var mrp9=document.getElementById('mrp9').value;
	var mrp10=document.getElementById('mrp10').value;
	var mrp11=document.getElementById('mrp11').value;
	var mrp12=document.getElementById('mrp12').value;
	var mrp13=document.getElementById('mrp13').value;	
	var mrp14=document.getElementById('mrp14').value;
	var mrp15=document.getElementById('mrp15').value;
	var mrp16=document.getElementById('mrp16').value;
	var mrp17=document.getElementById('mrp17').value;
	}
	if(value=='mrp18')
	{
	var mrp2=document.getElementById('mrp2').value;
	var mrp3=document.getElementById('mrp3').value;
	var mrp4=document.getElementById('mrp4').value;
	var mrp5=document.getElementById('mrp5').value;
	var mrp6=document.getElementById('mrp6').value;
	var mrp7=document.getElementById('mrp7').value;
	var mrp8=document.getElementById('mrp8').value;
	var mrp9=document.getElementById('mrp9').value;
	var mrp10=document.getElementById('mrp10').value;
	var mrp11=document.getElementById('mrp11').value;
	var mrp12=document.getElementById('mrp12').value;
	var mrp13=document.getElementById('mrp13').value;	
	var mrp14=document.getElementById('mrp14').value;
	var mrp15=document.getElementById('mrp15').value;
	var mrp16=document.getElementById('mrp16').value;
	var mrp17=document.getElementById('mrp17').value;
	var mrp17=document.getElementById('mrp17').value;
	var mrp18=document.getElementById('mrp18').value;
	
	}
	if(value=='mrp19')
	{
        var mrp2=document.getElementById('mrp2').value;
	var mrp3=document.getElementById('mrp3').value;
	var mrp4=document.getElementById('mrp4').value;
	var mrp5=document.getElementById('mrp5').value;
	var mrp6=document.getElementById('mrp6').value;
	var mrp7=document.getElementById('mrp7').value;
	var mrp8=document.getElementById('mrp8').value;
	var mrp9=document.getElementById('mrp9').value;
	var mrp10=document.getElementById('mrp10').value;
	var mrp11=document.getElementById('mrp11').value;
	var mrp12=document.getElementById('mrp12').value;
	var mrp13=document.getElementById('mrp13').value;	
	var mrp14=document.getElementById('mrp14').value;
	var mrp15=document.getElementById('mrp15').value;
	var mrp16=document.getElementById('mrp16').value;
	var mrp17=document.getElementById('mrp17').value;
	var mrp17=document.getElementById('mrp17').value;
	var mrp18=document.getElementById('mrp18').value;
	var mrp19=document.getElementById('mrp19').value;
	}
	if(value=='mrp20')
	{
        var mrp2=document.getElementById('mrp2').value;
	var mrp3=document.getElementById('mrp3').value;
	var mrp4=document.getElementById('mrp4').value;
	var mrp5=document.getElementById('mrp5').value;
	var mrp6=document.getElementById('mrp6').value;
	var mrp7=document.getElementById('mrp7').value;
	var mrp8=document.getElementById('mrp8').value;
	var mrp9=document.getElementById('mrp9').value;
	var mrp10=document.getElementById('mrp10').value;
	var mrp11=document.getElementById('mrp11').value;
	var mrp12=document.getElementById('mrp12').value;
	var mrp13=document.getElementById('mrp13').value;	
	var mrp14=document.getElementById('mrp14').value;
	var mrp15=document.getElementById('mrp15').value;
	var mrp16=document.getElementById('mrp16').value;
	var mrp17=document.getElementById('mrp17').value;
	var mrp17=document.getElementById('mrp17').value;
	var mrp18=document.getElementById('mrp18').value;
	var mrp19=document.getElementById('mrp19').value;
	var mrp19=document.getElementById('mrp19').value;
	var mrp20=document.getElementById('mrp20').value;
	}
	}
	var mamount1=(mrp1*55*box1)/100;
	var mamount2=(mrp2*55*box2)/100;
	var mamount3=(mrp3*55*box3)/100;
	var mamount4=(mrp4*55*box4)/100;
	var mamount5=(mrp5*55*box5)/100;
	var mamount6=(mrp6*55*box6)/100;
	var mamount7=(mrp7*55*box7)/100;
	var mamount8=(mrp8*55*box8)/100;
	var mamount9=(mrp9*55*box9)/100;
	var mamount10=(mrp10*55*box10)/100;
	var mamount11=(mrp11*55*box11)/100;
	var mamount12=(mrp12*55*box12)/100;
	var mamount13=(mrp13*55*box13)/100;
	var mamount14=(mrp14*55*box14)/100;
	var mamount15=(mrp15*55*box15)/100;
	var mamount16=(mrp16*55*box16)/100;
	var mamount17=(mrp17*55*box17)/100;
	var mamount18=(mrp18*55*box18)/100;
	var mamount19=(mrp19*55*box19)/100;
	var mamount20=(mrp20*55*box20)/100;
	var totalamt=mamount1+mamount2+mamount3+mamount4+mamount5+mamount6+mamount7+mamount8+mamount9+mamount10+mamount11+mamount12+mamount13+mamount14+mamount15+mamount16+mamount17+mamount18+mamount19+mamount20;
	
	var totalamount1=amount1+amount2+amount3+amount4+amount5+amount6+amount7+amount8+amount9+amount10+amount11+amount12+amount13+amount14+amount15+amount16+amount17+amount18+amount19+amount20;
	box1=box1*1;
	box2=box2*1;
	box3=box3*1;
	box4=box4*1;
	box5=box5*1;
	box6=box6*1;
	box7=box7*1;
	box8=box8*1;
	box9=box9*1;
	box10=box10*1;
	box11=box11*1;
	box12=box12*1;
	box13=box13*1;
	box14=box14*1;
	box15=box15*1;
	box16=box16*1;
	box17=box17*1;
	box18=box18*1;
	box19=box19*1;
	box20=box20*1;
	var box=box1+box2+box3+box4+box5+box6+box7+box8+box9+box10+box11+box12+box13+box14+box15+box16+box17+box18+box19+box20;
	
	//var excise=(totalamt*12.5)/100;
	var cgst=0;
        var sgst=0;
        var igst=0;
        var discount=0;
	discount=document.getElementById('discount').value;
        var ds=(totalamount1*discount)/100;
	var totalAmountc=totalamount1-ds;
	//var vattype=document.querySelector('input[name = "taxtype"]:checked').value;
	var city=document.getElementById('city').value;
	if(city=='Gujarat' || city=='GUJARAT')
	{
		 cgst=(totalAmountc*9)/100;
                 sgst=(totalAmountc*9)/100;
	}
	else
	{
		 igst=(totalAmountc*18)/100;	
	}
	
	var ftotal=totalAmountc+cgst+sgst+igst;
	var word=ftotal.toFixed(0);
	var rswords=toWords(word);
	var amount1=word+".00";
	document.getElementById('cgst').value=cgst.toFixed(2); // cgst
	document.getElementById('igst').value=igst.toFixed(2); // igst
	
	document.getElementById('sgst').value=sgst.toFixed(2); // sgst
	
	document.getElementById('totalamount1').value=ftotal.toFixed(2); // round amount rs
	document.getElementById('subtotal').value=totalamount1; // total
	document.getElementById('roundoff').value=ftotal.toFixed(2); // total amount
	document.getElementById('rswords').value=rswords+' Only'; // rs in word
	document.getElementById('box').value=box;	
}
</script>
<script type="application/javascript">
function discount1()
{       var totalamount12=0;
        var discount1=0; 
        totalamount12=document.getElementById('subtotal').value;
	discount1=document.getElementById('discount').value;
	
	var cgst1=0;
        var sgst1=0;
        var igst1=0;
        var ds1=(totalamount12*discount1)/100;
        document.getElementById('discountam').value=ds1.toFixed(2);
	var totalAmountc1=totalamount12-ds1;
	//var vattype=document.querySelector('input[name = "taxtype"]:checked').value;
	var city1=document.getElementById('city').value;
	if(city1=='Gujarat'|| city1=='GUJARAT')
	{
		 cgst1=(totalAmountc1*9)/100;
                 sgst1=(totalAmountc1*9)/100;
	}
	else
	{
		 igst1=(totalAmountc1*18)/100;	
	}
	
	var ftotal1=totalAmountc1+cgst1+sgst1+igst1;
	var word1=ftotal1.toFixed(0);
	var rswords1=toWords(word1);
	var amount11=word1+".00";
	document.getElementById('cgst').value=cgst1.toFixed(2); // cgst
	document.getElementById('igst').value=igst1.toFixed(2); // igst
	
	document.getElementById('sgst').value=sgst1.toFixed(2); // sgst
	
	document.getElementById('totalamount1').value=ftotal1.toFixed(2); // round amount rs
	document.getElementById('roundoff').value=ftotal1.toFixed(2); // total amount
	document.getElementById('rswords').value=rswords1+' Only'; // rs in word
	
}
</script>

<script type="application/javascript">
function discount2()
{       var totalamount12=0;
        var discount1=0; 
        totalamount12=document.getElementById('subtotal').value;
	discount1=document.getElementById('discountam').value;
	
	var cgst1=0;
        var sgst1=0;
        var igst1=0;
       
	var totalAmountc1=totalamount12-discount1;
	//var vattype=document.querySelector('input[name = "taxtype"]:checked').value;
	var city1=document.getElementById('city').value;
	if(city1=='Gujarat' || city1=='GUJARAT')
	{
		 cgst1=(totalAmountc1*9)/100;
                 sgst1=(totalAmountc1*9)/100;
	}
	else
	{
		 igst1=(totalAmountc1*18)/100;	
	}
	
	var ftotal1=totalAmountc1+cgst1+sgst1+igst1;
	var word1=ftotal1.toFixed(0);
	var rswords1=toWords(word1);
	var amount11=word1+".00";
	document.getElementById('cgst').value=cgst1.toFixed(2); // cgst
	document.getElementById('igst').value=igst1.toFixed(2); // igst
	
	document.getElementById('sgst').value=sgst1.toFixed(2); // sgst
	
	document.getElementById('totalamount1').value=ftotal1.toFixed(2); // round amount rs
	document.getElementById('roundoff').value=ftotal1.toFixed(2); // total amount
	document.getElementById('rswords').value=rswords1+' Only'; // rs in word
	
}
</script>
<script type="application/javascript">
function address()
{
	var deladd=document.getElementById('addr').value;
	document.getElementById('deladd').value=deladd;
	
}
</script>
<script type="text/javascript">

function stopRKey(evt) {
  var evt = (evt) ? evt : ((event) ? event : null);
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
}

document.onkeypress = stopRKey;

</script>
</head>

<body onLoad="document.forms.salesorder.dealer.focus()">

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
          <li class="active">Pending Order</li>
        </ul>
      </div>
      <!--/Breadcrumb-->
      
      <div class="page-header">
        <h1>PO<small>form</small></h1>
      </div>
      
      <!-- Widget Row Start grid -->
      <div class="row" id="powerwidgets">
        <div class="col-md-12 bootstrap-grid"> 
          
          <!-- New widget -->
          <div class="powerwidget" id="forms-9" data-widget-editbutton="false">
            <div class="inner-spacer">
              <div class="invoice-block">
                <div class="page-header">
                  
                  <h1>PO Date :- <?php echo date('d-m-Y');?> </h1>
                </div>
                <form action="invoice.php" method="post" name="salesorder" enctype="multipart/form-data" class="orb-form"> 
                <div class="well">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive"> 
                      <table class="table table-striped">
                        <tr>
            <td width=""  align="left" valign="top" >Order Date:</td>
            <td width="" align="left" valign="top" colspan="3"><input type="text" name="date" value="<?php echo date('d-m-Y');?>"/></td>
	    </tr>
        
                        <tr>
                          <td height="30">Dealer:</td>
                          <td><input type="text" name="dealer" value="" id="dealer" class="dealer" style="width:300px !important" required/></td>
                          <td id="centre" colspan="2" class="centre" align="center"></td>
                        </tr>
                        <tr>
                          <td height="30"  align="left" >Address: </td>
                          <td align="left" class="address" id="address"><textarea style="width:300px !important" readonly></textarea></td>
                          <td align="left"> Same As Billing
                            <input type="checkbox" name="deladdress1" onclick="address()"  /></td><td></td>
                         </tr>
                         <tr>
                             
                          <td align="left">Delievery Address :</td><td>
                            <textarea name="deladd" id="deladd" style="width:300px !important" ></textarea></td>
                          <td>GSTIN / UIN :</td><td class="gst" id="gst"><input type="text" style="width:300px !important" readonly></td>
                        </tr>
                        
                        <tr>
                          <td align="left">State Of Supply:</td>
                          <td align="left"  class="city"><input type="text" readonly></td>  
                          <td height="30" >Sales Executive :</td>
                          <td id="transport" class="transport"><input type="text" readonly>&nbsp;&nbsp;<input type="text" readonly></td>
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
                        <th>Qty Boxes</th>
                        <th>Batch No</th>
                        <th>S.Rate</th>
                        <th>Rate</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <td><input name="design1" type="text" class="series1" id="series1" style="width:350px;" required/></td>
                          <td><input type="text" name="totalbox1" id="totalbox1" class="totalbox1" onchange="boxcheck1()" onblur="boxcheck1()" onmouseout="boxcheck1()" onclick="boxcheck1()" onselect="boxcheck1()" style="width:105px;" required/>
                          <span id="box1"></span></td>
                          <td class="pack1"><select ><option>-- Batch No. --</option></select></td>
                          <td class="mrp1"><input type="text" style="width:105px;" required></td>
                           <td width="48"><input type="text" name="rate1" id="rate1" onchange="totalamount('mrp1');" onselect="totalamount('mrp1');"  onkeyup="totalamount('mrp1');" class="input2" style="width:105px;" required/></td>
                           <td width="48"><input type="text" name="amount1" id="amount1" class="amount1" readonly style="width:105px;" required/></td>
                      </tr>
                      <tr>
                        <td><input name="design2" type="text" class="series2" id="series2"  style="width:350px;"/></td>
                        <td><input type="text" name="totalbox2" id="totalbox2" class="totalbox2" onchange="boxcheck2()" onblur="boxcheck2()" onmouseout="boxcheck2()" onclick="boxcheck2()" onselect="boxcheck2()" style="width:105px;"/>
                          <span id="box2"></span></td>
                         <td class="pack2"><select ><option>-- Batch No. --</option></select></td>
                        <td class="mrp2"><input type="text" style="width:105px;" ></td>
                        <td width="48"><input type="text" name="rate2" id="rate2" onchange="totalamount('mrp2');" onselect="totalamount('mrp2');"  onkeyup="totalamount('mrp2');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount2" id="amount2" class="amount2" readonly style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design3" type="text" class="series3" id="series3"  style="width:350px;"/></td>
                        
                        <td><input type="text" name="totalbox3" id="totalbox3" class="totalbox3" onchange="boxcheck3()" onblur="boxcheck3()" onmouseout="boxcheck3()" onclick="boxcheck3()" onselect="boxcheck3()" style="width:105px;"/>
                          <span id="box3"></span></td>
                         <td class="pack3"><select ><option>-- Batch No. --</option></select></td>
                        <td class="mrp3"><input type="text" style="width:105px;" ></td>
                        <td width="48"><input type="text" name="rate3" id="rate3" onchange="totalamount('mrp3');" onselect="totalamount('mrp3');"  onkeyup="totalamount('mrp3');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount3" id="amount3" class="input2" readonly style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design4" type="text" class="series4" id="series4" style="width:350px;" /></td>
                        <td><input type="text" name="totalbox4" id="totalbox4" class="totalbox4" onchange="boxcheck4()" onblur="boxcheck4()" onmouseout="boxcheck4()" onclick="boxcheck4()" onselect="boxcheck4()" style="width:105px;"/>
                          <span id="box4"></span></td>
                        <td class="pack4"><select ><option>-- Batch No. --</option></select></td>
                        <td class="mrp4"><input type="text" style="width:105px;" ></td>
                        <td width="48"><input type="text" name="rate4" id="rate4" onchange="totalamount('mrp4');" onselect="totalamount('mrp4');"  onkeyup="totalamount('mrp4');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount4" id="amount4" class="input2" readonly style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design5" type="text" class="series5" id="series5" style="width:350px;"/></td>
                        <td><input type="text" name="totalbox5" id="totalbox5" class="totalbox5" onchange="boxcheck5()" onblur="boxcheck5()" onmouseout="boxcheck5()" onclick="boxcheck5()" onselect="boxcheck5()" style="width:105px;"/>
                          <span id="box5"></span></td>
                        <td class="pack5"><select ><option>-- Batch No. --</option></select></td>
                        <td class="mrp5"><input type="text" style="width:105px;" ></td>
                        <td width="48"><input type="text" name="rate5" id="rate5" onchange="totalamount('mrp5');" onselect="totalamount('mrp5');"  onkeyup="totalamount('mrp5');" class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount5" id="amount5" class="input2" readonly style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design6" type="text" class="series6" id="series6"  style="width:350px;"/></td>
                        <td><input type="text" name="totalbox6" id="totalbox6" class="totalbox6" onchange="boxcheck6()" onblur="boxcheck6()" onmouseout="boxcheck6()" onclick="boxcheck6()" onselect="boxcheck6()" style="width:105px;"/>
                          <span id="box6"></span></td>
                        <td class="pack6"><select ><option>-- Batch No. --</option></select></td>
                        <td class="mrp6"><input type="text" style="width:105px;" ></td>
                        <td width="48"><input type="text" name="rate6" id="rate6" onchange="totalamount('mrp6');" onselect="totalamount('mrp6');"  onkeyup="totalamount('mrp6');" class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount6" id="amount6" class="input2" readonly style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design7" type="text" class="series7" id="series7" style="width:350px;" /></td>
                        <td><input type="text" name="totalbox7" id="totalbox7" class="totalbox7" onchange="boxcheck7()" onblur="boxcheck7()" onmouseout="boxcheck7()" onclick="boxcheck7()" onselect="boxcheck7()" style="width:105px;"/>
                          <span id="box7"></span></td>
                        <td class="pack7"><select ><option>-- Batch No. --</option></select></td>
                        <td class="mrp7"><input type="text" style="width:105px;" ></td>
                        <td width="48"><input type="text" name="rate7" id="rate7" onchange="totalamount('mrp7');" onselect="totalamount('mrp7');"  onkeyup="totalamount('mrp7');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount7" id="amount7" class="input2" readonly style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design8" type="text" class="series8" id="series8" value="" style="width:350px;"/></td>
                        
                        <td><input type="text" name="totalbox8" id="totalbox8" class="totalbox8" onchange="boxcheck8()" onblur="boxcheck8()" onmouseout="boxcheck8()" onclick="boxcheck8()" onselect="boxcheck8()" style="width:105px;"/>
                          <span id="box8"></span></td>
                        <td class="pack8"><select ><option>-- Batch No. --</option></select></td>
                        <td class="mrp8"><input type="text" style="width:105px;" ></td>
                        <td width="48"><input type="text" name="rate8" id="rate8" onchange="totalamount('mrp8');" onselect="totalamount('mrp8');"  onkeyup="totalamount('mrp8');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount8" id="amount8" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design9" type="text" class="series9" id="series9" value="" style="width:350px;"/></td>
                        <td><input type="text" name="totalbox9" id="totalbox9" class="totalbox9" onchange="boxcheck9()" onblur="boxcheck9()" onmouseout="boxcheck9()" onclick="boxcheck9()" onselect="boxcheck9()" style="width:105px;"/>
                          <span id="box9"></span></td>
                       <td class="pack9"><select ><option>-- Batch No. --</option></select></td> 
                        <td class="mrp9"><input type="text" style="width:105px;" ></td>
                        <td width="48"><input type="text" name="rate9" id="rate9" onchange="totalamount('mrp9');" onselect="totalamount('mrp9');"  onkeyup="totalamount('mrp9');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount9" id="amount9" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design10" type="text" class="series10" id="series10" value="" style="width:350px;"/></td>
                        <td><input type="text" name="totalbox10" id="totalbox10" class="totalbox10" onchange="boxcheck10()" onblur="boxcheck10()" onmouseout="boxcheck10()" onclick="boxcheck10()" onselect="boxcheck10()" style="width:105px;"/>
                          <span id="box10"></span></td>
                        <td class="pack10"><select ><option>-- Batch No. --</option></select></td>
                        <td class="mrp10"><input type="text" style="width:105px;" ></td>
                        <td width="48"><input type="text" name="rate10" id="rate10" onchange="totalamount('mrp10');" onselect="totalamount('mrp10');"  onkeyup="totalamount('mrp10');"  class="input2" style="width:105px;" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount10" id="amount10" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design11" type="text" class="series11" id="series11" value="" style="width:350px;"/></td>
                        <td><input type="text" name="totalbox11" id="totalbox11" class="totalbox11" onchange="boxcheck11()" onblur="boxcheck11()" onmouseout="boxcheck11()" onclick="boxcheck11()" onselect="boxcheck11()" style="width:105px;"/>
                          <span id="box11"></span></td>
                        <td class="pack11"><select ><option>-- Batch No. --</option></select></td>
                        <td class="mrp11"><input type="text" style="width:105px;" ></td>
                        <td width="48"><input type="text" name="rate11" id="rate11" onchange="totalamount('mrp11');" onselect="totalamount('mrp11');"  onkeyup="totalamount('mrp11');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount11" id="amount11" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design12" type="text" class="series12" id="series12" value="" style="width:350px;"/></td>
                        <td><input type="text" name="totalbox12" id="totalbox12" class="totalbox12" onchange="boxcheck12()" onblur="boxcheck12()" onmouseout="boxcheck12()" onclick="boxcheck12()" onselect="boxcheck12()" style="width:105px;"/>
                          <span id="box12"></span></td>
                        <td class="pack12"><select ><option>-- Batch No. --</option></select></td>
                        <td class="mrp12"><input type="text" style="width:105px;" ></td>
                        <td width="48"><input type="text" name="rate12" id="rate12" onchange="totalamount('mrp12');" onselect="totalamount('mrp12');"  onkeyup="totalamount('mrp12');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount12" id="amount12" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design13" type="text" class="series13" id="series13" value="" style="width:350px;"/></td>
                        <td><input type="text" name="totalbox13" id="totalbox13" class="totalbox13" onchange="boxcheck13()" onblur="boxcheck13()" onmouseout="boxcheck13()" onclick="boxcheck13()" onselect="boxcheck13()" style="width:105px;"/>
                          <span id="box13"></span></td>
                        <td class="pack13"><select ><option>-- Batch No. --</option></select></td>
                        <td class="mrp13"><input type="text" style="width:105px;" ></td>
                        <td width="48"><input type="text" name="rate13" id="rate13" onchange="totalamount('mrp13');" onselect="totalamount('mrp13');"  onkeyup="totalamount('mrp13');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount13" id="amount13" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design14" type="text" class="series14" id="series14" value="" style="width:350px;"/></td>
                        <td><input type="text" name="totalbox14" id="totalbox14" class="totalbox14" onchange="boxcheck14()" onblur="boxcheck14()" onmouseout="boxcheck14()" onclick="boxcheck14()" onselect="boxcheck14()" style="width:105px;"/>
                          <span id="box14"></span></td>
                        <td class="pack14"><select ><option>-- Batch No. --</option></select></td>
                        <td class="mrp14"><input type="text" style="width:105px;" ></td>
                        <td width="48"><input type="text" name="rate14" id="rate14" onchange="totalamount('mrp14');" onselect="totalamount('mrp14');"  onkeyup="totalamount('mrp14');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount14" id="amount14" readonly class="input2" style="width:105px;" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design15" type="text" class="series15" id="series15" value="" style="width:350px;"/></td>
                        <td><input type="text" name="totalbox15" id="totalbox15" class="totalbox15" onchange="boxcheck15()" onblur="boxcheck15()" onmouseout="boxcheck15()" onclick="boxcheck15()" onselect="boxcheck15()" style="width:105px;"/>
                          <span id="box15"></span></td>
                        <td class="pack15"><select ><option>-- Batch No. --</option></select></td>
                        <td class="mrp15"><input type="text" style="width:105px;" ></td>
                        <td width="48"><input type="text" name="rate15" id="rate15" onchange="totalamount('mrp15');" onselect="totalamount('mrp15');"  onkeyup="totalamount('mrp15');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount15" id="amount15" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design16" type="text" class="series16" id="series16" value="" style="width:350px;"/></td>
                        <td><input type="text" name="totalbox16" id="totalbox16" class="totalbox16" onchange="boxcheck16()" onblur="boxcheck16()" onmouseout="boxcheck16()" onclick="boxcheck16()" onselect="boxcheck16()" style="width:105px;"/>
                          <span id="box16"></span></td>
                        <td class="pack16"><select ><option>-- Batch No. --</option></select></td>
                        <td class="mrp16"><input type="text" style="width:105px;" ></td>
                        <td width="48"><input type="text" name="rate16" id="rate16" onchange="totalamount('mrp16');" onselect="totalamount('mrp16');"  onkeyup="totalamount('mrp16');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount16" id="amount16" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design17" type="text" class="series17" id="series17" value="" style="width:350px;"/></td>
                        <td><input type="text" name="totalbox17" id="totalbox17" class="totalbox17" onchange="boxcheck17()" onblur="boxcheck17()" onmouseout="boxcheck17()" onclick="boxcheck17()" onselect="boxcheck17()" style="width:105px;"/>
                          <span id="box17"></span></td>
                        <td class="pack17"><select ><option>-- Batch No. --</option></select></td>
                        <td class="mrp17"><input type="text" style="width:105px;" ></td>
                        <td width="48"><input type="text" name="rate17" id="rate17" onchange="totalamount('mrp17');" onselect="totalamount('mrp17');"  onkeyup="totalamount('mrp17');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount17" id="amount17" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design18" type="text" class="series18" id="series18" value="" style="width:350px;"/></td>
                        <td><input type="text" name="totalbox18" id="totalbox18" class="totalbox18" onchange="boxcheck18()" onblur="boxcheck18()" onmouseout="boxcheck18()" onclick="boxcheck18()" onselect="boxcheck18()" style="width:105px;"/>
                          <span id="box18"></span></td>
                        <td class="pack18"><select ><option>-- Batch No. --</option></select></td>
                        <td class="mrp18"><input type="text" style="width:105px;" ></td>
                        <td width="48"><input type="text" name="rate18" id="rate18" onchange="totalamount('mrp18');" onselect="totalamount('mrp18');"  onkeyup="totalamount('mrp18');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount18" id="amount18" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design19" type="text" class="series19" id="series19" value="" style="width:350px;"/></td>
                        <td><input type="text" name="totalbox19" id="totalbox19" class="totalbox19" onchange="boxcheck19()" onblur="boxcheck19()" onmouseout="boxcheck19()" onclick="boxcheck19()" onselect="boxcheck19()" style="width:105px;"/>
                          <span id="box19"></span></td>
                        <td class="pack19"><select ><option>-- Batch No. --</option></select></td>
                        <td class="mrp19"><input type="text" style="width:105px;" ></td>
                        <td width="48"><input type="text" name="rate19" id="rate19" onchange="totalamount('mrp19');" onselect="totalamount('mrp19');"  onkeyup="totalamount('mrp19');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount19" id="amount19" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td><input name="design20" type="text" class="series20" id="series20" value="" style="width:350px;"/></td>
                        <td><input type="text" name="totalbox20" id="totalbox20" class="totalbox20" onchange="boxcheck20()" onblur="boxcheck20()" onmouseout="boxcheck20()" onclick="boxcheck20()" onselect="boxcheck20()" style="width:105px;"/>
                          <span id="box20"></span></td>
                        <td class="pack20"><select ><option>-- Batch No. --</option></select></td>
                        <td class="mrp20"><input type="text" style="width:105px;" ></td>
                        <td width="48"><input type="text" name="rate20" id="rate20" onchange="totalamount('mrp20');" onselect="totalamount('mrp20');"  onkeyup="totalamount('mrp20');"  class="input2" style="width:105px;"/></td>
                        <td width="48"><input type="text" name="amount20" id="amount20" readonly class="input2" style="width:105px;"/></td>
                      </tr>
                      <tr>
                        <td>Total</td>
                        
                        <td><input type="text" readonly name="box" id="box" style="width:105px;"/></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input type="text" readonly name="subtotal" id="subtotal" style="width:105px;"/></td>
                      </tr>
                    </tbody>
                    
                    
                  </table>
                  <table class="table table-striped">
  <tr>
  	<td colspan="2"><strong>Security Cheque Detail</strong></td>
    <td>Discount %: <input type="text" name="discount" id="discount"  onchange="discount1()" onselect="discount1()" style="width:20px;" value="0" /></td><td> <input type="text" onchange="discount2()" onselect="discount2()" name="discountam" id="discountam"   /></td>
  </tr>
  <tr>
  <td>Cheque No.</td><td><span id="checkno" class="checkno">
  <input type='text' readonly='readonly' />
    </span></td>
    <td>CGST @ 9%:</td><td> <input type="text" name="cgst" id="cgst" readonly /></td>
  </tr>
  <tr>
  <td>Account No.</td><td><span id="checkdate" class="checkdate"><input type='text' readonly='readonly' />
    </span></td>
    <td>SGST @ 9%:</td><td><input type="text" readonly name="sgst" id="sgst" /></td>
  </tr>
  <tr>
  <td>Bank Name</td><td><span id="bankname" class="bankname"><input type='text' readonly='readonly' />
  	  </span></td>
    <td>IGST @ 18%</td><td><input type="text" name="igst" id="igst" readonly /></td>
  </tr>
  
  <tr>
  	<td>Bank Branch </td><td><span class="bankbranch" id="bankbranch">
    <input type='text' readonly='readonly' />
    </span></td>
    <td> Total Amount Rs:</td><td><input type="text" name="totalam" id="roundoff" readonly  /></td>
  </tr>
  <tr>
  <td></td><td></td>
   <td>Round Amount Rs</td>
  <td>  <input type="text" name="totalamount1" readonly style="font:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:16px; color:#03F" id="totalamount1"/> </td> 
  </tr>
  <tr>
  <td></td><td>
    </td>
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