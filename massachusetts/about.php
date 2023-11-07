<?php
ini_set('display_errors', 'Off');
ini_set("include_path","../");
include("common/classes_ma.php");
$template=new template;
$template->debug();
$template->define_file('dds_template.php');
$template->add_region('title','<?php $mre_base=new mre_base; echo $mre_base->mre_base_sitename;?> DDS Employment Supports Performance Outcome Information System');
$template->add_region('sidebar','<?php $area="about" ; $show_flash_link=0; ?>');
$template->add_region('heading','About These Data');
$template->add_region('content','
<div class="textControl">
<p>Since 2004, Massachusetts DDS has been collecting data to summarize employment outcomes across the state. Data is collected once a year from each organization that provides employment supports with funding from DDS in April. The data represent a four-week period during the month of April. April was selected as a representative typical month for assessing employment status.</p><p>
Providers are required to enter information for every individual they support in employment services. This information includes which, if any, activities they participate in, and if applicable, hours spent in the activity, wages earned, and whether the individual receives paid time off. The employment activities reported on each year are:</p><ul><li>
<strong>Individual competitive employment:</strong> A full or part-time job for which an individual earns wages, based on their identified needs and interests, located in a community business, and where the majority of persons employed are not persons with disabilities.</li><li>
<strong>Group supported employment:</strong> A small group of individuals (typically 2 to 8) that work in the community under the supervision of a provider agency. Most often, the individuals are considered employees of the provider agency and are paid and receive benefits from that agency. Group supported employment may include small groups in industry (enclave), provider businesses/small business model, mobile work crews that allow for integration, and temporary services which may assist in securing an individual position within a business.</li><li>
<strong>Self-employment:</strong> Includes self-employment or microenterprises owned by the individual. Does not include a business that is owned by the support organization. </li><li>
<strong>Job search & exploration activities:</strong> Job search or job exploration activities that are a pathway to employment, supported through the employment services. Sub-categories include discovery and career planning activities, or job development activities. </li><li>
Wrap-around services: Any other day support service a person is participating in when they are not engaged in employment, job search, or job exploration. Wrap-around services can be supported by any provider. Sub-categories include community based day services, day habilitation programs, and other day support services.</li></ul>
<h2>Why Data Collection Efforts Are Important</h2>
<p>Policy shifts over the past 20+ years have created an agenda that calls for a sustained commitment to integrated employment for individuals with disabilities. But despite these clear intentions, unemployment of individuals with disabilities continues to be a major public policy issue.</p><p>
Data on employment outcomes can help stakeholders to develop the supports and infrastructure necessary to improve both individuals’ participation in integrated employment and the quality of employment outcomes. The establishment and implementation of a standardized data collection provides the opportunity to monitor progress toward state goals, establish and evaluate state actions to reach the goals, and support decision making.</p><p>
Data on employment outcomes is also important for the individuals using the services and their families. </p><p>&nbsp;&nbsp;</p></div>
');
//write page
include("header.php");
$template->make_template();
