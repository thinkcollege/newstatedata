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
<div id="dmrMainPrint"><div class="provider_heading"><em>Employment Supports Performance Outcome System Provider Report<br>All Providers<br>2018 for Central West</em></div>
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
<p><span class="mainheading">Number Participating by Activity</span><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2">Total Served<BR>(unduplicated count)</td><td rowspan="2">Number entered<BR>a new individual job<BR>in the previous<BR>12 months</td><td colspan="5" align="center">Number Participating in activity</td><td colspan="5" align="center">Percent participating in activity</td></tr><tr><td align="center">Individual<br>Competitive<br>Employment</td><td align="center">Group<br>Integrated<br>Employment</td><td align="center">Self employment</td><td align="center">Job<br>Search</td><td align="center"">Other day <br />support wrap-around<br />services</td><td align="center">Individual<br>Competitive<br>Employment</td><td align="center">Group<br>Integrated<br>Employment</td><td align="center">Self employment</td><td align="center">Job<br>Search</td><td align="center"">Other day <br />support wrap-around<br />services</td></tr><td><aa/><strong>Aditus Inc.</strong></td><td>25</td><td>0</td><td>16</td><td>10</td><td>0</td><td>11</td><td>6</td><td>64.0</td><td>40.0</td><td>0.0</td><td>44.0</td><td>24.0</td></tr><td><aa/><strong>Alternatives Unlimited</strong></td><td>56</td><td>1</td><td>13</td><td>48</td><td>0</td><td>51</td><td>49</td><td>23.2</td><td>85.7</td><td>0.0</td><td>91.1</td><td>87.5</td></tr><td><aa/><strong>Amego Inc.</strong></td><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td><td>1</td><td>1</td><td>0.0</td><td>0.0</td><td>0.0</td><td>100.0</td><td>100.0</td></tr><td><aa/><strong>Autism Services Association</strong></td><td>2</td><td>0</td><td>0</td><td>2</td><td>0</td><td>0</td><td>2</td><td>0.0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>100.0</td></tr><td><aa/><strong>Berkshire County ARC</strong></td><td>120</td><td>9</td><td>40</td><td>76</td><td>0</td><td>16</td><td>32</td><td>33.3</td><td>63.3</td><td>0.0</td><td>13.3</td><td>26.7</td></tr><td><aa/><strong>Berkshire Family & Indv Resources</strong></td><td>46</td><td>1</td><td>6</td><td>39</td><td>0</td><td>42</td><td>14</td><td>13.0</td><td>84.8</td><td>0.0</td><td>91.3</td><td>30.4</td></tr><td><aa/><strong>Berkshire Hills Music Academy</strong></td><td>33</td><td>3</td><td>12</td><td>17</td><td>0</td><td>32</td><td>33</td><td>36.4</td><td>51.5</td><td>0.0</td><td>97.0</td><td>100.0</td></tr><td><aa/><strong>Cardinal Cushing Centers</strong></td><td>1</td><td>0</td><td>1</td><td>1</td><td>0</td><td>1</td><td>1</td><td>100.0</td><td>100.0</td><td>0.0</td><td>100.0</td><td>100.0</td></tr><td><aa/><strong>Catholic Charities  Worcester/ Mercy Centre</strong></td><td>64</td><td>0</td><td>18</td><td>44</td><td>0</td><td>0</td><td>20</td><td>28.1</td><td>68.8</td><td>0.0</td><td>0.0</td><td>31.3</td></tr><td><aa/><strong>Center of Hope Foundation, Inc.</strong></td><td>110</td><td>0</td><td>23</td><td>95</td><td>0</td><td>5</td><td>88</td><td>20.9</td><td>86.4</td><td>0.0</td><td>4.5</td><td>80.0</td></tr><td><aa/><strong>Community Options Inc.</strong></td><td>33</td><td>0</td><td>16</td><td>10</td><td>2</td><td>14</td><td>14</td><td>48.5</td><td>30.3</td><td>6.1</td><td>42.4</td><td>42.4</td></tr><td><aa/><strong>Dr Franklin Perkins School</strong></td><td>56</td><td>1</td><td>5</td><td>50</td><td>0</td><td>34</td><td>29</td><td>8.9</td><td>89.3</td><td>0.0</td><td>60.7</td><td>51.8</td></tr><td><aa/><strong>GAAMHA Inc</strong></td><td>59</td><td>3</td><td>17</td><td>33</td><td>0</td><td>30</td><td>43</td><td>28.8</td><td>55.9</td><td>0.0</td><td>50.8</td><td>72.9</td></tr><td><aa/><strong>Goodwill Industries-Berkshires</strong></td><td>3</td><td>0</td><td>3</td><td>0</td><td>0</td><td>0</td><td>0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Goodwill Industries-Springfield</strong></td><td>77</td><td>0</td><td>1</td><td>71</td><td>0</td><td>63</td><td>65</td><td>1.3</td><td>92.2</td><td>0.0</td><td>81.8</td><td>84.4</td></tr><td><aa/><strong>Horace Mann Educational Associates</strong></td><td>117</td><td>0</td><td>19</td><td>79</td><td>0</td><td>110</td><td>116</td><td>16.2</td><td>67.5</td><td>0.0</td><td>94.0</td><td>99.1</td></tr><td><aa/><strong>Institute Of Professional Practice</strong></td><td>17</td><td>2</td><td>10</td><td>0</td><td>0</td><td>8</td><td>2</td><td>58.8</td><td>0.0</td><td>0.0</td><td>47.1</td><td>11.8</td></tr><td><aa/><strong>Justice Resource Institute</strong></td><td>6</td><td>0</td><td>0</td><td>3</td><td>0</td><td>3</td><td>5</td><td>0.0</td><td>50.0</td><td>0.0</td><td>50.0</td><td>83.3</td></tr><td><aa/><strong>Kennedy-Donovan Center</strong></td><td>13</td><td>4</td><td>13</td><td>0</td><td>0</td><td>5</td><td>2</td><td>100.0</td><td>0.0</td><td>0.0</td><td>38.5</td><td>15.4</td></tr><td><aa/><strong>Life-Skills, Inc. (Southern Worcester County Rehab.)</strong></td><td>50</td><td>1</td><td>7</td><td>40</td><td>0</td><td>42</td><td>43</td><td>14.0</td><td>80.0</td><td>0.0</td><td>84.0</td><td>86.0</td></tr><td><aa/><strong>Meridian of Servicenet</strong></td><td>86</td><td>4</td><td>21</td><td>56</td><td>0</td><td>12</td><td>25</td><td>24.4</td><td>65.1</td><td>0.0</td><td>14.0</td><td>29.1</td></tr><td><aa/><strong>Microtek</strong></td><td>15</td><td>1</td><td>15</td><td>0</td><td>0</td><td>0</td><td>0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Minute Man Arc</strong></td><td>2</td><td>0</td><td>1</td><td>2</td><td>0</td><td>1</td><td>2</td><td>50.0</td><td>100.0</td><td>0.0</td><td>50.0</td><td>100.0</td></tr><td><aa/><strong>New England Business Associates</strong></td><td>81</td><td>9</td><td>61</td><td>0</td><td>1</td><td>26</td><td>0</td><td>75.3</td><td>0.0</td><td>1.2</td><td>32.1</td><td>0.0</td></tr><td><aa/><strong>Regional Employment Services</strong></td><td>105</td><td>10</td><td>67</td><td>22</td><td>0</td><td>21</td><td>6</td><td>63.8</td><td>21.0</td><td>0.0</td><td>20.0</td><td>5.7</td></tr><td><aa/><strong>Rehabilitative Resources</strong></td><td>4</td><td>0</td><td>3</td><td>0</td><td>1</td><td>0</td><td>1</td><td>75.0</td><td>0.0</td><td>25.0</td><td>0.0</td><td>25.0</td></tr><td><aa/><strong>Riverside Industries</strong></td><td>156</td><td>2</td><td>14</td><td>76</td><td>0</td><td>11</td><td>97</td><td>9.0</td><td>48.7</td><td>0.0</td><td>7.1</td><td>62.2</td></tr><td><aa/><strong>Seven Hills Family Services</strong></td><td>187</td><td>1</td><td>15</td><td>39</td><td>0</td><td>2</td><td>172</td><td>8.0</td><td>20.9</td><td>0.0</td><td>1.1</td><td>92.0</td></tr><td><aa/><strong>SUNSHINE VILLAGE</strong></td><td>160</td><td>2</td><td>9</td><td>61</td><td>0</td><td>20</td><td>113</td><td>5.6</td><td>38.1</td><td>0.0</td><td>12.5</td><td>70.6</td></tr><td><aa/><strong>The Arc of Opportunity</strong></td><td>46</td><td>0</td><td>7</td><td>38</td><td>0</td><td>16</td><td>40</td><td>15.2</td><td>82.6</td><td>0.0</td><td>34.8</td><td>87.0</td></tr><td><aa/><strong>The Charles River Center/ Charles River ARC</strong></td><td>1</td><td>0</td><td>0</td><td>1</td><td>0</td><td>0</td><td>0</td><td>0.0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Valley Collaborative</strong></td><td>1</td><td>0</td><td>0</td><td>1</td><td>0</td><td>1</td><td>1</td><td>0.0</td><td>100.0</td><td>0.0</td><td>100.0</td><td>100.0</td></tr><td><aa/><strong>Valley Educational  Associates</strong></td><td>81</td><td>0</td><td>0</td><td>17</td><td>0</td><td>9</td><td>78</td><td>0.0</td><td>21.0</td><td>0.0</td><td>11.1</td><td>96.3</td></tr><td><aa/><strong>Viability</strong></td><td>223</td><td>10</td><td>82</td><td>96</td><td>0</td><td>44</td><td>140</td><td>36.8</td><td>43.0</td><td>0.0</td><td>19.7</td><td>62.8</td></tr><td><aa/><strong>Work Inc.</strong></td><td>35</td><td>3</td><td>26</td><td>0</td><td>0</td><td>14</td><td>10</td><td>74.3</td><td>0.0</td><td>0.0</td><td>40.0</td><td>28.6</td></tr><td><aa/><strong>Work Opportunities Unlimited</strong></td><td>29</td><td>7</td><td>22</td><td>1</td><td>0</td><td>14</td><td>7</td><td>75.9</td><td>3.4</td><td>0.0</td><td>48.3</td><td>24.1</td></tr><td><aa/><strong>Work Opportunity Center, Inc.</strong></td><td>92</td><td>3</td><td>44</td><td>43</td><td>0</td><td>69</td><td>68</td><td>47.8</td><td>46.7</td><td>0.0</td><td>75.0</td><td>73.9</td></tr><td><rr/><strong>Central West</strong></td><td>2193</td><td>77</td><td>607</td><td>1071</td><td>4</td><td>728</td><td>1325</td><td>27.7</td><td>48.8</td><td>0.2</td><td>33.2</td><td>60.4</td></tr><td><zz/><strong>State</strong></td><td>6459</td><td>344</td><td>2302</td><td>2748</td><td>12</td><td>2783</td><td>4300</td><td>35.6</td><td>42.5</td><td>0.2</td><td>43.1</td><td>66.6</td></tr></table>
<p><span class="mainheading">Subtotals for Job Search and Wrap-around Activities</span><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2">Total Served<BR>(unduplicated count)</td><td rowspan="2">Job Search (Total)</td><td colspan="2" align="center">Number Participating in job search activities</td><td rowspan="2">Day and <br />wrap-around <br />activites (Total)</td><td colspan="3" align="center">Number Participating day and wrap-around activities</td></tr><tr><td align="center">Discovery or <br />career planning</td><td align="center">Job development<br />activities</td><td align="center">Community based<br />day services</td><td align="center">Day habilitation <br />program</td><td align="center"">Other day <br />support services</td></tr><td><aa/><strong>Aditus Inc.</strong></td><td>25</td><td>11</td><td>5</td><td>11</td><td>6</td><td>0</td><td>0</td><td>6</td></tr><td><aa/><strong>Alternatives Unlimited</strong></td><td>56</td><td>51</td><td>51</td><td>51</td><td>49</td><td>49</td><td>0</td><td>0</td></tr><td><aa/><strong>Amego Inc.</strong></td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>0</td><td>0</td></tr><td><aa/><strong>Autism Services Association</strong></td><td>2</td><td>0</td><td>0</td><td>0</td><td>2</td><td>2</td><td>0</td><td>0</td></tr><td><aa/><strong>Berkshire County ARC</strong></td><td>120</td><td>16</td><td>8</td><td>15</td><td>32</td><td>18</td><td>3</td><td>11</td></tr><td><aa/><strong>Berkshire Family & Indv Resources</strong></td><td>46</td><td>42</td><td>41</td><td>24</td><td>14</td><td>14</td><td>0</td><td>0</td></tr><td><aa/><strong>Berkshire Hills Music Academy</strong></td><td>33</td><td>32</td><td>27</td><td>32</td><td>33</td><td>33</td><td>0</td><td>1</td></tr><td><aa/><strong>Cardinal Cushing Centers</strong></td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>0</td><td>0</td></tr><td><aa/><strong>Catholic Charities  Worcester/ Mercy Centre</strong></td><td>64</td><td>0</td><td>0</td><td>0</td><td>20</td><td>20</td><td>1</td><td>0</td></tr><td><aa/><strong>Center of Hope Foundation, Inc.</strong></td><td>110</td><td>5</td><td>1</td><td>5</td><td>88</td><td>54</td><td>61</td><td>0</td></tr><td><aa/><strong>Community Options Inc.</strong></td><td>33</td><td>14</td><td>4</td><td>14</td><td>14</td><td>14</td><td>0</td><td>1</td></tr><td><aa/><strong>Dr Franklin Perkins School</strong></td><td>56</td><td>34</td><td>34</td><td>34</td><td>29</td><td>4</td><td>1</td><td>26</td></tr><td><aa/><strong>GAAMHA Inc</strong></td><td>59</td><td>30</td><td>12</td><td>30</td><td>43</td><td>43</td><td>0</td><td>0</td></tr><td><aa/><strong>Goodwill Industries-Berkshires</strong></td><td>3</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr><td><aa/><strong>Goodwill Industries-Springfield</strong></td><td>77</td><td>63</td><td>63</td><td>56</td><td>65</td><td>65</td><td>0</td><td>0</td></tr><td><aa/><strong>Horace Mann Educational Associates</strong></td><td>117</td><td>110</td><td>109</td><td>89</td><td>116</td><td>116</td><td>8</td><td>0</td></tr><td><aa/><strong>Institute Of Professional Practice</strong></td><td>17</td><td>8</td><td>5</td><td>8</td><td>2</td><td>0</td><td>1</td><td>1</td></tr><td><aa/><strong>Justice Resource Institute</strong></td><td>6</td><td>3</td><td>2</td><td>3</td><td>5</td><td>5</td><td>0</td><td>0</td></tr><td><aa/><strong>Kennedy-Donovan Center</strong></td><td>13</td><td>5</td><td>4</td><td>5</td><td>2</td><td>2</td><td>0</td><td>0</td></tr><td><aa/><strong>Life-Skills, Inc. (Southern Worcester County Rehab.)</strong></td><td>50</td><td>42</td><td>41</td><td>18</td><td>43</td><td>1</td><td>42</td><td>0</td></tr><td><aa/><strong>Meridian of Servicenet</strong></td><td>86</td><td>12</td><td>12</td><td>8</td><td>25</td><td>24</td><td>0</td><td>2</td></tr><td><aa/><strong>Microtek</strong></td><td>15</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr><td><aa/><strong>Minute Man Arc</strong></td><td>2</td><td>1</td><td>1</td><td>0</td><td>2</td><td>2</td><td>0</td><td>1</td></tr><td><aa/><strong>New England Business Associates</strong></td><td>81</td><td>26</td><td>25</td><td>20</td><td>0</td><td>0</td><td>0</td><td>0</td></tr><td><aa/><strong>Regional Employment Services</strong></td><td>105</td><td>21</td><td>14</td><td>21</td><td>6</td><td>5</td><td>0</td><td>1</td></tr><td><aa/><strong>Rehabilitative Resources</strong></td><td>4</td><td>0</td><td>0</td><td>0</td><td>1</td><td>0</td><td>1</td><td>1</td></tr><td><aa/><strong>Riverside Industries</strong></td><td>156</td><td>11</td><td>10</td><td>9</td><td>97</td><td>94</td><td>10</td><td>3</td></tr><td><aa/><strong>Seven Hills Family Services</strong></td><td>187</td><td>2</td><td>0</td><td>2</td><td>172</td><td>172</td><td>2</td><td>5</td></tr><td><aa/><strong>SUNSHINE VILLAGE</strong></td><td>160</td><td>20</td><td>0</td><td>20</td><td>113</td><td>113</td><td>0</td><td>0</td></tr><td><aa/><strong>The Arc of Opportunity</strong></td><td>46</td><td>16</td><td>16</td><td>16</td><td>40</td><td>40</td><td>0</td><td>0</td></tr><td><aa/><strong>The Charles River Center/ Charles River ARC</strong></td><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr><td><aa/><strong>Valley Collaborative</strong></td><td>1</td><td>1</td><td>1</td><td>0</td><td>1</td><td>1</td><td>0</td><td>0</td></tr><td><aa/><strong>Valley Educational  Associates</strong></td><td>81</td><td>9</td><td>9</td><td>9</td><td>78</td><td>78</td><td>0</td><td>0</td></tr><td><aa/><strong>Viability</strong></td><td>223</td><td>44</td><td>40</td><td>39</td><td>140</td><td>140</td><td>10</td><td>0</td></tr><td><aa/><strong>Work Inc.</strong></td><td>35</td><td>14</td><td>7</td><td>13</td><td>10</td><td>1</td><td>0</td><td>9</td></tr><td><aa/><strong>Work Opportunities Unlimited</strong></td><td>29</td><td>14</td><td>9</td><td>14</td><td>7</td><td>4</td><td>4</td><td>2</td></tr><td><aa/><strong>Work Opportunity Center, Inc.</strong></td><td>92</td><td>69</td><td>68</td><td>68</td><td>68</td><td>68</td><td>0</td><td>0</td></tr><td><rr/><strong>Central West</strong></td><td>2193</td><td>728</td><td>621</td><td>636</td><td>1325</td><td>1184</td><td>144</td><td>70</td></tr><td><zz/><strong>State</strong></td><td>6459</td><td>2783</td><td>2326</td><td>2382</td><td>4300</td><td>3814</td><td>862</td><td>224</td></tr></table>
<p><span class="mainheading">Hours of Participation by Activity</span></p><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2">Total Served<BR>(unduplicated count)</td><td rowspan="2">Number entered<BR>a new individual job<BR>in the previous<BR>12 months</td><td colspan="2" align="center">Mean hours per person participating in activity for month</td><td colspan="2" align="center">Percent of total hours in activity for month</td></tr><tr><td align="center">Individual<br>Competitive<br>Employment</td><td align="center">Group<br>Integrated<br>Employment</td><td align="center">Individual<br>Competitive<br>EmploymentJob</td><td align="center">Group<br>Integrated<br>Employment</td></tr><td><aa/><strong>Aditus Inc.</strong></td><td>25</td><td>0</td><td>42.31</td><td>33.15</td><td>67.1</td><td>32.9</td></tr><td><aa/><strong>Alternatives Unlimited</strong></td><td>56</td><td>1</td><td>25.82</td><td>20.28</td><td>25.6</td><td>74.4</td></tr><td><aa/><strong>Amego Inc.</strong></td><td>1</td><td>0</td><td></td><td></td><td>0</td><td>0</td></tr><td><aa/><strong>Autism Services Association</strong></td><td>2</td><td>0</td><td></td><td>56.50</td><td>0.0</td><td>100.0</td></tr><td><aa/><strong>Berkshire County ARC</strong></td><td>120</td><td>9</td><td>46.70</td><td>58.53</td><td>29.6</td><td>70.4</td></tr><td><aa/><strong>Berkshire Family & Indv Resources</strong></td><td>46</td><td>1</td><td>47.33</td><td>74.10</td><td>8.9</td><td>91.1</td></tr><td><aa/><strong>Berkshire Hills Music Academy</strong></td><td>33</td><td>3</td><td>24.18</td><td>6.71</td><td>71.8</td><td>28.2</td></tr><td><aa/><strong>Cardinal Cushing Centers</strong></td><td>1</td><td>0</td><td>40.00</td><td>1.00</td><td>97.6</td><td>2.4</td></tr><td><aa/><strong>Catholic Charities  Worcester/ Mercy Centre</strong></td><td>64</td><td>0</td><td>35.89</td><td>29.90</td><td>32.9</td><td>67.1</td></tr><td><aa/><strong>Center of Hope Foundation, Inc.</strong></td><td>110</td><td>0</td><td>39.65</td><td>34.32</td><td>21.9</td><td>78.1</td></tr><td><aa/><strong>Community Options Inc.</strong></td><td>33</td><td>0</td><td>71.47</td><td>33.02</td><td>76.6</td><td>22.1</td></tr><td><aa/><strong>Dr Franklin Perkins School</strong></td><td>56</td><td>1</td><td>41.60</td><td>24.61</td><td>14.5</td><td>85.5</td></tr><td><aa/><strong>GAAMHA Inc</strong></td><td>59</td><td>3</td><td>80.38</td><td>55.02</td><td>42.9</td><td>57.1</td></tr><td><aa/><strong>Goodwill Industries-Berkshires</strong></td><td>3</td><td>0</td><td>94.33</td><td></td><td>100.0</td><td>0.0</td></tr><td><aa/><strong>Goodwill Industries-Springfield</strong></td><td>77</td><td>0</td><td>40.00</td><td>38.17</td><td>1.5</td><td>98.5</td></tr><td><aa/><strong>Horace Mann Educational Associates</strong></td><td>117</td><td>0</td><td>40.25</td><td>21.54</td><td>31.0</td><td>69.0</td></tr><td><aa/><strong>Institute Of Professional Practice</strong></td><td>17</td><td>2</td><td>54.27</td><td></td><td>100.0</td><td>0.0</td></tr><td><aa/><strong>Justice Resource Institute</strong></td><td>6</td><td>0</td><td></td><td>40.00</td><td>0.0</td><td>100.0</td></tr><td><aa/><strong>Kennedy-Donovan Center</strong></td><td>13</td><td>4</td><td>30.50</td><td></td><td>100.0</td><td>0.0</td></tr><td><aa/><strong>Life-Skills, Inc. (Southern Worcester County Rehab.)</strong></td><td>50</td><td>1</td><td>27.14</td><td>33.80</td><td>12.3</td><td>87.7</td></tr><td><aa/><strong>Meridian of Servicenet</strong></td><td>86</td><td>4</td><td>57.71</td><td>55.23</td><td>28.2</td><td>71.8</td></tr><td><aa/><strong>Microtek</strong></td><td>15</td><td>1</td><td>102.87</td><td></td><td>100.0</td><td>0.0</td></tr><td><aa/><strong>Minute Man Arc</strong></td><td>2</td><td>0</td><td>24.00</td><td>31.78</td><td>27.4</td><td>72.6</td></tr><td><aa/><strong>New England Business Associates</strong></td><td>81</td><td>9</td><td>53.64</td><td></td><td>91.6</td><td>0.0</td></tr><td><aa/><strong>Regional Employment Services</strong></td><td>105</td><td>10</td><td>53.83</td><td>46.03</td><td>78.1</td><td>21.9</td></tr><td><aa/><strong>Rehabilitative Resources</strong></td><td>4</td><td>0</td><td>52.67</td><td></td><td>67.5</td><td>0.0</td></tr><td><aa/><strong>Riverside Industries</strong></td><td>156</td><td>2</td><td>53.52</td><td>46.20</td><td>17.6</td><td>82.4</td></tr><td><aa/><strong>Seven Hills Family Services</strong></td><td>187</td><td>1</td><td>62.16</td><td>26.76</td><td>47.2</td><td>52.8</td></tr><td><aa/><strong>SUNSHINE VILLAGE</strong></td><td>160</td><td>2</td><td>29.28</td><td>51.71</td><td>7.7</td><td>92.3</td></tr><td><aa/><strong>The Arc of Opportunity</strong></td><td>46</td><td>0</td><td>54.50</td><td>39.62</td><td>20.2</td><td>79.8</td></tr><td><aa/><strong>The Charles River Center/ Charles River ARC</strong></td><td>1</td><td>0</td><td></td><td>42.00</td><td>0.0</td><td>100.0</td></tr><td><aa/><strong>Valley Collaborative</strong></td><td>1</td><td>0</td><td></td><td>21.00</td><td>0.0</td><td>100.0</td></tr><td><aa/><strong>Valley Educational  Associates</strong></td><td>81</td><td>0</td><td></td><td>21.35</td><td>0.0</td><td>100.0</td></tr><td><aa/><strong>Viability</strong></td><td>223</td><td>10</td><td>56.78</td><td>55.32</td><td>46.7</td><td>53.3</td></tr><td><aa/><strong>Work Inc.</strong></td><td>35</td><td>3</td><td>52.02</td><td></td><td>100.0</td><td>0.0</td></tr><td><aa/><strong>Work Opportunities Unlimited</strong></td><td>29</td><td>7</td><td>57.17</td><td>16.00</td><td>98.7</td><td>1.3</td></tr><td><aa/><strong>Work Opportunity Center, Inc.</strong></td><td>92</td><td>3</td><td>37.67</td><td>22.47</td><td>63.2</td><td>36.8</td></tr><td><rr/><strong>Central West</strong></td><td>2193</td><td>77</td><td>51.16</td><td>39.97</td><td>41.8</td><td>57.6</td></tr><td><zz/><strong>State</strong></td><td>6459</td><td>344</td><td>48.24</td><td>35.40</td><td>53.2</td><td>46.6</td></tr></table>
<p><span class="mainheading">Monthly Wages</span></p><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2" align="center">Total Served <BR>(unduplicated count)</td><td rowspan="2">Number entered<br>a new individual job<br>in the previous<BR>12 months</td><td colspan="2" align="center">Mean monthly wage</td><td colspan="2" align="center">Percent earning above minimum wage</td></tr><tr><td align="center">Individual<br>Competitive<br />Employment</td><td align="center">Group<br>Integrated<br />Employment</td><td align="center">Individual<br>Competitive<br />Employment</td><td align="center">Group<br>Integrated<br />Employment</td></tr><td><aa/><strong>Aditus Inc.</strong></td><td>25</td><td>0</td><td>503.10</td><td>320.53</td><td>87.5</td><td>30.0</td></tr><td><aa/><strong>Alternatives Unlimited</strong></td><td>56</td><td>1</td><td>284.07</td><td>223.06</td><td>100.0</td><td>100.0</td></tr><td><aa/><strong>Amego Inc.</strong></td><td>1</td><td>0</td><td></td><td></td><td>0</td><td>0</td></tr><td><aa/><strong>Autism Services Association</strong></td><td>2</td><td>0</td><td></td><td>232.45</td><td>0</td><td>0.0</td></tr><td><aa/><strong>Berkshire County ARC</strong></td><td>120</td><td>9</td><td>528.62</td><td>401.40</td><td>100.0</td><td>21.1</td></tr><td><aa/><strong>Berkshire Family & Indv Resources</strong></td><td>46</td><td>1</td><td>557.42</td><td>558.73</td><td>100.0</td><td>12.8</td></tr><td><aa/><strong>Berkshire Hills Music Academy</strong></td><td>33</td><td>3</td><td>293.79</td><td>94.97</td><td>100.0</td><td>100.0</td></tr><td><aa/><strong>Cardinal Cushing Centers</strong></td><td>1</td><td>0</td><td>440.00</td><td>11.00</td><td>100.0</td><td>100.0</td></tr><td><aa/><strong>Catholic Charities  Worcester/ Mercy Centre</strong></td><td>64</td><td>0</td><td>402.48</td><td>103.78</td><td>100.0</td><td>0.0</td></tr><td><aa/><strong>Center of Hope Foundation, Inc.</strong></td><td>110</td><td>0</td><td>463.35</td><td>206.35</td><td>100.0</td><td>8.4</td></tr><td><aa/><strong>Community Options Inc.</strong></td><td>33</td><td>0</td><td>984.00</td><td>312.78</td><td>100.0</td><td>50.0</td></tr><td><aa/><strong>Dr Franklin Perkins School</strong></td><td>56</td><td>1</td><td>457.60</td><td>282.20</td><td>100.0</td><td>100.0</td></tr><td><aa/><strong>GAAMHA Inc</strong></td><td>59</td><td>3</td><td>921.92</td><td>565.35</td><td>100.0</td><td>54.5</td></tr><td><aa/><strong>Goodwill Industries-Berkshires</strong></td><td>3</td><td>0</td><td>1037.74</td><td></td><td>66.7</td><td>0</td></tr><td><aa/><strong>Goodwill Industries-Springfield</strong></td><td>77</td><td>0</td><td>440.00</td><td>419.82</td><td>100.0</td><td>100.0</td></tr><td><aa/><strong>Horace Mann Educational Associates</strong></td><td>117</td><td>0</td><td>447.49</td><td>153.42</td><td>100.0</td><td>60.8</td></tr><td><aa/><strong>Institute Of Professional Practice</strong></td><td>17</td><td>2</td><td>516.25</td><td></td><td>90.0</td><td>0</td></tr><td><aa/><strong>Justice Resource Institute</strong></td><td>6</td><td>0</td><td></td><td>440.00</td><td>0</td><td>100.0</td></tr><td><aa/><strong>Kennedy-Donovan Center</strong></td><td>13</td><td>4</td><td>358.21</td><td></td><td>100.0</td><td>0</td></tr><td><aa/><strong>Life-Skills, Inc. (Southern Worcester County Rehab.)</strong></td><td>50</td><td>1</td><td>298.57</td><td>241.31</td><td>100.0</td><td>17.5</td></tr><td><aa/><strong>Meridian of Servicenet</strong></td><td>86</td><td>4</td><td>694.81</td><td>619.88</td><td>100.0</td><td>100.0</td></tr><td><aa/><strong>Microtek</strong></td><td>15</td><td>1</td><td>1168.27</td><td></td><td>100.0</td><td>0</td></tr><td><aa/><strong>Minute Man Arc</strong></td><td>2</td><td>0</td><td>264.00</td><td>349.52</td><td>100.0</td><td>100.0</td></tr><td><aa/><strong>New England Business Associates</strong></td><td>81</td><td>9</td><td>606.74</td><td></td><td>98.4</td><td>0</td></tr><td><aa/><strong>Regional Employment Services</strong></td><td>105</td><td>10</td><td>658.98</td><td>442.36</td><td>92.5</td><td>72.7</td></tr><td><aa/><strong>Rehabilitative Resources</strong></td><td>4</td><td>0</td><td>728.90</td><td></td><td>100.0</td><td>0</td></tr><td><aa/><strong>Riverside Industries</strong></td><td>156</td><td>2</td><td>656.50</td><td>511.24</td><td>100.0</td><td>100.0</td></tr><td><aa/><strong>Seven Hills Family Services</strong></td><td>187</td><td>1</td><td>784.13</td><td>308.76</td><td>100.0</td><td>100.0</td></tr><td><aa/><strong>SUNSHINE VILLAGE</strong></td><td>160</td><td>2</td><td>322.06</td><td>649.59</td><td>100.0</td><td>100.0</td></tr><td><aa/><strong>The Arc of Opportunity</strong></td><td>46</td><td>0</td><td>655.24</td><td>319.11</td><td>100.0</td><td>23.7</td></tr><td><aa/><strong>The Charles River Center/ Charles River ARC</strong></td><td>1</td><td>0</td><td></td><td>65.14</td><td>0</td><td>0.0</td></tr><td><aa/><strong>Valley Collaborative</strong></td><td>1</td><td>0</td><td></td><td>231.00</td><td>0</td><td>100.0</td></tr><td><aa/><strong>Valley Educational  Associates</strong></td><td>81</td><td>0</td><td></td><td>235.74</td><td>0</td><td>100.0</td></tr><td><aa/><strong>Viability</strong></td><td>223</td><td>10</td><td>637.67</td><td>421.39</td><td>93.9</td><td>56.3</td></tr><td><aa/><strong>Work Inc.</strong></td><td>35</td><td>3</td><td>613.52</td><td></td><td>100.0</td><td>0</td></tr><td><aa/><strong>Work Opportunities Unlimited</strong></td><td>29</td><td>7</td><td>740.38</td><td>176.00</td><td>95.5</td><td>100.0</td></tr><td><aa/><strong>Work Opportunity Center, Inc.</strong></td><td>92</td><td>3</td><td>488.35</td><td>53.30</td><td>100.0</td><td>0.0</td></tr><td><rr/><strong>Central West</strong></td><td>2193</td><td>77</td><td>602.88</td><td>351.33</td><td>97.4</td><td>59.0</td></tr><td><zz/><strong>State</strong></td><td>6459</td><td>344</td><td>570.22</td><td>320.27</td><td>97.5</td><td>71.5</td></tr></table>
<p><span class="mainheading">Self Employment Averages for a 3-month Period</span><table border="1" cellspacing="0" cellpadding="0" class="dmrdata"><tr><td rowspan="2">&nbsp;</td><td rowspan="2">Total Served<BR>(unduplicated count)</td><td rowspan="2">Number of individs.<br />in self employment</td><td colspan="5" align="center">Averages</td></tr><tr><td align=\"center\">Mean Hours in<br />Self Employment</td><td align="center">Mean self<br />employment earning</td><td align="center">Mean self<br />employment expenses</td><td align="center">Mean net self<br />employment earnings</td></tr><td><aa/><strong>Aditus Inc.</strong></td><td>25</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Alternatives Unlimited</strong></td><td>56</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Amego Inc.</strong></td><td>1</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Autism Services Association</strong></td><td>2</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Berkshire County ARC</strong></td><td>120</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Berkshire Family & Indv Resources</strong></td><td>46</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Berkshire Hills Music Academy</strong></td><td>33</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Cardinal Cushing Centers</strong></td><td>1</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Catholic Charities  Worcester/ Mercy Centre</strong></td><td>64</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Center of Hope Foundation, Inc.</strong></td><td>110</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Community Options Inc.</strong></td><td>33</td><td>2</td><td>9.50</td><td>232.86</td><td>224.62</td><td>120.55</td></tr><td><aa/><strong>Dr Franklin Perkins School</strong></td><td>56</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>GAAMHA Inc</strong></td><td>59</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Goodwill Industries-Berkshires</strong></td><td>3</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Goodwill Industries-Springfield</strong></td><td>77</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Horace Mann Educational Associates</strong></td><td>117</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Institute Of Professional Practice</strong></td><td>17</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Justice Resource Institute</strong></td><td>6</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Kennedy-Donovan Center</strong></td><td>13</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Life-Skills, Inc. (Southern Worcester County Rehab.)</strong></td><td>50</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Meridian of Servicenet</strong></td><td>86</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Microtek</strong></td><td>15</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Minute Man Arc</strong></td><td>2</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>New England Business Associates</strong></td><td>81</td><td>1</td><td>300.00</td><td>4629.00</td><td>4597.65</td><td>31.35</td></tr><td><aa/><strong>Regional Employment Services</strong></td><td>105</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Rehabilitative Resources</strong></td><td>4</td><td>1</td><td>76.00</td><td>5416.69</td><td>2631.46</td><td>2785.23</td></tr><td><aa/><strong>Riverside Industries</strong></td><td>156</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Seven Hills Family Services</strong></td><td>187</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>SUNSHINE VILLAGE</strong></td><td>160</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>The Arc of Opportunity</strong></td><td>46</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>The Charles River Center/ Charles River ARC</strong></td><td>1</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Valley Collaborative</strong></td><td>1</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Valley Educational  Associates</strong></td><td>81</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Viability</strong></td><td>223</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Work Inc.</strong></td><td>35</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Work Opportunities Unlimited</strong></td><td>29</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><aa/><strong>Work Opportunity Center, Inc.</strong></td><td>92</td><td>0</td><td></td><td></td><td></td><td></td></tr><td><rr/><strong>Central West</strong></td><td>2193</td><td>4</td><td>98.75</td><td>2627.85</td><td>2484.58</td><td>764.42</td></tr><td><zz/><strong>State</strong></td><td>6459</td><td>12</td><td>40.50</td><td>1337.45</td><td>1114.16</td><td>473.52</td></tr></table>

EOT;
?><div id="dmrfootersmall">
<img src="../images/statedata.gif" width="169" height="46" alt="statedata.info" border="0" /> A project of the Institute for Community Inclusion, UMass Boston
</div>
</div> <!--end main div-->
<div id="dmrSmalltop">Massachusetts Department of Developmental Services</div>