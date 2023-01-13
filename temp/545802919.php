<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
//ini_set("include_path","../");
$database = Database::getDatabase();
$pages = new page;
$pages->add_page($_SERVER["PHP_SELF"]);
?>
<?php $area = "provider"; $show_flash_link = 0; ?>
<title><?php $mre_base=new mre_base; echo $mre_base->mre_base_sitename;?> - Provider Report</title>
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
	<img src="images/em1_mary.png" alt="emplyment first Maryland" style="max-width:150px; float:left; padding-right:2em; "></a><h1>Provider Report: Numbers in Activity - Reporting Period: October 2019 - for Central Maryland region, county of  Baltimore City</h1>
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
<form class="printbut clearfix" action="charts/provider_2.php" method="post"><input type="hidden" name="print" value="1" />     <input type="hidden" name="y" value="October 2019" /><input type="hidden" name="r" value="Central Maryland" /><input type="hidden" name="ao" value="Baltimore City" /><input type="hidden" name="age[from]" value="0" /><input type="hidden" name="age[to]" value="0" /><input type="hidden" name="report" value="number" /><input type="submit" name="submit" value="Click for print-friendly version" /></form><table id="tablehold" class="sortable" border="1"><thead><tr><th rowspan="2">Provider</th><th rowspan="2">Total Served<br />(unduplicated count)</th><th colspan="8" align="center">Number participating by activity</th><th colspan="8" align="center">Percent participating by activity</th></tr><tr><th align="center">Individual<br />competitive<br />job</th><th align="center">Individual contracted job</th><th align="center">Self<br />employment</th><th align="center">Group<br />integrated<br />job</th><th align="center">Facility based job</td><th align="center">Community<br />based<br />non work</th><th align="center">Volunteer<br />job</th><th align="center">Facility<br />based<br />non work</th><th align="center">Individual<br />competitive<br />job</th><th align="center">Individual contracted job</th><th align="center">Self<br />employment</th><th align="center">Group<br />integrated<br />job</th><th align="center">Facility based job</td><th align="center">Community<br />based<br />non work</th><th align="center">Volunteer<br />job</th><th align="center">Facility<br />based<br />non work</th></tr></thead><tbody><td><aa/><strong>A.C.C./F.X. GALLAGHER</strong></td><td>28</td><td>6</td><td>0</td><td>0</td><td>3</td><td>2</td><td>4</td><td>2</td><td>24</td><td>21.4</td><td>0.0</td><td>0.0</td><td>10.7</td><td>7.1</td><td>14.3</td><td>7.1</td><td>85.7</td></tr><td><aa/><strong>ABILITIES NETWORK</strong></td><td>21</td><td>16</td><td>0</td><td>0</td><td>0</td><td>0</td><td>2</td><td>1</td><td>0</td><td>76.2</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>9.5</td><td>4.8</td><td>0.0</td></tr><td><aa/><strong>ALLIANCE</strong></td><td>42</td><td>17</td><td>11</td><td>0</td><td>0</td><td>0</td><td>11</td><td>10</td><td>0</td><td>40.5</td><td>26.2</td><td>0.0</td><td>0.0</td><td>0.0</td><td>26.2</td><td>23.8</td><td>0.0</td></tr><td><aa/><strong>ARC OF NORTHERN CHESAPEAKE</strong></td><td>2</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>2</td><td>1</td><td>0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>100.0</td><td>50.0</td><td>0.0</td></tr><td><aa/><strong>ATHELAS INSTITUTE</strong></td><td>38</td><td>8</td><td>0</td><td>0</td><td>0</td><td>0</td><td>34</td><td>16</td><td>33</td><td>21.1</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>89.5</td><td>42.1</td><td>86.8</td></tr><td><aa/><strong>CBAI/NCIA</strong></td><td>22</td><td>1</td><td>12</td><td>0</td><td>0</td><td>1</td><td>0</td><td>0</td><td>8</td><td>4.5</td><td>54.5</td><td>0.0</td><td>0.0</td><td>4.5</td><td>0.0</td><td>0.0</td><td>36.4</td></tr><td><aa/><strong>CENTER FOR SOCIAL CHANGE</strong></td><td>5</td><td>1</td><td>0</td><td>0</td><td>1</td><td>1</td><td>2</td><td>2</td><td>3</td><td>20.0</td><td>0.0</td><td>0.0</td><td>20.0</td><td>20.0</td><td>40.0</td><td>40.0</td><td>60.0</td></tr><td><aa/><strong>CHIMES INC.</strong></td><td>129</td><td>32</td><td>0</td><td>0</td><td>80</td><td>0</td><td>0</td><td>0</td><td>0</td><td>24.8</td><td>0.0</td><td>0.0</td><td>62.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>COMPANIONS, INC.</strong></td><td>4</td><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td><td>4</td><td>1</td><td>0</td><td>25.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>100.0</td><td>25.0</td><td>0.0</td></tr><td><aa/><strong>CREATIVE OPTIONS</strong></td><td>2</td><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td><td>2</td><td>0</td><td>0</td><td>50.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>100.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>DESTINY'S GROUP HOME, INC</strong></td><td>5</td><td>2</td><td>0</td><td>0</td><td>0</td><td>1</td><td>1</td><td>0</td><td>0</td><td>40.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>20.0</td><td>20.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>EMERGE</strong></td><td>9</td><td>3</td><td>0</td><td>0</td><td>0</td><td>0</td><td>6</td><td>2</td><td>1</td><td>33.3</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>66.7</td><td>22.2</td><td>11.1</td></tr><td><aa/><strong>HUMANIM</strong></td><td>51</td><td>12</td><td>0</td><td>0</td><td>0</td><td>0</td><td>1</td><td>0</td><td>36</td><td>23.5</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>2.0</td><td>0.0</td><td>70.6</td></tr><td><aa/><strong>ITINERIS, INC.</strong></td><td>12</td><td>6</td><td>0</td><td>1</td><td>0</td><td>0</td><td>10</td><td>6</td><td>6</td><td>50.0</td><td>0.0</td><td>8.3</td><td>0.0</td><td>0.0</td><td>83.3</td><td>50.0</td><td>50.0</td></tr><td><aa/><strong>JEWISH COMMUINITY SERVICES, INC.</strong></td><td>15</td><td>10</td><td>0</td><td>0</td><td>0</td><td>0</td><td>8</td><td>3</td><td>0</td><td>66.7</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>53.3</td><td>20.0</td><td>0.0</td></tr><td><aa/><strong>LIFE</strong></td><td>14</td><td>7</td><td>2</td><td>0</td><td>0</td><td>0</td><td>7</td><td>0</td><td>7</td><td>50.0</td><td>14.3</td><td>0.0</td><td>0.0</td><td>0.0</td><td>50.0</td><td>0.0</td><td>50.0</td></tr><td><aa/><strong>NORTHSTAR SPECIAL SERVICES, INC</strong></td><td>3</td><td>0</td><td>0</td><td>0</td><td>0</td><td>1</td><td>0</td><td>0</td><td>2</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>33.3</td><td>0.0</td><td>0.0</td><td>66.7</td></tr><td><aa/><strong>OPPORTUNITY BUILDERS</strong></td><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td><td>1</td><td>0</td><td>0</td><td>1</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>100.0</td></tr><td><aa/><strong>POSITIVE PATHWAY, INC.</strong></td><td>4</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>1</td><td>1</td><td>0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>25.0</td><td>25.0</td><td>0.0</td></tr><td><aa/><strong>PRECISION HEALTH CARE RESOURCES</strong></td><td>1</td><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>PROVIDENCE CENTER</strong></td><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>1</td><td>1</td><td>1</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>100.0</td><td>100.0</td><td>100.0</td></tr><td><aa/><strong>SPECTRUM SUPPORT, INC</strong></td><td>5</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>5</td><td>0</td><td>2</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>100.0</td><td>0.0</td><td>40.0</td></tr><td><aa/><strong>ST. PETERS ADULT LEARNING</strong></td><td>68</td><td>11</td><td>0</td><td>0</td><td>3</td><td>0</td><td>45</td><td>41</td><td>51</td><td>16.2</td><td>0.0</td><td>0.0</td><td>4.4</td><td>0.0</td><td>66.2</td><td>60.3</td><td>75.0</td></tr><td><aa/><strong>THE ARC BALTIMORE</strong></td><td>386</td><td>65</td><td>1</td><td>0</td><td>130</td><td>0</td><td>59</td><td>11</td><td>118</td><td>16.8</td><td>0.3</td><td>0.0</td><td>33.7</td><td>0.0</td><td>15.3</td><td>2.8</td><td>30.6</td></tr><td><aa/><strong>THE LEAGUE FOR PEOPLE WITH DISABILITIES</strong></td><td>82</td><td>7</td><td>0</td><td>0</td><td>1</td><td>0</td><td>17</td><td>17</td><td>63</td><td>8.5</td><td>0.0</td><td>0.0</td><td>1.2</td><td>0.0</td><td>20.7</td><td>20.7</td><td>76.8</td></tr><td><aa/><strong>UNIFIED COMMUNITY CONNECTIONS</strong></td><td>25</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>17</td><td>3</td><td>24</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>68.0</td><td>12.0</td><td>96.0</td></tr><td><aa/><strong>WORK OPPORTUNITIES UNLIMITED</strong></td><td>8</td><td>3</td><td>0</td><td>0</td><td>0</td><td>0</td><td>1</td><td>0</td><td>0</td><td>37.5</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>12.5</td><td>0.0</td><td>0.0</td></tr></tbody></table><br /><script type="text/javascript" src="../common/sorttable.js"></script>
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
