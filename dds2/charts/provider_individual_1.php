<?php
ini_set("include_path","../../");

include("common/classes_ma.php");
$template=new template;
$template->debug();
$template->define_file('dds_template.php');
$template->add_region('title', '<?php $mre_base=new mre_base; echo $mre_base->mre_base_sitename;?> - Provider Report');
$template->add_region('sidebar', '<?php $area="providerindividual"; $show_flash_link = 0; ?>');
$template->add_region('heading', 'Provider Report');
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : '';
$f		= dds2::getFilterValues(); 

$html 	= '<form method="post" action="charts/provider_individual_' . ($action == "showregion" ? 2 : 1) . '.php" onsubmit="javascript:return validate(this);">';
if ($action != "showregion") {
 	$html  .= '<input type="hidden" name="action" value="showregion">' . dds2::getFilters('individual');
} else {
	$html  .= dds2::passFilters() . "<p><strong>Year: {$f['year']}</strong></p>"
			. "<p><strong>Provider: " . dds2::getProviderName($f['provider']) .
            ($f['from'] ? "<p>Ages: {$f['from']} to {$f['to']}</p>" : "") .  "</strong>"
			. '<p><label for="region">Select a region:</label> ' . dds2::getRegions("r", 1,1, $f['provider'], 'individual', $f['year']) . '</p>';
}
$html  .= '<p><input type="submit" class="submit" value="Generate Report" /></p></form><br>';

$template->add_region('content', $html);
//write page
include("header.php");

$template->make_template();
include("footer.php");