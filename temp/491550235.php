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
<base href="http://statedata.local/dds/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='StyleSheet' type='text/css' href='../common/styles.css' />
<link rel='StyleSheet' type='text/css' href='../common/side_menu.css' />
<style type="text/css">input.submit { text-indent:-999px; background:url("../images/buttons/submit.jpg") #FFF top left no-repeat; border:0; height:4em; width:6em; } div#top { font-size:2em; padding:1.36em 0; height:auto; font-weight:bold;}</style>
<!--[if ie]><style type="text/css">input.submit { text-indent:-49em; background:#FFF url(../images/buttons/submit.jpg) no-repeat top right; border:0; height:4em; width:60em; }</style><![endif]-->
<!--<script language="JavaScript" 
src="../common/rollovers.js"></script>
<script language="JavaScript" src="../common/common.js"></script>
<script language="JavaScript" src="../common/functions.js"></script>-->
</head>
<body bgcolor="#FFFFFF" text="#000000">

<div id="skip"><a href="#side_menu">Skip to navigation and funders</a></div>
<div id="main">
	<h1>Provider Report for 2004</h1>
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
<table class="sortable" border="1"><thead><tr><th rowspan="2">Provider</th><th rowspan="2">Total Served<br>(unduplicated count)</th><th colspan="5" align="center">Number Participating in activity</th><th colspan="5" align="center">Percent participating in activity</th></tr><tr><th align="center">Individual Supported Job</th><th align="center">Group Supported Job</th><th align="center">Facility Based Work</th><th align="center">Volunteer<br>or Non-Work<br>Activity</th><th align="center">In Transition</td><th align="center">Individual Supported Job</th><th align="center">Group Supported Job</th><th align="center">Facility Based Work</th><th align=center>Volunteer<br />or Non-Work<br />Activity</th><th align="center">In Transition</th></tr></thead><tbody><td><aa/><strong>Aditus</strong></td><td>83</td><td>45</td><td>35</td><td>0</td><td>83</td><td>15</td><td>54.2</td><td>42.2</td><td>0.0</td><td>100.0</td><td>18.1</td></tr><td><aa/><strong>Alternatives Unlimited</strong></td><td>64</td><td>17</td><td>49</td><td>0</td><td>22</td><td>10</td><td>26.6</td><td>76.6</td><td>0.0</td><td>34.4</td><td>15.6</td></tr><td><aa/><strong>ARC Of North Central</strong></td><td>38</td><td>14</td><td>19</td><td>37</td><td>37</td><td>13</td><td>36.8</td><td>50.0</td><td>97.4</td><td>97.4</td><td>34.2</td></tr><td><aa/><strong>Association For Comm Living</strong></td><td>1</td><td>0</td><td>1</td><td>0</td><td>1</td><td>0</td><td>0.0</td><td>100.0</td><td>0.0</td><td>100.0</td><td>0.0</td></tr><td><aa/><strong>Berkshire County ARC</strong></td><td>99</td><td>22</td><td>70</td><td>0</td><td>0</td><td>7</td><td>22.2</td><td>70.7</td><td>0.0</td><td>0.0</td><td>7.1</td></tr><td><aa/><strong>Berkshire Family & Indv Resour</strong></td><td>51</td><td>3</td><td>11</td><td>35</td><td>0</td><td>0</td><td>5.9</td><td>21.6</td><td>68.6</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Cardinal Cushing Centers Inc</strong></td><td>3</td><td>0</td><td>1</td><td>3</td><td>3</td><td>0</td><td>0.0</td><td>33.3</td><td>100.0</td><td>100.0</td><td>0.0</td></tr><td><aa/><strong>Catholic Charities  Worcester</strong></td><td>53</td><td>24</td><td>36</td><td>45</td><td>45</td><td>27</td><td>45.3</td><td>67.9</td><td>84.9</td><td>84.9</td><td>50.9</td></tr><td><aa/><strong>Community Enterprises</strong></td><td>55</td><td>16</td><td>27</td><td>12</td><td>1</td><td>3</td><td>29.1</td><td>49.1</td><td>21.8</td><td>1.8</td><td>5.5</td></tr><td><aa/><strong>Community Options</strong></td><td>42</td><td>25</td><td>12</td><td>0</td><td>17</td><td>0</td><td>59.5</td><td>28.6</td><td>0.0</td><td>40.5</td><td>0.0</td></tr><td><aa/><strong>Community Work Services</strong></td><td>1</td><td>1</td><td>0</td><td>0</td><td>0</td><td>1</td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>100.0</td></tr><td><aa/><strong>Dr Franklin Perkins School</strong></td><td>8</td><td>0</td><td>0</td><td>6</td><td>3</td><td>0</td><td>0.0</td><td>0.0</td><td>75.0</td><td>37.5</td><td>0.0</td></tr><td><aa/><strong>FOR COMMUNITY SERVICE</strong></td><td>63</td><td>10</td><td>19</td><td>43</td><td>47</td><td>1</td><td>15.9</td><td>30.2</td><td>68.3</td><td>74.6</td><td>1.6</td></tr><td><aa/><strong>GAAMHA Inc</strong></td><td>117</td><td>18</td><td>54</td><td>59</td><td>75</td><td>3</td><td>15.4</td><td>46.2</td><td>50.4</td><td>64.1</td><td>2.6</td></tr><td><aa/><strong>Goodwill Industries-Berkshires</strong></td><td>3</td><td>0</td><td>0</td><td>3</td><td>0</td><td>0</td><td>0.0</td><td>0.0</td><td>100.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Goodwill Industries-Springfield</strong></td><td>43</td><td>2</td><td>11</td><td>39</td><td>41</td><td>0</td><td>4.7</td><td>25.6</td><td>90.7</td><td>95.3</td><td>0.0</td></tr><td><aa/><strong>Horace Mann Educational Associ</strong></td><td>45</td><td>14</td><td>20</td><td>1</td><td>16</td><td>2</td><td>31.1</td><td>44.4</td><td>2.2</td><td>35.6</td><td>4.4</td></tr><td><aa/><strong>Human Resource Unlimited</strong></td><td>95</td><td>26</td><td>33</td><td>48</td><td>52</td><td>4</td><td>27.4</td><td>34.7</td><td>50.5</td><td>54.7</td><td>4.2</td></tr><td><aa/><strong>Institute Of Professional Prac</strong></td><td>30</td><td>22</td><td>0</td><td>0</td><td>4</td><td>11</td><td>73.3</td><td>0.0</td><td>0.0</td><td>13.3</td><td>36.7</td></tr><td><aa/><strong>Kennedy-Donovan Center</strong></td><td>10</td><td>9</td><td>0</td><td>0</td><td>0</td><td>2</td><td>90.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>20.0</td></tr><td><aa/><strong>Ledges  Inc (The)</strong></td><td>4</td><td>2</td><td>0</td><td>2</td><td>4</td><td>4</td><td>50.0</td><td>0.0</td><td>50.0</td><td>100.0</td><td>100.0</td></tr><td><aa/><strong>Meridian Assoc For Programs</strong></td><td>88</td><td>50</td><td>26</td><td>4</td><td>6</td><td>16</td><td>56.8</td><td>29.5</td><td>4.5</td><td>6.8</td><td>18.2</td></tr><td><aa/><strong>Microtek</strong></td><td>14</td><td>0</td><td>14</td><td>0</td><td>12</td><td>0</td><td>0.0</td><td>100.0</td><td>0.0</td><td>85.7</td><td>0.0</td></tr><td><aa/><strong>Nauset  Inc</strong></td><td>1</td><td>0</td><td>1</td><td>1</td><td>1</td><td>0</td><td>0.0</td><td>100.0</td><td>100.0</td><td>100.0</td><td>0.0</td></tr><td><aa/><strong>New England Business Associates</strong></td><td>67</td><td>47</td><td>0</td><td>0</td><td>16</td><td>16</td><td>70.1</td><td>0.0</td><td>0.0</td><td>23.9</td><td>23.9</td></tr><td><aa/><strong>New England Center for Children</strong></td><td>6</td><td>5</td><td>0</td><td>0</td><td>1</td><td>0</td><td>83.3</td><td>0.0</td><td>0.0</td><td>16.7</td><td>0.0</td></tr><td><aa/><strong>Partners-In-Services  Inc</strong></td><td>4</td><td>4</td><td>1</td><td>1</td><td>0</td><td>0</td><td>100.0</td><td>25.0</td><td>25.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Regional Employment Services</strong></td><td>49</td><td>35</td><td>11</td><td>0</td><td>0</td><td>0</td><td>71.4</td><td>22.4</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Rehabilitative Resources</strong></td><td>8</td><td>8</td><td>0</td><td>0</td><td>0</td><td>0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Riverside Industries</strong></td><td>145</td><td>41</td><td>45</td><td>89</td><td>4</td><td>18</td><td>28.3</td><td>31.0</td><td>61.4</td><td>2.8</td><td>12.4</td></tr><td><aa/><strong>Road To Responsibility</strong></td><td>1</td><td>0</td><td>0</td><td>1</td><td>1</td><td>0</td><td>0.0</td><td>0.0</td><td>100.0</td><td>100.0</td><td>0.0</td></tr><td><aa/><strong>Seven Hills Family Services</strong></td><td>134</td><td>22</td><td>48</td><td>92</td><td>130</td><td>6</td><td>16.4</td><td>35.8</td><td>68.7</td><td>97.0</td><td>4.5</td></tr><td><aa/><strong>Southern Worcester County ARC</strong></td><td>43</td><td>26</td><td>18</td><td>13</td><td>13</td><td>1</td><td>60.5</td><td>41.9</td><td>30.2</td><td>30.2</td><td>2.3</td></tr><td><aa/><strong>Valley Education Associates</strong></td><td>62</td><td>14</td><td>19</td><td>38</td><td>0</td><td>0</td><td>22.6</td><td>30.6</td><td>61.3</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Work Inc</strong></td><td>23</td><td>21</td><td>2</td><td>0</td><td>0</td><td>0</td><td>91.3</td><td>8.7</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Work Opportunity Center</strong></td><td>105</td><td>34</td><td>0</td><td>82</td><td>9</td><td>35</td><td>32.4</td><td>0.0</td><td>78.1</td><td>8.6</td><td>33.3</td></tr></tbody></table><br><script type="text/javascript" src="../common/sorttable.js"></script>
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
<div id="top">Massachusetts Department of Developmental Services</div>
<div id="side_menu">
<ul>
<li><a href="./">Project home <img src="../images/arrow_<?php echo $area == "home" ? "on" : "off"; ?>.gif" width="4" height="8" alt="" border="0"></a></li>
<li><a href="./charts/activity_1.php">Summary by Activity <img src="../images/arrow_<?php echo $area == "activity" ? "on" : "off"; ?>.gif" width="4" height="8" alt="" border="0"></a></li>
<li><a href="./charts/region_1.php">Summary by Region <img src="../images/arrow_<?php echo $area == "region" ? "on" : "off"; ?>.gif" width="4" height="8" alt="" border="0"></a></li>
<li><a href="./charts/provider_1.php">Provider summary report <img src="../images/arrow_<?php echo $area == "provider" ? "on" : "off"; ?>.gif" width="4" height="8" alt="" border="0"></a></li>
<li><a href="./charts/provider_individual_1.php">Provider individual report <img src="../images/arrow_<?php echo $area == "provider" ? "on" : "off"; ?>.gif" width="4" height="8" alt="" border="0"></a></li>
<li><a href="./charts/comparison_1.php">Provider Comparison report <img src="../images/arrow_<?php echo $area == "comparison" ? "on" : "off"; ?>.gif" width="4" height="8" alt="" border="0"></a></li>
<li><a href="./charts/trends_1.php">Trends report  <img src="../images/arrow_<?php echo $area == "trends" ? "on" : "off"; ?>.gif" width="4" height="8" alt="" border="0"></a></li>
<li><a href="./feedback.php">Feedback <img src="../images/arrow_<?php echo $area == "Feedback" ? "on" : "off"; ?>.gif" width="4" height="7" alt="" border="0"></a></li>
</ul>
<div id="funders" style="text-align:center; padding-top:1em;">
<p><a href="http://communityinclusion.org/"><img src="../images/icigreendark.gif" width="72" height="72" alt="communityinclusion.org" /></a></p>
<p><a href="http://statedata.info/"><img src="../images/statedata_side.gif" alt="statedata.info" /></a></p>
<p><a href="http://www.umb.edu"><img src="../images/UMB_informal.gif" width="54" height="60" alt="umb.edu" /></a></p>
</div><!--end funders div-->
</div><!--end sidemenu div-->
<script type="text/javascript" src="../common/sorttable.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
<script type="text/javascript" src="dds.js"></script>
