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
//Director::forceWWW();

define('PROJECT_THIRDPARTY_DIR', project() . '/thirdparty');
define('PROJECT_THIRDPARTY_PATH', BASE_PATH . '/' . PROJECT_THIRDPARTY_DIR);

define('PROJECT_BOWER_DIR', PROJECT_THIRDPARTY_DIR . '/bower');
define('PROJECT_BOWER_PATH', BASE_PATH . '/' . PROJECT_BOWER_DIR);

// it is suggested to set SS_ERROR_LOG in _ss_environment.php to enable logging,
// alternatively you can use the line below for your custom logging settings
// SS_Log::add_writer(new SS_LogFileWriter('../silverstripe-errors.log'), SS_Log::ERR);
if (!Director::isLive()) {
	// set settings that should only be in dev and test
	// IMPORTANT: as of 3.1 you can *NOT* set display_errors inside _config.php
	// use the php ini, htaccess or _ss_environment.php to set display_errors
} else {
	// we are in live mode, send errors per email
	SS_Log::add_writer(new SS_LogEmailWriter('myEmail@mysite.com'), SS_Log::ERR);
}
