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
	<h1>Provider Report for all years</h1>
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
<table class="sortable" border="1"><thead><tr><th rowspan="2">Provider</th><th rowspan="2">Total Served<br>(unduplicated count)</th><th rowspan="2">Number entered a <BR>new individual job in the <br />previous 12 months</th><th colspan="6" align="center">Number Participating in activity</th><th colspan="6" align="center">Percent participating in activity</th></tr><tr><th align="center">Individual Supported Job</th><th align="center">Group Supported Job</th><th align="center">Facility Based Work</th><th align="center">Volunteer<br>Work</th><th align="center">In Transition</td><th align="center">Other<br>Non-Paid<br>Service</th><th align="center">Individual Supported Job</th><th align="center">Group Supported Job</th><th align="center">Facility Based Work</th><th align=center>Volunteer<br />Work</th><th align="center">In Transition</th><th align="center">Other<br>Non-Paid<br>Service</th></tr></thead><tbody><td><aa/><strong>Aditus</strong></td><td>44</td><td>0</td><td>26</td><td>13</td><td>0</td><td>12</td><td>20</td><td>14</td><td>59.1</td><td>29.5</td><td>0.0</td><td>27.3</td><td>45.5</td><td>31.8</td></tr><td><aa/><strong>Advocates  Inc</strong></td><td>61</td><td>2</td><td>55</td><td>0</td><td>0</td><td>0</td><td>7</td><td>31</td><td>90.2</td><td>0.0</td><td>0.0</td><td>0.0</td><td>11.5</td><td>50.8</td></tr><td><aa/><strong>Alternative Supports   Inc</strong></td><td>23</td><td>0</td><td>5</td><td>0</td><td>4</td><td>10</td><td>23</td><td>21</td><td>21.7</td><td>0.0</td><td>17.4</td><td>43.5</td><td>100.0</td><td>91.3</td></tr><td><aa/><strong>Alternatives Unlimited</strong></td><td>86</td><td>1</td><td>26</td><td>53</td><td>0</td><td>66</td><td>73</td><td>4</td><td>30.2</td><td>61.6</td><td>0.0</td><td>76.7</td><td>84.9</td><td>4.7</td></tr><td><aa/><strong>Amego</strong></td><td>26</td><td>0</td><td>2</td><td>3</td><td>25</td><td>24</td><td>18</td><td>26</td><td>7.7</td><td>11.5</td><td>96.2</td><td>92.3</td><td>69.2</td><td>100.0</td></tr><td><aa/><strong>American Training</strong></td><td>175</td><td>2</td><td>20</td><td>29</td><td>147</td><td>77</td><td>168</td><td>168</td><td>11.4</td><td>16.6</td><td>84.0</td><td>44.0</td><td>96.0</td><td>96.0</td></tr><td><aa/><strong>ARC of Greater Plymouth The</strong></td><td>30</td><td>1</td><td>14</td><td>15</td><td>0</td><td>6</td><td>19</td><td>3</td><td>46.7</td><td>50.0</td><td>0.0</td><td>20.0</td><td>63.3</td><td>10.0</td></tr><td><aa/><strong>ARC of North Central</strong></td><td>65</td><td>2</td><td>11</td><td>33</td><td>60</td><td>0</td><td>24</td><td>60</td><td>16.9</td><td>50.8</td><td>92.3</td><td>0.0</td><td>36.9</td><td>92.3</td></tr><td><aa/><strong>Attleboro Enterprises</strong></td><td>48</td><td>0</td><td>6</td><td>40</td><td>1</td><td>0</td><td>0</td><td>0</td><td>12.5</td><td>83.3</td><td>2.1</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Autism Services Association</strong></td><td>57</td><td>0</td><td>10</td><td>50</td><td>38</td><td>0</td><td>0</td><td>0</td><td>17.5</td><td>87.7</td><td>66.7</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Barry L Price Rehab Center</strong></td><td>25</td><td>1</td><td>7</td><td>8</td><td>16</td><td>4</td><td>11</td><td>15</td><td>28.0</td><td>32.0</td><td>64.0</td><td>16.0</td><td>44.0</td><td>60.0</td></tr><td><aa/><strong>Behavioral Associates Of Mass</strong></td><td>4</td><td>0</td><td>1</td><td>3</td><td>0</td><td>2</td><td>1</td><td>3</td><td>25.0</td><td>75.0</td><td>0.0</td><td>50.0</td><td>25.0</td><td>75.0</td></tr><td><aa/><strong>Berkshire County ARC</strong></td><td>105</td><td>3</td><td>20</td><td>83</td><td>0</td><td>0</td><td>4</td><td>0</td><td>19.0</td><td>79.0</td><td>0.0</td><td>0.0</td><td>3.8</td><td>0.0</td></tr><td><aa/><strong>Berkshire Family & Indv Resour</strong></td><td>53</td><td>0</td><td>22</td><td>31</td><td>0</td><td>0</td><td>0</td><td>0</td><td>41.5</td><td>58.5</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Best Buddies Jobs</strong></td><td>25</td><td>5</td><td>22</td><td>0</td><td>0</td><td>0</td><td>6</td><td>0</td><td>88.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>24.0</td><td>0.0</td></tr><td><aa/><strong>Better Community Living</strong></td><td>5</td><td>0</td><td>2</td><td>0</td><td>0</td><td>3</td><td>0</td><td>0</td><td>40.0</td><td>0.0</td><td>0.0</td><td>60.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Boston College</strong></td><td>16</td><td>2</td><td>16</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Bridgewell</strong></td><td>45</td><td>4</td><td>3</td><td>24</td><td>30</td><td>0</td><td>45</td><td>45</td><td>6.7</td><td>53.3</td><td>66.7</td><td>0.0</td><td>100.0</td><td>100.0</td></tr><td><aa/><strong>Brockton Area ARC</strong></td><td>66</td><td>1</td><td>9</td><td>19</td><td>56</td><td>1</td><td>8</td><td>59</td><td>13.6</td><td>28.8</td><td>84.8</td><td>1.5</td><td>12.1</td><td>89.4</td></tr><td><aa/><strong>Brockton Area Multi Services</strong></td><td>42</td><td>5</td><td>22</td><td>0</td><td>0</td><td>12</td><td>26</td><td>0</td><td>52.4</td><td>0.0</td><td>0.0</td><td>28.6</td><td>61.9</td><td>0.0</td></tr><td><aa/><strong>C L A S S</strong></td><td>213</td><td>4</td><td>43</td><td>19</td><td>172</td><td>0</td><td>103</td><td>170</td><td>20.2</td><td>8.9</td><td>80.8</td><td>0.0</td><td>48.4</td><td>79.8</td></tr><td><aa/><strong>capeAbilities</strong></td><td>111</td><td>0</td><td>24</td><td>66</td><td>63</td><td>9</td><td>42</td><td>75</td><td>21.6</td><td>59.5</td><td>56.8</td><td>8.1</td><td>37.8</td><td>67.6</td></tr><td><aa/><strong>Cardinal Cushing Centers Inc</strong></td><td>63</td><td>0</td><td>25</td><td>38</td><td>0</td><td>20</td><td>0</td><td>59</td><td>39.7</td><td>60.3</td><td>0.0</td><td>31.7</td><td>0.0</td><td>93.7</td></tr><td><aa/><strong>Career Resources Corp</strong></td><td>56</td><td>2</td><td>17</td><td>1</td><td>48</td><td>17</td><td>30</td><td>48</td><td>30.4</td><td>1.8</td><td>85.7</td><td>30.4</td><td>53.6</td><td>85.7</td></tr><td><aa/><strong>Catholic Charities  Worcester</strong></td><td>68</td><td>0</td><td>24</td><td>28</td><td>57</td><td>19</td><td>25</td><td>60</td><td>35.3</td><td>41.2</td><td>83.8</td><td>27.9</td><td>36.8</td><td>88.2</td></tr><td><aa/><strong>Center House</strong></td><td>8</td><td>0</td><td>6</td><td>1</td><td>0</td><td>0</td><td>7</td><td>2</td><td>75.0</td><td>12.5</td><td>0.0</td><td>0.0</td><td>87.5</td><td>25.0</td></tr><td><aa/><strong>Central Middlesex ARC</strong></td><td>77</td><td>1</td><td>10</td><td>15</td><td>54</td><td>0</td><td>24</td><td>60</td><td>13.0</td><td>19.5</td><td>70.1</td><td>0.0</td><td>31.2</td><td>77.9</td></tr><td><aa/><strong>Charles River ARC</strong></td><td>158</td><td>0</td><td>29</td><td>50</td><td>99</td><td>56</td><td>30</td><td>147</td><td>18.4</td><td>31.6</td><td>62.7</td><td>35.4</td><td>19.0</td><td>93.0</td></tr><td><aa/><strong>Community Connections</strong></td><td>111</td><td>0</td><td>67</td><td>0</td><td>0</td><td>9</td><td>29</td><td>18</td><td>60.4</td><td>0.0</td><td>0.0</td><td>8.1</td><td>26.1</td><td>16.2</td></tr><td><aa/><strong>Community Enterprises</strong></td><td>172</td><td>6</td><td>80</td><td>53</td><td>31</td><td>4</td><td>39</td><td>10</td><td>46.5</td><td>30.8</td><td>18.0</td><td>2.3</td><td>22.7</td><td>5.8</td></tr><td><aa/><strong>Community Options</strong></td><td>43</td><td>2</td><td>24</td><td>14</td><td>0</td><td>4</td><td>9</td><td>7</td><td>55.8</td><td>32.6</td><td>0.0</td><td>9.3</td><td>20.9</td><td>16.3</td></tr><td><aa/><strong>Community Work Services</strong></td><td>27</td><td>1</td><td>5</td><td>0</td><td>22</td><td>1</td><td>10</td><td>1</td><td>18.5</td><td>0.0</td><td>81.5</td><td>3.7</td><td>37.0</td><td>3.7</td></tr><td><aa/><strong>Cooperative Production</strong></td><td>9</td><td>0</td><td>8</td><td>0</td><td>0</td><td>5</td><td>0</td><td>8</td><td>88.9</td><td>0.0</td><td>0.0</td><td>55.6</td><td>0.0</td><td>88.9</td></tr><td><aa/><strong>Dr Franklin Perkins School</strong></td><td>17</td><td>0</td><td>0</td><td>15</td><td>0</td><td>1</td><td>0</td><td>17</td><td>0.0</td><td>88.2</td><td>0.0</td><td>5.9</td><td>0.0</td><td>100.0</td></tr><td><aa/><strong>Eliot Community Human Service</strong></td><td>26</td><td>1</td><td>9</td><td>0</td><td>21</td><td>9</td><td>5</td><td>25</td><td>34.6</td><td>0.0</td><td>80.8</td><td>34.6</td><td>19.2</td><td>96.2</td></tr><td><aa/><strong>GAAMHA Inc</strong></td><td>105</td><td>3</td><td>8</td><td>19</td><td>93</td><td>4</td><td>4</td><td>0</td><td>7.6</td><td>18.1</td><td>88.6</td><td>3.8</td><td>3.8</td><td>0.0</td></tr><td><aa/><strong>Goodwill Industries-Berkshires</strong></td><td>2</td><td>0</td><td>2</td><td>0</td><td>0</td><td>0</td><td>1</td><td>0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>50.0</td><td>0.0</td></tr><td><aa/><strong>Goodwill Industries-Springfield</strong></td><td>59</td><td>0</td><td>1</td><td>38</td><td>48</td><td>0</td><td>2</td><td>55</td><td>1.7</td><td>64.4</td><td>81.4</td><td>0.0</td><td>3.4</td><td>93.2</td></tr><td><aa/><strong>Greater Lawrence Educ Collab</strong></td><td>30</td><td>0</td><td>2</td><td>29</td><td>0</td><td>0</td><td>0</td><td>0</td><td>6.7</td><td>96.7</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Greater Newburyport Opportunit</strong></td><td>55</td><td>1</td><td>19</td><td>0</td><td>51</td><td>3</td><td>0</td><td>0</td><td>34.5</td><td>0.0</td><td>92.7</td><td>5.5</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Greater Waltham ARC</strong></td><td>40</td><td>0</td><td>5</td><td>34</td><td>0</td><td>0</td><td>0</td><td>0</td><td>12.5</td><td>85.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>GROW Associates  Inc</strong></td><td>16</td><td>1</td><td>14</td><td>0</td><td>15</td><td>2</td><td>0</td><td>15</td><td>87.5</td><td>0.0</td><td>93.8</td><td>12.5</td><td>0.0</td><td>93.8</td></tr><td><aa/><strong>Horace Mann Educational Association</strong></td><td>104</td><td>0</td><td>14</td><td>48</td><td>79</td><td>34</td><td>59</td><td>101</td><td>13.5</td><td>46.2</td><td>76.0</td><td>32.7</td><td>56.7</td><td>97.1</td></tr><td><aa/><strong>Human Resource Unlimited</strong></td><td>94</td><td>6</td><td>20</td><td>29</td><td>58</td><td>2</td><td>11</td><td>52</td><td>21.3</td><td>30.9</td><td>61.7</td><td>2.1</td><td>11.7</td><td>55.3</td></tr><td><aa/><strong>INSTITUTE FOR COMMUNITY INCLUSION</strong></td><td>16</td><td>0</td><td>11</td><td>0</td><td>0</td><td>3</td><td>2</td><td>1</td><td>68.8</td><td>0.0</td><td>0.0</td><td>18.8</td><td>12.5</td><td>6.3</td></tr><td><aa/><strong>Institute Of Professional Prac</strong></td><td>28</td><td>7</td><td>22</td><td>0</td><td>0</td><td>4</td><td>14</td><td>0</td><td>78.6</td><td>0.0</td><td>0.0</td><td>14.3</td><td>50.0</td><td>0.0</td></tr><td><aa/><strong>Jewish Vocational Service</strong></td><td>4</td><td>0</td><td>3</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>75.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Justice Resource Institute</strong></td><td>42</td><td>1</td><td>10</td><td>38</td><td>0</td><td>11</td><td>0</td><td>1</td><td>23.8</td><td>90.5</td><td>0.0</td><td>26.2</td><td>0.0</td><td>2.4</td></tr><td><aa/><strong>Kennedy-Donovan Center</strong></td><td>10</td><td>1</td><td>9</td><td>0</td><td>0</td><td>1</td><td>2</td><td>0</td><td>90.0</td><td>0.0</td><td>0.0</td><td>10.0</td><td>20.0</td><td>0.0</td></tr><td><aa/><strong>Ledges  Inc (The)</strong></td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>1</td><td>2</td><td>2</td><td>50.0</td><td>0.0</td><td>0.0</td><td>50.0</td><td>100.0</td><td>100.0</td></tr><td><aa/><strong>Life Focus Center</strong></td><td>13</td><td>0</td><td>2</td><td>11</td><td>0</td><td>0</td><td>11</td><td>11</td><td>15.4</td><td>84.6</td><td>0.0</td><td>0.0</td><td>84.6</td><td>84.6</td></tr><td><aa/><strong>LifeStream  Inc</strong></td><td>23</td><td>2</td><td>17</td><td>0</td><td>0</td><td>0</td><td>16</td><td>22</td><td>73.9</td><td>0.0</td><td>0.0</td><td>0.0</td><td>69.6</td><td>95.7</td></tr><td><aa/><strong>Lifeworks</strong></td><td>188</td><td>0</td><td>51</td><td>57</td><td>157</td><td>0</td><td>0</td><td>187</td><td>27.1</td><td>30.3</td><td>83.5</td><td>0.0</td><td>0.0</td><td>99.5</td></tr><td><aa/><strong>M.O. L.I.F.E.</strong></td><td>23</td><td>1</td><td>18</td><td>0</td><td>0</td><td>11</td><td>4</td><td>5</td><td>78.3</td><td>0.0</td><td>0.0</td><td>47.8</td><td>17.4</td><td>21.7</td></tr><td><aa/><strong>MAB Community Services</strong></td><td>26</td><td>3</td><td>5</td><td>0</td><td>25</td><td>17</td><td>25</td><td>25</td><td>19.2</td><td>0.0</td><td>96.2</td><td>65.4</td><td>96.2</td><td>96.2</td></tr><td><aa/><strong>May Institute (The)</strong></td><td>46</td><td>0</td><td>5</td><td>10</td><td>42</td><td>0</td><td>4</td><td>1</td><td>10.9</td><td>21.7</td><td>91.3</td><td>0.0</td><td>8.7</td><td>2.2</td></tr><td><aa/><strong>Meridian of Servicenet</strong></td><td>32</td><td>2</td><td>13</td><td>8</td><td>11</td><td>1</td><td>14</td><td>12</td><td>40.6</td><td>25.0</td><td>34.4</td><td>3.1</td><td>43.8</td><td>37.5</td></tr><td><aa/><strong>Merrimack Special Education Collaborative</strong></td><td>52</td><td>0</td><td>7</td><td>49</td><td>0</td><td>31</td><td>0</td><td>0</td><td>13.5</td><td>94.2</td><td>0.0</td><td>59.6</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Microtek</strong></td><td>15</td><td>1</td><td>15</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Minute Man ARC For Human Svs</strong></td><td>77</td><td>10</td><td>31</td><td>50</td><td>5</td><td>28</td><td>8</td><td>3</td><td>40.3</td><td>64.9</td><td>6.5</td><td>36.4</td><td>10.4</td><td>3.9</td></tr><td><aa/><strong>Morgan Memorial Goodwill</strong></td><td>158</td><td>1</td><td>31</td><td>35</td><td>138</td><td>1</td><td>41</td><td>40</td><td>19.6</td><td>22.2</td><td>87.3</td><td>0.6</td><td>25.9</td><td>25.3</td></tr><td><aa/><strong>Nemasket Group</strong></td><td>55</td><td>3</td><td>41</td><td>0</td><td>0</td><td>16</td><td>10</td><td>23</td><td>74.5</td><td>0.0</td><td>0.0</td><td>29.1</td><td>18.2</td><td>41.8</td></tr><td><aa/><strong>New England Business Associates</strong></td><td>87</td><td>0</td><td>68</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>78.2</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>New England Center for Children</strong></td><td>8</td><td>0</td><td>8</td><td>0</td><td>0</td><td>8</td><td>0</td><td>0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>100.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>New England Villages</strong></td><td>57</td><td>0</td><td>0</td><td>20</td><td>53</td><td>0</td><td>0</td><td>57</td><td>0.0</td><td>35.1</td><td>93.0</td><td>0.0</td><td>0.0</td><td>100.0</td></tr><td><aa/><strong>North Shore ARC</strong></td><td>136</td><td>4</td><td>23</td><td>63</td><td>108</td><td>3</td><td>4</td><td>117</td><td>16.9</td><td>46.3</td><td>79.4</td><td>2.2</td><td>2.9</td><td>86.0</td></tr><td><aa/><strong>North Suffolk MHA</strong></td><td>10</td><td>0</td><td>1</td><td>10</td><td>8</td><td>0</td><td>10</td><td>10</td><td>10.0</td><td>100.0</td><td>80.0</td><td>0.0</td><td>100.0</td><td>100.0</td></tr><td><aa/><strong>P R I D E   Inc</strong></td><td>79</td><td>0</td><td>77</td><td>0</td><td>0</td><td>0</td><td>0</td><td>71</td><td>97.5</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>89.9</td></tr><td><aa/><strong>Partners-In-Services  Inc</strong></td><td>3</td><td>0</td><td>3</td><td>0</td><td>0</td><td>1</td><td>0</td><td>3</td><td>100.0</td><td>0.0</td><td>0.0</td><td>33.3</td><td>0.0</td><td>100.0</td></tr><td><aa/><strong>People Inc</strong></td><td>131</td><td>0</td><td>13</td><td>19</td><td>98</td><td>35</td><td>0</td><td>124</td><td>9.9</td><td>14.5</td><td>74.8</td><td>26.7</td><td>0.0</td><td>94.7</td></tr><td><aa/><strong>Plus Company</strong></td><td>51</td><td>0</td><td>7</td><td>36</td><td>9</td><td>30</td><td>50</td><td>51</td><td>13.7</td><td>70.6</td><td>17.6</td><td>58.8</td><td>98.0</td><td>100.0</td></tr><td><aa/><strong>Polus Center for Social & Econ</strong></td><td>8</td><td>0</td><td>4</td><td>0</td><td>0</td><td>1</td><td>0</td><td>0</td><td>50.0</td><td>0.0</td><td>0.0</td><td>12.5</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Regional Employment Services</strong></td><td>48</td><td>6</td><td>40</td><td>4</td><td>0</td><td>0</td><td>6</td><td>0</td><td>83.3</td><td>8.3</td><td>0.0</td><td>0.0</td><td>12.5</td><td>0.0</td></tr><td><aa/><strong>Rehabilitative Resources</strong></td><td>6</td><td>0</td><td>6</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Riverside Industries</strong></td><td>178</td><td>9</td><td>53</td><td>50</td><td>107</td><td>24</td><td>27</td><td>4</td><td>29.8</td><td>28.1</td><td>60.1</td><td>13.5</td><td>15.2</td><td>2.2</td></tr><td><aa/><strong>Road To Responsibility</strong></td><td>307</td><td>1</td><td>49</td><td>96</td><td>274</td><td>38</td><td>5</td><td>223</td><td>16.0</td><td>31.3</td><td>89.3</td><td>12.4</td><td>1.6</td><td>72.6</td></tr><td><aa/><strong>Seven Hills Community Services</strong></td><td>12</td><td>0</td><td>7</td><td>0</td><td>0</td><td>1</td><td>0</td><td>12</td><td>58.3</td><td>0.0</td><td>0.0</td><td>8.3</td><td>0.0</td><td>100.0</td></tr><td><aa/><strong>Seven Hills Family Services</strong></td><td>167</td><td>1</td><td>24</td><td>43</td><td>122</td><td>33</td><td>78</td><td>142</td><td>14.4</td><td>25.7</td><td>73.1</td><td>19.8</td><td>46.7</td><td>85.0</td></tr><td><aa/><strong>South Eastern Ma Collab</strong></td><td>95</td><td>7</td><td>86</td><td>0</td><td>0</td><td>28</td><td>0</td><td>0</td><td>90.5</td><td>0.0</td><td>0.0</td><td>29.5</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>South Shore ARC</strong></td><td>47</td><td>4</td><td>10</td><td>5</td><td>46</td><td>3</td><td>44</td><td>45</td><td>21.3</td><td>10.6</td><td>97.9</td><td>6.4</td><td>93.6</td><td>95.7</td></tr><td><aa/><strong>Southern Worcester County ARC</strong></td><td>59</td><td>1</td><td>17</td><td>40</td><td>20</td><td>15</td><td>5</td><td>5</td><td>28.8</td><td>67.8</td><td>33.9</td><td>25.4</td><td>8.5</td><td>8.5</td></tr><td><aa/><strong>SUNSHINE VILLAGE</strong></td><td>100</td><td>0</td><td>3</td><td>25</td><td>76</td><td>0</td><td>0</td><td>82</td><td>3.0</td><td>25.0</td><td>76.0</td><td>0.0</td><td>0.0</td><td>82.0</td></tr><td><aa/><strong>T I L L</strong></td><td>16</td><td>0</td><td>0</td><td>4</td><td>0</td><td>0</td><td>0</td><td>15</td><td>0.0</td><td>25.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>93.8</td></tr><td><aa/><strong>The Arc of East Middlesex</strong></td><td>99</td><td>5</td><td>46</td><td>21</td><td>29</td><td>6</td><td>23</td><td>42</td><td>46.5</td><td>21.2</td><td>29.3</td><td>6.1</td><td>23.2</td><td>42.4</td></tr><td><aa/><strong>TRIANGLE INC</strong></td><td>126</td><td>0</td><td>4</td><td>6</td><td>124</td><td>0</td><td>0</td><td>50</td><td>3.2</td><td>4.8</td><td>98.4</td><td>0.0</td><td>0.0</td><td>39.7</td></tr><td><aa/><strong>Valley Education Associates</strong></td><td>82</td><td>0</td><td>0</td><td>26</td><td>76</td><td>0</td><td>32</td><td>0</td><td>0.0</td><td>31.7</td><td>92.7</td><td>0.0</td><td>39.0</td><td>0.0</td></tr><td><aa/><strong>Vinfen Employment Training Center</strong></td><td>48</td><td>2</td><td>7</td><td>34</td><td>0</td><td>1</td><td>48</td><td>0</td><td>14.6</td><td>70.8</td><td>0.0</td><td>2.1</td><td>100.0</td><td>0.0</td></tr><td><aa/><strong>Vinfen Gateway</strong></td><td>77</td><td>1</td><td>9</td><td>3</td><td>64</td><td>0</td><td>3</td><td>7</td><td>11.7</td><td>3.9</td><td>83.1</td><td>0.0</td><td>3.9</td><td>9.1</td></tr><td><aa/><strong>Vocational Advancement Center</strong></td><td>27</td><td>0</td><td>1</td><td>5</td><td>24</td><td>0</td><td>0</td><td>26</td><td>3.7</td><td>18.5</td><td>88.9</td><td>0.0</td><td>0.0</td><td>96.3</td></tr><td><aa/><strong>Walnut Street Center</strong></td><td>69</td><td>0</td><td>18</td><td>12</td><td>38</td><td>5</td><td>26</td><td>10</td><td>26.1</td><td>17.4</td><td>55.1</td><td>7.2</td><td>37.7</td><td>14.5</td></tr><td><aa/><strong>Waltham Committee</strong></td><td>36</td><td>2</td><td>5</td><td>32</td><td>1</td><td>28</td><td>4</td><td>32</td><td>13.9</td><td>88.9</td><td>2.8</td><td>77.8</td><td>11.1</td><td>88.9</td></tr><td><aa/><strong>Work Inc</strong></td><td>268</td><td>11</td><td>61</td><td>28</td><td>177</td><td>30</td><td>17</td><td>25</td><td>22.8</td><td>10.4</td><td>66.0</td><td>11.2</td><td>6.3</td><td>9.3</td></tr><td><aa/><strong>Work Opportunities Unlimited</strong></td><td>105</td><td>5</td><td>66</td><td>5</td><td>0</td><td>28</td><td>57</td><td>10</td><td>62.9</td><td>4.8</td><td>0.0</td><td>26.7</td><td>54.3</td><td>9.5</td></tr><td><aa/><strong>Work Opportunity Center</strong></td><td>124</td><td>6</td><td>45</td><td>0</td><td>100</td><td>3</td><td>101</td><td>95</td><td>36.3</td><td>0.0</td><td>80.6</td><td>2.4</td><td>81.5</td><td>76.6</td></tr></tbody></table><br><script type="text/javascript" src="../common/sorttable.js"></script>
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
