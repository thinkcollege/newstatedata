<?php
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="Massachusetts_DDS_data_' . date('m-d-Y') . '.csv"');
$csv = $_REQUEST['csv'];
echo $csv;
?>
