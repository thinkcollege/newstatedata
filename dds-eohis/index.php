<?php
set_time_limit(300);
if (in_array($_SERVER['REMOTE_ADDR'], array('98.216.239.14'))) {
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
}
if (function_exists('xdebug_disable')) {
	//header('Content-Type:text/plain');
	xdebug_disable();
}
define('LIVE', (isset($_SERVER['SERVER_ADDR']) && $_SERVER['SERVER_ADDR'] == '69.20.125.203') || (isset($_ENV['HOSTNAME']) && $_ENV['HOSTNAME'] == 'communityinclusion.org'));
$_ENV['PHP_CLASSPATH'] = array(__DIR__ . '/includes/', LIVE ? '/home/statedata/lib-ext/' : '/Users/umb/workspace/lib-ext/');
include('./includes/constants.php');
include('./includes/utils.php');
include(LIVE ? '/home/nercve/lib/lib.php' : '/Users/umb/workspace/lib/lib.php');
/*if (LIVE) {
	include('/usr/local/Corda60/dev_tools/embedder/php/CordaEmbedder.php');
}*/
if (LIVE && !has_value($_SERVER, 'HTTPS')) {
	header('Location: https://' . DOMAIN . DIR . (strlen($_SERVER['QUERY_STRING']) > 0 ? '?' . $_SERVER['QUERY_STRING'] : ''), true, 301);
	exit;
}
#session_set_cookie_params(0, '/');
session_start();
$user = eohis_user::getInstance();
$user->login('', '');

if (!$user->check('..' . DIR)) {
	print "<pre>";
	print_r($_SESSION);
	print_r($_COOKIE);
	print error();
	exit;
	
	$user->logout();
}

$page 	= isset($_REQUEST['page']) ? preg_replace('/[^a-z0-9]+/i', '', $_REQUEST['page']) : '';
$report = isset($_GET['report']) ? $_GET['report'] : '';

$ajax = isset($_REQUEST['ajax']) ? preg_replace('/[^a-z0-9]+/i', '', $_REQUEST['ajax']) : '' ;
$template = template::getTemplate(TEMPLATE, LIVE ? 'https://' . DOMAIN . DIR : 'http://' . DOMAIN . DIR);
$template->addRegion('title', ' - DDS Employment Outcomes');
$template->addSideMenuItem('./', 'Project Home');
$template->addSideMenuItem('./page=update', 'Report Placements');
//$template->addFunder('http://dshs.wa.gov/ddd/', 'https://www.statedata.info/images/dshs.jpg');
$template->addFunder('http://www.communityinclusion.org/', 'https://www.statedata.info/images/icigreendark.gif');
$template->addFunder('http://www.umb.edu/', 'https://www.statedata.info/images/UMB_informal.gif');
$template->addFunder('http://www.statedata.info/', 'https://www.statedata.info/images/statedata_side.gif');

$t = microtime(true);
$msgs = array('Start: ' . 0);
//$user = user::getInstance();
if ($page == LOGOUT) {
	$user->logout();
}
/*if (!$user->loggedIn() && isset($_POST['email']) && isset($_POST['password'])) {
	$user->login($_POST['email'], $_POST['password']);
}*/

