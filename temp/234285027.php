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
	<img src="images/em1_mary.png" alt="emplyment first Maryland" style="max-width:150px; float:left; padding-right:2em; "></a><h1>Provider Report: Wages Over Two Weeks by Activity - Reporting Period: May 2018 - for all region, all counties</h1>
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
<form class="printbut clearfix" action="charts/provider_2.php" method="post"><input type="hidden" name="print" value="1" />     <input type="hidden" name="y" value="May 2018" /><input type="hidden" name="r" value="all" /><input type="hidden" name="ao" value="0" /><input type="hidden" name="age[from]" value="0" /><input type="hidden" name="age[to]" value="0" /><input type="hidden" name="report" value="wage" /><input type="submit" name="submit" value="Click for print-friendly version" /></form><table id="tablehold" class="sortable" border="1"><thead><tr><th rowspan="2">Provider</th><th rowspan="2">Total Served<br />(unduplicated count)</th><th colspan="4" align="center">Mean wage for reporting period</th><th colspan="4" align="center">Total wages for reporting period</th></tr><tr><th align="center">Individual<br />competitive<br />job</th><th align="center">Individual contracted job</th><th align="center">Group<br />integrated<br />job</th><th align="center">Facility based job</td><th align="center">Individual<br />competitive<br />job</th><th align="center">Individual contracted job</th><th align="center">Group<br />integrated<br />job</th><th align="center">Facility based job</td></thead><tbody><td><aa/><strong>A.C.C./F.X. GALLAGHER</strong></td><td>165</td><td>353.72</td><td>296.00</td><td>96.26</td><td>197.50</td><td>4,598.30</td><td>592.00</td><td>770.06</td><td>2,172.50</td></tr><td><aa/><strong>ABILITIES NETWORK</strong></td><td>247</td><td>572.87</td><td>0</td><td>0</td><td>0</td><td>105,980.90</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>ALLIANCE</strong></td><td>141</td><td>422.46</td><td>366.45</td><td>370.00</td><td>0</td><td>21,968.05</td><td>8,428.36</td><td>740.00</td><td>0.00</td></tr><td><aa/><strong>APPALACHIAN PARENT ASSN</strong></td><td>70</td><td>145.08</td><td>166.50</td><td>144.20</td><td>59.10</td><td>580.34</td><td>999.01</td><td>1,730.36</td><td>1,950.31</td></tr><td><aa/><strong>ARC OF CARROLL COUNTY INC</strong></td><td>134</td><td>281.98</td><td>0</td><td>85.72</td><td>0</td><td>12,689.13</td><td>0.00</td><td>2,571.50</td><td>0.00</td></tr><td><aa/><strong>ARC OF FREDERICK COUNTY</strong></td><td>35</td><td>319.63</td><td>0</td><td>0</td><td>0</td><td>9,588.79</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>ARC OF MONTGOMERY COUNTY INC</strong></td><td>234</td><td>412.96</td><td>495.94</td><td>262.25</td><td>0</td><td>7,020.29</td><td>1,983.75</td><td>13,637.04</td><td>0.00</td></tr><td><aa/><strong>ARC OF NORTHERN CHESAPEAKE</strong></td><td>215</td><td>422.03</td><td>393.45</td><td>262.68</td><td>0</td><td>32,918.42</td><td>3,147.60</td><td>8,668.29</td><td>0.00</td></tr><td><aa/><strong>ARC OF PRINCE GEORGES CO INC</strong></td><td>392</td><td>756.10</td><td>0</td><td>396.39</td><td>0</td><td>55,951.40</td><td>0.00</td><td>2,774.75</td><td>0.00</td></tr><td><aa/><strong>ARC OF SOUTHERN MARYLAND INC</strong></td><td>206</td><td>335.24</td><td>98.80</td><td>219.13</td><td>105.73</td><td>20,784.74</td><td>1,086.85</td><td>1,533.89</td><td>1,691.75</td></tr><td><aa/><strong>ARC/WASHINGTON CO.</strong></td><td>198</td><td>225.68</td><td>0</td><td>0</td><td>36.84</td><td>6,319.10</td><td>0.00</td><td>0.00</td><td>2,247.25</td></tr><td><aa/><strong>ARDMORE ENTERPRISES</strong></td><td>166</td><td>433.92</td><td>0</td><td>0</td><td>0</td><td>5,207.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>ATHELAS INSTITUTE</strong></td><td>274</td><td>458.86</td><td>0</td><td>99.35</td><td>47.02</td><td>16,060.20</td><td>0.00</td><td>2,483.80</td><td>3,479.72</td></tr><td><aa/><strong>BAY COMMUNITY SUPPORT SERVICES, INC.</strong></td><td>45</td><td>479.50</td><td>0</td><td>0</td><td>0</td><td>17,261.98</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>BAY SHORE SERVICES, INC.</strong></td><td>36</td><td>453.26</td><td>0</td><td>0</td><td>471.76</td><td>3,626.05</td><td>0.00</td><td>0.00</td><td>471.76</td></tr><td><aa/><strong>BAYSIDE COMMUNITY NETWORK</strong></td><td>179</td><td>444.86</td><td>139.00</td><td>444.86</td><td>83.86</td><td>9,342.00</td><td>139.00</td><td>9,342.00</td><td>7,296.00</td></tr><td><aa/><strong>BELLO MACHRE</strong></td><td>17</td><td>288.97</td><td>0</td><td>0</td><td>0</td><td>866.90</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>BENCHMARK HUMAN SERVICES</strong></td><td>11</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>BENEDICTINE SCHOOL</strong></td><td>105</td><td>243.44</td><td>0</td><td>93.05</td><td>90.41</td><td>8,763.74</td><td>0.00</td><td>2,512.31</td><td>5,153.62</td></tr><td><aa/><strong>CALMRA, INC.</strong></td><td>23</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>CALVERT CO OFFICE ON AGING</strong></td><td>10</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>CARROLL CO. BUREAU OF AGING AND DISABILITIES</strong></td><td>25</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>CBAI</strong></td><td>101</td><td>612.00</td><td>309.20</td><td>0</td><td>224.64</td><td>1,836.00</td><td>14,841.65</td><td>0.00</td><td>1,572.50</td></tr><td><aa/><strong>CENTER FOR COMMUNITY INTEGRATION, INC</strong></td><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>CENTER FOR SOCIAL CHANGE</strong></td><td>75</td><td>490.80</td><td>0</td><td>808.00</td><td>107.07</td><td>1,963.20</td><td>0.00</td><td>1,616.00</td><td>3,533.36</td></tr><td><aa/><strong>CERENITY, INC.</strong></td><td>25</td><td>308.33</td><td>240.00</td><td>0</td><td>0</td><td>925.00</td><td>240.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>CHANGE, INC.</strong></td><td>128</td><td>320.52</td><td>25.44</td><td>17.00</td><td>0</td><td>7,051.50</td><td>50.88</td><td>102.00</td><td>0.00</td></tr><td><aa/><strong>CHESAPEAKE CARE RESOURCES</strong></td><td>39</td><td>74.00</td><td>232.04</td><td>0</td><td>0</td><td>74.00</td><td>464.08</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>CHESAPEAKE DEVELOPMENTAL UNIT</strong></td><td>88</td><td>226.15</td><td>0</td><td>0</td><td>165.57</td><td>2,035.35</td><td>0.00</td><td>0.00</td><td>12,252.19</td></tr><td><aa/><strong>CHESTERWYE CENTER</strong></td><td>48</td><td>217.25</td><td>0</td><td>75.41</td><td>37.83</td><td>869.00</td><td>0.00</td><td>452.47</td><td>680.95</td></tr><td><aa/><strong>CHI CENTER </strong></td><td>296</td><td>398.17</td><td>291.77</td><td>280.37</td><td>184.00</td><td>10,352.46</td><td>14,004.85</td><td>841.10</td><td>368.00</td></tr><td><aa/><strong>CHIMES INC.</strong></td><td>392</td><td>503.72</td><td>0</td><td>307.06</td><td>23.36</td><td>25,689.79</td><td>0.00</td><td>55,270.99</td><td>2,685.90</td></tr><td><aa/><strong>COMMUNITY LIVING INC</strong></td><td>84</td><td>234.54</td><td>0</td><td>443.62</td><td>14.31</td><td>6,567.09</td><td>0.00</td><td>1,774.50</td><td>457.92</td></tr><td><aa/><strong>Community Options Inc.</strong></td><td>4</td><td>363.00</td><td>0</td><td>0</td><td>0</td><td>363.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>COMMUNITY SUPPORT SERVICES</strong></td><td>168</td><td>197.37</td><td>59.47</td><td>0</td><td>0</td><td>8,289.66</td><td>1,010.93</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>COMPANIONS, INC.</strong></td><td>4</td><td>9.25</td><td>0</td><td>0</td><td>0</td><td>9.25</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>COMPASS, INC.</strong></td><td>53</td><td>309.72</td><td>0</td><td>0</td><td>0</td><td>4,955.50</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>CREATIVE OPTIONS</strong></td><td>51</td><td>383.81</td><td>0</td><td>0</td><td>0</td><td>6,141.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>CROSSROADS COMMUNITY</strong></td><td>2</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>CSAAC</strong></td><td>71</td><td>249.01</td><td>348.06</td><td>391.00</td><td>0</td><td>10,209.36</td><td>2,784.50</td><td>3,519.00</td><td>0.00</td></tr><td><aa/><strong>DEAF INDEPENDENT LIVING ASSOC</strong></td><td>4</td><td>355.02</td><td>404.00</td><td>0</td><td>774.87</td><td>355.02</td><td>404.00</td><td>0.00</td><td>774.87</td></tr><td><aa/><strong>DELMARVA COMMUNITY SERVICES</strong></td><td>26</td><td>294.72</td><td>138.76</td><td>0</td><td>71.32</td><td>589.44</td><td>138.76</td><td>0.00</td><td>1,782.97</td></tr><td><aa/><strong>DOVE POINTE, INC</strong></td><td>227</td><td>283.93</td><td>0</td><td>412.42</td><td>85.29</td><td>5,110.75</td><td>0.00</td><td>5,773.90</td><td>5,373.00</td></tr><td><aa/><strong>DYMOND'S QUALITY CARE, INC.</strong></td><td>4</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>EBED COMMUNITY IMPROVEMENT INC.</strong></td><td>41</td><td>414.00</td><td>0</td><td>0</td><td>0</td><td>1,242.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>EMERGE</strong></td><td>93</td><td>380.92</td><td>0</td><td>260.19</td><td>0</td><td>9,523.06</td><td>0.00</td><td>5,464.01</td><td>0.00</td></tr><td><aa/><strong>FAMILY SERVICE FD INC</strong></td><td>75</td><td>302.25</td><td>289.00</td><td>0</td><td>0</td><td>1,511.25</td><td>289.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>FLYING COLORS OF SUCCESS</strong></td><td>4</td><td>40.00</td><td>0</td><td>0</td><td>0</td><td>40.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>FRIENDS AWARE, INC.</strong></td><td>110</td><td>530.96</td><td>162.57</td><td>78.35</td><td>24.84</td><td>3,716.75</td><td>1,625.69</td><td>2,350.37</td><td>794.76</td></tr><td><aa/><strong>FULL CITIZENSHIP OF MD</strong></td><td>44</td><td>255.62</td><td>0</td><td>0</td><td>0</td><td>3,323.08</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>GOODWILL IND. MONOCACY VALLEY</strong></td><td>36</td><td>527.19</td><td>0</td><td>0</td><td>0</td><td>7,380.72</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>HAGERSTOWN GOODWILL INDUSTRIES</strong></td><td>63</td><td>261.11</td><td>0</td><td>0</td><td>95.01</td><td>3,133.29</td><td>0.00</td><td>0.00</td><td>2,280.19</td></tr><td><aa/><strong>HARFORD CENTER</strong></td><td>142</td><td>68.70</td><td>0</td><td>0</td><td>0</td><td>687.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>HEAD INJURY REHABILITATION</strong></td><td>33</td><td>543.90</td><td>0</td><td>0</td><td>45.00</td><td>3,807.27</td><td>0.00</td><td>0.00</td><td>179.98</td></tr><td><aa/><strong>HOWARD COUNTY ARC</strong></td><td>174</td><td>436.24</td><td>80.00</td><td>265.75</td><td>0</td><td>28,355.74</td><td>80.00</td><td>4,517.80</td><td>0.00</td></tr><td><aa/><strong>HUMANIM</strong></td><td>289</td><td>433.07</td><td>0</td><td>0</td><td>25.01</td><td>33,779.17</td><td>0.00</td><td>0.00</td><td>275.06</td></tr><td><aa/><strong>Institute of Professional Practice-DBA/Mid-Atlantic</strong></td><td>9</td><td>360.00</td><td>0</td><td>0</td><td>0</td><td>360.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>ITINERIS, INC.</strong></td><td>78</td><td>212.57</td><td>58.33</td><td>0</td><td>0</td><td>7,227.34</td><td>175.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>JEWISH COMMUINITY SERVICES, INC.</strong></td><td>20</td><td>334.38</td><td>0</td><td>0</td><td>0</td><td>3,009.43</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>JEWISH SOCIAL SERVICE AGENCY</strong></td><td>35</td><td>652.99</td><td>0</td><td>0</td><td>0</td><td>17,630.63</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>KENT CENTER INC.</strong></td><td>36</td><td>290.19</td><td>0</td><td>0</td><td>22.60</td><td>4,062.64</td><td>0.00</td><td>0.00</td><td>338.94</td></tr><td><aa/><strong>LANGTON GREEN</strong></td><td>25</td><td>397.62</td><td>112.03</td><td>123.04</td><td>0</td><td>3,578.56</td><td>1,568.48</td><td>738.26</td><td>0.00</td></tr><td><aa/><strong>LIFE</strong></td><td>33</td><td>409.62</td><td>575.55</td><td>358.94</td><td>0</td><td>4,505.79</td><td>5,179.95</td><td>717.87</td><td>0.00</td></tr><td><aa/><strong>LINWOOD  CENTER INC.</strong></td><td>17</td><td>443.35</td><td>0</td><td>105.25</td><td>259.54</td><td>3,546.83</td><td>0.00</td><td>315.75</td><td>1,557.22</td></tr><td><aa/><strong>LIVING SANS FRONTIERES, INC.</strong></td><td>27</td><td>0</td><td>0</td><td>220.99</td><td>0</td><td>0.00</td><td>0.00</td><td>5,966.70</td><td>0.00</td></tr><td><aa/><strong>LOWER SHORE ENTERPRISES</strong></td><td>151</td><td>415.04</td><td>277.31</td><td>273.14</td><td>209.93</td><td>5,810.55</td><td>4,714.32</td><td>6,009.05</td><td>24,561.82</td></tr><td><aa/><strong>LT JOSEPH P KENNEDY INSTIT</strong></td><td>86</td><td>733.33</td><td>0</td><td>0</td><td>0</td><td>24,200.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>LYCHER, INC.</strong></td><td>17</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>MARY T. MARYLAND</strong></td><td>5</td><td>328.12</td><td>0</td><td>0</td><td>54.36</td><td>656.24</td><td>0.00</td><td>0.00</td><td>108.73</td></tr><td><aa/><strong>MARYLAND COMMUNITY CONNECTION</strong></td><td>65</td><td>694.31</td><td>707.02</td><td>0</td><td>0</td><td>23,606.54</td><td>8,484.27</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>MELWOOD HORTICULTURAL TRAINING CENTER</strong></td><td>354</td><td>560.70</td><td>815.94</td><td>434.57</td><td>230.37</td><td>18,503.14</td><td>47,324.43</td><td>5,649.43</td><td>6,680.72</td></tr><td><aa/><strong>NEW BEGINNINGS, INC</strong></td><td>15</td><td>36.00</td><td>0</td><td>0</td><td>198.12</td><td>36.00</td><td>0.00</td><td>0.00</td><td>792.50</td></tr><td><aa/><strong>NEW HORIZONS SUPPORTED SERVICES INC.</strong></td><td>166</td><td>403.66</td><td>209.30</td><td>46.00</td><td>0</td><td>12,917.10</td><td>3,139.50</td><td>46.00</td><td>0.00</td></tr><td><aa/><strong>NORTHSTAR SPECIAL SERVICES, INC</strong></td><td>59</td><td>204.35</td><td>37.00</td><td>200.42</td><td>61.05</td><td>817.40</td><td>37.00</td><td>400.85</td><td>610.50</td></tr><td><aa/><strong>OPPORTUNITY BUILDERS</strong></td><td>388</td><td>320.90</td><td>976.23</td><td>63.89</td><td>54.15</td><td>18,932.90</td><td>15,619.68</td><td>3,258.26</td><td>8,935.50</td></tr><td><aa/><strong>PENN MAR ORGANIZATION INC.</strong></td><td>138</td><td>308.39</td><td>43.94</td><td>0</td><td>0</td><td>11,102.18</td><td>87.88</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>POTOMAC CENTER</strong></td><td>31</td><td>9.25</td><td>53.51</td><td>0</td><td>0</td><td>46.25</td><td>1,498.25</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>PRECISION HEALTH CARE RESOURCES</strong></td><td>31</td><td>508.39</td><td>0</td><td>0</td><td>148.00</td><td>3,558.70</td><td>0.00</td><td>0.00</td><td>148.00</td></tr><td><aa/><strong>PROGRESS UNLIMITED</strong></td><td>21</td><td>434.05</td><td>0</td><td>304.19</td><td>0</td><td>4,340.50</td><td>0.00</td><td>3,954.50</td><td>0.00</td></tr><td><aa/><strong>PROVIDENCE CENTER</strong></td><td>380</td><td>271.07</td><td>92.50</td><td>172.74</td><td>85.84</td><td>24,124.95</td><td>185.00</td><td>1,381.88</td><td>1,201.75</td></tr><td><aa/><strong>RAY OF HOPE, INC.</strong></td><td>11</td><td>70.00</td><td>0</td><td>0</td><td>0</td><td>70.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>REHABILITATION OPPORTUNITIES</strong></td><td>194</td><td>713.95</td><td>0</td><td>0</td><td>10.62</td><td>19,990.67</td><td>0.00</td><td>0.00</td><td>637.46</td></tr><td><aa/><strong>ROCK CREEK FOUNDATION</strong></td><td>39</td><td>323.42</td><td>103.50</td><td>126.14</td><td>94.88</td><td>1,617.11</td><td>103.50</td><td>1,387.50</td><td>379.50</td></tr><td><aa/><strong>SCOTT KEY CENTER</strong></td><td>101</td><td>451.95</td><td>323.75</td><td>233.43</td><td>49.78</td><td>3,615.60</td><td>323.75</td><td>12,138.38</td><td>2,290.05</td></tr><td><aa/><strong>SEEC CORPORATION</strong></td><td>187</td><td>525.22</td><td>0</td><td>0</td><td>0</td><td>48,319.90</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>SHURA</strong></td><td>8</td><td>0</td><td>235.20</td><td>0</td><td>0</td><td>0.00</td><td>1,176.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>SOCIAL HEALTH SERVICES GROUP INC</strong></td><td>2</td><td>651.00</td><td>0</td><td>0</td><td>0</td><td>1,302.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>SOMERSET COMMUNITY SERVICES, INC. </strong></td><td>90</td><td>374.66</td><td>199.13</td><td>262.63</td><td>120.39</td><td>5,619.91</td><td>995.63</td><td>1,838.39</td><td>8,186.28</td></tr><td><aa/><strong>SOUTHERN MD VOCATIONAL INDUST</strong></td><td>117</td><td>541.07</td><td>813.75</td><td>225.00</td><td>0</td><td>6,492.88</td><td>14,647.45</td><td>1,125.00</td><td>0.00</td></tr><td><aa/><strong>SPECTRUM SUPPORT, INC</strong></td><td>51</td><td>135.50</td><td>62.14</td><td>0</td><td>0</td><td>271.00</td><td>559.28</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>SPRING DELL CENTER</strong></td><td>153</td><td>381.16</td><td>42.38</td><td>0</td><td>0</td><td>12,578.12</td><td>169.50</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>ST COLETTA OF GREATER WASHINGTON, INC.</strong></td><td>16</td><td>126.62</td><td>202.00</td><td>0</td><td>0</td><td>506.50</td><td>404.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>ST. PETERS ADULT LEARNING</strong></td><td>83</td><td>646.06</td><td>858.00</td><td>750.00</td><td>0</td><td>10,337.00</td><td>1,716.00</td><td>4,500.00</td><td>0.00</td></tr><td><aa/><strong>STAR COMMUNITY, INC.</strong></td><td>81</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>STARFLIGHT ENTERPRISE INC</strong></td><td>3</td><td>560.00</td><td>560.00</td><td>0</td><td>0</td><td>560.00</td><td>560.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>SUNRISE COMMUNITY OF MARYLAND, INC.</strong></td><td>68</td><td>389.29</td><td>299.00</td><td>0</td><td>0</td><td>2,725.00</td><td>897.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>TARGET COMMUNITY AND EDUCATIONAL SERVICES</strong></td><td>104</td><td>382.40</td><td>478.50</td><td>233.25</td><td>0</td><td>22,179.35</td><td>957.00</td><td>3,731.95</td><td>0.00</td></tr><td><aa/><strong>THE  ARC OF THE CENTRAL CHESAPEAKE REGION, INC. </strong></td><td>97</td><td>419.49</td><td>0</td><td>0</td><td>0</td><td>24,330.60</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>THE ARC BALTIMORE</strong></td><td>1089</td><td>580.82</td><td>322.74</td><td>455.72</td><td>71.83</td><td>80,734.18</td><td>5,163.80</td><td>137,170.44</td><td>2,083.10</td></tr><td><aa/><strong>THE CAROLINE CENTER</strong></td><td>73</td><td>277.50</td><td>31.22</td><td>0</td><td>0</td><td>277.50</td><td>249.76</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>THE CENTER FOR LIFE ENRICHMENT</strong></td><td>152</td><td>328.83</td><td>41.44</td><td>181.50</td><td>115.70</td><td>14,139.82</td><td>41.44</td><td>6,352.62</td><td>5,437.99</td></tr><td><aa/><strong>THE LEAGUE FOR PEOPLE WITH DISABILITIES</strong></td><td>138</td><td>312.03</td><td>0</td><td>828.00</td><td>773.60</td><td>6,240.62</td><td>0.00</td><td>828.00</td><td>1,547.20</td></tr><td><aa/><strong>TREATMENT & LEARNING CTR, INC.</strong></td><td>141</td><td>649.53</td><td>601.07</td><td>0</td><td>0</td><td>48,714.54</td><td>9,016.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>UNIFIED COMMUNITY CONNECTIONS</strong></td><td>236</td><td>202.04</td><td>0</td><td>0</td><td>0</td><td>4,849.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>UNITED NEEDS AND ABILITIES, INC.</strong></td><td>13</td><td>340.94</td><td>0</td><td>0</td><td>0</td><td>1,704.70</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>WASHINGTON CO. HDC</strong></td><td>84</td><td>239.11</td><td>32.84</td><td>45.86</td><td>61.08</td><td>1,195.57</td><td>164.19</td><td>550.38</td><td>2,381.94</td></tr><td><aa/><strong>WAY STATION</strong></td><td>42</td><td>81.11</td><td>0</td><td>0</td><td>0</td><td>1,054.48</td><td>0.00</td><td>0.00</td><td>0.00</td></tr><td><aa/><strong>WORCESTER CO DEVELOPMENTAL CTR</strong></td><td>78</td><td>312.52</td><td>0</td><td>145.25</td><td>99.84</td><td>2,500.12</td><td>0.00</td><td>1,743.03</td><td>4,692.34</td></tr><td><aa/><strong>WORK OPPORTUNITIES UNLIMITED</strong></td><td>96</td><td>439.43</td><td>125.00</td><td>0</td><td>0</td><td>24,608.06</td><td>250.00</td><td>0.00</td><td>0.00</td></tr></tbody></table><br /><script type="text/javascript" src="../common/sorttable.js"></script>
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
