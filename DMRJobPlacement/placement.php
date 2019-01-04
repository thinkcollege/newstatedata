<?php
define('QUADODO_IN_SYSTEM', true);
define( 'BASEPATH', "http://statedata.info/"); 
		
require_once('../users/includes/header.php');
//$qls->Security->check_auth_page('../DMRJobPlacement/dashboard.php');

require_once("../common/classes.php");
	$database = Database::getDatabase();
		
		
	if (isset($_POST['first_name'])) { 
		$dob = formBase::string_to_datetime($_POST['dob']);
		$start_date = formBase::string_to_datetime($_POST['start_date']);
		$creation_date = formBase::string_to_datetime($_POST['creation_date']);
		$provider_id = $qls->Security->make_safe($_POST['provider_id']) ;
		$first_name = $qls->Security->make_safe($_POST['first_name']) ;
		$last_name = $qls->Security->make_safe($_POST['last_name']) ;
		$dob = $qls->Security->make_safe($dob) ;
		$zip_code = $qls->Security->make_safe($_POST['zip_code']) ;
		$region = $qls->Security->make_safe($_POST['region']) ;
		$area_office = $qls->Security->make_safe($_POST['area_office']) ;
		$funded_dmr = $qls->Security->make_safe($_POST['funded_dmr']) ;
		$funded_mrc = $qls->Security->make_safe($_POST['funded_mrc']) ;
		$funded_other = $qls->Security->make_safe($_POST['funded_other']) ;
		$start_date = $qls->Security->make_safe($start_date) ;
		$job_title = $qls->Security->make_safe($_POST['job_title']) ;
		$wages_per_hr = $qls->Security->make_safe($_POST['wages_per_hr']) ;
		$hr_per_wk = $qls->Security->make_safe($_POST['hr_per_wk']) ;
		$insurance_avail = $qls->Security->make_safe($_POST['insurance_avail']) ;
		$hiring_comp = $qls->Security->make_safe($_POST['hiring_comp']) ;
		$industry_id = $qls->Security->make_safe($_POST['industry_id']) ;
		$next_step = $qls->Security->make_safe($_POST['next_step']) ;
		//$creation_date = date("Y-n-j");
		
		if (isset($_POST['jp_dmr_individual_id'])) { 
$query = <<<UPDATEQUERY
		update `jp_dmr_individuals` set
		`creation_date` = ,
		`provider_id` = ,
		`first_name` = ,
		`last_name` = ,
		`dob` = ,
		`zip_code` = ,
		`region` = ,
		`area_office`=  ,
		`funded_dmr` = ,
		`funded_mrc` = ,
		`funded_other` = ,
		`start_date` = ,
		`wages_per_hr` = ,
		`hr_per_wk` = ,
		`insurance_avail` = ,
		`hiring_comp` = ,
		`job_title` = ,
		`industry_id` = 
		where
		`jp_dmr_individual_id` = 
		)
		VALUES (
		NULL , '$creation_date', '$provider_id', '$first_name', '$last_name', '$dob', '$zip_code', '$region', '$area_office', 
		'$funded_dmr', '$funded_mrc', '$funded_other', '$start_date', '$wages_per_hr', '$hr_per_wk', '$insurance_avail', 
		'$hiring_comp', '$job_title', '$industry_id', 'Employed'
		)
UPDATEQUERY;
		}
		else {
$query = <<<INSERTQUERY
		INSERT INTO `jp_dmr_individuals` (
		`jp_dmr_individual_id` ,
		`creation_date` ,
		`provider_id` ,
		`first_name` ,
		`last_name` ,
		`dob` ,
		`zip_code` ,
		`region` ,
		`area_office` ,
		`funded_dmr` ,
		`funded_mrc` ,
		`funded_other` ,
		`start_date` ,
		`wages_per_hr` ,
		`hr_per_wk` ,
		`insurance_avail` ,
		`hiring_comp` ,
		`job_title` ,
		`industry_id` ,
		`status`
		)
		VALUES (
		NULL , '$creation_date', '$provider_id', '$first_name', '$last_name', '$dob', '$zip_code', '$region', '$area_office', 
		'$funded_dmr', '$funded_mrc', '$funded_other', '$start_date', '$wages_per_hr', '$hr_per_wk', '$insurance_avail', 
		'$hiring_comp', '$job_title', '$industry_id', 'Employed'
		)
INSERTQUERY;
	
		}
		//if (isset($_REQUEST['jp_dmr_individual_id'])) { 
		//	$_REQUEST['jp_dmr_individual_id'] = 0;
		//}
		$results = $database->query($query);
		if ($next_step == "list")
		{
			header( "Location: ". BASEPATH ."/DMRJobPlacement/dashboard.php");
			$continue = false;
			die();
		}
	}
	else {
	}
	
	$query = "SELECT * FROM `NAICS_Industry` ORDER BY `NAICS_Industry`.`sort_order` ASC";
	$results = $database->query($query);
	$industries = $database->mysql_fetch_rowsassoc($results);
	mysql_free_result($results);
	
	$query = "";
	$vendor = "";
	
	if ($qls->user_info['provider_id'] == 0) {
		$query = "SELECT  `dmr_regions`.region_id, `dmr_regions`.region, dmr_area_offices.area_office_id, dmr_area_offices.area_office FROM `dmr_regions` left join dmr_area_offices on  `dmr_regions`.region_id = dmr_area_offices.region_id order by dmr_regions.region, dmr_area_offices.area_office  ";
	} else {
		$query = "select vendor from dmr_providers where provider_id = ". $qls->user_info['provider_id'] ;
		$results = $database->query($query);
		$vendors = $database->mysql_fetch_rowsassoc($results);
		mysql_free_result($results);
		$vendor =$vendors[0]["vendor"];
		
		$query = "SELECT `dmr_regions`.region_id, `dmr_regions`.region, dmr_area_offices.area_office_id, dmr_area_offices.area_office FROM (`dmr_regions` left join dmr_area_offices on  `dmr_regions`.region_id = dmr_area_offices.region_id ) left join `dmr_vendor_regions` ON dmr_regions.region_id = dmr_vendor_regions.region_id  WHERE dmr_vendor_regions.provider_id = ". $qls->user_info['provider_id'] ." order by dmr_regions.region, dmr_area_offices.area_office"; 
		
	}
	
	
	$results = $database->query($query);
	$regions_and_offices = $database->mysql_fetch_rowsassoc($results);
	mysql_free_result($results);
	
	
	$query = "SELECT * FROM `dmr_providers` order by vendor";
	$results = $database->query($query);
	$providers = $database->mysql_fetch_rowsassoc($results);
	mysql_free_result($results);
	
	$jp_dmr_individual_id = "";
	$dob = "";
	$first_name = "";
	$last_name = "";
	$zip_code = "";
	$region = "";
	$area_office = "";
	$funded_dmr = "";
	$funded_mrc = "";
	$funded_other = "";
	$start_date = "";
	$job_title = "";
	$wages_per_hr = "";
	$hr_per_wk = "";
	$insurance_avail = "";
	$hiring_comp = "";
	$industry_id = "";
	$next_step = "";
	$creation_date = "";
	
	if (isset($_GET['jp_dmr_individual_id']) && $_GET['jp_dmr_individual_id'] != "0" ) { 
		$dFormat = '%m/%d/%Y';	
		$query = "select `jp_dmr_individual_id`, `creation_date`, DATE_FORMAT(creation_date,'$dFormat') AS creation_date_f,`provider_id`, `first_name`, `last_name`, `dob`, DATE_FORMAT(dob,'$dFormat') AS dob_f, `zip_code`, `region`, `area_office`, `funded_dmr`, `funded_mrc`, `funded_other`, `start_date`, DATE_FORMAT(start_date,'$dFormat') AS start_date_f, `wages_per_hr`, `hr_per_wk`, `insurance_avail`, `hiring_comp`, `job_title`,  `jp_dmr_individuals`.`industry_id` , `status` , `NAICS_Industry`.`industry` as industry from jp_dmr_individuals inner join  NAICS_Industry ON NAICS_Industry.industry_id = jp_dmr_individuals.industry_id where `jp_dmr_individual_id` =" . $_REQUEST['jp_dmr_individual_id'];
		
		$results = $database->query($query);
		$individuals = $database->mysql_fetch_rowsassoc($results);
		$individual = $individuals[0];
		mysql_free_result($results);
		
		$creation_date = $individual["creation_date_f"];
		$dob = $individual["dob_f"];
		$start_date = $individual["start_date_f"];
		$first_name = $individual["first_name"];
		$last_name = $individual["last_name"];
		$zip_code = $individual["zip_code"];
		$region = $individual["region"];
		$area_office = $individual["area_office"];
		$funded_dmr = $individual["funded_dmr"];
		$funded_mrc = $individual["funded_mrc"];
		$funded_other = $individual["funded_other"];
		$job_title = $individual["job_title"];
		$wages_per_hr = $individual["wages_per_hr"];
		$hr_per_wk = $individual["hr_per_wk"];
		$insurance_avail = $individual["insurance_avail"];
		$hiring_comp = $individual["hiring_comp"];
		$industry_id = $individual["industry_id"];
		$jp_dmr_individual_id = $_GET['jp_dmr_individual_id'];
	}
	else
	{
		$creation_date = date("n/j/Y");
		$jp_dmr_individual_id = "0";
	}
