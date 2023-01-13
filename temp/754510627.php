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
<div id="dmrMainPrint"><div class="provider_heading"><em>Employment Supports Performance Outcome System Provider Report<br>Aditus Inc.<br>2016 for Central West</em></div>
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
<p><span class="mainheading">Number Participating by Activity</span><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2">Total Served<BR>(unduplicated count)</td><td rowspan="2">Number entered<BR>a new individual job<BR>in the previous<BR>12 months</td><td colspan="6" align="center">Number Participating in activity</td><td colspan="6" align="center">Percent participating in activity</td></tr><tr><td align="center">Individual<br>Supported<br>Job</td><td align="center">Group<br>Supported<br>Job</td><td align="center">Facility<br>Based<br>Work</td><td align="center">Volunteer<br>Work</td><td align="center"">In<br>Transition</td><td align="center">Other<br>Non-Paid<br>Service</td><td align="center">Individual<br>Supported<br>Job</td><td align="center">Group<br>Supported<br>Job</td><td align="center">Facility<br>Based<br>Work</td><td align="center">Volunteer<br>Work</td><td align="center">In<br>Transition</td><td align="center">Other<br>Non-Paid<br>Service</td></tr><td><aa/><strong>Aditus Inc.</strong></td><td>30</td><td>0</td><td>17</td><td>7</td><td>0</td><td>0</td><td>0</td><td>0</td><td>56.7</td><td>23.3</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><rr/><strong>Central West</strong></td><td>2097</td><td>59</td><td>553</td><td>1096</td><td>183</td><td>0</td><td>0</td><td>0</td><td>26.4</td><td>52.3</td><td>8.7</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><zz/><strong>State</strong></td><td>6064</td><td>240</td><td>2072</td><td>2711</td><td>518</td><td>0</td><td>0</td><td>0</td><td>34.2</td><td>44.7</td><td>8.5</td><td>0.0</td><td>0.0</td><td>0.0</td></tr></table>
<p><span class="mainheading">Hours of Participation by Activity</span></p><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2">Total Served<BR>(unduplicated count)</td><td rowspan="2">Number entered<BR>a new individual job<BR>in the previous<BR>12 months</td><td colspan="6" align="center">Mean hours per person participating in activity for month</td><td colspan="6" align="center">Percent of total hours in activity for month</td></tr><tr><td align="center">Individual<br>Supported<br>Job</td><td align="center">Group<br>Supported<br>Job</td><td align="center">Facility<br>Based<br>Work</td><td align="center">Volunteer<br>Work</td><td align="center"">In<br>Transition</td><td align="center">Other<br>Non-Paid<br>Service</td><td align="center">Individual<br>Supported<br>Job</td><td align="center">Group<br>Supported<br>Job</td><td align="center">Facility<br>Based<br>Work</td><td align="center">Volunteer<br>Work</td><td align="center">In<br>Transition</td><td align="center">Other<br>Non-Paid<br>Service</td></tr><td><aa/><strong>Aditus Inc.</strong></td><td>30</td><td>0</td><td>51.06</td><td>2.29</td><td></td><td></td><td></td><td></td><td>98.2</td><td>1.8</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><rr/><strong>Central West</strong></td><td>2097</td><td>59</td><td>54.90</td><td>44.80</td><td>23.28</td><td></td><td></td><td></td><td>36.3</td><td>58.6</td><td>5.1</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><zz/><strong>State</strong></td><td>6064</td><td>240</td><td>47.15</td><td>37.18</td><td>25.50</td><td></td><td></td><td></td><td>46.1</td><td>47.6</td><td>6.2</td><td>0.0</td><td>0.0</td><td>0.0</td></tr></table>
<p><span class="mainheading">Monthly Wages</span></p><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2" align="center">Total Served <BR>(unduplicated count)</td><td rowspan="2">Number entered<br>a new individual job<br>in the previous<BR>12 months</td><td colspan="3" align="center">Mean monthly wage</td><td colspan="3" align="center">Percent earning above minimum wage</td></tr><tr><td align="center">Individual<br>Supported Job</td><td align="center">Group<br>Supported Job</td><td align="center">Facility Based<br>Work</td><td align="center">Individual<br>Supported Job</td><td align="center">Group<br>Supported Job</td><td align="center">Facility Based<br>Work</td></tr><td><aa/><strong>Aditus Inc.</strong></td><td>30</td><td>0</td><td>555.12</td><td>22.86</td><td></td><td>100.0</td><td>100.0</td><td>0</td></tr><td><rr/><strong>Central West</strong></td><td>2097</td><td>59</td><td>598.07</td><td>303.30</td><td>88.59</td><td>97.8</td><td>50.4</td><td>14.8</td></tr><td><zz/><strong>State</strong></td><td>6064</td><td>240</td><td>510.14</td><td>269.93</td><td>73.47</td><td>99.1</td><td>60.1</td><td>12.9</td></tr></table>

EOT;
?><div id="dmrfootersmall">
<img src="../images/statedata.gif" width="169" height="46" alt="statedata.info" border="0" /> A project of the Institute for Community Inclusion, UMass Boston
</div>
</div> <!--end main div-->
<div id="dmrSmalltop">Massachusetts Department of Developmental Services</div>