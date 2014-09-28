<?php

namespace mysite;

/**
 * Workaround to remove CMS Help Button
 * @property \LeftAndMain owner
 */
class LeftAndMainExtension extends \LeftAndMainExtension {
	public function init() {
		parent::init();
		\CMSMenu::remove_menu_item('Help');
	}

}
