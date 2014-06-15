<?php

class Page extends SiteTree {
	private static $db = array();
	private static $has_one = array();
	private static $has_many = array();
	private static $many_many = array();
	private static $defaults = array();
	private static $belongs_many_many = array();
	private static $searchable_fields = array();
	private static $summary_fields = array();

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		return $fields;
	}

	public function getSettingsFields() {
		$fields = parent::getSettingsFields();
		// Hide ShowInSearch checkbox if we don't have a search
		$fields->removeByName('ShowInSearch');
		return $fields;
	}
}

class Page_Controller extends ContentController {
	private static $allowed_actions = array();

	public function init() {
		parent::init();
		Requirements::set_combined_files_folder(project() . '/_combinedfiles');
		Requirements::combine_files('main.js', array(
			THIRDPARTY_DIR . '/jquery/jquery.min.js',
			// THIRDPARTY_DIR . '/jquery-ui/jquery-ui.min.js',
			THIRDPARTY_DIR . '/jquery-entwine/dist/jquery.entwine-dist.js',
			PROJECT_THIRDPARTY_DIR . '/magnific-popup/jquery.magnific-popup.min.js',
			project() . '/javascript/plugins.js',
			project() . '/javascript/timer.js',
			project() . '/javascript/main.js',
		));
		// insert modernizr into <head> for html5shiv to work
		Requirements::insertHeadTags(sprintf(
			'<script src="%s"></script>',
			PROJECT_THIRDPARTY_DIR . '/modernizr/modernizr.min.js'
		));
		// insert google analytics into <head> to also track visitors that cancle the pageload before it completed
		//Requirements::insertHeadTags(sprintf(
		//	"<script>
		//		(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
		//		function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
		//		e=o.createElement(i);r=o.getElementsByTagName(i)[0];
		//		e.src='//www.google-analytics.com/analytics.js';
		//		r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
		//		ga('create','%s');ga('send','pageview');
		//	</script>",
		//	'UA-XXXXX-X'
		//));
		Requirements::combine_files('main.css', array(
			PROJECT_THIRDPARTY_DIR . '/normalize-css/normalize.css',
			PROJECT_THIRDPARTY_DIR . '/h5bp/h5bp.css',
			PROJECT_THIRDPARTY_DIR . '/magnific-popup/magnific-popup.css',
			project() . '/css/screen.css',
			project() . '/css/typography.css',
			project() . '/css/form.css',
			project() . '/css/header.css',
			project() . '/css/footer.css',
			project() . '/css/layout.css',
			project() . '/css/legacy.css',
		));
	}
}
