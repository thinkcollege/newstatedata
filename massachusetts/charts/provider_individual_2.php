<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
ini_set("include_path","../../");
include("common/classes_ma.php");
$template = new template;
$template->debug();
$print = !empty($_REQUEST["print"])  && strlen($_REQUEST["print"]) < 3 ? htmlentities($_REQUEST["print"]) : '';
$template->define_file('dds_print_template.php');
$template->add_region('title','DDS Employment Outcome Information System Provider Individual Report');

$f			= dds2::getFilterValues();
$sRegion	= strpos($f['region'], "x_") === 0 ? substr($f['region'], 2) : $f['region'];

$template->add_region('heading', "<em><a href=\"/massachusetts/\" style=\"color: #8d2421;\">DDS Employment Outcome Information System</a> Provider Individual Report<br>"
	. dds2::getProviderName($f['provider']) . "<br>{$f['year']} for "
	. (!$sRegion ? 'all regions' : $sRegion) . '</em>');
$template->add_region('sidebar', '<?php $area="providerindividual"; $show_flash_link = 0; ?>');

$html		= '';
$html .= $f['year'] < 2017 ? "<p style=\"font-size: 120%\"><strong>Note: data collection methods changed in 2017.  Zero values below may reflect data not collected, not totals of zero." : "";
$providers	= array($f['provider']);
sort($providers);
//print "\n<!-- " . var_dump ($f) . "\n-->\n";
$regions	= !$f['region'] ? dds2::getRegionArrayById($f['provider']) : array($f['region']);

