<?php
ini_set('display_errors', 'Off');
ini_set("include_path","../");
include("common/classes_ma.php");
$template=new template;
$template->debug();
$template->define_file('dds_template.php');
$template->add_region('title','<?php $mre_base=new mre_base; echo $mre_base->mre_base_sitename;?> DDS Employment Supports Performance Outcome Information System');
$template->add_region('sidebar','<?php $area="finding" ; $show_flash_link=0; ?>');
$template->add_region('heading','Finding Employment Services');
$template->add_region('content','
<div class="textControl">
<p>This website can help individual job seekers, family members and friends, or other supporters to identify and choose an employment provider. The website provides information about the number of individuals they serve, the number who are working in individual jobs, group supported jobs, or self employment, how many hours people work, and the average wages they earned. Information on job search and exploration lets you know how many individuals are engaged in discovery or career planning and how many are actively looking for a job. You can compare this information between individual providers, or between specific regions in the state. The data can help you know:</p><ul><li>
How many people does the provider support?</li><li>
How many people are working? How many work in individual jobs, group supported jobs, and self employment?</li><li>
How many hours do people typically work? How much do people earn?</li><li>
How many people are engaged in career planning? How many are looking for a job?</li></ul>

<p><strong>Remember that numbers don’t tell the whole story.</strong> Take time to explore the organizations that provide employment support in your area. Your Service Coordinator can help you identify providers that support people in your area. Take time to visit and meet with the staff of each provider you are considering. You might also want to talk to people who receive employment supports from the providers you are considering. Ask questions like*:</p><ul><li>
How many people like me have you helped get jobs?</li><li>
How many people keep their job for a year or more?</li><li>
How will you help me figure out what kind of job I want?</li><li>
How long will it take me to get a job?</li><li>
How long have your employment staff worked here?</li><li>
How do your staff get trained?</li><li>
Can I pick my own employment staff?</li><li>
What will my role be in finding and keeping a job?</li><li>
How will my family and friends be involved in my job search?</li><li>
How will I get to work?</li><li>
What types of jobs have you helped people find?</li></ul>


<p>*Adapted from Indiana’s Center on Community Living and Careers: <a href="https://www.iidc.indiana.edu/cclc/doc/choosing-an-employment-provider-agency-guide-2022-final-online.pdf" target="_blank">Choosing an employment provider agency</a></p><p>&nbsp;&nbsp;</p></div>
');
//write page
include("header.php");
$template->make_template();
