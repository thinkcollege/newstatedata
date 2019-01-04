<?php
define('QUADODO_IN_SYSTEM', true);
require_once('../users/includes/header.php');
$qls->Security->check_auth_page('../DMRJobPlacement/dashboard.php');
require_once("../common/classes.php");

?>
	<script type="text/javascript" src="../common/jquery.js"></script>
	<script type="text/javascript" src="../common/calendar/calendar.js"></script>
	<script type="text/javascript" src="../common/calendar/lang/calendar-en.js"></script>
	<script type="text/javascript" src="../common/calendar/calendar-setup.js"></script>
	<link rel="stylesheet" type="text/css" media="screen" href="../common/calendar/skins/aqua/theme.css" />
	<LINK REL='stylesheet' TYPE='text/css' HREF='../common/styles.css'>
<?php
// Look in the USERGUIDE.html for more info
if ($qls->user_info['username'] != '') {

$provider_id = ($qls->user_info['provider_id'] != "0") ? $qls->user_info['provider_id'] : (isset($_GET['jp_dmr_individual_id'])) ? $_REQUEST["provider_id"] : "-1";

$vendor = "";
if ($provider_id != "-1") {
	$query = "select vendor from dmr_providers where provider_id = ". $qls->user_info['provider_id'] ;
	$results = $database->query($query);
	$vendors = $database->mysql_fetch_rowsassoc($results);
	mysql_free_result($results);
	$vendor =$vendors[0]["vendor"];
} else {
	$vendor = "No provide selected";
	
	
}		
?>
<form>
<h1><?php echo $vendor; ?></h1>
<?php
if ($provider_id == "-1") {

	$query = "SELECT * FROM `dmr_providers` order by vendor";
	$results = $database->query($query);
	$providers = $database->mysql_fetch_rowsassoc($results);
	mysql_free_result($results);
	
?>
	Select a provider: <select id="provider_id" name="provider_id">
	<?php foreach ($providers as $provider) {
					?>
						<option value="<?php echo $provider["provider_id"];?>" <?php echo ($provider["provider_id"] == $provider_id)? "selected" : "";?>><?php echo $provider["vendor"];?></option>
					<?php } ?>
	</select>
	<input type="submit" value="Submit" />

	<?} else {
	$today = date("Y-n-j");
	$m = date("n");
	$y = date("Y");
	if ($m == 1)
	{
		$m = 12;
		$y = $y - 1;
	}
	else {
		$m = $m - 1;
	}
	$last_month = "$y-$m-1";
	$date = new DateTime($last_month);

	?>
	<p><b>Reporting period: <?php echo $date->format("F Y");?></b></p>

		<div >
			<?php echo form::build_box_top("This ".date("F")."'s new job placements", "<a href=\"placement.php\">add</a>");
			
			
				$database = Database::getDatabase();

		
				$low_date = $today;
				$m = date("n");
				$y = date("Y");
				$low_date = "$y-$m-1";
				if ($m == 12) {
					$m = 1;
					$y = $y + 1;
				}
				else {
					$m = $m + 1;
				}
				$high_date = "$y-$m-1";
		
				$dFormat = '%m/%d/%Y';	
				$query = "select `jp_dmr_individual_id`, `creation_date`, `provider_id`, `first_name`, `last_name`, `dob`, DATE_FORMAT(dob,'$dFormat') AS dob_f, `zip_code`, `region`, `area_office`, `funded_dmr`, `funded_mrc`, `funded_other`, `start_date`, DATE_FORMAT(start_date,'$dFormat') AS start_date_f, `wages_per_hr`, `hr_per_wk`, `insurance_avail`, `hiring_comp`, `job_title`,  `jp_dmr_individuals`.`industry_id` , `status` , `NAICS_Industry`.`industry` as industry from jp_dmr_individuals inner join  NAICS_Industry ON NAICS_Industry.industry_id = jp_dmr_individuals.industry_id where `start_date` between '$low_date 00:00:00' and '$high_date 23:59:59' and provider_id = ". $provider_id." order by last_name";
				$results = $database->query($query);
				$new_placements = $database->mysql_fetch_rowsassoc($results);
				mysql_free_result($results);
				
				
				$query = "select `jp_dmr_individual_id`, `creation_date`, `provider_id`, `first_name`, `last_name`, `dob`, DATE_FORMAT(dob,'$dFormat') AS dob_f, `zip_code`, `region`, `area_office`, `funded_dmr`, `funded_mrc`, `funded_other`, `start_date`, DATE_FORMAT(start_date,'$dFormat') AS start_date_f, `end_date`, DATE_FORMAT(end_date,'$dFormat') AS end_date_f, `wages_per_hr`, `hr_per_wk`, `insurance_avail`, `hiring_comp`, `job_title`,  `jp_dmr_individuals`.`industry_id` , `status` , `NAICS_Industry`.`industry` as industry from jp_dmr_individuals inner join  NAICS_Industry ON NAICS_Industry.industry_id = jp_dmr_individuals.industry_id where `start_date` < '$low_date 00:00:00'  and provider_id = ". $provider_id." order by last_name";
				$results = $database->query($query);
				$placements_toupdate = $database->mysql_fetch_rowsassoc($results);
				mysql_free_result($results);
				
			?>

			<table id="newPlacements" class="styledtable sortable">
				<thead>
					<tr>
						<th class="nosort" scope="col">&nbsp;</th>
						<th scope="col">First name</th>
						<th scope="col">Last name</th>
						<th scope="col">Job start date</th>
						<th scope="col">Hours per week</th>
						<th scope="col">Hourly wage</th>
						<th scope="col">Eligible for health insurance</th>
						<th scope="col">Industry</th>
						<!-- <th scope="col">Notes</th> -->
						
					</tr>
				</thead>
				<tbody>
				<?php 
			foreach ($new_placements as $new_placement) {
			?>
			<tr>
						<?php
						$html ="<th scope=\"row\" id=\"r1\" class=\"controls\"><a href=\"placement.php?jp_dmr_individual_id=".$new_placement["jp_dmr_individual_id"]."\"><img src=\"../images/icons/Document_2.jpg\" alt=\"Details\" /></a>";
							
								$html .="&nbsp;&nbsp;&nbsp;<a href=\"page.php?dashboad.php=delete_patient&jp_dmr_individual_id=".$new_placement["jp_dmr_individual_id"].\" onclick=\"return confirm('Are you sure you want to delete this indivudual?');\"><img src=\"../images/icons/Symbol_Delete_2.jpg\" alt=\"Delete\" /></a>";
							
							$html .="</th>";
						echo $html;
						?>
						
						<td ><?php echo $new_placement["first_name"];?>&nbsp;</td>
						<td ><?php echo $new_placement["last_name"];?>&nbsp;</td>
						<td ><?php echo $new_placement["start_date_f"];?>&nbsp;</td>
						<td ><?php echo $new_placement["hr_per_wk"];?>&nbsp;</td>
						<td ><?php echo $new_placement["wages_per_hr"];?>&nbsp;</td>
						<td ><?php echo ($new_placement["insurance_avail"] == "1") ? "yes" : "no";?>&nbsp;</td>
						<td ><?php echo $new_placement["industry"];?>&nbsp;</td>
						
					</tr>
					
			<?php } ?>
			
					
				</tbody>
			</table>
			<?php echo form::build_box_bottom(); ?>
		</div>

		<div>

			<?php echo form::build_box_top("Placements to update"); ?>
			<table id="retention" class="styledtable sortable">
				<thead>
					<tr>
						<th scope="col">First name</th>
						<th scope="col">Last name</th>
						<th scope="col">Job start date</th>
						<th scope="col">Status</th>
						<th scope="col">Job end date</th>
					</tr>
				</thead>
				<tbody>
				<?php 
			foreach ($placements_toupdate as $placement_toupdate) {
			?>
			<tr>
					<td ><?php echo $placement_toupdate["first_name"];?>&nbsp;</td>
					<td ><?php echo $placement_toupdate["last_name"];?>&nbsp;</td>
					<td ><?php echo $placement_toupdate["start_date_f"];?>&nbsp;</td>
					<td ><div><select id="status_<?php echo $placement_toupdate["jp_dmr_individual_id"];?>" name="status_<?php echo $placement_toupdate["jp_dmr_individual_id"];?>" onchange="jp_enableEndDate(<?php echo $placement_toupdate["jp_dmr_individual_id"];?>);">
							<option value="Employed" <?php echo ($placement_toupdate["status"] == "Employed")? "selected" : "";?>>Employed</option>
							<option value="Laid off" <?php echo ($placement_toupdate["status"] == "Laid off")? "selected" : "";?>>Laid off</option>
							<option value="Resigned" <?php echo ($placement_toupdate["status"] == "Resigned")? "selected" : "";?>>Resigned</option>
							<option value="Terminated" <?php echo ($placement_toupdate["status"] == "Terminated")? "selected" : "";?>>Terminated</option>
						</select></div>&nbsp;</td>
					<td >
					<?php if ($placement_toupdate["status"] == "Employed") {
								echo formBase::build_date_picker("end_date_" . $placement_toupdate["jp_dmr_individual_id"], "","false","display:none");		
								echo "<div id=\"spacer_end_date".$placement_toupdate["jp_dmr_individual_id"]." style=\"display:none\">&nbsp;</div>";
							} else {
								echo formBase::build_date_picker("end_date_" . $placement_toupdate["jp_dmr_individual_id"], $placement_toupdate["end_date_f"]);
								echo "<div id=\"spacer_end_date".$placement_toupdate["jp_dmr_individual_id"]." >&nbsp;</div>";
							}?></td>
						
			</tr>
					
			<?php } ?>
			
				</tbody>
			</table>
			<input type="button" value="save all updates"/>
			<?php echo form::build_box_bottom(); ?>
		</div>
		</form>
		<script>
		function jp_enableEndDate(id) {
			if ($("#status_" + id).val() !="Employed") {
				$("#container_end_date_" + id).show();
				$("#spacer_end_date" + id).hide();
			}
			else {
				$("#container_end_date_" + id).hide();
				$("#spacer_end_date" + id).show();
				$("#end_date_" + id).val("");
			}
		}
		</script>
	<!--
	You are logged in as <?php echo $qls->user_info['username']; ?><br />
	Your email address is set to <?php echo $qls->user_info['email']; ?><br />
	There have been <b><?php echo $qls->hits('members.php'); ?></b> visits to this page.
	-->
<?php
	} //provider_id = -1
}
else {
?>

You are currently not logged in. Please go to the <a href="../users/login.php">login page</a>.

<?php
}
?>