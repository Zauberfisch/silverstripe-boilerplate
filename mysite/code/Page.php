<?php

class Page extends SiteTree {
	public static $db = array();
	public static $has_one = array();
	public static $has_many = array();
	public static $many_many = array();
	public static $defaults = array();
	public static $belongs_many_many = array();
	public static $searchable_fields = array();
	public static $summary_fields = array();
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		return $fields;
	}
}

class Page_Controller extends ContentController {
	public static $allowed_actions = array();
	public function init() {
		parent::init();
		Requirements::set_combined_files_folder(project() . '/_combinedfiles');
		Requirements::combine_files('main.js', array(
			THIRDPARTY_DIR . '/jquery/jquery.min.js',
			// THIRDPARTY_DIR . '/jquery-ui/jquery-ui.min.js',
			THIRDPARTY_DIR . '/json-js/json2.js',
			THIRDPARTY_DIR . '/jquery-entwine/dist/jquery.entwine-dist.js',
			PROJECT_THIRDPARTY_DIR . '/fancybox/jquery.fancybox-1.3.4.pack.js',
			PROJECT_THIRDPARTY_DIR . '/modernizr/modernizr-2.5.3.min.js',
			project() . '/javascript/plugins.js',
			project() . '/javascript/main.js',
		));
		Requirements::themedCSS('screen');
		Requirements::css(PROJECT_THIRDPARTY_DIR . '/fancybox/jquery.fancybox-1.3.4.css');
	}
}
