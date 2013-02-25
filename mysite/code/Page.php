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
			THIRDPARTY_DIR . '/jquery-entwine/dist/jquery.entwine-dist.js',
			PROJECT_THIRDPARTY_DIR . '/fancybox/jquery.fancybox-1.3.4.pack.js',
			project() . '/javascript/plugins.js',
			project() . '/javascript/main.js',
		));
		// we need to insert modernizr into <head> for html5shiv to work
		Requirements::insertHeadTags(sprintf(
			'<script type="text/javascript" src="%s"></script>',
			PROJECT_THIRDPARTY_DIR . '/modernizr/modernizr.min.js'
		));
		Requirements::combine_files('main.css', array(
			PROJECT_THIRDPARTY_DIR . '/css/normalize.css',
			PROJECT_THIRDPARTY_DIR . '/css/h5bp.css',
			project() . '/css/screen.css',
			project() . '/css/typography.css',
			project() . '/css/form.css',
			project() . '/css/header.css',
			project() . '/css/footer.css',
			project() . '/css/layout.css',
			project() . '/css/legacy.css',
		));
		Requirements::css(PROJECT_THIRDPARTY_DIR . '/fancybox/jquery.fancybox-1.3.4.css');
	}
}
