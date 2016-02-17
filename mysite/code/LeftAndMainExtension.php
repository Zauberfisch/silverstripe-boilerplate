<?php

/**
 * @property LeftAndMain|mysiteLeftAndMainExtension owner
 */
class mysiteLeftAndMainExtension extends LeftAndMainExtension {
	public function init() {
		parent::init();
		CMSMenu::remove_menu_item('Help');
		HtmlEditorConfig::get_active()->setOption('content_css', project() . '/css/editor.scss.css');
	}
}
