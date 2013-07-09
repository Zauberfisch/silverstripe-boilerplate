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
SS_Log::add_writer(new SS_LogFileWriter('../silverstripe.log'), SS_Log::ERR);
if (!Director::isLive()) {
	// turn on errors
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
} else {
	// we are in live mode, send errors per email
	SS_Log::add_writer(new SS_LogEmailWriter('myEmail@mysite.com'), SS_Log::ERR);
	// turn of error reporting
	ini_set('display_errors', 0);
	error_reporting(0);
}

// CMSMenu::remove_menu_item('SecurityAdmin');
// CMSMenu::remove_menu_item('CMSSettingsController');
// CMSMenu::remove_menu_item('Help'); // still not possible ?
