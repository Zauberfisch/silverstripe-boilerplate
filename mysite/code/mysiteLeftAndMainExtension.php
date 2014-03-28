<?php

/**
 * Workaround to remove CMS Help Button
 */
class mysiteLeftAndMainExtension extends LeftAndMainExtension {
	public function init() {
		parent::init();
		CMSMenu::remove_menu_item('Help');
	}

}
