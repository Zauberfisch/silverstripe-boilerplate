<?php

class mysiteLeftAndMainDecorator extends LeftAndMainDecorator {
	public function init() {
		parent::init();
		CMSMenu::remove_menu_item('Help');
		CMSMenu::remove_menu_item('CommentAdmin');
		CMSMenu::remove_menu_item('ReportAdmin');
	}
}