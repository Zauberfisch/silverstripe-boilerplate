<?php

global $project;
$project = 'mysite';

// ****************************************************
// **************** Database **************************
// ****************************************************

global $database;
$database = 'silverstripe3-boilerplate'; 
require_once ('conf/ConfigureFromEnv.php');
MySQLDatabase::set_connection_charset('utf8');

// ****************************************************
// **************** Error Reporting *******************
// ****************************************************

$environment_type = Director::get_environment_type();

if (($environment_type == "dev") || ($environment_type == "test")) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    // SSViewer::set_source_file_comments(true); // no more working in SS3 ?
    //SSViewer::flush_template_cache();            // uncomment this, to make your dev site faster
} else {
    SS_Log::add_writer(new SS_LogFileWriter('../silverstripe.log'), SS_Log::ERR);
    // SS_Log::add_writer(new SS_LogEmailWriter('myEmail@mysite.com'), SS_Log::ERR);
    ini_set('display_errors', 0);
    error_reporting(0);
}
         
// ****************************************************
// **************** Emails ****************************
// ****************************************************

Email::setAdminEmail('myEmail@mysite.com');
if ($environment_type == "live") {
    // Email::cc_all_emails_to("myEmail@mysite.com");
    // Email::bcc_all_emails_to("myEmail@mysite.com");
}

// ****************************************************
// **************** i18n ******************************
// ****************************************************

i18n::set_locale('de_DE');

// ****************************************************
// **************** Images ****************************
// ****************************************************

GD::set_default_quality(100);

// ****************************************************
// **************** Routing ***************************
// ****************************************************
    
Director::forceWWW(); // Force redirect to www.
if (class_exists('SiteTree')) SiteTree::enable_nested_urls(); 

// ****************************************************
// **************** Path definitions ******************
// ****************************************************

define('PROJECT_THIRDPARTY_DIR', project() . '/thirdparty');
define('PROJECT_THIRDPARTY_PATH', project() . '/' . PROJECT_THIRDPARTY_DIR);

// ****************************************************
// **************** CMS *******************************
// ****************************************************

if ($environment_type == "live") { 
// CMSMenu::remove_menu_item('SecurityAdmin');
// CMSMenu::remove_menu_item('CMSSettingsController');
// CMSMenu::remove_menu_item('Help');     // still not possible ?
}
