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
									$area="datanotes" ;
									$show_flash_link=0;
									?>
	<?php if (!isset($file_path)) {
	$file_path="../";
} ?>
	<title><?php $mre_base=new mre_base; echo $mre_base->mre_base_sitename;?> - Data Note - No. 1, 2005</title>
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
		<h1>StateData.info: Data Note - No. 1, 2005</h1>
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
			

<h2>What do Vocational Rehabilitation (VR) services cost?</h2>
<p><a href="datanote1.pdf">Download this Data Note in pdf</a></p>


<p>The VR system has the flexibility to purchase a wide array of services to support an employment outcome, including vocational evaluation, vocational training and postsecondary education, transportation, supported employment, interpreters, and adaptive equipment. VR services include core counseling and guidance provided by a VR counselor as well as services that are purchased based on an individual employment plan.</p>

<p>In fiscal year 2003, the average cost of the purchased services that resulted in an employment outcome 
was \$4,008 for individuals who successfully completed their employment plan, and \$2,161 for all closures 
including individuals who did not achieve a rehabilitation goal.</p>

<p>The cost of services varied significantly by disability, ranging from an average of \$2,923 for each 
successful closure for individuals with a primary disability of substance abuse to \$5,577 for individuals 
with a primary disability that was orthopedic in nature.</p>

<caption>
<h2>Vocational Rehabilitation Services Cost per Case<a href="#1">*</a> by Disability and Type of Closure: Fiscal Year 2003</h2>
</caption>



<table align="center" border="1" cellpadding="5" cellspacing="3" 

summary="Vocational Rehabilitation Services Cost per Case* by Disability and Type of Closure: Fiscal Year 2003">



<colgroup span="2"></colgroup>

<colgroup span="2"></colgroup>



<thead>

<tr>

<th>&nbsp;</th><th class="center" colspan="2" scope="colgroup" >All closures<a href="#2">**</a></th><th class="center" colspan="2" scope="colgroup">Successful closures<a href="#2">**</a></th>

</tr>

<tr>

<th scope="col" >Disability</th><th scope="col" >Number of closures</th><th scope="col" >Mean cost/case</th><th scope="col" >Number of closures</th><th scope="col" >Mean cost/case</th>

</tr>

</thead>



<tbody>

<tr>

<td scope="row">Visual</td><td>29,540</td><td>\$3,894</td><td>15,442</td><td>\$5,267</td>

</tr>

<tr>

<td scope="row">Hearing</td><td>29,869</td><td>3,403</td><td>18,747</td><td>4,170</td>

</tr>

<tr>

<td scope="row">Orthopedic</td><td>114,021</td><td>2,861</td><td>37,660</td><td>5,577</td>

</tr>

<tr>

<td scope="row">Mental retardation</td><td>48,068</td><td>2,616</td><td>19,942</td><td>4,096</td>

</tr>

<tr>

<td scope="row">Substance abuse</td><td>35,594</td><td>1,682</td><td>12,424</td><td>2,923</td>

</tr>

<tr>

<td scope="row">Mental illness</td><td>108,724</td><td>1,775</td><td>31,147</td><td>3,502</td>

</tr>

<tr>

<td scope="row">Learning disability</td><td>58,600</td><td>1,581</td><td>22,977</td><td>2,939</td>

</tr>

<tr>

<td scope="row">Other</td><td>193,345</td><td>1,659</td><td>59,218</td><td>3,510</td>

</tr>

</tbody>



<tfoot>

<td scope="row">Total</td><td>617,761</td><td>2,161</td><td>217,557</td><td>4,008</td>

</tfoot>



</table>

<p><a id="1" /></a>* "Cost" is the cost of purchased services, and does not include administrative costs or the cost of core rehabilitation counseling services provided by the VR agency.</p>

<p><a id="2" /></a>** "All closures" includes successful rehabilitations; unsuccessful closures (after an individualized plan for employment has been developed); and individuals closed before eligibility determination, not accepted for services, or after eligibility determination but prior to an individualized plan for employment. </p>

<p>Sample purchased services available as part of an individual employment plan: </p>

<ul>
<li>Assessment and evaluation </li>
<li>Diagnosis and treatment </li>
<li>College/university training </li>
<li>Occupational/vocational training </li>
<li>On-the-job training</li> 
<li>Job readiness training </li>
<li>Job search services </li>
<li>Job placement services </li>
<li>On-the-job supports </li>
<li>Transportation </li>
<li>Rehabilitation or assistive technology </li>
<li>Reader, interpreter, or personal assistance services or supports </li>
</ul>

<p>Source: RSA 911 database for FY2003 </p>

<p>StateData.info <br />
A project of the Institute for Community Inclusion at UMass Boston</p>
 
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
