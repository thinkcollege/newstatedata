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
<div id="dmrMainPrint"><div class="provider_heading"><em>Employment Supports Performance Outcome System Provider Report<br>The Arc of Opportunity<br>2016 for Central West</em></div>
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
<p><span class="mainheading">Number Participating by Activity</span><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2">Total Served<BR>(unduplicated count)</td><td rowspan="2">Number entered<BR>a new individual job<BR>in the previous<BR>12 months</td><td colspan="6" align="center">Number Participating in activity</td><td colspan="6" align="center">Percent participating in activity</td></tr><tr><td align="center">Individual<br>Supported<br>Job</td><td align="center">Group<br>Supported<br>Job</td><td align="center">Facility<br>Based<br>Work</td><td align="center">Volunteer<br>Work</td><td align="center"">In<br>Transition</td><td align="center">Other<br>Non-Paid<br>Service</td><td align="center">Individual<br>Supported<br>Job</td><td align="center">Group<br>Supported<br>Job</td><td align="center">Facility<br>Based<br>Work</td><td align="center">Volunteer<br>Work</td><td align="center">In<br>Transition</td><td align="center">Other<br>Non-Paid<br>Service</td></tr><td><aa/><strong>The Arc of Opportunity</strong></td><td>54</td><td>3</td><td>12</td><td>44</td><td>0</td><td>0</td><td>0</td><td>0</td><td>22.2</td><td>81.5</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><rr/><strong>Central West</strong></td><td>2097</td><td>59</td><td>553</td><td>1096</td><td>183</td><td>0</td><td>0</td><td>0</td><td>26.4</td><td>52.3</td><td>8.7</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><zz/><strong>State</strong></td><td>6064</td><td>240</td><td>2072</td><td>2711</td><td>518</td><td>0</td><td>0</td><td>0</td><td>34.2</td><td>44.7</td><td>8.5</td><td>0.0</td><td>0.0</td><td>0.0</td></tr></table>
<p><span class="mainheading">Subtotals for Job Search and Wrap-around Activities</span><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2">Total Served<BR>(unduplicated count)</td><td rowspan="2">Job Search (Total)</td><td colspan="2" align="center">Number Participating in job search activities</td><td rowspan="2">Day and <br />wrap-around <br />activites (Total)</td><td colspan="3" align="center">Number Participating day and wrap-around activities</td></tr><tr><td align="center">Discovery or <br />career planning</td><td align="center">Job development<br />activities</td><td align="center">Community based<br />day services</td><td align="center">Day habilitation <br />program</td><td align="center"">Other day <br />support services</td></tr><td><aa/><strong>The Arc of Opportunity</strong></td><td>54</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr><td><rr/><strong>Central West</strong></td><td>2097</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr><td><zz/><strong>State</strong></td><td>6064</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr></table>
<p><span class="mainheading">Hours of Participation by Activity</span></p><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2">Total Served<BR>(unduplicated count)</td><td rowspan="2">Number entered<BR>a new individual job<BR>in the previous<BR>12 months</td><td colspan="6" align="center">Mean hours per person participating in activity for month</td><td colspan="6" align="center">Percent of total hours in activity for month</td></tr><tr><td align="center">Individual<br>Supported<br>Job</td><td align="center">Group<br>Supported<br>Job</td><td align="center">Facility<br>Based<br>Work</td><td align="center">Volunteer<br>Work</td><td align="center"">In<br>Transition</td><td align="center">Other<br>Non-Paid<br>Service</td><td align="center">Individual<br>Supported<br>Job</td><td align="center">Group<br>Supported<br>Job</td><td align="center">Facility<br>Based<br>Work</td><td align="center">Volunteer<br>Work</td><td align="center">In<br>Transition</td><td align="center">Other<br>Non-Paid<br>Service</td></tr><td><aa/><strong>The Arc of Opportunity</strong></td><td>54</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr><td><rr/><strong>Central West</strong></td><td>2097</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr><td><zz/><strong>State</strong></td><td>6064</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr></table>
<p><span class="mainheading">Monthly Wages</span></p><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2" align="center">Total Served <BR>(unduplicated count)</td><td rowspan="2">Number entered<br>a new individual job<br>in the previous<BR>12 months</td><td colspan="3" align="center">Mean monthly wage</td><td colspan="3" align="center">Percent earning above minimum wage</td></tr><tr><td align="center">Individual<br>Supported Job</td><td align="center">Group<br>Supported Job</td><td align="center">Facility Based<br>Work</td><td align="center">Individual<br>Supported Job</td><td align="center">Group<br>Supported Job</td><td align="center">Facility Based<br>Work</td></tr><td><aa/><strong>The Arc of Opportunity</strong></td><td>54</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr><td><rr/><strong>Central West</strong></td><td>2097</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr><td><zz/><strong>State</strong></td><td>6064</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr></table>

EOT;
?><div id="dmrfootersmall">
<img src="../images/statedata.gif" width="169" height="46" alt="statedata.info" border="0" /> A project of the Institute for Community Inclusion, UMass Boston
</div>
</div> <!--end main div-->
<div id="dmrSmalltop">Massachusetts Department of Developmental Services</div>