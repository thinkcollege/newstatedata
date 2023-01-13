<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
//ini_set("include_path","../");
$database = Database::getDatabase();
$pages = new page;
$pages->add_page($_SERVER["PHP_SELF"]);
?>
<?php $area = "activity"; $show_flash_link = 0; ?>
<title><?php $mre_base=new mre_base; echo $mre_base->mre_base_sitename;?> - Hours Summary</title>
<base href="http://statedata.local/mdda/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='StyleSheet' type='text/css' href='../common/styles_md.css' />
<link rel='StyleSheet' type='text/css' href='../common/side_menu.css' />

<link rel='StyleSheet' type='text/css' href='../common/side_menu.css' />
<style type="text/css">
   @media print { #side_menu {display: none; }
     /* style sheet for print goes here */
     #main {
         left: 6em;
         margin-right: 3em;
         position: absolute;
         top: 8em;
     }
   }
   input.submit { text-indent:-999px; background:url("../images/buttons/submit.jpg") #FFF top left no-repeat; border:0; height:4em; width:6em; } div#top { font-size:2em; padding:1.36em 0; height:auto; font-weight:bold;}</style>
<!--[if ie]><style type="text/css">input.submit { text-indent:-49em; background:#FFF url(../images/buttons/submit.jpg) no-repeat top right; border:0; height:4em; width:60em; }</style><![endif]-->
<!--<script language="JavaScript"
src="../common/rollovers.js"></script>
<script language="JavaScript" src="../common/common.js"></script>
<script language="JavaScript" src="../common/functions.js"></script>-->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-962830-31', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body bgcolor="#FFFFFF" text="#000000">

<div id="skip"><a href="#side_menu">Skip to navigation and funders</a></div>
<div id="main"><a href="http://dda.dhmh.maryland.gov/Pages/Employment.aspx">
	<img src="images/em1_mary.png" alt="emplyment first Maryland" style="max-width:150px; float:left; padding-right:2em; "></a><h1>Hours Summary</h1>
  <hr>
	<?php
	$userid = isset($_COOKIE['userid']) ? intval($_COOKIE["userid"]) : 0;
	$pages = new page;
	$pageinfo = $pages->get_page($_SERVER["PHP_SELF"]);
	$permission = new permission;
	if (!$pageinfo["itemid"]) {
		$pageinfo["itemid"] = 0;
	}
	$check = $permission->get_permission($userid,$pageinfo["itemid"]);
	print $check["read"] == "false" ? "You don't have permission to view this page!" : <<<EOT
<table id="tablehold" border="1" cellpadding="3" cellspacing="0"><caption>Hours Summary for all providers  in all counties in all regions during the  May 2021 Reporting Period</caption><thead><tr><th>Activity</th><th>Number of Individuals<br /> in Activity</th><th>Percent of Individuals<br /> in Activity</th><th>Average Hours in Activity</th><th>Number worked more than 20 hours/week</th><th>Percent worked more than 20 hours /week</th><th>Total hours worked this period</th></thead><tbody><tr><th scope ="row">Individual Competitive Job</th><td>1,873</td><td>17.5</td><td>42.5</td><td>763</td><td>40.7</td><td>79675.2</td></tr><tr><th scope ="row">Individual Contracted Job</th><td>218</td><td>2.0</td><td>41.7</td><td>85</td><td>39.0</td><td>9087.3</td></tr><tr><th scope ="row">Group Integrated Job</th><td>283</td><td>2.6</td><td>35.1</td><td>108</td><td>38.2</td><td>9919.2</td></tr><tr><th scope ="row">Facility Based/Sheltered Job</th><td>117</td><td>1.1</td><td>53.5</td><td>12</td><td>10.3</td><td>6255.6</td></tr><tr><th scope ="row">Self Employment</th><td>19</td><td>0.2</td><td>18.8</td><td>2</td><td>10.5</td><td>357.0</td></tr><tr><th scope ="row">Community Based Non Work</th><td>2,505</td><td>23.4</td><td>17.8</td><td>250</td><td>10.0</td><td>44480.7</td></tr><tr><th scope ="row">Volunteer Job</th><td>399</td><td>3.7</td></tr><tr><th scope ="row">Facility Based Non Work</th><td>117</td><td>1.1</td></tr><tr><th scope ="row">No Activity Participation</th><td>6,321</td><td>59.2</td></tr><tr class="totalrow"><th>Unduplicated Total</th><td>10,683</td><td colspan="6"></td></tr></tbody></table><a class="getfile" style='display:block; height: 12px;' >Download spreadsheet of this data.</a>
EOT;
	if ($show_flash_link == 1) { ?>

<blockquote style="border:gray 1px dashed; padding:1em;">If you are having difficulty using the site, please <a href="<?php echo $file_path ?>about/feedback.php">contact us</a>.</blockquote>
<div id="footer">
<br />
<p>
This is a project of the Institute for Community Inclusion at UMass Boston supported in part
by the U.S. Department of Health and Human Services under cooperative agreement #90DN0126 with additional support from
the National Institute on Disability and Rehabilitation Research of
the U.S. Department of Education under grant #H133A021503. The opinions contained in this
website are those of the grantee and do not necessarily reflect those of the funders.</p>
<br />
<p style="text-align:center;">
<!-- Creative Commons License -->
<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/2.0/"><img alt="Creative Commons License" border="0" src="http://creativecommons.org/images/public/somerights20.gif" /></a><br />
This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/2.0/">Creative Commons License</a>.
<!-- /Creative Commons License -->
<!--
<rdf:RDF xmlns="http://web.resource.org/cc/"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
<Work rdf:about="">
   <license rdf:resource="http://creativecommons.org/licenses/by-nc-nd/2.0/" />
</Work>
<License rdf:about="http://creativecommons.org/licenses/by-nc-nd/2.0/">
   <permits rdf:resource="http://web.resource.org/cc/Reproduction" />
   <permits rdf:resource="http://web.resource.org/cc/Distribution" />
   <requires rdf:resource="http://web.resource.org/cc/Notice" />
   <requires rdf:resource="http://web.resource.org/cc/Attribution" />
   <prohibits rdf:resource="http://web.resource.org/cc/CommercialUse" />
</License>
</rdf:RDF>
-->
</p>
<?php } ?>
</div>
</div> <!--end main div-->
<div id="top">&nbsp;&nbsp;Maryland Developmental Disabilities Administration</div>
<div id="side_menu">
<ul>
<li><a href="./">Project home <img src="../images/arrow_<?php echo $area == "home" ? "on" : "off"; ?>.gif" width="4" height="8" alt="" border="0"></a></li>
<li><a href="./about.php">About <img src="../images/arrow_<?php echo $area == "about" ? "on" : "off"; ?>.gif" width="4" height="8" alt="" border="0"></a></li>
<li><a href="./charts/activity_1.php">Summary Reports <img src="../images/arrow_<?php echo $area == "activity" ? "on" : "off"; ?>.gif" width="4" height="8" alt="" border="0"></a></li>
<li><a href="./charts/provider_1.php">Provider Comparison <img src="../images/arrow_<?php echo $area == "provider" ? "on" : "off"; ?>.gif" width="4" height="8" alt="" border="0"></a></li>
<li><a href="./charts/provider_individual_1.php">Provider Individual Report <img src="../images/arrow_<?php echo $area == "provider" ? "on" : "off"; ?>.gif" width="4" height="8" alt="" border="0"></a></li><!--
<li><a href="./charts/comparison_1.php">Provider Comparison report <img src="../images/arrow_<?php echo $area == "comparison" ? "on" : "off"; ?>.gif" width="4" height="8" alt="" border="0"></a></li>
<li><a href="./charts/trends_1.php">Trends report  <img src="../images/arrow_<?php echo $area == "trends" ? "on" : "off"; ?>.gif" width="4" height="8" alt="" border="0"></a></li> -->
<li><a href="./feedback.php">Feedback <img src="../images/arrow_<?php echo $area == "Feedback" ? "on" : "off"; ?>.gif" width="4" height="7" alt="" border="0"></a></li>
</ul>
<div id="funders" style="text-align:center; padding-top:1em;">

<p><a href="http://dda.dhmh.maryland.gov/Pages/home.aspx"><img src="images/maryland_logo.jpg" alt="Maryland Developmental Disabilities Administration" style="max-width:200px;"></a></p>

<p><a href="http://statedata.info/"><img src="images/sd.png" alt="statedata.info" style="max-width:200px;" /></a></p>
<p><a href="http://www.seln.org/"><img src="images/seln.gif" alt="statedata.info" style="max-width:200px;" /></a></p>

</div><!--end funders div-->
</div><!--end sidemenu div-->
<script type="text/javascript" src="/common/sorttable.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
<script type="text/javascript" src="/mdda/dds.js"></script>
<script type="text/javascript" src="/mdda/csvexport.js"></script>

<script type="text/javascript">
$( document ).ready(function() {
 $("div#subcont").show();

});
$("#sumtype").change(checkOptions);
$("#subcont").click( function() {
       if ( $("#sumtype").val() == "" ) {


        alert("Please select a summary type");
       }
    });
$('.getfile').click(
            function() {
               var href = 'csvscript.php?csv=';
   var data =   exportTableToCSV.apply(this, [$('#tablehold'), 'Maryland_DDA_data_' + output + '.csv']);
   href += encodeURIComponent(data);
   $(this).attr('href', href);

 });
 function checkOptions() {

     if ( $("#sumtype").val() != "" ) {


     $("div#subcont").hide();

 }


}
var d = new Date();

var month = d.getMonth()+1;
var day = d.getDate();

var output = d.getFullYear() + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + day;



       </script></body></html>
