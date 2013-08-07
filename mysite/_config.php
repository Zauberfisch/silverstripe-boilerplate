<?php

global $project;
$project = 'mysite';

// use the _ss_environment.php file for configuration
require_once ('conf/ConfigureFromEnv.php');

// remove the auto generated SS_ prefix that gets added if database is auto detected
global $databaseConfig;
$databaseConfig['database'] = str_replace('SS_', '', $databaseConfig['database']);

// set default language
i18n::set_locale('en_US');

// Force redirect to www
Director::forceWWW();

define('PROJECT_THIRDPARTY_DIR', project() . '/thirdparty');
define('PROJECT_THIRDPARTY_PATH', project() . '/' . PROJECT_THIRDPARTY_DIR);

// always log errors
$logFile = (defined('SS_LOG_PATH') ? SS_LOG_PATH : '..') . '/error.log';
SS_Log::add_writer(new SS_LogFileWriter($logFile), SS_Log::ERR);
if (!Director::isLive()) {
	// set settings that should only be in dev and test
	// IMPORTANT: as of 3.1 you can *NOT* set display_errors inside _config.php
	// use the php ini, htaccess or _ss_environment.php to set display_errors
} else {
	// we are in live mode, send errors per email
	SS_Log::add_writer(new SS_LogEmailWriter('myEmail@mysite.com'), SS_Log::ERR);
}

// CMSMenu::remove_menu_item('SecurityAdmin');
// CMSMenu::remove_menu_item('CMSSettingsController');
// CMSMenu::remove_menu_item('Help'); // still not possible ?
