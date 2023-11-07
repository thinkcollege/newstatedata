<?php
ini_set("include_path", "../");
include("common/classes_ma.php");
header('Content-Type: text/plain', true);
$y = !empty($_GET['y']) ? (int) $_GET['y'] : 2022;
$r = !empty($_GET['r']) ? $_GET['r'] : '';
$a = !empty($_GET['ao']) ? $_GET['ao'] : '';
$p = !empty($_GET['p']) ? $_GET['p'] : '';
$cols = count($_GET) == 2 ? '`area_office` AS `val`, `area_office` AS `opt`' : '`vendor` AS `opt`, `vendor_id` AS `val`';
$where	= ($r ? "`region` = '$r' AND `area_office` IS NOT NULL AND TRIM(`area_office`) <> '' AND `Reporting_Period` = $y" : '') . ($r && $a ? ' AND ' : "")
		. ($a ? "`area_office` = '$a' AND `vendor_id` IS NOT NULL AND `vendor_id` <> 0 AND `Reporting_Period` = $y" : '') ;

print '<option value="0">All Providers</option>';
$db = Database::getDatabase();
$rs = $db->query("SELECT DISTINCT `Vendor` AS `opt`, `Vendor_ID` AS `val` FROM `spec_dmr6` WHERE `Reporting_Period` = '$y' ORDER BY `Vendor`");
while ($row = mysqli_fetch_assoc($rs)) {
		print '<option value="' . htmlentities($row['val'], ENT_COMPAT, 'UTF-8') . '">' . htmlentities(trim($row['opt']), ENT_COMPAT, 'UTF-8') . "</option>";
}
