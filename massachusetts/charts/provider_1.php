<?php
//error_reporting(E_ALL);
//ini_set('display_errors', TRUE);
//ini_set('display_startup_errors', TRUE);
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
ini_set("include_path","../../");
include("common/classes_ma.php");
$template=new template;
$template->debug();
$template->define_file('dds_template.php');
$template->add_region('title', '<?php $mre_base=new mre_base; echo $mre_base->mre_base_sitename;?> - Provider Comparison Report');
$template->add_region('sidebar', '<?php $area="provider"; $show_flash_link = 0; ?>');
$template->add_region('heading', 'Provider Comparison Report');


$html	= '<form method="post" action="charts/provider_2.php">'
		. dds2::getFilters('provider')
 		. '<p><label for="report">Select Report:</label> <select name="report" id="report">'
		. '<option value="number">Number participating by Activity</option><option value="hours">Hours of Participation by Activity</option>'
		. '<option value="wage">Wages (during rep. per.)</option>'
    // .  '<option value="pto">Number receiving paid time off</option></select></p>'

	 	. '<p><br /><input type="submit" class="submit" value="Submit" /></p></form>';

$template->add_region('content', $html);
include("header.php");
$template->make_template();
include("footer.php");
