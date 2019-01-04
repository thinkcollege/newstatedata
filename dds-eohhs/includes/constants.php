<?php
define('QUADODO_IN_SYSTEM', true);
require_once('..//users/includes/database_info.php');
define('DIR', LIVE ? '/dds-eohhs/' : '/dds-eohhs/');
define('DOMAIN', LIVE ? 'www.statedata.info' : $_SERVER['HTTP_HOST']);
define('DEBUG', LIVE ? 0 : 1);
define('TEMPLATE', 'dds_template');
define('ADMIN_EMAIL', 'icinagle@gmail.com');

define('DB_USER', $database_username);
define('DB_PASS', $database_password);
define('DATABASE', $database_name);
define('PRE_TABLE', 'eohhs_');
define('SEC_PRE_TABLE', $database_prefix);
define('TABLE_PEOPLE', 		'`' . PRE_TABLE . 'people`');
define('TABLE_PLACEMENT',	'`' . PRE_TABLE . 'placement`');
//define('TABLE_CODE_LOOKUP',	'`' . PRE_TABLE . '`');
//define('TABLE_PROVIDER',	'`' . PRE_TABLE . 'Providers`');
define('TABLE_USER',		'`' . PRE_TABLE . 'User`');
define('TABLE_USER_REPORT',	'`' . PRE_TABLE . 'UserReport`');

define('ADD', 'add');
define('EDIT', 'edit');
define('SAVE', 'save');
define('LOGOUT', 'logout');

define('MIN_ALLOWED_RECORDS',	5);
define('DATA_RELEASE_DELAY',	4);
