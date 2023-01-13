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
	<img src="images/em1_mary.png" alt="emplyment first Maryland" style="max-width:150px; float:left; padding-right:2em; "></a><h1>Provider Report: Numbers in Activity - Reporting Period: October 2019 - for Central Maryland region, all counties</h1>
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
<form class="printbut clearfix" action="charts/provider_2.php" method="post"><input type="hidden" name="print" value="1" />     <input type="hidden" name="y" value="October 2019" /><input type="hidden" name="r" value="Central Maryland" /><input type="hidden" name="ao" value="0" /><input type="hidden" name="age[from]" value="0" /><input type="hidden" name="age[to]" value="0" /><input type="hidden" name="report" value="number" /><input type="submit" name="submit" value="Click for print-friendly version" /></form><table id="tablehold" class="sortable" border="1"><thead><tr><th rowspan="2">Provider</th><th rowspan="2">Total Served<br />(unduplicated count)</th><th colspan="8" align="center">Number participating by activity</th><th colspan="8" align="center">Percent participating by activity</th></tr><tr><th align="center">Individual<br />competitive<br />job</th><th align="center">Individual contracted job</th><th align="center">Self<br />employment</th><th align="center">Group<br />integrated<br />job</th><th align="center">Facility based job</td><th align="center">Community<br />based<br />non work</th><th align="center">Volunteer<br />job</th><th align="center">Facility<br />based<br />non work</th><th align="center">Individual<br />competitive<br />job</th><th align="center">Individual contracted job</th><th align="center">Self<br />employment</th><th align="center">Group<br />integrated<br />job</th><th align="center">Facility based job</td><th align="center">Community<br />based<br />non work</th><th align="center">Volunteer<br />job</th><th align="center">Facility<br />based<br />non work</th></tr></thead><tbody><td><aa/><strong>A.C.C./F.X. GALLAGHER</strong></td><td>123</td><td>8</td><td>0</td><td>0</td><td>6</td><td>9</td><td>25</td><td>10</td><td>118</td><td>6.5</td><td>0.0</td><td>0.0</td><td>4.9</td><td>7.3</td><td>20.3</td><td>8.1</td><td>95.9</td></tr><td><aa/><strong>ABILITIES NETWORK</strong></td><td>159</td><td>123</td><td>9</td><td>0</td><td>0</td><td>0</td><td>25</td><td>10</td><td>0</td><td>77.4</td><td>5.7</td><td>0.0</td><td>0.0</td><td>0.0</td><td>15.7</td><td>6.3</td><td>0.0</td></tr><td><aa/><strong>ALLIANCE</strong></td><td>139</td><td>46</td><td>19</td><td>0</td><td>6</td><td>0</td><td>41</td><td>39</td><td>0</td><td>33.1</td><td>13.7</td><td>0.0</td><td>4.3</td><td>0.0</td><td>29.5</td><td>28.1</td><td>0.0</td></tr><td><aa/><strong>ARC OF CARROLL COUNTY INC</strong></td><td>2</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>2</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>100.0</td></tr><td><aa/><strong>ARC OF NORTHERN CHESAPEAKE</strong></td><td>221</td><td>91</td><td>15</td><td>0</td><td>24</td><td>0</td><td>92</td><td>35</td><td>0</td><td>41.2</td><td>6.8</td><td>0.0</td><td>10.9</td><td>0.0</td><td>41.6</td><td>15.8</td><td>0.0</td></tr><td><aa/><strong>ARC OF PRINCE GEORGES CO INC</strong></td><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>ATHELAS INSTITUTE</strong></td><td>250</td><td>37</td><td>0</td><td>0</td><td>0</td><td>0</td><td>199</td><td>142</td><td>203</td><td>14.8</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>79.6</td><td>56.8</td><td>81.2</td></tr><td><aa/><strong>BAY COMMUNITY SUPPORT SERVICES, INC.</strong></td><td>31</td><td>23</td><td>19</td><td>0</td><td>1</td><td>0</td><td>14</td><td>13</td><td>14</td><td>74.2</td><td>61.3</td><td>0.0</td><td>3.2</td><td>0.0</td><td>45.2</td><td>41.9</td><td>45.2</td></tr><td><aa/><strong>BELLO MACHRE</strong></td><td>27</td><td>6</td><td>1</td><td>0</td><td>0</td><td>0</td><td>17</td><td>17</td><td>3</td><td>22.2</td><td>3.7</td><td>0.0</td><td>0.0</td><td>0.0</td><td>63.0</td><td>63.0</td><td>11.1</td></tr><td><aa/><strong>BENEDICTINE SCHOOL</strong></td><td>6</td><td>6</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>CBAI/NCIA</strong></td><td>88</td><td>3</td><td>43</td><td>0</td><td>0</td><td>7</td><td>0</td><td>0</td><td>36</td><td>3.4</td><td>48.9</td><td>0.0</td><td>0.0</td><td>8.0</td><td>0.0</td><td>0.0</td><td>40.9</td></tr><td><aa/><strong>CENTER FOR SOCIAL CHANGE</strong></td><td>71</td><td>5</td><td>0</td><td>0</td><td>2</td><td>30</td><td>30</td><td>11</td><td>61</td><td>7.0</td><td>0.0</td><td>0.0</td><td>2.8</td><td>42.3</td><td>42.3</td><td>15.5</td><td>85.9</td></tr><td><aa/><strong>CHANGE, INC.</strong></td><td>7</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>4</td><td>2</td><td>6</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>57.1</td><td>28.6</td><td>85.7</td></tr><td><aa/><strong>CHESAPEAKE CARE RESOURCES</strong></td><td>13</td><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td><td>6</td><td>0</td><td>13</td><td>7.7</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>46.2</td><td>0.0</td><td>100.0</td></tr><td><aa/><strong>CHIMES INC.</strong></td><td>247</td><td>64</td><td>0</td><td>0</td><td>157</td><td>0</td><td>0</td><td>0</td><td>0</td><td>25.9</td><td>0.0</td><td>0.0</td><td>63.6</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>COMPANIONS, INC.</strong></td><td>6</td><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td><td>6</td><td>1</td><td>0</td><td>16.7</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>100.0</td><td>16.7</td><td>0.0</td></tr><td><aa/><strong>COMPASS, INC.</strong></td><td>2</td><td>2</td><td>0</td><td>0</td><td>0</td><td>0</td><td>2</td><td>0</td><td>0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>100.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>CREATIVE OPTIONS</strong></td><td>52</td><td>6</td><td>1</td><td>0</td><td>8</td><td>0</td><td>51</td><td>12</td><td>30</td><td>11.5</td><td>1.9</td><td>0.0</td><td>15.4</td><td>0.0</td><td>98.1</td><td>23.1</td><td>57.7</td></tr><td><aa/><strong>DESTINY'S GROUP HOME, INC</strong></td><td>7</td><td>2</td><td>0</td><td>0</td><td>0</td><td>1</td><td>3</td><td>0</td><td>0</td><td>28.6</td><td>0.0</td><td>0.0</td><td>0.0</td><td>14.3</td><td>42.9</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>EMERGE</strong></td><td>80</td><td>20</td><td>0</td><td>0</td><td>20</td><td>1</td><td>41</td><td>22</td><td>11</td><td>25.0</td><td>0.0</td><td>0.0</td><td>25.0</td><td>1.3</td><td>51.3</td><td>27.5</td><td>13.8</td></tr><td><aa/><strong>FAMILY SERVICE FOUNDATION INC</strong></td><td>19</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>19</td><td>1</td><td>16</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>100.0</td><td>5.3</td><td>84.2</td></tr><td><aa/><strong>HARFORD CENTER</strong></td><td>131</td><td>2</td><td>0</td><td>0</td><td>8</td><td>0</td><td>122</td><td>28</td><td>124</td><td>1.5</td><td>0.0</td><td>0.0</td><td>6.1</td><td>0.0</td><td>93.1</td><td>21.4</td><td>94.7</td></tr><td><aa/><strong>HOWARD COUNTY ARC</strong></td><td>164</td><td>63</td><td>0</td><td>0</td><td>12</td><td>0</td><td>55</td><td>28</td><td>87</td><td>38.4</td><td>0.0</td><td>0.0</td><td>7.3</td><td>0.0</td><td>33.5</td><td>17.1</td><td>53.0</td></tr><td><aa/><strong>HUMANIM</strong></td><td>271</td><td>76</td><td>0</td><td>0</td><td>1</td><td>0</td><td>15</td><td>4</td><td>200</td><td>28.0</td><td>0.0</td><td>0.0</td><td>0.4</td><td>0.0</td><td>5.5</td><td>1.5</td><td>73.8</td></tr><td><aa/><strong>Institute of Professional Practice-DBA/Mid-Atlantic</strong></td><td>14</td><td>2</td><td>0</td><td>0</td><td>0</td><td>0</td><td>13</td><td>12</td><td>12</td><td>14.3</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>92.9</td><td>85.7</td><td>85.7</td></tr><td><aa/><strong>ITINERIS, INC.</strong></td><td>86</td><td>37</td><td>2</td><td>8</td><td>2</td><td>0</td><td>77</td><td>40</td><td>61</td><td>43.0</td><td>2.3</td><td>9.3</td><td>2.3</td><td>0.0</td><td>89.5</td><td>46.5</td><td>70.9</td></tr><td><aa/><strong>JEWISH COMMUINITY SERVICES, INC.</strong></td><td>24</td><td>18</td><td>0</td><td>0</td><td>0</td><td>0</td><td>11</td><td>3</td><td>0</td><td>75.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>45.8</td><td>12.5</td><td>0.0</td></tr><td><aa/><strong>Karina Association</strong></td><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>1</td><td>1</td><td>0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>100.0</td><td>100.0</td><td>0.0</td></tr><td><aa/><strong>Kennedy Krieger Institute</strong></td><td>2</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>2</td><td>2</td><td>0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>100.0</td><td>100.0</td><td>0.0</td></tr><td><aa/><strong>LANGTON GREEN</strong></td><td>15</td><td>3</td><td>0</td><td>0</td><td>13</td><td>0</td><td>12</td><td>6</td><td>0</td><td>20.0</td><td>0.0</td><td>0.0</td><td>86.7</td><td>0.0</td><td>80.0</td><td>40.0</td><td>0.0</td></tr><td><aa/><strong>LIFE</strong></td><td>31</td><td>15</td><td>3</td><td>0</td><td>0</td><td>0</td><td>17</td><td>0</td><td>17</td><td>48.4</td><td>9.7</td><td>0.0</td><td>0.0</td><td>0.0</td><td>54.8</td><td>0.0</td><td>54.8</td></tr><td><aa/><strong>LINWOOD  CENTER INC.</strong></td><td>19</td><td>7</td><td>1</td><td>0</td><td>2</td><td>9</td><td>2</td><td>2</td><td>0</td><td>36.8</td><td>5.3</td><td>0.0</td><td>10.5</td><td>47.4</td><td>10.5</td><td>10.5</td><td>0.0</td></tr><td><aa/><strong>LIVING SANS FRONTIERES, INC.</strong></td><td>79</td><td>1</td><td>1</td><td>0</td><td>4</td><td>0</td><td>64</td><td>52</td><td>75</td><td>1.3</td><td>1.3</td><td>0.0</td><td>5.1</td><td>0.0</td><td>81.0</td><td>65.8</td><td>94.9</td></tr><td><aa/><strong>MARY T. MARYLAND</strong></td><td>2</td><td>0</td><td>0</td><td>0</td><td>0</td><td>2</td><td>0</td><td>0</td><td>0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>MELWOOD HORTICULTURAL TRAINING CENTER</strong></td><td>5</td><td>0</td><td>1</td><td>0</td><td>0</td><td>0</td><td>3</td><td>1</td><td>2</td><td>0.0</td><td>20.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>60.0</td><td>20.0</td><td>40.0</td></tr><td><aa/><strong>NEW BEGINNINGS, INC</strong></td><td>15</td><td>2</td><td>0</td><td>0</td><td>0</td><td>0</td><td>8</td><td>1</td><td>11</td><td>13.3</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>53.3</td><td>6.7</td><td>73.3</td></tr><td><aa/><strong>NEW HORIZONS SUPPORTED SERVICES INC.</strong></td><td>2</td><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>1</td><td>50.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>50.0</td></tr><td><aa/><strong>NORTHSTAR SPECIAL SERVICES, INC</strong></td><td>61</td><td>4</td><td>0</td><td>0</td><td>12</td><td>7</td><td>12</td><td>12</td><td>27</td><td>6.6</td><td>0.0</td><td>0.0</td><td>19.7</td><td>11.5</td><td>19.7</td><td>19.7</td><td>44.3</td></tr><td><aa/><strong>OPPORTUNITY BUILDERS</strong></td><td>346</td><td>57</td><td>11</td><td>0</td><td>13</td><td>69</td><td>17</td><td>9</td><td>276</td><td>16.5</td><td>3.2</td><td>0.0</td><td>3.8</td><td>19.9</td><td>4.9</td><td>2.6</td><td>79.8</td></tr><td><aa/><strong>PENN MAR ORGANIZATION INC.</strong></td><td>134</td><td>43</td><td>0</td><td>1</td><td>0</td><td>0</td><td>118</td><td>17</td><td>27</td><td>32.1</td><td>0.0</td><td>0.7</td><td>0.0</td><td>0.0</td><td>88.1</td><td>12.7</td><td>20.1</td></tr><td><aa/><strong>POOL OF BETHESDA COMMUNITY SERVICES, INC.</strong></td><td>22</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>19</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>86.4</td></tr><td><aa/><strong>POSITIVE PATHWAY, INC.</strong></td><td>9</td><td>0</td><td>1</td><td>0</td><td>0</td><td>0</td><td>4</td><td>2</td><td>1</td><td>0.0</td><td>11.1</td><td>0.0</td><td>0.0</td><td>0.0</td><td>44.4</td><td>22.2</td><td>11.1</td></tr><td><aa/><strong>PRECISION HEALTH CARE RESOURCES</strong></td><td>24</td><td>5</td><td>5</td><td>0</td><td>0</td><td>3</td><td>12</td><td>0</td><td>16</td><td>20.8</td><td>20.8</td><td>0.0</td><td>0.0</td><td>12.5</td><td>50.0</td><td>0.0</td><td>66.7</td></tr><td><aa/><strong>PROGRESS UNLIMITED</strong></td><td>25</td><td>18</td><td>0</td><td>0</td><td>7</td><td>0</td><td>0</td><td>0</td><td>0</td><td>72.0</td><td>0.0</td><td>0.0</td><td>28.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>PROVIDENCE CENTER</strong></td><td>339</td><td>83</td><td>2</td><td>3</td><td>3</td><td>14</td><td>211</td><td>55</td><td>276</td><td>24.5</td><td>0.6</td><td>0.9</td><td>0.9</td><td>4.1</td><td>62.2</td><td>16.2</td><td>81.4</td></tr><td><aa/><strong>Quantum Leap Inc.</strong></td><td>66</td><td>0</td><td>4</td><td>0</td><td>0</td><td>0</td><td>64</td><td>64</td><td>63</td><td>0.0</td><td>6.1</td><td>0.0</td><td>0.0</td><td>0.0</td><td>97.0</td><td>97.0</td><td>95.5</td></tr><td><aa/><strong>RICHCROFT</strong></td><td>2</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>2</td><td>1</td><td>0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>100.0</td><td>50.0</td><td>0.0</td></tr><td><aa/><strong>SPECTRUM SUPPORT, INC</strong></td><td>37</td><td>0</td><td>0</td><td>0</td><td>0</td><td>5</td><td>37</td><td>1</td><td>22</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>13.5</td><td>100.0</td><td>2.7</td><td>59.5</td></tr><td><aa/><strong>ST. PETERS ADULT LEARNING</strong></td><td>82</td><td>16</td><td>0</td><td>0</td><td>3</td><td>0</td><td>54</td><td>50</td><td>58</td><td>19.5</td><td>0.0</td><td>0.0</td><td>3.7</td><td>0.0</td><td>65.9</td><td>61.0</td><td>70.7</td></tr><td><aa/><strong>STANDARD INTEGRATED SUPPORTS, INC</strong></td><td>2</td><td>1</td><td>0</td><td>0</td><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td><td>50.0</td><td>0.0</td><td>0.0</td><td>50.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>STARFLIGHT ENTERPRISE INC</strong></td><td>2</td><td>2</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>SUNRISE COMMUNITY OF MARYLAND, INC.</strong></td><td>1</td><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>THE  ARC OF THE CENTRAL CHESAPEAKE REGION, INC. </strong></td><td>59</td><td>49</td><td>0</td><td>2</td><td>0</td><td>0</td><td>8</td><td>8</td><td>0</td><td>83.1</td><td>0.0</td><td>3.4</td><td>0.0</td><td>0.0</td><td>13.6</td><td>13.6</td><td>0.0</td></tr><td><aa/><strong>THE ARC BALTIMORE</strong></td><td>862</td><td>157</td><td>10</td><td>1</td><td>200</td><td>2</td><td>155</td><td>36</td><td>326</td><td>18.2</td><td>1.2</td><td>0.1</td><td>23.2</td><td>0.2</td><td>18.0</td><td>4.2</td><td>37.8</td></tr><td><aa/><strong>THE CAROLINE CENTER</strong></td><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>THE LEAGUE FOR PEOPLE WITH DISABILITIES</strong></td><td>158</td><td>18</td><td>1</td><td>0</td><td>1</td><td>0</td><td>29</td><td>29</td><td>118</td><td>11.4</td><td>0.6</td><td>0.0</td><td>0.6</td><td>0.0</td><td>18.4</td><td>18.4</td><td>74.7</td></tr><td><aa/><strong>TREATMENT & LEARNING CTR, INC.</strong></td><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>UNIFIED COMMUNITY CONNECTIONS</strong></td><td>85</td><td>2</td><td>0</td><td>0</td><td>0</td><td>0</td><td>51</td><td>11</td><td>83</td><td>2.4</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>60.0</td><td>12.9</td><td>97.6</td></tr><td><aa/><strong>WORK OPPORTUNITIES UNLIMITED</strong></td><td>37</td><td>18</td><td>0</td><td>0</td><td>0</td><td>0</td><td>4</td><td>1</td><td>0</td><td>48.6</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>10.8</td><td>2.7</td><td>0.0</td></tr></tbody></table><br /><script type="text/javascript" src="../common/sorttable.js"></script>
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
