<?php
/**
 * Page Page Type
 * @author Zauberfisch
 */
class Page extends SiteTree {
	public static $db = array(
	);
	public static $has_one = array(
	);
	public static $has_many = array(
	);
	public static $many_many = array(
	);
	public static $defaults = array(
	);
	public static $belongs_many_many = array(
	);
	public static $searchable_fields = array(
	);
	public static $summary_fields = array(
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		return $fields;
	}
}

class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	public static $allowed_actions = array (
	);

	public function init() {
		parent::init();
		Requirements::set_combined_files_folder(project().'/_combinedfiles');
		Requirements::block(THIRDPARTY_DIR . '/jquery/jquery.js');
		Requirements::block(THIRDPARTY_DIR . '/jquery/jquery-packed.js');
		Requirements::block(SAPPHIRE_DIR . '/javascript/jquery_improvements.js');	
		Requirements::combine_files('main.js', array(
			PROJECT_THIRDPARTY_DIR.'/jquery/jquery.js',
			PROJECT_THIRDPARTY_DIR.'/fancybox/jquery.fancybox-1.3.4.pack.js',
			PROJECT_THIRDPARTY_DIR.'/jquery.entwine/dist/jquery.entwine-dist.js',
			project().'/javascript/main.js'
		));
		Requirements::themedCSS('screen');
		Requirements::css(PROJECT_THIRDPARTY_DIR.'/fancybox/jquery.fancybox-1.3.4.css');
	}
}