?>
	<script type="text/javascript" src="../common/jquery.js"></script>
	<script type="text/javascript" src="../common/calendar/calendar.js"></script>
	<script type="text/javascript" src="../common/calendar/lang/calendar-en.js"></script>
	<script type="text/javascript" src="../common/calendar/calendar-setup.js"></script>
	<link rel="stylesheet" type="text/css" media="screen" href="../common/calendar/skins/aqua/theme.css" />
	<LINK REL='stylesheet' TYPE='text/css' HREF='../common/styles.css'>


<div style="padding:10px">
<h1>Individual Job Placement Report</h1>
<p>This form is used to report new individual job placements. Reports are due by the 10th of each month for any individual who started work at a new individual competitive job during the prior month. Any individual competitive job is a job in which the individual is paid directly by the company he or she works for and is making at least minimum wage.</p>
<p>This form should not be used for group supported employment. Data on group supported employment will still be captured during the annual April employment outcomes data collection.</p>
	<form method="POST">
  	<input type="hidden" id="jp_dmr_individual_id" name="jp_dmr_individual_id" value="<?php echo $jp_dmr_individual_id;?>" />
	<table border=0>
		<tr>
			<td ><label>Date Record Created:</label></td>
			<td width="100%"><?php echo $creation_date; ?></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td ><label>Provider:</label></td>
			<td><?php if ($qls->user_info['provider_id'] == 0) {
					echo "<select id=\"provider_id\" name=\"provider_id\">";
					foreach ($providers as $provider) {
					?>
						<option value="<?php echo $provider["provider_id"];?>" <?php echo ($provider["provider_id"] == $provider_id)? "selected" : "";?>><?php echo $provider["vendor"];?></option>
					<?php }
					echo "</select>";
				} else { ?>
					<input type="hidden" name="provider_id" id="provider_id" value="<?php echo  $qls->user_info['provider_id'];?>" />
				<?php echo $vendor;
				} ?>
			</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td ><label id="lbl_first_name" for="first_name">First name:</label></td>
			<td><input type="text" name="first_name" id="first_name" value="<?php echo $first_name;?>"/></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td ><label id="lbl_last_name" for="last_name">Last name:</label></td>
			<td><input type="text" name="last_name" id="last_name" value="<?php echo $last_name;?>"/></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td ><label id="lbl_dob" for="dob">Date of birth:</label></td>
			<td><?php echo formBase::build_date_picker("dob", $dob); ?> (ex 12/31/2009)</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td ><label id="lbl_zip_code" for="zip_code">Residential Zip code :</label></td>
			<td><input type="text" name="zip_code" id="zip_code" value="<?php echo $zip_code;?>"/></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td ><label id="lbl_region" for="region">Region:</label></td>
			<td><input type="text" name="region" id="region" value="dropdown"/></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td ><label id="lbl_area_office" for="area_office">Area Office:</label></td>
			<td><input type="text" name ="area_office" id="area_office" value="dropdown"/></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td  colspan="2"><label>Individual job development services were funded by (check all that apply):</label></td>
		</tr>
		<tr>
			<td  colspan="2">
				<input type="checkbox" value="1" name="funded_dmr" id="funded_dmr" <?php echo ($funded_dmr == "1")? "checked" : "";?> />&nbsp;
				<label id="lbl_funded_dmr" for="funded_dmr">DMR</label></td>
			
		</tr>
		<tr>
			<td  colspan="2">
				<input type="checkbox" value="1" name="funded_mrc" id="funded_mrc" <?php echo ($funded_mrc == "1")? "checked" : "";?>/>&nbsp;
				<label id="lbl_funded_mrc" for="funded_mrc">MRC</label></td>
			
		</tr>
		<tr>
			<td  colspan="2"><input type="checkbox" value="1" name="other" id="other" <?php echo ($funded_other != "")? "checked" : "";?> />&nbsp;<label id="lbl_funded_other" for="funded_other">Other:</label> 
			<input type="text" id="funded_other" value="<?php echo $funded_other;?>" /></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td ><label id="lbl_start_date" for="start_date">Job start date:</label></td>
			<td><?php echo formBase::build_date_picker("start_date", $start_date); ?></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td ><label id="lbl_job_title" for="job_title">Job Title:</label></td>
			<td><input type="text" name="job_title" id="job_title" value="<?php echo $job_title;?>" /> </td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td ><label id="lbl_wages_per_hr" for="wages_per_hr">Wages:</label></td>
			<td>$ <input type="text" name="wages_per_hr" id="wages_per_hr" value="<?php echo $wages_per_hr;?>" /> per hour</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td  colspan="2"><label id="lbl_hr_per_wk" for="hr_per_wk">On average, how many hours per week does the consumer work in this placement?</label></td>
		</tr>
		<tr>
			<td colspan="2"><input type="text" name="hr_per_wk" id="hr_per_wk" value="<?php echo $hr_per_wk;?>" />  hours per week</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td  colspan="2"><label>Is employer sponsored health insurance available to the individual within 6 months of the start of employment?</label></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="radio" id="insurance_avail_yes" name="insurance_avail" value="1" <?php echo ($insurance_avail == "1")? "checked" : "";?> />&nbsp;
				<label id="lbl_insurance_avail_yes" for="insurance_avail_yes">Yes</label></td>
			
		</tr>
		<tr>
			<td colspan="2">
				<input type="radio" id="insurance_avail_no" name="insurance_avail" value="0" <?php echo ($insurance_avail == "0")? "checked" : "";?> />&nbsp;
				<label id="lbl_insurance_avail_no" for="insurance_avail_no">No</label></td>
			
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td nowrap="nowrap" colspan="2"><label id="lbl_hiring_comp" for="hiring_comp">Name of Hiring Company:</label></td>
		</tr>
		<tr>
			<td colspan="2"><input type="text" name="hiring_comp" size=100 id="hiring_comp" value="<?php echo $hiring_comp;?>" /></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		</table>
		<table>
		<tr>
			<td ><label>Industry (What industry is this individual working in regardless of job tasks)</label></td>
			<td rowspan="<?php echo count($industries) + 1;?>" valign="top">
				<div id="IndustryDetails" style="display:none">
					<?php echo form::build_box_top("Industry Details", "<a href=\"#\" onclick=\"closeIndustry(); return false;\"><img src=\"../images/icons/Symbol_Delete_2.gif\" alt=\"Close\"/></a>"); ?>
						<h1 id="IndustryName" ></h1>
						<p><label>Description:</label>
						<span id="IndustryDesc"></span>
						</p>
						<p><label>Examples:</label>
						<span id="IndustryEx"></span>
						</p>
						<p><label>Exclusions:</label>
						<span id="IndustryExcl"></span>
						</p>
					<?php echo form::build_box_bottom(); ?>
				</div>
			</td>
		</tr>
		<?php 
		foreach ($industries as $industry) {
		?>
		<tr>
			<td nowrap="nowrap"><input type="radio" id="industry_<?php echo $industry["industry_id"];?>" name="industry_id" value="<?php echo $industry["industry_id"];?>" <?php echo ($industry["industry_id"] == $industry_id)? "checked" : "";?> />
				&nbsp;<label id="lbl_industry_<?php echo $industry["industry_id"];?>" for="industry_<?php echo $industry["industry_id"];?>"><?php echo $industry["industry"];?></label>
				<a href="#" onclick='showIndustry("<?php echo $industry["industry"];?>","<?php echo $industry["description"];?>","<?php echo $industry["examples"];?>", "<?php echo $industry["exclusions"];?>"); return false;'><img src="../images/icons/icon_help.jpg" alt="More info about <?php echo $industry["industry"];?>" /></a>
			</td>
		</tr>
		<?php } ?>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td  align="center">
			<hr/>
			<input type="hidden" name="next_step" id="next_step" />
			<input type="button" value="Save and return to list" id="btnSave" name="btnSaveAndReturn" onclick="validateAndSumit('list')" />
			&nbsp;&nbsp;
			<input type="button" value="Save and add another" id="btnSave" name="btnSaveAndAddAnother" onclick="validateAndSumit('add_another')" /></td>
			
			<td>&nbsp;</td>
		</tr>
	</table>
	<script>
	function validateAndSumit(nextstep) {
		$("#next_step").val(nextstep);
		document.forms[0].submit();
	}
	
	function showIndustry(industry,desc,examples, exclusions)
	{
		$("#IndustryName").text(industry);
		$("#IndustryDesc").text(desc);
		$("#IndustryEx").text(examples);
		$("#IndustryExcl").text(exclusions);
		
		$("#IndustryDetails").show();
	}
	function closeIndustry()
	{
		$("#IndustryDetails").hide();
	}
	</script>
</form>
</div>