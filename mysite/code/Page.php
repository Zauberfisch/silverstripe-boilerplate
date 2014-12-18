<?php

/**
 */
class Page extends \SiteTree {
	private static $db = [];
	private static $has_one = [];
	private static $belongs_to = [];
	private static $has_many = [];
	private static $many_many = [];
	private static $belongs_many_many = [];
	private static $many_many_extraFields = [];
	private static $searchable_fields = [];
	private static $summary_fields = [];
	private static $defaults = [];


	/**
	 * @return \FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		return $fields;
	}

	/**
	 * @param bool $includeRelations
	 * @return array
	 */
	public function fieldLabels($includeRelations = true) {
		$labels = parent::fieldLabels($includeRelations);
		//$labels['key'] = _t('class.key', 'value'); 
		return $labels;
	}
}

/**
 * @author zauberfisch
 * @property Page dataRecord
 * @method Page data
 */
class Page_Controller extends \ContentController {
	private static $allowed_actions = [];

	public function init() {
		parent::init();
		\Requirements::set_combined_files_folder(project() . '/_combinedfiles');
		\Requirements::combine_files('main.js', [
			PROJECT_BOWER_DIR . '/jquery/jquery.min.js',
			PROJECT_BOWER_DIR . '/entwine/jquery.entwine-dist.js',
			PROJECT_BOWER_DIR . '/magnific-popup/jquery.magnific-popup.min.js',
			project() . '/javascript/plugins.js',
			project() . '/javascript/timer.js',
			project() . '/javascript/main.js',
		]);
		// insert modernizr into <head> for html5shiv to work
		\Requirements::insertHeadTags(sprintf(
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
		\Requirements::combine_files('main.css', [
			PROJECT_BOWER_DIR . '/normalize-css/normalize.css',
			PROJECT_BOWER_DIR . '/magnific-popup/magnific-popup.css',
			project() . '/css/screen.css',
			project() . '/css/typography.css',
			project() . '/css/form.css',
			project() . '/css/header.css',
			project() . '/css/footer.css',
			project() . '/css/layout.css',
			project() . '/css/legacy.css',
		]);
		\Requirements::css(project() . '/css/print.css', 'print');
	}
}