$msgs[] = 'Logic Started: ' . (microtime(true) - $t);
if ($report > 0 || report::validType($report)) {
	die('oops!');
	$msgs[] = 'Found Valid report:' . (microtime(true) - $t);
	if ($report > 0) {
		$rpt = $_SESSION['report'] = report::getSavedReport($report);
	} else if ((!isset($_SESSION['report']) || !($_SESSION['report'] instanceof report) || $_SESSION['report']->getType() != $report) && has_value($_SESSION, 'baseReport') && $_SESSION['baseReport'] instanceof report) {
		$_REQUEST = $_POST = $_GET = array();
		$rpt = $_SESSION['report'] = $_SESSION['baseReport']->copy();
		$rpt->setType($report);
	} else if (!isset($_SESSION['report']) || !($_SESSION['report'] instanceof report) || $_SESSION['report']->getType() != $report) {
		$_REQUEST = $_POST = $_GET = array();
		$rpt = $_SESSION['report'] =  new report($report);
	} else if (isset($_SESSION['report']) && $_SESSION['report'] instanceof report) {
		$rpt = $_SESSION['report'];
	}
	if (isset($rpt)) {
		if (has_value($_REQUEST, 'save') && has_value($_REQUEST, 'title')) {
			$rpt->save($_REQUEST['title']);
		}
	
		if (count($_POST) > 0 || count($_GET) > 1) {
			$rpt->process();
		}
		$template->addRegion('content', $rpt->make(has_value($_POST, 'to') && valid_email($_POST['to'])));
		$template->addRegion('title', $rpt->getLegend());
		$template->addRegion('heading', $rpt->getLegend());
				
		if (has_value($_POST, 'to')) {
			iF (!valid_email($_POST['to'])) {
				error('Invalid e-mail address.');
			} else {
				$msg = 'mode:' . $template->makeTemplate(template::MODE_EMAIL);
				$headers = "From: WA-DDD Employment Supports Performance Outcome Information System <waddd@statedata.info>\r\n"
						 . "Reply-To: " . $user->getFirstName() . ' ' . $user->getLastName() . '<' . $user->getEmail() . ">\r\n"
						 . "Content-Type: text/html\r\n";
				mail($_POST['to'], 'WA-DDD ' . $rpt->getLegend(), $msg, $headers);
				$template->addRegion('content', $rpt->make(false));
			}
		}
	} else {
		error('Invalid Report.');
		include('./includes/home.php');
	}
} else if ($page) {
	if (!$qls->Security->is_auth_page('..' . DIR . $page . '.php')) {
		if (@is_file('./includes/' . $page . '.php')) {
			header('Forbidden', true, 403);
			$template->addRegion('title', "Forbidden");
			$template->addRegion('header', "Forbidden");
			$template->addRegion('content', "Forbidden");
		} else {
			header('Not Found', true, 404);
			$template->addRegion('title', 	"Not Found!");
			$template->addRegion('header', 	"Not Found!");
			$template->addRegion('content', "THe requested page could not be found.");
		}
	} else {		
		unset($_SESSION['report']);
		die('crap!');
		include('./includes/' . $page . '.php');
	}
} else if ($ajax) {
	if (0 && !$user->check('..' . DIR . "ajax/$ajax/")) {
		header('Forbidden', true, 403);
		header('Content-type:text/plain');
		print_r($user);
		
		die('"forbidden"');
	}
	$ret = ajax::fullfill($ajax);
	header('Content-type:text/plain');
	print json_encode($ret);
	exit;
} else {
	unset($_SESSION['report']);
	$msgs[] = 'Loading homepage: ' . (microtime(true) - $t);
	include('./includes/home.php');
	$msgs[] = 'Loading homepage - Finished: ' . (microtime(true) - $t);
}

$msgs[] = 'Generating base report: ' . (microtime(true) - $t);
/*if (!isset($_SESSION['loadingData'])) {
	$msgs[] = 'Haven\'t loaded base report yet: ' . (microtime(true) - $t);
	$_SESSION['loadingData'] = 1;
	if (false && class_exists('memcache')) {
		$msgs[] = 'Using memcache: ' . (microtime(true) - $t);
		$m = new memcache;
		$m->connect('localhost');
		if ($m->get('WADDD-baseReport') == false) {
			$r = new report(0, true);
			$midnight = 86400 - time() + mktime(0,0,0);
			$m->set('WADDD-baseReport', $r, 0, $midnight);
		} else if (!isset($_SESSION['baseReport']) || !($_SESSION['baseReport'] instanceof report)) {
			$r = $m->get('WADDD-baseReport');
		}
	} else {
		$r = new report(0, true);
	}
	$_SESSION['baseReport'] = $r;
	$_SESSION['loadingData'] = 2;
}*/
$content = $template->getRegion('content');
$template->addRegion('content', error() . $content . (!LIVE /*|| $_SERVER['REMOTE_ADDR'] == '158.121.240.51'*/ ? '<p>' . implode('<br />', $msgs) .'</p>' : ''));

print $template->makeTemplate(template::MODE_DISPLAY);
