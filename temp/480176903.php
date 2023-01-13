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
	<h1>Provider Report for 2017</h1>
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
<table class="sortable" border="1"><thead><tr><th rowspan="2">Provider</th><th rowspan="2">Total Served<br>(unduplicated count)</th><th rowspan="2">Number entered a <BR>new individual job in the <br />previous 12 months</th><th colspan="5" align="center">Number Participating in activity</th><th colspan="5" align="center">Percent participating in activity</th></tr><tr><th align="center">Individual Competitive Employment</th><th align="center">Group Integrated Employment</th><th align="center">Self Employment</th><th align="center">Job Search</th><th align="center">Other day support wrap-around services</th><th align="center">Individual Competitive Employment</th><th align="center">Group Integrated Employment</th><th align="center">Self Employment</th><th align="center">Job Search</th><th align="center">Other day support wrap-around services</th></tr></thead><tbody><td><aa/><strong>Aditus Inc.</strong></td><td>26</td><td>0</td><td>14</td><td>6</td><td>0</td><td>24</td><td>14</td><td>53.8</td><td>23.1</td><td>0.0</td><td>92.3</td><td>53.8</td></tr><td><aa/><strong>Advocates Inc.</strong></td><td>48</td><td>0</td><td>47</td><td>0</td><td>1</td><td>2</td><td>37</td><td>97.9</td><td>0.0</td><td>2.1</td><td>4.2</td><td>77.1</td></tr><td><aa/><strong>Alternatives Unlimited</strong></td><td>70</td><td>3</td><td>16</td><td>63</td><td>0</td><td>57</td><td>52</td><td>22.9</td><td>90.0</td><td>0.0</td><td>81.4</td><td>74.3</td></tr><td><aa/><strong>Amego Inc.</strong></td><td>36</td><td>0</td><td>2</td><td>15</td><td>0</td><td>36</td><td>35</td><td>5.6</td><td>41.7</td><td>0.0</td><td>100.0</td><td>97.2</td></tr><td><aa/><strong>American Training</strong></td><td>238</td><td>1</td><td>46</td><td>52</td><td>0</td><td>235</td><td>237</td><td>19.3</td><td>21.8</td><td>0.0</td><td>98.7</td><td>99.6</td></tr><td><aa/><strong>Attleboro Enterprises</strong></td><td>60</td><td>0</td><td>6</td><td>57</td><td>0</td><td>18</td><td>25</td><td>10.0</td><td>95.0</td><td>0.0</td><td>30.0</td><td>41.7</td></tr><td><aa/><strong>Barry L Price Rehab Center</strong></td><td>48</td><td>1</td><td>22</td><td>24</td><td>0</td><td>28</td><td>43</td><td>45.8</td><td>50.0</td><td>0.0</td><td>58.3</td><td>89.6</td></tr><td><aa/><strong>Behavioral Associates Of Mass</strong></td><td>4</td><td>0</td><td>1</td><td>3</td><td>0</td><td>1</td><td>0</td><td>25.0</td><td>75.0</td><td>0.0</td><td>25.0</td><td>0.0</td></tr><td><aa/><strong>Berkshire County ARC</strong></td><td>113</td><td>3</td><td>39</td><td>76</td><td>0</td><td>9</td><td>11</td><td>34.5</td><td>67.3</td><td>0.0</td><td>8.0</td><td>9.7</td></tr><td><aa/><strong>Berkshire Family & Indv Resources</strong></td><td>54</td><td>0</td><td>8</td><td>44</td><td>0</td><td>53</td><td>7</td><td>14.8</td><td>81.5</td><td>0.0</td><td>98.1</td><td>13.0</td></tr><td><aa/><strong>Berkshire Hills Music Academy</strong></td><td>29</td><td>2</td><td>11</td><td>14</td><td>0</td><td>28</td><td>29</td><td>37.9</td><td>48.3</td><td>0.0</td><td>96.6</td><td>100.0</td></tr><td><aa/><strong>Best Buddies Jobs</strong></td><td>23</td><td>1</td><td>23</td><td>0</td><td>0</td><td>3</td><td>1</td><td>100.0</td><td>0.0</td><td>0.0</td><td>13.0</td><td>4.3</td></tr><td><aa/><strong>Better Community Living</strong></td><td>4</td><td>0</td><td>4</td><td>0</td><td>0</td><td>1</td><td>4</td><td>100.0</td><td>0.0</td><td>0.0</td><td>25.0</td><td>100.0</td></tr><td><aa/><strong>Boston College</strong></td><td>18</td><td>1</td><td>17</td><td>0</td><td>0</td><td>0</td><td>0</td><td>94.4</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Bridgewell Inc.</strong></td><td>54</td><td>1</td><td>5</td><td>50</td><td>0</td><td>35</td><td>54</td><td>9.3</td><td>92.6</td><td>0.0</td><td>64.8</td><td>100.0</td></tr><td><aa/><strong>Brockton Area Arc</strong></td><td>57</td><td>4</td><td>12</td><td>34</td><td>0</td><td>39</td><td>51</td><td>21.1</td><td>59.6</td><td>0.0</td><td>68.4</td><td>89.5</td></tr><td><aa/><strong>Brockton Area Multi Services</strong></td><td>45</td><td>2</td><td>33</td><td>0</td><td>0</td><td>28</td><td>25</td><td>73.3</td><td>0.0</td><td>0.0</td><td>62.2</td><td>55.6</td></tr><td><aa/><strong>CapeAbilities</strong></td><td>90</td><td>0</td><td>24</td><td>71</td><td>0</td><td>54</td><td>1</td><td>26.7</td><td>78.9</td><td>0.0</td><td>60.0</td><td>1.1</td></tr><td><aa/><strong>Cardinal Cushing Centers</strong></td><td>69</td><td>0</td><td>32</td><td>38</td><td>0</td><td>11</td><td>68</td><td>46.4</td><td>55.1</td><td>0.0</td><td>15.9</td><td>98.6</td></tr><td><aa/><strong>Career Resources Corporation</strong></td><td>26</td><td>0</td><td>22</td><td>3</td><td>0</td><td>6</td><td>21</td><td>84.6</td><td>11.5</td><td>0.0</td><td>23.1</td><td>80.8</td></tr><td><aa/><strong>Catholic Charities  Worcester/ Mercy Centre</strong></td><td>67</td><td>1</td><td>18</td><td>42</td><td>0</td><td>4</td><td>11</td><td>26.9</td><td>62.7</td><td>0.0</td><td>6.0</td><td>16.4</td></tr><td><aa/><strong>Center House /Bay Cove Human Services</strong></td><td>12</td><td>0</td><td>11</td><td>6</td><td>0</td><td>0</td><td>8</td><td>91.7</td><td>50.0</td><td>0.0</td><td>0.0</td><td>66.7</td></tr><td><aa/><strong>Center of Hope Foundation, Inc.</strong></td><td>150</td><td>0</td><td>15</td><td>128</td><td>0</td><td>148</td><td>89</td><td>10.0</td><td>85.3</td><td>0.0</td><td>98.7</td><td>59.3</td></tr><td><aa/><strong>CLASS Inc.</strong></td><td>139</td><td>2</td><td>32</td><td>39</td><td>1</td><td>8</td><td>123</td><td>23.0</td><td>28.1</td><td>0.7</td><td>5.8</td><td>88.5</td></tr><td><aa/><strong>Collaborative for Regional Educational Services</strong></td><td>27</td><td>0</td><td>4</td><td>26</td><td>0</td><td>6</td><td>0</td><td>14.8</td><td>96.3</td><td>0.0</td><td>22.2</td><td>0.0</td></tr><td><aa/><strong>Community Connections</strong></td><td>122</td><td>3</td><td>96</td><td>0</td><td>0</td><td>13</td><td>80</td><td>78.7</td><td>0.0</td><td>0.0</td><td>10.7</td><td>65.6</td></tr><td><aa/><strong>Community Enterprises, Inc.</strong></td><td>242</td><td>24</td><td>129</td><td>55</td><td>0</td><td>109</td><td>96</td><td>53.3</td><td>22.7</td><td>0.0</td><td>45.0</td><td>39.7</td></tr><td><aa/><strong>Community Options Inc.</strong></td><td>35</td><td>0</td><td>15</td><td>7</td><td>1</td><td>8</td><td>16</td><td>42.9</td><td>20.0</td><td>2.9</td><td>22.9</td><td>45.7</td></tr><td><aa/><strong>Community Work Services</strong></td><td>33</td><td>2</td><td>11</td><td>23</td><td>0</td><td>27</td><td>22</td><td>33.3</td><td>69.7</td><td>0.0</td><td>81.8</td><td>66.7</td></tr><td><aa/><strong>Cooperative Production</strong></td><td>6</td><td>0</td><td>4</td><td>1</td><td>1</td><td>2</td><td>5</td><td>66.7</td><td>16.7</td><td>16.7</td><td>33.3</td><td>83.3</td></tr><td><aa/><strong>Dr Franklin Perkins School</strong></td><td>54</td><td>0</td><td>6</td><td>50</td><td>0</td><td>2</td><td>1</td><td>11.1</td><td>92.6</td><td>0.0</td><td>3.7</td><td>1.9</td></tr><td><aa/><strong>Eliot Community Human Service</strong></td><td>13</td><td>0</td><td>10</td><td>7</td><td>0</td><td>13</td><td>12</td><td>76.9</td><td>53.8</td><td>0.0</td><td>100.0</td><td>92.3</td></tr><td><aa/><strong>Friendship Home Inc.</strong></td><td>44</td><td>3</td><td>36</td><td>0</td><td>0</td><td>3</td><td>3</td><td>81.8</td><td>0.0</td><td>0.0</td><td>6.8</td><td>6.8</td></tr><td><aa/><strong>GAAMHA Inc</strong></td><td>54</td><td>1</td><td>13</td><td>37</td><td>0</td><td>9</td><td>38</td><td>24.1</td><td>68.5</td><td>0.0</td><td>16.7</td><td>70.4</td></tr><td><aa/><strong>Goodwill Industries-Berkshires</strong></td><td>4</td><td>0</td><td>0</td><td>4</td><td>0</td><td>2</td><td>1</td><td>0.0</td><td>100.0</td><td>0.0</td><td>50.0</td><td>25.0</td></tr><td><aa/><strong>Greater Newburyport Opportunities</strong></td><td>75</td><td>1</td><td>36</td><td>42</td><td>0</td><td>54</td><td>38</td><td>48.0</td><td>56.0</td><td>0.0</td><td>72.0</td><td>50.7</td></tr><td><aa/><strong>Greater Waltham ARC</strong></td><td>31</td><td>0</td><td>0</td><td>26</td><td>0</td><td>0</td><td>14</td><td>0.0</td><td>83.9</td><td>0.0</td><td>0.0</td><td>45.2</td></tr><td><aa/><strong>GROW Associates Inc.</strong></td><td>43</td><td>4</td><td>30</td><td>21</td><td>0</td><td>43</td><td>3</td><td>69.8</td><td>48.8</td><td>0.0</td><td>100.0</td><td>7.0</td></tr><td><aa/><strong>Horace Mann Educational Associates</strong></td><td>165</td><td>2</td><td>27</td><td>141</td><td>0</td><td>165</td><td>163</td><td>16.4</td><td>85.5</td><td>0.0</td><td>100.0</td><td>98.8</td></tr><td><aa/><strong>Human Resource Unlimited</strong></td><td>91</td><td>0</td><td>6</td><td>49</td><td>0</td><td>0</td><td>0</td><td>6.6</td><td>53.8</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Institute Of Professional Practice</strong></td><td>20</td><td>5</td><td>14</td><td>0</td><td>0</td><td>13</td><td>8</td><td>70.0</td><td>0.0</td><td>0.0</td><td>65.0</td><td>40.0</td></tr><td><aa/><strong>Jewish Vocational Service</strong></td><td>1</td><td>0</td><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Justice Resource Institute</strong></td><td>85</td><td>0</td><td>12</td><td>25</td><td>0</td><td>12</td><td>71</td><td>14.1</td><td>29.4</td><td>0.0</td><td>14.1</td><td>83.5</td></tr><td><aa/><strong>Kennedy-Donovan Center</strong></td><td>14</td><td>2</td><td>11</td><td>0</td><td>0</td><td>5</td><td>5</td><td>78.6</td><td>0.0</td><td>0.0</td><td>35.7</td><td>35.7</td></tr><td><aa/><strong>Life-Skills, Inc. (Southern Worcester County Rehab.)</strong></td><td>52</td><td>3</td><td>7</td><td>50</td><td>0</td><td>36</td><td>42</td><td>13.5</td><td>96.2</td><td>0.0</td><td>69.2</td><td>80.8</td></tr><td><aa/><strong>LifeStream Inc.</strong></td><td>21</td><td>3</td><td>20</td><td>0</td><td>0</td><td>19</td><td>21</td><td>95.2</td><td>0.0</td><td>0.0</td><td>90.5</td><td>100.0</td></tr><td><aa/><strong>Lifeworks</strong></td><td>225</td><td>12</td><td>74</td><td>169</td><td>0</td><td>39</td><td>184</td><td>32.9</td><td>75.1</td><td>0.0</td><td>17.3</td><td>81.8</td></tr><td><aa/><strong>M.O. L.I.F.E.</strong></td><td>24</td><td>1</td><td>17</td><td>0</td><td>0</td><td>7</td><td>23</td><td>70.8</td><td>0.0</td><td>0.0</td><td>29.2</td><td>95.8</td></tr><td><aa/><strong>MAB Community Services, Inc.</strong></td><td>32</td><td>0</td><td>4</td><td>0</td><td>0</td><td>6</td><td>32</td><td>12.5</td><td>0.0</td><td>0.0</td><td>18.8</td><td>100.0</td></tr><td><aa/><strong>Meridian of Servicenet</strong></td><td>67</td><td>0</td><td>20</td><td>38</td><td>0</td><td>4</td><td>13</td><td>29.9</td><td>56.7</td><td>0.0</td><td>6.0</td><td>19.4</td></tr><td><aa/><strong>Microtek</strong></td><td>14</td><td>0</td><td>14</td><td>0</td><td>0</td><td>0</td><td>0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Minute Man Arc</strong></td><td>74</td><td>3</td><td>30</td><td>54</td><td>0</td><td>24</td><td>59</td><td>40.5</td><td>73.0</td><td>0.0</td><td>32.4</td><td>79.7</td></tr><td><aa/><strong>Morgan Memorial Goodwill</strong></td><td>147</td><td>8</td><td>44</td><td>87</td><td>0</td><td>50</td><td>48</td><td>29.9</td><td>59.2</td><td>0.0</td><td>34.0</td><td>32.7</td></tr><td><aa/><strong>Nemasket Group</strong></td><td>43</td><td>1</td><td>33</td><td>0</td><td>1</td><td>13</td><td>27</td><td>76.7</td><td>0.0</td><td>2.3</td><td>30.2</td><td>62.8</td></tr><td><aa/><strong>New England Business Associates</strong></td><td>81</td><td>11</td><td>59</td><td>0</td><td>1</td><td>26</td><td>0</td><td>72.8</td><td>0.0</td><td>1.2</td><td>32.1</td><td>0.0</td></tr><td><aa/><strong>New England Center for Children, Inc.</strong></td><td>6</td><td>0</td><td>4</td><td>2</td><td>0</td><td>1</td><td>3</td><td>66.7</td><td>33.3</td><td>0.0</td><td>16.7</td><td>50.0</td></tr><td><aa/><strong>New England Village</strong></td><td>35</td><td>1</td><td>15</td><td>15</td><td>0</td><td>14</td><td>32</td><td>42.9</td><td>42.9</td><td>0.0</td><td>40.0</td><td>91.4</td></tr><td><aa/><strong>Northeast ARC/ Heritage Industries</strong></td><td>121</td><td>13</td><td>42</td><td>74</td><td>0</td><td>63</td><td>95</td><td>34.7</td><td>61.2</td><td>0.0</td><td>52.1</td><td>78.5</td></tr><td><aa/><strong>Nupath</strong></td><td>54</td><td>12</td><td>20</td><td>33</td><td>0</td><td>50</td><td>49</td><td>37.0</td><td>61.1</td><td>0.0</td><td>92.6</td><td>90.7</td></tr><td><aa/><strong>People Inc.</strong></td><td>106</td><td>0</td><td>49</td><td>64</td><td>0</td><td>60</td><td>80</td><td>46.2</td><td>60.4</td><td>0.0</td><td>56.6</td><td>75.5</td></tr><td><aa/><strong>Plus Company</strong></td><td>64</td><td>0</td><td>32</td><td>24</td><td>0</td><td>62</td><td>62</td><td>50.0</td><td>37.5</td><td>0.0</td><td>96.9</td><td>96.9</td></tr><td><aa/><strong>PRIDE Inc.</strong></td><td>64</td><td>0</td><td>5</td><td>33</td><td>0</td><td>34</td><td>52</td><td>7.8</td><td>51.6</td><td>0.0</td><td>53.1</td><td>81.3</td></tr><td><aa/><strong>Regional Employment Services</strong></td><td>83</td><td>17</td><td>72</td><td>0</td><td>0</td><td>17</td><td>11</td><td>86.7</td><td>0.0</td><td>0.0</td><td>20.5</td><td>13.3</td></tr><td><aa/><strong>Rehabilitative Resources</strong></td><td>4</td><td>0</td><td>3</td><td>0</td><td>1</td><td>0</td><td>2</td><td>75.0</td><td>0.0</td><td>25.0</td><td>0.0</td><td>50.0</td></tr><td><aa/><strong>Riverside Industries</strong></td><td>164</td><td>0</td><td>16</td><td>81</td><td>0</td><td>4</td><td>99</td><td>9.8</td><td>49.4</td><td>0.0</td><td>2.4</td><td>60.4</td></tr><td><aa/><strong>Road To Responsibility</strong></td><td>287</td><td>2</td><td>43</td><td>97</td><td>0</td><td>25</td><td>265</td><td>15.0</td><td>33.8</td><td>0.0</td><td>8.7</td><td>92.3</td></tr><td><aa/><strong>Seven Hills Family Services</strong></td><td>201</td><td>4</td><td>25</td><td>46</td><td>0</td><td>1</td><td>180</td><td>12.4</td><td>22.9</td><td>0.0</td><td>0.5</td><td>89.6</td></tr><td><aa/><strong>South Shore ARC</strong></td><td>16</td><td>0</td><td>6</td><td>10</td><td>0</td><td>15</td><td>16</td><td>37.5</td><td>62.5</td><td>0.0</td><td>93.8</td><td>100.0</td></tr><td><aa/><strong>Southeastern Massachusetts Educational Collaborative</strong></td><td>101</td><td>0</td><td>96</td><td>0</td><td>0</td><td>86</td><td>89</td><td>95.0</td><td>0.0</td><td>0.0</td><td>85.1</td><td>88.1</td></tr><td><aa/><strong>SUNSHINE VILLAGE</strong></td><td>135</td><td>6</td><td>11</td><td>51</td><td>0</td><td>1</td><td>97</td><td>8.1</td><td>37.8</td><td>0.0</td><td>0.7</td><td>71.9</td></tr><td><aa/><strong>The Arc of East Middlesex</strong></td><td>76</td><td>1</td><td>43</td><td>26</td><td>0</td><td>31</td><td>71</td><td>56.6</td><td>34.2</td><td>0.0</td><td>40.8</td><td>93.4</td></tr><td><aa/><strong>The ARC of Greater Plymouth</strong></td><td>60</td><td>2</td><td>29</td><td>8</td><td>0</td><td>54</td><td>58</td><td>48.3</td><td>13.3</td><td>0.0</td><td>90.0</td><td>96.7</td></tr><td><aa/><strong>The Arc of Opportunity</strong></td><td>53</td><td>0</td><td>5</td><td>29</td><td>0</td><td>0</td><td>43</td><td>9.4</td><td>54.7</td><td>0.0</td><td>0.0</td><td>81.1</td></tr><td><aa/><strong>The Charles River Center/ Charles River ARC</strong></td><td>169</td><td>3</td><td>31</td><td>104</td><td>0</td><td>83</td><td>158</td><td>18.3</td><td>61.5</td><td>0.0</td><td>49.1</td><td>93.5</td></tr><td><aa/><strong>TILL</strong></td><td>11</td><td>1</td><td>2</td><td>9</td><td>0</td><td>0</td><td>11</td><td>18.2</td><td>81.8</td><td>0.0</td><td>0.0</td><td>100.0</td></tr><td><aa/><strong>Triangle Inc.</strong></td><td>161</td><td>1</td><td>44</td><td>86</td><td>0</td><td>141</td><td>150</td><td>27.3</td><td>53.4</td><td>0.0</td><td>87.6</td><td>93.2</td></tr><td><aa/><strong>Valley Collaborative</strong></td><td>82</td><td>0</td><td>17</td><td>73</td><td>0</td><td>80</td><td>78</td><td>20.7</td><td>89.0</td><td>0.0</td><td>97.6</td><td>95.1</td></tr><td><aa/><strong>Valley Educational  Associates</strong></td><td>87</td><td>0</td><td>0</td><td>24</td><td>0</td><td>38</td><td>84</td><td>0.0</td><td>27.6</td><td>0.0</td><td>43.7</td><td>96.6</td></tr><td><aa/><strong>Vinfen Employment Training Center</strong></td><td>24</td><td>1</td><td>6</td><td>16</td><td>0</td><td>23</td><td>1</td><td>25.0</td><td>66.7</td><td>0.0</td><td>95.8</td><td>4.2</td></tr><td><aa/><strong>Vinfen Gateway Arts</strong></td><td>63</td><td>0</td><td>0</td><td>63</td><td>0</td><td>0</td><td>0</td><td>0.0</td><td>100.0</td><td>0.0</td><td>0.0</td><td>0.0</td></tr><td><aa/><strong>Vocational Advancement</strong></td><td>8</td><td>0</td><td>0</td><td>8</td><td>0</td><td>4</td><td>5</td><td>0.0</td><td>100.0</td><td>0.0</td><td>50.0</td><td>62.5</td></tr><td><aa/><strong>Walnut Street Center</strong></td><td>46</td><td>0</td><td>0</td><td>41</td><td>0</td><td>45</td><td>27</td><td>0.0</td><td>89.1</td><td>0.0</td><td>97.8</td><td>58.7</td></tr><td><aa/><strong>Waltham Committee Inc.</strong></td><td>11</td><td>3</td><td>4</td><td>8</td><td>0</td><td>11</td><td>10</td><td>36.4</td><td>72.7</td><td>0.0</td><td>100.0</td><td>90.9</td></tr><td><aa/><strong>Work Inc.</strong></td><td>259</td><td>18</td><td>86</td><td>62</td><td>0</td><td>63</td><td>156</td><td>33.2</td><td>23.9</td><td>0.0</td><td>24.3</td><td>60.2</td></tr><td><aa/><strong>Work Opportunities Unlimited</strong></td><td>276</td><td>39</td><td>194</td><td>2</td><td>3</td><td>120</td><td>57</td><td>70.3</td><td>0.7</td><td>1.1</td><td>43.5</td><td>20.7</td></tr><td><aa/><strong>Work Opportunity Center, Inc.</strong></td><td>92</td><td>1</td><td>45</td><td>50</td><td>0</td><td>36</td><td>72</td><td>48.9</td><td>54.3</td><td>0.0</td><td>39.1</td><td>78.3</td></tr></tbody></table><br><script type="text/javascript" src="../common/sorttable.js"></script>
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
