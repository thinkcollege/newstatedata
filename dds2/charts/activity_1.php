<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set("include_path","../../");
include("common/classes_ma.php");
$template = new template;
$template->debug();
$template->define_file('dds_template.php');
$template->add_region('title','<?php $mre_base=new mre_base; echo $mre_base->mre_base_sitename;?> - Summary Reports');
$template->add_region('sidebar','<?php $area="activity"; $show_flash_link = 0; $file_path = "../../"; ?>');
$template->add_region('heading','Summary Reports');
$html	= '<form id="summform" method="post" action="charts/activity_2.php">'

		. dds2::getFilters('activity')

 		. '<div id="subcont"></div><p><input id="sumsubmit" type="submit" class="submit" value="submit"></p>'
		. '<script type="text/javascript">function validate(elm){return true;}</script></form>';
$template->add_region('content', $html);
include("header.php");
$template->make_template();
include("footer.php");
