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
<div id="dmrMainPrint"><div class="provider_heading"><em>Employment Supports Performance Outcome System Provider Report<br>Aditus Inc.<br>2004 for Central West</em></div>
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
<p><span class="mainheading">Number Participating by Activity</span><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2">Total Served<BR>(unduplicated count)</td><td colspan="5" align="center">Number Participating in activity</td><td colspan="5" align="center">Percent participating in activity</td></tr><tr><td align="center">Individual<br>Supported<br>Job</td><td align="center">Group<br>Supported<br>Job</td><td align="center">Facility<br>Based<br>Work</td><td align="center">Volunteer<br>or Non-Work<br>Activity</td><td align="center"">In<br>Transition</td><td align="center">Individual<br>Supported<br>Job</td><td align="center">Group<br>Supported<br>Job</td><td align="center">Facility<br>Based<br>Work</td><td align="center">Volunteer<br>or Non-Work<br>Activity</td><td align="center">In<br>Transition</td></tr><td><aa/><strong>Aditus</strong></td><td>83</td><td>45</td><td>35</td><td>0</td><td>83</td><td>15</td><td>54.2</td><td>42.2</td><td>0.0</td><td>100.0</td><td>18.1</td></tr><td><rr/><strong>Central West</strong></td><td>1658</td><td>577</td><td>583</td><td>654</td><td>644</td><td>195</td><td>34.8</td><td>35.2</td><td>39.4</td><td>38.8</td><td>11.8</td></tr><td><zz/><strong>State</strong></td><td>5554</td><td>1654</td><td>1459</td><td>3047</td><td>2456</td><td>514</td><td>29.8</td><td>26.3</td><td>54.9</td><td>44.2</td><td>9.3</td></tr></table>
<p><span class="mainheading">Hours of Participation by Activity</span></p><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2">Total Served<BR>(unduplicated count)</td><td colspan="5" align="center">Mean hours per person participating in activity for month</td><td colspan="5" align="center">Percent of total hours in activity for month</td></tr><tr><td align="center">Individual<br>Supported<br>Job</td><td align="center">Group<br>Supported<br>Job</td><td align="center">Facility<br>Based<br>Work</td><td align="center">Volunteer<br>or Non-Work<br>Activity</td><td align="center"">In<br>Transition</td><td align="center">Individual<br>Supported<br>Job</td><td align="center">Group<br>Supported<br>Job</td><td align="center">Facility<br>Based<br>Work</td><td align="center">Volunteer<br>or Non-Work<br>Activity</td><td align="center">In<br>Transition</td></tr><td><aa/><strong>Aditus</strong></td><td>83</td><td>57.46</td><td>92.18</td><td></td><td>18.33</td><td>41.28</td><td>32.5</td><td>40.6</td><td>0.0</td><td>19.1</td><td>7.8</td></tr><td><rr/><strong>Central West</strong></td><td>1658</td><td>58.49</td><td>56.75</td><td>44.09</td><td>37.00</td><td>21.74</td><td>27.3</td><td>26.7</td><td>23.3</td><td>19.3</td><td>3.4</td></tr><td><zz/><strong>State</strong></td><td>5554</td><td>53.07</td><td>43.09</td><td>46.51</td><td>51.68</td><td>24.60</td><td>20.3</td><td>14.6</td><td>32.8</td><td>29.4</td><td>2.9</td></tr></table>
<p><span class="mainheading">Monthly Wages</span></p><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2" align="center">Total Served <BR>(unduplicated count)</td><td colspan="3" align="center">Mean monthly wage</td><td colspan="3" align="center">Percent earning above minimum wage</td></tr><tr><td align="center">Individual<br>Supported Job</td><td align="center">Group<br>Supported Job</td><td align="center">Facility Based<br>Work</td><td align="center">Individual<br>Supported Job</td><td align="center">Group<br>Supported Job</td><td align="center">Facility Based<br>Work</td></tr><td><aa/><strong>Aditus</strong></td><td>83</td><td>454.07</td><td>112.62</td><td></td><td>100.0</td><td>0.0</td><td>0</td></tr><td><rr/><strong>Central West</strong></td><td>1658</td><td>435.70</td><td>208.79</td><td>68.28</td><td>97.0</td><td>31.7</td><td>16.3</td></tr><td><zz/><strong>State</strong></td><td>5554</td><td>392.91</td><td>160.50</td><td>65.67</td><td>92.3</td><td>26.6</td><td>11.4</td></tr></table>

EOT;
?><div id="dmrfootersmall">
<img src="../images/statedata.gif" width="169" height="46" alt="statedata.info" border="0" /> A project of the Institute for Community Inclusion, UMass Boston
</div>
</div> <!--end main div-->
<div id="dmrSmalltop">Massachusetts Department of Developmental Services</div>