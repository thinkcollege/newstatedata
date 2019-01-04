<?php
$template->addRegion('heading','MA DDS Employment Supports Performance Outcome Information System');
$content = <<<DOC
<p><strong>DDS Employment Supports Performance Outcome Information System</strong><br />
This web site summarizes data collected on employment supports funded by the Massachusetts DDS. Data are reported monthly at the individual level. The query modules allow users to create reports based on a number of individual characteristics.</p>
<p>To enter a new consumer click the <span class="ui-icon ui-icon-plus">add consumer link</span>. Once all new job placements for the previous month have been entered click "Existing job placements" to update previously entered job placements.  Once all job placements have been entered or updated click Save.</p>
<p>When entering a new placement start by typing the consumer's name in the Consumer column and then click or press enter when the correct consumer is highlighted.  The same approach works for the placement's industry.  The Empolyer field can either be filled with an existing Employer or a new one added.</p>
<form id="entry" action="./" method="post">
  <div id="tabs">
	<ul>
		<li><a id="new-tab" href="#new">New Job Placements</a></li>
		<li><a id="existing-tab" href="#existing">Existing Jobs</a></li>
		<li><a id="sparated-tab" href="#separated">Separated Jobs</a></li>
		<li><a id="all-tab" href="#all">All Job Placements</a></li>
	</ul>
	<div id="new">
		<table border="0" cellspacing="0" cellpadding="0">
			<thead class="ui-widget-header">
				<tr>
					<th>Consumer <a href="javascript:$('#add-consumer').dialog('open');" class="ui-icon ui-icon-plus" style="display:inline-block;">add consumer</a></th>
					<th>Region</th>
					<th>Area Office</th>
					<th>Start Date</th>
					<th>Job Title</th>
					<th>Health care?</th>
					<th>Hours / week</th>
					<th>Hourly Wage</th>
					<th>Employer / Industry</th>
					<th>Notes</th>
				</tr>
			</thead>
			<tbody class="onchange-new">
				<tr class="blank">
					<td>
						<input type="hidden" id="id1" name="c[1][id]" value="" />
						<label>
							<span class="ui-helper-hidden-accessible">Consumer </span>
							<input type="text" id="consumerId1" name="c[1][consumerId]" class="required" size="30" value="">
						</label>
					</td>
					<td><label><span class="ui-helper-hidden-accessible">Region </span><select id="regionId1" name="c[1][regionId]" class="required"><option></option></select></label></td>
					<td><label><span class="ui-helper-hidden-accessible">Area Office </span><select id="areaOfficeId1" name="c[1][areaOfficeId]" class="required oncreate-empty oncreate-disable" disabled="disabled"></select></label></td>
					<td><label><span class="ui-helper-hidden-accessible">Job Start Date </span><input type="text" class="datepicker required" id="start1" name="c[1][start]" size="11" value=""></label></td>
					<td><label><span class="ui-helper-hidden-accessible">Job Title </span><input type="text" id="title1" name="c[1][title]" class="required" value=""></label></td>
					<td>
						<span class="ui-helper-hidden-accessible">Eligible for health care? </span>
						<label><input type="radio" id="healthCare1a" name="c[1][healthCare]" class="required" value="2"> Yes</label>
						<label><input type="radio" id="healthCare1b" name="c[1][healthCare]" class="required" value="1"> No</label>
					</td>
					<td><label><span class="ui-helper-hidden-accessible">Hour pwr week </span><input type="text" id="hours1" name="c[1][hours]" class="required" size="5" value=""></label></td>
					<td><label><span class="ui-helper-hidden-accessible">Hourly wage </span>$<input type="text" id="wage1" name="c[1][wage]" class="required" size="5" value=""></label></td>
					<td>
						<label><span class="ui-helper-hidden-accessible">Employer </span><input type="text" id="employer1" name="c[1][employer]" class="required" value=""></label>
						/ <label><span class="ui-helper-hidden-accessible">Industry </span><input type="text" id="industryId1" name="c[1][industryId]" class="required" value=""></label>
					</td>
					<td><label><span class="ui-helper-hidden-accessible">Notes </span><input type="text" id="notes1" name="c[1][notes]" value=""></label></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div id="existing"></div>
	<div id="separated"></div>
	<div id="all"></div>
  </div>
  <p><input type="button" value="Save" onclick="javascript:dds.eohis.savePlacements();" /></p>
</form>
<div id="add-consumer" title="Add a New Consumer">
 	<form id="consumer" action="" method="get">
		<p><label>First Name:<br/><input type="text" id="fname" value="" /></label></p>
		<p><label>Last Name:<br/><input type="text" id="lname" value="" /></label></p>
		<p><label>Date of Birth<br/><input type="text" id="dob" class="datepicker" size="10" value="" /></label></p>
	</form>
</div>
<script type="text/javascript">function mainFunc() { dds.eohis.loadDataEntry(); }</script>
DOC;
/*$content .= '<p>This site was developed by StateData.info, a project of the Institute for Community Inclusion, University of Massachusetts Boston, for the Washington DSHS Division of Developmental Disabilities. For more information on StateData.info or the work of the Institute for Community Inclusion.</p>
<p class="center float-left" style="width:49%;">Frank A. Smith, M.A.<br />Project Coordinator<br /><a href="mailto:frank.smith@umb.edu?subject=Question/Comment about WA-DDD">frank.smith@umb.edu</a><br />617.287.4374.</p>
<p class="center float-right" style="width:49%;">John Butterworth, Ph.D.<br />Research Coordinator<br /><a href="mailto:john.butterworth@umb.edu?subject=Question/Comment about WA-DDD">john.butterworth@umb.edu</a><br />617.287.4357</p>';*/

$template->addRegion('content', $content);