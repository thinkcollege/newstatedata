<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<?php 
	//ini_set("include_path","../");
	$database = Database::getDatabase();
	$pages=new page;
	$pages->add_page($_SERVER["PHP_SELF"]);
	?>
	<?php 
									$area="trends" ;
									$show_flash_link=0;
									?>
	<?php if (!isset($file_path)) {
	$file_path="../";
} ?>
	<title><?php $mre_base=new mre_base; echo $mre_base->mre_base_sitename;?> - About the project</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="description" content="A free and accessible charting/graphing service that allows you to find data on disability and employment." />
	<meta name="keywords" content="Disability, employment, services, mental retardation, intellectual disability, developmental disability, outcomes, data, vocational rehabilitation, state agency" />
	<LINK REL='stylesheet' TYPE='text/css' HREF='<?php echo $file_path ?>common/styles.css'>
	<LINK REL='stylesheet' TYPE='text/css' HREF='<?php echo $file_path ?>common/side_menu.css'>
	<script type="text/javascript" src="<?php echo $file_path ?>common/prototype.js"></script>
	<script type="text/javascript" src="<?php echo $file_path ?>common/rollovers.js"></script>
	<script type="text/javascript" src="<?php echo $file_path ?>common/common.js"></script>
	<script type="text/javascript" src="<?php echo $file_path ?>common/functions.js"></script>
	<script type="text/javascript" src="<?php echo $file_path ?>common/overlib_mini.js"></script>
	<style type="text/css">input.submit { text-indent:-999px; background:#FFF url(../images/buttons/submit.jpg) no-repeat top left; border:0; height:4em; width:7em; }</style>
	<!--[if ie]><style type="text/css">input.submit { text-indent:-49em; background:#FFF url(../images/buttons/submit.jpg) no-repeat top right; border:0; height:4em; width:60em; }</style><![endif]-->
</head>
<body bgcolor="#FFFFFF" text="#000000">
	<div id="skip"><a href="#side_menu">Skip to navigation and funders</a></div>
	<div id="main">
		<h1>State Trends</h1>
		<?php
		$userid=0;
		if (isset($_COOKIE["userid"])) {
			$userid=$_COOKIE["userid"]+0;
		} 
		$pages=new page;
		$pageinfo=$pages->get_page($_SERVER["PHP_SELF"]);
		$permission=new permission;
		if (!$pageinfo["itemid"]) {
			$pageinfo["itemid"] = 0;
		}
		$check=$permission->get_permission($userid,$pageinfo["itemid"]);
		if ($check["read"]=="false"){?>
			You don't have permission to view this page 
		<?php } else { ?>
			
<h1>Publications from the Institute for Community Inclusion</h1>

<ul>
<li><a href="#data">Data Analysis</a></li>
<li><a href="#policy">State Systems Policy</a></li>
</ul>

<h2>Data Analysis</h2>

<a id="rp39"></a><p><strong>The National Survey of Community Rehabilitation Providers, FY2002-2003, Report 2: Non-Work Services</strong><br />
(September 2004, Order #RP39)<br />
The second in a series exploring the services people with developmental
disabilities receive from community rehabilitation providers (CRPs).
Despite recent ideological emphasis on work, the majority of CRPs
continued to offer non-work programs and a substantial proportion of
the people they served were involved in those programs. Overall, the
findings raise questions about CRP commitment to community integration.</p>

<blockquote><a href="pub.php?page=rp39">The National Survey of Community Rehabilitation Providers, Report 2 - text</a><br />
<a href="http://www.communityinclusion.org/publications/pdf/rp39.pdf">The National Survey of Community Rehabilitation Providers, Report 2 - pdf</a></blockquote>

<a id="rp38"></a><p><strong>The National Survey of Community
Rehabilitation Providers, FY2002-2003, Report 1: Overview of Services
and Provider Characteristics</strong><br />
(August 2004, Order #RP38)<br />
Two new Research to Practice briefs examine the services people with
developmental disabilities receive from community rehabilitation
providers (CRPs). Despite recent emphasis on work in the disability
field, people with DD were predominantly in sheltered employment or
non-work services. Of people with DD in integrated employment, the
majority had individual competitive jobs. However, three group
employment models had above-average percentages of individuals with DD.</p>

<blockquote><a href="pub.php?page=rp38">The National Survey of Community Rehabilitation Providers, Report 1 - text</a><br />
<a href="http://www.communityinclusion.org/publications/pdf/rp38.pdf">The National Survey of Community Rehabilitation Providers, Report 1 - pdf</a></blockquote>

<a id="wiahoffparker"></a><p><strong>The One-Stop System and Customers
with Disabilities: An Analysis of Workforce Investment Act and
Wagner-Peyser Act Funded Services to Customers with Disabilities,
Program Years 2000 and 2001</strong><br />
(May 2004)<br />
This paper presents an evaluation of the performance of One-Stop System
employment services for persons with disabilities in program years 2000
and 2001. General findings indicate that WIA customers who have
disabilities are typically less likely to enter and retain employment
in some target groups when compared to their non-disabled peers. In
addition, it appears that Wagner-Peyser Act customers are more likely
to be male, older, and economically disadvantaged than their
non-disabled peers. </p>

<blockquote><a href="word/WIA2001FinalReport.doc">The One-Stop System and Customers with Disabilities - MS Word</a><br />
<a href="http://www.communityinclusion.org/publications/pdf/WIA2001FinalReport.pdf">The One-Stop System and Customers with Disabilities - pdf</a></blockquote>


<p><a id="mon29" /></a><strong>Vocational Rehabilitation Outcomes for People with Mental Retardation, Cerebral Palsy, and Epilepsy: An Analysis of Trends from 1985 to 1998</strong><br />
(2001, Order #MON29, \$7.00)<br />
This monograph presents the results of secondary analysis of the RSA-911 database from the Rehabilitation Services Administration. All successful VR closures for individuals with mental retardation, cerebral palsy, and epilepsy for six data points between 1985 and 1998 were investigated. Trends in competitive labor market and extended employment (sheltered workshops) closures were examined. The use of supported employment in the VR system and its outcomes were also discussed. Findings include increased incidence of competitive labor market closures and supported employment services, with a decrease in extended employment closures.</p>
<blockquote><a href="http://www.communityinclusion.org/publications/pdf/vroutcomes.pdf">VR Outcomes Trends 1985-1998, pdf</a></blockquote>

<p><A id="rp29" /></a><strong>Postsecondary Education as a Critical Step Toward Meaningful Employment: Vocational Rehabilitation's Role</strong><br />
(July 2001, Order #RP29)<br />
Postsecondary education opens up a world of opportunities for high school graduates. Research shows that access to the opportunities afforded by a postsecondary education makes an enormous difference in the employability of people with disabilities. This brief focuses on people who have received education supports from Vocational Rehabilitation (VR) agencies and their rehabilitation outcomes. </p>
<blockquote> <a href="http://www.communityinclusion.org/publications/pdf/rp29.pdf">Postsecondary Education: VR's Role - pdf</a></blockquote>

<p><a id="rp28" /></a><strong>National Day and Employment Service Trends in MR/DD Agencies (1988 - 1999)</strong> <br />
(July 2001, Order #RP28)<br />
The past twenty years have seen an increasing emphasis on community-based services and equal access to employment for all individuals, including those with the most significant disabilities. The question is, to what extent have changes in philosophy translated into changes for state agencies and the people they serve? The brief analyzes MR/DD agencies day and employment service trends from 1988 to 1999 and discusses relevant trends in policy and legislation.</p>
<blockquote><a href="text/rp28.html">MR/DD Day &amp; Employment Trends - text</a><br />
<a href="http://www.communityinclusion.org/publications/pdf/rp28.pdf">MR/DD Day &amp; Employment Trends - pdf</a></blockquote>

<p><a id="rp27" /></a><strong>Vocational Rehabilitation Outcomes and General Economic Trends</strong><br />
(June 2001, Order #RP27)<br />
Comparison of Vocational Rehabilitation (VR) outcomes and U.S. economic trends between 1985 and 1998 show that access to employment through VR is meaningfully related to the overall performance of the economy. These data vary from trend data reported on the general population of individuals with disabilities.</p>
<blockquote><a href="http://www.communityinclusion.org/publications/pdf/rp27.pdf">VR Outcomes &amp; Economic Trends - pdf</a></blockquote>

<p><a id="rp25" /></a><strong>Work Status Trends for People with Mental Retardation, FY 1985 to FY 1998</strong><br />
(December 2000, Order #RP25)<br />
National trends regarding extended and competitive employment closures from state Vocational Rehabilitation systems between 1985 - 1998. </p>
<blockquote><a href="text/rp25.html">Work Status Trends - text</a><br />
<a href="http://www.communityinclusion.org/publications/pdf/rp25.pdf">Work Status Trends - pdf</a></font></p> </blockquote>

<p><a id="mon25" /></a><strong>State Trends in Employment Services for People with Developmental Disabilities: Multiyear Comparisons Based on State MR/DD Agency and Vocational Rehabilitation (RSA) Data</strong><br />
(June 1999, Order #MON25, \$20.00)<br />
The last 15 years have seen a significant emphasis on integrated employment opportunities for persons with disabilities. For those who have been a part of this effort, it has been a time of exciting changes in service delivery philosophy, employment services, and outcome evaluation. This monograph provides the most comprehensive summary available of national and state level changes in employment patterns for individuals with mental retardation and other developmental disabilities. The monograph presents longitudinal data from state MR/DD agencies covering eight years between FY88 and FY96, and for federal/state vocational rehabilitation services covering the years FY85 to FY95. <em>Contact ICI at <a href="mailto:ici@umb.edu">ici@umb.edu</a> to order.</em></p>

<p>Highlights:</p>
<ul>
<li>National summary of day and employment services in MR/DD agencies</li>
<li>National summary of employment outcomes in the state/federal Vocational Rehabilitation system</li>
<li>Analysis of state investment in employment outcomes, including a comparison of MR/DD and VR agency experiences</li>
<li>Detailed four-page profile for each of the 50 states and DC</li>
</ul>


<hr>
<h2 id="policy">State Systems Policy</h2>

<a id="stateinnov"></a><p><strong>State Innovations in Employment Supports</strong><br />
A series covering updates on community services for people with developmental disabilities in <a href="http://www.communityinclusion.org/publications/pub.php?page=stateinnov#co">Colorado</a>, Florida, Maine, Maryland, <a href="http://www.communityinclusion.org/publications/pub.php?page=stateinnov#nh">New Hampshire</a>, and <a href="http://www.communityinclusion.org/publications/pub.php?page=stateinnov#wa">Washington</a>.</p>
<blockquote><a href="http://www.communityinclusion.org/publications/pub.php?page=stateinnov">State Innovations in Employment Supports</a></blockquote>

<p><strong>From the Field</strong><br />
(May 2003, online only)<br />
By combining financial resources, the Minnesota Rehabilitation Services
and Department of Mental Health created the Coordinated Employability
Projects to expand employment services for people with mental
illnesses. Two members of the team discuss the value of this
collaboration and present challenges, strategies, and outcomes that
have strengthened activities between their two agencies. </p>
<blockquote><a href="http://www.communityinclusion.org/publications/pub.php?page=fromthefield">From the Field - text</a></blockquote>

<a id="rp32"></a><p><strong>High-Performing States in Integrated Employment</strong><br /> 
(February 2003, Order #RP32)<br />
Despite recent improvements, community employment outcomes vary widely
across states. This report highlights successful practices of states
that were identified as "high performers" in integrated employment for
people served by state MR/DD agencies.</p>
<blockquote><a href="http://www.communityinclusion.org/publications/pdf/rp32.pdf">High-Performing States in Integrated Employment</a> - pdf</blockquote>

<p><strong>Patterns of Collaboration Among State Agencies and Employment Outcomes</strong><br />
(Chapter from <em>Improving Employment Outcomes: Collaboration Across the Disability and Workforce Development Systems, A State of the Science Conference</em>)<br />
In the last several years, several policy initiatives have encouraged or mandated collaboration among multiple public social service systems, particularly in the workforce development and poverty arenas. This article and conference response examine how states have structured their public services, how agencies communicate with each other, what collaborative activities they have undertaken, whether they prioritize employment for people with disabilities, and what relationship exists between collaboration/coordination and employment outcomes for people with disabilities. <em>Contact ICI at <a href="mailto:ici@umb.edu">ici@umb.edu</a> to order.</em></p>

<p><a name="rp30"></a><strong>The Extent of Consumer-Directed Funding by MR/DD State Agencies in Day and Employment Services</strong><br />
(September 2001, Order #RP30)<br />
Individual control over service delivery and life choices is well established as a value in supports for individuals with developmental disabilities. One strategy for expanding choice is the use of mechanisms that provide for consumer direction of funding resources. This brief reports on the prevalence of these options for day and employment services in state MR/DD agencies in 1999.</p>
 
<blockquote><a href="http://www.communityinclusion.org/publications/pdf/rp30.pdf">Consumer-Directed Funding - pdf</a></blockquote>

<p>

</p>

 
		<?php } ?>
		<?php if ($show_flash_link == 1) { ?>
			<blockquote style="border:gray 1px dashed; padding:1em;"><p style="color:dark-gray;"><strong>Want help finding the data you need from this site? Want a consultation on strategic applications for using data on employment of people with disabilities for management or policy-making purposes?
 				<br /><a class="sectionLink" href="<?php echo $file_path ?>about/inquiry.php">Contact us to see what ICI can do for you >></a></p></blockquote>

			<p style="color:grey;"><em>To fully experience StateData.info you should have a modern browser (Internet Explorer 5.0 and above, Netscape/Mozilla/Firefox), with the <a href="http://www.macromedia.com/go/getflashplayer/" target="_new">Macromedia Flash Player</a> installed and Javascript enabled. If you are having difficulty using the site, please <a href="<?php echo $file_path ?>about/feedback.php">contact us</a>.</em></p>
			<div id="footer">
				<p>The recommended citation for these charts and data is: Institute for Community Inclusion. (n.d.)
					<em>StateData.info</em>. Retrieved [today's date] from http://www.statedata.info.</p>
				<br />
				<p>&copy;<?php echo date("Y"); ?>, University of Massachusetts Boston.<br /><br />This is a project of the Institute for Community Inclusion at UMass Boston, supported in part by the Administration on Intellectual and Developmental Disabilities, U.S. Department of Health and Human Services under cooperative agreement #90DN0295 with additional support from the National Institute on Disability and Rehabilitation Research of the U.S. Department of Education under grant #H133A021503. The opinions contained in this website are those of the grantee and do not necessarily reflect those of the funders.
</p>
				<br>
				<p style="text-align:center;">
					<!-- Creative Commons License -->
					<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/2.0/">
						<img alt="Creative Commons License" border="0" src="http://creativecommons.org/images/public/somerights20.gif" />
					</a><br />
					This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/2.0/">Creative Commons License</a>.
					<!-- /Creative Commons License -->
					<!--  rdf:RDF xmlns="http://web.resource.org/cc/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
						<Work rdf:about=""><license rdf:resource="http://creativecommons.org/licenses/by-nc-nd/2.0/" /></Work>
						<License rdf:about="http://creativecommons.org/licenses/by-nc-nd/2.0/">
   							<permits rdf:resource="http://web.resource.org/cc/Reproduction" />
   							<permits rdf:resource="http://web.resource.org/cc/Distribution" />
   							<requires rdf:resource="http://web.resource.org/cc/Notice" />
   							<requires rdf:resource="http://web.resource.org/cc/Attribution" />
   							<prohibits rdf:resource="http://web.resource.org/cc/CommercialUse" />
						</License>
					</rdf:RDF> --></p>
			</div>
		<?php } ?>
	</div>
	<!--end main div-->
	<div id="top">
		<a href="http://www.statedata.info/">
			<img src="/images/banner.gif" alt="ICI: Institute for Community Inclusion">
		</a>
	</div>
	<div id="side_menu">
		<ul>
			<li><a href="<?php echo $file_path ?>charts/trends_1.php">State trends <img src="<?php echo $file_path ?>images/arrow_<?if ($area == "trends") { echo "on"; } else {echo "off";} ?>.gif" width="4" height="8" alt="" border="0"></a></li>
			<li><a href="<?php echo $file_path ?>charts/comparison_1.php">State comparisons <img src="<?php echo $file_path ?>images/arrow_<?if ($area == "comparison") { echo "on"; } else {echo "off";} ?>.gif" width="4" height="7" alt="" border="0"></a></li>
			<!--<li><a href="<?php echo $file_path ?>charts/individual_1.php">Individual data <img src="<?php echo $file_path ?>images/arrow_<?if ($area == "individual") { echo "on"; } else {echo "off";} ?>.gif" width="4" height="7" alt="" border="0"></a></li>-->
			<li><a href="<?php echo $file_path ?>download/download_1.php">Download raw data <img src="<?php echo $file_path ?>images/arrow_<?if ($area == "download") { echo "on"; } else {echo "off";} ?>.gif" width="4" height="7" alt="" border="0"></a></li>
			<li><a href="<?php echo $file_path ?>datanotes/">Publications <img src="<?php echo $file_path ?>images/arrow_<?if ($area == "datanotes") { echo "on"; } else {echo "off";} ?>.gif" width="4" height="7" alt="" border="0"></a></li>
			<li><a href="<?php echo $file_path ?>about/about.php">About StateData.info <img src="<?php echo $file_path ?>images/arrow_<?if ($area == "about") { echo "on"; } else {echo "off";} ?>.gif" width="4" height="7" alt="" border="0"></a></li>
			<li><a href="<?php echo $file_path ?>about/data_sources.php">About Data Sources <img src="<?php echo $file_path ?>images/arrow_<?if ($area == "data_sources") { echo "on"; } else {echo "off";} ?>.gif" width="4" height="7" alt="" border="0"></a></li>
			<li><a href="<?php echo $file_path ?>about/feedback.php">Contact Us <img src="<?php echo $file_path ?>images/arrow_<?if ($area == "Feedback") { echo "on"; } else {echo "off";} ?>.gif" width="4" height="7" alt="" border="0"></a></li>
			<li><a href="http://www.seln.org">State Employment Leadership Network <img src="<?php echo $file_path ?>images/arrow_<?if ($area == "SELN") { echo "on"; } else {echo "off";} ?>.gif" width="4" height="7" alt="" border="0"></a></li>
			<li><a href="http://www.communityinclusion.org/aie">Access to Integrated Employment Project <img src="<?php echo $file_path ?>images/arrow_<?if ($area == "AIE") { echo "on"; } else {echo "off";} ?>.gif" width="4" height="7" alt="" border="0"></a></li>
			<li><a href="<?php echo $file_path ?>DisabilityResources/index.php">Disability Resources <img src="<?php echo $file_path ?>images/arrow_<?if ($area == "disability_resources") { echo "on"; } else {echo "off";} ?>.gif" width="4" height="7" alt="" border="0"></a></li>
		</ul>
		
		<br />
		<div style="border:1px solid gray;">
			<!-- BEGIN: Constant Contact Stylish Email Newsletter Form -->
			<div align="center">
			<div style="width:160px; background-color: #ffffff;">
			<form name="ccoptin" action="http://visitor.r20.constantcontact.com/d.jsp" target="_blank" method="post" style="margin-bottom:3;"><span style="background-color: #006699; float:right;margin-right:5;margin-top:3"><img src="https://imgssl.constantcontact.com/ui/images1/visitor/email1_trans.gif" alt="Email Newsletter icon, E-mail Newsletter icon, Email List icon, E-mail List icon" border="0"></span>
			<font style="font-weight: bold; font-family:Arial; font-size:15px; color:#006699;">Sign up for our Email Newsletter</font>
			<input type="text" name="ea" size="20" value="" style="font-family:Verdana,Geneva,Arial,Helvetica,sans-serif; font-size:10px; border:1px solid #999999;">
			<input type="submit" name="go" value="GO"   style="font-family:Verdana,Arial,Helvetica,sans-serif; font-size:10px;">
			<input type="hidden" name="llr" value="vnjp6sn6">
			<input type="hidden" name="m" value="1011025946037">
			<input type="hidden" name="p" value="oi">
			</form>
			<p style="color:darkred; font-size:.60em; line-height:1em;">NOTE: Please check the "<strong style="text-decoration:underline;">Employment Data</strong>" box on the next page</p>
			</div>
			</div>
			<!-- END: Constant Contact Stylish Email Newsletter Form -->
			<!-- BEGIN: SafeSubscribe -->
			<div align="center" style="padding-top:5px;">
			<img src="https://imgssl.constantcontact.com/ui/images1/safe_subscribe_logo.gif" border="0" width="168" height="14" alt=""/>
			</div>
			<!-- END: SafeSubscribe -->
			
			</div>
		
		
		
		
		
		<div id="funders" style="text-align:center; padding-top:1em;" >
			<p><a href="http://communityinclusion.org/">
				<img src="/images/icigreendark.gif" width="72" height="72" alt="communityinclusion.org">
			</a></p>
			<p><a href="http://www.umb.edu">
				<img src="/images/UMB_informal.gif" width="54" height="60" alt="ubm.edu">
			</a></p>
			<p>This project is funded by:</p>
			<p><a href="http://www.acf.hhs.gov/programs/add/" target="_new">
				<img src="/images/AIDD_logo_blue_web.png" 
				 alt="www.acf.hhs.gov/programs/add">
			</a></p>
			<p><a href="http://www.ed.gov/about/offices/list/osers/nidrr/index.html" target="_new">
				<img src="/images/nidrr.jpg" width="80" height="43" alt="www.ed.gov/about/offices/list/osers/nidrr/index.html">
			</a></p>
		</div><!--end funders div-->
	</div><!--end sidemenu div-->
<?php $database->close(); ?>
