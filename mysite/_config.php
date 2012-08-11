<?php
global $project;
$project = 'mysite';

// ****************************************************
// **************** database & general settings *******
// ****************************************************
MySQLDatabase::set_connection_charset('utf8');
// use the _ss_environment.php file for configuration
require_once ('conf/ConfigureFromEnv.php');
define('PROJECT_THIRDPARTY_DIR', project() . '/thirdparty');
define('PROJECT_THIRDPARTY_PATH', project() . '/' . PROJECT_THIRDPARTY_DIR);

// ****************************************************
// **************** error & dev settings **************
// ****************************************************
// always log errors
SS_Log::add_writer(new SS_LogFileWriter('../silverstripe.log'), SS_Log::ERR);
if (!Director::isLive()) {
	// turn on errors
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	// display template filenames as comments in the html output
	// SSViewer::set_source_file_comments(true);
	// flush templates every reload, this may make your site slow,
	// and might cause "filetime" errors, which appear when the template gets flushed twice in the same moment
	SSViewer::flush_template_cache();
} else {
	// we are in live mode, send errors per email
	SS_Log::add_writer(new SS_LogEmailWriter('myEmail@mysite.com'), SS_Log::ERR);
	// turn of error reporting
	ini_set('display_errors', 0);
	error_reporting(0);
}

// ****************************************************
// **************** i18n ******************************
// ****************************************************
// set default language
i18n::set_locale('en_US');

// ****************************************************
// **************** images ****************************
// ****************************************************
// set image resize quallity to 100%
GD::set_default_quality(100);

// ****************************************************
// **************** routing ***************************
// ****************************************************
// Force redirect to www
Director::forceWWW();
// enable nested urls like mysite.com/parent/child
if (class_exists('SiteTree'))
	SiteTree::enable_nested_urls();

// ****************************************************
// **************** emails ****************************
// ****************************************************
Email::setAdminEmail('myEmail@mysite.com');
//Email::cc_all_emails_to("myEmail@mysite.com");
//Email::bcc_all_emails_to("myEmail@mysite.com");

// ****************************************************
// **************** extensions ************************
// ****************************************************
//Object::add_extension('SiteConfig', 'mysiteSiteConfig');
//Object::add_extension('SiteTree', 'mysiteSiteTree');

// ****************************************************
// **************** CMS *******************************
// ****************************************************
LeftAndMain::require_css('mysite/css/cms.css');
// CMSMenu::remove_menu_item('SecurityAdmin');
// CMSMenu::remove_menu_item('CMSSettingsController');
// CMSMenu::remove_menu_item('Help'); // still not possible ?
