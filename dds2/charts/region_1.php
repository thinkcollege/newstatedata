<?php 
ini_set("include_path","../../");
include("common/classes_ma.php");
$template = new template;
$template->debug();
$template->define_file('dds_template.php');
$template->add_region('title', '<?php $mre_base=new mre_base; echo $mre_base->mre_base_sitename;?> - Summary by Region');
$template->add_region('sidebar', '<?php $area="region"; $show_flash_link = 0; ?>');
$template->add_region('heading', 'Summary by Region');

$f		= dds2::getFilterValues();
$html	= "<form method=\"post\" action=\"./charts/region_" . ($f['year'] ? 2 : 1) . ".php\">"
		. '<p><input type="submit" class="submit" value="submit" /></p>'
		. dds2::getFilters('region')
		. ($f['year'] ? "<p><label for=\"var\">Select Variable:</label> " . dds2::getRegionVariables($f['year']) . "</p>" : '')
 		. "<p><input type=\"submit\" class=\"submit\" value=\"submit\" /></p>"
		. "</form><br />";

$template->add_region('content', $html);
include("header.php");
$template->make_template(); 
include("footer.php");