<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
//ini_set("include_path","../");
$database = Database::getDatabase();
$pages = new page;
$pages->add_page($_SERVER["PHP_SELF"]);
?>
<?php $area = "providerindividual"; $show_flash_link = 0; ?>
<title><?php $mre_base=new mre_base; echo $mre_base->mre_base_sitename;?> - Provider Individual Report</title>
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
	<img src="images/em1_mary.png" alt="emplyment first Maryland" style="max-width:150px; float:left; padding-right:2em; "></a><h1>Provider Individual Report: BAY SHORE SERVICES, INC. Reporting Period:  for Eastern Shore</em></h1>
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
<form class="printbut clearfix" action="charts/provider_individual_2.php" method="post"><input type="hidden" name="print" value="1" />     <input type="hidden" name="y" value="May 2018" /><input type="hidden" name="r" value="Eastern Shore" /><input type="hidden" name="p" value="E018" /><input type="hidden" name="f" value="0" /><input type="hidden" name="t" value="0" /><input type="submit" name="submit" value="Click for print-friendly version" /></form><p><span class="mainheading">Number Participating by Activity over Two Week Reporting Period</span><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2">Total Served<BR>(unduplicated count)</td><td colspan="8" align="center">Number Participating in activity</td><td colspan="8" align="center">Percent participating in activity</td></tr><tr><td align="center">Individual<br />competitive<br />job</td><td align="center">Individual<br />contracted<br />job</td><td align="center">Self<br />employment</td><td align="center">Group<br />integrated<br />job</td><td align="center">Facility<br />based<br />job</td><td align="center">Community<br />based<br />non work<td align="center">Volunteer<br />job</td><td align="center"">Facility<br />based<br />non work</td><td align="center">Individual<br />competitive<br />Job</td><td align="center">Individual<br />contracted<br />job</td><td align="center">Self<br />employment</td><td align="center">Group<br />integrated<br />job</td><td align="center">Facility<br />based<br />job</td><td align="center">Community<br />based<br />non work<td align="center">Volunteer<br />job</td><td align="center"">Facility<br />based<br />non work</td></tr><td><aa/><strong>BAY SHORE SERVICES, INC.</strong></td><td>36</td><td>8</td><td>0</td><td>0</td><td>0</td><td>1</td><td>29</td><td>7</td><td>9</td><td>22.2</td><td>0.0</td><td>0.0</td><td>0.0</td><td>2.8</td><td>80.6</td><td>19.4</td><td>25.0</td></tr><td><rr/><strong>Eastern Shore</strong></td><td>1170</td><td>164</td><td>36</td><td>0</td><td>109</td><td>572</td><td>432</td><td>291</td><td>830</td><td>14.0</td><td>3.1</td><td>0.0</td><td>9.3</td><td>48.9</td><td>36.9</td><td>24.9</td><td>70.9</td></tr><td><zz/><strong>State</strong></td><td>11657</td><td>2495</td><td>476</td><td>38</td><td>1125</td><td>1486</td><td>5054</td><td>2419</td><td>6632</td><td>21.4</td><td>4.1</td><td>0.3</td><td>9.7</td><td>12.7</td><td>43.4</td><td>20.8</td><td>56.9</td></tr></table>
<p><span class="mainheading">Hours of Participation by Activity over Two Week Reporting Period</span></p><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2">Total Served<BR>(unduplicated count)</td><td colspan="6" align="center">Mean Hours per person</td><td colspan="6" align="center">Percent of total paid work hours</td></tr><tr><td align="center">Individual<br />competitive<br />Job</td><td align="center">Individual<br />contracted<br />job</td><td align="center">Self<br />employment</td><td align="center">Group<br />integrated<br />job</td><td align="center">Facility<br />based<br />job</td></td><td align="center"">Community<br />based<br />non work</td><td align="center">Individual<br />competitive<br />Job</td><td align="center">Individual<br />contracted<br />job</td><td align="center">Self<br />employment</td><td align="center">Group<br />integrated<br />job</td><td align="center">Facility<br />based<br />job</td></td><td align="center"">Community<br />based<br />non work</td></tr><td><aa/><strong>BAY SHORE SERVICES, INC.</strong></td><td>36</td><td>44.6</td><td>0</td><td>0</td><td>51.0</td><td>0</td><td>28.9</td><td>28.6</td><td>0.0</td><td>0.0</td><td>4.1</td><td>0.0</td><td>67.3</td></tr><td><rr/><strong>Eastern Shore</strong></td><td>1170</td><td>30.1</td><td>21.2</td><td>31.0</td><td>23.5</td><td>0</td><td>12.9</td><td>17.6</td><td>2.7</td><td>12.0</td><td>47.8</td><td>0.0</td><td>19.9</td></tr><td><zz/><strong>State</strong></td><td>11657</td><td>38.1</td><td>32.1</td><td>30.9</td><td>16.1</td><td>21.4</td><td>20.3</td><td>34.9</td><td>5.6</td><td>12.8</td><td>8.8</td><td>0.3</td><td>37.6</td></tr></table>
<p><span class="mainheading">Wages by Activity over Two Week Reporting Period</span></p><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2" align="center">Total Served <BR>(unduplicated count)</td><td colspan="4" align="center">Mean wages earned</td><td colspan="4" align="center">Total wages earned</td></tr><td align="center">Individual<br />competitive<br />Job</td><td align="center">Individual<br />contracted<br />job</td><td align="center">Group<br />integrated<br />job</td><td align="center">Facility<br />based<br />job</td><td align="center">Individual<br />competitive<br />Job</td><td align="center">Individual<br />contracted<br />job</td><td align="center">Group<br />integrated<br />job</td><td align="center">Facility<br />based<br />job</td>
            </tr><td><aa/><strong>BAY SHORE SERVICES, INC.</strong></td><td>36</td><td>453.26</td><td>0</td><td>0</td><td>471.76</td><td>3,626.05</td><td>0.00</td><td>0.00</td><td>471.76</td></tr><td><rr/><strong>Eastern Shore</strong></td><td>1170</td><td>315.01</td><td>200.89</td><td>253.86</td><td>124.89</td><td>51,661.42</td><td>6,830.36</td><td>27,671.15</td><td>71,564.74</td></tr><td><zz/><strong>State</strong></td><td>11657</td><td>432.42</td><td>376.52</td><td>292.56</td><td>87.51</td><td>1,068,520.93</td><td>177,718.97</td><td>328,250.38</td><td>130,046.10</td></tr></table>
