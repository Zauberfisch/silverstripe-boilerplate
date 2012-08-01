<?php

class Page extends SiteTree {
	
    public static $db = array();
	public static $has_one = array();
	public static $has_many = array();
	public static $many_many = array();
	public static $belongs_many_many = array();
	
    public static $defaults = array();
    
    public static $searchable_fields = array();
	
    public static $summary_fields = array();
  //public static $icon     = "mysite/images/page_excel.png";  // using custom icons in SS3 ??
    
    public function getCMSFields() {
		$fields = parent::getCMSFields();
        // $fields->addFieldToTab('Root.Main',new CheckboxField('Name','Title'), 'MetaDescription');
		return $fields;
	}
    
    public function getSettingsFields() {
        $fields = parent::getSettingsFields();
        // $fields->addFieldToTab('Root.Settings',new CheckboxField('Name','Title'));
        return $fields;
    }
    
    /**
    * searches recursivly for the parent site, that has this property
    * (example usage: to set a backgroundimage for every page in CMS. If a page hasnt set a backgroundimage u can find recursively for an image to use)
    * 
    * @version 0.1
    * @param string $property
    * @return DataObject or FALSE
    */
    public function findRecursive($property) {
        $page = $this;
        while($page && ($page->ParentID) && (!$page->$property)) {
            $page = $page->Parent;                        
        }
        return ($page->$property) ? $page : false;
    }
}

class Page_Controller extends ContentController {
	
    public static $allowed_actions = array();
	
    public function init() {
		
        parent::init();
        
        // combine css and js files in themes/boilerplate/_combinedfiles/
        $themeFolder = $this->ThemeDir();
        Requirements::set_combined_files_folder($themeFolder . '/_combinedfiles');
        
        Requirements::combine_files('main.js', array(
			THIRDPARTY_DIR . '/jquery/jquery.min.js',
         // THIRDPARTY_DIR . '/jquery-ui/jquery-ui.min.js',
			THIRDPARTY_DIR . '/json-js/json2.js',
		 // THIRDPARTY_DIR . '/jquery-entwine/dist/jquery.entwine-dist.js',
			'themes/thirdparty/fancybox/jquery.fancybox-1.3.4.pack.js',
            'themes/thirdparty/modernizr/modernizr-2.5.3.min.js',
		 // 'themes/thirdparty/bootstrap/js/bootstrap.min.js',
			project() . '/javascript/plugins.js',
			project() . '/javascript/main.js',
		));
        
        Requirements::combine_files('screen.css', array(
            $themeFolder . '/css/h5bp.css',
         // 'themes/thirdparty/bootstrap/css/bootstrap.min.css',
         // 'themes/thirdparty/bootstrap/css/bootstrap-responsive.min.css',
            $themeFolder . '/css/layout.css',
            $themeFolder . '/css/typography.css',
            $themeFolder . '/css/form.css',
            $themeFolder . '/css/ie.css',
            'themes/thirdparty/fancybox/jquery.fancybox-1.3.4.css'
        ));
	}
}
