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
<table class="sortable" border="1"><thead><tr><th rowspan="2">Provider</th><th rowspan="2">Total Served <br>(unduplicated count)</th><th rowspan="2">Number entered a<br>new individual job in the<br>previous 12 months</th><th colspan="6" align="center">Mean hours per person participating in activity for month</th><th colspan="6" align="center">Percent of total hours in activity for month</th></tr><tr><th align="center">Individual Supported Job</th><th align="center">Group Supported Job</th><th align="center">Facility Based Work</th><th align="center">Volunteer<br>Work</th><th align="center">In Transition</th><th align="center">Other<br>Non-Paid<br>Service</th><th align="center">Individual Supported Job</th><th align="center">Group Supported Job</th><th align="center">Facility Based Work</th><th align="center">Volunteer<br>Work</th><th align="center">In Transition</th><th align="center">Other<br>Non-Paid<br>Service</th></tr></thead><tbody><td><aa/><strong>Aditus Inc.</strong></td><td>30</td><td>0</td><td>51.06</td><td>2.29</td><td></td><td></td><td></td><td></td><td>98.2</td><td>1.8</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Advocates Inc.</strong></td><td>52</td><td>1</td><td>27.63</td><td>32.00</td><td>1.50</td><td></td><td></td><td></td><td>97.6</td><td>2.3</td><td>0.1</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Alternatives Unlimited</strong></td><td>69</td><td>0</td><td>31.74</td><td>18.54</td><td></td><td></td><td></td><td></td><td>32.3</td><td>67.7</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Amego Inc.</strong></td><td>35</td><td>1</td><td>34.50</td><td>12.00</td><td>8.20</td><td></td><td></td><td></td><td>15.5</td><td>10.8</td><td>73.7</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>American Training</strong></td><td>146</td><td>11</td><td>20.89</td><td>11.68</td><td></td><td></td><td></td><td></td><td>49.9</td><td>50.1</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Attleboro Enterprises</strong></td><td>56</td><td>2</td><td>54.00</td><td>36.07</td><td>12.21</td><td></td><td></td><td></td><td>16.2</td><td>80.6</td><td>3.1</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Barry L Price Rehab Center</strong></td><td>47</td><td>3</td><td>43.00</td><td>9.34</td><td></td><td></td><td></td><td></td><td>84.0</td><td>16.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Behavioral Associates Of Mass</strong></td><td>4</td><td>0</td><td>120.00</td><td>12.00</td><td></td><td></td><td></td><td></td><td>76.9</td><td>23.1</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Berkshire County ARC</strong></td><td>114</td><td>4</td><td>53.36</td><td>70.51</td><td></td><td></td><td></td><td></td><td>21.5</td><td>78.5</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Berkshire Family & Indv Resources</strong></td><td>61</td><td>0</td><td>56.92</td><td>74.13</td><td></td><td></td><td></td><td></td><td>7.7</td><td>92.3</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Berkshire Hills Music Academy</strong></td><td>29</td><td>1</td><td>16.03</td><td>2.73</td><td></td><td></td><td></td><td></td><td>77.9</td><td>22.1</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Best Buddies Jobs</strong></td><td>23</td><td>1</td><td>78.52</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Better Community Living</strong></td><td>4</td><td>0</td><td>20.50</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Boston College</strong></td><td>17</td><td>1</td><td>88.50</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Bridgewell Inc.</strong></td><td>57</td><td>3</td><td>38.81</td><td>15.18</td><td></td><td></td><td></td><td></td><td>34.3</td><td>65.7</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Brockton Area Arc</strong></td><td>51</td><td>2</td><td>43.75</td><td>28.29</td><td></td><td></td><td></td><td></td><td>26.7</td><td>73.3</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Brockton Area Multi Services</strong></td><td>44</td><td>4</td><td>53.44</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>CapeAbilities</strong></td><td>103</td><td>0</td><td>40.29</td><td>20.37</td><td></td><td></td><td></td><td></td><td>25.9</td><td>74.1</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Cardinal Cushing Centers</strong></td><td>68</td><td>0</td><td>40.95</td><td>10.17</td><td></td><td></td><td></td><td></td><td>69.2</td><td>30.8</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Career Resources Corporation</strong></td><td>26</td><td>2</td><td>36.26</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Catholic Charities  Worcester/ Mercy Centre</strong></td><td>72</td><td>0</td><td>38.22</td><td>15.17</td><td>13.60</td><td></td><td></td><td></td><td>32.2</td><td>29.1</td><td>38.8</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Center House /Bay Cove Human Services</strong></td><td>10</td><td>0</td><td>58.20</td><td>2.00</td><td></td><td></td><td></td><td></td><td>99.0</td><td>1.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Center of Hope Foundation, Inc.</strong></td><td>155</td><td>0</td><td>51.33</td><td>52.01</td><td></td><td></td><td></td><td></td><td>17.7</td><td>82.3</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>CLASS Inc.</strong></td><td>80</td><td>9</td><td>23.69</td><td>18.75</td><td></td><td></td><td></td><td></td><td>46.3</td><td>53.7</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Collaborative for Regional Educational Services</strong></td><td>29</td><td>0</td><td>47.90</td><td>87.53</td><td></td><td></td><td></td><td></td><td>7.5</td><td>92.5</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Community Connections</strong></td><td>113</td><td>2</td><td>36.52</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Community Enterprises, Inc.</strong></td><td>212</td><td>2</td><td>61.63</td><td>38.86</td><td></td><td></td><td></td><td></td><td>79.4</td><td>20.6</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Community Options Inc.
</strong></td><td>35</td><td>0</td><td>70.80</td><td>41.53</td><td></td><td></td><td></td><td></td><td>80.2</td><td>19.8</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Community Work Services</strong></td><td>33</td><td>1</td><td>81.20</td><td>66.48</td><td></td><td></td><td></td><td></td><td>18.4</td><td>81.6</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Cooperative Production</strong></td><td>6</td><td>0</td><td>29.92</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Dr Franklin Perkins School</strong></td><td>38</td><td>1</td><td>44.57</td><td>32.63</td><td></td><td></td><td></td><td></td><td>21.5</td><td>78.5</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Eliot Community Human Service</strong></td><td>15</td><td>0</td><td>27.75</td><td>16.00</td><td></td><td></td><td></td><td></td><td>92.4</td><td>7.6</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Friendship Home Inc.</strong></td><td>47</td><td>1</td><td>27.21</td><td>16.00</td><td></td><td></td><td></td><td></td><td>92.4</td><td>7.6</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>GAAMHA Inc</strong></td><td>45</td><td>3</td><td>78.63</td><td>53.82</td><td></td><td></td><td></td><td></td><td>33.3</td><td>66.7</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Goodwill Industries-Berkshires</strong></td><td>3</td><td>0</td><td></td><td>54.49</td><td></td><td></td><td></td><td></td><td>0.0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Goodwill Industries-Springfield</strong></td><td>69</td><td>0</td><td>80.00</td><td>62.86</td><td></td><td></td><td></td><td></td><td>2.0</td><td>98.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Greater Newburyport Opportunities</strong></td><td>73</td><td>3</td><td>26.82</td><td>24.06</td><td>40.17</td><td></td><td></td><td></td><td>27.1</td><td>6.8</td><td>66.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Greater Waltham ARC</strong></td><td>31</td><td>0</td><td></td><td>83.72</td><td></td><td></td><td></td><td></td><td>0.0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>GROW Associates Inc.</strong></td><td>44</td><td>0</td><td>49.06</td><td>13.65</td><td></td><td></td><td></td><td></td><td>80.2</td><td>19.8</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Horace Mann Educational Associates</strong></td><td>163</td><td>3</td><td>42.89</td><td>13.39</td><td></td><td></td><td></td><td></td><td>30.9</td><td>69.1</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>House of Possibilities/ Yawkey</strong></td><td>1</td><td>0</td><td>18.00</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Human Resource Unlimited</strong></td><td>103</td><td>0</td><td>45.73</td><td>79.20</td><td>37.24</td><td></td><td></td><td></td><td>9.4</td><td>79.8</td><td>10.8</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Institute for Community Inclusion</strong></td><td>14</td><td>2</td><td>65.65</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Institute Of Professional Practice</strong></td><td>24</td><td>9</td><td>46.42</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Jewish Vocational Service</strong></td><td>1</td><td>0</td><td>81.00</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Justice Resource Institute</strong></td><td>88</td><td>0</td><td>42.08</td><td>19.35</td><td></td><td></td><td></td><td></td><td>45.7</td><td>54.3</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Kennedy-Donovan Center</strong></td><td>14</td><td>1</td><td>50.96</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Life-Skills, Inc. (Southern Worcester County Rehab.)</strong></td><td>48</td><td>3</td><td>24.40</td><td>37.34</td><td></td><td></td><td></td><td></td><td>6.8</td><td>93.2</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>LifeStream Inc.</strong></td><td>20</td><td>0</td><td>15.09</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Lifeworks</strong></td><td>227</td><td>16</td><td>52.10</td><td>19.46</td><td></td><td></td><td></td><td></td><td>54.9</td><td>45.1</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>M.O. L.I.F.E.</strong></td><td>20</td><td>2</td><td>43.62</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>MAB Community Services, Inc.</strong></td><td>37</td><td>0</td><td>36.38</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Meridian of Servicenet</strong></td><td>59</td><td>1</td><td>76.93</td><td>47.31</td><td>5.67</td><td></td><td></td><td></td><td>38.5</td><td>59.1</td><td>2.4</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Microtek</strong></td><td>15</td><td>0</td><td>100.27</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Minute Man Arc</strong></td><td>72</td><td>4</td><td>54.43</td><td>36.35</td><td></td><td></td><td></td><td></td><td>51.9</td><td>48.1</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Morgan Memorial Goodwill</strong></td><td>131</td><td>1</td><td>61.62</td><td>49.81</td><td></td><td></td><td></td><td></td><td>27.2</td><td>72.8</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Nemasket Group</strong></td><td>47</td><td>0</td><td>31.99</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>New England Business Associates</strong></td><td>77</td><td>0</td><td>48.71</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>New England Center for Children, Inc.</strong></td><td>6</td><td>0</td><td>72.74</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>New England Village</strong></td><td>48</td><td>0</td><td>36.32</td><td>40.07</td><td></td><td></td><td></td><td></td><td>37.0</td><td>63.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Northeast ARC/ Heritage Industries</strong></td><td>113</td><td>12</td><td>44.58</td><td>34.17</td><td></td><td></td><td></td><td></td><td>40.2</td><td>59.8</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Nupath</strong></td><td>57</td><td>7</td><td>42.60</td><td>29.85</td><td></td><td></td><td></td><td></td><td>46.4</td><td>53.6</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>People Inc.</strong></td><td>101</td><td>10</td><td>37.56</td><td>29.89</td><td></td><td></td><td></td><td></td><td>46.4</td><td>53.6</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Plus Company</strong></td><td>59</td><td>0</td><td>43.40</td><td>14.83</td><td></td><td></td><td></td><td></td><td>84.7</td><td>15.3</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>PRIDE Inc.</strong></td><td>62</td><td>2</td><td>23.67</td><td>37.58</td><td>47.98</td><td></td><td></td><td></td><td>13.6</td><td>10.0</td><td>76.4</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Regional Employment Services</strong></td><td>83</td><td>18</td><td>61.08</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Rehabilitative Resources</strong></td><td>5</td><td>0</td><td>65.50</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Riverside Industries</strong></td><td>165</td><td>2</td><td>58.53</td><td>45.20</td><td>31.17</td><td></td><td></td><td></td><td>16.9</td><td>65.2</td><td>18.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Road To Responsibility</strong></td><td>298</td><td>0</td><td>54.67</td><td>16.45</td><td>19.92</td><td></td><td></td><td></td><td>25.4</td><td>26.3</td><td>48.4</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Seven Hills Family Services</strong></td><td>210</td><td>1</td><td>67.80</td><td>24.25</td><td></td><td></td><td></td><td></td><td>58.9</td><td>41.1</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>South Shore ARC</strong></td><td>20</td><td>0</td><td>45.92</td><td>7.31</td><td></td><td></td><td></td><td></td><td>82.5</td><td>17.5</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Southeastern Massachusetts Educational Collaborative</strong></td><td>108</td><td>5</td><td>34.92</td><td></td><td></td><td></td><td></td><td></td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>SUNSHINE VILLAGE</strong></td><td>82</td><td>5</td><td>25.00</td><td>58.55</td><td></td><td></td><td></td><td></td><td>4.6</td><td>95.4</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>The Arc of East Middlesex</strong></td><td>91</td><td>3</td><td>27.52</td><td>12.72</td><td></td><td></td><td></td><td></td><td>75.8</td><td>24.2</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>The ARC of Greater Plymouth</strong></td><td>56</td><td>0</td><td>43.50</td><td>42.36</td><td></td><td></td><td></td><td></td><td>49.3</td><td>50.7</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>The Arc of Opportunity</strong></td><td>54</td><td>3</td><td>51.96</td><td>38.28</td><td></td><td></td><td></td><td></td><td>27.0</td><td>73.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>The Charles River Center/ Charles River ARC</strong></td><td>50</td><td>1</td><td>55.53</td><td>10.53</td><td></td><td></td><td></td><td></td><td>76.4</td><td>23.6</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>TILL</strong></td><td>11</td><td>0</td><td>24.00</td><td>38.67</td><td></td><td></td><td></td><td></td><td>12.1</td><td>87.9</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Triangle Inc.</strong></td><td>160</td><td>8</td><td>51.28</td><td>17.59</td><td></td><td></td><td></td><td></td><td>67.6</td><td>32.4</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Valley Collaborative</strong></td><td>70</td><td>8</td><td>41.56</td><td>39.25</td><td></td><td></td><td></td><td></td><td>22.2</td><td>77.8</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Valley Educational  Associates</strong></td><td>94</td><td>0</td><td></td><td>24.56</td><td>9.25</td><td></td><td></td><td></td><td>0.0</td><td>70.6</td><td>29.4</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Vinfen Employment Training Center</strong></td><td>23</td><td>0</td><td>24.34</td><td>4.70</td><td></td><td></td><td></td><td></td><td>73.4</td><td>26.6</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Vinfen Gateway Arts</strong></td><td>57</td><td>0</td><td></td><td>90.95</td><td></td><td></td><td></td><td></td><td>0.0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Vocational Advancement</strong></td><td>5</td><td>0</td><td>14.00</td><td>53.30</td><td></td><td></td><td></td><td></td><td>5.0</td><td>95.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Walnut Street Center</strong></td><td>46</td><td>0</td><td>58.67</td><td>26.17</td><td>32.78</td><td></td><td></td><td></td><td>10.5</td><td>9.4</td><td>80.1</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Waltham Committee Inc.</strong></td><td>49</td><td>1</td><td>71.67</td><td>14.93</td><td></td><td></td><td></td><td></td><td>23.5</td><td>76.5</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Work Inc.</strong></td><td>295</td><td>21</td><td>60.56</td><td>170.72</td><td></td><td></td><td></td><td></td><td>48.9</td><td>51.1</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Work Opportunities Unlimited</strong></td><td>184</td><td>31</td><td>56.38</td><td></td><td>4.00</td><td></td><td></td><td></td><td>99.9</td><td>0.0</td><td>0.1</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Work Opportunity Center, Inc.</strong></td><td>95</td><td>2</td><td>42.15</td><td>41.81</td><td>48.34</td><td></td><td></td><td></td><td>39.7</td><td>24.2</td><td>36.1</td><td>0.0</td><td>0.0</td><td>0.0</td></tr></tbody></table><br><script type="text/javascript" src="../common/sorttable.js"></script>
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
