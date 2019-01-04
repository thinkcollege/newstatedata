<?php
class dds_template extends go_template {

	public function getHTML($mode = template::MODE_DISPLAY) {
		$doc = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><title>{title}</title>
 <base href="{_base}" />
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <link rel="stylesheet" type="text/css" href="https://www.statedata.info/common/styles.css" media="all" />
 <link rel="stylesheet" type="text/css" href="https://www.statedata.info/common/side_menu.css" media="screen" />
 <link rel="stylesheet" type="text/css" href="./0.css" media="screen" />
 <link rel="stylesheet" type="text/css" href="./p.css" media="print" />'
. ($mode == template::MODE_EMAIL ? '<link rel="stylesheet" type="text/css" href="./e.css" media="all" />' : '') . '
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
 <script type="text/javascript" src="./0.js" defer="defer"></script>
</head>
<body>
<div id="skip"><a href="#side_menu">Skip to navigation and funders</a></div>
<div id="main">
	<h1>{heading}</h1>
	{content}';
	$doc .= '<ul id="funders">';
	foreach ($this->funders as $url => $img) {
		$doc .= '<li><a href="' . htmlentities($url, ENT_COMPAT, 'UTF-8') . '"><img src="' . htmlentities($img, ENT_COMPAT, 'UTF-8') . '" alt="' . htmlentities($url, ENT_COMPAT, 'UTF-8') . '" /></a></li>';
	}
	$doc .= '</ul></div>
<div id="top">{top}</div>
<ul id="nav">';
		if (go_user::getInstance()->loggedIn() && $mode == template::MODE_DISPLAY && !empty($this->sideMenu)) {
			$doc .= '';
			foreach ($this->sideMenu as $url => $text) {
				$doc .= '<li><a href="' . htmlentities($url, ENT_COMPAT, 'UTF-8') . '">' . htmlentities($text, ENT_COMPAT, 'UTF-8') . '</a></li>';
			}
		}
		$doc .= '</ul></body></html>';
		return $doc;
	}
}