<p><span class="mainheading">Paid Time Off by Activity</span></p><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2">Total Served<BR>(unduplicated count)</td><td colspan="4" align="center">Number who received paid time off</td><td colspan="4" align="center">Percent who received paid time off</td></tr><td align="center">Individual<br />competitive<br />Job</td><td align="center">Individual<br />contracted<br />job</td><td align="center">Group<br />integrated<br />job</td><td align="center">Facility<br />based<br />job</td><td align="center">Individual<br />competitive<br />Job</td><td align="center">Individual<br />contracted<br />job</td><td align="center">Group<br />integrated<br />job</td><td align="center">Facility<br />based<br />job</td></tr><td><aa/><strong>BAY SHORE SERVICES, INC.</strong></td><td>36</td><td>5</td><td>0</td><td>0</td><td>0</td><td>62.5</td><td>0</td><td>0</td><td>0.0</td></tr><td><rr/><strong>Eastern Shore</strong></td><td>1170</td><td>57</td><td>10</td><td>26</td><td>177</td><td>34.8</td><td>27.8</td><td>23.9</td><td>30.9</td></tr><td><zz/><strong>State</strong></td><td>11657</td><td>809</td><td>190</td><td>220</td><td>356</td><td>32.4</td><td>39.9</td><td>19.6</td><td>24.0</td></tr></table>

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
