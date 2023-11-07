<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set("include_path","../");
include("common/classes_ma.php");
$template=new template;
$template->debug();
$template->define_file('dds_template.php');
$template->add_region('title','<?php $mre_base=new mre_base; echo $mre_base->mre_base_sitename;?> - DDS Employment Outcome Data');
$template->add_region('sidebar','<?php $area="home" ; $show_flash_link=0; ?>');
$template->add_region('heading','DDS Employment Outcome Information System');
$template->add_region('content','



<div class="textControl"><h2>Why we collect data</h2>

<p>The Massachusetts Employment Outcome Information System is designed to help DDS and its community of stakeholders to develop the supports and infrastructure necessary to fulfill the vision and goals of the Massachusetts’s Department of Developmental Services Employment First Policy (2010) and Employment Blueprint for Success (2013, 2023). The system provides longitudinal data that support Massachusetts’s goals to improve both participation in integrated employment and the quality of employment outcomes. Massachusetts DDS has collected data on employment outcomes since 2004.</p>

<p>The data system was developed and tested with input from DDS staff, advocates, and provider representatives. It will continue to evolve in response to feedback and the needs of Massachusetts.</p>
<h2>How can job seekers use this information?</h2>
<p>Job seekers, families, and service coordinators can use this website as one tool when you are looking for an employment provider. Go to <a href="/massachusetts/finding_es.php">Finding Employment Services</a> on the left for more information and questions to consider.</p>


<h2>How we collect data</h2>

<p>Data on variables such as total wages or total hours of participation are based on a four-week data collection period. This data is collected once a year during the month of April. </p>




<p>Select from the menu at the left or using the links below to view data in three ways: </p>

<p><strong><a href="./charts/activity_1.php">Summary Reports:</a></strong> Provides a summary for a selected reporting period across each major life activity included in the Employment Supports Performance Outcome Information System at the state, region, area office, or provider levels. Reports are available for:</p>

<ul>
<li>Hours worked</li>
<li>Wages</li>
<li>Group supported employment
<li>Self employment</li>
</ul>

<p><strong><a href="./charts/provider_1.php">Provider Comparison Report:</a></strong> Provides a detailed report in table form summarizing the performance of providers at the state, region, or area office levels. Reports are available for:</p>

<ul>
<li>Number participating by activity</li>
<li>Hours of participation by activity</li>
<li>Wages earned by activity</li>
</ul>

<p><strong><a href="./charts/provider_individual_1.php">Provider Individual Report:</a></strong> Provides a detailed report in table form summarizing a single provider at the state or region level. Each report addresses number participating by activity, hours of participation by activity, and wages during a two-week reporting period.</p>

<div class="footer">
<p class="clearfix" style="text-align: center margin: 14px auto;"><a href="http://communityinclusion.org/"><img style="float: left; margin-right: 14px;" src="../images/dds_logo.png" width="40" alt="communityinclusion.org" /></a><a href="http://www.umb.edu"><img style="float: left;" src="../images/ma_emp_first.png" width="40"  alt="umb.edu" /></a></p>
<p>This site was developed by <a href="https://www.statedata.info/">StateData.info</a>, a project of the <a href="https://www.communityinclusion.org/" target="_blank">Institute for Community Inclusion</a>, <a href="https://www.umb.edu" target="_blank">University of Massachusetts Boston</a>, with the <a href="https://www.mass.gov/orgs/department-of-developmental-services" target="_blank">Massachusetts Department of Developmental Services</a> (© 2023). For more information on StateData.info contact:</p>

<p>Agnes Zalewska, MPH<br>
<a href="agnes.zalewska@umb.edu">agnes.zalewska@umb.edu</a><br>
617/287-4393</p>

<p>John Butterworth, Ph.D.<br>
<a href="john.butterworth@umb.edu">john.butterworth@umb.edu</a><br>
617/287-4357</p>
</div></div>






');
//write page
include("header.php");
$template->make_template();
