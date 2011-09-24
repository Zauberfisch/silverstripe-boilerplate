<?php

global $project;
$project = 'mysite';

global $database;
$database = 'myDataBase';

require_once ('conf/ConfigureFromEnv.php');

i18n::set_locale('de_DE');

MySQLDatabase::set_connection_charset('utf8');
SiteTree::enable_nested_urls();
Email::setAdminEmail('myEmail@mysite.com');

define('PROJECT_THIRDPARTY_DIR', project() . '/thirdparty');
define('PROJECT_THIRDPARTY_PATH', project() . '/' . PROJECT_THIRDPARTY_DIR);

if (Director::isDev()) {
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	// SSViewer::set_source_file_comments(true);
	SSViewer::flush_template_cache();
} else {
	SS_Log::add_writer(new SS_LogFileWriter('../silverstripe.log'), SS_Log::ERR);
	SS_Log::add_writer(new SS_LogEmailWriter('myEmail@mysite.com'), SS_Log::ERR);
	ini_set('display_errors', 0);
	error_reporting(0);
}
