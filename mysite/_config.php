<?php

global $project;
$project = 'mysite';

global $database;
$database = 'myDatabaseName';

require_once('conf/ConfigureFromEnv.php');

MySQLDatabase::set_connection_charset('utf8');

SiteTree::enable_nested_urls();

i18n::set_locale('de_DE');
Translatable::set_default_locale('de_DE');
Geoip::$default_country_code = 'DE';
//Object::add_extension('SiteTree', 'Translatable');
//Object::add_extension('SiteConfig', 'Translatable');

GD::set_default_quality(100);

FulltextSearchable::enable();

Email::setAdminEmail('myEmail@mysite.com');

Object::add_extension('LeftAndMain', 'mysiteLeftAndMainDecorator');
Object::add_extension('SiteConfig', 'mysiteSiteConfigDecorator');
Object::add_extension('File', 'mysiteFileDecorator');

LeftAndMain::require_css(project().'/css/LeftAndMain.css');
LeftAndMain::setApplicationName('websitename', 'websitename', Director::baseURL());


define('PROJECT_THIRDPARTY_DIR', project() . '/thirdparty');
define('PROJECT_THIRDPARTY_PATH', project() . '/' . PROJECT_THIRDPARTY_DIR);

if (Director::isDev()) {
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	SSViewer::set_source_file_comments(true); 
	SSViewer::flush_template_cache();
} else {
	SS_Log::add_writer(new SS_LogFileWriter('../silverstripe.log'), SS_Log::ERR);
	SS_Log::add_writer(new SS_LogEmailWriter('myEmail@mysite.com'), SS_Log::ERR);
	ini_set('display_errors', 0);
	error_reporting(0);
}