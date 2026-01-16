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
<script type='text/javascript' src='js/jquery.autocomplete.js'></script>
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

<!--1-->	
<script type="application/javascript">
$(document).ready(function()
{
$("#grade1").change(function()
{
var dataString = 'grade1='+ $(this).val()+'&add='+document.getElementById('city').value+'&price='+document.getElementById('series1').value;
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
$(".series1").change(function()
{
var dataString = 'design1='+ $(this).val();
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
$("#grade2").change(function()
{
var dataString = 'grade2='+ $(this).val()+'&add='+document.getElementById('city').value+'&price='+document.getElementById('series2').value;
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
$(".series2").change(function()
{
var dataString = 'design2='+ $(this).val();
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
$("#grade3").change(function()
{
var dataString = 'grade3='+ $(this).val()+'&add='+document.getElementById('city').value+'&price='+document.getElementById('series3').value;
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
$(".series3").change(function()
{
var dataString = 'design3='+ $(this).val();
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
$("#grade4").change(function()
{
var dataString = 'grade4='+ $(this).val()+'&add='+document.getElementById('city').value+'&price='+document.getElementById('series4').value;
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
$(".series4").change(function()
{
var dataString = 'design4='+ $(this).val();
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
$("#grade5").change(function()
{
var dataString = 'grade5='+ $(this).val()+'&add='+document.getElementById('city').value+'&price='+document.getElementById('series5').value;
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
$(".series5").change(function()
{
var dataString = 'design5='+ $(this).val();
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
$("#grade6").change(function()
{
var dataString = 'grade6='+ $(this).val()+'&add='+document.getElementById('city').value+'&price='+document.getElementById('series6').value;
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
$(".series6").change(function()
{
var dataString = 'design6='+ $(this).val();
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
$("#grade7").change(function()
{
var dataString = 'grade7='+ $(this).val()+'&add='+document.getElementById('city').value+'&price='+document.getElementById('series7').value;
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
$(".series7").change(function()
{
var dataString = 'design7='+ $(this).val();
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
$("#grade8").change(function()
{
var dataString = 'grade8='+ $(this).val()+'&add='+document.getElementById('city').value+'&price='+document.getElementById('series8').value;
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
$(".series8").change(function()
{
var dataString = 'design8='+ $(this).val();
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
$("#grade9").change(function()
{
var dataString = 'grade9='+ $(this).val()+'&add='+document.getElementById('city').value+'&price='+document.getElementById('series9').value;
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
$(".series9").change(function()
{
var dataString = 'design9='+ $(this).val();
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
$("#grade10").change(function()
{
var dataString = 'grade10='+ $(this).val()+'&add='+document.getElementById('city').value+'&price='+document.getElementById('series10').value;
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
$(".series10").change(function()
{
var dataString = 'design10='+ $(this).val();
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
$("#grade11").change(function()
{
var dataString = 'grade11='+ $(this).val()+'&add='+document.getElementById('city').value+'&price='+document.getElementById('series11').value;
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
$(".series11").change(function()
{
var dataString = 'design11='+ $(this).val();
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
$("#grade12").change(function()
{
var dataString = 'grade12='+ $(this).val()+'&add='+document.getElementById('city').value+'&price='+document.getElementById('series12').value;
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
$(".series12").change(function()
{
var dataString = 'design12='+ $(this).val();
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
$("#grade13").change(function()
{
var dataString = 'grade13='+ $(this).val()+'&add='+document.getElementById('city').value+'&price='+document.getElementById('series13').value;
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
$(".series13").change(function()
{
var dataString = 'design13='+ $(this).val();
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
$("#grade14").change(function()
{
var dataString = 'grade14='+ $(this).val()+'&add='+document.getElementById('city').value+'&price='+document.getElementById('series14').value;
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
$(".series14").change(function()
{
var dataString = 'design14='+ $(this).val();
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
$("#grade15").change(function()
{
var dataString = 'grade15='+ $(this).val()+'&add='+document.getElementById('city').value+'&price='+document.getElementById('series15').value;
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
$(".series15").change(function()
{
var dataString = 'design15='+ $(this).val();
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
$("#grade16").change(function()
{
var dataString = 'grade16='+ $(this).val()+'&add='+document.getElementById('city').value+'&price='+document.getElementById('series16').value;
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
$(".series16").change(function()
{
var dataString = 'design16='+ $(this).val();
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
$("#grade17").change(function()
{
var dataString = 'grade17='+ $(this).val()+'&add='+document.getElementById('city').value+'&price='+document.getElementById('series17').value;
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
$(".series17").change(function()
{
var dataString = 'design17='+ $(this).val();
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
$("#grade18").change(function()
{
var dataString = 'grade18='+ $(this).val()+'&add='+document.getElementById('city').value+'&price='+document.getElementById('series18').value;
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
$(".series18").change(function()
{
var dataString = 'design18='+ $(this).val();
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
$("#grade19").change(function()
{
var dataString = 'grade19='+ $(this).val()+'&add='+document.getElementById('city').value+'&price='+document.getElementById('series19').value;
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
$(".series19").change(function()
{
var dataString = 'design19='+ $(this).val();
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
$("#grade20").change(function()
{
var dataString = 'grade20='+ $(this).val()+'&add='+document.getElementById('city').value+'&price='+document.getElementById('series20').value;
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
$(".series20").change(function()
{
var dataString = 'design20='+ $(this).val();
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
	
	var excise=(totalamt*12.5)/100;
	
	var final=totalamount1+excise;
	//var vattype=document.querySelector('input[name = "taxtype"]:checked').value;
	var vattype=document.getElementById('taxtype').value;
	if(vattype=='C FORM')
	{
		 var vat=(final*2)/100;	
	}
	else
	{
		var vat=(final*14.5)/100;	
	}
	var discount=0;
	discount=document.getElementById('discount').value;
	var total=total-(total*discount)/100;
	var total=final+vat;
	var word=total.toFixed(0);
	var rswords=toWords(word);
	var amount1=word+".00";
	document.getElementById('excise').value=excise.toFixed(2);
	document.getElementById('vat').value=vat.toFixed(2);
	
	document.getElementById('excisesub').value=final.toFixed(2);
	
	document.getElementById('totalamount1').value=amount1;
	document.getElementById('subtotal').value=totalamount1;
	document.getElementById('roundoff').value=total.toFixed(2);
	document.getElementById('rswords').value=rswords+' Only';
	document.getElementById('box').value=box;	
}
</script>
<script type="application/javascript">
function discount1()
{
	
	var discount=0; var total=0; var total1=0; var final=0; var ed=0; var hied=0; var excise=0; var totalamount12=0; var vat=0;
	 totalamount12=parseFloat(document.getElementById('subtotal').value);
	discount=parseFloat(document.getElementById('discount').value);
	 excise=parseFloat(document.getElementById('excise').value);
	 
	
	 total1=totalamount12*discount/100;
	document.getElementById('discountam').value=total1;
	 total=totalamount12+excise-total1;
	document.getElementById('excisesub').value=total.toFixed(2);
	var vattype=document.getElementById('taxtype').value;
	if(vattype=='C FORM')
	{
		 vat=(total*2)/100;	
	}
	else
	{
		vat=(total*14.5)/100;	
	}
	
       final=total+vat;
	var word=final.toFixed(0);
	var rswords=toWords(word);
	var amount1=word+".00";
	document.getElementById('vat').value=vat.toFixed(2);
	document.getElementById('totalamount1').value=amount1;
	document.getElementById('roundoff').value=final.toFixed(2);
	document.getElementById('rswords').value=rswords+' Only';
}
</script>
<script type="application/javascript">
function address()
{
	var deladd=document.getElementById('addr').value;
	document.getElementById('deladd').value=deladd;
	
}
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
              <div class="list-group">  <a data-toggle="modal" href="logout.php" target="_self" class="list-group-item goaway"><i class="fa fa-power-off"></i> Sign Out</a> </div>
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
                  <div class="well">
                    <div class="row">
                    
                   <div class="col-lg-6 col-md-6 col-sm-6">
                   <!-- <section>
                      <strong>Dealer Name</strong><br>
                      
                        <input type="text" name="dealer" id="dealer" class="dealer" style="width:200px !important"/>
                      
                      
                    </section>-->
                    <section>
                     <strong>Dealer Name</strong><br>
                      <label class="input">
                        <input type="text" list="list" name="dealer" id="dealer" class="dealer">
                        <datalist id="list">
                          <?php
						$select_dealer=mysqli_query($con,"select * from dealer");
						while($select_dealer_row=mysqli_fetch_array($select_dealer))
						{
						?>
                          <option value="<?php echo $select_dealer_row['CompanyName']." - ".$select_dealer_row['centre'];?>"></option>
                          <?php
						  }
						  ?>
                        </datalist>
                      </label>
                      
                    </section>
                    
                    <section>
                     <strong>Address</strong><br>
                      <label class="address" id="address">
                        
                      </label>
                      
                    </section>
                    <section>
                      <strong>TIN</strong><br>
                      <label class="input">
                        <input type="text" name="CompanyName" required />
                      </label>
                      
                    </section>
                    <section>
                      <strong>CST</strong><br>
                      <label class="input">
                        <input type="text" name="CompanyName" required />
                      </label>
                      
                    </section>
                    <section>
                     <strong>Tax Type</strong><br>
                      <label class="select">
                        <select name="taxtype" id="taxtype"><option>Select</option><option value="LOCAL SALES">LOCAL SALES</option><option value="C FORM">C FORM</option><option value="FULL TAX">FULL TAX</option> </select>
                        <i></i> </label>
                    </section>
                   </div> 
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    <section>
                      <strong>Address Same As Billing</strong> <input type="checkbox" name="checkbox-inline" >
                     
                    </section>
                    <section>
                     <strong>Delievery Address</strong><br>
                      <label class="textarea">
                        <textarea rows="3" name="Address" required ></textarea>
                      </label>
                      
                    </section>
                    <section>
                      <strong>Company</strong><br>
                      <label class="select">
                        <select name="company">
     <option>Select</option>
     <option value="ENTIRE">ENTIRE</option>
     <option value="RELAX">RELAX</option>
     </select>
                        <i></i> </label>
                      
                    </section>
                    <section>
                      <strong>State</strong><br>
                      <label class="input">
                        <input type="text" name="CompanyName" required />
                      </label>
                      
                    </section>
                    
                   </div>
                      
                    </div>
                  </div>
                  <div class="table-responsive">
                    <!--<h5>Invoice for Design Services Under Contract #923 from 03.03.2013</h5>-->
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th width="15%">Design</th>
                          <th width="15%">Grade</th>
                          <th width="12%">Pack</th>
                          <th width="10%">Qty Boxes</th>
                          <th width="5%">MRP</th>
                          <th width="7%">Rate</th>
                          <th width="7%">Total</th>
                        </tr>
                      </thead>
                      <tbody>
    	<tr>
        	<td><input name="design1" type="text" class="series1" id="series1" /></td>
            <td><select name="grade1" class="grade1" id="grade1"> <option value="">select</option> <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                                <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                                <?php } ?></select></td>
            <td  class="pack1"></td>
            <td><input type="text" name="totalbox1" id="totalbox1" class="totalbox1" onchange="boxcheck1()" onblur="boxcheck1()" onmouseout="boxcheck1()" onclick="boxcheck1()" onselect="boxcheck1()" /><span id="box1"></span></td>
            <td class="mrp1"></td>
			<td width="48"><input type="text" name="rate1" id="rate1" onchange="totalamount('mrp1');" onselect="totalamount('mrp1');"  onkeyup="totalamount('mrp1');" class="input2"  /></td>
            <td width="48"><input type="text" name="amount1" id="amount1" class="input2" readonly /></td>
            
            </tr>
            
            <tr>
        	<td><input name="design2" type="text" class="series2" id="series2"  /></td>
            <td><select name="grade2" class="grade2" id="grade2"> <option value="">select</option><?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                                <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                                <?php } ?></select></td>
            <td  class="pack2"></td>
            <td><input type="text" name="totalbox2" id="totalbox2" class="totalbox2" onchange="boxcheck2()" onblur="boxcheck2()" onmouseout="boxcheck2()" onclick="boxcheck2()" onselect="boxcheck2()"/><span id="box2"></span></td>
            <td class="mrp2"></td>
			<td width="48"><input type="text" name="rate2" id="rate2" onchange="totalamount('mrp2');" onselect="totalamount('mrp2');"  onkeyup="totalamount('mrp2');"  class="input2" /></td>
            <td width="48"><input type="text" name="amount2" id="amount2" class="input2" readonly /></td>
            
            </tr>
            
            <tr>
        	<td><input name="design3" type="text" class="series3" id="series3"  /></td>
            <td><select name="grade3" class="grade3" id="grade3"> <option value="">select</option> <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                                <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                                <?php } ?></select></td>
            <td  class="pack3"></td>
            <td><input type="text" name="totalbox3" id="totalbox3" class="input2" onchange="boxcheck3()" onblur="boxcheck3()" onmouseout="boxcheck3()" onclick="boxcheck3()" onselect="boxcheck3()"/><span id="box3"></span></td>
            <td class="mrp3"></td>
			<td width="48"><input type="text" name="rate3" id="rate3" onchange="totalamount('mrp3');" onselect="totalamount('mrp3');"  onkeyup="totalamount('mrp3');"  class="input2" /></td>
            <td width="48"><input type="text" name="amount3" id="amount3" class="input2" readonly /></td>
            
            </tr>
            
            <tr>
        	<td><input name="design4" type="text" class="series4" id="series4"  /></td>
            <td><select name="grade4" class="grade4" id="grade4"><option value="">select</option> <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                                <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                                <?php } ?></select></td>
            <td  class="pack4"></td>
            <td><input type="text" name="totalbox4" id="totalbox4" class="input2" onchange="boxcheck4()" onblur="boxcheck4()" onmouseout="boxcheck4()" onclick="boxcheck4()" onselect="boxcheck4()" /><span id="box4"></span></td>
            <td class="mrp4"></td>
			<td width="48"><input type="text" name="rate4" id="rate4" onchange="totalamount('mrp4');" onselect="totalamount('mrp4');"  onkeyup="totalamount('mrp4');"  class="input2" /></td>
            <td width="48"><input type="text" name="amount4" id="amount4" class="input2" readonly /></td>
            
            </tr>
            
            <tr>
        	<td><input name="design5" type="text" class="series5" id="series5" /></td>
            <td><select name="grade5" class="grade5" id="grade5"><option value="">select</option> <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                                <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                                <?php } ?></select></td>
            <td  class="pack5"></td>
            <td><input type="text" name="totalbox5" id="totalbox5" class="input2" onchange="boxcheck5()" onblur="boxcheck5()" onmouseout="boxcheck5()" onclick="boxcheck5()" onselect="boxcheck5()"/><span id="box5"></span></td>
            <td class="mrp5"></td>
			<td width="48"><input type="text" name="rate5" id="rate5" onchange="totalamount('mrp5');" onselect="totalamount('mrp5');"  onkeyup="totalamount('mrp5');" class="input2" /></td>
            <td width="48"><input type="text" name="amount5" id="amount5" class="input2" readonly /></td>
            
            </tr>
            
            <tr>
        	<td><input name="design6" type="text" class="series6" id="series6"  /></td>
            <td><select name="grade6" class="grade6" id="grade6"><option value="">select</option> <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                                <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                                <?php } ?></select></td>
            <td  class="pack6"></td>
            <td><input type="text" name="totalbox6" id="totalbox6" class="input2" onchange="boxcheck6()" onblur="boxcheck6()" onmouseout="boxcheck6()" onclick="boxcheck6()" onselect="boxcheck6()"/><span id="box6"></span></td>
            <td class="mrp6"></td>
			<td width="48"><input type="text" name="rate6" id="rate6" onchange="totalamount('mrp6');" onselect="totalamount('mrp6');"  onkeyup="totalamount('mrp6');" class="input2" /></td>
            <td width="48"><input type="text" name="amount6" id="amount6" class="input2" readonly /></td>
           
            </tr>
            
            <tr>
        	<td><input name="design7" type="text" class="series7" id="series7"  /></td>
            <td><select name="grade7" class="grade7" id="grade7"><option value="">select</option> <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                                <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                                <?php } ?></select></td>
            <td  class="pack7"></td>
            <td><input type="text" name="totalbox7" id="totalbox7" class="input2" onchange="boxcheck7()" onblur="boxcheck7()" onmouseout="boxcheck7()" onclick="boxcheck7()" onselect="boxcheck7()"/><span id="box7"></span></td>
            <td class="mrp7"></td>
			<td width="48"><input type="text" name="rate7" id="rate7" onchange="totalamount('mrp7');" onselect="totalamount('mrp7');"  onkeyup="totalamount('mrp7');"  class="input2" /></td>
            <td width="48"><input type="text" name="amount7" id="amount7" class="input2" readonly /></td>
            
            </tr>
            
            <tr>
        	<td><input name="design8" type="text" class="series8" id="series8" value="" /></td>
            <td><select name="grade8" class="grade8" id="grade8"><option value="">select</option> <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                                <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                                <?php } ?></select></td>
            <td  class="pack8"></td>
            <td><input type="text" name="totalbox8" id="totalbox8" class="input2" onchange="boxcheck8()" onblur="boxcheck8()" onmouseout="boxcheck8()" onclick="boxcheck8()" onselect="boxcheck8()"/><span id="box8"></span></td>
            <td class="mrp8"></td>
			<td width="48"><input type="text" name="rate8" id="rate8" onchange="totalamount('mrp8');" onselect="totalamount('mrp8');"  onkeyup="totalamount('mrp8');"  class="input2" /></td>
            <td width="48"><input type="text" name="amount8" id="amount8" readonly class="input2" /></td>
            
            </tr>
            
             
            <tr>
        	<td><input name="design9" type="text" class="series9" id="series9" value="" /></td>
            <td><select name="grade9" class="grade9" id="grade9"><option value="">select</option> <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                                <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                                <?php } ?></select></td>
            <td  class="pack9"></td>
            <td><input type="text" name="totalbox9" id="totalbox9" class="input2" onchange="boxcheck9()" onblur="boxcheck9()" onmouseout="boxcheck9()" onclick="boxcheck9()" onselect="boxcheck9()"/><span id="box9"></span></td>
            <td class="mrp9"></td>
			<td width="48"><input type="text" name="rate9" id="rate9" onchange="totalamount('mrp9');" onselect="totalamount('mrp9');"  onkeyup="totalamount('mrp9');"  class="input2" /></td>
            <td width="48"><input type="text" name="amount9" id="amount9" readonly class="input2" /></td>
           
            </tr>
              
            <tr>
        	<td><input name="design10" type="text" class="series10" id="series10" value="" /></td>
            <td><select name="grade10" class="grade10" id="grade10"><option value="">select</option> <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                                <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                                <?php } ?></select></td>
            <td  class="pack10"></td>
            <td><input type="text" name="totalbox10" id="totalbox10" class="input2" onchange="boxcheck10()" onblur="boxcheck10()" onmouseout="boxcheck10()" onclick="boxcheck10()" onselect="boxcheck10()"/><span id="box10"></span></td>
            <td class="mrp10"></td>
			<td width="48"><input type="text" name="rate10" id="rate10" onchange="totalamount('mrp10');" onselect="totalamount('mrp10');"  onkeyup="totalamount('mrp10');"  class="input2" /></td>
            <td width="48"><input type="text" name="amount10" id="amount10" readonly class="input2" /></td>
            
            </tr>
            
             
            <tr>
        	<td><input name="design11" type="text" class="series11" id="series11" value="" /></td>
            <td><select name="grade11" class="grade11" id="grade11"><option value="">select</option> <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                                <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                                <?php } ?></select></td>
            <td  class="pack11"></td>
            <td><input type="text" name="totalbox11" id="totalbox11" class="input2" onchange="boxcheck11()" onblur="boxcheck11()" onmouseout="boxcheck11()" onclick="boxcheck11()" onselect="boxcheck11()"/><span id="box11"></span></td>
            <td class="mrp11"></td>
			<td width="48"><input type="text" name="rate11" id="rate11" onchange="totalamount('mrp11');" onselect="totalamount('mrp11');"  onkeyup="totalamount('mrp11');"  class="input2" /></td>
            <td width="48"><input type="text" name="amount11" id="amount11" readonly class="input2" /></td>
           
            </tr>
            
             
            <tr>
        	<td><input name="design12" type="text" class="series12" id="series12" value="" /></td>
            <td><select name="grade12" class="grade12" id="grade12"><option value="">select</option> <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                                <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                                <?php } ?></select></td>
            <td  class="pack12"></td>
            <td><input type="text" name="totalbox12" id="totalbox12" class="input2" onchange="boxcheck12()" onblur="boxcheck12()" onmouseout="boxcheck12()" onclick="boxcheck12()" onselect="boxcheck12()"/><span id="box12"></span></td>
            <td class="mrp12"></td>
			<td width="48"><input type="text" name="rate12" id="rate12" onchange="totalamount('mrp12');" onselect="totalamount('mrp12');"  onkeyup="totalamount('mrp12');"  class="input2" /></td>
            <td width="48"><input type="text" name="amount12" id="amount12" readonly class="input2" /></td>
            
            </tr>
            
            
             
            <tr>
        	<td><input name="design13" type="text" class="series13" id="series13" value="" /></td>
            <td><select name="grade13" class="grade13" id="grade13"><option value="">select</option> <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                                <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                                <?php } ?></select></td>
            <td  class="pack13"></td>
            <td><input type="text" name="totalbox13" id="totalbox13" class="input2" onchange="boxcheck13()" onblur="boxcheck13()" onmouseout="boxcheck13()" onclick="boxcheck13()" onselect="boxcheck13()"/><span id="box13"></span></td>
            <td class="mrp13"></td>
			<td width="48"><input type="text" name="rate13" id="rate13" onchange="totalamount('mrp13');" onselect="totalamount('mrp13');"  onkeyup="totalamount('mrp13');"  class="input2" /></td>
            <td width="48"><input type="text" name="amount13" id="amount13" readonly class="input2" /></td>
            
            </tr>
            
             
            <tr>
        	<td><input name="design14" type="text" class="series14" id="series14" value="" /></td>
            <td><select name="grade14" class="grade14" id="grade14"><option value="">select</option> <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                                <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                                <?php } ?></select></td>
            <td  class="pack14"></td>
            <td><input type="text" name="totalbox14" id="totalbox14" class="input2" onchange="boxcheck14()" onblur="boxcheck14()" onmouseout="boxcheck14()" onclick="boxcheck14()" onselect="boxcheck14()"/><span id="box14"></span></td>
            <td class="mrp14"></td>
			<td width="48"><input type="text" name="rate14" id="rate14" onchange="totalamount('mrp14');" onselect="totalamount('mrp14');"  onkeyup="totalamount('mrp14');"  class="input2" /></td>
            <td width="48"><input type="text" name="amount14" id="amount14" readonly class="input2" /></td>
           
            </tr>
            
             

            <tr>
        	<td><input name="design15" type="text" class="series15" id="series15" value="" /></td>
            <td><select name="grade15" class="grade15" id="grade15"><option value="">select</option> <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                                <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                                <?php } ?></select></td>
            <td  class="pack15"></td>
            <td><input type="text" name="totalbox15" id="totalbox15" class="input2" onchange="boxcheck15()" onblur="boxcheck15()" onmouseout="boxcheck15()" onclick="boxcheck15()" onselect="boxcheck15()"/><span id="box15"></span></td>
            <td class="mrp15"></td>
			<td width="48"><input type="text" name="rate15" id="rate15" onchange="totalamount('mrp15');" onselect="totalamount('mrp15');"  onkeyup="totalamount('mrp15');"  class="input2" /></td>
            <td width="48"><input type="text" name="amount15" id="amount15" readonly class="input2" /></td>
           
            </tr>
            
             
            <tr>
        	<td><input name="design16" type="text" class="series16" id="series16" value="" /></td>
            <td><select name="grade16" class="grade16" id="grade16"><option value="">select</option> <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                                <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                                <?php } ?></select></td>
            <td  class="pack16"></td>
            <td><input type="text" name="totalbox16" id="totalbox16" class="input2" onchange="boxcheck16()" onblur="boxcheck16()" onmouseout="boxcheck16()" onclick="boxcheck16()" onselect="boxcheck16()"/><span id="box16"></span></td>
            <td class="mrp16"></td>
			<td width="48"><input type="text" name="rate16" id="rate16" onchange="totalamount('mrp16');" onselect="totalamount('mrp16');"  onkeyup="totalamount('mrp16');"  class="input2" /></td>
            <td width="48"><input type="text" name="amount16" id="amount16" readonly class="input2" /></td>
            
            </tr>
            
             
            <tr>
        	<td><input name="design17" type="text" class="series17" id="series17" value="" /></td>
            <td><select name="grade17" class="grade17" id="grade17"><option value="">select</option> <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                                <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                                <?php } ?></select></td>
            <td  class="pack17"></td>
            <td><input type="text" name="totalbox17" id="totalbox17" class="input2" onchange="boxcheck17()" onblur="boxcheck17()" onmouseout="boxcheck17()" onclick="boxcheck17()" onselect="boxcheck17()"/><span id="box17"></span></td>
            <td class="mrp17"></td>
			<td width="48"><input type="text" name="rate17" id="rate17" onchange="totalamount('mrp17');" onselect="totalamount('mrp17');"  onkeyup="totalamount('mrp17');"  class="input2" /></td>
            <td width="48"><input type="text" name="amount17" id="amount17" readonly class="input2" /></td>
            
            </tr>
            
             
            <tr>
        	<td><input name="design18" type="text" class="series18" id="series18" value="" /></td>
            <td><select name="grade18" class="grade18" id="grade18"><option value="">select</option> <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                                <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                                <?php } ?></select></td>
            <td  class="pack18"></td>
            <td><input type="text" name="totalbox18" id="totalbox18" class="input2" onchange="boxcheck18()" onblur="boxcheck18()" onmouseout="boxcheck18()" onclick="boxcheck18()" onselect="boxcheck18()"/><span id="box18"></span></td>
            <td class="mrp18"></td>
			<td width="48"><input type="text" name="rate18" id="rate18" onchange="totalamount('mrp18');" onselect="totalamount('mrp18');"  onkeyup="totalamount('mrp18');"  class="input2" /></td>
            <td width="48"><input type="text" name="amount18" id="amount18" readonly class="input2" /></td>
            
            </tr>
            
             
            <tr>
        	<td><input name="design19" type="text" class="series19" id="series19" value="" /></td>
            <td><select name="grade19" class="grade19" id="grade19"><option value="">select</option> <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                                <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                                <?php } ?></select></td>
            <td  class="pack19"></td>
            <td><input type="text" name="totalbox19" id="totalbox19" class="input2" onchange="boxcheck19()" onblur="boxcheck19()" onmouseout="boxcheck19()" onclick="boxcheck19()" onselect="boxcheck19()"/><span id="box19"></span></td>
            <td class="mrp19"></td>
			<td width="48"><input type="text" name="rate19" id="rate19" onchange="totalamount('mrp19');" onselect="totalamount('mrp19');"  onkeyup="totalamount('mrp19');"  class="input2" /></td>
            <td width="48"><input type="text" name="amount19" id="amount19" readonly class="input2" /></td>
           
            </tr>
            
                        <tr>
        	<td><input name="design20" type="text" class="series20" id="series20" value="" /></td>
            <td><select name="grade20" class="grade20" id="grade20"><option value="">select</option> <?php $grade=mysqli_query($con,"select * from grade"); while($rowgrade=mysqli_fetch_array($grade)){?>
                                <option value="<?php echo $rowgrade['grade']; ?>"><?php echo $rowgrade['grade']; ?></option>
                                <?php } ?></select></td>
            <td  class="pack20"></td>
            <td><input type="text" name="totalbox20" id="totalbox20" class="input2" onchange="boxcheck20()" onblur="boxcheck20()" onmouseout="boxcheck20()" onclick="boxcheck20()" onselect="boxcheck20()"/><span id="box20"></span></td>
            <td class="mrp20"></td>
			<td width="48"><input type="text" name="rate20" id="rate20" onchange="totalamount('mrp20');" onselect="totalamount('mrp20');"  onkeyup="totalamount('mrp20');"  class="input2" /></td>
            <td width="48"><input type="text" name="amount20" id="amount20" readonly class="input2" /></td>
            
            </tr>
            
            <tr>
            <td>Total</td>
            <td></td>
            <td></td>
            <td><input type="text" readonly name="box" id="box"/></td>
            <td></td>
            <td></td>
            <td><input type="text" readonly name="subtotal" id="subtotal" /></td>
            </tr>
    </tbody>
                      <tfoot>
                      <td class="noborders" colspan="2" rowspan="3">&nbsp;</td>
                        <td colspan="2">Total (Net)</td>
                        <td colspan="2">3800.00</td>
                      </tr>
                      <tr>
                        <td colspan="2">VAT</td>
                        <td colspan="2">0.00</td>
                      </tr>
                      <tr>
                        <td colspan="2">Total (EUR)</td>
                        <td colspan="2">3800.00</td>
                      </tr>
                        </tfoot>
                      
                    </table>
                    <div class="row">
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
                    </div>
                  </div>
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