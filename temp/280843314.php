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
<div id="dmrMainPrint"><div class="provider_heading"><em>Employment Supports Performance Outcome System Provider Report<br>Aditus Inc.<br>2018 for Central West</em></div>
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
<p><span class="mainheading">Number Participating by Activity</span><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2">Total Served<BR>(unduplicated count)</td><td rowspan="2">Number entered<BR>a new individual job<BR>in the previous<BR>12 months</td><td colspan="6" align="center">Number Participating in activity</td><td colspan="6" align="center">Percent participating in activity</td></tr><tr><td align="center">Individual<br>Supported<br>Job</td><td align="center">Group<br>Supported<br>Job</td><td align="center">Facility<br>Based<br>Work</td><td align="center">Volunteer<br>Work</td><td align="center"">In<br>Transition</td><td align="center">Other<br>Non-Paid<br>Service</td><td align="center">Individual<br>Supported<br>Job</td><td align="center">Group<br>Supported<br>Job</td><td align="center">Facility<br>Based<br>Work</td><td align="center">Volunteer<br>Work</td><td align="center">In<br>Transition</td><td align="center">Other<br>Non-Paid<br>Service</td></tr><td><rr/><strong>Central West</strong></td><td>1929</td><td>68</td><td>528</td><td>986</td><td>4</td><td>677</td><td>767</td><td>27.4</td><td>51.1</td><td>0.2</td></tr><td><zz/><strong>State</strong></td><td>6459</td><td>344</td><td>2302</td><td>2748</td><td>12</td><td>2783</td><td>2159</td><td>35.6</td><td>42.5</td><td>0.2</td></tr></table>
<p><span class="mainheading">Hours of Participation by Activity</span></p><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2">Total Served<BR>(unduplicated count)</td><td rowspan="2">Number entered<BR>a new individual job<BR>in the previous<BR>12 months</td><td colspan="6" align="center">Mean hours per person participating in activity for month</td><td colspan="6" align="center">Percent of total hours in activity for month</td></tr><tr><td align="center">Individual<br>Supported<br>Job</td><td align="center">Group<br>Supported<br>Job</td><td align="center">Facility<br>Based<br>Work</td><td align="center">Volunteer<br>Work</td><td align="center"">In<br>Transition</td><td align="center">Other<br>Non-Paid<br>Service</td><td align="center">Individual<br>Supported<br>Job</td><td align="center">Group<br>Supported<br>Job</td><td align="center">Facility<br>Based<br>Work</td><td align="center">Volunteer<br>Work</td><td align="center">In<br>Transition</td><td align="center">Other<br>Non-Paid<br>Service</td></tr><td><rr/><strong>Central West</strong></td><td>1929</td><td>68</td><td>51.41</td><td>41.14</td><td>98.75</td><td>39.9</td><td>59.6</td><td>0.6</td></tr><td><zz/><strong>State</strong></td><td>6459</td><td>344</td><td>48.24</td><td>35.40</td><td>40.50</td><td>53.2</td><td>46.6</td><td>0.2</td></tr></table>
<p><span class="mainheading">Monthly Wages</span></p><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2" align="center">Total Served <BR>(unduplicated count)</td><td rowspan="2">Number entered<br>a new individual job<br>in the previous<BR>12 months</td><td colspan="3" align="center">Mean monthly wage</td><td colspan="3" align="center">Percent earning above minimum wage</td></tr><tr><td align="center">Individual<br>Supported Job</td><td align="center">Group<br>Supported Job</td><td align="center">Facility Based<br>Work</td><td align="center">Individual<br>Supported Job</td><td align="center">Group<br>Supported Job</td><td align="center">Facility Based<br>Work</td></tr><td><rr/><strong>Central West</strong></td><td>1929</td><td>68</td><td>601.71</td><td>366.29</td><td></td><td>97.2</td><td>59.9</td><td>0</td></tr><td><zz/><strong>State</strong></td><td>6459</td><td>344</td><td>570.22</td><td>320.27</td><td></td><td>97.5</td><td>71.5</td><td>0</td></tr></table>

EOT;
?><div id="dmrfootersmall">
<img src="../images/statedata.gif" width="169" height="46" alt="statedata.info" border="0" /> A project of the Institute for Community Inclusion, UMass Boston
</div>
</div> <!--end main div-->
<div id="dmrSmalltop">Massachusetts Department of Developmental Services</div>