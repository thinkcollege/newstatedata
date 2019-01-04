<?php
$template->addRegion('heading', 'Report Monthly Job Placements for ' . date('F Y'));
$template->addRegion('content', '<div id="placements"></div>');
if (date('d') > 15) {
	$template->addRegion('content', '<p class="error">The reporting period for this month has closed.</p>');
}