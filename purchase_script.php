<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
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
<script>
function getNextElement(field) {
    var form = field.form;
    for ( var e = 0; e < form.elements.length; e++) {
        if (field == form.elements[e]) {
            break;
        }
    }
    return form.elements[++e % form.elements.length];
}

function tabOnEnter(field, evt) {
if (evt.keyCode === 13) {
        if (evt.preventDefault) {
            evt.preventDefault();
        } else if (evt.stopPropagation) {
            evt.stopPropagation();
        } else {
            evt.returnValue = false;
        }
        getNextElement(field).focus();
        return false;
    } else {
        return true;
    }
}
</script>