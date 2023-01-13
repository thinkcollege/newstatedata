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
<style type="text/css">input.submit { display:none; }</style>
<title>Employment Supports Performance Outcome System Provider Report</title>
<base href="http://statedata.local/dds/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='stylesheet' type='text/css' href='../common/styles.css' />
<link rel='stylesheet' type='text/css' href='../common/side_menu.css' />
<style type="text/css">input.submit { display:none; }</style>
<!--<script language="JavaScript" src="../common/rollovers.js"></script>
<script language="JavaScript" src="../common/common.js"></script>
<script language="JavaScript" src="../common/functions.js"></script>
<script language="JavaScript" src="../common/prototype.js"></script>-->
</head>
<body bgcolor="#FFFFFF" text="#000000">
<div id="dmrMainPrint"><div class="provider_heading"><em>Employment Supports Performance Outcome System Provider Report<br>Autism Services Association<br>2018 for Central West</em></div>
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
<p><span class="mainheading">Number Participating by Activity</span><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2">Total Served<BR>(unduplicated count)</td><td rowspan="2">Number entered<BR>a new individual job<BR>in the previous<BR>12 months</td><td colspan="5" align="center">Number Participating in activity</td><td colspan="5" align="center">Percent participating in activity</td></tr><tr><td align="center">Individual<br>Competitive<br>Employment</td><td align="center">Group<br>Integrated<br>Employment</td><td align="center">Self employment</td><td align="center">Job<br>Search</td><td align="center"">Other day <br />support wrap-around<br />services</td><td align="center">Individual<br>Competitive<br>Employment</td><td align="center">Group<br>Integrated<br>Employment</td><td align="center">Self employment</td><td align="center">Job<br>Search</td><td align="center"">Other day <br />support wrap-around<br />services</td></tr><td><aa/><strong>Autism Services Association</strong></td><td>2</td><td>0</td><td>0</td><td>2</td><td>0</td><td>0</td><td>2</td><td>0.0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>100.0</td></tr><td><rr/><strong>Central West</strong></td><td>2193</td><td>77</td><td>607</td><td>1071</td><td>4</td><td>728</td><td>1325</td><td>27.7</td><td>48.8</td><td>0.2</td><td>33.2</td><td>60.4</td></tr><td><zz/><strong>State</strong></td><td>6459</td><td>344</td><td>2302</td><td>2748</td><td>12</td><td>2783</td><td>4300</td><td>35.6</td><td>42.5</td><td>0.2</td><td>43.1</td><td>66.6</td></tr></table>
<p><span class="mainheading">Subtotals for Job Search and Wrap-around Activities</span><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2">Total Served<BR>(unduplicated count)</td><td rowspan="2">Job Search (Total)</td><td colspan="2" align="center">Number Participating in job search activities</td><td rowspan="2">Day and <br />wrap-around <br />activites (Total)</td><td colspan="3" align="center">Number Participating day and wrap-around activities</td></tr><tr><td align="center">Discovery or <br />career planning</td><td align="center">Job development<br />activities</td><td align="center">Community based<br />day services</td><td align="center">Day habilitation <br />program</td><td align="center"">Other day <br />support services</td></tr><td><aa/><strong>Autism Services Association</strong></td><td>2</td><td>0</td><td>0</td><td>0</td><td>2</td><td>2</td><td>0</td><td>0</td></tr><td><rr/><strong>Central West</strong></td><td>2193</td><td>728</td><td>621</td><td>636</td><td>1325</td><td>1184</td><td>144</td><td>70</td></tr><td><zz/><strong>State</strong></td><td>6459</td><td>2783</td><td>2326</td><td>2382</td><td>4300</td><td>3814</td><td>862</td><td>224</td></tr></table>
<p><span class="mainheading">Hours of Participation by Activity</span></p><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2">Total Served<BR>(unduplicated count)</td><td rowspan="2">Number entered<BR>a new individual job<BR>in the previous<BR>12 months</td><td colspan="2" align="center">Mean hours per person participating in activity for month</td><td colspan="2" align="center">Percent of total hours in activity for month</td></tr><tr><td align="center">Individual<br>Competitive<br>Employment</td><td align="center">Group<br>Integrated<br>Employment</td><td align="center">Individual<br>Competitive<br>EmploymentJob</td><td align="center">Group<br>Integrated<br>Employment</td></tr><td><aa/><strong>Autism Services Association</strong></td><td>2</td><td>0</td><td></td><td>56.50</td><td>0.0</td><td>100.0</td></tr><td><rr/><strong>Central West</strong></td><td>2193</td><td>77</td><td>51.16</td><td>39.97</td><td>41.8</td><td>57.6</td></tr><td><zz/><strong>State</strong></td><td>6459</td><td>344</td><td>48.24</td><td>35.40</td><td>53.2</td><td>46.6</td></tr></table>
<p><span class="mainheading">Monthly Wages</span></p><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2" align="center">Total Served <BR>(unduplicated count)</td><td rowspan="2">Number entered<br>a new individual job<br>in the previous<BR>12 months</td><td colspan="2" align="center">Mean monthly wage</td><td colspan="2" align="center">Percent earning above minimum wage</td></tr><tr><td align="center">Individual<br>Competitive<br />Employment</td><td align="center">Group<br>Integrated<br />Employment</td><td align="center">Individual<br>Competitive<br />Employment</td><td align="center">Group<br>Integrated<br />Employment</td></tr><td><aa/><strong>Autism Services Association</strong></td><td>2</td><td>0</td><td></td><td>232.45</td><td>0</td><td>0.0</td></tr><td><rr/><strong>Central West</strong></td><td>2193</td><td>77</td><td>602.88</td><td>351.33</td><td>97.4</td><td>59.0</td></tr><td><zz/><strong>State</strong></td><td>6459</td><td>344</td><td>570.22</td><td>320.27</td><td>97.5</td><td>71.5</td></tr></table>
<p><span class="mainheading">Self Employment Averages for a Three Month Period</span><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2">Total Served<BR>(unduplicated count)</td><td rowspan="2">Number of individs.<br />in self employment</td><td colspan="5" align="center">Averages</td></tr><tr><td align=\"center\">Mean Hours in<br />Self Employment</td><td align="center">Mean self<br />employment earning</td><td align="center">Mean self<br />employment expenses</td><td align="center">Mean net self<br />employment earnings</td></tr><td><aa/><strong>Autism Services Association</strong></td><td>2</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><rr/><strong>Central West</strong></td><td>2193</td><td>4</td><td>98.75</td><td>2627.85</td><td>2484.58</td><td>764.42</td></tr><td><zz/><strong>State</strong></td><td>6459</td><td>12</td><td>40.50</td><td>1337.45</td><td>1114.16</td><td>473.52</td></tr></table>

EOT;
?><div id="dmrfootersmall">
<img src="../images/statedata.gif" width="169" height="46" alt="statedata.info" border="0" /> A project of the Institute for Community Inclusion, UMass Boston
</div>
</div> <!--end main div-->
<div id="dmrSmalltop">Massachusetts Department of Developmental Services</div>