$reports	= $f['year'] < 2017 ? array("number","hours", "wage") : array("number", "jswraparound","hours", "wage","selfemp");
$colSpan	= $f['year'] == "ALL" || $f['year'] >= 2007 ? 6 : 5;
$csvoutput = 'DDS Employment Outcome Information System Provider Individual Report' . "\r\n";
foreach ($reports as $report) {
	if ($report == "number") {
		$html  .= '<p><span class="mainheading">Number Participating by Activity</span>'
				. '<table border="1" cellspacing="0" cellpadding="0" class="dmrdata">'
				. '<tr><td rowspan="2">&nbsp;</td>';
		//if (!$f['region'] || $f['region'] == 'all' || 1==1) {
		//	$html  .= '<td rowspan="2">Region</td>';
		//}
		if ($f['year'] >= 2017) {

			$csvoutput .= 'Number Participating by Activity' . "\r\n"
			. '"","Total Served (unduplicated count)",Number entered a new individual job in the previous 12 months,#in Individual Competitive Employment,# in Group Integrated Employment, # in Self Employment,# in Job Search, # in Other Day Support and Wrap Around Activities,% inIndividual Competitive Employment,%$ in Group Integrated Employment,% in Self Employment, % in Job Search, % in Other Day Support and Wrap-around Activities ' . "\r\n\"";

			$html  .= '<td rowspan="2">Total Served<BR>(unduplicated count)</td>'
					. ($f['year'] != "ALL" && $f['year'] >= 2007
					? '<td rowspan="2">Number entered<BR>a new individual job<BR>in the previous<BR>12 months</td>' : '')
					. "<td colspan=\"5\" align=\"center\">Number Participating in activity</td>"
					. "<td colspan=\"5\" align=\"center\">Percent participating in activity</td>"
					. '</tr><tr><td align="center">Individual<br>Competitive<br>Employment</td>'
					. '<td align="center">Group<br>Integrated<br>Employment</td><td align="center">Self employment</td>'
					. '<td align="center">Job<br>Search'
					. '</td><td align="center"">Other day <br />support wrap-around<br />services</td>'
					. '<td align="center">Individual<br>Competitive<br>Employment</td>'
					. '<td align="center">Group<br>Integrated<br>Employment</td><td align="center">Self employment</td>'
					. '<td align="center">Job<br>Search'
					. '</td><td align="center"">Other day <br />support wrap-around<br />services</td>'
					. "</tr>";
				} else {
					$html  .= '<td rowspan="2">Total Served<BR>(unduplicated count)</td>'
					. ($f['year'] != "ALL" && $f['year'] >= 2007
					? '<td rowspan="2">Number entered<BR>a new individual job<BR>in the previous<BR>12 months</td>' : '')
					. "<td colspan=\"$colSpan\" align=\"center\">Number Participating in activity</td>"
					. "<td colspan=\"$colSpan\" align=\"center\">Percent participating in activity</td>"
					. '</tr><tr><td align="center">Individual<br>Supported<br>Job</td>'
					. '<td align="center">Group<br>Supported<br>Job</td><td align="center">Facility<br>Based<br>Work</td>'
					. '<td align="center">Volunteer<br>' . ($f['year'] < 2007 ? 'or Non-Work<br>Activity' : 'Work')
					. '</td><td align="center"">In<br>Transition</td>'
					. ($f['year'] == "ALL" || $f['year'] >= 2007
						? '<td align="center">Other<br>Non-Paid<br>Service</td>' : '')
					. '<td align="center">Individual<br>Supported<br>Job</td>'
					. '<td align="center">Group<br>Supported<br>Job</td><td align="center">Facility<br>Based<br>Work</td>'
					. '<td align="center">Volunteer<br>' . ($f['year'] < 2007 ? 'or Non-Work<br>Activity' : 'Work')
					. '</td><td align="center">In<br>Transition</td>'
					. ($f['year'] == "ALL" || $f['year'] >= 2007 ? '<td align="center">Other<br>Non-Paid<br>Service</td>' : '')
					. "</tr>";
				}
	} elseif($report == "jswraparound") {
		$html  .= '<p><span class="mainheading">Subtotals for Job Search and Wrap-around Activities</span>'
				. '<table border="1" cellspacing="0" cellpadding="0" class="dmrdata">'
				. '<tr><td rowspan="2">&nbsp;</td>';
		//if (!$f['region'] || $f['region'] == 'all' || 1==1) {
		//	$html  .= '<td rowspan="2">Region</td>';
		//}
		$csvoutput .="\r\n\r\nSubtotals for Job Search and Wrap-around Activities" ."\r\n"
					.'"","Total Served (unduplicated count)",Number Participating in job search activities,Discovery or career planning, Job Development,Day and Wrap-Around (total),Community based day services,Day habilitiation program, Other day support services' . "\r\n\"";


		$html  .= '<td rowspan="2">Total Served<BR>(unduplicated count)</td>'
				.  '<td rowspan="2">Job Search (Total)</td>'
				. "<td colspan=\"2\" align=\"center\">Number Participating in job search activities</td>"
				. '<td rowspan="2">Day and <br />wrap-around <br />activites (Total)</td>'

				. "<td colspan=\"3\" align=\"center\">Number Participating day and wrap-around activities</td>"

				. "</tr><tr><td align=\"center\">Discovery or <br />career planning</td>"
				. '<td align="center">Job development<br />activities</td>'
				. '<td align="center">Community based<br />day services</td>'
				. '<td align="center">Day habilitation <br />program</td>'
				. '<td align="center"">Other day <br />support services</td>'
				. "</tr>";

	} elseif ($report == "hours") {
		$csvoutput .="\r\n\r\nHours of Participation by Activity" ."\r\n"
					.'"","Total Served (unduplicated count)",Number entered a new individual job in the previous 12 months,Mean hours -- individual competitive employment,Mean hours --group integrated employment, % of hours in activity -- individual competitive employment, % of hours in activity -- group integrated employment' . "\r\n\"";
		$html  .= '<p><span class="mainheading">Hours of Participation by Activity</span></p>'
				. '<table border="1" cellspacing="0" cellpadding="0" class="dmrdata">'
				. '<tr><td rowspan="2">&nbsp;</td>';
		//if (!$f['region'] || $f['region'] == 'all' || 1==1) {
		//	$html  .= '<td rowspan="2">Region</td>';
		//}
		if ($f['year'] >= 2017) {
			$html  .= '<td rowspan="2">Total Served<BR>(unduplicated count)</td>'
				. ($f['year'] !="ALL" && $f['year'] >= 2007
					? '<td rowspan="2">Number entered<BR>a new individual job<BR>in the previous<BR>12 months</td>' : '')
				. "<td colspan=\"2\" align=\"center\">Mean hours per person participating in activity for month</td>"
				. "<td colspan=\"2\" align=\"center\">Percent of total hours in activity for month</td>"
				. '</tr><tr><td align="center">Individual<br>Competitive<br>Employment</td>'
				. '<td align="center">Group<br>Integrated<br>Employment</td>'
				//. '<td align="center">Self<br>Employment</td>'
				. '<td align="center">Individual<br>Competitive<br>EmploymentJob</td><td align="center">Group<br>Integrated<br>Employment</td>'
				//. '<td align="center">Self<br>Employment</td>'

				. "</tr>";

		} else {
			$html  .= '<td rowspan="2">Total Served<BR>(unduplicated count)</td>'
					. ($f['year'] !="ALL" && $f['year'] >= 2007
					? '<td rowspan="2">Number entered<BR>a new individual job<BR>in the previous<BR>12 months</td>' : '')
					. "<td colspan=\"$colSpan\" align=\"center\">Mean hours per person participating in activity for month</td>"
					. "<td colspan=\"$colSpan\" align=\"center\">Percent of total hours in activity for month</td>"
					. '</tr><tr><td align="center">Individual<br>Supported<br>Job</td>'
					. '<td align="center">Group<br>Supported<br>Job</td>'
					. '<td align="center">Facility<br>Based<br>Work</td>'
					. '<td align="center">Volunteer<br>' . ($f['year'] < 2007 ? 'or Non-Work<br>Activity' : 'Work')
					. '</td><td align="center"">In<br>Transition</td>'
					. ($f['year'] == "ALL" || $f['year'] >= 2007
					? '<td align="center">Other<br>Non-Paid<br>Service</td>' : '')
					. '<td align="center">Individual<br>Supported<br>Job</td><td align="center">Group<br>Supported<br>Job</td>'
					. '<td align="center">Facility<br>Based<br>Work</td>'
					. '<td align="center">Volunteer<br>' . ($f['year'] < 2007 ? 'or Non-Work<br>Activity' : 'Work')
					. '</td><td align="center">In<br>Transition</td>'
					. ($f['year'] == "ALL" || $f['year'] >= 2007
					? '<td align="center">Other<br>Non-Paid<br>Service</td>' : '')
					. "</tr>";
			}

	} elseif ($report == "wage") {
		$csvoutput .="\r\n\r\nMonthly Wages" ."\r\n"
					.'"","Total Served (unduplicated count)",Number entered a new individual job in the previous 12 months,Mean wages -- individual competitive employment,Mean wages --group integrated employment, % earning above minimum wage -- individual competitive employment, % earning above minimum wage -- group integrated employment' . "\r\n\"";
		$html  .= '<p><span class="mainheading">Monthly Wages</span></p>'
				. '<table border="1" cellspacing="0" cellpadding="0" class="dmrdata">'
				. '<tr><td rowspan="2">&nbsp;</td>';
		//if (!$f['region'] || $f['region'] == 'all' || 1==1) {
		//	$html  .= '<td rowspan="2">Region</td>';
		//}
		if ($f['year'] >= 2017) {
			$html  .= '<td rowspan="2" align="center">Total Served <BR>(unduplicated count)</td>'
					. ($f['year'] != "ALL" && $f['year'] >= 2007
					? '<td rowspan="2">Number entered<br>a new individual job<br>in the previous<BR>12 months</td>' : '')
					. '<td colspan="2" align="center">Mean monthly wage</td><td colspan="2" align="center">Percent earning above minimum wage</td>'
					. '</tr><tr><td align="center">Individual<br>Competitive<br />Employment</td>'
					. '<td align="center">Group<br>Integrated<br />Employment</td>'
					. '<td align="center">Individual<br>Competitive<br />Employment</td>'
					. '<td align="center">Group<br>Integrated<br />Employment</td></tr>';

		} else {
					$html  .= '<td rowspan="2" align="center">Total Served <BR>(unduplicated count)</td>'
					. ($f['year'] != "ALL" && $f['year'] >= 2007
					? '<td rowspan="2">Number entered<br>a new individual job<br>in the previous<BR>12 months</td>' : '')
					. '<td colspan="3" align="center">Mean monthly wage</td><td colspan="3" align="center">Percent earning above minimum wage</td>'
					. '</tr><tr><td align="center">Individual<br>Supported Job</td>'
					. '<td align="center">Group<br>Supported Job</td><td align="center">Facility Based<br>Work</td>'
					. '<td align="center">Individual<br>Supported Job</td><td align="center">Group<br>Supported Job</td>'
					. '<td align="center">Facility Based<br>Work</td></tr>';
				}
	} elseif($report == "selfemp") {
		$csvoutput .="\r\n\r\nSelf Employment Averages for a Three Month Period" ."\r\n"
					.'"","Total Served (unduplicated count)",Number of individs. in self employment,Mean hours in self employment, Mean self employment earnings, Mean self employment expenses,Mean net self employment earnings' . "\r\n\"";
		$html  .= '<p><span class="mainheading">Self Employment Averages for a Three Month Period</span>'
				. '<table border="1" cellspacing="0" cellpadding="0" class="dmrdata">'
				. '<tr><td rowspan="2">&nbsp;</td>';
		//if (!$f['region'] || $f['region'] == 'all' || 1==1) {
		//	$html  .= '<td rowspan="2">Region</td>';
		//}


		$html  .= '<td rowspan="2">Total Served<BR>(unduplicated count)</td>'
				.'<td rowspan="2">Number of individs.<br />in self employment</td>'
				. "<td colspan=\"5\" align=\"center\">Averages</td>"


				.  '</tr><tr><td align=\"center\">Mean Hours in<br />Self Employment</td>'

				. "<td align=\"center\">Mean self<br />employment earning</td>"
				. '<td align="center">Mean self<br />employment expenses</td>'
				. '<td align="center">Mean net self<br />employment earnings</td>'
				. "</tr>";

	}

	//foreach ($providers as $provider) {
		$html  .= dds2::getRowData('individual', $report);
	//}
	$html .= "</table>\n";
	$csvoutput .= str_replace(array('</td><td>','</td></tr><td>','</td></tr>','<strong>','</strong>','<td><aa/>','<aa/>','<zz/>','<rr/>'),array("\",\"","\"\r\n\"","\"\r\n",'','','','','',''),dds2::getRowData('individual', $report));

}
$template->add_region('content', $html);
include("header.php");
$template->make_template();
include("footer.php");
