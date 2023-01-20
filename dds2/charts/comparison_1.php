<?php 
ini_set("include_path","../../");
include("common/classes_md.php");
$template = new template;
$template->define_file('dds_template.php');
$template->add_region('title','<?php $mre_base=new mre_base; echo $mre_base->mre_base_sitename;?> - Provider Comparison');
$template->add_region('heading','State Comparison');
$template->add_region('sidebar','<?php  $area="comparison"; $show_flash_link = 0; ?>');

$f	  = dds2::getFilterValues();
$html = "<form method=\"post\" action=\"charts/comparison_" . ($f['year'] ? 2 : 1) . ".php\">"
	  . '<p><input type="submit" class="submit" value="submit"></p>';

if (!$f['year']) {
	$html .= dds2::getFilters('comparison');
} else {
 	$html  .= "<p><strong>Selected Year: {$f['year']}<input type=\"hidden\" name=\"year\" value=\"{$f['year']}\" /></p>"
			. "<p><label for=\"var\">Select Variable:</label> " . dds2::getRegionVariables($f['year']) . "</p>"
			. dds2::passFilters();
}
$html .= '<p><input type="submit" class="submit" value="submit"></p>';
$template->add_region('content', $html);
include("header.php");
$template->make_template(); 
include("footer.php");