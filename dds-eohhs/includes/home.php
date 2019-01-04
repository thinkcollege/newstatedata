<?php
$template->addRegion('heading','MA DDS Individual Job Placement Reporting Tool');
$content = <<<DOC
<p><strong>DDS Employment Supports Performance Outcome Information System</strong><br />
This web site summarizes data collected on employment supports funded by the Massachusetts DDS. Data are reported quarterly at the individual level. <!-- The query modules allow users to create reports based on a number of individual characteristics.--></p>
<ul><li>To enter a new consumer click the Add Consumer button. A new placement may be added at any time.  Once a quarter you will be asked to verify existing and new job placements.  Once the status of all placements in Existing and New placements have been set you can save the status by clicking the Verify Status button when it is available.</li>
<li>When entering a new placement click the Add Placement button.  Start by typing the consumer's name in the Consumer text box once the consumer is selected in the drop down list hit Enter or Return to select them.  If the consumer is not listed you will need to add them.  The Empolyer field can either be filled with an existing Employer or a new one added.</li>
<li>Use the Refresh button belowe if another user has added a placement and you are not seeing it.</li>
<li>If you'd like to hide a consumer from the available consumers when adding placements click the Edit Consumers button and then click the checkbox next to their name.</li></ul>
<form id="entry" action="./" method="post" onsubmit="javascript:return false;">
  <div id="tabs">
	<ul>
		<li><a id="new-tab" href="#new">New Job Placements</a></li>
		<li><a id="existing-tab" href="#existing">Existing Jobs</a></li>
		<li><a id="separated-tab" href="#separated">Separated Jobs</a></li>
		<li><a id="all-tab" href="#all">All Job Placements</a></li>
	</ul>
	<div id="new">
		<table border="0" cellspacing="0" cellpadding="0" class="table-autosort table-autofilter">
			<thead class="ui-widget-header">
				<tr>
					<th class="table-sortable:alphanumeric">Consumer<br/><input type="text" onkeyup="Table.filter(this,this);" value="" /></th>
					<th>Status</th>
					<th class="table-sortable:alphanumeric table-filterable">Region</th>
					<th class="table-sortable:alphanumeric table-filterable">Area Office</th>
					<th class="table-sortable:alphanumeric">Employer<br/><input type="text" onkeyup="Table.filter(this, this);" value="" /></th>
					<th class="table-sortable:date">Start Date</th>
					<th>Job Title</th>
					<th>Health care?<br><select onchange="Table.filter(this,this);"><option>All</option><option>Yes</option><option>No</option></select></th>
					<th>Hours / week</th>
					<th>Hourly Wage</th>
					<th>Notes</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
	<div id="existing"></div>
	<div id="separated"></div>
	<div id="all"></div>
  </div>
  <p id="actions">
	<button id="refresh"><span class="ui-icon ui-icon-refresh"></span> Refresh</button>
	<button id="add-placement-button"><span class="ui-icon ui-icon-plus"></span> Add Placement</button>
	<button id="add-consumer-btn"><span class="ui-icon ui-icon-plus"></span> Add Consumer</button>
	<button id="edit-consumers-btn"><span class="ui-icon ui-icon-pencil"></span> Edit Consumers</button>
	<a href="/users/logout.php" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only"><span class="ui-button-text">Logout</span></a>
  </p>
</form>
<div id="add-consumer" title="Add a New Consumer">
 	<form id="consumer" action="" method="get">
		<input type="hidden" id="id" value="" />
		<p><label>First Name:<br/><input type="text" id="fname" value="" /></label></p>
		<p><label>Last Name:<br/><input type="text" id="lname" value="" /></label></p>
		<p><label>Date of Birth<br/><input type="text" id="dob" class="datepicker" size="10" value="" /></label></p>
		<p><input type="checkbox" id="status" value="1" /> <label for="status">Hide Consumer</label></p>
	</form>
</div>
<div id="add-placement" title="Add/Edit Job PLacement">
	<form id="consumer" action="" method="get">
		<input type="hidden" id="id" class="placement-id" name="id" value="" />
		<p><label>Consumer<br/><input type="text" id="consumerId" name="consumerId" class="required" size="30" value=""></label></p>
		<p>
			<label>Region<br><select id="regionId" name="regionId" class="required"><option></option></select></label>
			<label>Area Office<br><select id="areaOfficeId" name="areaOfficeId" class="required oncreate-empty oncreate-disable" disabled="disabled"></select></label>
		</p>
		<p>
			<label>Start Date<br><input type="text" class="datepicker required" id="start" name="start" size="10" value=""></label>
			<label>End Date<br><input type="text" class="datepicker" id="end" name="end" size="10" value=""></label>
			<label>Status<br><select id="status" name="status"></select></label>
		</p>
		<p>
			Eligible for health care?
			<label><input type="radio" id="healthCare2" name="healthCare" class="required" value="2"> Yes</label>
			<label><input type="radio" id="healthCare1" name="healthCare" class="required" value="1"> No</label>
		</p>
		<p>
			<label>Job Title<br><input type="text" id="title" name="title" class="required" value=""></label>
			<label>Hour / week<br><input type="text" id="hours" name="hours" class="required" size="5" value=""></label>
		</p>
		<p>
			<label>Employer<br><input type="text" id="employer" name="employer" class="required" value=""></label>
			<label>Hourly wage<br>$<input type="text" id="wage" name="wage" class="required" size="5" value=""></label>
		</p>
		<p><label for="notes">Notes</label><br><textarea id="notes" rows="2" cols="20" style="width:99%;"></textarea></p>
	</form>
</div>
<div id="edit-consumers">
	<form id="edit-consumers-form" action="" method="post">
		<input type="hidden" name="ajax" value="saveConsuemrs" />
		<p>Select each consumer to hide them from the consumer list when adding a consumer.</p>
		Hide Name
		<ul id="consumers"></ul>
	</form>
</div>
<script type="text/javascript">function mainFunc() { dds.eohis.loadDataEntry(); }</script>
DOC;
/*$content .= '<p>This site was developed by StateData.info, a project of the Institute for Community Inclusion, University of Massachusetts Boston, for the Washington DSHS Division of Developmental Disabilities. For more information on StateData.info or the work of the Institute for Community Inclusion.</p>
<p class="center float-left" style="width:49%;">Frank A. Smith, M.A.<br />Project Coordinator<br /><a href="mailto:frank.smith@umb.edu?subject=Question/Comment about WA-DDD">frank.smith@umb.edu</a><br />617.287.4374.</p>
<p class="center float-right" style="width:49%;">John Butterworth, Ph.D.<br />Research Coordinator<br /><a href="mailto:john.butterworth@umb.edu?subject=Question/Comment about WA-DDD">john.butterworth@umb.edu</a><br />617.287.4357</p>';*/

$template->addRegion('content', $content);
